<?php
/**
 * Modelo de Armazenamento e Avaliação das Respostas dos Módulos
 * SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas
 */

require_once __DIR__ . '/Database.php';

class RespostaAtividade {
    public static function salvarResposta(int $id_usuario, int $modulo_num, array $respostasArray): array {
        $pdo = Database::getConnection();

        $json = json_encode($respostasArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        // Verifica se o aluno já havia enviado resposta para este módulo
        $check = $pdo->prepare("SELECT id_resposta FROM respostas_modulos WHERE id_usuario = :id_usuario AND modulo_num = :modulo_num");
        $check->execute([
            ':id_usuario' => $id_usuario,
            ':modulo_num' => $modulo_num
        ]);
        $existente = $check->fetch();

        if ($existente) {
            // Atualiza a resposta mantendo histórico do aluno
            $stmt = $pdo->prepare("
                UPDATE respostas_modulos 
                SET respostas_json = :respostas_json, data_envio = CURRENT_TIMESTAMP
                WHERE id_resposta = :id_resposta
            ");
            $stmt->execute([
                ':respostas_json' => $json,
                ':id_resposta' => $existente['id_resposta']
            ]);
            $id = (int)$existente['id_resposta'];
            $acao = 'atualizado';
        } else {
            // Insere nova submissão
            $stmt = $pdo->prepare("
                INSERT INTO respostas_modulos (id_usuario, modulo_num, respostas_json)
                VALUES (:id_usuario, :modulo_num, :respostas_json)
            ");
            $stmt->execute([
                ':id_usuario' => $id_usuario,
                ':modulo_num' => $modulo_num,
                ':respostas_json' => $json
            ]);
            $id = (int)$pdo->lastInsertId();
            $acao = 'criado';
        }

        return [
            'success' => true,
            'id_resposta' => $id,
            'modulo' => $modulo_num,
            'acao' => $acao,
            'protocolo' => 'SENAI-MOD' . $modulo_num . '-' . str_pad($id, 5, '0', STR_PAD_LEFT),
            'message' => 'Respostas do Módulo ' . $modulo_num . ' gravadas com sucesso no banco de dados!'
        ];
    }

    public static function obterPorAlunoEModulo(int $id_usuario, int $modulo_num): ?array {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM respostas_modulos WHERE id_usuario = :id_usuario AND modulo_num = :modulo_num");
        $stmt->execute([':id_usuario' => $id_usuario, ':modulo_num' => $modulo_num]);
        $row = $stmt->fetch();
        if ($row) {
            $row['respostas'] = json_decode($row['respostas_json'], true);
        }
        return $row ?: null;
    }

    public static function listarTodas(int $filtroModulo = 0, string $filtroTurma = ''): array {
        $pdo = Database::getConnection();

        $sql = "
            SELECT r.*, u.nome, u.email, u.turma, u.cpf
            FROM respostas_modulos r
            INNER JOIN usuarios_portal u ON r.id_usuario = u.id_usuario
            WHERE 1=1
        ";
        $params = [];

        if ($filtroModulo > 0) {
            $sql .= " AND r.modulo_num = :modulo";
            $params[':modulo'] = $filtroModulo;
        }

        if (!empty($filtroTurma)) {
            $sql .= " AND u.turma LIKE :turma";
            $params[':turma'] = '%' . trim($filtroTurma) . '%';
        }

        $sql .= " ORDER BY r.data_envio DESC";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $lista = $stmt->fetchAll();

        foreach ($lista as &$item) {
            $item['respostas'] = json_decode($item['respostas_json'], true);
        }

        return $lista;
    }

    public static function avaliar(int $id_resposta, float $nota, string $feedback): bool {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
            UPDATE respostas_modulos 
            SET nota = :nota, feedback_professor = :feedback 
            WHERE id_resposta = :id_resposta
        ");
        return $stmt->execute([
            ':nota' => $nota,
            ':feedback' => trim($feedback),
            ':id_resposta' => $id_resposta
        ]);
    }

    public static function contarPendentesDeAvaliacao(): int {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT COUNT(*) FROM respostas_modulos WHERE nota IS NULL");
        return (int)$stmt->fetchColumn();
    }

    public static function obterMatrizNotas(?string $filtroTurma = ''): array {
        $pdo = Database::getConnection();
        
        $sqlAlunos = "SELECT id_usuario, nome, email, turma FROM usuarios_portal WHERE nivel = 'aluno'";
        $params = [];
        if (!empty($filtroTurma)) {
            $sqlAlunos .= " AND turma LIKE :turma";
            $params[':turma'] = '%' . trim($filtroTurma) . '%';
        }
        $sqlAlunos .= " ORDER BY turma ASC, nome ASC";
        $stmt = $pdo->prepare($sqlAlunos);
        $stmt->execute($params);
        $alunos = $stmt->fetchAll();

        // Busca todas as respostas
        $stmtResp = $pdo->query("SELECT id_resposta, id_usuario, modulo_num, nota, data_envio FROM respostas_modulos");
        $respostas = $stmtResp->fetchAll();

        $mapaRespostas = [];
        foreach ($respostas as $r) {
            $mapaRespostas[$r['id_usuario']][$r['modulo_num']] = $r;
        }

        $matriz = [];
        foreach ($alunos as $aluno) {
            $uId = $aluno['id_usuario'];
            $linha = [
                'id_usuario' => $uId,
                'nome' => $aluno['nome'],
                'email' => $aluno['email'],
                'turma' => $aluno['turma'],
                'modulos' => [],
                'total_entregue' => 0,
                'soma_notas' => 0,
                'qtd_avaliados' => 0,
                'media' => null
            ];

            for ($m = 1; $m <= 9; $m++) {
                if (isset($mapaRespostas[$uId][$m])) {
                    $item = $mapaRespostas[$uId][$m];
                    $linha['modulos'][$m] = [
                        'enviado' => true,
                        'id_resposta' => $item['id_resposta'],
                        'nota' => $item['nota'],
                        'data_envio' => $item['data_envio']
                    ];
                    $linha['total_entregue']++;
                    if ($item['nota'] !== null) {
                        $linha['soma_notas'] += floatval($item['nota']);
                        $linha['qtd_avaliados']++;
                    }
                } else {
                    $linha['modulos'][$m] = [
                        'enviado' => false,
                        'id_resposta' => null,
                        'nota' => null,
                        'data_envio' => null
                    ];
                }
            }

            if ($linha['qtd_avaliados'] > 0) {
                $linha['media'] = round($linha['soma_notas'] / $linha['qtd_avaliados'], 1);
            }

            $matriz[] = $linha;
        }

        return $matriz;
    }
}
