<div class="hero-card">
    <div class="hero-tags">
        <span class="badge-tag senai">SENAI - SP • Módulo 2</span>
        <span class="badge-tag accent">Capítulo 2: Modelagem Conceitual</span>
        <span class="badge-tag time">Guia Didático para Iniciantes</span>
    </div>
    <h1 class="hero-title"><?= htmlspecialchars($module['title']) ?></h1>
    <p class="hero-desc">
        Aprenda a planejar o seu banco de dados antes de encostar em qualquer linha de código. Entenda a analogia da <strong>planta baixa</strong>, identifique <strong>entidades e atributos</strong> no mundo real, domine as <strong>cardinalidades (1:1, 1:N e N:M)</strong> sem complicação e construa o <strong>Diagrama Entidade-Relacionamento (DER)</strong> para a indústria <strong>AutoMetal Brasil S.A.</strong>.
    </p>
</div>

<!-- ==========================================
     SEÇÃO 1: POR QUE MODELAR?
     ========================================== -->
<section id="intro-modelagem" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">1. Por que Modelar? A Analogia da Construção Civil</h2>
            <div class="section-subtitle">Por que nunca devemos criar tabelas no banco de dados sem antes fazer o desenho conceitual</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Imagine que você decidiu construir uma casa de dois andares. Você contrataria pedreiros para começar a assentar tijolos e despejar concreto no terreno sem antes consultar um engenheiro ou ter uma <strong>planta baixa</strong> desenhada no papel? Com certeza não!
        </p>
        <p>
            Em tecnologia, acontece exatamente a mesma coisa. Se começarmos a criar tabelas diretamente no computador sem planejamento, teremos dados repetidos, campos faltando e o sistema terá que ser refeito do zero semanas depois. A <strong>Modelagem de Dados</strong> é a planta baixa do nosso sistema.
        </p>

        <!-- OS 3 NÍVEIS DE MODELAGEM -->
        <div style="background: #ffffff; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 20px; margin: 20px 0;">
            <h3 style="margin-top: 0; font-size: 15px; color: #0f172a;">Os 3 Níveis Clássicos da Modelagem de Dados</h3>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 14px; margin-top: 14px;">
                <div style="background: #f0fdf4; border: 1.5px solid #86efac; border-radius: 8px; padding: 14px;">
                    <div style="font-weight: 800; color: #15803d; font-size: 13.5px; margin-bottom: 4px;">📐 1. Nível Conceitual (MER / DER)</div>
                    <p style="font-size: 12.5px; color: #166534; margin: 0; line-height: 1.5;">
                        <strong>Foco:</strong> Regras do negócio e entendimento humano.<br>
                        Não se preocupa com tipos de dados, programas ou SQL. Apenas quais "coisas" existem e como elas se relacionam.
                    </p>
                </div>

                <div style="background: #eff6ff; border: 1.5px solid #93c5fd; border-radius: 8px; padding: 14px;">
                    <div style="font-weight: 800; color: #1d4ed8; font-size: 13.5px; margin-bottom: 4px;">📊 2. Nível Lógico (Relacional)</div>
                    <p style="font-size: 12.5px; color: #1e40af; margin: 0; line-height: 1.5;">
                        <strong>Foco:</strong> Estrutura das tabelas.<br>
                        Define colunas, tipos de dados (texto, número, data), chaves primárias (PK) e chaves estrangeiras (FK).
                    </p>
                </div>

                <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 14px;">
                    <div style="font-weight: 800; color: #334155; font-size: 13.5px; margin-bottom: 4px;">⚙️ 3. Nível Físico (SQL & SGBD)</div>
                    <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                        <strong>Foco:</strong> Implementação real no software.<br>
                        Comandos SQL executados no MySQL Workbench que criam as tabelas e gravam os arquivos no disco.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 2: ENTIDADES NO MUNDO REAL
     ========================================== -->
