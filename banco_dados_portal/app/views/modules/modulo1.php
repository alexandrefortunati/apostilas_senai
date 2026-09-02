<div class="hero-card">
    <div class="hero-tags">
        <span class="badge-tag senai">SENAI - SP • Módulo 1</span>
        <span class="badge-tag accent">Capítulo 1: Conceitos de Bancos de Dados & Big Techs</span>
        <span class="badge-tag time">100% Teórico • Base Conceitual</span>
    </div>
    <h1 class="hero-title"><?= htmlspecialchars($module['title']) ?></h1>
    <p class="hero-desc">
        Bem-vindo à base conceitual de banco de dados! Neste módulo introdutório, compreenda <strong>o que é um banco de dados</strong>, descubra os <strong>benefícios e motivos reais para utilizá-lo</strong>, entenda a <strong>importância vital em sistemas de informação</strong>, explore a classificação completa de <strong>tipos de bancos de dados (Relacionais, NoSQL e Vetoriais)</strong>, confira <strong>dicas práticas para escolher o banco ideal</strong> e conheça os <strong>principais fabricantes, desenvolvedores, empresas e Big Techs</strong> que comandam o mercado global.
    </p>
</div>

<!-- ==========================================
     SEÇÃO 1: O QUE É BANCO DE DADOS?
     ========================================== -->
<section id="o-que-e-banco-de-dados" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">1. O que é Banco de Dados?</h2>
            <div class="section-subtitle">A definição formal e a pirâmide de transformação da informação</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Um <strong>Banco de Dados</strong> (em inglês, <em>Database</em>) é uma coleção organizada, estruturada e integrada de dados armazenados eletronicamente em um sistema de computação. Diferente de um simples arquivo de texto, ele foi projetado para permitir que grandes volumes de dados sejam cadastrados, pesquisados, atualizados e cruzados com extrema velocidade e segurança.
        </p>

        <h3 style="margin-top: 18px; color: #0f172a;">A Pirâmide Fundamental: Dado &rarr; Informação &rarr; Conhecimento</h3>
        <p>
            Para compreender o universo dos bancos de dados, é essencial saber diferenciar os quatro conceitos basilares da computação:
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 14px; margin: 18px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <div style="font-weight: 800; color: #0284c7; font-size: 11px; background: #e0f2fe; padding: 2px 8px; border-radius: 4px; display: inline-block;">NÍVEL 1</div>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">1. Dado (Fato Bruto)</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    É um símbolo ou valor isolado, desprovido de contexto. Exemplo: <code>150</code> ou a palavra <code>"Campinas"</code>. Sozinho, não possui significado prático.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <div style="font-weight: 800; color: #059669; font-size: 11px; background: #dcfce7; padding: 2px 8px; border-radius: 4px; display: inline-block;">NÍVEL 2</div>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">2. Informação (Dado Contextualizado)</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    É o dado processado e dotado de sentido: <em>"A fábrica vendeu 150 pistões forjados para uma oficina em Campinas no valor de R$ 37.485,00"</em>.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <div style="font-weight: 800; color: #7c3aed; font-size: 11px; background: #f3e8ff; padding: 2px 8px; border-radius: 4px; display: inline-block;">NÍVEL 3</div>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">3. Conhecimento (Decisão)</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    É a conclusão analítica gerada a partir das informações: <em>"A região de Campinas tem alta procura por pistões, devemos reforçar o estoque local"</em>.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <div style="font-weight: 800; color: #d97706; font-size: 11px; background: #fef3c7; padding: 2px 8px; border-radius: 4px; display: inline-block;">ESTRUTURA</div>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">4. Metadados (Dados sobre Dados)</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Informações que descrevem a estrutura: tipo do campo (texto, número, data), obrigatoriedade, data de criação e permissões de acesso.
                </p>
            </div>
        </div>

        <div class="callout-box" style="border-left-color: #0284c7; background: #f0f9ff; margin-top: 16px;">
            <div class="callout-title" style="color: #0369a1;">
                🧠 O que é um SGBD (Sistema de Gerenciamento de Banco de Dados)?
            </div>
            <p style="margin: 0; font-size: 13px; color: #0c4a6e; line-height: 1.55;">
                O banco de dados é o conjunto de dados em si. Já o <strong>SGBD</strong> (ou <em>DBMS - Database Management System</em>) é o software responsável por gerenciar e controlar o acesso a esses dados (como MySQL, Oracle ou PostgreSQL). Ele atua como uma ponte segura entre os programas/usuários e o disco rígido, garantindo integridade, segurança e controle de transações.
            </p>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 2: BENEFÍCIOS... POR QUE UTILIZAR?
     ========================================== -->
