<?php
/**
 * View: Módulo 7 - Atualizando Dados com o Comando UPDATE (DML)
 * Disciplina: Banco de Dados (75h) • SENAI-SP
 * Baseado no documento modelagem.docx e nas diretrizes metodológicas da apostila técnica.
 */
?>

<!-- ==========================================
     HERO CARD DO MÓDULO 7
     ========================================== -->
<div class="hero-card">
    <div class="hero-tags">
        <span class="badge-tag senai">SENAI - SP • Módulo 7</span>
        <span class="badge-tag accent">Capítulo 7: Atualização de Dados (DML – UPDATE)</span>
        <span class="badge-tag time">Guia Prático Passo a Passo</span>
    </div>
    <h1 class="hero-title"><?= htmlspecialchars($module['title']) ?></h1>
    <p class="hero-desc">
        No dia a dia de uma indústria e distribuidora de autopeças como a <strong>AutoMetal Brasil S.A.</strong>, as informações mudam constantemente: um cliente troca de número de telefone, o preço de uma pastilha de freio sofre reajuste de fornecedor, o estoque de filtros de óleo é reposto após a entrega da fábrica ou o status de uma entrega precisa ser atualizado. Para refletir essas mudanças no nosso servidor físico Linux de forma segura, rápida e controlada, utilizamos o comando soberano da manipulação de dados: o <strong>UPDATE</strong>.
    </p>
</div>

<!-- ==========================================
     SEÇÃO 1: A REGRA DE OURO DO UPDATE
     ========================================== -->
<section id="intro-update-regra-ouro" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
        </div>
        <div>
            <h2 class="section-title">1. A Regra de Ouro do UPDATE: A Importância Vital da Cláusula WHERE</h2>
            <div class="section-subtitle">Como alterar registros existentes com total controle e evitar acidentes irreversíveis</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Antes de digitarmos qualquer linha de código no terminal ou no SQL Editor do MySQL Workbench, existe um mandamento sagrado na administração de bancos de dados que todo profissional de TI deve memorizar:
        </p>

        <!-- ALERTA CRÍTICO: REGRA DE OURO -->
        <div style="background: #fff1f2; border: 2px solid #f43f5e; border-radius: 10px; padding: 20px; margin: 18px 0; box-shadow: 0 4px 12px rgba(244, 63, 94, 0.08);">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e11d48" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                <span style="font-size: 16px; font-weight: 800; color: #9f1239; font-family: var(--font-heading);">A REGRA DE OURO DO DBA: NUNCA FAÇA UM UPDATE SEM WHERE!</span>
            </div>
            <p style="font-size: 13.5px; color: #881337; margin: 0; line-height: 1.6;">
                <strong>O que acontece se você esquecer a cláusula WHERE?</strong> O motor do SGBD não adivinha a sua intenção e entenderá que a alteração deve ser aplicada a <strong>absolutamente todas as linhas</strong> da tabela. Se você tentar alterar o nome de um cliente específico para <em>"Carlos"</em> e esquecer o <code>WHERE</code>, <strong>todos os 10.000 clientes da sua fábrica passarão a se chamar Carlos</strong> instantaneamente.
            </p>
        </div>

        <p>
            A estrutura lógica do comando <code>UPDATE</code> é composta sempre por 3 etapas sequenciais e obrigatórias:
        </p>

        <!-- CARDS DA ESTRUTURA LÓGICA DE 3 PASSOS -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 14px; margin: 18px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; border-top: 4px solid #0284c7;">
                <span style="font-weight: 800; color: #0284c7; font-size: 11px; background: #e0f2fe; padding: 2px 8px; border-radius: 4px;">PASSO 1: O ALVO</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">UPDATE [tabela]</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    Especifica qual tabela do esquema de banco de dados terá seus registros modificados fisicamente no disco.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; border-top: 4px solid #ea580c;">
                <span style="font-weight: 800; color: #ea580c; font-size: 11px; background: #ffedd5; padding: 2px 8px; border-radius: 4px;">PASSO 2: A ATRIBUIÇÃO</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">SET coluna = novo_valor</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    Define qual coluna sofrerá a alteração e qual será o novo valor (ou cálculo) a ser gravado por cima do dado antigo.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; border-top: 4px solid #059669;">
                <span style="font-weight: 800; color: #059669; font-size: 11px; background: #dcfce7; padding: 2px 8px; border-radius: 4px;">PASSO 3: O FILTRO</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">WHERE condicao_filtro</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    Restringe a alteração exclusivamente às linhas que atendem à condição (geralmente usando a Chave Primária <code>id</code>).
                </p>
            </div>
        </div>

        <!-- INFOGRÁFICO DO CICLO DE EXECUÇÃO DO UPDATE -->
        <div style="background: #0f172a; border-radius: 10px; padding: 20px; margin: 20px 0; color: #ffffff; border: 1px solid #334155;">
            <div style="font-size: 13.5px; font-weight: 700; color: #38bdf8; margin-bottom: 14px; display: flex; align-items: center; gap: 8px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                Fluxo de Execução do Comando UPDATE no Servidor MySQL:
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 14px;">
                <div style="background: rgba(255,255,255,0.05); padding: 14px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
                    <div style="color: #38bdf8; font-weight: 800; font-size: 12px; margin-bottom: 4px;">1. PARSING & FILTRO</div>
                    <div style="font-size: 13px; font-weight: 700;">Localização no Índice</div>
                    <div style="font-size: 11.5px; color: #94a3b8; margin-top: 4px;">O MySQL lê a cláusula <code>WHERE</code> e encontra exatamente o endereço de memória/disco das linhas selecionadas.</div>
                </div>
                <div style="background: rgba(255,255,255,0.05); padding: 14px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
                    <div style="color: #fbbf24; font-weight: 800; font-size: 12px; margin-bottom: 4px;">2. ATRIBUIÇÃO & LOCK</div>
                    <div style="font-size: 13px; font-weight: 700;">Gravação Segura</div>
                    <div style="font-size: 11.5px; color: #94a3b8; margin-top: 4px;">O motor InnoDB bloqueia a linha, valida tipos de dados e chaves estrangeiras e substitui os dados nas colunas do <code>SET</code>.</div>
                </div>
                <div style="background: rgba(255,255,255,0.05); padding: 14px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
                    <div style="color: #4ade80; font-weight: 800; font-size: 12px; margin-bottom: 4px;">3. COMMIT & LOG</div>
                    <div style="font-size: 13px; font-weight: 700;">Action Output</div>
                    <div style="font-size: 11.5px; color: #94a3b8; margin-top: 4px;">A transação é persistida no arquivo de dados (Redo Log) e o servidor retorna <code>X row(s) affected</code> com status verde.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 2: ATUALIZANDO UM ÚNICO VALOR
     ========================================== -->
