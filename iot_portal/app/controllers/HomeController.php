<?php
/**
 * Controller: HomeController
 * Gerencia a página inicial, visão geral da disciplina e matriz de correlação curricular.
 */

require_once __DIR__ . '/../models/CourseData.php';

class HomeController {
    public function index() {
        $courseInfo = CourseData::getCourseInfo();
        $modules = CourseData::getModules();
        $pageTitle = 'Portal da Disciplina - Internet das Coisas (IoT)';
        $currentModule = 0;

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/home/index.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }
}
