<aside class="app-sidebar">
    <div class="sidebar-header">
        <div class="brand-badge">SENAI-SP • TÉCNICO TI</div>
        <div class="brand-title">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--accent-cyan);">
                <circle cx="12" cy="12" r="2"></circle>
                <path d="M16.24 7.76a6 6 0 0 1 0 8.49m-8.48-.01a6 6 0 0 1 0-8.49m11.31-2.82a10 10 0 0 1 0 14.14m-14.14 0a10 10 0 0 1 0-14.14"></path>
            </svg>
            Internet das <span>Coisas</span>
        </div>
        <div class="brand-sub">Plano de Curso & Material Didático</div>
    </div>
    
    <nav class="sidebar-nav">
        <div class="nav-section-label">Navegação Principal</div>
        <a href="index.php" class="nav-item-link <?= ($currentModule === 0) ? 'active' : '' ?>">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
            </svg>
            Visão Geral & Matriz
        </a>
        
        <div class="nav-section-label" style="margin-top: 14px;">Módulos de Aprendizagem</div>
        <?php foreach ($modules as $id => $m): ?>
            <a href="index.php?modulo=<?= $id ?>" class="nav-item-link <?= ($currentModule === $id) ? 'active' : '' ?>">
                <span class="nav-module-num"><?= $id ?></span>
                <div style="flex: 1; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    <span>Módulo <?= $id ?></span>
                    <div style="font-size: 11px; color: var(--text-muted); text-overflow: ellipsis; overflow: hidden;"><?= htmlspecialchars(substr($m['project_type'], 0, 26)) ?>...</div>
                </div>
            </a>
        <?php endforeach; ?>
        
        <div class="nav-section-label" style="margin-top: 18px;">Recursos da Disciplina</div>
        <div style="padding: 10px 14px; background: rgba(0,0,0,0.25); border-radius: var(--radius-sm); font-size: 12px; color: var(--text-secondary); line-height: 1.5; border: 1px solid var(--border-color);">
            <div style="color: var(--accent-cyan); font-weight: 700; margin-bottom: 4px;">Padrão Metodológico:</div>
            • 5 Aulas / Módulo (45 min cada)<br>
            • Teoria 100% Apostila SENAI<br>
            • 1ª Prática: Simulação Tinkercad<br>
            • 2ª Prática: Hardware Real + 3D<br>
            • Atividade Avaliativa com Rubrica
        </div>
    </nav>
    
    <div class="sidebar-footer">
        <div>SENAI-SP Editora © 2025</div>
        <div>Carga Horária: 75 horas</div>
    </div>
</aside>