<section id="entidades-mundo-real" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
        </div>
        <div>
            <h2 class="section-title">2. O que são Entidades no Mundo Real?</h2>
            <div class="section-subtitle">Identificando os objetos e atores que precisam ser cadastrados no sistema</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Uma <strong>Entidade</strong> é qualquer coisa, pessoa, objeto, lugar ou evento do mundo real sobre o qual a empresa precisa guardar informações.
        </p>
        <p>
            Uma dica infalível para identificar uma entidade: pergunte a si mesmo: <em>"A empresa precisa cadastrar vários desses itens com características próprias?"</em> Se a resposta for sim, temos uma entidade!
        </p>

        <div class="company-case-box">
            <div class="company-case-header">
                <span class="company-badge-pill">⚙️ AutoMetal Brasil S.A.</span>
                <h4 class="company-case-title">Mapeamento das Entidades da Fábrica de Autopeças</h4>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-top: 10px;">
                <div style="background: #ffffff; border: 1px solid #bbf7d0; border-radius: 8px; padding: 12px;">
                    <strong style="color: #14532d; font-size: 13.5px; display: block; margin-bottom: 4px;">📦 PECA</strong>
                    <span style="font-size: 12px; color: #4b5563;">Representa os produtos fabricados (pistões, engrenagens, amortecedores).</span>
                </div>

                <div style="background: #ffffff; border: 1px solid #bbf7d0; border-radius: 8px; padding: 12px;">
                    <strong style="color: #14532d; font-size: 13.5px; display: block; margin-bottom: 4px;">🏷️ CATEGORIA</strong>
                    <span style="font-size: 12px; color: #4b5563;">Grupos de peças (ex: Motor, Suspensão, Freios, Transmissão).</span>
                </div>

                <div style="background: #ffffff; border: 1px solid #bbf7d0; border-radius: 8px; padding: 12px;">
                    <strong style="color: #14532d; font-size: 13.5px; display: block; margin-bottom: 4px;">👥 CLIENTE</strong>
                    <span style="font-size: 12px; color: #4b5563;">Oficinas mecânicas e concessionárias que compram as peças.</span>
                </div>

                <div style="background: #ffffff; border: 1px solid #bbf7d0; border-radius: 8px; padding: 12px;">
                    <strong style="color: #14532d; font-size: 13.5px; display: block; margin-bottom: 4px;">📝 PEDIDO</strong>
                    <span style="font-size: 12px; color: #4b5563;">Vendas realizadas contendo data, valor total e status de entrega.</span>
                </div>
            </div>
        </div>

        <div class="layman-explainer-card" style="flex-direction: column; gap: 14px;">
            <div style="display: flex; gap: 16px; align-items: flex-start; width: 100%;">
                <div class="layman-icon-col">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                </div>
                <div class="layman-content-col" style="flex: 1;">
                    <h4>Notação Gráfica Conceitual: O Retângulo</h4>
                    <p>
                        No diagrama conceitual (DER), toda entidade é representada visualmente por um <strong>Retângulo</strong> contendo o nome da entidade no singular (ex: <code>peca</code>, <code>categoria</code>, <code>cliente</code>, <code>pedido</code>).
                    </p>
                </div>
            </div>

            <!-- Exemplo Gráfico no brModelo das Entidades -->
            <div style="width: 100%; border: 1.5px solid #cbd5e1; border-radius: 8px; overflow: hidden; background: #ffffff; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);">
                <div style="background: #f1f5f9; border-bottom: 1px solid #e2e8f0; padding: 7px 14px; display: flex; align-items: center; justify-content: space-between; font-size: 12px; color: #475569; font-weight: 600;">
                    <span style="display: inline-flex; align-items: center; gap: 7px;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2.5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        Exemplo Prático de Notação de Entidades no software brModelo
                    </span>
                    <span style="background: #e0f2fe; color: #0369a1; padding: 2px 8px; border-radius: 4px; font-size: 11px; font-weight: 700;">4 Entidades Mapeadas</span>
                </div>
                <div style="padding: 12px; background: #ffffff; text-align: center;">
                    <img src="public/img/brmodelo-entidades-mer.svg" alt="Notação Gráfica das Entidades no brModelo: peca, categoria, cliente, pedido" style="width: 100%; max-width: 860px; height: auto; display: block; margin: 0 auto; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 3: ATRIBUTOS E IDENTIFICADORES
     ========================================== -->