<section id="beneficios-pq-utilizar" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">2. Benefícios: Por que Utilizar um Banco de Dados?</h2>
            <div class="section-subtitle">As vantagens insubstituíveis que sustentam a computação moderna</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Em projetos amadores ou pequenas rotinas, é comum o uso de arquivos de texto (.txt), planilhas (.xlsx) ou pastas compartilhadas. No entanto, em sistemas reais, o uso de um banco de dados profissional com SGBD oferece vantagens indispensáveis:
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px; margin: 18px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <div style="font-weight: 800; color: #0284c7; font-size: 13.5px; margin-bottom: 6px;">👥 1. Acesso Concorrente Multiusuário</div>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Milhares de usuários podem consultar, inserir e alterar registros no mesmo milissegundo sem que um trave ou sobrescreva o trabalho do outro.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <div style="font-weight: 800; color: #059669; font-size: 13.5px; margin-bottom: 6px;">🛡️ 2. Integridade e Consistência de Dados</div>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Aplica regras rígidas (como tipos numéricos, chaves primárias e validações) que impedem o cadastro de dados inconsistentes, duplicados ou inválidos.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <div style="font-weight: 800; color: #7c3aed; font-size: 13.5px; margin-bottom: 6px;">🔄 3. Eliminação de Redundâncias</div>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Através da modelagem relacional, as informações (como o endereço de um cliente) são cadastradas em um único lugar, evitando dados duplicados e divergentes.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <div style="font-weight: 800; color: #d97706; font-size: 13.5px; margin-bottom: 6px;">🔒 4. Segurança, Permissões e Auditoria</div>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Permite definir exatamente o que cada usuário ou departamento pode visualizar, alterar ou excluir, com criptografia e registro de logs de auditoria.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <div style="font-weight: 800; color: #dc2626; font-size: 13.5px; margin-bottom: 6px;">💾 5. Backup, Recuperação e Tolerância a Falhas</div>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Se a energia acabar ou o servidor falhar no meio de uma transação bancária, o SGBD desfaz operações incompletas (Rollback) e restaura o estado íntegro dos dados.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <div style="font-weight: 800; color: #0f766e; font-size: 13.5px; margin-bottom: 6px;">⚡ 6. Alto Desempenho e Escalabilidade</div>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Utiliza estruturas avançadas de indexação (como Árvores B+) para localizar um registro específico entre bilhões de linhas em frações de segundo.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 3: IMPORTÂNCIA EM SISTEMAS DE INFORMAÇÃO
     ========================================== -->