<section id="update-unico-valor" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">2. Atualizando um Único Valor (O Básico Seguro)</h2>
            <div class="section-subtitle">Alteração pontual de um único atributo através do identificador de Chave Primária</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Imagine que o cliente <strong>Carlos Almeida</strong> (da empresa <em>Auto Mecânica Silva & Irmãos</em>), que cadastramos nos módulos anteriores, entrou em contato com a equipe comercial da AutoMetal informando que mudou o número de telefone de contato.
        </p>
        <p>
            <strong>Nosso Objetivo:</strong> Alterar <em>apenas</em> a coluna <code>telefone</code> do cliente Carlos (cujo identificador exclusivo é <code>id_cliente = 1</code>), sem tocar no nome, CPF/CNPJ, e-mail ou endereço físico.
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Script SQL: Atualização de Telefone do Cliente com Chave Primária</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar Script SQL</button>
            </div>
            <pre><code>USE aluno140_metal;

-- Atualizando o telefone do cliente específico (Carlos Almeida)
UPDATE cliente 
SET telefone = '14999112233' 
WHERE id_cliente = 1;

-- Verificando imediatamente o resultado da alteração
SELECT id_cliente, nome_completo, telefone, email 
FROM cliente 
WHERE id_cliente = 1;</code></pre>
        </div>

        <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; margin: 16px 0;">
            <h4 style="color: #0f172a; margin: 0 0 8px; font-size: 13.5px;">💡 Análise Didática Passo a Passo da Execução:</h4>
            <ul style="margin: 0 0 0 18px; font-size: 13px; color: #475569; line-height: 1.6;">
                <li><strong>O Servidor vai até a tabela <code>cliente</code>:</strong> Localiza no disco a estrutura da tabela física.</li>
                <li><strong>Aplica o filtro <code>WHERE id_cliente = 1</code>:</strong> Graças ao índice de Chave Primária (PK), o servidor encontra a linha em tempo quase instantâneo (0.001s).</li>
                <li><strong>Substitui o dado na coluna <code>telefone</code>:</strong> O número antigo <code>(19) 98765-4321</code> é sobrescrito pelo novo valor <code>14999112233</code>.</li>
                <li><strong>Preservação Integral:</strong> Todos os demais atributos (nome, CNPJ, e-mail, endereço) permanecem 100% intactos e sem qualquer alteração.</li>
            </ul>
        </div>

        <!-- SIMULAÇÃO VISUAL DA TABELA ANTES E DEPOIS -->
        <div style="border: 1.5px solid #cbd5e1; border-radius: 8px; overflow: hidden; background: #ffffff; margin: 18px 0;">
            <div style="background: #f1f5f9; padding: 8px 14px; border-bottom: 1px solid #cbd5e1; display: flex; align-items: center; justify-content: space-between; font-size: 12px; font-weight: 700; color: #334155;">
                <span>📋 Comparativo na Tabela <code>cliente</code>: Antes vs Depois do UPDATE</span>
                <span style="background: #dcfce7; color: #166534; padding: 2px 8px; border-radius: 4px; font-size: 11px;">1 row affected</span>
            </div>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 12px; text-align: left; font-family: var(--font-mono);">
                    <thead>
                        <tr style="background: #f8fafc; color: #475569; border-bottom: 1.5px solid #cbd5e1;">
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">Estado</th>
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">id_cliente</th>
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">nome_completo</th>
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0; background: #fef3c7; color: #92400e;">telefone</th>
                            <th style="padding: 8px 10px;">email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid #f1f5f9; background: #fff1f2;">
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9; color: #be123c; font-weight: 700;">ANTES</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">1</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">Auto Mecânica Silva & Irmãos</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9; text-decoration: line-through; color: #be123c;">(19) 98765-4321</td>
                            <td style="padding: 7px 10px;">contato@mecanicasilva.com.br</td>
                        </tr>
                        <tr style="background: #f0fdf4;">
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9; color: #166534; font-weight: 700;">DEPOIS</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">1</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">Auto Mecânica Silva & Irmãos</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9; font-weight: 700; color: #166534;">14999112233</td>
                            <td style="padding: 7px 10px;">contato@mecanicasilva.com.br</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 7.1 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 7.1
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Execução do UPDATE Pontual no MySQL Workbench</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 7.1: Execução do comando UPDATE cliente SET telefone = '14999112233' WHERE id_cliente = 1; no MySQL Workbench com semáforo verde no Action Output indicando 1 row(s) affected" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/update-pontual-cliente-sucesso.png" alt="Execução do comando UPDATE cliente SET telefone = '14999112233' WHERE id_cliente = 1 no MySQL Workbench com semáforo verde no Action Output" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 7.1:</strong> Execução do comando <code>UPDATE cliente SET telefone = '14999112233' WHERE id_cliente = 1;</code> no MySQL Workbench, destacando a mensagem do painel <em>Action Output</em> com o semáforo verde confirmando <code>1 row(s) affected</code> e <code>Changed: 1</code>. <em>(Clique na imagem para ampliá-la em tela cheia)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 3: ATUALIZANDO MÚLTIPLAS COLUNAS
     ========================================== -->