<section id="atributos-identificadores" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        </div>
        <div>
            <h2 class="section-title">3. O que são Atributos e Identificadores Únicos?</h2>
            <div class="section-subtitle">As características que descrevem e diferenciam cada registro no banco de dados</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            <strong>Atributos</strong> são as propriedades ou características que descrevem uma entidade. Por exemplo, se a entidade é uma <code>PECA</code>, seus atributos são: <em>Nome da peça</em>, <em>Preço unitário</em>, <em>Quantidade em estoque</em> e <em>Peso</em>.
        </p>

        <div style="overflow-x: auto; margin: 18px 0;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13.5px;">
                <thead>
                    <tr style="background: #f1f5f9; text-align: left;">
                        <th style="padding: 10px 14px; border: 1px solid #cbd5e1;">Tipo de Atributo</th>
                        <th style="padding: 10px 14px; border: 1px solid #cbd5e1;">Explicação Simples para Leigos</th>
                        <th style="padding: 10px 14px; border: 1px solid #cbd5e1;">Exemplo na AutoMetal Brasil</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #b91c1c;">Atributo Identificador (Chave)</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">O código único que nunca se repete entre dois registros. É a futura Chave Primária (PK).</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;"><code>id_peca</code>, <code>id_categoria</code>, <code>id_cliente</code>, <code>id_pedido</code>.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #0284c7;">Atributo Simples (Atômico)</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Um valor único que não precisa ser dividido em pedaços menores.</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;"><code>nome_peca</code>, <code>preco</code> (ex: 85.50), <code>estoque</code> (ex: 40).</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #d97706;">Atributo Composto</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Um atributo formado por várias partes que podem ser separadas.</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;"><code>endereco</code> (formado por rua, número, bairro e cidade).</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- MAPEAMENTO DETALHADO DOS ATRIBUTOS POR ENTIDADE -->
        <h3 style="margin: 22px 0 10px; color: #0f172a; font-size: 15px;">Mapeamento dos Atributos das 4 Entidades da AutoMetal (Notação em Cascata)</h3>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); gap: 12px; margin-bottom: 20px;">
            <!-- CARD PECA -->
            <div style="background: #ffffff; border: 1.5px solid #fecaca; border-radius: 8px; padding: 14px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
                <div style="font-weight: 800; color: #b91c1c; font-size: 13.5px; margin-bottom: 6px; display: flex; align-items: center; justify-content: space-between;">
                    <span>📦 PECA</span>
                    <span style="font-size: 10.5px; background: #fee2e2; padding: 2px 6px; border-radius: 4px;">6 atributos</span>
                </div>
                <ul style="margin: 0; padding-left: 18px; font-size: 12px; color: #475569; line-height: 1.6;">
                    <li><strong style="color: #000000;">⚫ id_peca (PK)</strong></li>
                    <li><strong style="color: #000000;">⚫ id_categoria (FK)</strong></li>
                    <li>⚪ quantidade_estoque</li>
                    <li>⚪ nome_peca</li>
                    <li>⚪ preco_unitario</li>
                    <li>⚪ descricao_tecnica</li>
                </ul>
            </div>

            <!-- CARD CATEGORIA -->
            <div style="background: #ffffff; border: 1.5px solid #fed7aa; border-radius: 8px; padding: 14px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
                <div style="font-weight: 800; color: #c2410c; font-size: 13.5px; margin-bottom: 6px; display: flex; align-items: center; justify-content: space-between;">
                    <span>🏷️ CATEGORIA</span>
                    <span style="font-size: 10.5px; background: #ffedd5; padding: 2px 6px; border-radius: 4px;">3 atributos</span>
                </div>
                <ul style="margin: 0; padding-left: 18px; font-size: 12px; color: #475569; line-height: 1.6;">
                    <li><strong style="color: #000000;">⚫ id_categoria (PK)</strong></li>
                    <li>⚪ nome</li>
                    <li>⚪ descricao</li>
                </ul>
            </div>

            <!-- CARD CLIENTE -->
            <div style="background: #ffffff; border: 1.5px solid #bae6fd; border-radius: 8px; padding: 14px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
                <div style="font-weight: 800; color: #0369a1; font-size: 13.5px; margin-bottom: 6px; display: flex; align-items: center; justify-content: space-between;">
                    <span>👥 CLIENTE</span>
                    <span style="font-size: 10.5px; background: #e0f2fe; padding: 2px 6px; border-radius: 4px;">6 atributos</span>
                </div>
                <ul style="margin: 0; padding-left: 18px; font-size: 12px; color: #475569; line-height: 1.6;">
                    <li><strong style="color: #000000;">⚫ id_cliente (PK)</strong></li>
                    <li>⚪ nome_completo</li>
                    <li>⚪ cpf_cnpj</li>
                    <li>⚪ telefone</li>
                    <li>⚪ email</li>
                    <li>⚪ endereco</li>
                </ul>
            </div>

            <!-- CARD PEDIDO -->
            <div style="background: #ffffff; border: 1.5px solid #e9d5ff; border-radius: 8px; padding: 14px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
                <div style="font-weight: 800; color: #7e22ce; font-size: 13.5px; margin-bottom: 6px; display: flex; align-items: center; justify-content: space-between;">
                    <span>📝 PEDIDO</span>
                    <span style="font-size: 10.5px; background: #f3e8ff; padding: 2px 6px; border-radius: 4px;">5 atributos</span>
                </div>
                <ul style="margin: 0; padding-left: 18px; font-size: 12px; color: #475569; line-height: 1.6;">
                    <li><strong style="color: #000000;">⚫ id_pedido (PK)</strong></li>
                    <li><strong style="color: #000000;">⚫ id_cliente (FK)</strong></li>
                    <li>⚪ data_emissao</li>
                    <li>⚪ status</li>
                    <li>⚪ valor_total</li>
                </ul>
            </div>
        </div>

        <!-- CARD COM A NOTAÇÃO GRÁFICA DOS ATRIBUTOS NO BRMODELO -->
        <div class="layman-explainer-card" style="flex-direction: column; gap: 14px; margin-top: 16px;">
            <div style="display: flex; gap: 16px; align-items: flex-start; width: 100%;">
                <div class="layman-icon-col">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                </div>
                <div class="layman-content-col" style="flex: 1;">
                    <h4>Organização e Notação em Cascata dos Atributos (brModelo)</h4>
                    <p>
                        Para manter o diagrama limpo e legível mesmo com dezenas de campos, o <strong>brModelo</strong> organiza os atributos verticalmente em <strong>cascata (escada)</strong> abaixo da entidade:
                        <br>
                        • <strong>Círculo Preenchido (⚫):</strong> Indica Chave Primária (PK) ou Chave Estrangeira (FK).
                        <br>
                        • <strong>Círculo Vazado (⚪):</strong> Indica atributos descritivos simples.
                    </p>
                </div>
            </div>

            <!-- Exemplo Gráfico no brModelo dos Atributos -->
            <div style="width: 100%; border: 1.5px solid #cbd5e1; border-radius: 8px; overflow: hidden; background: #ffffff; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);">
                <div style="background: #f1f5f9; border-bottom: 1px solid #e2e8f0; padding: 7px 14px; display: flex; align-items: center; justify-content: space-between; font-size: 12px; color: #475569; font-weight: 600;">
                    <span style="display: inline-flex; align-items: center; gap: 7px;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        Exemplo Prático no software brModelo: Entidades com seus Atributos e Identificadores Chave
                    </span>
                    <span style="background: #e0f2fe; color: #0369a1; padding: 2px 8px; border-radius: 4px; font-size: 11px; font-weight: 700;">Atributos Mapeados</span>
                </div>
                <div style="padding: 12px; background: #ffffff; text-align: center;">
                    <img src="public/img/brmodelo-atributos-mer.svg" alt="Notação Gráfica de Atributos e Identificadores Chave no brModelo" style="width: 100%; max-width: 960px; height: auto; display: block; margin: 0 auto; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 4: RELACIONAMENTOS E CARDINALIDADES
     ========================================== -->
