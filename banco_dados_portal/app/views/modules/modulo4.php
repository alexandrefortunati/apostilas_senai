<div class="hero-card">
    <div class="hero-tags">
        <span class="badge-tag senai">SENAI - SP • Módulo 4</span>
        <span class="badge-tag accent">Capítulo 4: Manipulação de Dados (DML)</span>
        <span class="badge-tag time">Guia Prático Passo a Passo</span>
    </div>
    <h1 class="hero-title"><?= htmlspecialchars($module['title']) ?></h1>
    <p class="hero-desc">
        Aprenda a povoar o banco de dados da fábrica <strong>AutoMetal Brasil S.A.</strong> na prática através do comando <strong>INSERT INTO</strong> no <strong>Oracle MySQL Workbench</strong>: domine a sintaxe explícita e em lote (<em>Bulk Insert</em>), compreenda o funcionamento automático do <strong>AUTO_INCREMENT</strong>, respeite a ordem lógica de integridade das <strong>Chaves Estrangeiras (FK)</strong> e aprenda a diagnosticar e corrigir visualmente os principais erros de inserção (Erros 1062, 1452 e 1048).
    </p>
</div>

<!-- ==========================================
     SEÇÃO 1: INTRODUÇÃO AO DML E AO INSERT
     ========================================== -->
<section id="intro-dml-insert" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"></path></svg>
        </div>
        <div>
            <h2 class="section-title">1. O Papel do DML e do Comando INSERT na Persistência de Dados</h2>
            <div class="section-subtitle">Como as informações saem da memória e são gravadas definitivamente no disco</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            No Módulo 3, utilizamos o <strong>Forward Engineer</strong> para criar a estrutura física das tabelas (o "esqueleto" do banco de dados). Agora, entramos na camada de <strong>DML (Data Manipulation Language — Linguagem de Manipulação de Dados)</strong>, que é o conjunto de comandos SQL responsáveis por alimentar, consultar, atualizar e excluir as informações do dia a dia da empresa.
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 14px; margin: 18px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <span style="font-weight: 800; color: #0284c7; font-size: 11px; background: #e0f2fe; padding: 2px 8px; border-radius: 4px;">CONCEITO</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">O "Salvar" das Aplicações</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    Quando um operador cadastra uma nova peça no sistema web ou mobile e clica em <strong>"Salvar"</strong>, o programa traduz aquele formulário em um comando <code>INSERT INTO</code> e o envia ao MySQL.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <span style="font-weight: 800; color: #059669; font-size: 11px; background: #dcfce7; padding: 2px 8px; border-radius: 4px;">OPERAÇÃO CRUD</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">A Letra 'C' do CRUD</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    No desenvolvimento de software, o comando <code>INSERT</code> representa o <strong>Create</strong> (Criação/Inserção de novos registros) do padrão internacional CRUD.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <span style="font-weight: 800; color: #7c3aed; font-size: 11px; background: #f3e8ff; padding: 2px 8px; border-radius: 4px;">PERSISTÊNCIA</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">Gravação no Disco Físico</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    Diferente da memória RAM temporária, os dados inseridos são persistidos nos arquivos de armazenamento do MySQL, garantindo que nunca se percam ao reiniciar o servidor.
                </p>
            </div>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 4.1 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 4.1
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Árvore Schemas & As 5 Tabelas Criadas</span>
            </div>

            <div style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/workbench-schemas-tabelas-criadas.png" alt="MySQL Workbench com as 5 tabelas criadas no painel Navigator Schemas" style="width: 100%; height: auto; display: block; object-fit: contain;">
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 4.1:</strong> Painel <em>Navigator / Schemas</em> no MySQL Workbench demonstrando a árvore do banco de dados com as 5 tabelas físicas criadas com sucesso pelo Forward Engineer.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 2: SINTAXES E REGRAS DE TIPOS DE DADOS
     ========================================== -->
