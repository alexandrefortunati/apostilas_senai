<?php
/**
 * View: Módulo 9 - Projeto Prático Integrador: Sistema CRUD Completo de E-Commerce de Roupas
 * Disciplina: Banco de Dados (75h) • SENAI-SP
 * Baseado no documento modelagem.docx e na base oficial loja_roupas.
 */
?>

<!-- ==========================================
     HERO CARD DO MÓDULO 9
     ========================================== -->
<div class="hero-card" style="border-left: 4px solid #db2777;">
    <div class="hero-tags">
        <span class="badge-tag senai">SENAI - SP • Módulo 9</span>
        <span class="badge-tag" style="background: #fce7f3; color: #db2777; border-color: #fbcfe8;">Capítulo 9: Projeto Prático Integrador</span>
        <span class="badge-tag time">E-Commerce CRUD • Loja de Roupas</span>
    </div>
    <h1 class="hero-title"><?= htmlspecialchars($module['title']) ?></h1>
    <p class="hero-desc">
        Bem-vindo ao projeto prático integrador da disciplina de Banco de Dados! Neste módulo em formato de <strong>apostila/tutorial passo a passo</strong>, você desenvolverá e consolidará o ciclo <strong>CRUD completo (Create, Read, Update, Delete)</strong> para o sistema de uma loja virtual de moda e vestuário: o banco de dados <strong>loja_roupas</strong>. Você colocará em prática todos os conceitos aprendidos: <strong>modelagem relacional (DER)</strong>, criação física no <strong>Oracle MySQL Workbench (DDL)</strong> com tipos ENUM e chaves estrangeiras, povoamento com <strong>INSERT</strong> e fotos de catálogo, vitrine e filtros com <strong>SELECT</strong>, reajustes de preço e controle de estoque com <strong>UPDATE</strong>, e cancelamentos seguros com <strong>DELETE</strong> respeitando a <strong>integridade referencial</strong> e as regras do documento de modelagem.
    </p>
</div>

<!-- ==========================================
     SEÇÃO 1: REGRAS DE NEGÓCIO DA LOJA DE ROUPAS
     ========================================== -->
<section id="intro-ecommerce-regras" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #fce7f3; color: #db2777; border-color: #fbcfe8;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
        </div>
        <div>
            <h2 class="section-title">1. Regras de Negócio & Arquitetura do E-Commerce de Moda</h2>
            <div class="section-subtitle">Entendendo a operação real do banco loja_roupas antes de digitar código SQL</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Um e-commerce de moda e vestuário possui características vitais do comércio digital moderno. As roupas possuem variações estritas de <strong>tamanho (P, M, G, GG)</strong>, <strong>fotos de alta resolução (URLs de imagem)</strong>, categorização clara (Camisetas, Calças, Jaquetas), controle rigoroso de <strong>estoque físico</strong> e autenticação segura de <strong>usuários com diferentes níveis de acesso (admin e cliente)</strong>.
        </p>

        <!-- OS 4 PILARES DO CRUD NO E-COMMERCE -->
        <div class="concept-grid">
            <div class="concept-card" style="border-top: 3.5px solid #059669;">
                <span class="concept-tag" style="background: #dcfce7; color: #15803d;">C • CREATE (INSERT)</span>
                <h4 class="concept-card-title">Cadastro & Entrada de Peças</h4>
                <p class="concept-card-desc">
                    O administrador cadastra novas categorias, cria novos usuários e adiciona peças de roupas ao catálogo com nome, preço, tamanho, link da imagem e estoque inicial.
                </p>
            </div>

            <div class="concept-card" style="border-top: 3.5px solid #0284c7;">
                <span class="concept-tag" style="background: #e0f2fe; color: #0369a1;">R • READ (SELECT)</span>
                <h4 class="concept-card-title">Vitrine, Filtros & Busca</h4>
                <p class="concept-card-desc">
                    O cliente visualiza a vitrine de produtos integrando a categoria via <code>INNER JOIN</code>, filtra peças pelo tamanho 'M' ou 'G' e busca modelos pelo nome usando <code>LIKE</code>.
                </p>
            </div>

            <div class="concept-card" style="border-top: 3.5px solid #ea580c;">
                <span class="concept-tag" style="background: #ffedd5; color: #c2410c;">U • UPDATE (UPDATE)</span>
                <h4 class="concept-card-title">Preços, Estoque & Permissões</h4>
                <p class="concept-card-desc">
                    Promoções sazonais reajustam valores de peças, o estoque é decrementado a cada venda realizada e usuários podem ter seu nível alterado de 'cliente' para 'admin'.
                </p>
            </div>

            <div class="concept-card" style="border-top: 3.5px solid #dc2626;">
                <span class="concept-tag" style="background: #fee2e2; color: #b91c1c;">D • DELETE (DELETE)</span>
                <h4 class="concept-card-title">Descarte Seguro & Integridade</h4>
                <p class="concept-card-desc">
                    Remoção de itens fora de linha ou categorias vazias. Exige respeito à integridade referencial para não disparar o <strong>Erro 1451 de Chave Estrangeira</strong>.
                </p>
            </div>
        </div>

        <div class="callout-box" style="border-left-color: #db2777; background: #fdf2f8;">
            <div class="callout-title" style="color: #be185d;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                Regra de Integridade do modelagem.docx no E-Commerce
            </div>
            <p style="color: #831843;">
                Conforme estabelecido no documento de modelagem, <strong>nunca execute comandos DML sem a cláusula WHERE</strong> e <strong>jamais exclua uma categoria que ainda possua roupas vinculadas a ela</strong>. O MySQL protegerá a integridade do catálogo impedindo que produtos fiquem órfãos de categoria.
            </p>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 2: MODELAGEM RELACIONAL (DER)
     ========================================== -->
