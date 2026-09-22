<?php
/**
 * Modelo de Usuários do Portal (Alunos e Professores/Admins)
 * SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas
 */

require_once __DIR__ . '/Database.php';

class Usuario {
    public static function cadastrar(string $nome, string $email, ?string $cpf, ?string $turma, string $senha): array {
        $pdo = Database::getConnection();

        // Verifica se o e-mail já existe
        $check = $pdo->prepare("SELECT id_usuario FROM usuarios_portal WHERE email = :email");
        $check->execute([':email' => trim($email)]);
        if ($check->fetch()) {
            return ['success' => false, 'message' => 'Este e-mail já está cadastrado no sistema.'];
        }

        $hash = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("
            INSERT INTO usuarios_portal (nome, email, cpf, turma, senha, nivel, status)
            VALUES (:nome, :email, :cpf, :turma, :senha, 'aluno', 'pendente')
        ");

        $stmt->execute([
            ':nome' => trim($nome),
            ':email' => strtolower(trim($email)),
            ':cpf' => trim($cpf ?? ''),
            ':turma' => trim($turma ?? ''),
            ':senha' => $hash
        ]);

        return [
            'success' => true, 
            'id' => (int)$pdo->lastInsertId(),
            'message' => 'Cadastro realizado com sucesso! Sua conta está aguardando aprovação do professor para ser ativada.'
        ];
    }

    public static function autenticar(string $email, string $senha): array {
        $pdo = Database::getConnection();

        $emailLimpo = strtolower(trim($email));
        // Normalização de e-mail admin comum (.com.br -> .br)
        if ($emailLimpo === 'admin@senai.com.br') {
            $emailLimpo = 'admin@senai.br';
        }

        $stmt = $pdo->prepare("SELECT * FROM usuarios_portal WHERE email = :email");
        $stmt->execute([':email' => $emailLimpo]);
        $user = $stmt->fetch();

        $senhaValida = $user && (password_verify($senha, $user['senha']) || password_verify(trim($senha), $user['senha']));

        if (!$user || !$senhaValida) {
            return ['success' => false, 'code' => 'INVALID_CREDENTIALS', 'message' => 'E-mail ou senha incorretos.'];
        }

        if ($user['status'] === 'pendente') {
            return [
                'success' => false, 
                'code' => 'STATUS_PENDING', 
                'message' => 'Sua conta ainda está pendente de aprovação pelo professor/administrador. Aguarde a liberação para acessar.'
            ];
        }

        if ($user['status'] === 'bloqueado') {
            return [
                'success' => false, 
                'code' => 'STATUS_BLOCKED', 
                'message' => 'Esta conta de acesso foi bloqueada pela coordenação do curso.'
            ];
        }

        // Remove o hash de senha antes de retornar a sessão
        unset($user['senha']);

        return [
            'success' => true,
            'user' => $user
        ];
    }

    public static function buscarPorEmail(string $email): ?array {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT id_usuario, nome, email, cpf, turma, nivel, status FROM usuarios_portal WHERE email = :email");
        $stmt->execute([':email' => strtolower(trim($email))]);
        $user = $stmt->fetch();
        return $user ?: null;
    }

    public static function buscarPorId(int $id): ?array {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT id_usuario, nome, email, cpf, turma, nivel, status FROM usuarios_portal WHERE id_usuario = :id");
        $stmt->execute([':id' => $id]);
        $user = $stmt->fetch();
        return $user ?: null;
    }

    public static function listarPendentes(): array {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT id_usuario, nome, email, cpf, turma, criado_em FROM usuarios_portal WHERE status = 'pendente' ORDER BY criado_em ASC");
        return $stmt->fetchAll();
    }

    public static function listarTodosAlunos(): array {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT id_usuario, nome, email, cpf, turma, status, criado_em FROM usuarios_portal WHERE nivel = 'aluno' ORDER BY criado_em DESC");
        return $stmt->fetchAll();
    }

    public static function aprovar(int $id): bool {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("UPDATE usuarios_portal SET status = 'ativo' WHERE id_usuario = :id");
        return $stmt->execute([':id' => $id]);
    }

    public static function reativar(int $id): bool {
        return self::aprovar($id);
    }

    public static function bloquear(int $id): bool {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("UPDATE usuarios_portal SET status = 'bloqueado' WHERE id_usuario = :id");
        return $stmt->execute([':id' => $id]);
    }

    public static function listarAlunosFiltrados(?string $status = null, ?string $turma = null, ?string $busca = null): array {
        $pdo = Database::getConnection();
        $sql = "SELECT id_usuario, nome, email, cpf, turma, status, criado_em FROM usuarios_portal WHERE nivel = 'aluno'";
        $params = [];

        if (!empty($status)) {
            $sql .= " AND status = :status";
            $params[':status'] = $status;
        }

        if (!empty($turma)) {
            $sql .= " AND turma LIKE :turma";
            $params[':turma'] = '%' . trim($turma) . '%';
        }

        if (!empty($busca)) {
            $sql .= " AND (nome LIKE :busca OR email LIKE :busca OR cpf LIKE :busca)";
            $params[':busca'] = '%' . trim($busca) . '%';
        }

        $sql .= " ORDER BY criado_em DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public static function listarTurmasDistintas(): array {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT DISTINCT turma FROM usuarios_portal WHERE turma IS NOT NULL AND turma != '' ORDER BY turma ASC");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public static function atualizarSenha(int $id, string $novaSenha): bool {
        $pdo = Database::getConnection();
        $hash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE usuarios_portal SET senha = :senha WHERE id_usuario = :id");
        return $stmt->execute([':senha' => $hash, ':id' => $id]);
    }
}
