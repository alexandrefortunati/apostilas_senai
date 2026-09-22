<?php
/**
 * Controlador da Área Administrativa (Professor / Coordenação)
 * SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas
 */

require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/RespostaAtividade.php';
require_once __DIR__ . '/../models/CourseData.php';

class AdminController {
    public function __construct() {
        // Proteção de Acesso: Apenas administradores logados
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['nivel'] !== 'admin') {
            $_SESSION['redirect_after_login'] = 'index.php?page=admin';
            header('Location: index.php?page=login');
            exit;
        }
    }

    public function index(): void {
        $section = $_GET['section'] ?? 'dashboard';
        $validSections = ['dashboard', 'pendentes', 'alunos', 'respostas', 'notas'];
        if (!in_array($section, $validSections)) {
            $section = 'dashboard';
        }

        $currentSection = $section;
        $page = 'admin';
        $currentModule = null;
        $modules = CourseData::getModules();
        $turmasDisponiveis = Usuario::listarTurmasDistintas();

        // Contadores globais para o Sidebar e Métricas
        $alunosPendentes = Usuario::listarPendentes();
        $qtdPendentes = count($alunosPendentes);
        $qtdRespostasPendentes = RespostaAtividade::contarPendentesDeAvaliacao();

        // Dados específicos de acordo com a seção solicitada
        switch ($section) {
            case 'pendentes':
                $pageTitle = 'Aprovações Pendentes • Painel do Professor | SENAI-SP';
                break;

            case 'alunos':
                $pageTitle = 'Gestão de Alunos • Painel do Professor | SENAI-SP';
                $filtroStatus = $_GET['filtro_status'] ?? '';
                $filtroTurma = $_GET['filtro_turma'] ?? '';
                $busca = $_GET['busca'] ?? '';
                $listaAlunos = Usuario::listarAlunosFiltrados($filtroStatus, $filtroTurma, $busca);
                break;

            case 'respostas':
                $pageTitle = 'Correção de Projetos & Atividades • Painel do Professor | SENAI-SP';
                $filtroModulo = isset($_GET['filtro_modulo']) ? intval($_GET['filtro_modulo']) : 0;
                $filtroTurma = isset($_GET['filtro_turma']) ? trim($_GET['filtro_turma']) : '';
                $filtroStatusNota = $_GET['filtro_status_nota'] ?? '';
                
                $todasRespostas = RespostaAtividade::listarTodas($filtroModulo, $filtroTurma);
                if ($filtroStatusNota === 'pendente') {
                    $respostas = array_filter($todasRespostas, fn($r) => $r['nota'] === null);
                } elseif ($filtroStatusNota === 'avaliado') {
                    $respostas = array_filter($todasRespostas, fn($r) => $r['nota'] !== null);
                } else {
                    $respostas = $todasRespostas;
                }
                break;

            case 'notas':
                $pageTitle = 'Boletim Consolidado de Notas • Painel do Professor | SENAI-SP';
                $filtroTurma = isset($_GET['filtro_turma']) ? trim($_GET['filtro_turma']) : '';
                $matrizNotas = RespostaAtividade::obterMatrizNotas($filtroTurma);
                break;

            case 'dashboard':
            default:
                $pageTitle = 'Painel do Professor • Visão Geral | SENAI-SP';
                $todosAlunos = Usuario::listarTodosAlunos();
                $totalAlunos = count($todosAlunos);
                $ultimasRespostas = RespostaAtividade::listarTodas(0, '');
                $totalRespostas = count($ultimasRespostas);
                $ultimosEnvios = array_slice($ultimasRespostas, 0, 6);
                break;
        }

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/admin/index.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    public function approveStudent(int $id): void {
        Usuario::aprovar($id);
        $return = $_GET['return_section'] ?? 'pendentes';
        header("Location: index.php?page=admin&section={$return}&msg=aluno_aprovado");
        exit;
    }

    public function blockStudent(int $id): void {
        Usuario::bloquear($id);
        $return = $_GET['return_section'] ?? 'alunos';
        header("Location: index.php?page=admin&section={$return}&msg=aluno_bloqueado");
        exit;
    }

    public function reactivateStudent(int $id): void {
        Usuario::reativar($id);
        $return = $_GET['return_section'] ?? 'alunos';
        header("Location: index.php?page=admin&section={$return}&msg=aluno_reativado");
        exit;
    }

    public function gradeSubmission(): void {
        $idResposta = intval($_POST['id_resposta'] ?? 0);
        $nota = floatval($_POST['nota'] ?? 0);
        $feedback = trim($_POST['feedback'] ?? '');
        $returnSection = $_POST['return_section'] ?? 'respostas';
        $filtroModulo = intval($_POST['filtro_modulo'] ?? 0);

        if ($idResposta > 0) {
            RespostaAtividade::avaliar($idResposta, $nota, $feedback);
        }

        $redirectUrl = "index.php?page=admin&section={$returnSection}&msg=avaliacao_salva";
        if ($filtroModulo > 0) {
            $redirectUrl .= "&filtro_modulo={$filtroModulo}";
        }
        $redirectUrl .= "#resp-card-{$idResposta}";

        header("Location: {$redirectUrl}");
        exit;
    }
}
