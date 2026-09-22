<?php
/**
 * Layout: App Sidebar (Integrado ao Design System do Projeto)
 * Barra lateral fixa na esquerda com suporte inteligente para modo Aluno e modo Professor (Admin).
 */

if (!isset($modules) || empty($modules)) {
    require_once __DIR__ . '/../../models/CourseData.php';
    $modules = CourseData::getModules();
}

$isAdminMode = (isset($page) && $page === 'admin');
$currentSec = $currentSection ?? ($_GET['section'] ?? 'dashboard');

// Obter contagens para badges se estiver em modo admin
if ($isAdminMode) {
    if (!isset($qtdPendentes)) {
        require_once __DIR__ . '/../../models/Usuario.php';
        $qtdPendentes = count(Usuario::listarPendentes());
    }
    if (!isset($qtdRespostasPendentes)) {
        require_once __DIR__ . '/../../models/RespostaAtividade.php';
        $qtdRespostasPendentes = RespostaAtividade::contarPendentesDeAvaliacao();
    }
}
?>
<aside class="app-sidebar <?= $isAdminMode ? 'admin-sidebar' : '' ?>">
    <!-- Topo da Barra Lateral: Identidade SENAI & Disciplina -->
    <div class="sidebar-brand-header <?= $isAdminMode ? 'admin-brand-header' : '' ?>">
        <a href="<?= $isAdminMode ? 'index.php?page=admin' : 'index.php' ?>" class="sidebar-brand-link">
            <span class="senai-pill <?= $isAdminMode ? 'admin-senai-pill' : '' ?>">SENAI</span>
            <div class="sidebar-brand-info">
                <h1 class="sidebar-brand-title">Banco de Dados <span>(75h)</span></h1>
                <p class="sidebar-brand-subtitle"><?= $isAdminMode ? 'Portal do Professor • Gestão' : 'Habilitação Técnica em DS' ?></p>
            </div>
        </a>
    </div>

    <!-- SESSÃO DO USUÁRIO (RETÂNGULO COM DEGRADÊ NEUTRO E MINIMALISTA) -->
    <style>
        .sidebar-user-session-card {
            padding: 6px 12px 10px;
            background: transparent;
            border-bottom: 1px solid #f1f5f9;
        }
        .sidebar-user-session-card.admin-user-card {
            border-bottom: 1px solid #eef2ff;
        }
        .session-gradient-box {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 55%, #f1f5f9 100%);
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 9px 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 7px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            transition: all 0.2s ease;
        }
        .session-user-text {
            font-size: 10px;
            color: #64748b;
            text-align: center;
            line-height: 1.3;
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .session-caption {
            color: #64748b;
            font-weight: 500;
        }
        .session-user-name {
            color: #0f172a;
            font-weight: 700;
        }
        .session-portal-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            padding: 2.5px 9px;
            border-radius: 9999px;
            font-size: 9px;
            font-weight: 600;
            color: #be123c;
            background: #fff1f2;
            border: 1px solid #fecdd3;
            text-decoration: none;
            transition: all 0.15s ease;
        }
        .session-portal-btn:hover {
            color: #9f1239;
            background: #ffe4e6;
            border-color: #fda4af;
            box-shadow: 0 1px 3px rgba(225, 29, 72, 0.08);
            transform: translateY(-1px);
        }
        .session-portal-btn svg {
            color: #e11d48;
            transition: transform 0.15s ease, color 0.15s ease;
        }
        .session-portal-btn:hover svg {
            color: #9f1239;
            transform: translateX(-1.5px);
        }
        .user-session-guest {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            text-align: center;
            width: 100%;
        }
        .guest-text {
            font-size: 11px;
            color: #64748b;
        }
        .guest-login-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: #db2777;
            color: #ffffff;
            padding: 5px 12px;
            border-radius: 9999px;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.18s ease;
            box-shadow: 0 1px 2px rgba(219, 39, 119, 0.2);
        }
        .guest-login-btn:hover {
            background: #be185d;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(219, 39, 119, 0.3);
        }
    </style>

    <div class="sidebar-user-session-card <?= $isAdminMode ? 'admin-user-card' : '' ?>">
        <?php if (isset($_SESSION['usuario'])): 
            $user = $_SESSION['usuario'];
            $isAdmin = ($user['nivel'] === 'admin');
            $cleanName = trim(preg_replace('/\s*(•|-|–|—)?\s*SENAI.*$/i', '', $user['nome']));
            if (empty($cleanName)) {
                $cleanName = $user['nome'];
            }
        ?>
            <div class="session-gradient-box">
                <div class="session-user-text" title="Logado como: <?= htmlspecialchars($cleanName) ?>">
                    <span class="session-caption">Logado como:</span>
                    <span class="session-user-name"><?= htmlspecialchars($cleanName) ?></span>
                </div>

                <a href="../index.php" class="session-portal-btn" title="Voltar ao Portal Geral">
                    <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    <span>Portal Geral</span>
                </a>
            </div>

        <?php else: ?>
            <div class="session-gradient-box">
                <div class="user-session-guest">
                    <div class="guest-text">Faça login para registrar suas respostas</div>
                    <a href="../index.php" class="guest-login-btn">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                        <span>Entrar / Cadastrar-se</span>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Navegação Principal -->
    <nav class="sidebar-nav-container">

        <?php if ($isAdminMode): ?>
            <!-- ======================================================= -->
            <!-- NAVEGAÇÃO EXCLUSIVA DO PAINEL DO PROFESSOR (SEPARADA) -->
            <!-- ======================================================= -->

            <!-- 1. Menu de Funcionalidades do Professor -->
            <div class="sidebar-nav-section">
                <div class="sidebar-section-title admin-section-title">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    <span>Gestão Docente</span>
                </div>

                <!-- Link 1: Visão Geral (Dashboard) -->
                <a href="index.php?page=admin&section=dashboard" class="sidebar-nav-item admin-nav-item <?= ($currentSec === 'dashboard') ? 'active' : '' ?>">
                    <div class="nav-item-icon">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                    </div>
                    <div class="nav-item-content">
                        <span class="nav-item-label">Visão Geral</span>
                        <span class="nav-item-sublabel">Métricas e atalhos rápidos</span>
                    </div>
                </a>

                <!-- Link 2: Aprovações Pendentes -->
                <a href="index.php?page=admin&section=pendentes" class="sidebar-nav-item admin-nav-item <?= ($currentSec === 'pendentes') ? 'active' : '' ?>">
                    <div class="nav-item-icon">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                    </div>
                    <div class="nav-item-content">
                        <span class="nav-item-label">Aprovações</span>
                        <span class="nav-item-sublabel">Novos alunos pendentes</span>
                    </div>
                    <?php if (!empty($qtdPendentes) && $qtdPendentes > 0): ?>
                        <span class="admin-badge-count admin-badge-amber" title="<?= $qtdPendentes ?> cadastros pendentes"><?= $qtdPendentes ?></span>
                    <?php endif; ?>
                </a>

                <!-- Link 3: Gestão de Alunos -->
                <a href="index.php?page=admin&section=alunos" class="sidebar-nav-item admin-nav-item <?= ($currentSec === 'alunos') ? 'active' : '' ?>">
                    <div class="nav-item-icon">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <div class="nav-item-content">
                        <span class="nav-item-label">Gestão de Alunos</span>
                        <span class="nav-item-sublabel">Turmas, status e acessos</span>
                    </div>
                </a>

                <!-- Link 4: Correção de Projetos / Respostas -->
                <a href="index.php?page=admin&section=respostas" class="sidebar-nav-item admin-nav-item <?= ($currentSec === 'respostas') ? 'active' : '' ?>">
                    <div class="nav-item-icon">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <div class="nav-item-content">
                        <span class="nav-item-label">Correção de Projetos</span>
                        <span class="nav-item-sublabel">Avaliar respostas (Mód 1 a 9)</span>
                    </div>
                    <?php if (!empty($qtdRespostasPendentes) && $qtdRespostasPendentes > 0): ?>
                        <span class="admin-badge-count admin-badge-rose" title="<?= $qtdRespostasPendentes ?> aguardando nota"><?= $qtdRespostasPendentes ?></span>
                    <?php endif; ?>
                </a>

                <!-- Link 5: Boletim & Notas -->
                <a href="index.php?page=admin&section=notas" class="sidebar-nav-item admin-nav-item <?= ($currentSec === 'notas') ? 'active' : '' ?>">
                    <div class="nav-item-icon">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    </div>
                    <div class="nav-item-content">
                        <span class="nav-item-label">Boletim & Notas</span>
                        <span class="nav-item-sublabel">Matriz geral de rendimento</span>
                    </div>
                </a>
            </div>

            <!-- 2. Atalhos para Conteúdo da Disciplina (Modo Aluno / Consulta) -->
            <div class="sidebar-nav-section">
                <div class="sidebar-section-title admin-section-title">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                    <span>Apostila & Módulos</span>
                </div>

                <a href="index.php" class="sidebar-nav-item admin-nav-item" title="Visualizar a apostila como aluno">
                    <div class="nav-item-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </div>
                    <div class="nav-item-content">
                        <span class="nav-item-label">Ver Apostila (Modo Aluno)</span>
                        <span class="nav-item-sublabel">Navegação normal do curso</span>
                    </div>
                    <span class="nav-badge-pill" style="background: #e0e7ff; color: #4338ca;">AULAS</span>
                </a>

                <!-- Módulos de 1 a 9 com links diretos -->
                <div style="margin-top: 4px; padding-left: 6px;">
                    <?php foreach ($modules as $mId => $m): 
                        $themeTitle = preg_replace('/^Módulo\s*\d+\s*:\s*/i', '', $m['title']);
                    ?>
                        <a href="index.php?modulo=<?= $mId ?>" class="sidebar-subtopic-btn admin-sublink" title="<?= htmlspecialchars($m['title']) ?>">
                            <span class="subtopic-dot" style="background: #818cf8;"></span>
                            <span class="subtopic-text" style="font-size: 11.5px;"><?= $mId ?>. <?= htmlspecialchars($themeTitle) ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- 3. Atalhos Globais -->
            <div class="sidebar-nav-section" style="margin-top: auto; padding-top: 10px; border-top: 1px solid #e2e8f0;">
                <a href="../index.php" class="sidebar-nav-item external-portal-item" title="Voltar ao Portal Geral de Disciplinas">
                    <div class="nav-item-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    </div>
                    <div class="nav-item-content">
                        <span class="nav-item-label">Portal Geral</span>
                    </div>
                </a>
            </div>

        <?php else: ?>
            <!-- ======================================================= -->
            <!-- NAVEGAÇÃO NORMAL DO ALUNO (ESTRUTURA ORIGINAL MANTIDA)  -->
            <!-- ======================================================= -->

            <!-- 1º Lugar: Visão Geral & Matriz -->
            <div class="sidebar-nav-section">
                <div class="sidebar-section-title">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    <span>Navegação Principal</span>
                </div>
                
                <a href="index.php" class="sidebar-nav-item <?= empty($currentModule) ? 'active' : '' ?>">
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
        <?php endif; ?>

    </nav>
</aside>