<section id="cardinalidades-relacionamentos" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
        </div>
        <div>
            <h2 class="section-title">4. Relacionamentos e Cardinalidades sem Complicação</h2>
            <div class="section-subtitle">Entendendo 1:1, 1:N e N:M através de perguntas simples do cotidiano</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            No mundo real, as entidades não vivem isoladas: elas interagem entre si. Um <strong>Relacionamento</strong> é a associação entre duas entidades (representado visualmente por um <strong>Losango</strong>).
        </p>
        <p>
            A <strong>Cardinalidade</strong> indica a quantidade máxima de itens de uma entidade que podem estar ligados a outra. Existem apenas 3 tipos:
        </p>

        <!-- OS 3 TIPOS DE CARDINALIDADE COM EXEMPLOS CLAROS -->
        <div style="display: flex; flex-direction: column; gap: 16px; margin: 20px 0;">
            <!-- CARD 1: 1:1 -->
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
                    <strong style="color: #0f172a; font-size: 14.5px;">1. Relacionamento 1:1 (Um para Um)</strong>
                    <span class="badge-tag">Raro no dia a dia</span>
                </div>
                <p style="font-size: 13px; color: #475569; margin: 0; line-height: 1.5;">
                    Cada item da entidade A se relaciona com no máximo UM item da entidade B, e vice-versa.<br>
                    <strong>Exemplo:</strong> Um <code>FUNCIONARIO</code> possui exatamente Um <code>CRACHA_ACESSO</code>, e aquele crachá pertence a apenas Um funcionário.
                </p>
            </div>

            <!-- CARD 2: 1:N -->
            <div style="background: #ffffff; border: 2px solid #93c5fd; border-radius: 10px; padding: 16px;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
                    <strong style="color: #0369a1; font-size: 14.5px;">2. Relacionamento 1:N (Um para Muitos)</strong>
                    <span class="badge-tag accent" style="font-weight: 800;">O mais comum de todos!</span>
                </div>
                <p style="font-size: 13px; color: #475569; margin: 0; line-height: 1.5;">
                    Um item da entidade A pode estar ligado a VÁRIOS itens da entidade B. Mas cada item de B pertence a apenas UM de A.<br>
                    <strong>Exemplo 1:</strong> Uma <code>CATEGORIA</code> (ex: Freios) possui <strong>Várias</strong> <code>PECAS</code>. Porém, cada peça pertence a apenas <strong>Uma</strong> categoria.<br>
                    <strong>Exemplo 2:</strong> Um <code>CLIENTE</code> realiza <strong>Vários</strong> <code>PEDIDOS</code>. Cada pedido pertence a apenas <strong>Um</strong> cliente.
                </p>
            </div>

            <!-- CARD 3: N:M -->
            <div style="background: #ffffff; border: 1.5px solid #ddd6fe; border-radius: 10px; padding: 16px;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
                    <strong style="color: #6d28d9; font-size: 14.5px;">3. Relacionamento N:M (Muitos para Muitos)</strong>
                    <span class="badge-tag time">Requer Tabela Intermediária</span>
                </div>
                <p style="font-size: 13px; color: #475569; margin: 0; line-height: 1.5;">
                    Vários itens da entidade A podem se relacionar com VÁRIOS itens da entidade B.<br>
                    <strong>Exemplo:</strong> Um <code>PEDIDO</code> de compra contém <strong>Várias</strong> <code>PECAS</code> (ex: 2 pastilhas e 1 disco). E a mesma <code>PECA</code> pode estar presente em <strong>Vários</strong> pedidos de clientes diferentes ao longo do mês.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 5: DIAGRAMA CONCEITUAL DER
     ========================================== -->
