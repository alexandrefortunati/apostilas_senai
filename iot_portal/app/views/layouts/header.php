<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Internet das Coisas (IoT) | SENAI-SP') ?></title>
    <meta name="description" content="Portal oficial da Unidade Curricular de Internet das Coisas (IoT) - SENAI-SP. Teoria integral, simulações Tinkercad, esquemas animados passo a passo e atividades práticas.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- CSS Design System -->
    <link rel="stylesheet" href="public/css/main.css">

    <!-- Three.js & OrbitControls 3D Engine -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>
</head>
<body>
<div class="app-layout">
    <!-- Top Global Header -->
    <header class="app-top-header">
        <div class="header-inner">
            <div class="brand-group">
                <a href="../index.php" class="back-to-portal-btn" title="Voltar ao Portal Geral de Disciplinas">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    Portal Geral
                </a>
                <div class="header-divider"></div>
                <a href="index.php" class="header-logo">
                    <span class="senai-pill">SENAI</span>
                    <div class="header-titles">
                        <h1>Internet das Coisas <span>(IoT)</span></h1>
                        <p>Habilitação Técnica em Desenvolvimento de Sistemas • 75h</p>
                    </div>
                </a>
            </div>
            
            <nav class="header-nav">
                <a href="index.php" class="nav-btn <?= ($currentModule === 0) ? 'active' : '' ?>">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    Visão Geral
                </a>
                <?php foreach ($modules as $id => $m): ?>
                    <a href="index.php?modulo=<?= $id ?>" class="nav-btn <?= ($currentModule === $id) ? 'active' : '' ?>">
                        <span class="mod-pill"><?= $id ?></span>
                        Módulo <?= $id ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        </div>
    </header>

    <main class="app-main-content">
        <div class="content-wrapper">