<section id="update-multiplas-colunas" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
        </div>
        <div>
            <h2 class="section-title">3. Atualizando Múltiplas Colunas ao Mesmo Tempo</h2>
            <div class="section-subtitle">Alterando vários campos de um mesmo registro com uma única instrução atômica</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            No gerenciamento de almoxarifados industriais, é extremamente comum recebermos uma remessa de mercadorias onde precisamos atualizar <strong>duas ou mais informações</strong> ao mesmo tempo.
        </p>
        <p>
            <strong>Cenário Real da AutoMetal Brasil:</strong> Chegou à fábrica um novo lote da peça <strong>"Pastilha de Freio Dianteira"</strong> (que possui o <code>id_peca = 2</code>). A diretoria de suprimentos determinou que o novo preço unitário de venda será de <code>R$ 195,90</code> e a quantidade total em estoque deve ser ajustada para <code>80 unidades</code>.
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Script SQL: Atualização de Preço e Estoque com Vírgulas</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar Script SQL</button>
            </div>
            <pre><code>USE aluno140_metal;

-- Atualizando preço e estoque da pastilha de freio separando por vírgula
UPDATE peca 
SET preco_unitario = 195.90, 
    quantidade_estoque = 80 
WHERE id_peca = 2;

-- Confirmando a alteração na tabela peca
SELECT id_peca, nome_peca, preco_unitario, quantidade_estoque 
FROM peca 
WHERE id_peca = 2;</code></pre>
        </div>

        <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; margin: 16px 0;">
            <h4 style="color: #0f172a; margin: 0 0 8px; font-size: 13.5px;">🔑 Regra de Sintaxe Fundamental:</h4>
            <p style="font-size: 13px; color: #475569; margin: 0; line-height: 1.55;">
                A palavra-chave <code>SET</code> é declarada <strong>uma única vez</strong> no início. Para alterar várias colunas, separamos cada atribuição por uma <strong>vírgula (<code>,</code>)</strong>:
                <br><code style="color: #0284c7; font-weight: 700;">SET coluna1 = valor1, coluna2 = valor2, coluna3 = valor3</code>
                <br>A cláusula <code>WHERE id_peca = 2</code> no final garante que apenas a pastilha de freio seja modificada, sem afetar as baterias ou os filtros.
            </p>
        </div>

        <!-- SIMULAÇÃO VISUAL DA TABELA PECA ANTES E DEPOIS -->
        <div style="border: 1.5px solid #cbd5e1; border-radius: 8px; overflow: hidden; background: #ffffff; margin: 18px 0;">
            <div style="background: #f1f5f9; padding: 8px 14px; border-bottom: 1px solid #cbd5e1; display: flex; align-items: center; justify-content: space-between; font-size: 12px; font-weight: 700; color: #334155;">
                <span>📋 Comparativo na Tabela <code>peca</code>: Preço e Estoque</span>
                <span style="background: #dcfce7; color: #166534; padding: 2px 8px; border-radius: 4px; font-size: 11px;">1 row affected</span>
            </div>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 12px; text-align: left; font-family: var(--font-mono);">
                    <thead>
                        <tr style="background: #f8fafc; color: #475569; border-bottom: 1.5px solid #cbd5e1;">
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">Estado</th>
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">id_peca</th>
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">nome_peca</th>
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0; background: #fef3c7; color: #92400e;">preco_unitario</th>
                            <th style="padding: 8px 10px; background: #e0f2fe; color: #0369a1;">quantidade_estoque</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid #f1f5f9; background: #fff1f2;">
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9; color: #be123c; font-weight: 700;">ANTES</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">2</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">Pastilha de Freio Dianteira</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9; text-decoration: line-through; color: #be123c;">R$ 180,00</td>
                            <td style="padding: 7px 10px; text-decoration: line-through; color: #be123c;">45</td>
                        </tr>
                        <tr style="background: #f0fdf4;">
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9; color: #166534; font-weight: 700;">DEPOIS</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">2</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">Pastilha de Freio Dianteira</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9; font-weight: 700; color: #166534;">R$ 195,90</td>
                            <td style="padding: 7px 10px; font-weight: 700; color: #166534;">80</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 7.2 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 7.2
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">UPDATE de Múltiplas Colunas no MySQL Workbench</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 7.2: Execução do UPDATE peca SET preco_unitario = 195.90, quantidade_estoque = 80 WHERE id_peca = 2; no MySQL Workbench com confirmação de sucesso no Action Output" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/update-multiplas-colunas-peca-sucesso.png" alt="Execução do UPDATE peca com múltiplas colunas no MySQL Workbench" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 7.2:</strong> Execução da query com múltiplas colunas atribuídas por vírgula no MySQL Workbench, evidenciando o status de sucesso no <em>Action Output</em> com <code>1 row(s) affected</code>. <em>(Clique na imagem para ampliá-la em tela cheia)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 4: UPDATE COM CÁLCULOS MATEMÁTICOS
     ========================================== -->
