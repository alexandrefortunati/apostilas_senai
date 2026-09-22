<?php
/**
 * Layout: App Sidebar (Integrado ao Design System do Projeto)
 * Barra lateral fixa na esquerda com suporte inteligente para modo Aluno e modo Professor.
 */

if (!isset($modules) || empty($modules)) {
    require_once __DIR__ . '/../../models/CourseData.php';
    $modules = CourseData::getModules();
}

$isAdminMode = (isset($page) && $page === 'admin');
$currentSec = $currentSection ?? ($_GET['section'] ?? 'dashboard');
?>
<aside class="app-sidebar <?= $isAdminMode ? 'admin-sidebar' : '' ?>">
    <!-- Topo da Barra Lateral: Identidade SENAI & Disciplina -->
    <div class="sidebar-brand-header <?= $isAdminMode ? 'admin-brand-header' : '' ?>">
        <a href="<?= $isAdminMode ? 'index.php?page=admin' : 'index.php' ?>" class="sidebar-brand-link">
            <span class="senai-pill <?= $isAdminMode ? 'admin-senai-pill' : '' ?>">SENAI</span>
            <div class="sidebar-brand-info">
                <h1 class="sidebar-brand-title" style="white-space: nowrap; font-size: 13.5px;">Internet das Coisas <span>(75h)</span></h1>
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

        <!-- 2º Lugar: Módulos de Aprendizagem com Temas Completos -->
        <div class="sidebar-nav-section">
            <div class="sidebar-section-title">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                <span>Módulos de Aprendizagem</span>
            </div>

            <?php foreach ($modules as $mId => $m): 
                $isActive = (isset($currentModule) && $currentModule === $mId);
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
                                <a href="#<?= $topic['id'] ?>" class="sidebar-subtopic-btn">
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
