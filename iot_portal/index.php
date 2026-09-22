<?php
/**
 * Front Controller / Roteador MVC da Disciplina de Internet das Coisas
 * SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/app/controllers/HomeController.php';
require_once __DIR__ . '/app/controllers/ModuleController.php';

$action = isset($_GET['modulo']) ? 'modulo' : (isset($_GET['page']) ? $_GET['page'] : 'home');

// Guarda de Autenticação Geral: direciona para o login raiz se não estiver ativo
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['status'] !== 'ativo') {
    $qs = !empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '';
    $_SESSION['redirect_after_login'] = 'iot_portal/index.php' . $qs;
    header('Location: ../index.php');
    exit;
}

switch ($action) {
    case 'modulo':
        $moduleId = isset($_GET['modulo']) ? intval($_GET['modulo']) : 1;
        $controller = new ModuleController();
        $controller->show($moduleId);
        break;

    case 'home':
    default:
        $controller = new HomeController();
        $controller->index();
        break;
}