<section id="modelagem-der-ecommerce" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #fce7f3; color: #db2777; border-color: #fbcfe8;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">2. Modelagem Relacional & Diagrama Entidade-Relacionamento (DER)</h2>
            <div class="section-subtitle">As tabelas fundamentais que estruturam o banco de dados loja_roupas</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            O banco de dados <strong>loja_roupas</strong> foi projetado de forma concisa, elegante e altamente escalável para atender à loja virtual com 3 entidades essenciais:
        </p>

        <!-- VISUALIZADOR DER / TABELAS RELACIONAIS -->
        <div class="der-visualizer-card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; flex-wrap: wrap; gap: 8px;">
                <strong style="color: #0f172a; font-size: 13.5px;">Esquema Relacional: <code>loja_roupas</code></strong>
                <span class="badge-tag" style="background: #fdf2f8; color: #be185d; border-color: #fbcfe8;">InnoDB • UTF8MB4 • Relacionamento 1:N</span>
            </div>

            <div class="der-grid">
                <!-- Tabela 1: categorias -->
                <div class="der-table-box">
                    <div class="der-table-header" style="background: #1e1b4b;">
                        <span class="table-name" style="color: #c084fc;">🏷️ categorias</span>
                        <span style="font-size: 10px; color: #cbd5e1;">PAI (INDEPENDENTE)</span>
                    </div>
                    <div class="der-column-list">
                        <div class="der-column-item">
                            <span><span class="pk-tag">PK</span> id_categoria</span>
                            <span class="col-type">INT AI</span>
                        </div>
                        <div class="der-column-item">
                            <span>nome</span>
                            <span class="col-type">VARCHAR(100) UNIQUE</span>
                        </div>
                    </div>
                </div>

                <!-- Tabela 2: usuarios -->
                <div class="der-table-box">
                    <div class="der-table-header" style="background: #1e1b4b;">
                        <span class="table-name" style="color: #c084fc;">👥 usuarios</span>
                        <span style="font-size: 10px; color: #cbd5e1;">INDEPENDENTE</span>
                    </div>
                    <div class="der-column-list">
                        <div class="der-column-item">
                            <span><span class="pk-tag">PK</span> id_usuario</span>
                            <span class="col-type">INT AI</span>
                        </div>
                        <div class="der-column-item">
                            <span>nome</span>
                            <span class="col-type">VARCHAR(150)</span>
                        </div>
                        <div class="der-column-item">
                            <span>email</span>
                            <span class="col-type">VARCHAR(150) UNIQUE</span>
                        </div>
                        <div class="der-column-item">
                            <span>senha</span>
                            <span class="col-type">VARCHAR(255)</span>
                        </div>
                        <div class="der-column-item">
                            <span>nivel</span>
                            <span class="col-type">ENUM('admin', 'cliente')</span>
                        </div>
                        <div class="der-column-item">
                            <span>criado_em</span>
                            <span class="col-type">TIMESTAMP</span>
                        </div>
                    </div>
                </div>

                <!-- Tabela 3: produtos -->
                <div class="der-table-box">
                    <div class="der-table-header" style="background: #0f172a;">
                        <span class="table-name" style="color: #38bdf8;">👗 produtos</span>
                        <span style="font-size: 10px; color: #cbd5e1;">FILHO (FK)</span>
                    </div>
                    <div class="der-column-list">
                        <div class="der-column-item">
                            <span><span class="pk-tag">PK</span> id_produto</span>
                            <span class="col-type">INT AI</span>
                        </div>
                        <div class="der-column-item">
                            <span>nome</span>
                            <span class="col-type">VARCHAR(150)</span>
                        </div>
                        <div class="der-column-item">
                            <span>preco</span>
                            <span class="col-type">DECIMAL(10,2)</span>
                        </div>
                        <div class="der-column-item">
                            <span>tamanho</span>
                            <span class="col-type">ENUM('P', 'M', 'G', 'GG')</span>
                        </div>
                        <div class="der-column-item">
                            <span>imagem_url</span>
                            <span class="col-type">VARCHAR(255)</span>
                        </div>
                        <div class="der-column-item">
                            <span>estoque</span>
                            <span class="col-type">INT DEFAULT 0</span>
                        </div>
                        <div class="der-column-item">
                            <span><span class="fk-tag">FK</span> id_categoria</span>
                            <span class="col-type">INT (Aponta para categorias)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3 style="margin-top: 18px;">Dicionário Técnico & Cardinalidade (1:N)</h3>
        <ul style="color: var(--text-secondary); line-height: 1.6;">
            <li><strong>1 Categoria possui N Produtos (1:N):</strong> Uma mesma categoria (ex: <em>"Camisetas"</em>) agrupa diversos modelos de roupas, mas cada peça pertence a uma única categoria. A chave estrangeira <code>id_categoria</code> reside na tabela filha <code>produtos</code> através da constraint <code>fk_produto_categoria</code>.</li>
            <li><strong>Tipo ENUM para Tamanhos e Níveis:</strong> O MySQL restringe a inserção apenas aos valores válidos permitidos (<code>'P', 'M', 'G', 'GG'</code> para vestuário e <code>'admin', 'cliente'</code> para segurança de acesso), garantindo integridade de domínio.</li>
        </ul>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 3: SCRIPT DDL NO WORKBENCH
     ========================================== -->
<section id="ddl-criacao-tabelas-workbench" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #fce7f3; color: #db2777; border-color: #fbcfe8;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">3. Criação Física no MySQL Workbench (DDL) & Carga Inicial com INSERT (Operação 'C' do CRUD)</h2>
            <div class="section-subtitle">Script oficial estruturado com CREATE DATABASE, CREATE TABLE, chaves estrangeiras e carga inicial de dados</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Abra o seu <strong>Oracle MySQL Workbench</strong>, conecte-se ao servidor local ou remoto do SENAI-SP e execute o script DDL oficial abaixo no seu SQL Editor:
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>💻 SCRIPT_DDL_LOJA_ROUPAS.SQL</span>
                <button type="button" class="copy-btn" onclick="navigator.clipboard.writeText(this.parentElement.nextElementSibling.innerText); this.innerText='Copiado!'; setTimeout(()=>this.innerText='Copiar', 2000);">Copiar</button>
            </div>
            <pre><code><span style="color: #94a3b8;">-- ====================================================================</span>
<span style="color: #94a3b8;">-- SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas</span>
<span style="color: #94a3b8;">-- Módulo 9: Projeto Final - E-Commerce de Moda (EstiloTech Fashion)</span>
<span style="color: #94a3b8;">-- ====================================================================</span>