<section id="importancia-sistemas-informacao" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
        </div>
        <div>
            <h2 class="section-title">3. Importância da Utilização em Sistemas de Informação</h2>
            <div class="section-subtitle">Por que o banco de dados é o coração pulsante da tecnologia empresarial</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Em qualquer <strong>Sistema de Informação (SI)</strong> moderno — seja um aplicativo mobile, uma loja virtual, um sistema ERP industrial ou um software hospitalar —, o código de programação (PHP, Java, Python, C#) é responsável pela lógica e pela interface visual, mas o <strong>Banco de Dados é o repositório central da verdade</strong>.
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 14px; margin: 18px 0;">
            <div style="background: #f8fafc; border-left: 4px solid #0284c7; padding: 14px; border-radius: 0 8px 8px 0;">
                <h4 style="margin: 0 0 4px; font-size: 13.5px; color: #0f172a;">🏭 Sistemas de Gestão Empresarial (ERP)</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Integra todos os departamentos: compras, estoque fabril, finanças, faturamento e recursos humanos em uma única base consistente.
                </p>
            </div>

            <div style="background: #f8fafc; border-left: 4px solid #059669; padding: 14px; border-radius: 0 8px 8px 0;">
                <h4 style="margin: 0 0 4px; font-size: 13.5px; color: #0f172a;">🛒 E-Commerce e Plataformas Digitais</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Garante que o estoque seja debitado no momento exato do pagamento, impedindo que o mesmo produto seja vendido para dois clientes diferentes.
                </p>
            </div>

            <div style="background: #f8fafc; border-left: 4px solid #7c3aed; padding: 14px; border-radius: 0 8px 8px 0;">
                <h4 style="margin: 0 0 4px; font-size: 13.5px; color: #0f172a;">📈 Business Intelligence (BI) & Tomada de Decisão</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Alimenta dashboards analíticos e relatórios executivos para que diretores e gerentes tomem decisões embasadas em dados históricos reais.
                </p>
            </div>

            <div style="background: #f8fafc; border-left: 4px solid #d97706; padding: 14px; border-radius: 0 8px 8px 0;">
                <h4 style="margin: 0 0 4px; font-size: 13.5px; color: #0f172a;">📱 Indústria 4.0 & Internet das Coisas (IoT)</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.5;">
                    Registra telemetria de sensores de máquinas, temperaturas, vibrações e logs de manutenção preditiva em tempo real.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 4: TIPOS DE BANCOS DE DADOS
     ========================================== -->
<section id="tipos-banco-dados" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
        </div>
        <div>
            <h2 class="section-title">4. Tipos de Bancos de Dados: Modelos e Paradigmas</h2>
            <div class="section-subtitle">A classificação completa dos bancos relacionais, não relacionais e especializados</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Conforme as demandas tecnológicas evoluíram, surgiram diferentes arquiteturas de bancos de dados especializadas em tipos específicos de problemas:
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px; margin: 18px 0;">
            <!-- 1. RELACIONAIS -->
            <div style="background: #ffffff; border: 1.5px solid #0284c7; border-radius: 10px; padding: 16px;">
                <span class="badge-tag accent" style="font-size: 11px;">ESTRUTURADO</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0369a1;">1. Relacionais (SQL / Tabelas)</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0 0 8px; line-height: 1.5;">
                    Organizam dados em tabelas rígidas compostas por linhas e colunas, interligadas por chaves primárias e estrangeiras. Seguem o padrão SQL e garantem integridade transacional (ACID).
                </p>
                <div style="font-size: 11.5px; color: #0284c7; font-weight: 700;">
                    Exemplos: MySQL, PostgreSQL, Oracle Database, Microsoft SQL Server, SQLite, MariaDB.
                </div>
            </div>

            <!-- 2. DOCUMENTOS -->
            <div style="background: #ffffff; border: 1.5px solid #059669; border-radius: 10px; padding: 16px;">
                <span class="badge-tag" style="background: #dcfce7; color: #166534; font-size: 11px;">SEMIESQUEMA</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #047857;">2. NoSQL: Documentos (JSON/BSON)</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0 0 8px; line-height: 1.5;">
                    Armazenam registros no formato flexível de documentos (semelhantes a JSON). Cada registro pode ter campos distintos sem exigir uma estrutura rígida pré-definida.
                </p>
                <div style="font-size: 11.5px; color: #059669; font-weight: 700;">
                    Exemplos: MongoDB, CouchDB, Amazon DocumentDB, Google Cloud Firestore.
                </div>
            </div>

            <!-- 3. CHAVE-VALOR -->
            <div style="background: #ffffff; border: 1.5px solid #d97706; border-radius: 10px; padding: 16px;">
                <span class="badge-tag" style="background: #fef3c7; color: #b45309; font-size: 11px;">ULTRA VELOCIDADE</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #b45309;">3. NoSQL: Chave-Valor (In-Memory)</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0 0 8px; line-height: 1.5;">
                    Funcionam como dicionários ultrarrápidos associando uma chave única a um valor. Ideais para sessões de usuários, carrinhos de compra e cache em memória RAM.
                </p>
                <div style="font-size: 11.5px; color: #d97706; font-weight: 700;">
                    Exemplos: Redis, Memcached, Amazon DynamoDB, Riak.
                </div>
            </div>

            <!-- 4. GRAFOS -->
            <div style="background: #ffffff; border: 1.5px solid #7c3aed; border-radius: 10px; padding: 16px;">
                <span class="badge-tag" style="background: #f3e8ff; color: #6d28d9; font-size: 11px;">REDES & CONEXÕES</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #6d28d9;">4. NoSQL: Grafos (Nós & Arestas)</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0 0 8px; line-height: 1.5;">
                    Focados em relacionamentos complexos. Ideais para redes sociais (quem segue quem), motores de recomendação de produtos e sistemas antifraude bancária.
                </p>
                <div style="font-size: 11.5px; color: #7c3aed; font-weight: 700;">
                    Exemplos: Neo4j, Amazon Neptune, ArangoDB.
                </div>
            </div>

            <!-- 5. COLUNARES -->
            <div style="background: #ffffff; border: 1.5px solid #e11d48; border-radius: 10px; padding: 16px;">
                <span class="badge-tag" style="background: #ffe4e6; color: #be123c; font-size: 11px;">BIG DATA ANALYTICS</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #be123c;">5. NoSQL: Família de Colunas</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0 0 8px; line-height: 1.5;">
                    Agrupam dados fisicamente por colunas em vez de linhas, permitindo agregações matemáticas e consultas analíticas instantâneas sobre bilhões de linhas.
                </p>
                <div style="font-size: 11.5px; color: #e11d48; font-weight: 700;">
                    Exemplos: Apache Cassandra, ScyllaDB, Google Cloud Bigtable, ClickHouse.
                </div>
            </div>

            <!-- 6. VETORIAIS -->
            <div style="background: #ffffff; border: 1.5px solid #4f46e5; border-radius: 10px; padding: 16px;">
                <span class="badge-tag" style="background: #e0e7ff; color: #4338ca; font-size: 11px;">ERA DA IA</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #4338ca;">6. Bancos Vetoriais (Vector Databases)</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0 0 8px; line-height: 1.5;">
                    Armazenam vetores numéricos de alta dimensão (embeddings) gerados por inteligência artificial, possibilitando buscas por similaridade semântica em textos e imagens.
                </p>
                <div style="font-size: 11.5px; color: #4f46e5; font-weight: 700;">
                    Exemplos: Pinecone, ChromaDB, Milvus, Qdrant, pgvector.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 5: DICAS PARA A ESCOLHA DO TIPO DE BANCO
     ========================================== -->
<section id="dicas-escolha-banco" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polygon points="12 8 8 12 12 16 12 8"></polygon><polygon points="12 8 16 12 12 16 12 8"></polygon></svg>
        </div>
        <div>
            <h2 class="section-title">5. Dicas Práticas para a Escolha do Tipo de Banco de Dados</h2>
            <div class="section-subtitle">Critérios técnicos e estratégicos para acertar na decisão arquitetural</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Não existe um banco de dados "perfeito para tudo". A escolha correta depende das necessidades específicas de cada projeto. Utilize o guia de critérios abaixo:
        </p>

        <div style="overflow-x: auto; margin: 16px 0;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
                <thead>
                    <tr style="background: #0f172a; color: #ffffff;">
                        <th style="padding: 10px 14px; border: 1px solid #334155;">Cenário / Necessidade do Projeto</th>
                        <th style="padding: 10px 14px; border: 1px solid #334155;">Tipo Recomendado</th>
                        <th style="padding: 10px 14px; border: 1px solid #334155;">Banco Recomendado</th>
                        <th style="padding: 10px 14px; border: 1px solid #334155;">Por que essa escolha?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700;">Sistema Financeiro, ERP Industrial ou Vendas</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;"><span class="badge-tag accent">Relacional (SQL)</span></td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #0284c7;">MySQL / PostgreSQL</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Exige integridade referencial rígida, chaves PK/FK e transações atômicas seguras.</td>
                    </tr>
                    <tr style="background: #f8fafc;">
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700;">Catálogo de Produtos Dinâmico ou Mobile App</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;"><span class="badge-tag" style="background: #dcfce7; color: #166534;">NoSQL Documentos</span></td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #059669;">MongoDB</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Permite adicionar novos atributos a qualquer momento sem alterar tabelas inteiras.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700;">Cache de Sessão, Carrinho Virtual ou Filas</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;"><span class="badge-tag" style="background: #fef3c7; color: #b45309;">NoSQL Chave-Valor</span></td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #d97706;">Redis</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Opera direto na memória RAM com tempo de resposta na escala de microssegundos.</td>
                    </tr>
                    <tr style="background: #f8fafc;">
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700;">Rede Social, Seguidores e Recomendação</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;"><span class="badge-tag" style="background: #f3e8ff; color: #6d28d9;">NoSQL Grafos</span></td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #7c3aed;">Neo4j</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Permite navegar em teias de conexões complexas com consultas simples e ultrarrápidas.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700;">Buscas Semânticas e Chatbots com IA (LLMs)</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;"><span class="badge-tag" style="background: #e0e7ff; color: #4338ca;">Banco Vetorial</span></td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #4f46e5;">Pinecone / pgvector</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Capaz de comparar proximidade geométrica entre ideias e significados textuais.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="callout-box" style="border-left-color: #10b981; background: #ecfdf5; margin-top: 14px;">
            <div class="callout-title" style="color: #047857;">
                💡 Dica de Ouro da Indústria: A Arquitetura Poliglota (Polyglot Persistence)
            </div>
            <p style="margin: 0; font-size: 13px; color: #065f46; line-height: 1.55;">
                Grandes empresas modernas raramente usam apenas um banco de dados! Elas combinam tecnologias: usam o <strong>MySQL</strong> para dados cadastrais e financeiros, o <strong>Redis</strong> para acelerar a tela inicial via cache e o <strong>MongoDB</strong> para logs de acesso. Cada ferramenta é usada exatamente onde é mais forte!
            </p>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 6: BIG TECHS, EMPRESAS E FABRICANTES
     ========================================== -->
<section id="fabricantes-empresas-bigtechs" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">6. Principais Fabricantes, Desenvolvedores, Empresas e Big Techs</h2>
            <div class="section-subtitle">O panorama completo dos gigantes mundiais que sustentam a infraestrutura de dados</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            O ecossistema global de banco de dados é composto por grandes corporações multinacionais de tecnologia (as <em>Big Techs</em>) e renomadas fundações de software livre. Conheça as principais empresas desenvolvedoras:
        </p>

        <div style="overflow-x: auto; margin: 16px 0;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
                <thead>
                    <tr style="background: #f1f5f9; color: #0f172a;">
                        <th style="padding: 12px 14px; border: 1px solid #cbd5e1; font-weight: 700;">Empresa / Big Tech</th>
                        <th style="padding: 12px 14px; border: 1px solid #cbd5e1; font-weight: 700;">Principais Motores de Banco</th>
                        <th style="padding: 12px 14px; border: 1px solid #cbd5e1; font-weight: 700;">Modelo de Licença</th>
                        <th style="padding: 12px 14px; border: 1px solid #cbd5e1; font-weight: 700;">Presença de Mercado & Destaque</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #dc2626;">Oracle Corporation</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Oracle Database (19c/23ai), MySQL, MySQL HeatWave</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Proprietária / Open Source</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Líder histórica absoluta em bancos corporativos e dona do motor MySQL que move a maior parte da web mundial.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #0284c7;">Microsoft</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Microsoft SQL Server, Azure SQL Database, Azure Cosmos DB</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Proprietária Comercial / Nuvem</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Dominante em ambientes corporativos Windows, indústrias e sistemas integrados na nuvem Microsoft Azure.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #ea580c;">Amazon Web Services (AWS)</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Amazon Aurora, Amazon DynamoDB, Amazon Redshift</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Cloud DBaaS Gerenciada</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Maior provedora de computação em nuvem do mundo; sustenta o e-commerce da Amazon, Netflix e grandes fintechs.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #16a34a;">Google Cloud</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Google Cloud Spanner, Google BigQuery, Cloud SQL, Firestore</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Cloud DBaaS Gerenciada</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Pioneira em bancos NewSQL com sincronização atômica global (Spanner) e análise de Big Data em segundos (BigQuery).</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #2563eb;">IBM</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">IBM Db2, Informix, Cloudant</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Proprietária Comercial</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Tradicional gigante dos mainframes bancários, companhias de aviação e órgãos governamentais de alta segurança.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #0f766e;">PostgreSQL Global Development Group</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">PostgreSQL</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Open Source Total (Livre)</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Comunidade global independente; o banco de dados relacional livre mais avançado, extensível e querido pelos desenvolvedores.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #0369a1;">MariaDB Foundation / Corporation</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">MariaDB Server</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Open Source (GPL v2)</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Criado pelos fundadores originais do MySQL como alternativa 100% comunitária e aberta; usado na Wikipedia e Red Hat.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #047857;">MongoDB Inc.</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">MongoDB Community / Enterprise / MongoDB Atlas</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">SSPL / Comercial na Nuvem</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">A empresa que popularizou o modelo NoSQL de documentos no mundo, amplamente adotada em startups modernas.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0; font-weight: 700; color: #b91c1c;">Redis Ltd.</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Redis Community / Redis Cloud</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">Fonte Disponível / Comercial</td>
                        <td style="padding: 10px 14px; border: 1px solid #e2e8f0;">A tecnologia líder absoluta para cache ultrarrápido em memória RAM em aplicações de alta concorrência global.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 7: ESTUDO DE CASO TEÓRICO: AUTOMETAL
     ========================================== -->
<section id="estudo-caso-teorico" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
        </div>
        <div>
            <h2 class="section-title">7. Nosso Estudo de Caso Teórico: AutoMetal Brasil S.A.</h2>
            <div class="section-subtitle">O diagnóstico arquitetural que acompanhará todo o aprendizado prático</div>
        </div>
    </div>

    <div class="theory-block">
        <div class="company-case-box">
            <div class="company-case-header">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span class="company-badge-pill">⚙️ Indústria Fictícia</span>
                    <h3 class="company-case-title">AutoMetal Brasil S.A. (Componentes e Autopeças)</h3>
                </div>
                <span style="font-size: 12px; color: #166534; font-weight: 600;">Diagnóstico Arquitetural</span>
            </div>

            <p style="font-size: 13.5px; color: #1e3a1e; line-height: 1.6; margin-bottom: 12px;">
                A <strong>AutoMetal Brasil S.A.</strong> é uma tradicional fabricante de autopeças (pistões, freios, engrenagens e rolamentos). Atualmente, a fábrica enfrenta problemas graves decorrentes do uso inadequado de planilhas eletrônicas compartilhadas: pedidos de vendas duplicados por falta de bloqueio de concorrência, perda de histórico de clientes e inconsistência nos saldos de estoque.
            </p>

            <div style="background: #ffffff; border: 1px solid #bbf7d0; border-radius: 8px; padding: 12px 16px; margin: 10px 0;">
                <strong style="color: #14532d; font-size: 13px;">📋 Diagnóstico de Requisitos e Seleção Tecnológica:</strong>
                <ul style="margin: 6px 0 0 16px; font-size: 12.5px; color: #374151; line-height: 1.55;">
                    <li><strong>Estrutura Rígida:</strong> Peças, categorias e oficinas possuem dados padronizados com tipos definidos.</li>
                    <li><strong>Integridade Financeira:</strong> Um pedido de venda não pode ser registrado se o cliente não existir ou se a peça estiver sem estoque.</li>
                    <li><strong>Conclusão Técnica:</strong> A fábrica necessita de um <strong>Banco de Dados Relacional (SQL)</strong> robusto, sendo o <strong>MySQL (da Oracle Corporation)</strong> a escolha oficial adotada para o projeto.</li>
                </ul>
            </div>

            <p style="font-size: 13px; color: #15803d; font-weight: 700; margin: 10px 0 0;">
                🎯 Próximos Passos: Nos módulos seguintes, construiremos a Modelagem Conceitual (Módulo 2), os Fundamentos Práticos com Workbench (Módulo 3) e a Modelagem Física com Comandos SQL (Módulo 4)!
            </p>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 8: ATIVIDADE DE FIXAÇÃO TEÓRICA
     ========================================== -->
<section id="atividade-fixacao-teorica" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
        </div>
        <div>
            <h2 class="section-title">8. Atividade de Fixação: Conceitos, Benefícios & Big Techs</h2>
            <div class="section-subtitle">Teste sua compreensão teórica antes de iniciarmos a modelagem de dados</div>
        </div>
    </div>

    <div class="theory-block">
        <form class="project-submit-form" onsubmit="event.preventDefault(); alert('Parabéns! Suas respostas conceituais do Módulo 1 foram submetidas com sucesso.');">
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    Nome Completo do Aluno:
                </label>
                <input type="text" required placeholder="Digite seu nome completo..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13.5px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    1. O que é um banco de dados e qual a diferença fundamental entre um Banco de Dados e um SGBD?
                </label>
                <textarea rows="3" required placeholder="Explique sobre a coleção organizada de dados versus o software gerenciador que controla o acesso..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;"></textarea>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    2. Cite 3 benefícios de utilizar um banco de dados e explique a importância dele em sistemas de informação (como ERPs e e-commerces).
                </label>
                <textarea rows="3" required placeholder="Mencione controle de concorrência, integridade, segurança e o papel como repositório central da verdade..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;"></textarea>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    3. Quais são as principais Big Techs e empresas de banco de dados do mercado atual e quais motores de banco cada uma desenvolve?
                </label>
                <textarea rows="3" required placeholder="Exemplo: Oracle (Oracle DB/MySQL), Microsoft (SQL Server/Cosmos DB), AWS (Aurora/DynamoDB), Google (Spanner/BigQuery), PostgreSQL..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;"></textarea>
            </div>

            <button type="submit" style="background: #0284c7; color: #ffffff; font-weight: 700; font-size: 13.5px; padding: 10px 22px; border-radius: 6px; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Enviar Respostas do Módulo 1
            </button>
        </form>
    </div>
</section>