<section id="sintaxe-regras-insert" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 7 4 4 20 4 20 7"></polyline><line x1="9" y1="20" x2="15" y2="20"></line><line x1="12" y1="4" x2="12" y2="20"></line></svg>
        </div>
        <div>
            <h2 class="section-title">2. Sintaxes do Comando INSERT INTO e Regras de Tipos de Dados</h2>
            <div class="section-subtitle">A estrutura correta para escrever comandos sem erros de digitação</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            No padrão SQL oficial, existem duas formas de escrever o comando <code>INSERT</code>. Conhecer a diferença entre elas é fundamental para escrever códigos seguros e profissionais:
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 18px; margin: 18px 0;">
            <!-- SINTAXE 1: EXPLÍCITA (RECOMENDADA) -->
            <div style="background: #ffffff; border: 2px solid #bbf7d0; border-radius: 10px; padding: 18px;">
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                    <span style="background: #16a34a; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">SINTAXE 1 (RECOMENDADA)</span>
                    <h4 style="margin: 0; font-size: 15px; color: #166534;">Declaração Explícita de Colunas</h4>
                </div>
                <p style="font-size: 12.5px; color: #334155; line-height: 1.55; margin-bottom: 10px;">
                    Você declara expressamente dentro dos parênteses quais colunas quer preencher.
                </p>
                <div style="background: #0f172a; border-radius: 6px; padding: 10px; font-family: var(--font-mono); font-size: 12px; color: #e2e8f0;">
                    <span style="color: #38bdf8; font-weight: 700;">INSERT INTO</span> categoria (nome_categoria, descricao_categoria)<br>
                    <span style="color: #38bdf8; font-weight: 700;">VALUES</span> (<span style="color: #a7f3d0;">'Motor'</span>, <span style="color: #a7f3d0;">'Componentes do bloco'</span>);
                </div>
                <div style="background: #f0fdf4; border-radius: 6px; padding: 8px; font-size: 11.5px; color: #166534; margin-top: 10px;">
                    ✅ <strong>Vantagem:</strong> O código fica imune a futuras alterações na ordem das colunas da tabela e permite ignorar colunas com <code>AUTO_INCREMENT</code>.
                </div>
            </div>

            <!-- SINTAXE 2: POSICIONAL -->
            <div style="background: #ffffff; border: 2px solid #fecdd3; border-radius: 10px; padding: 18px;">
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                    <span style="background: #e11d48; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">SINTAXE 2 (POSICIONAL)</span>
                    <h4 style="margin: 0; font-size: 15px; color: #9f1239;">Inserção Implícita por Posição</h4>
                </div>
                <p style="font-size: 12.5px; color: #334155; line-height: 1.55; margin-bottom: 10px;">
                    Você não informa o nome das colunas; os valores devem seguir <strong>exatamente a ordem física de criação</strong>.
                </p>
                <div style="background: #0f172a; border-radius: 6px; padding: 10px; font-family: var(--font-mono); font-size: 12px; color: #e2e8f0;">
                    <span style="color: #38bdf8; font-weight: 700;">INSERT INTO</span> categoria<br>
                    <span style="color: #38bdf8; font-weight: 700;">VALUES</span> (<span style="color: #fca5a5;">NULL</span>, <span style="color: #a7f3d0;">'Motor'</span>, <span style="color: #a7f3d0;">'Componentes'</span>);
                </div>
                <div style="background: #fff1f2; border-radius: 6px; padding: 8px; font-size: 11.5px; color: #9f1239; margin-top: 10px;">
                    ⚠️ <strong>Risco:</strong> Se uma nova coluna for adicionada à tabela no futuro, todas as suas linhas de comando quebrarão com erro.
                </div>
            </div>
        </div>

        <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; margin: 18px 0;">
            <strong style="color: #0f172a; font-size: 13.5px; display: block; margin-bottom: 10px;">
                📋 As 4 Regras de Ouro de Formatação de Tipos de Dados no INSERT:
            </strong>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 10px; font-size: 12.5px; color: #334155;">
                <div style="background: #ffffff; padding: 10px; border-radius: 6px; border: 1px solid #e2e8f0;">
                    <strong>1. Textos (VARCHAR, CHAR):</strong><br>
                    Sempre envolvidos por <strong>aspas simples</strong>.<br>
                    <em>Exemplo:</em> <code>'Pistão Forjado'</code>
                </div>
                <div style="background: #ffffff; padding: 10px; border-radius: 6px; border: 1px solid #e2e8f0;">
                    <strong>2. Datas (DATE, DATETIME):</strong><br>
                    Entre aspas simples no formato internacional <code>'AAAA-MM-DD'</code>.<br>
                    <em>Exemplo:</em> <code>'2026-08-26'</code>
                </div>
                <div style="background: #ffffff; padding: 10px; border-radius: 6px; border: 1px solid #e2e8f0;">
                    <strong>3. Valores Decimais (DECIMAL):</strong><br>
                    Sem aspas e usando <strong>ponto (.)</strong> no lugar da vírgula.<br>
                    <em>Exemplo:</em> <code>249.90</code> (e não 249,90)
                </div>
                <div style="background: #ffffff; padding: 10px; border-radius: 6px; border: 1px solid #e2e8f0;">
                    <strong>4. Chaves AUTO_INCREMENT:</strong><br>
                    <strong>Não informe</strong> no INSERT explícito; o MySQL gera o próximo número sozinho (1, 2, 3...).
                </div>
            </div>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 4.2 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 4.2
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Comando INSERT no Editor SQL & Raio Amarelo</span>
            </div>

            <div style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/insert-passo1-categoria-editor.png" alt="Comando INSERT INTO categoria digitado no SQL Editor do MySQL Workbench" style="width: 100%; height: auto; display: block; object-fit: contain;">
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 4.2:</strong> Execução do primeiro comando <code>INSERT INTO</code> na tabela <code>categoria</code> através do botão de execução (Raio ⚡) no MySQL Workbench.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 3: ORDEM DE POVOAMENTO E CHAVES ESTRANGEIRAS
     ========================================== -->
