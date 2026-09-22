<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Banco de Dados (75h) | SENAI-SP') ?></title>
    <meta name="description" content="Portal oficial da Unidade Curricular de Banco de Dados - SENAI-SP. Modelagem MER/DER, Normalização, SQL DDL/DML, Consultas Avançadas, Stored Procedures, Triggers e Transações.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- CSS Design System -->
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body class="<?= (isset($page) && $page === 'admin') ? 'admin-theme' : '' ?>">
<div class="app-layout <?= (isset($page) && $page === 'admin') ? 'is-admin-layout' : '' ?>">
    <!-- App Left Sidebar (Estilo APM / SENAI-SP) -->
    <?php require_once __DIR__ . '/sidebar.php'; ?>

    <div class="app-main-wrapper">
        <main class="app-main-content">
            <div class="content-wrapper">