<section id="update-calculos-matematicos" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="5" x2="5" y2="19"></line><circle cx="6.5" cy="6.5" r="2.5"></circle><circle cx="17.5" cy="17.5" r="2.5"></circle></svg>
        </div>
        <div>
            <h2 class="section-title">4. O UPDATE com Cálculos Matemáticos (Reajustes em Lote)</h2>
            <div class="section-subtitle">Aproveitando o poder de processamento do servidor MySQL para calcular porcentagens e reajustes</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Existem situações corporativas onde aplicar uma alteração em <strong>múltiplas linhas simultaneamente</strong> é exatamente o comportamento desejado.
        </p>
        <p>
            <strong>Cenário de Reajuste Inflacionário:</strong> Suponha que os custos de matéria-prima subiram e a diretoria da AutoMetal aprovou um <strong>aumento linear de 10%</strong> em todas as peças pertencentes à categoria <strong>"Filtros"</strong> (identificada como <code>id_categoria = 1</code>).
        </p>
        <p>
            Em vez de abrir uma calculadora, calcular produto por produto manualmente e rodar dezenas de instruções <code>UPDATE</code> individuais, deixamos o processador do servidor MySQL fazer todo o cálculo aritmético:
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Script SQL: Reajuste de 10% em Lote por Categoria</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar Script SQL</button>
            </div>
            <pre><code>USE aluno140_metal;

-- Aumentando em 10% o preço de TODAS as peças da categoria 1 (Filtros)
UPDATE peca 
SET preco_unitario = preco_unitario * 1.10 
WHERE id_categoria = 1;