<section id="ordem-integridade-povoamento" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
        </div>
        <div>
            <h2 class="section-title">3. A Regra de Ouro da Ordem de Povoamento (Integridade Referencial)</h2>
            <div class="section-subtitle">Por que não podemos cadastrar uma peça antes de cadastrar a sua categoria?</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            No banco de dados relacional, a existência de <strong>Chaves Estrangeiras (Foreign Keys)</strong> impõe uma <strong>ordem cronológica obrigatória de inserção</strong>.
        </p>

        <div class="callout-box" style="border-left-color: #dc2626; background: #fef2f2; margin: 16px 0;">
            <div class="callout-title" style="color: #991b1b;">
                🛑 Regra Fundamental: A Dependência das Chaves
            </div>
            <p style="margin: 0; font-size: 13px; color: #7f1d1d; line-height: 1.6;">
                Você <strong>NUNCA</strong> pode inserir um registro em uma tabela que possui uma Chave Estrangeira se o registro "pai" ao qual ela aponta ainda não existir! Se tentarmos cadastrar uma peça com <code>id_categoria = 1</code> antes de criar a categoria 1, o MySQL rejeitará a gravação na hora com o <strong>Erro 1452</strong>.
            </p>
        </div>

        <p style="font-weight: 700; color: #0f172a; margin-top: 14px;">
            A sequência lógica e obrigatória de povoamento da AutoMetal Brasil S.A.:
        </p>

        <div style="display: flex; flex-direction: column; gap: 10px; margin: 16px 0;">
            <div style="background: #f0fdf4; border: 1.5px solid #86efac; border-radius: 8px; padding: 12px 16px; display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <span style="background: #16a34a; color: #ffffff; font-weight: 800; font-size: 11px; padding: 2px 8px; border-radius: 4px;">NÍVEL 1 (INDEPENDENTES)</span>
                    <strong style="color: #14532d; font-size: 14px; margin-left: 8px;">Tabelas: <code>categoria</code> e <code>cliente</code></strong>
                </div>
                <span style="font-size: 12px; color: #15803d; font-weight: 600;">Não dependem de ninguém &rarr; Insira PRIMEIRO!</span>
            </div>

            <div style="background: #eff6ff; border: 1.5px solid #93c5fd; border-radius: 8px; padding: 12px 16px; display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <span style="background: #0284c7; color: #ffffff; font-weight: 800; font-size: 11px; padding: 2px 8px; border-radius: 4px;">NÍVEL 2 (DEPENDENTES)</span>
                    <strong style="color: #0c4a6e; font-size: 14px; margin-left: 8px;">Tabelas: <code>peca</code> e <code>pedido</code></strong>
                </div>
                <span style="font-size: 12px; color: #0369a1; font-weight: 600;">Dependem de categoria e cliente &rarr; Insira em SEGUNDO!</span>
            </div>

            <div style="background: #faf5ff; border: 1.5px solid #d8b4fe; border-radius: 8px; padding: 12px 16px; display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <span style="background: #7c3aed; color: #ffffff; font-weight: 800; font-size: 11px; padding: 2px 8px; border-radius: 4px;">NÍVEL 3 (ASSOCIATIVA N:M)</span>
                    <strong style="color: #581c87; font-size: 14px; margin-left: 8px;">Tabela: <code>itens_pedido</code></strong>
                </div>
                <span style="font-size: 12px; color: #6b21a8; font-weight: 600;">Depende de peca e pedido &rarr; Insira por ÚLTIMO!</span>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 4: TUTORIAL PASSO A PASSO (POVOANDO AS 5 TABELAS)
     ========================================== -->
<section id="tutorial-insert-autometal" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">4. Tutorial Prático: Povoando as 5 Tabelas da AutoMetal Brasil</h2>
            <div class="section-subtitle">Passo a passo com os scripts completos de inserção para o banco de dados da fábrica</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Abra a sua aba de consultas no Workbench, selecione a sua base de dados individual com <code>USE aluno140_metal;</code> e execute as etapas na ordem exata apresentada abaixo:
        </p>

        <div class="step-guide-container">
            <!-- ==================== ETAPA 1: CATEGORIAS ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Etapa 1</span>
                    <h4 class="step-guide-title">Cadastrando as Categorias de Peças (Tabela categoria)</h4>
                </div>
                <p class="step-guide-desc">
                    Como a tabela <code>categoria</code> possui a coluna <code>id_categoria</code> configurada como <code>AUTO_INCREMENT</code>, só precisamos informar o <strong>nome</strong> e a <strong>descrição</strong>. O MySQL atribuirá automaticamente os IDs <code>1</code>, <code>2</code>, <code>3</code> e <code>4</code>:
                </p>

                <div class="code-wrapper">
                    <div class="code-header">
                        <span>Script SQL: Inserindo Categorias</span>
                        <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar INSERT Categorias</button>
                    </div>
                    <pre><code>-- 1. Ativar a base
