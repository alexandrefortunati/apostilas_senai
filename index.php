<?php
/**
 * Portal Principal de Disciplinas - SENAI-SP
 * Habilitação Técnica em Desenvolvimento de Sistemas (1.200 Horas)
 * Layout moderno em cores neutras e fundo claro.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Ação de Logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['usuario']);
    session_destroy();
    header('Location: index.php');
    exit;
}

// 2. Guarda de Autenticação: O login aparece antes desta página
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['status'] !== 'ativo' || (isset($_GET['action']) && $_GET['action'] === 'redefinir')) {
    require_once __DIR__ . '/login.php';
    exit;
}

$currentUser = $_SESSION['usuario'];

$disciplinas = [
    // MÓDULO BÁSICO (300 Horas)
    [
        'id' => 'logica-programacao',
        'modulo_tipo' => 'Módulo Básico',
        'modulo_code' => 'basico',
        'nome' => 'Lógica de Programação e Algoritmos',
        'horas' => 75,
        'icone' => 'code',
        'status' => 'Ementa Disponível',
        'status_type' => 'info',
        'descricao' => 'Conceitos fundamentais de lógica algorítmica, estruturas condicionais e de repetição, vetores, matrizes e funções estruturadas.',
        'capacidades' => 'Desenvolver algoritmos estruturados para a solução de problemas lógicos e matemáticos.',
        'link' => '#',
        'destaque' => false
    ],
    [
        'id' => 'levantamento-requisitos',
        'modulo_tipo' => 'Módulo Básico',
        'modulo_code' => 'basico',
        'nome' => 'Levantamento de Requisitos',
        'horas' => 60,
        'icone' => 'file-text',
        'status' => 'Ementa Disponível',
        'status_type' => 'info',
        'descricao' => 'Engenharia de requisitos, técnicas de elicitação, diagramas de casos de uso (UML), histórias de usuário e prototipagem de telas.',
        'capacidades' => 'Identificar e documentar os requisitos funcionais e não-funcionais de sistemas.',
        'link' => '#',
        'destaque' => false
    ],
    [
        'id' => 'arquitetura-redes-iot',
        'modulo_tipo' => 'Módulo Básico',
        'modulo_code' => 'basico',
        'nome' => 'Arquitetura de Redes com IoT',
        'horas' => 75,
        'icone' => 'share-2',
        'status' => 'Ementa Disponível',
        'status_type' => 'info',
        'descricao' => 'Modelos OSI e TCP/IP, topologias de rede cabeada e sem fio, endereçamento IPv4/IPv6, roteamento e noções de conectividade de nós sensores.',
        'capacidades' => 'Projetar e configurar a infraestrutura de redes locais e roteamento para dispositivos de rede.',
        'link' => '#',
        'destaque' => false
    ],
    [
        'id' => 'sistemas-operacionais',
        'modulo_tipo' => 'Módulo Básico',
        'modulo_code' => 'basico',
        'nome' => 'Sistemas Operacionais',
        'horas' => 90,
        'icone' => 'terminal',
        'status' => 'Ementa Disponível',
        'status_type' => 'info',
        'descricao' => 'Gerenciamento de memória, processos e sistemas de arquivos em ambientes Windows e Linux, scripts shell e virtualização.',
        'capacidades' => 'Administrar sistemas operacionais de clientes e servidores para suporte ao desenvolvimento.',
        'link' => '#',
        'destaque' => false
    ],

    // MÓDULO ESPECÍFICO I (720 Horas)
    [
        'id' => 'banco-de-dados',
        'modulo_tipo' => 'Módulo Específico I',
        'modulo_code' => 'especifico-1',
        'nome' => 'Banco de Dados',
        'horas' => 75,
        'icone' => 'database',
        'status' => 'Material Completo & Interativo',
        'status_type' => 'active',
        'descricao' => 'Modelagem conceitual (MER), lógica e física, normalização de dados (1FN, 2FN, 3FN), SQL DDL/DML, JOINs, Procedures, Triggers e Terminal Interativo.',
        'capacidades' => 'Criar estrutura para armazenamento, manipulação e persistência de dados (Páginas 41-43 do Plano de Curso).',
        'link' => 'banco_dados_portal/index.php',
        'destaque' => false
    ],
    [
        'id' => 'linguagem-marcacao',
        'modulo_tipo' => 'Módulo Específico I',
        'modulo_code' => 'especifico-1',
        'nome' => 'Linguagem de Marcação',
        'horas' => 75,
        'icone' => 'layout',
        'status' => 'Ementa Disponível',
        'status_type' => 'info',
        'descricao' => 'Estruturação de documentos para a Web com HTML5 semântico, estilização com CSS3, design responsivo, Flexbox e Grid layout.',
        'capacidades' => 'Construir páginas web estáticas e responsivas aderentes aos padrões do W3C.',
        'link' => '#',
        'destaque' => false
    ],
    [
        'id' => 'programacao-backend',
        'modulo_tipo' => 'Módulo Específico I',
        'modulo_code' => 'especifico-1',
        'nome' => 'Programação Back-End',
        'horas' => 225,
        'icone' => 'server',
        'status' => 'Ementa Disponível',
        'status_type' => 'info',
        'descricao' => 'Desenvolvimento de APIs RESTful, arquitetura MVC, autenticação JWT, integração com bancos de dados e regras de negócio no servidor.',
        'capacidades' => 'Implementar serviços de back-end robustos, seguros e escaláveis.',
        'link' => '#',
        'destaque' => false
    ],
    [
        'id' => 'programacao-frontend',
        'modulo_tipo' => 'Módulo Específico I',
        'modulo_code' => 'especifico-1',
        'nome' => 'Programação Front-End',
        'horas' => 150,
        'icone' => 'monitor',
        'status' => 'Ementa Disponível',
        'status_type' => 'info',
        'descricao' => 'Programação interativa com JavaScript assíncrono (ES6+), manipulação do DOM, consumo de APIs REST e Single Page Applications (SPAs).',
        'capacidades' => 'Desenvolver interfaces web dinâmicas e ricas em experiência do usuário.',
        'link' => '#',
        'destaque' => false
    ],
    [
        'id' => 'dispositivos-moveis',
        'modulo_tipo' => 'Módulo Específico I',
        'modulo_code' => 'especifico-1',
        'nome' => 'Programação para Dispositivos Móveis',
        'horas' => 120,
        'icone' => 'smartphone',
        'status' => 'Ementa Disponível',
        'status_type' => 'info',
        'descricao' => 'Criação de aplicativos para smartphones e tablets, ciclo de vida de apps, consumo de sensores e publicação em lojas de aplicativos.',
        'capacidades' => 'Construir aplicativos móveis integrados a serviços web e recursos nativos dos aparelhos.',
        'link' => '#',
        'destaque' => false
    ],
    [
        'id' => 'iot',
        'modulo_tipo' => 'Módulo Específico I',
        'modulo_code' => 'especifico-1',
        'nome' => 'Internet das Coisas (IoT)',
        'horas' => 75,
        'icone' => 'cpu',
        'status' => 'Material Completo & Interativo',
        'status_type' => 'active',
        'descricao' => 'Integração de sistemas com sensores, atuadores, protocolos MQTT/HTTP, plataformas na nuvem, simulações Tinkercad e montagens práticas de circuitos.',
        'capacidades' => 'Implementar soluções com tecnologias de IoT para integração de sistemas e interfaces visuais (Páginas 58-59 do Plano de Curso).',
        'link' => 'iot_portal/index.php',
        'destaque' => false
    ],

    // MÓDULO ESPECÍFICO II (180 Horas)
    [
        'id' => 'teste-software',
        'modulo_tipo' => 'Módulo Específico II',
        'modulo_code' => 'especifico-2',
        'nome' => 'Teste de Software',
        'horas' => 45,
        'icone' => 'check-circle',
        'status' => 'Ementa Disponível',
        'status_type' => 'info',
        'descricao' => 'Técnicas de testes de caixa preta e branca, testes unitários, testes de integração, testes automatizados e relatórios de conformidade.',
        'capacidades' => 'Assegurar a qualidade e o cumprimento dos requisitos funcionais do software.',
        'link' => '#',
        'destaque' => false
    ],
    [
        'id' => 'projetos-software',
        'modulo_tipo' => 'Módulo Específico II',
        'modulo_code' => 'especifico-2',
        'nome' => 'Projetos de Software',
        'horas' => 135,
        'icone' => 'briefcase',
        'status' => 'Ementa Disponível',
        'status_type' => 'info',
        'descricao' => 'Planejamento e execução de projeto integrador final utilizando metodologias ágeis (Scrum/Kanban), versionamento com Git e entrega final.',
        'capacidades' => 'Desenvolver um projeto de software completo e funcional em equipe multidisciplinar.',
        'link' => '#',
        'destaque' => false
    ]
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Acadêmico de Disciplinas | SENAI-SP</title>
    <meta name="description" content="Portal de navegação entre as disciplinas do Curso Técnico em Desenvolvimento de Sistemas do SENAI-SP.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --bg-subtle: #f1f5f9;
            --border-color: #e2e8f0;
            --border-hover: #cbd5e1;
            
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --senai-red: #d32f2f;
            --senai-red-hover: #b91c1c;
            --accent-emerald: #059669;
            --accent-amber: #d97706;
            --accent-cyan: #0284c7;
            
            --text-main: #0f172a;
            --text-secondary: #475569;
            --text-muted: #64748b;
            
            --font-main: 'Inter', sans-serif;
            --font-heading: 'Outfit', sans-serif;
            
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 22px;
            
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 10px 25px -5px rgba(0, 0, 0, 0.06), 0 8px 10px -6px rgba(0, 0, 0, 0.03);
            --shadow-hover: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            font-family: var(--font-main);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Top Navbar */
        .portal-navbar {
            background: #ffffff;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
        }

        .navbar-inner {
            max-width: 1320px;
            margin: 0 auto;
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .portal-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            color: var(--text-main);
        }

        .brand-logo-pill {
            background: var(--senai-red);
            color: #ffffff;
            font-weight: 900;
            font-size: 14px;
            padding: 6px 14px;
            border-radius: 8px;
            letter-spacing: 0.5px;
        }

        .brand-text h1 {
            font-family: var(--font-heading);
            font-size: 18px;
            font-weight: 700;
            color: var(--text-main);
            line-height: 1.2;
        }

        .brand-text p {
            font-size: 12px;
            color: var(--text-muted);
        }

        .nav-right-stats {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .stat-pill {
            background: var(--bg-subtle);
            border: 1px solid var(--border-color);
            padding: 6px 14px;
            border-radius: 9999px;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--text-secondary);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* Hero Container */
        .portal-hero {
            max-width: 1320px;
            margin: 32px auto 24px;
            padding: 0 24px;
            width: 100%;
        }

        .hero-banner {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-xl);
            padding: 40px 48px;
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 32px;
        }

        .hero-banner::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 320px;
            height: 100%;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.04) 0%, rgba(211, 47, 47, 0.03) 100%);
            pointer-events: none;
        }

        .hero-content {
            max-width: 750px;
        }

        .hero-badge-row {
            display: flex;
            gap: 8px;
            margin-bottom: 14px;
            flex-wrap: wrap;
        }

        .badge-subtle {
            background: #eff6ff;
            color: var(--primary);
            border: 1px solid #dbeafe;
            font-size: 11.5px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 6px;
            text-transform: uppercase;
        }

        .badge-subtle.red {
            background: #fee2e2;
            color: var(--senai-red);
            border-color: #fecaca;
        }

        .hero-title {
            font-family: var(--font-heading);
            font-size: 32px;
            font-weight: 800;
            color: var(--text-main);
            line-height: 1.25;
            margin-bottom: 12px;
        }

        .hero-lead {
            font-size: 15.5px;
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .hero-metrics {
            display: flex;
            gap: 18px;
        }

        .metric-box {
            background: var(--bg-subtle);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 16px 20px;
            text-align: center;
            min-width: 110px;
        }

        .metric-value {
            font-family: var(--font-heading);
            font-size: 26px;
            font-weight: 800;
            color: var(--text-main);
            line-height: 1;
            margin-bottom: 4px;
        }

        .metric-label {
            font-size: 11.5px;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
        }

        /* Controls / Filter Bar */
        .portal-controls {
            max-width: 1320px;
            margin: 0 auto 28px;
            padding: 0 24px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .filter-tabs {
            display: flex;
            gap: 8px;
            background: #ffffff;
            padding: 6px;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        .filter-btn {
            background: transparent;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .filter-btn:hover {
            color: var(--text-main);
            background: var(--bg-subtle);
        }

        .filter-btn.active {
            background: var(--primary);
            color: #ffffff;
        }

        .search-box {
            position: relative;
            min-width: 280px;
        }

        .search-input {
            width: 100%;
            padding: 10px 16px 10px 38px;
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            font-size: 13.5px;
            color: var(--text-main);
            box-shadow: var(--shadow-sm);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }

        /* Disciplines Grid */
        .disciplines-container {
            max-width: 1320px;
            margin: 0 auto 48px;
            padding: 0 24px;
            width: 100%;
            flex: 1;
        }

        .disciplines-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 24px;
        }

        .discipline-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: 28px;
            box-shadow: var(--shadow-sm);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
            position: relative;
        }

        .discipline-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
            border-color: var(--border-hover);
        }

        .discipline-card.featured {
            border: 1px solid var(--border-color);
            background: var(--bg-card);
        }

        .card-top {
            margin-bottom: 18px;
        }

        .card-header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .module-type-tag {
            font-size: 11.5px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .hours-badge {
            background: var(--bg-subtle);
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            font-size: 12px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 9999px;
        }

        .discipline-title {
            font-family: var(--font-heading);
            font-size: 20px;
            font-weight: 700;
            color: var(--text-main);
            line-height: 1.35;
            margin-bottom: 10px;
        }

        .discipline-desc {
            font-size: 13.5px;
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 16px;
        }

        .capacity-box {
            background: var(--bg-subtle);
            border-left: 3px solid var(--primary);
            border-radius: 0 6px 6px 0;
            padding: 10px 14px;
            font-size: 12px;
            color: var(--text-secondary);
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .card-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn-card-action {
            flex: 1;
            padding: 11px 18px;
            border-radius: var(--radius-md);
            font-size: 13px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            border: none;
        }

        .btn-card-action.primary {
            background: var(--senai-red);
            color: #ffffff;
        }

        .btn-card-action.primary:hover {
            background: var(--senai-red-hover);
            box-shadow: 0 4px 12px rgba(211, 47, 47, 0.2);
        }

        .btn-card-action.secondary {
            background: var(--bg-subtle);
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
        }

        .btn-card-action.secondary:hover {
            background: #e2e8f0;
            color: var(--text-main);
        }

        /* Modal Syllabus */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(4px);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal-card {
            background: #ffffff;
            border-radius: var(--radius-xl);
            max-width: 650px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: var(--shadow-lg);
            padding: 32px;
            position: relative;
        }

        .modal-close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--bg-subtle);
            border: 1px solid var(--border-color);
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: 700;
            color: var(--text-muted);
        }

        .modal-close-btn:hover {
            background: #e2e8f0;
            color: var(--text-main);
        }

        /* Footer */
        .portal-footer {
            background: #ffffff;
            border-top: 1px solid var(--border-color);
            padding: 24px;
            margin-top: auto;
        }

        .footer-inner {
            max-width: 1320px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: var(--text-muted);
            flex-wrap: wrap;
            gap: 12px;
        }

        @media (max-width: 768px) {
            .hero-banner {
                flex-direction: column;
                align-items: flex-start;
                padding: 28px;
            }
            .hero-metrics {
                width: 100%;
            }
            .metric-box {
                flex: 1;
            }
            .disciplines-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- Top Navbar -->
    <header class="portal-navbar">
        <div class="navbar-inner">
            <a href="index.php" class="portal-brand">
                <div class="brand-logo-pill">SENAI</div>
                <div class="brand-text">
                    <h1>Portal de Disciplinas</h1>
                    <p>Habilitação Técnica em Desenvolvimento de Sistemas</p>
                </div>
            </a>
            
            <div class="nav-right-stats">
                <div class="stat-pill">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    1.200 Horas Totais
                </div>

                <!-- Perfil do Usuário Autenticado -->
                <div style="display: flex; align-items: center; gap: 8px; background: #ffffff; border: 1px solid #cbd5e1; padding: 4px 12px 4px 8px; border-radius: 9999px; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
                    <span style="font-size: 10px; font-weight: 800; padding: 3px 8px; border-radius: 12px; <?= ($currentUser['nivel'] === 'admin') ? 'background: #fdf2f8; color: #db2777; border: 1px solid #fbcfe8;' : 'background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0;' ?>">
                        <?= ($currentUser['nivel'] === 'admin') ? 'PROFESSOR / ADMIN' : 'ALUNO' ?>
                    </span>
                    <span style="font-size: 12px; font-weight: 700; color: #0f172a;">
                        <?= htmlspecialchars($currentUser['nome']) ?>
                    </span>

                    <?php if ($currentUser['nivel'] === 'admin'): ?>
                        <a href="banco_dados_portal/index.php?page=admin" style="font-size: 11px; font-weight: 700; color: #0284c7; text-decoration: none; padding: 2px 6px; border-radius: 4px; background: #f0f9ff;" title="Painel Docente">
                            🎓 Painel
                        </a>
                    <?php endif; ?>

                    <a href="index.php?action=logout" style="font-size: 11px; font-weight: 700; color: #dc2626; text-decoration: none; padding: 2px 6px; border-radius: 4px; background: #fef2f2;" title="Encerrar Sessão">
                        Sair
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="portal-hero">
        <div class="hero-banner">
            <div class="hero-content">
                <div class="hero-badge-row">
                    <span class="badge-subtle red">SENAI-SP • Educação Profissional</span>
                    <span class="badge-subtle">Tecnologia da Informação</span>
                </div>
                <h2 class="hero-title">Matriz Curricular e Ambientes de Aprendizagem</h2>
                <p class="hero-lead">
                    Navegue por todas as unidades curriculares do curso. Acesse conteúdos didáticos oficiais, roteiros práticos orientados, simulações virtuais e montagens práticas de projetos em bancada.
                </p>
            </div>
            
            <div class="hero-metrics">
                <div class="metric-box">
                    <div class="metric-value">12</div>
                    <div class="metric-label">Disciplinas</div>
                </div>
                <div class="metric-box">
                    <div class="metric-value">3</div>
                    <div class="metric-label">Módulos</div>
                </div>
                <div class="metric-box">
                    <div class="metric-value" style="color: var(--primary);">75h</div>
                    <div class="metric-label">IoT Portal</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter & Search Controls -->
    <div class="portal-controls">
        <div class="filter-tabs">
            <button class="filter-btn active" data-filter="all">Todas (12)</button>
            <button class="filter-btn" data-filter="basico">Módulo Básico (4)</button>
            <button class="filter-btn" data-filter="especifico-1">Módulo Específico I (6)</button>
            <button class="filter-btn" data-filter="especifico-2">Módulo Específico II (2)</button>
        </div>
        
        <div class="search-box">
            <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" id="searchInput" class="search-input" placeholder="Buscar disciplina ou palavra-chave...">
        </div>
    </div>

    <!-- Disciplines Grid -->
    <main class="disciplines-container">
        <div class="disciplines-grid" id="disciplinesGrid">
            <?php foreach ($disciplinas as $d): ?>
            <article class="discipline-card <?= $d['destaque'] ? 'featured' : '' ?>" data-module="<?= $d['modulo_code'] ?>" data-name="<?= strtolower($d['nome']) ?>">
                <div class="card-top">
                    <div class="card-header-row">
                        <span class="module-type-tag"><?= htmlspecialchars($d['modulo_tipo']) ?></span>
                        <span class="hours-badge"><?= $d['horas'] ?> Horas</span>
                    </div>
                    
                    <h3 class="discipline-title"><?= htmlspecialchars($d['nome']) ?></h3>
                    <p class="discipline-desc"><?= htmlspecialchars($d['descricao']) ?></p>
                    
                    <div class="capacity-box">
                        <strong>Capacidade Técnica:</strong><br>
                        <?= htmlspecialchars($d['capacidades']) ?>
                    </div>
                </div>
                
                <div class="card-actions">
                    <?php if (!empty($d['link']) && $d['link'] !== '#'): ?>
                        <a href="<?= $d['link'] ?>" class="btn-card-action primary">
                            Acessar Disciplina &rarr;
                        </a>
                    <?php else: ?>
                        <button class="btn-card-action secondary btn-open-syllabus" data-title="<?= htmlspecialchars($d['nome']) ?>" data-hours="<?= $d['horas'] ?> Horas" data-type="<?= htmlspecialchars($d['modulo_tipo']) ?>" data-desc="<?= htmlspecialchars($d['descricao']) ?>" data-cap="<?= htmlspecialchars($d['capacidades']) ?>">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                            Ver Ementa Oficial
                        </button>
                    <?php endif; ?>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Modal for Syllabus Info -->
    <div id="syllabusModal" class="modal-overlay">
        <div class="modal-card">
            <button id="closeModalBtn" class="modal-close-btn">&times;</button>
            <div style="display: flex; gap: 8px; margin-bottom: 10px;">
                <span id="modalType" class="badge-subtle">Módulo</span>
                <span id="modalHours" class="hours-badge">0h</span>
            </div>
            <h2 id="modalTitle" style="font-family: var(--font-heading); font-size: 22px; color: var(--text-main); margin-bottom: 14px;">Título da Disciplina</h2>
            <div style="border-top: 1px solid var(--border-color); padding-top: 16px; margin-bottom: 16px;">
                <h4 style="font-size: 13px; text-transform: uppercase; color: var(--text-muted); margin-bottom: 6px;">Descrição do Conteúdo (Plano de Curso):</h4>
                <p id="modalDesc" style="font-size: 14.5px; color: var(--text-secondary); line-height: 1.7;"></p>
            </div>
            <div style="background: var(--bg-subtle); border-left: 3px solid var(--primary); padding: 14px; border-radius: 0 8px 8px 0; margin-bottom: 20px;">
                <h4 style="font-size: 13px; text-transform: uppercase; color: var(--primary); margin-bottom: 4px;">Capacidades Técnicas Desenvolvidas:</h4>
                <p id="modalCap" style="font-size: 13.5px; color: var(--text-secondary);"></p>
            </div>
            <div style="display: flex; justify-content: flex-end;">
                <button id="closeModalBtn2" class="btn-card-action secondary" style="flex: 0 0 auto;">Fechar</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="portal-footer">
        <div class="footer-inner">
            <div>
                <strong>SENAI-SP</strong> • Serviço Nacional de Aprendizagem Industrial • Diretoria de Educação
            </div>
            <div>
                Habilitação Profissional Técnica de Nível Médio em Desenvolvimento de Sistemas
            </div>
        </div>
    </footer>

    <!-- Interactive Filter & Search Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const searchInput = document.getElementById('searchInput');
            const cards = document.querySelectorAll('.discipline-card');
            
            let currentFilter = 'all';
            let currentSearch = '';

            function updateVisibility() {
                cards.forEach(card => {
                    const moduleType = card.dataset.module;
                    const name = card.dataset.name;
                    
                    const matchesFilter = (currentFilter === 'all' || moduleType === currentFilter);
                    const matchesSearch = name.includes(currentSearch.toLowerCase());
                    
                    if (matchesFilter && matchesSearch) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    currentFilter = btn.dataset.filter;
                    updateVisibility();
                });
            });

            searchInput.addEventListener('input', (e) => {
                currentSearch = e.target.value.trim();
                updateVisibility();
            });

            // Modal Handlers
            const modal = document.getElementById('syllabusModal');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const closeModalBtn2 = document.getElementById('closeModalBtn2');

            document.querySelectorAll('.btn-open-syllabus').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.getElementById('modalTitle').innerText = btn.dataset.title;
                    document.getElementById('modalType').innerText = btn.dataset.type;
                    document.getElementById('modalHours').innerText = btn.dataset.hours;
                    document.getElementById('modalDesc').innerText = btn.dataset.desc;
                    document.getElementById('modalCap').innerText = btn.dataset.cap;
                    modal.classList.add('open');
                });
            });

            [closeModalBtn, closeModalBtn2].forEach(btn => {
                btn.addEventListener('click', () => modal.classList.remove('open'));
            });

            modal.addEventListener('click', (e) => {
                if (e.target === modal) modal.classList.remove('open');
            });
        });
    </script>
</body>
</html>
