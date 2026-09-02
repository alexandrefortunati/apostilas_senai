<div class="hero-card">
    <div class="hero-tags">
        <span class="badge-tag senai">SENAI - SP • Módulo 3</span>
        <span class="badge-tag accent">Capítulo 3: Modelagem Lógica & Conexão Remota</span>
        <span class="badge-tag time">Guia Prático Passo a Passo</span>
    </div>
    <h1 class="hero-title"><?= htmlspecialchars($module['title']) ?></h1>
    <p class="hero-desc">
        Transforme o modelo conceitual (DER) em uma estrutura de tabelas relacionais perfeita: domine os <strong>tipos de dados primitivos</strong>, compreenda o papel da <strong>Chave Primária (PK)</strong> e da <strong>Chave Estrangeira (FK)</strong>, resolva <strong>cardinalidades (1:N e N:M)</strong>, monte o <strong>Dicionário de Dados</strong> da fábrica <strong>AutoMetal Brasil S.A.</strong>, domine os 4 painéis do <strong>Oracle MySQL Workbench</strong>, crie sua base remota no <strong>Portal Educacional SENAI</strong> (Passos 1 a 5) e configure a <strong>conexão remota via TCP/IP</strong> (Etapas 1 a 8 com imagens em alta resolução).
    </p>
</div>

<!-- ==========================================
     SEÇÃO 1: REGRAS DE CONVERSÃO
     ========================================== -->
<section id="conversao-conceitual-logico" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">1. Do Conceitual ao Lógico: Como as Ideias Viram Tabelas</h2>
            <div class="section-subtitle">As 3 regras de ouro da transformação relacional</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            No Módulo 2, desenhamos as ideias da empresa no papel (Modelo Conceitual / DER). Agora, precisamos traduzir esse desenho para as estruturas lógicas que o computador entende: as <strong>Tabelas Relacionais</strong>.
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 14px; margin: 18px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <span style="font-weight: 800; color: #0284c7; font-size: 11px; background: #e0f2fe; padding: 2px 8px; border-radius: 4px;">REGRA 1</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">Entidade &rarr; Vira Tabela</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    A entidade <code>PECA</code> vira a tabela física <code>pecas</code> (sempre nomeada em minúsculas e no plural).
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <span style="font-weight: 800; color: #059669; font-size: 11px; background: #dcfce7; padding: 2px 8px; border-radius: 4px;">REGRA 2</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">Atributo &rarr; Vira Coluna / Campo</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    O atributo <em>Nome da Peça</em> vira a coluna <code>nome</code> com tipo de dado especificado.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <span style="font-weight: 800; color: #7c3aed; font-size: 11px; background: #f3e8ff; padding: 2px 8px; border-radius: 4px;">REGRA 3</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">Ocorrência Real &rarr; Vira Linha (Tupla)</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Cada peça cadastrada (ex: <em>"Pistão Forjado 85mm"</em>) ocupa uma linha exclusiva na tabela.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 2: TIPOS DE DADOS PRIMITIVOS
     ========================================== -->
<section id="tipos-dados-essenciais" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
        </div>
        <div>
            <h2 class="section-title">2. Tipos de Dados Primitivos Essenciais</h2>
            <div class="section-subtitle">Escolhendo o tipo perfeito para cada informação gravada no disco</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            No banco de dados, cada coluna precisa ter um <strong>tipo de dado</strong> claramente definido. Isso garante que ninguém digite letras onde deveriam haver preços ou datas inválidas:
        </p>

        <div style="overflow-x: auto; margin: 18px 0;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13.5px;">
                <thead>
                    <tr style="background: #0f172a; color: #ffffff; text-align: left;">
                        <th style="padding: 10px 14px; border: 1px solid #334155;">Tipo de Dado SQL</th>
                        <th style="padding: 10px 14px; border: 1px solid #334155;">O que armazena?</th>
                        <th style="padding: 10px 14px; border: 1px solid #334155;">Dica de Ouro para Iniciantes</th>
                        <th style="padding: 10px 14px; border: 1px solid #334155;">Exemplo na AutoMetal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-family: var(--font-mono); font-weight: 700; color: #0284c7;">INT</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Números inteiros (sem vírgula).</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Ideal para IDs identificadores e quantidades em estoque.</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;"><code>quantidade_estoque = 45</code></td>
                    </tr>
                    <tr style="background: #f8fafc;">
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-family: var(--font-mono); font-weight: 700; color: #059669;">VARCHAR(100)</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Textos de tamanho variado de até 100 caracteres.</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Economiza espaço, pois só ocupa a quantidade exata de letras digitadas.</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;"><code>nome = 'Pastilha de Freio'</code></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-family: var(--font-mono); font-weight: 700; color: #b91c1c;">DECIMAL(10,2)</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Números com casas decimais exatas (até 10 dígitos, sendo 2 após a vírgula).</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;"><strong>Regra Obrigatória:</strong> Sempre use DECIMAL para dinheiro (preços e salários). Nunca use FLOAT!</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;"><code>preco_unitario = 189.90</code></td>
                    </tr>
                    <tr style="background: #f8fafc;">
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-family: var(--font-mono); font-weight: 700; color: #7c3aed;">DATE</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Datas no padrão internacional <code>'AAAA-MM-DD'</code> (Ano-Mês-Dia).</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Permite fazer cálculos de quantos dias se passaram e ordenar cronologicamente.</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;"><code>data_pedido = '2026-08-24'</code></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 3: CHAVES PK & FK
     ========================================== -->
<section id="chaves-pk-fk" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2l-2 2m-1.5 1.5L16 7l-1.5-1.5M7 16l-4 4 2 2 4-4m1.5-1.5L12 15l1.5 1.5M16 8l4-4-2-2-4 4m-4.5 4.5L8 12l-1.5-1.5"></path></svg>
        </div>
        <div>
            <h2 class="section-title">3. Chave Primária (PK) e Chave Estrangeira (FK)</h2>
            <div class="section-subtitle">Os dois pilares que garantem a integridade relacional</div>
        </div>
    </div>

    <div class="theory-block">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 18px; margin: 20px 0;">
            <!-- CARD PK -->
            <div style="background: #ffffff; border: 2px solid #fecaca; border-radius: 12px; padding: 18px;">
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                    <span class="pk-tag" style="font-size: 11px; padding: 3px 8px;">CHAVE PRIMÁRIA</span>
                    <h3 style="margin: 0; font-size: 16px; color: #b91c1c;">Primary Key (PK)</h3>
                </div>
                <p style="font-size: 13px; color: #475569; line-height: 1.55;">
                    É a coluna que identifica exclusivamente cada linha da tabela. É o <strong>"CPF da linha"</strong>.
                </p>
                <div style="background: #fef2f2; border-radius: 6px; padding: 10px; font-size: 12px; color: #991b1b; margin-top: 10px;">
                    <strong>Regras de Ouro da PK:</strong><br>
                    • <strong>Nunca se repete:</strong> Não podem existir duas peças com <code>id = 1</code>.<br>
                    • <strong>Nunca fica em branco:</strong> É sempre obrigatória (<code>NOT NULL</code>).<br>
                    • <strong>AUTO_INCREMENT:</strong> O próprio MySQL gera os números em ordem (1, 2, 3...).
                </div>
            </div>

            <!-- CARD FK -->
            <div style="background: #ffffff; border: 2px solid #bfdbfe; border-radius: 12px; padding: 18px;">
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                    <span class="fk-tag" style="font-size: 11px; padding: 3px 8px;">CHAVE ESTRANGEIRA</span>
                    <h3 style="margin: 0; font-size: 16px; color: #1d4ed8;">Foreign Key (FK)</h3>
                </div>
                <p style="font-size: 13px; color: #475569; line-height: 1.55;">
                    É a coluna que faz a ponte com a Chave Primária de outra tabela, criando o relacionamento entre elas.
                </p>
                <div style="background: #eff6ff; border-radius: 6px; padding: 10px; font-size: 12px; color: #1e40af; margin-top: 10px;">
                    <strong>Regras de Ouro da FK:</strong><br>
                    • <strong>Integridade Referencial:</strong> Você não consegue salvar uma peça com <code>id_categoria = 99</code> se a categoria 99 não existir.<br>
                    • <strong>Pode repetir:</strong> Várias peças diferentes podem ter o mesmo <code>id_categoria</code>.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 4: RESOLUÇÃO DE CARDINALIDADES
     ========================================== -->