USE aluno140_metal;

-- 2. Inserir 4 categorias de produtos fabricados
INSERT INTO categoria (nome_categoria, descricao_categoria) VALUES 
('Motor', 'Componentes internos do bloco e cabeçote'),
('Freios', 'Sistemas de frenagem a disco e tambor'),
('Suspensão', 'Amortecedores, molas e barras estabilizadoras'),
('Transmissão', 'Conjuntos de embreagem e engrenagens de câmbio');</code></pre>
                </div>

                <!-- RESULTADO VISUAL DA ETAPA 1 -->
                <div class="step-guide-image-box" style="margin: 14px 0 6px; border: 1.5px solid #cbd5e1;">
                    <img src="public/img/insert-etapa1-categoria-sucesso.png" alt="Resultado da execução do INSERT INTO categoria no MySQL Workbench com semáforo verde">
                </div>
                <div style="font-size: 11.5px; color: #64748b; margin-top: 4px;">
                    <strong>Figura 4.3:</strong> Inserção das 4 categorias no MySQL Workbench com o botão de execução (Raio ⚡) e confirmação no painel <em>Action Output</em> exibindo semáforo verde com <code>4 row(s) affected</code>.
                </div>
            </div>

            <!-- ==================== ETAPA 2: CLIENTES ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Etapa 2</span>
                    <h4 class="step-guide-title">Cadastrando os Clientes e Oficinas (Tabela cliente)</h4>
                </div>
                <p class="step-guide-desc">
                    Agora vamos cadastrar as oficinas mecânicas e autopeças compradoras. Informamos <code>nome_completo</code>, <code>cpf_cnpj</code>, <code>telefone</code>, <code>email</code> e <code>endereco</code>:
                </p>

                <div class="code-wrapper">
                    <div class="code-header">
                        <span>Script SQL: Inserindo Clientes</span>
                        <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar INSERT Clientes</button>
                    </div>
                    <pre><code>INSERT INTO cliente (nome_completo, cpf_cnpj, telefone, email, endereco) VALUES 
('Auto Mecânica Silva & Irmãos', '12.345.678/0001-90', '(19) 98765-4321', 'contato@mecanicasilva.com.br', 'Av. das Américas, 1500 - Campinas/SP'),
('Centro Automotivo Paulista Ltda', '98.765.432/0001-10', '(11) 91234-5678', 'compras@paulistacar.com', 'Rua Augusta, 450 - São Paulo/SP'),
('Oficina Brasil Turbo Performance', '45.888.999/0001-22', '(11) 99887-7665', 'pedidos@brasilturbo.com.br', 'Av. Industrial, 890 - Santo André/SP');</code></pre>
                </div>

                <!-- RESULTADO VISUAL DA ETAPA 2 -->
                <div class="step-guide-image-box" style="margin: 14px 0 6px; border: 1.5px solid #cbd5e1;">
                    <img src="public/img/insert-etapa2-cliente-sucesso.png" alt="Resultado da execução do INSERT INTO cliente no MySQL Workbench com semáforo verde">
                </div>
                <div style="font-size: 11.5px; color: #64748b; margin-top: 4px;">
                    <strong>Figura 4.4:</strong> Inserção dos 3 clientes e oficinas compradoras no MySQL Workbench com confirmação no painel <em>Action Output</em> exibindo status verde com <code>3 row(s) affected</code>.
                </div>
            </div>

            <!-- ==================== ETAPA 3: PEÇAS ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Etapa 3</span>
                    <h4 class="step-guide-title">Cadastrando as Peças no Estoque (Tabela peca)</h4>
                </div>
                <p class="step-guide-desc">
                    A tabela <code>peca</code> possui a Chave Estrangeira <code>id_categoria</code> (ou <code>categoria_id_categoria</code> conforme seu modelo). Cada peça precisa apontar para o ID correspondente da categoria que criamos na Etapa 1:
                </p>

                <div class="code-wrapper">
                    <div class="code-header">
                        <span>Script SQL: Inserindo Peças com Chave Estrangeira</span>
                        <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar INSERT Peças</button>
                    </div>
                    <pre><code>-- id_categoria = 1 (Motor), 2 (Freios), 3 (Suspensão), 4 (Transmissão)
