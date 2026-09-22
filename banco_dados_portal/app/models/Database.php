<?php
/**
 * Conexão com o Banco de Dados e Auto-Instalador do Portal
 * SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas
 */

class Database {
    private static ?PDO $instance = null;

    public static function getConnection(): PDO {
        if (self::$instance === null) {
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $dbname = 'portal_senai_db';

            try {
                // 1. Conecta sem selecionar o banco para garantir que a base exista
                $initPdo = new PDO("mysql:host={$host};charset=utf8mb4", $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);

                // Cria o banco se não existir
                $initPdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbname}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");

                // 2. Conecta ao banco de dados do portal
                self::$instance = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8mb4", $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);

                // 3. Executa a criação das tabelas e carga inicial se necessário
                self::initSchema(self::$instance);

            } catch (PDOException $e) {
                die("Erro crítico de conexão com o banco de dados do portal: " . $e->getMessage());
            }
        }

        return self::$instance;
    }

    private static function initSchema(PDO $pdo): void {
        // Tabela 1: Usuários do Portal (Alunos e Professores/Admins)
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS usuarios_portal (
                id_usuario INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(150) NOT NULL,
                email VARCHAR(150) NOT NULL UNIQUE,
                cpf VARCHAR(20) NULL,
                turma VARCHAR(80) NULL,
                senha VARCHAR(255) NOT NULL,
                nivel ENUM('aluno', 'admin') NOT NULL DEFAULT 'aluno',
                status ENUM('pendente', 'ativo', 'bloqueado') NOT NULL DEFAULT 'pendente',
                criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB;
        ");

        // Tabela 2: Tokens de Recuperação de Senha
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS recuperacao_senha (
                id_recuperacao INT AUTO_INCREMENT PRIMARY KEY,
                id_usuario INT NOT NULL,
                token VARCHAR(100) NOT NULL UNIQUE,
                expira_em DATETIME NOT NULL,
                utilizado TINYINT(1) NOT NULL DEFAULT 0,
                criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                CONSTRAINT fk_recuperacao_usuario FOREIGN KEY (id_usuario) 
                    REFERENCES usuarios_portal(id_usuario) ON DELETE CASCADE
            ) ENGINE=InnoDB;
        ");

        // Tabela 3: Respostas das Atividades e Desafios dos Módulos 1 a 9
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS respostas_modulos (
                id_resposta INT AUTO_INCREMENT PRIMARY KEY,
                id_usuario INT NOT NULL,
                modulo_num INT NOT NULL,
                respostas_json LONGTEXT NOT NULL,
                nota DECIMAL(4,2) NULL,
                feedback_professor TEXT NULL,
                data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                CONSTRAINT fk_respostas_usuario FOREIGN KEY (id_usuario) 
                    REFERENCES usuarios_portal(id_usuario) ON DELETE CASCADE
            ) ENGINE=InnoDB;
        ");

        // 4. Semear Administrador Padrão se não existir nenhum admin
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios_portal WHERE nivel = 'admin'");
        $stmt->execute();
        $adminExists = (int)$stmt->fetchColumn() > 0;

        if (!$adminExists) {
            $adminPass = password_hash('admin123', PASSWORD_DEFAULT);
            $insertAdmin = $pdo->prepare("
                INSERT INTO usuarios_portal (nome, email, cpf, turma, senha, nivel, status)
                VALUES (:nome, :email, :cpf, :turma, :senha, 'admin', 'ativo')
            ");
            $insertAdmin->execute([
                ':nome' => 'Professor Administrador • SENAI',
                ':email' => 'admin@senai.br',
                ':cpf' => '000.000.000-00',
                ':turma' => 'Coordenação Pedagógica',
                ':senha' => $adminPass
            ]);
        }
    }
}