<section id="resolucao-cardinalidades" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
        </div>
        <div>
            <h2 class="section-title">4. Como Ligar as Tabelas: Relacionamentos 1:N e N:M</h2>
            <div class="section-subtitle">Onde colocar a Chave Estrangeira e como criar a Tabela Associativa</div>
        </div>
    </div>

    <div class="theory-block">
        <h3>4.1 Relacionamento 1:N (Um para Muitos)</h3>
        <p>
            Uma <strong>Categoria</strong> possui <strong>Muitas Peças</strong>. Uma <strong>Peça</strong> pertence a apenas <strong>Uma Categoria</strong>.<br>
            <strong style="color: #0284c7;">Regra Prática:</strong> A Chave Estrangeira (FK) sempre vai para o <strong>lado N (Muitos)</strong>! Portanto, colocamos a coluna <code>id_categoria</code> dentro da tabela <code>pecas</code>.
        </p>

        <h3>4.2 Relacionamento N:M (Muitos para Muitos) e a Tabela Associativa</h3>
        <p>
            Um <strong>Pedido</strong> pode ter várias <strong>Peças</strong>. Uma <strong>Peça</strong> pode estar em vários <strong>Pedidos</strong>.<br>
            <strong style="color: #b91c1c;">Regra Prática:</strong> O modelo relacional não aceita relacionamento N:M direto! Criamos uma terceira tabela chamada <strong>Tabela Associativa</strong> (ex: <code>itens_pedido</code>) que junta as duas Chaves Estrangeiras:
        </p>

        <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 14px; margin: 12px 0;">
            <div style="font-weight: 700; color: #0f172a; margin-bottom: 4px;">Tabela Associativa: itens_pedido</div>
            <div style="font-family: var(--font-mono); font-size: 12.5px; color: #334155;">
                • id_item_pedido (PK)<br>
                • id_pedido (FK ligada à tabela pedidos)<br>
                • id_peca (FK ligada à tabela pecas)<br>
                • quantidade_vendida<br>
                • preco_unitario_praticado
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 5: DICIONÁRIO DE DADOS COMPLETO
     ========================================== -->
<section id="dicionario-dados-empresa" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">5. Dicionário de Dados Completo da AutoMetal Brasil S.A.</h2>
            <div class="section-subtitle">A planta técnica detalhada pronta para a implementação física</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            O <strong>Dicionário de Dados</strong> é a documentação técnica oficial que lista cada tabela, suas colunas, tipos e restrições:
        </p>

        <h4 style="color: #0f172a; margin-top: 16px;">Tabela 1: categorias</h4>
        <table style="width: 100%; border-collapse: collapse; font-size: 13px; margin-bottom: 16px;">
            <thead>
                <tr style="background: #f1f5f9; text-align: left;">
                    <th style="padding: 8px 12px; border: 1px solid #cbd5e1;">Coluna</th>
                    <th style="padding: 8px 12px; border: 1px solid #cbd5e1;">Tipo SQL</th>
                    <th style="padding: 8px 12px; border: 1px solid #cbd5e1;">Chave</th>
                    <th style="padding: 8px 12px; border: 1px solid #cbd5e1;">Descrição</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0; font-family: var(--font-mono);">id_categoria</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">INT</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;"><span class="pk-tag">PK</span></td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">Identificador único da categoria</td>
                </tr>
                <tr>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0; font-family: var(--font-mono);">nome_categoria</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">VARCHAR(50)</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">-</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">Nome do grupo de peças (Motor, Freios...)</td>
                </tr>
            </tbody>
        </table>

        <h4 style="color: #0f172a;">Tabela 2: pecas</h4>
        <table style="width: 100%; border-collapse: collapse; font-size: 13px; margin-bottom: 16px;">
            <thead>
                <tr style="background: #f1f5f9; text-align: left;">
                    <th style="padding: 8px 12px; border: 1px solid #cbd5e1;">Coluna</th>
                    <th style="padding: 8px 12px; border: 1px solid #cbd5e1;">Tipo SQL</th>
                    <th style="padding: 8px 12px; border: 1px solid #cbd5e1;">Chave</th>
                    <th style="padding: 8px 12px; border: 1px solid #cbd5e1;">Descrição</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0; font-family: var(--font-mono);">id_peca</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">INT</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;"><span class="pk-tag">PK</span></td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">Código exclusivo da peça</td>
                </tr>
                <tr>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0; font-family: var(--font-mono);">nome</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">VARCHAR(100)</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">-</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">Nome comercial da peça</td>
                </tr>
                <tr>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0; font-family: var(--font-mono);">preco</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">DECIMAL(10,2)</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">-</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">Preço de venda unitário</td>
                </tr>
                <tr>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0; font-family: var(--font-mono);">quantidade_estoque</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">INT</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">-</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">Saldo físico no almoxarifado</td>
                </tr>
                <tr>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0; font-family: var(--font-mono);">id_categoria</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">INT</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;"><span class="fk-tag">FK</span></td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">Referência à tabela categorias</td>
                </tr>
            </tbody>
        </table>

        <h4 style="color: #0f172a;">Tabela 3: clientes</h4>
        <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
            <thead>
                <tr style="background: #f1f5f9; text-align: left;">
                    <th style="padding: 8px 12px; border: 1px solid #cbd5e1;">Coluna</th>
                    <th style="padding: 8px 12px; border: 1px solid #cbd5e1;">Tipo SQL</th>
                    <th style="padding: 8px 12px; border: 1px solid #cbd5e1;">Chave</th>
                    <th style="padding: 8px 12px; border: 1px solid #cbd5e1;">Descrição</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0; font-family: var(--font-mono);">id_cliente</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">INT</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;"><span class="pk-tag">PK</span></td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">Código exclusivo do comprador</td>
                </tr>
                <tr>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0; font-family: var(--font-mono);">nome</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">VARCHAR(100)</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">-</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">Razão Social da oficina</td>
                </tr>
                <tr>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0; font-family: var(--font-mono);">cidade</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">VARCHAR(60)</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">-</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">Município onde a oficina está sediada</td>
                </tr>
                <tr>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0; font-family: var(--font-mono);">telefone</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">VARCHAR(20)</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">-</td>
                    <td style="padding: 8px 12px; border: 1px solid #e2e8f0;">Telefone comercial com DDD</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 6: INTERFACE DO MYSQL WORKBENCH
     ========================================== -->
