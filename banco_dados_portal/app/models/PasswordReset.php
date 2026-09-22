<?php
/**
 * Modelo de Recuperação de Senha por E-mail
 * SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas
 */

require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Usuario.php';

class PasswordReset {
    public static function gerarToken(int $id_usuario): string {
        $pdo = Database::getConnection();

        // Invalida tokens anteriores não utilizados deste usuário
        $cancel = $pdo->prepare("UPDATE recuperacao_senha SET utilizado = 1 WHERE id_usuario = :id_usuario AND utilizado = 0");
        $cancel->execute([':id_usuario' => $id_usuario]);

        // Gera token criptograficamente seguro
        $token = bin2hex(random_bytes(32));

        // Validade de 1 hora
        $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $stmt = $pdo->prepare("
            INSERT INTO recuperacao_senha (id_usuario, token, expira_em, utilizado)
            VALUES (:id_usuario, :token, :expira_em, 0)
        ");

        $stmt->execute([
            ':id_usuario' => $id_usuario,
            ':token' => $token,
            ':expira_em' => $expira
        ]);

        return $token;
    }

    public static function validarToken(string $token): ?array {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare("
            SELECT r.*, u.nome, u.email 
            FROM recuperacao_senha r
            INNER JOIN usuarios_portal u ON r.id_usuario = u.id_usuario
            WHERE r.token = :token AND r.utilizado = 0 AND r.expira_em > NOW()
            LIMIT 1
        ");

        $stmt->execute([':token' => trim($token)]);
        $res = $stmt->fetch();

        return $res ?: null;
    }

    public static function redefinirSenha(string $token, string $novaSenha): bool {
        $reg = self::validarToken($token);
        if (!$reg) {
            return false;
        }

        $pdo = Database::getConnection();

        // 1. Atualiza a senha do usuário
        $ok = Usuario::atualizarSenha((int)$reg['id_usuario'], $novaSenha);
        if (!$ok) {
            return false;
        }

        // 2. Marca o token como utilizado
        $mark = $pdo->prepare("UPDATE recuperacao_senha SET utilizado = 1 WHERE id_recuperacao = :id");
        $mark->execute([':id' => $reg['id_recuperacao']]);

        return true;
    }

    /**
     * Envia o e-mail de recuperação.
     * Tenta o envio real via mail(). Se o SMTP local do XAMPP não estiver configurado,
     * salva em log local e retorna o link para teste sem travar o sistema.
     */
    public static function despacharEmail(string $email, string $nome, string $link): array {
        $assunto = "Recuperação de Senha • Banco de Dados SENAI-SP";
        
        $mensagemHtml = "
        <html>
        <body style='font-family: Arial, sans-serif; color: #1e293b; line-height: 1.6;'>
            <div style='max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px;'>
                <h2 style='color: #db2777;'>SENAI-SP • Portal de Banco de Dados</h2>
                <p>Olá, <strong>" . htmlspecialchars($nome) . "</strong>,</p>
                <p>Recebemos uma solicitação para redefinir a sua senha de acesso à apostila interativa.</p>
                <p>Clique no botão abaixo para criar uma nova senha. Este link é válido por <strong>1 hora</strong>:</p>
                <p style='text-align: center; margin: 25px 0;'>
                    <a href='{$link}' style='background: #db2777; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-weight: bold; display: inline-block;'>
                        Redefinir Minha Senha
                    </a>
                </p>
                <p style='font-size: 12px; color: #64748b;'>Se você não solicitou esta redefinição, apenas desconsidere este e-mail. Sua senha permanecerá inalterada.</p>
                <hr style='border: none; border-top: 1px solid #e2e8f0; margin: 20px 0;'>
                <p style='font-size: 11px; color: #94a3b8;'>Habilitação Técnica em Desenvolvimento de Sistemas • SENAI-SP</p>
            </div>
        </body>
        </html>";

        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: SENAI-SP <noreply@senai.sp.gov.br>\r\n";

        // Tenta enviar via mail()
        $enviado = @mail($email, $assunto, $mensagemHtml, $headers);

        // Garante registro em log local para testes no XAMPP
        $logDir = __DIR__ . '/../../storage/mail_logs';
        if (!is_dir($logDir)) {
            @mkdir($logDir, 0777, true);
        }
        $logFile = $logDir . '/recovery_' . date('Y-m-d') . '.log';
        $logContent = "[" . date('Y-m-d H:i:s') . "] Para: {$email} ({$nome}) | Link: {$link} | mail() Status: " . ($enviado ? 'ENVIADO' : 'SIMULADO_LOCAL') . "\n";
        @file_put_contents($logFile, $logContent, FILE_APPEND);

        return [
            'success' => true,
            'mail_sent' => $enviado,
            'link' => $link,
            'log_file' => $logFile
        ];
    }
}
