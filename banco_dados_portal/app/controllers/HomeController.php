<?php
/**
 * Controller: HomeController
 * Gerencia a visualização geral da disciplina de Banco de Dados
 */

require_once __DIR__ . '/../models/CourseData.php';

class HomeController {
    public function index() {
        $courseInfo = CourseData::getCourseInfo();
        $modules = CourseData::getModules();
        $currentModule = 0;
        $pageTitle = 'Banco de Dados (75h) | SENAI-SP Habilitação Técnica em Desenvolvimento de Sistemas';

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/home/index.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }
}