<section id="ambiente-workbench" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
        </div>
        <div>
            <h2 class="section-title">6. Conhecendo a Interface do Oracle MySQL Workbench</h2>
            <div class="section-subtitle">Os 4 painéis essenciais para você programar seus comandos SQL com facilidade</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            O <strong>Oracle MySQL Workbench</strong> é a ferramenta gráfica oficial e profissional para trabalhar com o banco de dados MySQL. Quando você abre uma conexão no Workbench, a tela é dividida em 4 partes fundamentais:
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 14px; margin: 18px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 14px;">
                <div style="font-weight: 800; color: #0284c7; font-size: 13.5px; margin-bottom: 4px;">📂 1. Navigator / Schemas (Esquerda)</div>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Mostra a lista de bancos de dados criados, suas tabelas, colunas e chaves. É a árvore de navegação do servidor.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 14px;">
                <div style="font-weight: 800; color: #059669; font-size: 13.5px; margin-bottom: 4px;">⚡ 2. SQL Query Editor (Centro)</div>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Onde você digita seus comandos SQL. Para executar o código, basta clicar no <strong>ícone do Raio Amarelo (⚡)</strong> ou pressionar <code>Ctrl + Enter</code>.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 14px;">
                <div style="font-weight: 800; color: #7c3aed; font-size: 13.5px; margin-bottom: 4px;">📊 3. Result Grid (Abaixo do Editor)</div>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Aparece automaticamente quando executamos um <code>SELECT</code>, exibindo os dados em formato de planilha organizada.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 14px;">
                <div style="font-weight: 800; color: #d97706; font-size: 13.5px; margin-bottom: 4px;">📋 4. Action Output (Rodapé)</div>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Exibe o status de cada comando executado: <strong>círculo verde</strong> com check indica sucesso; <strong>círculo vermelho</strong> indica erro de digitação com a mensagem explicativa.
                </p>
            </div>
        </div>

        <!-- IMAGEM OFICIAL DO MYSQL WORKBENCH -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Interface Oficial: Oracle MySQL Workbench
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">SQL Query Editor & Painel Navigator</span>
            </div>

            <div style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/workbench-interface-geral.png" alt="Interface Oficial do MySQL Workbench com Navigator, Editor SQL e Action Output" style="width: 100%; height: auto; display: block; object-fit: contain;">
            </div>

            <div style="padding-top: 8px; font-size: 12px; color: #64748b;">
                <strong>Figura 3.1:</strong> Ambiente de trabalho do MySQL Workbench mostrando as abas superiores, o painel Navigator/Schemas à esquerda e a área de consultas central.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 7: CRIAÇÃO DO BANCO NO PORTAL SENAI
     ========================================== -->