-- Conferindo os novos preços calculados da categoria 1
SELECT id_peca, nome_peca, preco_unitario, id_categoria 
FROM peca 
WHERE id_categoria = 1;</code></pre>
        </div>

        <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; margin: 16px 0;">
            <h4 style="color: #0f172a; margin: 0 0 8px; font-size: 13.5px;">🧮 Como a Expressão Matemática Opera:</h4>
            <p style="font-size: 13px; color: #475569; margin: 0; line-height: 1.55;">
                O comando <code>preco_unitario = preco_unitario * 1.10</code> lê o valor atual gravado em cada registro, multiplica por <code>1.10</code> (equivalente a 100% do preço original + 10% de acréscimo) e regrava o novo resultado arredondado na coluna.
                <br>Como o <code>WHERE id_categoria = 1</code> restringe o escopo, <strong>apenas os filtros sofrem o reajuste</strong>; peças de outras categorias (freios, baterias, óleos) permanecem com seus preços inalterados.
            </p>
        </div>

        <!-- SIMULAÇÃO VISUAL DO REAJUSTE EM LOTE -->
        <div style="border: 1.5px solid #cbd5e1; border-radius: 8px; overflow: hidden; background: #ffffff; margin: 18px 0;">
            <div style="background: #f1f5f9; padding: 8px 14px; border-bottom: 1px solid #cbd5e1; display: flex; align-items: center; justify-content: space-between; font-size: 12px; font-weight: 700; color: #334155;">
                <span>📋 Efeito do Reajuste em Lote na Categoria 1 (Filtros)</span>
                <span style="background: #dcfce7; color: #166534; padding: 2px 8px; border-radius: 4px; font-size: 11px;">2 rows affected</span>
            </div>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 12px; text-align: left; font-family: var(--font-mono);">
                    <thead>
                        <tr style="background: #f8fafc; color: #475569; border-bottom: 1.5px solid #cbd5e1;">
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">id_peca</th>
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">nome_peca</th>
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">id_categoria</th>
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">Preço Original</th>
                            <th style="padding: 8px 10px; background: #f0fdf4; color: #166534; font-weight: 700;">Preço com +10% (* 1.10)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">1</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">Filtro de Óleo Blindado TecFil</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">1 (Filtros)</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9; text-decoration: line-through; color: #64748b;">R$ 38,00</td>
                            <td style="padding: 7px 10px; background: #f0fdf4; color: #166534; font-weight: 700;">R$ 41,80</td>
                        </tr>
                        <tr style="background: #fafafa;">
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">4</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">Filtro de Ar Motor Alta Vazão</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">1 (Filtros)</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9; text-decoration: line-through; color: #64748b;">R$ 55,00</td>
                            <td style="padding: 7px 10px; background: #f0fdf4; color: #166534; font-weight: 700;">R$ 60,50</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 7.3 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 7.3
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Reajuste em Lote com Cálculo Matemático no Workbench</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 7.3: Execução de UPDATE peca SET preco_unitario = preco_unitario * 1.10 WHERE id_categoria = 1; no MySQL Workbench com semáforo verde indicando 2 row(s) affected" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/update-calculo-percentual-peca-sucesso.png" alt="Execução do UPDATE peca com reajuste percentual no MySQL Workbench" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 7.3:</strong> Execução do reajuste percentual em lote no MySQL Workbench, demonstrando o <em>Action Output</em> com <code>2 row(s) affected</code> e os novos preços reajustados para todos os registros da categoria 1. <em>(Clique na imagem para ampliá-la em tela cheia)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 5: BOAS PRÁTICAS DE PREVENÇÃO
     ========================================== -->
<section id="boas-praticas-prevencao" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">5. Boas Práticas de Prevenção: O Método SELECT Prévio</h2>
            <div class="section-subtitle">O procedimento de segurança adotado por Administradores de Banco de Dados sêniores</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Para alunos que estão iniciando a administração de sistemas corporativos, existe uma técnica de ouro para nunca cometer erros em produção: <strong>sempre execute uma consulta SELECT com a mesmíssima condição WHERE antes de disparar o UPDATE</strong>.
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin: 18px 0;">
            <div style="background: #ffffff; border: 1.5px solid #0284c7; border-radius: 10px; padding: 16px;">
                <div style="color: #0284c7; font-weight: 800; font-size: 12px; margin-bottom: 4px;">PASSO 1: O TESTE DE MIRA (SELECT)</div>
                <h4 style="margin: 0 0 8px; font-size: 14px; color: #0f172a;">Inspecione o Registro</h4>
                <p style="font-size: 12px; color: #475569; margin-bottom: 10px; line-height: 1.5;">
                    Rode o SELECT para ver na <em>Result Grid</em> exatamente quais linhas a sua condição vai atingir:
                </p>
                <pre style="background: #0f172a; color: #38bdf8; padding: 8px 10px; border-radius: 6px; font-size: 11.5px; font-family: var(--font-mono); margin: 0;"><code>SELECT id_pedido, status, valor_total 
