<?php
/**
 * Controlador de Submissão de Respostas dos Módulos (API Endpoint)
 * SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas
 */

require_once __DIR__ . '/../models/RespostaAtividade.php';

class SubmissaoController {
    public function salvar(): void {
        header('Content-Type: application/json; charset=utf-8');

        if (!isset($_SESSION['usuario'])) {
            echo json_encode([
                'success' => false,
                'code' => 'NOT_AUTHENTICATED',
                'message' => 'Você precisa estar autenticado no portal para enviar e registrar suas respostas para a avaliação docente.'
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $idUsuario = (int)$_SESSION['usuario']['id_usuario'];
        $moduloNum = intval($_POST['modulo_num'] ?? 0);

        if ($moduloNum <= 0 || $moduloNum > 9) {
            echo json_encode([
                'success' => false,
                'message' => 'Número de módulo inválido.'
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }

        // Limpa campos internos
        $respostas = $_POST;
        unset($respostas['modulo_num']);
        unset($respostas['action']);

        if (empty($respostas)) {
            echo json_encode([
                'success' => false,
                'message' => 'Nenhuma resposta foi preenchida no formulário.'
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }

        // Salva no banco de dados
        $res = RespostaAtividade::salvarResposta($idUsuario, $moduloNum, $respostas);

        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        exit;
    }
}