INSERT INTO peca (nome_peca, descricao_peca, preco_unitario, quantidade_estoque, id_categoria) VALUES 
('Pistão Forjado 85mm', 'Pistão de liga de alumínio reforçado para alta pressão', 249.90, 45, 1),
('Biela de Aço Forjado', 'Biela usinada em H com parafusos ARP', 185.00, 30, 1),
('Pastilha de Freio Cerâmica', 'Jogo de pastilhas dianteiras de alta durabilidade', 89.90, 120, 2),
('Disco de Freio Ventilado 280mm', 'Disco com ranhuras direcionais anti-aquecimento', 160.00, 15, 2),
('Amortecedor Pressurizado a Gás', 'Amortecedor dianteiro bitubo', 210.00, 8, 3),
('Disco de Embreagem Heavy Duty', 'Disco de 6 pastilhas com molas reforçadas', 320.00, 5, 4);</code></pre>
                </div>

                <!-- RESULTADO VISUAL DA ETAPA 3 -->
                <div class="step-guide-image-box" style="margin: 14px 0 6px; border: 1.5px solid #cbd5e1;">
                    <img src="public/img/insert-etapa3-peca-sucesso.png" alt="Resultado da execução do INSERT INTO peca no MySQL Workbench com semáforo verde">
                </div>
                <div style="font-size: 11.5px; color: #64748b; margin-top: 4px;">
                    <strong>Figura 4.5:</strong> Inserção das 6 peças no MySQL Workbench com confirmação no painel <em>Action Output</em> exibindo status verde com <code>6 row(s) affected</code>.
                </div>
            </div>

            <!-- ==================== ETAPA 4: PEDIDOS ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Etapa 4</span>
                    <h4 class="step-guide-title">Registrando os Pedidos de Venda (Tabela pedido)</h4>
                </div>
                <p class="step-guide-desc">
                    A tabela <code>pedido</code> registra o cabeçalho da compra e vincula o pedido a um cliente através de <code>id_cliente</code> (Chave Estrangeira). Informamos a data no padrão internacional <code>'AAAA-MM-DD'</code>:
                </p>

                <div class="code-wrapper">
                    <div class="code-header">
                        <span>Script SQL: Inserindo Pedidos</span>
                        <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar INSERT Pedidos</button>
                    </div>
                    <pre><code>-- Pedido 1 emitido para o Cliente 1 (Mecânica Silva) e Pedido 2 para o Cliente 2 (Centro Paulista)
INSERT INTO pedido (data_emissao, status, valor_total, id_cliente) VALUES 
('2026-08-25', 'Pago', 1359.60, 1),
('2026-08-26', 'Pendente', 859.70, 2);</code></pre>
                </div>

                <!-- RESULTADO VISUAL DA ETAPA 4 -->
                <div class="step-guide-image-box" style="margin: 14px 0 6px; border: 1.5px solid #cbd5e1;">
                    <img src="public/img/insert-etapa4-pedido-sucesso.png" alt="Resultado da execução do INSERT INTO pedido no MySQL Workbench com semáforo verde">
                </div>
                <div style="font-size: 11.5px; color: #64748b; margin-top: 4px;">
                    <strong>Figura 4.6:</strong> Inserção dos 2 pedidos no MySQL Workbench vinculando aos clientes através de <code>id_cliente</code>, com confirmação no painel <em>Action Output</em> exibindo status verde com <code>2 row(s) affected</code>.
                </div>
            </div>

            <!-- ==================== ETAPA 5: ITENS DO PEDIDO ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Etapa 5</span>
                    <h4 class="step-guide-title">Amarrando os Itens Comprados (Tabela itens_pedido)</h4>
                </div>
                <p class="step-guide-desc">
                    A tabela associativa <code>itens_pedido</code> resolve a relação N:M. Nela gravamos exatamente <strong>qual peça</strong> foi vendida em <strong>qual pedido</strong>, a <strong>quantidade comprada</strong> e o <strong>preço praticado</strong>:
                </p>

                <div class="code-wrapper">
                    <div class="code-header">
                        <span>Script SQL: Inserindo Itens do Pedido (Chave Composta)</span>
                        <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar INSERT Itens</button>
                    </div>
                    <pre><code>-- Pedido 1 comprou 4 Pistões (id_peca = 1) e 2 Bielas (id_peca = 2)
-- Pedido 2 comprou 2 Pastilhas (id_peca = 3) e 2 Discos (id_peca = 4)
INSERT INTO itens_pedido (id_pedido, id_peca, quantidade_comprada, preco_venda) VALUES 
(1, 1, 4, 249.90),
(1, 2, 2, 185.00),
(2, 3, 2, 89.90),
(2, 4, 2, 160.00);</code></pre>
                </div>

                <!-- RESULTADO VISUAL DA ETAPA 5 -->
                <div class="step-guide-image-box" style="margin: 14px 0 6px; border: 1.5px solid #cbd5e1;">
                    <img src="public/img/insert-etapa5-itens-pedido-sucesso.png" alt="Resultado da execução do INSERT INTO itens_pedido no MySQL Workbench com semáforo verde">
                </div>
                <div style="font-size: 11.5px; color: #64748b; margin-top: 4px;">
                    <strong>Figura 4.7:</strong> Inserção dos 4 itens associados aos pedidos no MySQL Workbench (tabela associativa N:M com chaves compostas), confirmando o status verde com <code>4 row(s) affected</code>.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 5: BULK INSERT E ALTA PERFORMANCE
     ========================================== -->
