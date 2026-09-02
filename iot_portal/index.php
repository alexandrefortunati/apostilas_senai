<?php
/**
 * Front Controller / Roteador MVC da Disciplina de Internet das Coisas
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/app/controllers/HomeController.php';
require_once __DIR__ . '/app/controllers/ModuleController.php';

$action = isset($_GET['modulo']) ? 'modulo' : (isset($_GET['page']) ? $_GET['page'] : 'home');

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
