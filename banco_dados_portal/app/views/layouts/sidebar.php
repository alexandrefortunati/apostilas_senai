<?php
/**
 * Layout: App Sidebar (Integrado ao Design System do Projeto)
 * Barra lateral fixa na esquerda perfeitamente alinhada com as cores e estética da página.
 */
?>
<aside class="app-sidebar">
    <!-- Topo da Barra Lateral: Identidade SENAI & Disciplina -->
    <div class="sidebar-brand-header">
        <a href="index.php" class="sidebar-brand-link">
            <span class="senai-pill">SENAI</span>
            <div class="sidebar-brand-info">
                <h1 class="sidebar-brand-title">Banco de Dados <span>(75h)</span></h1>
                <p class="sidebar-brand-subtitle">Habilitação Técnica em DS</p>
            </div>
        </a>
    </div>

    <!-- Navegação Principal -->
    <nav class="sidebar-nav-container">
        <!-- 1º Lugar: Portal Geral -->
        <div class="sidebar-nav-section">
            <a href="../index.php" class="sidebar-nav-item external-portal-item" title="Voltar ao Portal Geral de Disciplinas">
                <div class="nav-item-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </div>
                <div class="nav-item-content">
                    <span class="nav-item-label">Portal Geral</span>
                </div>
                <span class="nav-badge-pill">AULAS</span>
            </a>
        </div>

        <!-- 2º Lugar: Visão Geral & Matriz -->
        <div class="sidebar-nav-section">
            <div class="sidebar-section-title">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                <span>Navegação Principal</span>
            </div>
            
            <a href="index.php" class="sidebar-nav-item">
                <div class="nav-item-icon">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                </div>
                <div class="nav-item-content">
                    <span class="nav-item-label">Visão Geral & Matriz</span>
                </div>
            </a>
        </div>

        <!-- 3º Lugar: Módulos de Aprendizagem com Temas Completos -->
        <div class="sidebar-nav-section">
            <div class="sidebar-section-title">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                <span>Módulos de Aprendizagem</span>
            </div>

            <?php foreach ($modules as $mId => $m): 
                $isActive = ($currentModule === $mId);
                $themeTitle = preg_replace('/^Módulo\s*\d+\s*:\s*/i', '', $m['title']);
            ?>
                <div class="sidebar-module-wrapper <?= $isActive ? 'is-active-module' : '' ?>">
                    <a href="index.php?modulo=<?= $mId ?>" class="sidebar-nav-item <?= $isActive ? 'active' : '' ?>" title="<?= htmlspecialchars($m['title']) ?>">
                        <div class="nav-item-icon">
                            <span class="module-num-badge mod-num-<?= $mId ?>">0<?= $mId ?></span>
                        </div>
                        <div class="nav-item-content">
                            <span class="nav-item-label">Módulo <?= $mId ?></span>
                            <span class="nav-item-sublabel"><?= htmlspecialchars($themeTitle) ?></span>
                        </div>
                        <?php if ($isActive): ?>
                            <svg class="module-arrow-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        <?php endif; ?>
                    </a>

                    <?php if ($isActive && !empty($m['topics'])): ?>
                        <!-- Sumário de Tópicos do Módulo Ativo com ScrollSpy -->
                        <div class="sidebar-subtopics-list">
                            <div class="subtopics-header">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                                <span>Sumário do Módulo</span>
                            </div>
                            <?php foreach ($m['topics'] as $topic): ?>
                                <a href="#<?= $topic['id'] ?>" class="sidebar-subtopic-btn module-nav-btn">
                                    <span class="subtopic-dot"></span>
                                    <span class="subtopic-text"><?= htmlspecialchars($topic['title']) ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </nav>
</aside>