<span style="color: #94a3b8;">-- Criação da base de dados com suporte completo a caracteres especiais e acentos</span>
<span style="color: #f43f5e; font-weight: 700;">CREATE DATABASE IF NOT EXISTS</span> loja_roupas 
<span style="color: #38bdf8;">CHARACTER SET</span> utf8mb4 
<span style="color: #38bdf8;">COLLATE</span> utf8mb4_unicode_ci;

<span style="color: #94a3b8;">-- Selecionando o banco para execução dos comandos</span>
<span style="color: #f43f5e; font-weight: 700;">USE</span> loja_roupas;

<span style="color: #94a3b8;">-- --------------------------------------------------------------------</span>
<span style="color: #94a3b8;">-- 1. Tabela de Usuários (Administradores e Clientes do Sistema)</span>
<span style="color: #94a3b8;">-- Tabela Independente: Não possui Chaves Estrangeiras (FK)</span>
<span style="color: #94a3b8;">-- --------------------------------------------------------------------</span>
<span style="color: #f43f5e; font-weight: 700;">CREATE TABLE IF NOT EXISTS</span> usuarios (
    id_usuario <span style="color: #38bdf8;">INT AUTO_INCREMENT</span>,
    nome <span style="color: #38bdf8;">VARCHAR(150) NOT NULL</span>,
    email <span style="color: #38bdf8;">VARCHAR(150) NOT NULL UNIQUE</span>,
    senha <span style="color: #38bdf8;">VARCHAR(255) NOT NULL</span>,
    nivel <span style="color: #38bdf8;">ENUM('admin', 'cliente') DEFAULT 'cliente'</span>,
    criado_em <span style="color: #38bdf8;">TIMESTAMP DEFAULT CURRENT_TIMESTAMP</span>,
    <span style="color: #94a3b8;">-- Chave Primária sem nome de constraint para evitar o Warning 1280</span>
    <span style="color: #f43f5e; font-weight: 700;">PRIMARY KEY</span> (id_usuario)
) <span style="color: #38bdf8;">ENGINE=InnoDB</span>;

<span style="color: #94a3b8;">-- --------------------------------------------------------------------</span>
<span style="color: #94a3b8;">-- 2. Tabela de Categorias das Peças de Roupa</span>
<span style="color: #94a3b8;">-- Tabela Independente: Prateleiras do e-commerce</span>
<span style="color: #94a3b8;">-- --------------------------------------------------------------------</span>
<span style="color: #f43f5e; font-weight: 700;">CREATE TABLE IF NOT EXISTS</span> categorias (
    id_categoria <span style="color: #38bdf8;">INT AUTO_INCREMENT</span>,
    nome <span style="color: #38bdf8;">VARCHAR(100) NOT NULL UNIQUE</span>,
    <span style="color: #94a3b8;">-- Chave Primária sem nome de constraint para evitar o Warning 1280</span>
    <span style="color: #f43f5e; font-weight: 700;">PRIMARY KEY</span> (id_categoria)
) <span style="color: #38bdf8;">ENGINE=InnoDB</span>;

<span style="color: #94a3b8;">-- --------------------------------------------------------------------</span>
<span style="color: #94a3b8;">-- 3. Tabela de Produtos (Roupas do Catálogo)</span>
<span style="color: #94a3b8;">-- Tabela Dependente: Recebe a chave estrangeira da tabela categorias</span>
<span style="color: #94a3b8;">-- --------------------------------------------------------------------</span>
<span style="color: #f43f5e; font-weight: 700;">CREATE TABLE IF NOT EXISTS</span> produtos (
    id_produto <span style="color: #38bdf8;">INT AUTO_INCREMENT</span>,
    nome <span style="color: #38bdf8;">VARCHAR(150) NOT NULL</span>,
    preco <span style="color: #38bdf8;">DECIMAL(10,2) NOT NULL</span>,
    tamanho <span style="color: #38bdf8;">ENUM('P', 'M', 'G', 'GG') NOT NULL</span>,
    imagem_url <span style="color: #38bdf8;">VARCHAR(255) NOT NULL</span>,
    estoque <span style="color: #38bdf8;">INT NOT NULL DEFAULT 0</span>,
    id_categoria <span style="color: #38bdf8;">INT NOT NULL</span>,
    <span style="color: #94a3b8;">-- Chave Primária sem nome de constraint (evita Warning 1280)</span>
    <span style="color: #f43f5e; font-weight: 700;">PRIMARY KEY</span> (id_produto),
    <span style="color: #94a3b8;">-- Restrição de Integridade Referencial: Amarra o produto à sua categoria</span>
    <span style="color: #f43f5e; font-weight: 700;">CONSTRAINT</span> fk_produto_categoria <span style="color: #f43f5e; font-weight: 700;">FOREIGN KEY</span> (id_categoria) <span style="color: #f43f5e; font-weight: 700;">REFERENCES</span> categorias(id_categoria)
) <span style="color: #38bdf8;">ENGINE=InnoDB</span>;

<span style="color: #94a3b8;">-- ====================================================================</span>
<span style="color: #94a3b8;">-- Carga Inicial de Dados (Método A - Bulk Insert)</span>
<span style="color: #94a3b8;">-- ====================================================================</span>

<span style="color: #94a3b8;">-- Inserindo categorias iniciais</span>
<span style="color: #f43f5e; font-weight: 700;">INSERT INTO</span> categorias (nome) <span style="color: #f43f5e; font-weight: 700;">VALUES</span> 
('Camisetas'), 
('Calças'), 
('Jaquetas');