<section id="diagrama-der-passoapasso" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
        </div>
        <div>
            <h2 class="section-title">5. O Diagrama Conceitual (DER) da AutoMetal Brasil</h2>
            <div class="section-subtitle">Visualizando a arquitetura completa das regras de negócio</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Abaixo está o <strong>Diagrama Entidade-Relacionamento (DER) Conceitual Completo</strong> da AutoMetal Brasil S.A. desenhado no <em>brModelo</em>. Ele reúne todas as entidades, seus atributos organizados em cascata, chaves primárias (PK) e estrangeiras (FK), além dos losangos de relacionamento e cardinalidades que resolvem o ciclo de negócio de autopeças:
        </p>

        <!-- CARD DO DIAGRAMA DER COMPLETO BRMODELO -->
        <div style="width: 100%; border: 1.5px solid #cbd5e1; border-radius: 10px; overflow: hidden; background: #ffffff; box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05); margin: 20px 0;">
            <div style="background: #f1f5f9; border-bottom: 1px solid #e2e8f0; padding: 10px 16px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
                <div style="display: flex; align-items: center; gap: 8px; font-weight: 700; color: #0f172a; font-size: 13.5px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2.5"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    Diagrama Conceitual Oficial (DER) • brModelo 3.2.0
                </div>
                <span style="background: #dcfce7; color: #166534; padding: 3px 10px; border-radius: 6px; font-size: 11.5px; font-weight: 800;">5 Entidades & 4 Relacionamentos</span>
            </div>

            <!-- Imagem do Diagrama DER Completo -->
            <div style="padding: 14px; background: #f8fafc; text-align: center; overflow-x: auto;">
                <img src="public/img/brmodelo-der-completo-autometal.svg" alt="Diagrama Entidade-Relacionamento Conceitual Completo no brModelo - AutoMetal Brasil" style="width: 100%; max-width: 1160px; min-width: 780px; height: auto; display: block; margin: 0 auto; border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.06);" />
            </div>

            <!-- Guia de Leitura dos Relacionamentos do DER -->
            <div style="padding: 16px 20px; background: #ffffff; border-top: 1px solid #e2e8f0;">
                <h4 style="margin: 0 0 10px; font-size: 13.5px; color: #0f172a;">📖 Como ler as 4 Regras de Negócio deste Diagrama:</h4>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 12px; font-size: 12px; color: #475569;">
                    <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 10px;">
                        <strong style="color: #0369a1; display: block; margin-bottom: 3px;">1. CATEGORIA ↔ PECA (1:N)</strong>
                        Uma categoria <em>contém</em> <code>(1,n)</code> várias peças, mas cada peça pertence <code>(1,1)</code> a apenas uma categoria.
                    </div>
                    <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 10px;">
                        <strong style="color: #7c3aed; display: block; margin-bottom: 3px;">2. CLIENTE ↔ PEDIDO (1:N)</strong>
                        Um cliente <em>faz</em> <code>(1,n)</code> vários pedidos de compra, e cada pedido pertence <code>(1,1)</code> a um único cliente.
                    </div>
                    <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 10px;">
                        <strong style="color: #15803d; display: block; margin-bottom: 3px;">3. PEDIDO ↔ ITENS_PEDIDO (1:N)</strong>
                        Um pedido <em>contém</em> <code>(1,n)</code> múltiplos itens vendidos, e cada item refere-se <code>(1,1)</code> ao respectivo pedido.
                    </div>
                    <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 10px;">
                        <strong style="color: #b45309; display: block; margin-bottom: 3px;">4. PECA ↔ ITENS_PEDIDO (1:N)</strong>
                        Uma mesma peça <em>consta</em> em <code>(1,n)</code> múltiplos itens de pedidos distintos, resolvendo a relação N:M.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 6: ATIVIDADE PRÁTICA CONCEITUAL
     ========================================== -->