<section id="criacao-banco-remoto" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
        </div>
        <div>
            <h2 class="section-title">7. Criação do Banco de Dados Remoto no Portal Educacional SENAI</h2>
            <div class="section-subtitle">Passo a passo no painel web para ativar a sua base de dados individual no servidor escolar</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            No ambiente de aula do <strong>SENAI</strong>, o servidor de banco de dados MySQL é centralizado e compartilhado. Antes de conectar o Workbench, cada aluno deve criar sua própria base de dados através do <strong>Portal de Serviços SENAI</strong>:
        </p>

        <div class="step-guide-container">
            <!-- PASSO 1 -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge">Passo 1</span>
                    <h4 class="step-guide-title">Acesse o Portal Educacional SENAI</h4>
                </div>
                <p class="step-guide-desc">
                    Abra o seu navegador web e acesse o endereço do <strong>Portal de Serviços - SENAI</strong> (<code>http://10.138.50.250/index.php</code>).
                </p>
                <div class="step-guide-image-box">
                    <img src="public/img/portal-passo1-acesso.png" alt="Passo 1: Tela inicial do Portal de Serviços SENAI">
                </div>
            </div>

            <!-- PASSO 2 -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge">Passo 2</span>
                    <h4 class="step-guide-title">Clique no Card "Hospedagem & FTP"</h4>
                </div>
                <p class="step-guide-desc">
                    Na tela principal do portal, localize e clique no card <strong>Hospedagem & FTP</strong> (destacado para gerenciar arquivos e bancos de dados).
                </p>
                <div class="step-guide-image-box">
                    <img src="public/img/portal-passo2-hospedagem-ftp.png" alt="Passo 2: Clique em Hospedagem & FTP">
                </div>
            </div>

            <!-- PASSO 3 -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge">Passo 3</span>
                    <h4 class="step-guide-title">Acesse o Menu "Gerenciar Banco de Dados"</h4>
                </div>
                <p class="step-guide-desc">
                    No painel do aluno (<em>SENAI Web</em>), clique na opção <strong>Gerenciar Banco de Dados</strong> localizada na barra superior de navegação.
                </p>
                <div class="step-guide-image-box">
                    <img src="public/img/portal-passo3-gerenciar-bd.png" alt="Passo 3: Acesso ao menu Gerenciar Banco de Dados">
                </div>
            </div>

            <!-- PASSO 4 -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge">Passo 4</span>
                    <h4 class="step-guide-title">Informe o Nome do Banco e Clique em "Criar"</h4>
                </div>
                <p class="step-guide-desc">
                    À esquerda, no painel <strong>Novo Banco</strong>, informe o sufixo do nome do banco de dados (por exemplo, digite <code>metal</code> para formar a base <code>aluno140_metal</code>). Defina sua senha de acesso e clique no botão vermelho <strong>Criar</strong>.
                </p>
                <div class="step-guide-image-box">
                    <img src="public/img/portal-passo4-criar-banco.png" alt="Passo 4: Formulário Novo Banco preenchendo o nome e clicando em Criar">
                </div>
            </div>

            <!-- PASSO 5 -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge">Passo 5</span>
                    <h4 class="step-guide-title">Localize o Banco Criado em "Meus Bancos"</h4>
                </div>
                <p class="step-guide-desc">
                    Após a mensagem de sucesso (<em>"Banco aluno140_metal criado com sucesso!"</em>), localize o seu novo banco de dados na lista <strong>Meus Bancos</strong> à direita. Agora seu banco já está ativo no servidor!
                </p>
                <div class="step-guide-image-box">
                    <img src="public/img/portal-passo5-meus-bancos.png" alt="Passo 5: Banco de dados listado com sucesso em Meus Bancos">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 8: CONEXÃO REMOTA NO WORKBENCH
     ========================================== -->
<section id="conexao-workbench-remoto" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">8. Conexão com o Banco de Dados Remoto no MySQL Workbench</h2>
            <div class="section-subtitle">Configuração em 8 etapas com imagens em alta resolução e salvamento seguro no Vault</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Com a base de dados criada no portal, siga as 8 etapas para configurar a conexão remota no <strong>MySQL Workbench</strong>:
        </p>

        <div class="step-guide-container">
            <!-- ETAPA 1 -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Etapa 1</span>
                    <h4 class="step-guide-title">Acesse o Menu "Database &gt; Connect to Database..."</h4>
                </div>
                <p class="step-guide-desc">
                    Abra o <strong>MySQL Workbench</strong>. Na barra de menus superior, clique em <strong>Database</strong> e selecione a opção <strong>Connect to Database...</strong> (ou use o atalho <code>Ctrl + U</code>).
                </p>
                <div class="step-guide-image-box">
                    <img src="public/img/conexao-passo1-menu-database.png" alt="Etapa 1: Menu Database > Connect to Database no MySQL Workbench">
                </div>
            </div>

            <!-- ETAPA 2 -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Etapa 2</span>
                    <h4 class="step-guide-title">Informe o IP do Servidor no Campo Hostname</h4>
                </div>
                <p class="step-guide-desc">
                    Na janela de parâmetros de conexão, localize o campo <strong>Hostname</strong> e digite o endereço IP do servidor SENAI (<code>10.138.50.250</code>). Mantenha a porta padrão <code>3306</code>.
                </p>
                <div class="step-guide-image-box">
                    <img src="public/img/conexao-passo2-hostname-ip.png" alt="Etapa 2: Preenchimento do Hostname com o IP do servidor">
                </div>
            </div>

            <!-- ETAPA 3 -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Etapa 3</span>
                    <h4 class="step-guide-title">Copie o Nome do Banco de Dados no Portal</h4>
                </div>
                <p class="step-guide-desc">
                    Volte à aba do navegador no <strong>Portal Educacional</strong>. Na tabela <em>Meus Bancos</em>, localize o banco criado e clique no <strong>ícone de prancheta (copiar)</strong> ao lado do nome do banco (ex: <code>aluno140_metal</code>).
                </p>
                <div class="step-guide-image-box">
                    <img src="public/img/conexao-passo3-copiar-usuario.png" alt="Etapa 3: Copiando o nome do banco no Portal Educacional">
                </div>
            </div>

            <!-- ETAPA 4 -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Etapa 4</span>
                    <h4 class="step-guide-title">Cole o Nome no Campo Username no Workbench</h4>
                </div>
                <p class="step-guide-desc">
                    Retorne ao <strong>MySQL Workbench</strong> e cole o nome copiado (ex: <code>aluno140_metal</code>) dentro do campo <strong>Username</strong>.
                </p>
                <div class="step-guide-image-box">
                    <img src="public/img/conexao-passo4-colar-username.png" alt="Etapa 4: Colando o nome do usuário no Workbench">
                </div>
            </div>

            <!-- ETAPA 5 -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Etapa 5</span>
                    <h4 class="step-guide-title">Copie a Senha do Banco no Portal</h4>
                </div>
                <p class="step-guide-desc">
                    No portal educacional, localize a linha do seu banco e clique no <strong>ícone de prancheta (copiar)</strong> ao lado do campo <strong>Senha</strong>.
                </p>
                <div class="step-guide-image-box">
                    <img src="public/img/conexao-passo5-copiar-senha.png" alt="Etapa 5: Copiando a senha do banco no Portal Educacional">
                </div>
            </div>

            <!-- ETAPA 6 -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Etapa 6</span>
                    <h4 class="step-guide-title">No Workbench, Clique em "Store in Vault ..."</h4>
                </div>
                <p class="step-guide-desc">
                    Volte para o <strong>MySQL Workbench</strong> na janela de conexão e clique no botão <strong>Store in Vault ...</strong> ao lado do campo <em>Password</em>.
                </p>
                <div class="step-guide-image-box">
                    <img src="public/img/conexao-passo6-store-in-vault.png" alt="Etapa 6: Clique em Store in Vault no Workbench">
                </div>
            </div>

            <!-- ETAPA 7 -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Etapa 7</span>
                    <h4 class="step-guide-title">Cole a Senha no Campo Password e Confirme</h4>
                </div>
                <p class="step-guide-desc">
                    Na janela pop-up que abrir, cole a senha copiada dentro do campo <strong>Password</strong> e clique em <strong>OK</strong>.
                </p>
                <div class="step-guide-image-box">
                    <img src="public/img/conexao-passo7-colar-senha-vault.png" alt="Etapa 7: Colando a senha no campo Password">
                </div>
            </div>

            <!-- ETAPA 8 -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Etapa 8</span>
                    <h4 class="step-guide-title">Confirme os OKs e Abra a Conexão no Atalho</h4>
                </div>
                <p class="step-guide-desc">
                    Clique em todos os <strong>OK</strong> necessários para salvar. Na tela inicial do Workbench, localize o atalho criado na seção <strong>MySQL Connections</strong> (canto inferior esquerdo) e dê um duplo clique para abrir a sua base de dados remota.
                </p>
                <div class="step-guide-image-box">
                    <img src="public/img/conexao-passo8-atalho-conexao.png" alt="Etapa 8: Atalho da conexão remota destacado na tela inicial do MySQL Workbench">
                </div>
            </div>
        </div>

        <div class="callout-box" style="border-left-color: #0284c7; background: #f0f9ff; margin-top: 18px;">
            <div class="callout-title" style="color: #0369a1;">
                💡 Ativando o Banco com o Comando USE
            </div>
            <p style="margin: 0; font-size: 13px; color: #0c4a6e; line-height: 1.55;">
                Após conectar no Workbench, a primeira linha de comando que você sempre executará antes de criar tabelas é:
                <br><code style="font-size: 14px; font-weight: 700; background: #ffffff; padding: 2px 8px; border-radius: 4px; border: 1px solid #bae6fd; display: inline-block; margin-top: 4px;">USE aluno140_metal;</code>
                <br>Isso avisa ao servidor MySQL qual banco de dados deve receber os comandos SQL do próximo módulo!
            </p>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 9: MODELAGEM LÓGICA VISUAL NO WORKBENCH (PASSO A PASSO)
     ========================================== -->
<section id="modelagem-visual-workbench" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
        </div>
        <div>
            <h2 class="section-title">9. Modelagem Visual e Criação do Modelo Lógico no MySQL Workbench</h2>
            <div class="section-subtitle">Passo a passo visual completo para construir tabelas, colunas, chaves PK/FK e relacionamentos 1:N e N:M</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Fazer a <strong>modelagem visual manualmente no MySQL Workbench</strong> é uma excelente prática, pois ajuda a fixar visualmente como as chaves primárias e estrangeiras interagem antes mesmo de escrevermos qualquer linha de código SQL.
        </p>
        <p>
            Abaixo, vamos construir o mesmo diagrama validado da fábrica <strong>AutoMetal Brasil S.A.</strong> passo a passo, utilizando as ferramentas visuais do Workbench de uma forma didática e prática:
        </p>

        <div class="step-guide-container">
            <!-- ==================== PASSO 1 ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Passo 1</span>
                    <h4 class="step-guide-title">Preparando a Área de Trabalho (O Canvas EER)</h4>
                </div>
                <p class="step-guide-desc">
                    1. Abra o <strong>MySQL Workbench</strong>.<br>
                    2. No menu superior, clique em <strong>File &gt; New Model</strong> (ou use o atalho <code>Ctrl + N</code>).<br>
                    3. Na tela que se abre (na aba <em>Model</em>), localize o ícone <strong>Add Diagram</strong> e dê um duplo clique nele.<br>
                    4. Agora você está diante de uma tela quadriculada em branco (o <strong>Canvas</strong>). É aqui que vamos desenhar as tabelas.
                </p>

                <div class="step-guide-image-box" style="margin-top: 14px;">
                    <img src="public/img/modelagem-passo1-add-diagram.png" alt="Passo 1: Canvas EER no MySQL Workbench">
                </div>
            </div>

            <!-- ==================== PASSO 2 ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Passo 2</span>
                    <h4 class="step-guide-title">Criando as Tabelas Independentes (categoria e cliente)</h4>
                </div>
                <p class="step-guide-desc">
                    Sempre começamos pelas tabelas que <em>"existem sozinhas"</em>, ou seja, que não dependem de nenhuma chave estrangeira para nascer. No nosso caso: <code>categoria</code> e <code>cliente</code>.
                    <br><br>
                    1. Na barra de ferramentas lateral esquerda, clique no <strong>ícone de Tabela</strong> (parece uma pequena planilha quadriculada).<br>
                    2. Clique em qualquer lugar no espaço em branco do Canvas. Uma tabela genérica chamada <code>table1</code> vai aparecer.<br>
                    3. Dê um <strong>duplo clique</strong> nessa tabela para abrir o painel de edição na parte inferior da tela.
                </p>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px; margin: 14px 0;">
                    <!-- CONFIG CATEGORIA -->
                    <div style="background: #ffffff; border: 1.5px solid #fed7aa; border-radius: 8px; padding: 14px;">
                        <strong style="color: #c2410c; font-size: 13.5px; display: block; margin-bottom: 8px;">🏷️ Configuração da Tabela: categoria</strong>
                        <div style="font-size: 12px; color: #334155; line-height: 1.6;">
                            • <strong>Table Name:</strong> <code>categoria</code><br>
                            • <strong>1ª Linha:</strong> <code>id_categoria</code> &rarr; marque <span style="background: #fee2e2; color: #991b1b; padding: 1px 5px; border-radius: 3px; font-weight: 700;">PK</span> e <span style="background: #e0f2fe; color: #0369a1; padding: 1px 5px; border-radius: 3px; font-weight: 700;">AI</span> (Auto Increment).<br>
                            • <strong>2ª Linha:</strong> <code>nome</code> &rarr; marque <span style="background: #dcfce7; color: #166534; padding: 1px 5px; border-radius: 3px; font-weight: 700;">NN</span> (Not Null / obrigatório).<br>
                            • <strong>3ª Linha:</strong> <code>descricao</code> &rarr; tipo <code>VARCHAR(255)</code>.
                        </div>
                    </div>

                    <!-- CONFIG CLIENTE -->
                    <div style="background: #ffffff; border: 1.5px solid #bae6fd; border-radius: 8px; padding: 14px;">
                        <strong style="color: #0369a1; font-size: 13.5px; display: block; margin-bottom: 8px;">👥 Configuração da Tabela: cliente</strong>
                        <div style="font-size: 12px; color: #334155; line-height: 1.6;">
                            • <strong>Table Name:</strong> <code>cliente</code><br>
                            • <code>id_cliente</code> &rarr; marque <span style="background: #fee2e2; color: #991b1b; padding: 1px 5px; border-radius: 3px; font-weight: 700;">PK</span> e <span style="background: #e0f2fe; color: #0369a1; padding: 1px 5px; border-radius: 3px; font-weight: 700;">AI</span>.<br>
                            • <code>nome_completo</code> &rarr; marque <span style="background: #dcfce7; color: #166534; padding: 1px 5px; border-radius: 3px; font-weight: 700;">NN</span>.<br>
                            • <code>cpf_cnpj</code> &rarr; marque <span style="background: #dcfce7; color: #166534; padding: 1px 5px; border-radius: 3px; font-weight: 700;">NN</span>.<br>
                            • <code>telefone</code>, <code>email</code> e <code>endereco</code> &rarr; tipos <code>VARCHAR</code>.
                        </div>
                    </div>
                </div>

                <div class="step-guide-image-box" style="margin-top: 14px;">
                    <img src="public/img/modelagem-passo2-tabelas-independentes.png" alt="Passo 2: Tabelas Independentes categoria e cliente no MySQL Workbench">
                </div>
            </div>

            <!-- ==================== PASSO 3 ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Passo 3</span>
                    <h4 class="step-guide-title">Criando as Tabelas Dependentes (peca e pedido)</h4>
                </div>
                <p class="step-guide-desc">
                    Agora vamos criar as entidades <code>peca</code> e <code>pedido</code> no Canvas.
                </p>

                <div class="callout-box" style="border-left-color: #b91c1c; background: #fef2f2; margin: 12px 0;">
                    <div class="callout-title" style="color: #991b1b;">
                        ⚠️ Regra Fundamental para a Modelagem Manual
                    </div>
                    <p style="margin: 0; font-size: 13px; color: #7f1d1d; line-height: 1.5;">
                        <strong>Neste momento, NÃO crie manualmente as colunas de chave estrangeira</strong> (como <code>id_categoria</code> em peça ou <code>id_cliente</code> em pedido). O próprio Workbench criará e vinculará essas colunas de forma 100% automática no próximo passo quando ligarmos as linhas de relacionamento!
                    </p>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px; margin: 14px 0;">
                    <!-- CONFIG PECA -->
                    <div style="background: #ffffff; border: 1.5px solid #fecaca; border-radius: 8px; padding: 14px;">
                        <strong style="color: #b91c1c; font-size: 13.5px; display: block; margin-bottom: 8px;">📦 Configuração da Tabela: peca</strong>
                        <div style="font-size: 12px; color: #334155; line-height: 1.6;">
                            • <code>id_peca</code> &rarr; marque <span style="background: #fee2e2; color: #991b1b; padding: 1px 5px; border-radius: 3px; font-weight: 700;">PK</span> e <span style="background: #e0f2fe; color: #0369a1; padding: 1px 5px; border-radius: 3px; font-weight: 700;">AI</span>.<br>
                            • <code>nome_peca</code> &rarr; marque <span style="background: #dcfce7; color: #166534; padding: 1px 5px; border-radius: 3px; font-weight: 700;">NN</span>.<br>
                            • <code>descricao_peca</code> &rarr; tipo <code>VARCHAR(255)</code>.<br>
                            • <code>preco_unitario</code> &rarr; <code>DECIMAL(10,2)</code>, marque <span style="background: #dcfce7; color: #166534; padding: 1px 5px; border-radius: 3px; font-weight: 700;">NN</span>.<br>
                            • <code>quantidade_estoque</code> &rarr; <code>INT</code>, marque <span style="background: #dcfce7; color: #166534; padding: 1px 5px; border-radius: 3px; font-weight: 700;">NN</span>.
                        </div>
                    </div>

                    <!-- CONFIG PEDIDO -->
                    <div style="background: #ffffff; border: 1.5px solid #e9d5ff; border-radius: 8px; padding: 14px;">
                        <strong style="color: #7e22ce; font-size: 13.5px; display: block; margin-bottom: 8px;">📝 Configuração da Tabela: pedido</strong>
                        <div style="font-size: 12px; color: #334155; line-height: 1.6;">
                            • <code>id_pedido</code> &rarr; marque <span style="background: #fee2e2; color: #991b1b; padding: 1px 5px; border-radius: 3px; font-weight: 700;">PK</span> e <span style="background: #e0f2fe; color: #0369a1; padding: 1px 5px; border-radius: 3px; font-weight: 700;">AI</span>.<br>
                            • <code>data_emissao</code> &rarr; tipo <code>DATE</code>.<br>
                            • <code>status</code> &rarr; tipo <code>VARCHAR(45)</code>.<br>
                            • <code>valor_total</code> &rarr; tipo <code>DECIMAL(10,2)</code>.
                        </div>
                    </div>
                </div>

                <div class="step-guide-image-box" style="margin-top: 14px;">
                    <img src="public/img/modelagem-passo3-tabelas-dependentes.png" alt="Passo 3: As 4 Tabelas Posicionadas no Canvas do MySQL Workbench">
                </div>
            </div>

            <!-- ==================== PASSO 4 ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Passo 4</span>
                    <h4 class="step-guide-title">Fazendo os Relacionamentos (As Ligações 1:N com Linha Tracejada)</h4>
                </div>
                <p class="step-guide-desc">
                    Aqui acontece a mágica visual. No Workbench, usamos ferramentas de linha para conectar as tabelas. Para relacionamentos comuns, usamos a <strong>Linha Tracejada (Relacionamento Não-Identificador: 1:n)</strong>.
                </p>

                <div class="callout-box" style="border-left-color: #059669; background: #f0fdf4; margin: 12px 0;">
                    <div class="callout-title" style="color: #166534;">
                        🌟 Regra de Ouro do Workbench para Conectar Tabelas
                    </div>
                    <p style="margin: 0; font-size: 13px; color: #14532d; line-height: 1.55;">
                        Ao usar a ferramenta de relacionamento, <strong>você sempre clica PRIMEIRO na tabela que vai RECEBER a Chave Estrangeira (o lado "Muitos" / N)</strong>, e DEPOIS clica na tabela que está <strong>EMPRESTANDO a Chave Primária (o lado "Um" / 1)</strong>.
                    </p>
                </div>

                <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 14px; margin: 14px 0; font-size: 13px; color: #334155;">
                    <strong style="color: #0f172a; display: block; margin-bottom: 6px;">🔗 Conexão 1: Ligando Categoria e Peça</strong>
                    1. Na barra lateral esquerda, clique no botão <strong>1:n com Linha Tracejada</strong>.<br>
                    2. Clique <strong>primeiro</strong> na tabela <code>peca</code>.<br>
                    3. Em seguida, clique na tabela <code>categoria</code>.<br>
                    <em>Resultado:</em> O Workbench desenha a linha e cria automaticamente a coluna <code>categoria_id_categoria</code> dentro da tabela <code>peca</code>. (Você pode dar um duplo clique na tabela <code>peca</code> e renomear essa coluna recém-criada apenas para <code>id_categoria</code>, para ficar mais limpo).
                    <br><br>
                    <strong style="color: #0f172a; display: block; margin-bottom: 6px;">🔗 Conexão 2: Ligando Cliente e Pedido</strong>
                    1. Clique novamente no botão <strong>1:n com Linha Tracejada</strong>.<br>
                    2. Clique <strong>primeiro</strong> na tabela <code>pedido</code>.<br>
                    3. Depois clique na tabela <code>cliente</code>.<br>
                    <em>Resultado:</em> A chave estrangeira <code>cliente_id_cliente</code> surge automaticamente em <code>pedido</code>.
                </div>

                <div class="step-guide-image-box" style="margin-top: 14px;">
                    <img src="public/img/modelagem-passo4-relacionamentos-1n.png" alt="Passo 4: Ligações 1:N com linha tracejada no MySQL Workbench">
                </div>
            </div>

            <!-- ==================== PASSO 5 ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Passo 5</span>
                    <h4 class="step-guide-title">A Entidade Associativa (itens_pedido com Linha Contínua)</h4>
                </div>
                <p class="step-guide-desc">
                    Para resolver a relação N:M manualmente, vamos criar a tabela associativa e usar um tipo diferente de linha: a <strong>Linha Contínua (Relacionamento Identificador: 1:n)</strong>, pois as chaves estrangeiras que ela receberá também formarão a sua <strong>Chave Primária Composta</strong>.
                </p>

                <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 14px; margin: 14px 0;">
                    <strong style="color: #0f172a; font-size: 13.5px; display: block; margin-bottom: 6px;">📋 Procedimento para a Tabela Associativa:</strong>
                    <div style="font-size: 12.5px; color: #334155; line-height: 1.6;">
                        1. Crie uma nova tabela no Canvas chamada <code>itens_pedido</code>.<br>
                        2. Adicione manualmente apenas os atributos próprios: <code>quantidade_comprada</code> (INT, NN) e <code>preco_venda</code> (DECIMAL(10,2), NN).<br>
                        3. Na barra lateral esquerda, clique no botão <strong>1:n com Linha CONTÍNUA</strong>.<br><br>
                        <strong style="color: #0284c7;">🔗 Ligando Pedido aos Itens:</strong><br>
                        • Clique <strong>primeiro</strong> em <code>itens_pedido</code>.<br>
                        • Depois clique em <code>pedido</code>.<br>
                        <em>Resultado:</em> A coluna <code>pedido_id_pedido</code> vai aparecer em <code>itens_pedido</code> já marcada com a chavinha amarela (PK).<br><br>
                        <strong style="color: #0284c7;">🔗 Ligando Peça aos Itens:</strong><br>
                        • Com a ferramenta de linha contínua ainda selecionada, clique <strong>primeiro</strong> em <code>itens_pedido</code>.<br>
                        • Depois clique em <code>peca</code>.<br>
                        <em>Resultado:</em> A coluna <code>peca_id_peca</code> também é incluída como PK/FK composta, concluindo o diagrama EER relacional perfeito!
                    </div>
                </div>

                <div class="step-guide-image-box" style="margin-top: 14px;">
                    <img src="public/img/modelagem-passo5-entidade-associativa.png" alt="Passo 5: Diagrama EER Completo com Tabela Associativa itens_pedido no MySQL Workbench">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 10: FORWARD ENGINEER (DO DESENHO PARA O SERVIDOR)
     ========================================== -->
<section id="forward-engineer-workbench" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg>
        </div>
        <div>
            <h2 class="section-title">10. Forward Engineer: Do Desenho EER para a Criação no Servidor</h2>
            <div class="section-subtitle">Como transformar o diagrama visual em código SQL DDL e executá-lo automaticamente no banco de dados</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            O recurso <strong>Forward Engineer</strong> (Engenharia Avante) do MySQL Workbench é uma das ferramentas mais poderosas da modelagem de dados: ele lê todo o seu <strong>Diagrama EER visual</strong> (com suas tabelas, colunas, chaves primárias e relacionamentos) e <strong>gera automaticamente todo o script SQL DDL</strong> (comandos <code>CREATE TABLE</code> e <code>FOREIGN KEY</code>), aplicando-o diretamente no servidor de banco de dados!
        </p>

        <!-- ==================== ORIENTAÇÃO VISUAL PARA INICIANTES ==================== -->
        <div style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); border: 1.5px solid #7dd3fc; border-radius: 12px; padding: 20px; margin: 20px 0; box-shadow: 0 4px 12px rgba(2, 132, 199, 0.08);">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
                <span style="background: #0284c7; color: #ffffff; font-size: 11.5px; font-weight: 800; padding: 4px 10px; border-radius: 6px; text-transform: uppercase; letter-spacing: 0.5px;">
                    🎯 Guia de Orientação Visual para Iniciantes
                </span>
                <strong style="font-size: 15px; color: #0369a1;">Como interpretar e seguir o passo a passo ilustrado</strong>
            </div>
            
            <p style="font-size: 13.5px; color: #0c4a6e; line-height: 1.6; margin: 0 0 14px;">
                Se esta é a sua <strong>primeira vez utilizando um banco de dados e a ferramenta MySQL Workbench</strong>, fique tranquilo! Cada etapa deste guia foi ilustrada com capturas de tela reais que mostram exatamente onde você deve olhar, clicar e configurar. Siga estas orientações fundamentais:
            </p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px;">
                <div style="background: #ffffff; border-radius: 8px; padding: 12px; border: 1px solid #bae6fd;">
                    <div style="font-weight: 700; color: #0284c7; font-size: 12.5px; margin-bottom: 4px;">🔍 1. Observe os Destaques Visuais</div>
                    <p style="font-size: 12px; color: #334155; margin: 0; line-height: 1.5;">
                        Nas imagens, as caixas de texto, menus e botões importantes estão realçados para que você identifique o local exato do clique.
                    </p>
                </div>

                <div style="background: #ffffff; border-radius: 8px; padding: 12px; border: 1px solid #bae6fd;">
                    <div style="font-weight: 700; color: #059669; font-size: 12.5px; margin-bottom: 4px;">☑️ 2. Valide as Caixas de Opção</div>
                    <p style="font-size: 12px; color: #334155; margin: 0; line-height: 1.5;">
                        Confira se as caixas de seleção (checkboxes) marcadas no seu Workbench coincidem com o padrão mostrado antes de avançar.
                    </p>
                </div>

                <div style="background: #ffffff; border-radius: 8px; padding: 12px; border: 1px solid #bae6fd;">
                    <div style="font-weight: 700; color: #7c3aed; font-size: 12.5px; margin-bottom: 4px;">🚦 3. Acompanhe os Semáforos</div>
                    <p style="font-size: 12px; color: #334155; margin: 0; line-height: 1.5;">
                        Ícones verdes (🟢) indicam sucesso em cada linha; ícones vermelhos (🔴) apontam detalhes ou avisos que devem ser corrigidos.
                    </p>
                </div>

                <div style="background: #ffffff; border-radius: 8px; padding: 12px; border: 1px solid #bae6fd;">
                    <div style="font-weight: 700; color: #d97706; font-size: 12.5px; margin-bottom: 4px;">🔄 4. Não tenha medo de Voltar</div>
                    <p style="font-size: 12px; color: #334155; margin: 0; line-height: 1.5;">
                        Você pode clicar no botão <strong>Back</strong> a qualquer momento para revisar ou ajustar opções anteriores com total segurança.
                    </p>
                </div>
            </div>
        </div>

        <p>
            Siga o passo a passo abaixo para exportar seu diagrama visual da <strong>AutoMetal Brasil S.A.</strong> para o servidor:
        </p>

        <div class="step-guide-container">
            <!-- ==================== PASSO 1 ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Passo 1</span>
                    <h4 class="step-guide-title">1. Acessando a Ferramenta Forward Engineer</h4>
                </div>
                <p class="step-guide-desc">
                    Com o seu diagrama EER aberto na tela, vá até o menu superior do MySQL Workbench e clique em <strong>Database</strong>. No menu suspenso que se abre, selecione a opção <strong>Forward Engineer...</strong> (ou use o atalho <code>Ctrl + G</code>).
                </p>

                <div class="step-guide-image-box" style="margin-top: 14px;">
                    <img src="public/img/forward-passo1-menu-database.png" alt="Passo 1: Acesso ao Menu Database > Forward Engineer no MySQL Workbench">
                </div>
            </div>

            <!-- ==================== PASSO 2 ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Passo 2</span>
                    <h4 class="step-guide-title">2. Configuração de Conexão com o Servidor</h4>
                </div>
                <p class="step-guide-desc">
                    Uma janela chamada <em>"Forward Engineer to Database"</em> vai aparecer na tela.<br>
                    A primeira tela pergunta onde você quer criar esse banco de dados. Deixe as configurações da sua conexão com o servidor selecionadas e <strong>certifique-se de preencher o campo Default Schema</strong> com o nome exato do seu banco de dados (ex: <code>aluno140_metal</code>). Em seguida, clique no botão <strong>Next</strong>.
                </p>

                <div class="step-guide-image-box" style="margin-top: 14px;">
                    <img src="public/img/forward-passo2-conexao-servidor.png" alt="Passo 2: Configuração de Conexão com o Servidor no Forward Engineer">
                </div>
            </div>

            <!-- ==================== PASSO 3 ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Passo 3</span>
                    <h4 class="step-guide-title">3. Opções de Geração SQL (Options)</h4>
                </div>
                <p class="step-guide-desc">
                    Nesta tela, o Workbench pergunta como você deseja gerar o código SQL. Para garantir uma exportação limpa e segura, marque as opções abaixo no grupo <strong>Code Generation</strong>:
                </p>

                <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 14px; margin: 12px 0; font-size: 13px; color: #334155; line-height: 1.6;">
                    • <strong style="color: #0284c7;">☑ Generate DROP SCHEMA:</strong> Garante que, caso o schema já exista com algum detalhe incorreto, ele será recriado do zero.<br>
                    • <strong style="color: #059669;">☑ Omit schema qualifier in object names:</strong> Deixa o script mais limpo e universal, sem prefixar o nome do schema antes do nome de cada tabela.<br>
                    • <strong style="color: #7c3aed;">☑ Generate DROP TABLE:</strong> Apaga com segurança tabelas residuais antes da nova criação.<br>
                    • <strong style="color: #0369a1;">☑ Include model attached scripts:</strong> Mantém scripts e instruções associadas ao modelo (marcado por padrão).<br><br>
                    Após marcar as opções recomendadas, clique em <strong>Next</strong>.
                </div>

                <div class="step-guide-image-box" style="margin-top: 14px;">
                    <img src="public/img/forward-passo3-opcoes-geracao.png" alt="Passo 3: Opções de Geração SQL (Set Options for Database to be Created) no MySQL Workbench">
                </div>
            </div>

            <!-- ==================== PASSO 4 ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Passo 4</span>
                    <h4 class="step-guide-title">4. Selecionando o que Exportar (Table Objects)</h4>
                </div>
                <p class="step-guide-desc">
                    A ferramenta vai perguntar quais objetos do seu modelo devem ser transformados em código SQL. Certifique-se de que a opção <strong>Export MySQL Table Objects</strong> está marcada (ela informa quantas tabelas serão exportadas, no nosso caso, as <strong>5 tabelas</strong> do modelo). Clique em <strong>Next</strong>.
                </p>

                <div class="step-guide-image-box" style="margin-top: 14px;">
                    <img src="public/img/forward-passo4-selecao-objetos.png" alt="Passo 4: Seleção dos Objetos de Tabela a Exportar no MySQL Workbench">
                </div>
            </div>

            <!-- ==================== PASSO 5 ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Passo 5</span>
                    <h4 class="step-guide-title">5. O Momento da Verdade: O Código SQL (Método A)</h4>
                </div>
                <p class="step-guide-desc">
                    Esta é a tela mais importante do processo para o aprendizado! O Workbench vai exibir uma caixa de texto com todo o código <strong>DDL (Data Definition Language)</strong> gerado.
                </p>

                <div class="callout-box" style="border-left-color: #0284c7; background: #f0f9ff; margin: 14px 0;">
                    <div class="callout-title" style="color: #0369a1;">
                        💡 A lição aqui:
                    </div>
                    <p style="margin: 0; font-size: 13px; color: #0c4a6e; line-height: 1.6;">
                        Mostre que o sistema escreveu exatamente aquele <strong>código do Método A</strong> que construímos manualmente antes. Estarão lá os <code>CREATE TABLE</code>, as chaves primárias (<code>PRIMARY KEY</code>) e os <code>CONSTRAINT ... FOREIGN KEY</code> que validam os relacionamentos.
                    </p>
                </div>

                <div style="background: #ecfdf5; border: 1.5px solid #a7f3d0; border-radius: 8px; padding: 14px; margin: 12px 0; font-size: 13px; color: #065f46; line-height: 1.55;">
                    📌 <strong>Dica prática:</strong> É possível copiar esse script (botão <strong>Copy to Clipboard</strong>) e salvar em um arquivo de texto para ter o backup estrutural do sistema.
                </div>

                <p class="step-guide-desc" style="margin-top: 10px;">
                    Após revisar o código, clique em <strong>Next</strong>.
                </p>

                <div class="step-guide-image-box" style="margin-top: 14px;">
                    <img src="public/img/forward-passo5-codigo-sql-gerado.png" alt="Passo 5: Revisão do Script SQL DDL Gerado no MySQL Workbench">
                </div>
            </div>

            <!-- ==================== PASSO 6 ==================== -->
            <div class="step-guide-card">
                <div class="step-guide-header">
                    <span class="step-number-badge" style="background: #0284c7;">Passo 6</span>
                    <h4 class="step-guide-title">6. Execução no Servidor</h4>
                </div>
                <p class="step-guide-desc">
                    O Workbench vai se conectar ao seu servidor Linux e executar cada linha daquele código instantaneamente.
                </p>
                <p class="step-guide-desc" style="margin-top: 6px;">
                    A tela mostrará o progresso. Se tudo estiver correto (semáforos verdes), clique em <strong>Close</strong>.
                </p>

                <!-- ==================== ADENDO DIDÁTICO: O ERRO VS A RESOLUÇÃO ==================== -->
                
                <!-- 1. BLOCO DO PROBLEMA / ERRO 1046 -->
                <div style="background: #fff1f2; border: 1.5px solid #fecdd3; border-radius: 10px; padding: 18px; margin: 16px 0;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                        <span style="background: #e11d48; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">1. CENÁRIO DE ERRO</span>
                        <h4 style="margin: 0; font-size: 14.5px; color: #9f1239;">⚠️ Cuidado com o Erro 1046: "No database selected"</h4>
                    </div>
                    <p style="font-size: 13px; color: #881337; line-height: 1.55; margin: 0 0 12px;">
                        Se o campo <em>Default Schema</em> for deixado em branco e a opção <em>Generate USE statements</em> não for marcada, o servidor receberá o comando de criar tabelas sem saber <strong>em qual banco de dados</strong> salvá-las, resultando no erro em vermelho:
                    </p>

                    <div class="step-guide-image-box" style="margin: 10px 0; border: 1.5px solid #fda4af;">
                        <img src="public/img/forward-passo6-erro-no-database.png" alt="Demonstração do Erro 1046 no Forward Engineer">
                    </div>
                </div>

                <!-- 2. BLOCO DA RESOLUÇÃO COM SUCESSO -->
                <div style="background: #f0fdf4; border: 1.5px solid #bbf7d0; border-radius: 10px; padding: 18px; margin: 16px 0;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                        <span style="background: #16a34a; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">2. A RESOLUÇÃO COM SUCESSO</span>
                        <h4 style="margin: 0; font-size: 14.5px; color: #166534;">✅ Execução com Semáforos Verdes: 100% de Sucesso</h4>
                    </div>
                    <p style="font-size: 13px; color: #14532d; line-height: 1.55; margin: 0 0 12px;">
                        Ao marcar a opção <strong>☑ Generate USE statements</strong> (no Passo 3) ou preencher o <strong>Default Schema</strong> (no Passo 2), o Workbench insere a instrução <code>USE aluno140_metal;</code> no topo do script. Veja como todos os comandos são executados com <strong>100% de sucesso (14 succeeded, 0 failed)</strong>:
                    </p>

                    <div class="step-guide-image-box" style="margin: 10px 0; border: 1.5px solid #86efac;">
                        <img src="public/img/forward-passo6-execucao-sucesso.png" alt="Execução do Forward Engineer finalizada com sucesso no MySQL Workbench">
                    </div>

                    <div style="background: #ffffff; border: 1px solid #bbf7d0; border-radius: 6px; padding: 12px; font-size: 12.5px; color: #14532d; margin-top: 12px; line-height: 1.55;">
                        🎉 <strong>Conclusão:</strong> Com todos os semáforos verdes e a mensagem <em>"Forward Engineer Finished Successfully"</em>, clique em <strong>Close</strong>. Todas as 5 tabelas da fábrica <strong>AutoMetal Brasil S.A.</strong> agora estão criadas e ativas no servidor de banco de dados!
                    </div>
                </div>
            </div>
        </div>

        <!-- ==================== VERIFICAÇÃO DO RESULTADO NO SERVIDOR ==================== -->
        <div style="background: #ffffff; border: 2px solid #e2e8f0; border-radius: 12px; padding: 22px; margin-top: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.04);">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
                <span style="background: #0f172a; color: #38bdf8; font-size: 11.5px; font-weight: 800; padding: 4px 10px; border-radius: 6px; text-transform: uppercase; font-family: var(--font-mono);">
                    SQL QUERY & VALIDAÇÃO
                </span>
                <h3 style="margin: 0; font-size: 17px; color: #0f172a;">Verificando o Resultado no Servidor</h3>
            </div>

            <p style="font-size: 13.5px; color: #475569; line-height: 1.6; margin: 0 0 16px;">
                Para provar que o diagrama visual realmente construiu as tabelas físicas no servidor remoto, podemos voltar à tela inicial do <strong>MySQL Workbench</strong> (clicando no <strong>ícone da casinha 🏠</strong> no canto superior esquerdo), abrir a conexão do banco de dados e rodar dois comandos essenciais na aba de <strong>Query</strong>:
            </p>

            <!-- SUB-PASSO 1: USE BANCO -->
            <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; margin-bottom: 18px;">
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                    <span style="background: #0284c7; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">ETAPA 1</span>
                    <strong style="font-size: 14px; color: #0f172a;">Ativando a sua base de dados individual com USE</strong>
                </div>
                <p style="font-size: 12.5px; color: #475569; margin: 0 0 10px; line-height: 1.55;">
                    No editor SQL, digite <code>USE aluno140_metal;</code> e clique no <strong>ícone do Raio Amarelo (⚡)</strong>. O Workbench direcionará todas as próximas consultas para o seu schema ativo.
                </p>
                <div class="step-guide-image-box" style="margin: 10px 0; border: 1.5px solid #cbd5e1;">
                    <img src="public/img/verificacao-resultado-use-banco.png" alt="Etapa 1: Ativação do banco com USE no MySQL Workbench">
                </div>
                <div style="font-size: 11.5px; color: #64748b;">
                    <strong>Figura 3.2:</strong> Executando o comando <code>USE aluno140_metal;</code> para conectar e ativar o schema listado no painel à esquerda.
                </div>
            </div>

            <!-- SUB-PASSO 2: DESCRIBE TABELA -->
            <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; margin-bottom: 18px;">
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                    <span style="background: #059669; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">ETAPA 2</span>
                    <strong style="font-size: 14px; color: #0f172a;">Inspecionando a estrutura física da tabela com DESCRIBE</strong>
                </div>
                <p style="font-size: 12.5px; color: #475569; margin: 0 0 10px; line-height: 1.55;">
                    Agora digite <code>DESCRIBE pedido;</code> e clique novamente no raio ⚡. O Workbench abrirá a <strong>Result Grid</strong> (destacada em amarelo), confirmando que a tabela física foi gerada com todos os tipos de dados e chaves definidos no modelo:
                </p>
                <div class="step-guide-image-box" style="margin: 10px 0; border: 1.5px solid #cbd5e1;">
                    <img src="public/img/verificacao-resultado-describe-pedido.png" alt="Etapa 2: Inspeção da tabela pedido com DESCRIBE e visualização da Result Grid no MySQL Workbench">
                </div>
                <div style="font-size: 11.5px; color: #64748b;">
                    <strong>Figura 3.3:</strong> Grade de Resultados (<em>Result Grid</em>) exibindo as 5 colunas da tabela <code>pedido</code> com as chaves <code>PRI</code> (Primary Key) e <code>MUL</code> (Foreign Key).
                </div>
            </div>

            <!-- FECHAMENTO E TRANSIÇÃO PARA O MÓDULO 4 -->
            <div class="callout-box" style="border-left-color: #0284c7; background: #f0f9ff; margin-top: 20px;">
                <div class="callout-title" style="color: #0369a1;">
                    🎯 Conclusão da Modelagem & Próximos Passos no Módulo 4
                </div>
                <p style="margin: 0; font-size: 13px; color: #0c4a6e; line-height: 1.6;">
                    Com a estrutura física do banco de dados e suas 5 tabelas criadas com sucesso no servidor através do <em>Forward Engineer</em>, todos os <strong>demais testes práticos</strong>, <strong>visualizações de dados</strong>, <strong>inserções de registros (INSERT)</strong>, <strong>consultas com filtros (SELECT)</strong> e <strong>manipulações de tabelas (UPDATE e DELETE)</strong> serão executados em detalhes no <strong>Módulo 4: Modelagem Física & Prática SQL</strong>.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 11: ATIVIDADE PRÁTICA
     ========================================== -->