FROM pedido 
WHERE id_pedido = 1;</code></pre>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #059669; border-radius: 10px; padding: 16px;">
                <div style="color: #059669; font-weight: 800; font-size: 12px; margin-bottom: 4px;">PASSO 2: A EXECUÇÃO SEGURA (UPDATE)</div>
                <h4 style="margin: 0 0 8px; font-size: 14px; color: #0f172a;">Substitua com Certeza</h4>
                <p style="font-size: 12px; color: #475569; margin-bottom: 10px; line-height: 1.5;">
                    Se a tela exibiu exatamente o pedido correto, substitua <code>SELECT...FROM</code> por <code>UPDATE...SET</code>:
                </p>
                <pre style="background: #0f172a; color: #4ade80; padding: 8px 10px; border-radius: 6px; font-size: 11.5px; font-family: var(--font-mono); margin: 0;"><code>UPDATE pedido 
SET status = 'Faturado' 
WHERE id_pedido = 1;</code></pre>
            </div>
        </div>

        <!-- 3 PILARES DA SEGURANÇA EM DML -->
        <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; margin: 18px 0;">
            <strong style="color: #0f172a; font-size: 13.5px; display: block; margin-bottom: 10px;">
                🛡️ Checklist de Sobrevivência do DBA em Ambientes de Produção:
            </strong>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px;">
                <div style="background: #ffffff; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1;">
                    <span style="font-weight: 700; color: #0284c7; font-size: 12.5px;">1. Usar Chaves Primárias</span>
                    <p style="font-size: 11.5px; color: #475569; margin: 4px 0 0; line-height: 1.45;">
                        Sempre que possível, use <code>WHERE id_tabela = X</code> para garantir que apenas um registro único seja alterado.
                    </p>
                </div>
                <div style="background: #ffffff; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1;">
                    <span style="font-weight: 700; color: #059669; font-size: 12.5px;">2. Transações ACID (START TRANSACTION)</span>
                    <p style="font-size: 11.5px; color: #475569; margin: 4px 0 0; line-height: 1.45;">
                        Em operações críticas, abra uma transação; se errar, use <code>ROLLBACK;</code> para desfazer tudo.
                    </p>
                </div>
                <div style="background: #ffffff; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1;">
                    <span style="font-weight: 700; color: #7c3aed; font-size: 12.5px;">3. Backup / Dump Periódico</span>
                    <p style="font-size: 11.5px; color: #475569; margin: 4px 0 0; line-height: 1.45;">
                        Mantenha cópias de segurança geradas pelo utilitário <code>mysqldump</code> antes de rodar reajustes massivos.
                    </p>
                </div>
            </div>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 7.4 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 7.4
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Técnica Preventiva do SELECT Prévio no MySQL Workbench</span>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 14px; margin: 12px 0;">
                <!-- PASSO 1: SELECT DE VALIDAÇÃO -->
                <div>
                    <div style="font-size: 11.5px; font-weight: 700; color: #0284c7; margin-bottom: 5px; display: flex; align-items: center; gap: 6px;">
                        <span>🔍 1. Validação Prévia (SELECT na Result Grid)</span>
                    </div>
                    <div class="zoomable-image-container" data-caption="Figura 7.4 (Passo 1): Execução do SELECT id_pedido, status, valor_total FROM pedido WHERE id_pedido = 1; exibindo o registro na Result Grid antes de qualquer alteração" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06);">
                        <img src="public/img/update-preventivo-passo1-select.png" alt="Passo 1: SELECT prévio de validação no MySQL Workbench" style="width: 100%; height: auto; display: block; object-fit: contain;">
                        <div class="image-zoom-overlay">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                            <span>Ampliar</span>
                        </div>
                    </div>
                </div>

                <!-- PASSO 2: UPDATE DE EXECUÇÃO -->
                <div>
                    <div style="font-size: 11.5px; font-weight: 700; color: #059669; margin-bottom: 5px; display: flex; align-items: center; gap: 6px;">
                        <span>⚡ 2. Execução Segura (UPDATE com Status Verde)</span>
                    </div>
                    <div class="zoomable-image-container" data-caption="Figura 7.4 (Passo 2): Execução do UPDATE pedido SET status = 'Faturado' WHERE id_pedido = 1; com semáforo verde no Action Output indicando 1 row(s) affected" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06);">
                        <img src="public/img/update-preventivo-passo2-update.png" alt="Passo 2: UPDATE com status verde no MySQL Workbench" style="width: 100%; height: auto; display: block; object-fit: contain;">
                        <div class="image-zoom-overlay">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                            <span>Ampliar</span>
                        </div>
                    </div>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 7.4:</strong> Demonstração prática do método preventivo no MySQL Workbench, onde o aluno primeiro confirma visualmente o registro retornado na grade via <code>SELECT</code> e só depois dispara o comando de alteração definitiva <code>UPDATE</code> com status verde. <em>(Clique nas imagens para ampliá-las individualmente em tela cheia)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 6: SAFE UPDATES NO WORKBENCH
     ========================================== -->
