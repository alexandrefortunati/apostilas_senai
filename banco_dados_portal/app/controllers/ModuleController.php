<?php
/**
 * Controller: ModuleController
 * Gerencia a exibição dos módulos individuais da disciplina de Banco de Dados
 */

require_once __DIR__ . '/../models/CourseData.php';

class ModuleController {
    public function show($id) {
        $module = CourseData::getModuleById($id);
        
        if (!$module) {
            header('Location: index.php');
            exit;
        }

        $courseInfo = CourseData::getCourseInfo();
        $modules = CourseData::getModules();
        $currentModule = $id;
        $pageTitle = $module['title'] . ' | Banco de Dados SENAI-SP';

        require __DIR__ . '/../views/layouts/header.php';
        
        $viewFile = __DIR__ . '/../views/modules/modulo' . $id . '.php';
        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            echo '<div class="alert-box danger">Módulo ' . htmlspecialchars($id) . ' em desenvolvimento.</div>';
        }
        
        require __DIR__ . '/../views/layouts/footer.php';
    }
}
