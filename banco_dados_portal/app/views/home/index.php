<!-- Grid de 2 Cards por Linha -->
<div class="modules-grid-2cols">
    <?php foreach ($modules as $id => $mod): 
        $cleanTitle = preg_replace('/^Módulo\s*\d+\s*:\s*/i', '', $mod['title']);
    ?>
    <a href="index.php?modulo=<?= $id ?>" class="module-strip-card mod-<?= $id ?>">
        <div class="module-strip-badge">
            <span class="badge-label">Módulo</span>
            <span class="badge-num">0<?= $id ?></span>
        </div>
        
        <div class="module-strip-content">
            <div class="module-strip-header-row">
                <h3 class="module-strip-title"><?= htmlspecialchars($cleanTitle) ?></h3>
                <svg class="module-strip-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
            
            <p class="module-strip-summary"><?= htmlspecialchars($mod['summary']) ?></p>
            
            <div class="module-strip-project">
                <span class="project-tag-label">🎯 Projeto:</span>
                <span class="project-tag-name"><?= htmlspecialchars($mod['project_name']) ?></span>
            </div>
        </div>
    </a>
    <?php endforeach; ?>
</div>

<!-- Painel Compacto de Diretrizes e Recomendações -->
<section class="compact-guidelines-box" style="margin-top: 20px;">
    <div class="compact-guidelines-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
        Recomendações Metodológicas e Pedagógicas • SENAI-SP
    </div>
    
    <div class="compact-guidelines-grid">
        <div class="compact-guidelines-card">
            <div class="compact-guidelines-card-title">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                SGBD & Servidor
            </div>
            <ul class="compact-guidelines-list">
                <li>MySQL Community Server 8.0 / MariaDB (XAMPP)</li>
                <li>InnoDB Transacional (ACID) • Porta: 3306</li>
                <li>Codificação: UTF-8 (utf8mb4_unicode_ci)</li>
            </ul>
        </div>
        
        <div class="compact-guidelines-card">
            <div class="compact-guidelines-card-title">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                Software & Ferramentas
            </div>
            <ul class="compact-guidelines-list">
                <li>Oracle MySQL Workbench 8.0 CE & brModelo 3.0</li>
                <li>Visual Studio Code com extensões SQL</li>
                <li>Prompt de Comando / CLI (mysql / mysqldump)</li>
            </ul>
        </div>
        
        <div class="compact-guidelines-card">
            <div class="compact-guidelines-card-title">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                Capacidades Socioemocionais
            </div>
            <ul class="compact-guidelines-list">
                <li>Autogestão, organização e raciocínio analítico</li>
                <li>Atenção aos detalhes em scripts e consultas</li>
                <li>Postura ética e segurança na manipulação de dados</li>
            </ul>
        </div>
    </div>
</section>