<section id="bulk-insert-performance" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
        </div>
        <div>
            <h2 class="section-title">5. Inserção em Lote (Bulk Insert) e Alta Performance</h2>
            <div class="section-subtitle">Como inserir dezenas de registros com apenas um único comando e economizar tráfego de rede</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Em sistemas industriais com alto volume de dados (como o cadastro de centenas de autopeças ou a importação de planilhas Excel), enviar um comando <code>INSERT</code> individual para cada linha é extremamente lento, pois gera centenas de viagens de ida e volta pela rede até o servidor.
        </p>
        <p>
            A melhor prática é utilizar o <strong>Bulk Insert (Inserção Múltipla)</strong>, onde um único comando <code>INSERT INTO ... VALUES</code> recebe múltiplos blocos de parênteses separados por vírgula:
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Exemplo Comparativo: Inserção Individual vs Inserção em Lote</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar Exemplo Bulk</button>
            </div>
            <pre><code>-- ❌ FORMA LENTA E REPETITIVA (4 comandos individuais / 4 viagens na rede):
INSERT INTO categoria (nome_categoria, descricao_categoria) VALUES ('Elétrica', 'Alternadores e motores de partida');
INSERT INTO categoria (nome_categoria, descricao_categoria) VALUES ('Injeção', 'Bicos injetores e bombas');
INSERT INTO categoria (nome_categoria, descricao_categoria) VALUES ('Arrefecimento', 'Radiadores e bombas d água');
INSERT INTO categoria (nome_categoria, descricao_categoria) VALUES ('Escapamento', 'Coletores e catalisadores');

-- ✅ FORMA PROFISSIONAL DE ALTA PERFORMANCE (1 único comando Bulk Insert):
INSERT INTO categoria (nome_categoria, descricao_categoria) VALUES 
('Elétrica', 'Alternadores e motores de partida'),
('Injeção', 'Bicos injetores e bombas'),
('Arrefecimento', 'Radiadores e bombas d água'),
('Escapamento', 'Coletores e catalisadores');</code></pre>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 4.8 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 4.8
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Execução de Bulk Insert no Workbench</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 4.8: Inserção em lote (Bulk Insert) de 4 categorias em um único comando SQL no MySQL Workbench" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/insert-bulk-categoria-sucesso.png" alt="Execução de Bulk Insert na tabela categoria no MySQL Workbench com semáforo verde no Action Output" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 4.8:</strong> Inserção em lote (<em>Bulk Insert</em>) de 4 categorias em um único comando SQL no MySQL Workbench, confirmada pelo semáforo verde no painel <em>Action Output</em> com <code>4 row(s) affected Records: 4 Duplicates: 0 Warnings: 0</code>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 6: DIAGNÓSTICO E RESOLUÇÃO DE ERROS
     ========================================== -->