<span style="color: #94a3b8;">-- Inserindo usuário administrador padrão (Senha descriptografada: admin123)</span>
<span style="color: #f43f5e; font-weight: 700;">INSERT INTO</span> usuarios (nome, email, senha, nivel) <span style="color: #f43f5e; font-weight: 700;">VALUES</span> 
('Administrador', 'admin@loja.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'admin');

<span style="color: #94a3b8;">-- Abastecendo o estoque inicial com produtos vinculados às categorias 1, 2 e 3</span>
<span style="color: #f43f5e; font-weight: 700;">INSERT INTO</span> produtos (nome, preco, tamanho, imagem_url, estoque, id_categoria) <span style="color: #f43f5e; font-weight: 700;">VALUES</span> 
('Camiseta Oversized Minimalist', 89.90, 'M', 'https://images.unsplash.com/photo-1521572267360-ee0c2909d518?w=500', 25, 1),
('Calça Cargo Streetwear', 189.90, 'G', 'https://images.unsplash.com/photo-1517445312882-bc9910d016b7?w=500', 15, 2),
('Jaqueta Couro Sintético Vintage', 299.90, 'G', 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=500', 8, 3);</code></pre>
        </div>

        <!-- BOX DE ORIENTAÇÃO PARA IMAGENS DO WORKBENCH -->
        <div class="company-case-box" style="background: #fdf2f8; border-color: #fbcfe8;">
            <div class="company-case-header">
                <span class="company-badge-pill" style="background: #fce7f3; color: #be185d;">📸 Verificação Visual do Aluno no MySQL Workbench</span>
                <h4 class="company-case-title" style="color: #9d174d;">Como inspecionar e registrar a criação correta no Workbench</h4>
            </div>
            <p style="color: #831843;">
                Após executar o script acima pressionando o botão do raio (⚡) no MySQL Workbench:
            </p>
            <ol style="color: #831843; font-size: 12px; margin-bottom: 0; line-height: 1.55;">
                <li>No painel esquerdo <strong>Navigator &rarr; Schemas</strong>, clique com o botão direito e escolha <em>"Refresh All"</em> para inspecionar a base <code>loja_roupas</code> com as 3 tabelas criadas.</li>
                <li>Gere o diagrama EER automático pelo menu <strong>Database &rarr; Reverse Engineer...</strong> para visualizar a linha de cardinalidade conectando <code>categorias</code> a <code>produtos</code>.</li>
            </ol>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 9.1 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #fbcfe8; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #db2777; color: #ffffff; border-color: #db2777;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 9.1
                </span>
                <span class="screenshot-target-pill" style="background: #fce7f3; color: #be185d; font-weight: 700;">Execução do Script DDL & INSERT com Sucesso</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 9.1: Execução com sucesso dos comandos DDL e INSERT da base loja_roupas no MySQL Workbench com semáforos verdes no Action Output" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/workbench-modulo9-execucao-sucesso.png" alt="Execução completa dos comandos DDL e carga inicial com INSERT no MySQL Workbench com semáforos verdes no Action Output" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar Imagem</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 9.1:</strong> Tela do <strong>Oracle MySQL Workbench</strong> exibindo a execução do script com criação física das tabelas e o povoamento inicial via <code>INSERT INTO</code>. Observe no painel inferior <em>Action Output</em> os semáforos verdes confirmando o processamento sem erros com <code>0 row(s) affected</code> na criação DDL e <code>3 row(s) affected</code> nas cargas em lote. <em>(Clique na imagem para ampliá-la em alta resolução)</em>.
            </div>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 9.2 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #fbcfe8; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #db2777; color: #ffffff; border-color: #db2777;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 9.2
                </span>
                <span class="screenshot-target-pill" style="background: #fce7f3; color: #be185d; font-weight: 700;">Diagrama EER e Relacionamento 1:N no MySQL Workbench</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 9.2: Diagrama EER gerado no Oracle MySQL Workbench exibindo as tabelas categorias, produtos e usuarios com a linha de cardinalidade 1:N conectando a chave estrangeira fk_produto_categoria" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/workbench-modulo9-diagrama-eer.png" alt="Diagrama EER gerado no Oracle MySQL Workbench com as tabelas categorias, produtos e usuarios conectadas pelo relacionamento 1:N" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar Imagem</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 9.2:</strong> Diagrama visual EER (<em>Enhanced Entity-Relationship</em>) gerado no <strong>Oracle MySQL Workbench</strong> via engenharia reversa (<em>Reverse Engineer</em>). Observe as três tabelas criadas (<code>categorias</code>, <code>produtos</code> e <code>usuarios</code>) e a linha de relacionamento <strong>1:N</strong> conectando a chave primária <code>categorias.id_categoria</code> à chave estrangeira <code>produtos.id_categoria</code> (<em>constraint</em> <code>fk_produto_categoria</code>). <em>(Clique na imagem para ampliá-la em alta resolução)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 4: DQL SELECT (VITRINE & RELATÓRIOS)
     ========================================== -->
<section id="dql-select-vitrine-relatorios" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #fce7f3; color: #db2777; border-color: #fbcfe8;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </div>
        <div>
            <h2 class="section-title">4. Operação 'R' do CRUD: Vitrine de Roupas & Consultas com SELECT</h2>
            <div class="section-subtitle">Junção INNER JOIN entre produtos e categorias, filtros por tamanho ENUM e busca textual com LIKE</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Com o comando <strong>SELECT (DQL)</strong>, alimentamos a vitrine visual da loja virtual e emitimos relatórios administrativos:
        </p>

        <div class="practice-subcard">
            <div class="practice-header">
                <span class="practice-pill" style="background: #fce7f3; color: #be185d;">CONSULTA 1 • VITRINE COMPLETA COM CATEGORIA</span>
                <h3>Listando os Produtos com o Nome da Categoria via INNER JOIN</h3>
            </div>
            <div class="code-wrapper">
                <pre><code><span style="color: #f43f5e; font-weight: 700;">SELECT</span> 
    p.id_produto <span style="color: #38bdf8;">AS</span> 'ID',
    p.nome <span style="color: #38bdf8;">AS</span> 'Peça de Roupa',
    c.nome <span style="color: #38bdf8;">AS</span> 'Categoria',
    p.tamanho <span style="color: #38bdf8;">AS</span> 'Tamanho',
    CONCAT('R$ ', REPLACE(FORMAT(p.preco, 2), '.', ',')) <span style="color: #38bdf8;">AS</span> 'Preço',
    p.estoque <span style="color: #38bdf8;">AS</span> 'Estoque Disponível',
    p.imagem_url <span style="color: #38bdf8;">AS</span> 'URL da Foto'
<span style="color: #f43f5e; font-weight: 700;">FROM</span> produtos p
<span style="color: #f43f5e; font-weight: 700;">INNER JOIN</span> categorias c <span style="color: #f43f5e; font-weight: 700;">ON</span> p.id_categoria = c.id_categoria
<span style="color: #f43f5e; font-weight: 700;">ORDER BY</span> p.preco <span style="color: #38bdf8;">ASC</span>;</code></pre>
            </div>
        </div>

        <div class="practice-subcard">
            <div class="practice-header">
                <span class="practice-pill" style="background: #e0f2fe; color: #0284c7;">CONSULTA 2 • FILTRO POR TAMANHO</span>
                <h3>Filtrando apenas Roupas do Tamanho 'M' ou 'G' com Preço até R$ 200,00</h3>
            </div>
            <div class="code-wrapper">
                <pre><code><span style="color: #f43f5e; font-weight: 700;">SELECT</span> nome, tamanho, preco, estoque
<span style="color: #f43f5e; font-weight: 700;">FROM</span> produtos
<span style="color: #f43f5e; font-weight: 700;">WHERE</span> tamanho <span style="color: #f43f5e; font-weight: 700;">IN</span> ('M', 'G') <span style="color: #f43f5e; font-weight: 700;">AND</span> preco &lt;= 200.00
<span style="color: #f43f5e; font-weight: 700;">ORDER BY</span> preco <span style="color: #38bdf8;">DESC</span>;</code></pre>
            </div>
        </div>

        <div class="practice-subcard">
            <div class="practice-header">
                <span class="practice-pill" style="background: #fef3c7; color: #d97706;">CONSULTA 3 • BUSCA TEXTUAL INTELIGENTE</span>
                <h3>Buscando Roupas pelo Termo Parcial com o Operador LIKE (%)</h3>
            </div>
            <div class="code-wrapper">
                <pre><code><span style="color: #94a3b8;">-- Localiza qualquer peça que contenha "Oversized" ou "Streetwear" no nome</span>
<span style="color: #f43f5e; font-weight: 700;">SELECT</span> id_produto, nome, tamanho, preco, estoque
<span style="color: #f43f5e; font-weight: 700;">FROM</span> produtos
<span style="color: #f43f5e; font-weight: 700;">WHERE</span> nome <span style="color: #f43f5e; font-weight: 700;">LIKE</span> '%Streetwear%';</code></pre>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 5: DML UPDATE (GESTÃO & ESTOQUE)
     ========================================== -->
<section id="dml-update-gestao-pedidos" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #fce7f3; color: #db2777; border-color: #fbcfe8;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">5. Operação 'U' do CRUD: Reajustes de Preço & Gestão com UPDATE</h2>
            <div class="section-subtitle">Alterações pontuais, baixa automática de estoque físico e promoção de usuários</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            No <em>Módulo 7</em>, dominamos a <strong>Regra de Ouro do UPDATE</strong>: nunca execute sem a cláusula <code>WHERE</code>. Vejamos as alterações práticas no banco <code>loja_roupas</code>:
        </p>

        <!-- SITUAÇÃO 1: REAJUSTE DE PREÇO -->
        <h3 style="margin-top: 14px;">1. Promoção Relâmpago na Camiseta Oversized (ID 1)</h3>
        <p>
            A camiseta (ID 1) entrou em desconto e terá seu valor reduzido para R$ 79,90:
        </p>
        <div class="code-wrapper">
            <pre><code><span style="color: #f43f5e; font-weight: 700;">UPDATE</span> produtos
<span style="color: #f43f5e; font-weight: 700;">SET</span> preco = 79.90
<span style="color: #f43f5e; font-weight: 700;">WHERE</span> id_produto = 1;</code></pre>
        </div>

        <!-- SITUAÇÃO 2: BAIXA DE ESTOQUE APÓS VENDA -->
        <h3 style="margin-top: 14px;">2. Baixa de Estoque com Operação Aritmética</h3>
        <p>
            Após um cliente comprar 2 jaquetas de couro (ID 3), o sistema decrementa o saldo físico:
        </p>
        <div class="code-wrapper">
            <pre><code><span style="color: #f43f5e; font-weight: 700;">UPDATE</span> produtos
<span style="color: #f43f5e; font-weight: 700;">SET</span> estoque = estoque - 2
<span style="color: #f43f5e; font-weight: 700;">WHERE</span> id_produto = 3;</code></pre>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 6: DML DELETE (CANCELAMENTOS & INTEGRIDADE)
     ========================================== -->
<section id="dml-delete-cancelamento-seguro" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #fce7f3; color: #db2777; border-color: #fbcfe8;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
        </div>
        <div>
            <h2 class="section-title">6. Operação 'D' do CRUD: Exclusão Segura & Integridade (modelagem.docx)</h2>
            <div class="section-subtitle">O bloqueio do Erro 1451 ao tentar excluir categorias com produtos vinculados</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Conforme fundamentado no <strong>documento oficial de modelagem (modelagem.docx)</strong>, apagar registros em um banco relacional exige protocolo duplo de segurança.
        </p>

        <!-- CASO 1: EXCLUSÃO SIMPLES -->
        <h3 style="margin-top: 14px;">1. Exclusão Simples de Categoria Sem Vínculos</h3>
        <p>
            Imagine que você cadastrou a categoria <em>"Acessórios"</em> (ID 4) por engano e ainda não cadastrou nenhuma peça nela:
        </p>
        <div class="code-wrapper">
            <pre><code><span style="color: #94a3b8;">-- Cadastra categoria de teste vazia:</span>
<span style="color: #f43f5e; font-weight: 700;">INSERT INTO</span> categorias (nome) <span style="color: #f43f5e; font-weight: 700;">VALUES</span> ('Acessórios');

<span style="color: #94a3b8;">-- Exclui a categoria vazia sem vínculos:</span>
<span style="color: #f43f5e; font-weight: 700;">DELETE FROM</span> categorias 
<span style="color: #f43f5e; font-weight: 700;">WHERE</span> id_categoria = 4;</code></pre>
        </div>
        <p style="font-size: 12px; color: #15803d;">
            <strong>Resultado:</strong> Como a categoria estava vazia, a exclusão ocorre instantaneamente no servidor.
        </p>

        <!-- CASO 2: BLOQUEIO DA CHAVE ESTRANGEIRA -->
        <h3 style="margin-top: 18px;">2. O Bloqueio da Chave Estrangeira: Diagnóstico do Erro 1451</h3>
        <p>
            O que acontece se tentarmos apagar a categoria 1 (<em>"Camisetas"</em>), sabendo que a Camiseta Oversized está cadastrada nela?
        </p>
        <div class="code-wrapper">
            <pre><code><span style="color: #94a3b8;">-- TENTATIVA DE EXCLUIR CATEGORIA PAI COM PRODUTOS FILHOS</span>
<span style="color: #f43f5e; font-weight: 700;">DELETE FROM</span> categorias 
<span style="color: #f43f5e; font-weight: 700;">WHERE</span> id_categoria = 1;</code></pre>
        </div>

        <div class="callout-box" style="border-left-color: #dc2626; background: #fef2f2;">
            <div class="callout-title" style="color: #991b1b;">
                ⚠️ RESPOSTA DO SERVIDOR: ERROR 1451 (23000)
            </div>
            <p style="color: #7f1d1d; font-family: var(--font-mono); font-size: 11.5px;">
                Cannot delete or update a parent row: a foreign key constraint fails (`loja_roupas`.`produtos`, CONSTRAINT `fk_produto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`))
            </p>
            <p style="color: #991b1b; margin-top: 6px; font-size: 12px;">
                <strong>Explicação Didática (modelagem.docx):</strong> O banco de dados bloqueia a ação para proteger a integridade. A categoria 1 possui peças associadas na tabela <code>produtos</code>. Se o MySQL permitisse apagar a categoria 1, as camisetas ficariam "órfãs", apontando para uma categoria fantasma que não existe mais. Bancos de dados relacionais não permitem pontas soltas!
            </p>
        </div>

        <!-- PROTOCOLO PREVENTIVO COM SELECT PRÉVIO -->
        <div class="company-case-box" style="background: #f0fdf4; border-color: #86efac; margin-top: 16px;">
            <div class="company-case-header">
                <span class="company-badge-pill">🛡️ Protocolo do SELECT Prévio (modelagem.docx)</span>
                <h4 class="company-case-title">A Técnica de Conferência Obrigatória</h4>
            </div>
            <p>
                Antes de digitar a palavra <code>DELETE</code>, digite <code>SELECT *</code> usando exatamente o mesmo filtro <code>WHERE</code> para conferir visualmente a peça:
            </p>
            <div class="code-wrapper" style="margin: 8px 0;">
                <pre><code><span style="color: #94a3b8;">-- 1. Teste o filtro com SELECT primeiro:</span>
<span style="color: #f43f5e; font-weight: 700;">SELECT</span> * <span style="color: #f43f5e; font-weight: 700;">FROM</span> produtos <span style="color: #f43f5e; font-weight: 700;">WHERE</span> id_produto = 2;

<span style="color: #94a3b8;">-- 2. Confirmou na tela que é exatamente a Calça Cargo? Substitua SELECT * por DELETE:</span>
<span style="color: #f43f5e; font-weight: 700;">DELETE FROM</span> produtos <span style="color: #f43f5e; font-weight: 700;">WHERE</span> id_produto = 2;</code></pre>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 7: SIMULADOR WEB INTERATIVO DO CRUD
     ========================================== -->
<section id="simulador-crud-interativo" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #fce7f3; color: #db2777; border-color: #fbcfe8;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
        </div>
        <div>
            <h2 class="section-title">7. Simulador Web Interativo do E-Commerce CRUD (loja_roupas)</h2>
            <div class="section-subtitle">Vitrine oficial de roupas com fotos, filtro por categoria (SELECT) e reajuste controlado de preço e estoque (UPDATE)</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Interaja com o catálogo oficial do banco <strong>loja_roupas</strong>. O simulador abaixo opera em <strong>ambiente protegido de laboratório</strong>: você pode navegar e filtrar a vitrine com consultas dinâmicas (SELECT) e simular reajustes numéricos pontuais de preço e estoque físico (UPDATE) diretamente no navegador, visualizando os comandos SQL gerados em tempo real no terminal.
        </p>

        <!-- APLICAÇÃO INTERATIVA CRUD -->
        <div style="background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 8px; padding: 16px; margin: 14px 0;">
            <!-- BARRA DE AÇÕES / CONTROLES -->
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 10px; flex-wrap: wrap; margin-bottom: 14px;">
                <div style="display: flex; gap: 8px; flex: 1; min-width: 260px;">
                    <input type="text" id="filtroModaNome" placeholder="🔍 Filtrar por nome da peça (ex: Oversized, Cargo, Jaqueta)..." style="flex: 1; padding: 7px 11px; border: 1px solid #cbd5e1; border-radius: 5px; font-size: 12px;" oninput="filtrarCatalogoModa()">
                    <select id="filtroModaCategoria" style="padding: 7px 11px; border: 1px solid #cbd5e1; border-radius: 5px; font-size: 12px;" onchange="filtrarCatalogoModa()">
                        <option value="">Todas as Categorias</option>
                        <option value="Camisetas">Camisetas</option>
                        <option value="Calças">Calças</option>
                        <option value="Jaquetas">Jaquetas</option>
                    </select>
                </div>
                <div style="display: inline-flex; align-items: center; gap: 6px; font-size: 11px; color: #059669; font-weight: 700; background: #ecfdf5; padding: 6px 12px; border-radius: 6px; border: 1px solid #a7f3d0;">
                    <span>🛡️ Modo Seguro: Gestão Numérica de Preço & Estoque</span>
                </div>
            </div>

            <!-- VITRINE EM CARDS VISUAIS COM FOTOS -->
            <div id="gridVitrineModa" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 14px; margin-bottom: 14px;">
                <!-- Preenchido dinamicamente via JS -->
            </div>

            <!-- TERMINAL SQL DINÂMICO -->
            <div style="background: #0f172a; border-radius: 7px; overflow: hidden; border: 1px solid #1e293b;">
                <div style="background: #1e293b; padding: 6px 12px; display: flex; justify-content: space-between; align-items: center; font-size: 11px; color: #94a3b8; font-family: var(--font-mono);">
                    <span>🖥️ TERMINAL DE LOG: COMANDO SQL EXECUTADO EM TEMPO REAL</span>
                    <span id="logSqlStatus" style="color: #34d399; font-weight: 700;">Pronto (Aguardando ação)</span>
                </div>
                <div id="logSqlComando" style="padding: 10px 14px; font-family: var(--font-mono); font-size: 11.5px; color: #38bdf8; line-height: 1.5; min-height: 40px; white-space: pre-wrap;">SELECT p.*, c.nome AS categoria FROM produtos p INNER JOIN categorias c ON p.id_categoria = c.id_categoria ORDER BY p.id_produto ASC;</div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 8: DESAFIO FINAL & FORMULÁRIO DE ENTREGA
     ========================================== -->
<section id="desafio-projeto-final" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #fce7f3; color: #db2777; border-color: #fbcfe8;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">8. Desafio Prático & Formulário de Entrega do Projeto</h2>
            <div class="section-subtitle">Resolva os desafios de e-commerce no Workbench e registre o seu relatório técnico</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Resolva as demandas reais abaixo conectando-se ao banco de dados <code>loja_roupas</code> no <strong>Oracle MySQL Workbench</strong>:
        </p>

        <!-- CARDS DOS DESAFIOS -->
        <div class="concept-grid">
            <div class="concept-card" style="border-top: 3.5px solid #0284c7;">
                <span class="concept-tag" style="background: #e0f2fe; color: #0284c7;">DESAFIO 1 • INSERT & SELECT</span>
                <h4 class="concept-card-title">Nova Categoria & Peças</h4>
                <p class="concept-card-desc">
                    Cadastre a categoria <em>"Vestidos"</em> e insira uma peça com tamanho 'M', link de foto e estoque 10. Em seguida, liste os produtos dessa categoria com <code>INNER JOIN</code>.
                </p>
            </div>

            <div class="concept-card" style="border-top: 3.5px solid #ea580c;">
                <span class="concept-tag" style="background: #ffedd5; color: #ea580c;">DESAFIO 2 • UPDATE EM LOTE</span>
                <h4 class="concept-card-title">Reajuste de Inverno</h4>
                <p class="concept-card-desc">
                    Escreva o comando <code>UPDATE</code> com a Regra de Ouro do <code>WHERE</code> para conceder 10% de desconto em todas as peças da categoria <em>"Jaquetas"</em> (ID 3).
                </p>
            </div>

            <div class="concept-card" style="border-top: 3.5px solid #dc2626;">
                <span class="concept-tag" style="background: #fee2e2; color: #dc2626;">DESAFIO 3 • DIAGNÓSTICO DO ERRO 1451</span>
                <h4 class="concept-card-title">Bloqueio de Chave Estrangeira</h4>
                <p class="concept-card-desc">
                    Tente excluir a categoria 1 (Camisetas) com <code>DELETE</code>. Registre a mensagem de erro retornada pelo servidor e descreva a solução segura com base no <code>modelagem.docx</code>.
                </p>
            </div>
        </div>

        <!-- FORMULÁRIO TÉCNICO DE ENTREGA -->
        <div style="background: #fdf2f8; border: 1.5px solid #fbcfe8; border-radius: 8px; padding: 18px; margin-top: 18px;">
            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                <span style="background: #db2777; color: #ffffff; width: 28px; height: 28px; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 800;">📝</span>
                <div>
                    <h3 style="margin: 0; font-size: 14px; color: #831843;">Formulário de Entrega • Módulo 9 (Projeto Final loja_roupas)</h3>
                    <p style="margin: 0; font-size: 11.5px; color: #9d174d;">Preencha os campos abaixo com os seus dados e scripts validados no MySQL Workbench:</p>
                </div>
            </div>

            <form class="project-submit-form" onsubmit="event.preventDefault(); alert('Parabéns! Projeto Final do Módulo 9 (E-Commerce loja_roupas) enviado com sucesso para a avaliação docente no SENAI-SP.'); this.reset();">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-bottom: 10px;">
                    <div>
                        <label>Nome Completo do Aluno:</label>
                        <input type="text" required placeholder="Ex: Alexandre Fortunati">
                    </div>
                    <div>
                        <label>Turma / Unidade SENAI:</label>
                        <input type="text" required placeholder="Ex: Técnico em Desenvolvimento de Sistemas • Turma 2026">
                    </div>
                </div>

                <div style="margin-bottom: 10px;">
                    <label>1. Script DDL / DML do Desafio 1 (Categoria Vestidos, INSERT e SELECT com INNER JOIN):</label>
                    <textarea rows="3" required placeholder="INSERT INTO categorias (nome) VALUES ('Vestidos'); INSERT INTO produtos... SELECT..."></textarea>
                </div>

                <div style="margin-bottom: 10px;">
                    <label>2. Script UPDATE do Desafio 2 (Desconto de 10% nas Jaquetas com WHERE):</label>
                    <textarea rows="2" required placeholder="UPDATE produtos SET preco = preco * 0.90 WHERE id_categoria = 3;"></textarea>
                </div>

                <div style="margin-bottom: 10px;">
                    <label>3. Diagnóstico e Resolução do Desafio 3 (Erro 1451 de Chave Estrangeira):</label>
                    <textarea rows="3" required placeholder="O MySQL retornou o Erro 1451 porque a categoria possui produtos associados. Para resolver com segurança, devemos primeiro..."></textarea>
                </div>

                <button type="submit" class="btn-submit-project" style="background: #db2777; color: #ffffff;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Submeter Projeto Final • E-Commerce CRUD (Módulo 9)
                </button>
            </form>
        </div>
    </div>
</section>

<!-- ==========================================
     SCRIPTS DO SIMULADOR CRUD INTERATIVO (JS)
     ========================================== -->
<script>
// Base de dados em memória do E-Commerce loja_roupas
let categoriasLoja = [
    { id: 1, nome: 'Camisetas' },
    { id: 2, nome: 'Calças' },
    { id: 3, nome: 'Jaquetas' }
];

let produtosLoja = [
    { id: 1, nome: 'Camiseta Oversized Minimalist', preco: 89.90, tamanho: 'M', imagem_url: 'https://images.unsplash.com/photo-1521572267360-ee0c2909d518?w=500', estoque: 25, id_categoria: 1 },
    { id: 2, nome: 'Calça Cargo Streetwear', preco: 189.90, tamanho: 'G', imagem_url: 'https://images.unsplash.com/photo-1517445312882-bc9910d016b7?w=500', estoque: 15, id_categoria: 2 },
    { id: 3, nome: 'Jaqueta Couro Sintético Vintage', preco: 299.90, tamanho: 'G', imagem_url: 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=500', estoque: 8, id_categoria: 3 }
];

let proximoIdProduto = 4;

function obterNomeCategoria(idCat) {
    const c = categoriasLoja.find(cat => cat.id === idCat);
    return c ? c.nome : 'Sem Categoria';
}

function renderizarVitrineModa(lista) {
    const grid = document.getElementById('gridVitrineModa');
    grid.innerHTML = '';

    if (lista.length === 0) {
        grid.innerHTML = '<div style="grid-column: 1 / -1; text-align: center; padding: 24px; color: #94a3b8; background: #ffffff; border-radius: 8px; border: 1px solid #e2e8f0;">Nenhuma peça de roupa encontrada para este filtro.</div>';
        return;
    }

    lista.forEach(p => {
        const card = document.createElement('div');
        card.style.cssText = 'background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; display: flex; flex-direction: column; box-shadow: 0 1px 3px rgba(0,0,0,0.03); transition: transform 0.15s ease;';
        card.innerHTML = `
            <div style="height: 180px; overflow: hidden; background: #f1f5f9; position: relative;">
                <img src="${p.imagem_url}" alt="${p.nome}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1521572267360-ee0c2909d518?w=500';">
                <span style="position: absolute; top: 8px; left: 8px; background: rgba(15, 23, 42, 0.85); color: #ffffff; font-size: 10px; font-weight: 800; padding: 2px 7px; border-radius: 4px; backdrop-filter: blur(4px);">
                    ${obterNomeCategoria(p.id_categoria)}
                </span>
                <span style="position: absolute; top: 8px; right: 8px; background: #db2777; color: #ffffff; font-size: 10px; font-weight: 800; padding: 2px 7px; border-radius: 4px;">
                    TAM: ${p.tamanho}
                </span>
            </div>
            <div style="padding: 12px; display: flex; flex-direction: column; flex: 1; justify-content: space-between;">
                <div>
                    <div style="font-size: 10px; color: #64748b; font-family: var(--font-mono); margin-bottom: 2px;">ID_PRODUTO: #${p.id}</div>
                    <h4 style="margin: 0 0 6px; font-size: 13px; color: #0f172a; line-height: 1.3;">${p.nome}</h4>
                </div>
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin: 8px 0;">
                        <span style="color: #059669; font-weight: 800; font-size: 14px;">R$ ${p.preco.toFixed(2).replace('.', ',')}</span>
                        <span style="font-size: 11px; font-weight: 700; ${p.estoque <= 10 ? 'color: #dc2626;' : 'color: #475569;'}">
                            Estoque: ${p.estoque} un
                        </span>
                    </div>
                    <div style="border-top: 1px solid #f1f5f9; padding-top: 8px;">
                        <button type="button" onclick="editarPrecoEstoque(${p.id})" style="width: 100%; background: #0284c7; color: #ffffff; border: none; border-radius: 4px; padding: 6px 10px; font-size: 11px; font-weight: 700; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 5px;" title="Atualizar Preço e Estoque (UPDATE)">
                            ✏️ Atualizar Preço & Estoque (UPDATE)
                        </button>
                    </div>
                </div>
            </div>
        `;
        grid.appendChild(card);
    });
}

function filtrarCatalogoModa() {
    const termo = document.getElementById('filtroModaNome').value.toLowerCase().trim();
    const catNome = document.getElementById('filtroModaCategoria').value;

    const filtrados = produtosLoja.filter(p => {
        const matchNome = p.nome.toLowerCase().includes(termo);
        const matchCat = catNome === '' || obterNomeCategoria(p.id_categoria) === catNome;
        return matchNome && matchCat;
    });

    renderizarVitrineModa(filtrados);

    // Atualiza log SQL
    let sql = `SELECT p.*, c.nome AS categoria \nFROM produtos p \nINNER JOIN categorias c ON p.id_categoria = c.id_categoria \nWHERE 1=1`;
    if (termo) sql += ` AND p.nome LIKE '%${termo}%'`;
    if (catNome) sql += ` AND c.nome = '${catNome}'`;
    sql += ` \nORDER BY p.id_produto ASC;`;

    document.getElementById('logSqlStatus').innerText = 'READ (SELECT com INNER JOIN executado)';
    document.getElementById('logSqlComando').innerText = sql;
}

function editarPrecoEstoque(id) {
    const peca = produtosLoja.find(p => p.id === id);
    if (!peca) return;

    const novoPrecoStr = prompt(`Reajuste de Preço de "${peca.nome}":\n(Informe apenas o novo valor numérico, ex: 99.90. Atual: R$ ${peca.preco.toFixed(2)})`, peca.preco.toFixed(2));
    if (novoPrecoStr === null) return;
    const novoPreco = parseFloat(novoPrecoStr.replace(',', '.'));
    if (isNaN(novoPreco) || novoPreco <= 0) {
        alert('⚠️ Operação cancelada: Informe apenas valores numéricos positivos para o preço (ex: 89.90)!');
        return;
    }

    const novoEstoqueStr = prompt(`Atualizar Saldo em Estoque de "${peca.nome}":\n(Informe apenas a quantidade inteira, ex: 20. Atual: ${peca.estoque} un)`, peca.estoque);
    if (novoEstoqueStr === null) return;
    const novoEstoque = parseInt(novoEstoqueStr);
    if (isNaN(novoEstoque) || novoEstoque < 0) {
        alert('⚠️ Operação cancelada: Informe apenas um número inteiro positivo para o estoque!');
        return;
    }

    peca.preco = novoPreco;
    peca.estoque = novoEstoque;

    filtrarCatalogoModa();

    document.getElementById('logSqlStatus').innerText = 'UPDATE (Regra de Ouro do WHERE aplicada)';
    document.getElementById('logSqlComando').innerText = `UPDATE produtos\nSET preco = ${peca.preco.toFixed(2)}, estoque = ${peca.estoque}\nWHERE id_produto = ${id};`;
}

// Inicializa ao carregar o DOM
document.addEventListener('DOMContentLoaded', () => {
    renderizarVitrineModa(produtosLoja);
});
</script>