<section id="atividade-pratica-conceitual" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
        </div>
        <div>
            <h2 class="section-title">6. Atividade Prática em Sala: Modelando um Cenário</h2>
            <div class="section-subtitle">Aplique os conceitos em um novo desafio da indústria fictícia</div>
        </div>
    </div>

    <div class="theory-block">
        <form class="project-submit-form" onsubmit="event.preventDefault(); alert('Exercício de Modelagem Conceitual registrado com sucesso!');">
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    Nome do Aluno:
                </label>
                <input type="text" required placeholder="Digite seu nome completo..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13.5px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    Cenário: A AutoMetal Brasil agora quer cadastrar seus <strong>FORNECEDORES</strong> de aço e ferramentas. Um fornecedor pode fornecer várias peças, e cada peça vem de um único fornecedor principal. Qual é a cardinalidade desse relacionamento?
                </label>
                <select required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13.5px; background: #ffffff;">
                    <option value="">Selecione a cardinalidade correta...</option>
                    <option value="1:1">1:1 (Um para Um)</option>
                    <option value="1:N">1:N (Um para Muitos - Um Fornecedor para Várias Peças)</option>
                    <option value="N:M">N:M (Muitos para Muitos)</option>
                </select>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    Cite 3 atributos essenciais para a entidade FORNECEDOR:
                </label>
                <textarea rows="3" required placeholder="Exemplo: codigo_fornecedor (identificador), razao_social, telefone_contato..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;"></textarea>
            </div>

            <button type="submit" style="background: #0284c7; color: #ffffff; font-weight: 700; font-size: 13.5px; padding: 10px 22px; border-radius: 6px; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Enviar Respostas do Módulo 2
            </button>
        </form>
    </div>
</section>