<section id="erros-comuns-diagnostico" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        </div>
        <div>
            <h2 class="section-title">6. Diagnóstico e Resolução de Erros Comuns no INSERT</h2>
            <div class="section-subtitle">Aprenda a ler as mensagens do Workbench e corrigir problemas reais de laboratório</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Em programação de banco de dados, os erros não devem ser temidos: eles são os mecanismos de proteção que garantem que nenhuma informação inconsistente corrompa a base da fábrica. Conheça os 4 erros mais frequentes e como solucioná-los:
        </p>

        <!-- ERRO 1054: NOME DE COLUNA INEXISTENTE -->
        <div style="background: #fff1f2; border: 1.5px solid #fecdd3; border-radius: 10px; padding: 18px; margin: 16px 0;">
            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                <span style="background: #e11d48; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">ERRO 1054</span>
                <h4 style="margin: 0; font-size: 14.5px; color: #9f1239;">🔴 Unknown column 'nome' in 'INSERT INTO'</h4>
            </div>
            <p style="font-size: 13px; color: #881337; line-height: 1.55; margin: 0 0 10px;">
                <strong>O que significa:</strong> O comando SQL faz referência a uma coluna que não existe com esse nome exato na tabela física (por exemplo: você digitou <code>nome</code> ou <code>descricao</code> quando a tabela foi criada com <code>nome_categoria</code> e <code>descricao_categoria</code>).
            </p>
            <div style="background: #ffffff; border-radius: 6px; padding: 10px; font-size: 12px; color: #1e293b; border: 1px solid #fda4af;">
                🛠️ <strong>Como resolver:</strong> Abra o painel lateral <em>Navigator &gt; Schemas &gt; aluno140_metal &gt; Tables &gt; categoria &gt; Columns</em> para verificar a grafia exata de cada coluna antes de escrever o script.
            </div>
        </div>

        <!-- ERRO 1062: CHAVE PRIMÁRIA DUPLICADA -->
        <div style="background: #fff1f2; border: 1.5px solid #fecdd3; border-radius: 10px; padding: 18px; margin: 16px 0;">
            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                <span style="background: #e11d48; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">ERRO 1062</span>
                <h4 style="margin: 0; font-size: 14.5px; color: #9f1239;">🔴 Duplicate entry '1' for key 'PRIMARY'</h4>
            </div>
            <p style="font-size: 13px; color: #881337; line-height: 1.55; margin: 0 0 10px;">
                <strong>O que significa:</strong> Você tentou forçar manualmente um <code>id_categoria = 1</code> ou <code>id_cliente = 1</code> que já existia na tabela.
            </p>
            <div style="background: #ffffff; border-radius: 6px; padding: 10px; font-size: 12px; color: #1e293b; border: 1px solid #fda4af;">
                🛠️ <strong>Como resolver:</strong> Nunca force IDs numéricos em colunas com <code>AUTO_INCREMENT</code>. Omita a coluna no INSERT e deixe o MySQL gerar o próximo ID disponível.
            </div>
        </div>

        <!-- ERRO 1452: VIOLAÇÃO DE CHAVE ESTRANGEIRA -->
        <div style="background: #fff1f2; border: 1.5px solid #fecdd3; border-radius: 10px; padding: 18px; margin: 16px 0;">
            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                <span style="background: #e11d48; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">ERRO 1452</span>
                <h4 style="margin: 0; font-size: 14.5px; color: #9f1239;">🔴 Cannot add or update a child row: a foreign key constraint fails</h4>
            </div>
            <p style="font-size: 13px; color: #881337; line-height: 1.55; margin: 0 0 10px;">
                <strong>O que significa:</strong> Você tentou cadastrar uma peça com <code>id_categoria = 99</code>, mas a categoria 99 <strong>não existe</strong> na tabela <code>categoria</code>.
            </p>
            <div style="background: #ffffff; border-radius: 6px; padding: 10px; font-size: 12px; color: #1e293b; border: 1px solid #fda4af;">
                🛠️ <strong>Como resolver:</strong> Primeiro cadastre a categoria desejada na tabela <code>categoria</code>. Em seguida, utilize o ID real gerado para cadastrar a peça.
            </div>
        </div>

        <!-- ERRO 1048: VALOR OBRIGATÓRIO EM BRANCO -->
        <div style="background: #fff1f2; border: 1.5px solid #fecdd3; border-radius: 10px; padding: 18px; margin: 16px 0;">
            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                <span style="background: #e11d48; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">ERRO 1048</span>
                <h4 style="margin: 0; font-size: 14.5px; color: #9f1239;">🔴 Column 'nome_peca' cannot be null</h4>
            </div>
            <p style="font-size: 13px; color: #881337; line-height: 1.55; margin: 0 0 10px;">
                <strong>O que significa:</strong> Uma coluna anotada como obrigatória (<code>NOT NULL</code>) foi deixada em branco no comando INSERT.
            </p>
            <div style="background: #ffffff; border-radius: 6px; padding: 10px; font-size: 12px; color: #1e293b; border: 1px solid #fda4af;">
                🛠️ <strong>Como resolver:</strong> Preencha o valor obrigatório com um texto ou número válido antes de reenviar o comando.
            </div>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 4.9 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 4.9
                </span>
                <span class="screenshot-target-pill" style="background: #fee2e2; color: #991b1b; font-weight: 700;">Diagnóstico & Correção do Erro 1452</span>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 16px; margin: 14px 0 10px;">
                <!-- COLUNA 1: ERRO -->
                <div style="border: 1.5px solid #fecdd3; border-radius: 8px; overflow: hidden; background: #fff1f2; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                    <div style="background: #ffe4e6; padding: 8px 12px; font-size: 12px; font-weight: 700; color: #9f1239; border-bottom: 1px solid #fecdd3; display: flex; align-items: center; justify-content: space-between;">
                        <span style="display: flex; align-items: center; gap: 6px;"><span>🔴</span> 1. Bloqueio no Workbench (Categoria 99 Inexistente)</span>
                        <span style="font-size: 10.5px; background: rgba(225, 29, 72, 0.1); color: #e11d48; padding: 2px 6px; border-radius: 4px; font-weight: 600;">🔍 Clique p/ Ampliar</span>
                    </div>
                    <div class="zoomable-image-container" data-caption="Erro 1452: Tentativa de inserção com chave estrangeira inexistente (id_categoria = 99) no MySQL Workbench">
                        <img src="public/img/insert-erro-1452-foreign-key.png" alt="Erro 1452 no MySQL Workbench ao tentar inserir peça com chave estrangeira inexistente">
                        <div class="image-zoom-overlay">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                            <span>Ampliar</span>
                        </div>
                    </div>
                    <div style="padding: 8px 12px; font-size: 11.5px; color: #881337; line-height: 1.45;">
                        <strong>Action Output:</strong> <code>Error Code: 1452. Cannot add or update a child row: a foreign key constraint fails</code>.
                    </div>
                </div>

                <!-- COLUNA 2: CORREÇÃO -->
                <div style="border: 1.5px solid #bbf7d0; border-radius: 8px; overflow: hidden; background: #f0fdf4; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                    <div style="background: #dcfce7; padding: 8px 12px; font-size: 12px; font-weight: 700; color: #166534; border-bottom: 1px solid #bbf7d0; display: flex; align-items: center; justify-content: space-between;">
                        <span style="display: flex; align-items: center; gap: 6px;"><span>🟢</span> 2. Correção Realizada (Categoria 4 Válida)</span>
                        <span style="font-size: 10.5px; background: rgba(22, 163, 74, 0.1); color: #16a34a; padding: 2px 6px; border-radius: 4px; font-weight: 600;">🔍 Clique p/ Ampliar</span>
                    </div>
                    <div class="zoomable-image-container" data-caption="Correção do Erro 1452: Execução bem-sucedida com id_categoria = 4 gerando semáforo verde no MySQL Workbench">
                        <img src="public/img/insert-correcao-1452-sucesso.png" alt="Comando corrigido com id_categoria = 4 gerando semáforo verde no Workbench">
                        <div class="image-zoom-overlay">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                            <span>Ampliar</span>
                        </div>
                    </div>
                    <div style="padding: 8px 12px; font-size: 11.5px; color: #166534; line-height: 1.45;">
                        <strong>Action Output:</strong> Semáforo verde com <code>1 row(s) affected</code> confirmando a gravação com integridade garantida.
                    </div>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 4.9:</strong> Comparativo prático no MySQL Workbench: à esquerda, o erro de integridade referencial (Error Code: 1452) acionado pelo MySQL ao referenciar uma categoria inexistente (99); à direita, a execução bem-sucedida após ajustar o <code>id_categoria</code> para um código cadastrado (4). <em>(Passe o mouse ou clique na lupa para abrir a visualização ampliada em popup)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 7: ATIVIDADE PRÁTICA DO MÓDULO 4
     ========================================== -->