<section id="safe-updates-workbench" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
        </div>
        <div>
            <h2 class="section-title">6. Safe Updates no MySQL Workbench: O Anjo da Guarda</h2>
            <div class="section-subtitle">Compreendendo o Error Code 1175 e como gerenciar travas de segurança em operações de lote</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Ao tentar rodar um comando <code>UPDATE</code> que altera várias linhas (como o reajuste de 10% por categoria visto na Seção 4), é muito comum o MySQL Workbench recusar a execução exibindo um erro com semáforo vermelho:
        </p>

        <!-- CAIXA DO ERRO 1175 -->
        <div style="background: #1e1b4b; border: 1.5px solid #6366f1; border-radius: 8px; padding: 14px 18px; margin: 16px 0; font-family: var(--font-mono); font-size: 12.5px; color: #e0e7ff; line-height: 1.6;">
            <span style="color: #ef4444; font-weight: 700;">Error Code: 1175.</span> You are using safe update mode and you tried to update a table without a WHERE that uses a KEY column. To disable safe mode, toggle the option in Preferences -> SQL Editor and reconnect.
        </div>

        <p>
            <strong>Por que esse erro acontece?</strong> Por padrão de fábrica, o MySQL Workbench vem com a opção <strong>Safe Updates</strong> ativada. Trata-se de uma trava de proteção que <strong>bloqueia qualquer UPDATE ou DELETE</strong> que não utilize uma coluna de Chave Primária (PK) na cláusula <code>WHERE</code>, impedindo alterações acidentais em massa.
        </p>

        <h4 style="color: #0f172a; margin: 16px 0 8px; font-size: 14px;">🛠️ Como Liberar Temporariamente via Script SQL:</h4>
        <div class="code-wrapper">
            <div class="code-header">
                <span>Script SQL: Desabilitando e Reabilitando o Safe Updates via Sessão</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar Script SQL</button>
            </div>
            <pre><code>USE aluno140_metal;

-- 1. Desabilita temporariamente a trava de segurança para a sua sessão
SET SQL_SAFE_UPDATES = 0;

-- 2. Executa a alteração em lote por categoria
UPDATE peca 
SET preco_unitario = preco_unitario * 1.10 
WHERE id_categoria = 1;

-- 3. REABILITA IMEDIATAMENTE a proteção para evitar acidentes futuros
SET SQL_SAFE_UPDATES = 1;</code></pre>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 7.5 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 7.5
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Mensagem de Erro 1175 e Painel de Preferências do Workbench</span>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px; margin: 12px 0;">
                <!-- ETAPA 1: OCORRÊNCIA DO ERRO 1175 -->
                <div>
                    <div style="font-size: 11.5px; font-weight: 700; color: #dc2626; margin-bottom: 5px; display: flex; align-items: center; gap: 6px;">
                        <span>🛑 1. Bloqueio Error 1175 no Action Output</span>
                    </div>
                    <div class="zoomable-image-container" data-caption="Figura 7.5 (Etapa 1): Error Code: 1175 no MySQL Workbench ao tentar executar UPDATE sem chave primária na cláusula WHERE" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06);">
                        <img src="public/img/safe-updates-passo1-erro-1175.png" alt="Etapa 1: Error Code 1175 no MySQL Workbench" style="width: 100%; height: auto; display: block; object-fit: contain;">
                        <div class="image-zoom-overlay">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                            <span>Ampliar</span>
                        </div>
                    </div>
                </div>

                <!-- ETAPA 2: MENU PREFERENCES -->
                <div>
                    <div style="font-size: 11.5px; font-weight: 700; color: #0284c7; margin-bottom: 5px; display: flex; align-items: center; gap: 6px;">
                        <span>⚙️ 2. Acesso ao Menu Edit &gt; Preferences</span>
                    </div>
                    <div class="zoomable-image-container" data-caption="Figura 7.5 (Etapa 2): Acesso às preferências do Workbench através do menu superior Edit > Preferences..." style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06);">
                        <img src="public/img/safe-updates-passo2-menu-preferences.png" alt="Etapa 2: Acesso ao menu Edit > Preferences no MySQL Workbench" style="width: 100%; height: auto; display: block; object-fit: contain;">
                        <div class="image-zoom-overlay">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                            <span>Ampliar</span>
                        </div>
                    </div>
                </div>

                <!-- ETAPA 3: JANELA SQL EDITOR & SAFE UPDATES -->
                <div>
                    <div style="font-size: 11.5px; font-weight: 700; color: #059669; margin-bottom: 5px; display: flex; align-items: center; gap: 6px;">
                        <span>🔓 3. Desmarcar a opção Safe Updates</span>
                    </div>
                    <div class="zoomable-image-container" data-caption="Figura 7.5 (Etapa 3): Janela Workbench Preferences na aba SQL Editor destacando a caixa Safe Updates" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06);">
                        <img src="public/img/safe-updates-passo3-desmarcar-opcao.png" alt="Etapa 3: Opção Safe Updates na janela Preferences do MySQL Workbench" style="width: 100%; height: auto; display: block; object-fit: contain;">
                        <div class="image-zoom-overlay">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                            <span>Ampliar</span>
                        </div>
                    </div>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 7.5:</strong> Visualização completa do processo de Safe Updates: o bloqueio com semáforo vermelho <em>Error Code: 1175</em> no Action Output, o caminho pelo menu <em>Edit &gt; Preferences...</em> e a configuração da aba <em>SQL Editor</em> onde a trava de segurança pode ser gerenciada. <em>(Clique nas imagens para ampliá-las individualmente em tela cheia)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 7: ATIVIDADE PRÁTICA DO MÓDULO 7
     ========================================== -->
