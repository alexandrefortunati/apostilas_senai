<?php
/**
 * Front Controller / Roteador MVC da Disciplina de Banco de Dados
 * SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/app/models/Database.php';
require_once __DIR__ . '/app/controllers/HomeController.php';
require_once __DIR__ . '/app/controllers/ModuleController.php';
require_once __DIR__ . '/app/controllers/AuthController.php';
require_once __DIR__ . '/app/controllers/AdminController.php';
require_once __DIR__ . '/app/controllers/SubmissaoController.php';

// Inicializa o banco de dados e as tabelas automaticamente se necessário
Database::getConnection();

// Submissão assíncrona de respostas dos módulos
if (isset($_GET['action']) && $_GET['action'] === 'salvar-resposta') {
    $subController = new SubmissaoController();
    $subController->salvar();
    exit;
}

$page = isset($_GET['modulo']) ? 'modulo' : (isset($_GET['page']) ? $_GET['page'] : 'home');

// Páginas de autenticação públicas
$publicPages = ['login', 'cadastro', 'esqueci-senha', 'redefinir-senha', 'processar-redefinir-senha'];

// Guarda de Autenticação Geral: direciona para o login raiz
if (!in_array($page, $publicPages)) {
    if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['status'] !== 'ativo') {
        $qs = !empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '';
        $_SESSION['redirect_after_login'] = 'banco_dados_portal/index.php' . $qs;
        header('Location: ../index.php');
        exit;
    }
}

switch ($page) {
    case 'modulo':
        $moduleId = isset($_GET['modulo']) ? intval($_GET['modulo']) : 1;
        $controller = new ModuleController();
        $controller->show($moduleId);
        break;

    // Rotas de Autenticação
    case 'login':
        $auth = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->processLogin();
        } else {
            $auth->showLogin();
        }
        break;

    case 'cadastro':
        $auth = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->processRegister();
        } else {
            $auth->showLogin(null, null, 'cadastro');
        }
        break;

    case 'esqueci-senha':
        $auth = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->processForgotPassword();
        } else {
            $auth->showLogin(null, null, 'esqueci');
        }
        break;

    case 'redefinir-senha':
        $auth = new AuthController();
        $token = $_GET['token'] ?? '';
        $auth->showResetPassword($token);
        break;

    case 'processar-redefinir-senha':
        $auth = new AuthController();
        $auth->processResetPassword();
        break;

    case 'logout':
        $auth = new AuthController();
        $auth->logout();
        break;

    // Rota do Painel do Professor / Administrador
    case 'admin':
        $admin = new AdminController();
        $subAction = $_GET['action'] ?? 'index';

        if ($subAction === 'aprovar') {
            $id = intval($_GET['id'] ?? 0);
            $admin->approveStudent($id);
        } elseif ($subAction === 'bloquear') {
            $id = intval($_GET['id'] ?? 0);
            $admin->blockStudent($id);
        } elseif ($subAction === 'reativar') {
            $id = intval($_GET['id'] ?? 0);
            $admin->reactivateStudent($id);
        } elseif ($subAction === 'avaliar') {
            $admin->gradeSubmission();
        } else {
            $admin->index();
        }
        break;

    case 'home':
    default:
        $controller = new HomeController();
        $controller->index();
        break;
}