<section id="atividade-pratica-insert" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
        </div>
        <div>
            <h2 class="section-title">7. Atividade Prática: Povoamento e Validação de Integridade</h2>
            <div class="section-subtitle">Consolide seus conhecimentos de DML e envie o script oficial de inserção de dados</div>
        </div>
    </div>

    <div class="theory-block">
        <div class="company-case-box">
            <div class="company-case-header">
                <span class="company-badge-pill">🏆 Missão Prática de Povoamento</span>
                <h4 class="company-case-title">Caso Real: Cadastrando uma Nova Linha de Peças de Transmissão</h4>
            </div>
            <p style="font-size: 13px; color: #166534; line-height: 1.55; margin: 0;">
                A diretoria da AutoMetal Brasil contratou um novo fornecedor de câmbios e você deve escrever os comandos SQL para:
                <br>1. Cadastrar um novo cliente: <code>'Retífica Central de Motores Ltda'</code> (Campinas/SP).
                <br>2. Cadastrar uma nova peça: <code>'Platô de Embreagem 220mm'</code>, Preço: <code>R$ 289,00</code>, Estoque: <code>12</code> unidades, vinculada à categoria <code>Transmissão</code> (ID 4).
                <br>3. Registrar um pedido de venda dessa peça para o novo cliente cadastrado.
            </p>
        </div>

        <form class="project-submit-form" onsubmit="event.preventDefault(); alert('Parabéns! Sua atividade de inserção de dados do Módulo 4 foi registrada com sucesso.');">
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    Nome Completo do Aluno:
                </label>
                <input type="text" required placeholder="Digite seu nome completo..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13.5px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    1. Por que não podemos inserir um registro na tabela 'itens_pedido' antes de ter inserido na tabela 'pedido' e na tabela 'peca'?
                </label>
                <textarea rows="3" required placeholder="Explique sobre a integridade referencial e as Chaves Estrangeiras..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;"></textarea>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    2. Qual a principal vantagem do comando Bulk Insert (Inserção em Lote) em relação a vários INSERTs individuais?
                </label>
                <textarea rows="3" required placeholder="Explique sobre desempenho e viagens pela rede..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;"></textarea>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    3. Seu Script SQL Completo de Inserção (Cliente, Peça e Pedido):
                </label>
                <textarea rows="6" required placeholder="-- 1. INSERT INTO cliente...
-- 2. INSERT INTO peca...
-- 3. INSERT INTO pedido...
-- 4. INSERT INTO itens_pedido..." style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-family: var(--font-mono); font-size: 12.5px;"></textarea>
            </div>

            <button type="submit" style="background: #0284c7; color: #ffffff; font-weight: 700; font-size: 13.5px; padding: 11px 24px; border-radius: 6px; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Enviar Atividade de INSERT do Módulo 4
            </button>
        </form>
    </div>
</section>
