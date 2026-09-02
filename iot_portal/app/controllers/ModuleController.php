<?php
/**
 * Controller: ModuleController
 * Gerencia a renderização dos 4 módulos com rigorosa padronização de layout e conteúdo.
 */

require_once __DIR__ . '/../models/CourseData.php';

class ModuleController {
    public function show($moduleId) {
        $moduleId = intval($moduleId);
        if ($moduleId < 1 || $moduleId > 4) {
            $moduleId = 1;
        }

        $courseInfo = CourseData::getCourseInfo();
        $modules = CourseData::getModules();
        $module = CourseData::getModuleById($moduleId);
        $currentModule = $moduleId;
        $pageTitle = $module['title'] . ' | IoT SENAI';

        require_once __DIR__ . '/../views/layouts/header.php';
        
        $viewFile = __DIR__ . "/../views/modules/modulo{$moduleId}.php";
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "<div class='container my-5'><h2>Módulo não encontrado</h2></div>";
        }

        require_once __DIR__ . '/../views/layouts/footer.php';
    }
}
