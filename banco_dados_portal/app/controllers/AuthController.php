<?php
/**
 * Controlador de Autenticação (Login, Cadastro de Aluno, Esqueci Minha Senha)
 * SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas
 */

require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/PasswordReset.php';
require_once __DIR__ . '/../models/CourseData.php';

class AuthController {
    public function showLogin(?string $mensagem = null, ?string $tipoMensagem = null, ?string $abaAtiva = 'login'): void {
        $pageTitle = 'Autenticação & Cadastro de Alunos | SENAI-SP';
        $currentModule = null;
        $modules = CourseData::getModules();
        $mensagemFeedback = $mensagem;
        $tipoFeedback = $tipoMensagem;

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/auth/login.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    public function processLogin(): void {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if (empty($email) || empty($senha)) {
            $this->showLogin('Preencha o e-mail e a senha para acessar.', 'error', 'login');
            return;
        }

        $res = Usuario::autenticar($email, $senha);

        if (!$res['success']) {
            $this->showLogin($res['message'], 'error', 'login');
            return;
        }

        // Login efetuado com sucesso!
        $_SESSION['usuario'] = $res['user'];

        // Redireciona para onde o usuário estava ou para o Portal de Disciplinas
        $redirect = $_SESSION['redirect_after_login'] ?? '../index.php';
        unset($_SESSION['redirect_after_login']);

        header("Location: {$redirect}");
        exit;
    }

    public function processRegister(): void {
        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $cpf = $_POST['cpf'] ?? '';
        $turma = $_POST['turma'] ?? '';
        $senha = $_POST['senha'] ?? '';
        $confirma = $_POST['confirma_senha'] ?? '';

        if (empty($nome) || empty($email) || empty($senha)) {
            $this->showLogin('Preencha os campos obrigatórios (Nome, E-mail e Senha).', 'error', 'cadastro');
            return;
        }

        if (strlen($senha) < 6) {
            $this->showLogin('A senha de acesso deve possuir pelo menos 6 caracteres.', 'error', 'cadastro');
            return;
        }

        if ($senha !== $confirma) {
            $this->showLogin('A confirmação de senha não coincide com a senha digitada.', 'error', 'cadastro');
            return;
        }

        $res = Usuario::cadastrar($nome, $email, $cpf, $turma, $senha);

        if (!$res['success']) {
            $this->showLogin($res['message'], 'error', 'cadastro');
            return;
        }

        $this->showLogin(
            '✅ Cadastro realizado com sucesso! Sua conta está AGUARDANDO APROVAÇÃO do professor/administrador para ser ativada.',
            'success',
            'login'
        );
    }

    public function processForgotPassword(): void {
        $email = trim($_POST['email_recuperacao'] ?? '');

        if (empty($email)) {
            $this->showLogin('Por favor, informe seu e-mail cadastrado.', 'error', 'esqueci');
            return;
        }

        $user = Usuario::buscarPorEmail($email);

        if (!$user) {
            // Mensagem genérica para segurança
            $this->showLogin('Se o e-mail informado estiver cadastrado, um link de recuperação foi enviado.', 'info', 'esqueci');
            return;
        }

        // Gera token
        $token = PasswordReset::gerarToken((int)$user['id_usuario']);

        // Monta link absoluto de recuperação
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];
        $baseUri = dirname($_SERVER['SCRIPT_NAME']);
        $baseUri = rtrim(str_replace('\\', '/', $baseUri), '/');
        $link = "{$protocol}{$host}{$baseUri}/index.php?page=redefinir-senha&token={$token}";

        // Envia o e-mail
        $envio = PasswordReset::despacharEmail($user['email'], $user['nome'], $link);

        $msg = "Link de recuperação gerado com sucesso para o e-mail <strong>" . htmlspecialchars($user['email']) . "</strong>!";
        if (!$envio['mail_sent']) {
            $msg .= "<br><br><span style='font-size:12px; color:#c2410c;'><strong>Ambiente Local (XAMPP):</strong> O link seguro de redefinição pode ser acessado diretamente clicando aqui: <br><a href='{$link}' style='color:#0284c7; text-decoration:underline; word-break:break-all;'>{$link}</a></span>";
        }

        $this->showLogin($msg, 'success', 'esqueci');
    }

    public function showResetPassword(string $token, ?string $erro = null): void {
        $reg = PasswordReset::validarToken($token);

        $pageTitle = 'Redefinir Senha de Acesso | SENAI-SP';
        $currentModule = null;
        $modules = CourseData::getModules();
        $tokenValido = ($reg !== null);
        $usuarioToken = $reg;
        $mensagemErro = $erro;

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/auth/redefinir_senha.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    public function processResetPassword(): void {
        $token = $_POST['token'] ?? '';
        $senha = $_POST['nova_senha'] ?? '';
        $confirma = $_POST['confirma_nova_senha'] ?? '';

        if (empty($token)) {
            header('Location: index.php?page=login');
            exit;
        }

        if (strlen($senha) < 6) {
            $this->showResetPassword($token, 'A nova senha deve possuir pelo menos 6 caracteres.');
            return;
        }

        if ($senha !== $confirma) {
            $this->showResetPassword($token, 'A confirmação de senha não coincide com a nova senha.');
            return;
        }

        $ok = PasswordReset::redefinirSenha($token, $senha);

        if (!$ok) {
            $this->showResetPassword($token, 'Token inválido ou expirado. Solicite uma nova recuperação de senha.');
            return;
        }

        $this->showLogin('✅ Sua senha foi redefinida com sucesso! Você já pode entrar com sua nova credencial.', 'success', 'login');
    }

    public function logout(): void {
        unset($_SESSION['usuario']);
        session_destroy();
        header('Location: index.php?page=login');
        exit;
    }
}