<section id="atividade-pratica-logica" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
        </div>
        <div>
            <h2 class="section-title">11. Atividade Prática: Estrutura Lógica, Modelagem & Forward Engineer</h2>
            <div class="section-subtitle">Valide a criação do seu banco, a modelagem visual e a exportação para o servidor</div>
        </div>
    </div>

    <div class="theory-block">
        <form class="project-submit-form" onsubmit="event.preventDefault(); alert('Parabéns! Sua atividade do Módulo 3 foi registrada com sucesso.');">
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    Nome Completo do Aluno:
                </label>
                <input type="text" required placeholder="Digite seu nome completo..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13.5px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    1. Qual o nome completo do banco de dados remoto que você criou no Portal Educacional SENAI?
                </label>
                <input type="text" required placeholder="Exemplo: aluno140_metal" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13.5px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    2. Explique a diferença entre Chave Primária (PK) e Chave Estrangeira (FK) e como elas garantem que nenhuma peça fique sem categoria.
                </label>
                <textarea rows="3" required placeholder="Explique sobre identificador único e a integridade referencial..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;"></textarea>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    3. Qual o papel do recurso Forward Engineer no MySQL Workbench e qual a vantagem de utilizá-lo em relação a digitar todos os comandos CREATE TABLE manualmente?
                </label>
                <textarea rows="3" required placeholder="Explique a conversão automática do diagrama EER em script SQL DDL..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;"></textarea>
            </div>

            <button type="submit" style="background: #0284c7; color: #ffffff; font-weight: 700; font-size: 13.5px; padding: 10px 22px; border-radius: 6px; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Enviar Atividade do Módulo 3
            </button>
        </form>
    </div>
</section>