<section id="atividade-pratica-update" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
        </div>
        <div>
            <h2 class="section-title">7. Atividade Prática: Manutenção e Atualização do Banco de Dados</h2>
            <div class="section-subtitle">Consolide seus conhecimentos em DML e envie seus scripts oficiais de UPDATE</div>
        </div>
    </div>

    <div class="theory-block">
        <div class="company-case-box">
            <div class="company-case-header">
                <span class="company-badge-pill">🏆 Missão Prática de Atualização de Dados</span>
                <h4 class="company-case-title">Caso Real: Manutenção Cadastral e Operacional da AutoMetal Brasil S.A.</h4>
            </div>
            <p style="font-size: 13px; color: #166534; line-height: 1.55; margin: 0;">
                O supervisor de TI da AutoMetal Brasil solicitou a você a escrita e execução de scripts SQL para atender a 3 chamados urgentes de manutenção no banco de dados:
                <br><strong>Demanda 1 (Atualização de Cadastro):</strong> O cliente <em>"Centro Automotivo Paulista Ltda"</em> (<code>id_cliente = 2</code>) mudou de sede física. Atualize o seu endereço para <code>'Av. Paulista, 1800 - Conjunto 42 - São Paulo/SP'</code> e o e-mail para <code>'atendimento@paulistacar.com.br'</code> em um único comando.
                <br><strong>Demanda 2 (Entrada de Estoque & Reajuste):</strong> Chegou uma remessa da peça <em>"Bateria 60Ah Heliar"</em> (<code>id_peca = 3</code>). Atualize o estoque para <code>35 unidades</code> e defina o novo preço promocional para <code>R$ 429,00</code>.
                <br><strong>Demanda 3 (Gestão de Pedidos):</strong> O pedido com <code>id_pedido = 2</code> foi entregue pela transportadora. Aplique a técnica do SELECT prévio e atualize o seu status para <code>'Entregue'</code>.
            </p>
        </div>

        <form class="project-submit-form" onsubmit="event.preventDefault(); alert('Parabéns! Sua atividade de atualização UPDATE do Módulo 7 foi enviada com sucesso.');">
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    Nome Completo do Aluno:
                </label>
                <input type="text" required placeholder="Digite seu nome completo..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13.5px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    1. Explique com suas palavras o que acontece se você executar um comando UPDATE sem a cláusula WHERE em um banco de produção:
                </label>
                <textarea rows="3" required placeholder="Descreva o impacto de esquecer a cláusula WHERE..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; font-family: var(--font-main);"></textarea>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    2. Escreva o script SQL para atender à Demanda 1 (Atualização do endereço e e-mail do cliente id = 2):
                </label>
                <textarea rows="4" required placeholder="UPDATE cliente SET ... WHERE id_cliente = 2;" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; font-family: var(--font-mono);"></textarea>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    3. Escreva o script SQL para atender à Demanda 2 (Estoque = 35 e Preço = 429.00 na peça id = 3):
                </label>
                <textarea rows="4" required placeholder="UPDATE peca SET ... WHERE id_peca = 3;" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; font-family: var(--font-mono);"></textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    4. Escreva os dois comandos da técnica do SELECT prévio para a Demanda 3 (Validação com SELECT e execução com UPDATE no pedido id = 2):
                </label>
                <textarea rows="5" required placeholder="-- 1. SELECT de Validação&#10;SELECT ...;&#10;&#10;-- 2. UPDATE de Execução&#10;UPDATE ...;" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; font-family: var(--font-mono);"></textarea>
            </div>

            <button type="submit" class="btn-submit-project" style="background: #ea580c; border: none; color: #ffffff; padding: 12px 24px; border-radius: 8px; font-weight: 700; font-size: 14px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                Enviar Atividade de UPDATE do Módulo 7
            </button>
        </form>
    </div>
</section>
