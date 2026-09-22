<?php
/**
 * View Master: Painel do Professor / Administrador
 * SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas
 */

$msg = $_GET['msg'] ?? '';
$sec = $currentSection ?? ($_GET['section'] ?? 'dashboard');
?>

<div class="admin-dashboard-container">
    
    <!-- CABEÇALHO HERO DO PAINEL DO PROFESSOR COM IDENTIDADE DOCENTE EXCLUSIVA -->
    <header class="admin-hero-banner">
        <div class="admin-hero-content">
            <div class="admin-hero-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
                <span>SENAI-SP • PAINEL DO PROFESSOR</span>
            </div>
            <h1 class="admin-hero-title">
                Gestão Docente & Avaliação de Projetos
            </h1>
            <p class="admin-hero-subtitle">
                Ambiente exclusivo para acompanhamento pedagógico, aprovação de acessos e avaliação dos 9 módulos da disciplina de Banco de Dados.
            </p>
        </div>

        <div class="admin-hero-actions">
            <a href="index.php" class="btn-hero-outline" title="Acessar conteúdo dos módulos como aluno">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                Ver Apostila (Aluno)
            </a>
            <a href="index.php?page=logout" class="btn-hero-logout" title="Encerrar sessão de professor">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                Sair
            </a>
        </div>
    </header>

    <!-- NAVEGAÇÃO EM ABAS SUPERIORES (SINCRONIZADA COM O SIDEBAR) -->
    <nav class="admin-top-nav-tabs">
        <a href="index.php?page=admin&section=dashboard" class="admin-nav-tab <?= ($sec === 'dashboard') ? 'active' : '' ?>">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
            <span>Visão Geral</span>
        </a>

        <a href="index.php?page=admin&section=pendentes" class="admin-nav-tab <?= ($sec === 'pendentes') ? 'active' : '' ?>">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
            <span>Aprovações Pendentes</span>
            <?php if (!empty($qtdPendentes) && $qtdPendentes > 0): ?>
                <span class="tab-badge-amber"><?= $qtdPendentes ?></span>
            <?php endif; ?>
        </a>

        <a href="index.php?page=admin&section=alunos" class="admin-nav-tab <?= ($sec === 'alunos') ? 'active' : '' ?>">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            <span>Gestão de Alunos</span>
        </a>

        <a href="index.php?page=admin&section=respostas" class="admin-nav-tab <?= ($sec === 'respostas') ? 'active' : '' ?>">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            <span>Correção de Projetos</span>
            <?php if (!empty($qtdRespostasPendentes) && $qtdRespostasPendentes > 0): ?>
                <span class="tab-badge-rose"><?= $qtdRespostasPendentes ?></span>
            <?php endif; ?>
        </a>

        <a href="index.php?page=admin&section=notas" class="admin-nav-tab <?= ($sec === 'notas') ? 'active' : '' ?>">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
            <span>Boletim & Notas</span>
        </a>
    </nav>

    <!-- MENSAGENS FLASH DE FEEDBACK DE AÇÕES -->
    <?php if ($msg === 'aluno_aprovado'): ?>
        <div class="admin-alert-banner alert-success">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
            <div>
                <strong>Acesso Liberado com Sucesso!</strong> O aluno agora está ativo e apto a utilizar todos os recursos do portal.
            </div>
        </div>
    <?php elseif ($msg === 'aluno_bloqueado'): ?>
        <div class="admin-alert-banner alert-danger">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
            <div>
                <strong>Acesso Bloqueado!</strong> A conta do aluno foi suspensa pela coordenação.
            </div>
        </div>
    <?php elseif ($msg === 'aluno_reativado'): ?>
        <div class="admin-alert-banner alert-success">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
            <div>
                <strong>Aluno Reativado!</strong> O acesso do aluno foi restabelecido normalmente.
            </div>
        </div>
    <?php elseif ($msg === 'avaliacao_salva'): ?>
        <div class="admin-alert-banner alert-info">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            <div>
                <strong>Avaliação Gravada com Sucesso!</strong> A nota e o feedback docente foram registrados no banco de dados.
            </div>
        </div>
    <?php endif; ?>

    <!-- CONTEÚDO ESPECÍFICO DA SEÇÃO -->
    <section class="admin-section-content">
        <?php 
        switch ($sec) {
            case 'pendentes':
                require __DIR__ . '/pendentes.php';
                break;
            case 'alunos':
                require __DIR__ . '/alunos.php';
                break;
            case 'respostas':
                require __DIR__ . '/respostas.php';
                break;
            case 'notas':
                require __DIR__ . '/notas.php';
                break;
            case 'dashboard':
            default:
                require __DIR__ . '/dashboard.php';
                break;
        }
        ?>
    </section>

</div>
