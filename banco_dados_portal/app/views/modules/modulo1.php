<?php
/**
 * View: Módulo 1 - Conceitos Fundamentais, Tipos & Fabricantes de Bancos de Dados
 * Disciplina: Banco de Dados (75h) • SENAI-SP
 * Base conceitual e teórica para a formação técnica em desenvolvimento de sistemas.
 */
?>

<!-- ==========================================
     HERO CARD DO MÓDULO 1
     ========================================== -->
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

        <h3>A Pirâmide Fundamental: Dado &rarr; Informação &rarr; Conhecimento</h3>
        <p>
            Para compreender o universo dos bancos de dados, é essencial saber diferenciar os quatro conceitos basilares da computação:
        </p>

        <div class="concept-grid">
            <div class="concept-card" style="border-top: 3.5px solid #0284c7;">
                <span class="concept-tag" style="background: #e0f2fe; color: #0284c7;">NÍVEL 1</span>
                <h4 class="concept-card-title">1. Dado (Fato Bruto)</h4>
                <p class="concept-card-desc">
                    É um símbolo ou valor isolado, desprovido de contexto. Exemplo: <code>150</code> ou a palavra <code>"Campinas"</code>. Sozinho, não possui significado prático.
                </p>
            </div>

            <div class="concept-card" style="border-top: 3.5px solid #059669;">
                <span class="concept-tag" style="background: #dcfce7; color: #059669;">NÍVEL 2</span>
                <h4 class="concept-card-title">2. Informação (Dado Contextualizado)</h4>
                <p class="concept-card-desc">
                    É o dado processado e dotado de sentido: <em>"A fábrica vendeu 150 pistões forjados para uma oficina em Campinas no valor de R$ 37.485,00"</em>.
                </p>
            </div>

            <div class="concept-card" style="border-top: 3.5px solid #7c3aed;">
                <span class="concept-tag" style="background: #f3e8ff; color: #7c3aed;">NÍVEL 3</span>
                <h4 class="concept-card-title">3. Conhecimento (Decisão)</h4>
                <p class="concept-card-desc">
                    É a conclusão analítica gerada a partir das informações: <em>"A região de Campinas tem alta procura por pistões, devemos reforçar o estoque local"</em>.
                </p>
            </div>

            <div class="concept-card" style="border-top: 3.5px solid #d97706;">
                <span class="concept-tag" style="background: #fef3c7; color: #d97706;">ESTRUTURA</span>
                <h4 class="concept-card-title">4. Metadados (Dados sobre Dados)</h4>
                <p class="concept-card-desc">
                    Informações que descrevem a estrutura: tipo do campo (texto, número, data), obrigatoriedade, data de criação e permissões de acesso.
                </p>
            </div>
        </div>

        <div class="callout-box">
            <div class="callout-title">
                🧠 O que é um SGBD (Sistema de Gerenciamento de Banco de Dados)?
            </div>
            <p>
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
        <div class="section-icon" style="background: #dcfce7; color: #059669;">
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

        <div class="concept-grid" style="grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));">
            <div class="concept-card" style="border-left: 3.5px solid #0284c7;">
                <div style="font-weight: 800; color: #0284c7; font-size: 12.5px; margin-bottom: 4px;">👥 1. Acesso Concorrente Multiusuário</div>
                <p class="concept-card-desc">
                    Milhares de usuários podem consultar, inserir e alterar registros no mesmo milissegundo sem que um trave ou sobrescreva o trabalho do outro.
                </p>
            </div>

            <div class="concept-card" style="border-left: 3.5px solid #059669;">
                <div style="font-weight: 800; color: #059669; font-size: 12.5px; margin-bottom: 4px;">🛡️ 2. Integridade e Consistência de Dados</div>
                <p class="concept-card-desc">
                    Aplica regras rígidas (como tipos numéricos, chaves primárias e validações) que impedem o cadastro de dados inconsistentes, duplicados ou inválidos.
                </p>
            </div>

            <div class="concept-card" style="border-left: 3.5px solid #7c3aed;">
                <div style="font-weight: 800; color: #7c3aed; font-size: 12.5px; margin-bottom: 4px;">🔄 3. Eliminação de Redundâncias</div>
                <p class="concept-card-desc">
                    Através da modelagem relacional, as informações (como o endereço de um cliente) são cadastradas em um único lugar, evitando dados duplicados e divergentes.
                </p>
            </div>

            <div class="concept-card" style="border-left: 3.5px solid #d97706;">
                <div style="font-weight: 800; color: #d97706; font-size: 12.5px; margin-bottom: 4px;">🔒 4. Segurança, Permissões e Auditoria</div>
                <p class="concept-card-desc">
                    Permite definir exatamente o que cada usuário ou departamento pode visualizar, alterar ou excluir, com criptografia e registro de logs de auditoria.
                </p>
            </div>

            <div class="concept-card" style="border-left: 3.5px solid #dc2626;">
                <div style="font-weight: 800; color: #dc2626; font-size: 12.5px; margin-bottom: 4px;">💾 5. Backup, Recuperação e Tolerância a Falhas</div>
                <p class="concept-card-desc">
                    Se a energia acabar ou o servidor falhar no meio de uma transação bancária, o SGBD desfaz operações incompletas (Rollback) e restaura o estado íntegro dos dados.
                </p>
            </div>

            <div class="concept-card" style="border-left: 3.5px solid #0891b2;">
                <div style="font-weight: 800; color: #0891b2; font-size: 12.5px; margin-bottom: 4px;">⚡ 6. Alto Desempenho e Escalabilidade</div>
                <p class="concept-card-desc">
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
        <div class="section-icon" style="background: #f3e8ff; color: #7c3aed;">
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

        <div class="concept-grid" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
            <div class="concept-card" style="background: #f8fafc; border-left: 3.5px solid #0284c7;">
                <h4 class="concept-card-title">🏭 Sistemas de Gestão Empresarial (ERP)</h4>
                <p class="concept-card-desc">
                    Integra todos os departamentos: compras, estoque fabril, finanças, faturamento e recursos humanos em uma única base consistente.
                </p>
            </div>

            <div class="concept-card" style="background: #f8fafc; border-left: 3.5px solid #059669;">
                <h4 class="concept-card-title">🛒 E-Commerce e Plataformas Digitais</h4>
                <p class="concept-card-desc">
                    Garante que o estoque seja debitado no momento exato do pagamento, impedindo que o mesmo produto seja vendido para dois clientes diferentes.
                </p>
            </div>

            <div class="concept-card" style="background: #f8fafc; border-left: 3.5px solid #7c3aed;">
                <h4 class="concept-card-title">📈 Business Intelligence (BI) & Decisão</h4>
                <p class="concept-card-desc">
                    Alimenta dashboards analíticos e relatórios executivos para que diretores e gerentes tomem decisões embasadas em dados históricos reais.
                </p>
            </div>

            <div class="concept-card" style="background: #f8fafc; border-left: 3.5px solid #d97706;">
                <h4 class="concept-card-title">📱 Indústria 4.0 & IoT</h4>
                <p class="concept-card-desc">
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
        <div class="section-icon" style="background: #fef3c7; color: #d97706;">
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

        <div class="concept-grid" style="grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));">
            <!-- 1. RELACIONAIS -->
            <div class="concept-card" style="border-top: 3.5px solid #0284c7;">
                <span class="concept-tag" style="background: #e0f2fe; color: #0284c7;">ESTRUTURADO</span>
                <h4 class="concept-card-title" style="color: #0369a1;">1. Relacionais (SQL / Tabelas)</h4>
                <p class="concept-card-desc">
                    Organizam dados em tabelas rígidas compostas por linhas e colunas, interligadas por chaves primárias e estrangeiras. Seguem o padrão SQL e garantem integridade transacional (ACID).
                </p>
                <div style="font-size: 11px; color: #0284c7; font-weight: 700; margin-top: 6px; padding: 4px 8px; background: #f0f9ff; border-radius: 4px;">
                    Exemplos: MySQL, PostgreSQL, Oracle Database, SQL Server, SQLite, MariaDB.
                </div>
            </div>

            <!-- 2. DOCUMENTOS -->
            <div class="concept-card" style="border-top: 3.5px solid #059669;">
                <span class="concept-tag" style="background: #dcfce7; color: #166534;">SEMIESQUEMA</span>
                <h4 class="concept-card-title" style="color: #047857;">2. NoSQL: Documentos (JSON/BSON)</h4>
                <p class="concept-card-desc">
                    Armazenam registros no formato flexível de documentos (semelhantes a JSON). Cada registro pode ter campos distintos sem exigir uma estrutura rígida pré-definida.
                </p>
                <div style="font-size: 11px; color: #059669; font-weight: 700; margin-top: 6px; padding: 4px 8px; background: #f0fdf4; border-radius: 4px;">
                    Exemplos: MongoDB, CouchDB, Amazon DocumentDB, Google Cloud Firestore.
                </div>
            </div>

            <!-- 3. CHAVE-VALOR -->
            <div class="concept-card" style="border-top: 3.5px solid #d97706;">
                <span class="concept-tag" style="background: #fef3c7; color: #b45309;">ULTRA VELOCIDADE</span>
                <h4 class="concept-card-title" style="color: #b45309;">3. NoSQL: Chave-Valor (In-Memory)</h4>
                <p class="concept-card-desc">
                    Funcionam como dicionários ultrarrápidos associando uma chave única a um valor. Ideais para sessões de usuários, carrinhos de compra e cache em memória RAM.
                </p>
                <div style="font-size: 11px; color: #d97706; font-weight: 700; margin-top: 6px; padding: 4px 8px; background: #fffbeb; border-radius: 4px;">
                    Exemplos: Redis, Memcached, Amazon DynamoDB, Riak.
                </div>
            </div>

            <!-- 4. GRAFOS -->
            <div class="concept-card" style="border-top: 3.5px solid #7c3aed;">
                <span class="concept-tag" style="background: #f3e8ff; color: #6d28d9;">REDES & CONEXÕES</span>
                <h4 class="concept-card-title" style="color: #6d28d9;">4. NoSQL: Grafos (Nós & Arestas)</h4>
                <p class="concept-card-desc">
                    Focados em relacionamentos complexos. Ideais para redes sociais (quem segue quem), motores de recomendação de produtos e sistemas antifraude bancária.
                </p>
                <div style="font-size: 11px; color: #7c3aed; font-weight: 700; margin-top: 6px; padding: 4px 8px; background: #faf5ff; border-radius: 4px;">
                    Exemplos: Neo4j, Amazon Neptune, ArangoDB.
                </div>
            </div>

            <!-- 5. COLUNARES -->
            <div class="concept-card" style="border-top: 3.5px solid #e11d48;">
                <span class="concept-tag" style="background: #ffe4e6; color: #be123c;">BIG DATA ANALYTICS</span>
                <h4 class="concept-card-title" style="color: #be123c;">5. NoSQL: Família de Colunas</h4>
                <p class="concept-card-desc">
                    Agrupam dados fisicamente por colunas em vez de linhas, permitindo agregações matemáticas e consultas analíticas instantâneas sobre bilhões de linhas.
                </p>
                <div style="font-size: 11px; color: #e11d48; font-weight: 700; margin-top: 6px; padding: 4px 8px; background: #fff1f2; border-radius: 4px;">
                    Exemplos: Apache Cassandra, ScyllaDB, Google Cloud Bigtable, ClickHouse.
                </div>
            </div>

            <!-- 6. VETORIAIS -->
            <div class="concept-card" style="border-top: 3.5px solid #4f46e5;">
                <span class="concept-tag" style="background: #e0e7ff; color: #4338ca;">ERA DA IA</span>
                <h4 class="concept-card-title" style="color: #4338ca;">6. Bancos Vetoriais (Vector Databases)</h4>
                <p class="concept-card-desc">
                    Armazenam vetores numéricos de alta dimensão (embeddings) gerados por inteligência artificial, possibilitando buscas por similaridade semântica em textos e imagens.
                </p>
                <div style="font-size: 11px; color: #4f46e5; font-weight: 700; margin-top: 6px; padding: 4px 8px; background: #eef2ff; border-radius: 4px;">
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
        <div class="section-icon" style="background: #cffafe; color: #0891b2;">
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

        <div class="table-responsive-container">
            <table class="compact-table">
                <thead>
                    <tr>
                        <th>Cenário / Necessidade do Projeto</th>
                        <th>Tipo Recomendado</th>
                        <th>Banco Recomendado</th>
                        <th>Por que essa escolha?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: 700; color: #0f172a;">Sistema Financeiro, ERP Industrial ou Vendas</td>
                        <td><span class="concept-tag" style="background: #e0f2fe; color: #0284c7; margin: 0;">Relacional (SQL)</span></td>
                        <td style="font-weight: 700; color: #0284c7;">MySQL / PostgreSQL</td>
                        <td>Exige integridade referencial rígida, chaves PK/FK e transações atômicas seguras (ACID).</td>
                    </tr>
                    <tr style="background: #f8fafc;">
                        <td style="font-weight: 700; color: #0f172a;">Catálogo de Produtos Dinâmico ou Mobile App</td>
                        <td><span class="concept-tag" style="background: #dcfce7; color: #166534; margin: 0;">NoSQL Documentos</span></td>
                        <td style="font-weight: 700; color: #059669;">MongoDB</td>
                        <td>Permite adicionar novos atributos a qualquer momento sem alterar tabelas inteiras.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700; color: #0f172a;">Cache de Sessão, Carrinho Virtual ou Filas</td>
                        <td><span class="concept-tag" style="background: #fef3c7; color: #b45309; margin: 0;">NoSQL Chave-Valor</span></td>
                        <td style="font-weight: 700; color: #d97706;">Redis</td>
                        <td>Opera direto na memória RAM com tempo de resposta na escala de microssegundos.</td>
                    </tr>
                    <tr style="background: #f8fafc;">
                        <td style="font-weight: 700; color: #0f172a;">Rede Social, Seguidores e Recomendação</td>
                        <td><span class="concept-tag" style="background: #f3e8ff; color: #6d28d9; margin: 0;">NoSQL Grafos</span></td>
                        <td style="font-weight: 700; color: #7c3aed;">Neo4j</td>
                        <td>Permite navegar em teias de conexões complexas com consultas simples e ultrarrápidas.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700; color: #0f172a;">Buscas Semânticas e Chatbots com IA (LLMs)</td>
                        <td><span class="concept-tag" style="background: #e0e7ff; color: #4338ca; margin: 0;">Banco Vetorial</span></td>
                        <td style="font-weight: 700; color: #4f46e5;">Pinecone / pgvector</td>
                        <td>Capaz de comparar proximidade geométrica entre ideias e significados textuais.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="callout-box" style="border-left-color: #10b981; background: #ecfdf5; margin-top: 12px;">
            <div class="callout-title" style="color: #047857;">
                💡 Dica de Ouro da Indústria: A Arquitetura Poliglota (Polyglot Persistence)
            </div>
            <p style="color: #065f46;">
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
        <div class="section-icon" style="background: #e0e7ff; color: #4f46e5;">
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

        <div class="table-responsive-container">
            <table class="compact-table">
                <thead>
                    <tr>
                        <th>Empresa / Big Tech</th>
                        <th>Principais Motores de Banco</th>
                        <th>Modelo de Licença</th>
                        <th>Presença de Mercado & Destaque</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: 700; color: #dc2626;">Oracle Corporation</td>
                        <td><strong>Oracle Database</strong> (19c/23ai), <strong>MySQL</strong>, MySQL HeatWave</td>
                        <td><span class="concept-tag" style="background: #f1f5f9; color: #475569; margin: 0;">Proprietária / Open Source</span></td>
                        <td>Líder histórica absoluta em bancos corporativos e dona do motor MySQL que move a maior parte da web mundial.</td>
                    </tr>
                    <tr style="background: #f8fafc;">
                        <td style="font-weight: 700; color: #0284c7;">Microsoft</td>
                        <td><strong>SQL Server</strong>, Azure SQL Database, Azure Cosmos DB</td>
                        <td><span class="concept-tag" style="background: #f1f5f9; color: #475569; margin: 0;">Comercial / Nuvem</span></td>
                        <td>Dominante em ambientes corporativos Windows, indústrias e sistemas integrados na nuvem Microsoft Azure.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700; color: #ea580c;">Amazon Web Services (AWS)</td>
                        <td><strong>Amazon Aurora</strong>, Amazon DynamoDB, Amazon Redshift</td>
                        <td><span class="concept-tag" style="background: #f1f5f9; color: #475569; margin: 0;">Cloud DBaaS Gerenciada</span></td>
                        <td>Maior provedora de computação em nuvem do mundo; sustenta o e-commerce da Amazon, Netflix e grandes fintechs.</td>
                    </tr>
                    <tr style="background: #f8fafc;">
                        <td style="font-weight: 700; color: #16a34a;">Google Cloud</td>
                        <td><strong>Cloud Spanner</strong>, Google BigQuery, Cloud SQL, Firestore</td>
                        <td><span class="concept-tag" style="background: #f1f5f9; color: #475569; margin: 0;">Cloud DBaaS Gerenciada</span></td>
                        <td>Pioneira em bancos NewSQL com sincronização atômica global (Spanner) e análise de Big Data em segundos (BigQuery).</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700; color: #2563eb;">IBM</td>
                        <td><strong>IBM Db2</strong>, Informix, Cloudant</td>
                        <td><span class="concept-tag" style="background: #f1f5f9; color: #475569; margin: 0;">Proprietária Comercial</span></td>
                        <td>Tradicional gigante dos mainframes bancários, companhias de aviação e órgãos governamentais de alta segurança.</td>
                    </tr>
                    <tr style="background: #f8fafc;">
                        <td style="font-weight: 700; color: #0f766e;">PostgreSQL Group</td>
                        <td><strong>PostgreSQL</strong></td>
                        <td><span class="concept-tag" style="background: #dcfce7; color: #166534; margin: 0;">Open Source Total</span></td>
                        <td>Comunidade global independente; o banco de dados relacional livre mais avançado, extensível e querido pelos desenvolvedores.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700; color: #0369a1;">MariaDB Foundation</td>
                        <td><strong>MariaDB Server</strong></td>
                        <td><span class="concept-tag" style="background: #dcfce7; color: #166534; margin: 0;">Open Source (GPL v2)</span></td>
                        <td>Criado pelos fundadores originais do MySQL como alternativa 100% comunitária e aberta; usado na Wikipedia e Red Hat.</td>
                    </tr>
                    <tr style="background: #f8fafc;">
                        <td style="font-weight: 700; color: #047857;">MongoDB Inc.</td>
                        <td><strong>MongoDB Community</strong>, Enterprise, Atlas</td>
                        <td><span class="concept-tag" style="background: #f1f5f9; color: #475569; margin: 0;">SSPL / Comercial Nuvem</span></td>
                        <td>A empresa que popularizou o modelo NoSQL de documentos no mundo, amplamente adotada em startups modernas.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700; color: #b91c1c;">Redis Ltd.</td>
                        <td><strong>Redis Community</strong>, Redis Cloud</td>
                        <td><span class="concept-tag" style="background: #f1f5f9; color: #475569; margin: 0;">Fonte Disponível / Nuvem</span></td>
                        <td>A tecnologia líder absoluta para cache ultrarrápido em memória RAM em aplicações de alta concorrência global.</td>
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
        <div class="section-icon" style="background: #fee2e2; color: #dc2626;">
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
                <div style="display: flex; align-items: center; gap: 8px;">
                    <span class="concept-tag" style="background: #dcfce7; color: #166534; margin: 0;">⚙️ Indústria Fictícia</span>
                    <h3 class="company-case-title">AutoMetal Brasil S.A. (Componentes e Autopeças)</h3>
                </div>
                <span style="font-size: 11px; color: #166534; font-weight: 700;">Diagnóstico Arquitetural</span>
            </div>

            <p>
                A <strong>AutoMetal Brasil S.A.</strong> é uma tradicional fabricante de autopeças (pistões, freios, engrenagens e rolamentos). Atualmente, a fábrica enfrenta problemas graves decorrentes do uso inadequado de planilhas eletrônicas compartilhadas: pedidos de vendas duplicados por falta de bloqueio de concorrência, perda de histórico de clientes e inconsistência nos saldos de estoque.
            </p>

            <div style="background: #ffffff; border: 1px solid #bbf7d0; border-radius: 6px; padding: 10px 14px; margin: 8px 0;">
                <strong style="color: #14532d; font-size: 12px;">📋 Diagnóstico de Requisitos e Seleção Tecnológica:</strong>
                <ul style="margin: 5px 0 0 16px; font-size: 11.5px; color: #374151; line-height: 1.5;">
                    <li><strong>Estrutura Rígida:</strong> Peças, categorias e oficinas possuem dados padronizados com tipos definidos.</li>
                    <li><strong>Integridade Financeira:</strong> Um pedido de venda não pode ser registrado se o cliente não existir ou se a peça estiver sem estoque.</li>
                    <li><strong>Conclusão Técnica:</strong> A fábrica necessita de um <strong>Banco de Dados Relacional (SQL)</strong> robusto, sendo o <strong>MySQL (da Oracle Corporation)</strong> a escolha oficial adotada para o projeto.</li>
                </ul>
            </div>

            <p style="font-size: 12px; color: #15803d; font-weight: 700; margin: 8px 0 0;">
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
        <div class="section-icon" style="background: #f1f5f9; color: #334155;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
        </div>
        <div>
            <h2 class="section-title">8. Atividade de Fixação: Conceitos, Benefícios & Big Techs</h2>
            <div class="section-subtitle">Teste sua compreensão teórica antes de iniciarmos a modelagem de dados</div>
        </div>
    </div>

    <div class="theory-block">
        <form class="project-submit-form" onsubmit="event.preventDefault(); alert('Parabéns! Suas respostas conceituais do Módulo 1 foram submetidas com sucesso.');">
            <div style="margin-bottom: 12px;">
                <label class="quiz-label">Nome Completo do Aluno:</label>
                <input type="text" required class="quiz-input" placeholder="Digite seu nome completo...">
            </div>

            <div style="margin-bottom: 12px;">
                <label class="quiz-label">1. O que é um banco de dados e qual a diferença fundamental entre um Banco de Dados e um SGBD?</label>
                <textarea rows="3" required class="quiz-textarea" placeholder="Explique sobre a coleção organizada de dados versus o software gerenciador que controla o acesso..."></textarea>
            </div>

            <div style="margin-bottom: 12px;">
                <label class="quiz-label">2. Cite 3 benefícios de utilizar um banco de dados e explique a importância dele em sistemas de informação (como ERPs e e-commerces).</label>
                <textarea rows="3" required class="quiz-textarea" placeholder="Mencione controle de concorrência, integridade, segurança e o papel como repositório central da verdade..."></textarea>
            </div>

            <div style="margin-bottom: 14px;">
                <label class="quiz-label">3. Quais são as principais Big Techs e empresas de banco de dados do mercado atual e quais motores de banco cada uma desenvolve?</label>
                <textarea rows="3" required class="quiz-textarea" placeholder="Exemplo: Oracle (Oracle DB/MySQL), Microsoft (SQL Server/Cosmos DB), AWS (Aurora/DynamoDB), Google (Spanner/BigQuery), PostgreSQL..."></textarea>
            </div>

            <button type="submit" class="btn-submit-m1">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Enviar Respostas do Módulo 1
            </button>
        </form>
    </div>
</section>
