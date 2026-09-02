<div class="hero-card">
    <div class="hero-tags">
        <span class="badge-tag senai">SENAI - SP • Módulo 5</span>
        <span class="badge-tag accent">Capítulo 5: Consultas SQL (DQL)</span>
        <span class="badge-tag time">Guia Prático Passo a Passo</span>
    </div>
    <h1 class="hero-title"><?= htmlspecialchars($module['title']) ?></h1>
    <p class="hero-desc">
        O comando <strong>SELECT</strong> é a lanterna que utilizamos para encontrar e extrair qualquer informação persistida no nosso banco de dados. Neste módulo, trabalhamos com instruções em SQL puro diretamente no servidor, aprendendo desde a busca geral até projeções direcionadas de alta performance, filtros condicionais com <strong>WHERE</strong>, ordenações com <strong>ORDER BY (ASC/DESC)</strong> e buscas textuais com o operador <strong>LIKE (%)</strong> no banco de dados da fábrica <strong>AutoMetal Brasil S.A.</strong>
    </p>
</div>

<!-- ==========================================
     SEÇÃO 1: A LANTERNA DO BANCO (DQL)
     ========================================== -->
<section id="intro-dql-select" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </div>
        <div>
            <h2 class="section-title">1. A Lanterna do Banco: O Papel do DQL e do Comando SELECT</h2>
            <div class="section-subtitle">Como as aplicações leem as informações persistidas no servidor físico</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Nos módulos anteriores, criamos a estrutura física das tabelas com o <strong>DDL (CREATE)</strong> e gravamos os primeiros registros industriais com o <strong>DML (INSERT)</strong>. Agora, entramos na camada de <strong>DQL (Data Query Language — Linguagem de Consulta de Dados)</strong>, cujo único e soberano protagonista é o comando <strong>SELECT</strong>.
        </p>
        <p>
            Imagine que os dados persistidos no disco rígido do servidor estão em uma sala escura. O comando <code>SELECT</code> funciona exatamente como uma <strong>lanterna inteligente</strong>: você direciona o feixe de luz exatamente para a tabela e para as informações que deseja enxergar.
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 14px; margin: 18px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <span style="font-weight: 800; color: #0284c7; font-size: 11px; background: #e0f2fe; padding: 2px 8px; border-radius: 4px;">OPERAÇÃO CRUD</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">A Letra 'R' do CRUD (Read)</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    No padrão mundial de desenvolvimento, o <code>SELECT</code> é a operação de <strong>Read / Retrieve</strong> (leitura e recuperação de dados), responsável por alimentar telas, painéis e relatórios.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <span style="font-weight: 800; color: #059669; font-size: 11px; background: #dcfce7; padding: 2px 8px; border-radius: 4px;">SQL PURO</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">SQL Puro no Servidor</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    Trabalhamos diretamente com a linguagem universal ANSI SQL, garantindo que suas consultas funcionem em qualquer servidor Linux corporativo sem depender de bibliotecas externas.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <span style="font-weight: 800; color: #7c3aed; font-size: 11px; background: #f3e8ff; padding: 2px 8px; border-radius: 4px;">NÃO DESTRUTIVO</span>
                <h4 style="margin: 8px 0 4px; font-size: 14.5px; color: #0f172a;">Segurança Total de Leitura</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    Diferente do <code>UPDATE</code> ou <code>DELETE</code>, executar um <code>SELECT</code> nunca altera nem apaga nada na base de dados; ele apenas lê e projeta os registros para você.
                </p>
            </div>
        </div>

        <!-- INFOGRÁFICO DO FLUXO DO SELECT -->
        <div style="background: #0f172a; border-radius: 10px; padding: 20px; margin: 20px 0; color: #ffffff; border: 1px solid #334155;">
            <div style="font-size: 13.5px; font-weight: 700; color: #38bdf8; margin-bottom: 14px; display: flex; align-items: center; gap: 8px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                Como o Servidor MySQL Processa uma Consulta DQL:
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 14px;">
                <div style="background: rgba(255,255,255,0.05); padding: 14px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
                    <div style="color: #38bdf8; font-weight: 800; font-size: 12px; margin-bottom: 4px;">ETAPA 1: ENVIO</div>
                    <div style="font-size: 13px; font-weight: 700;">SQL Query Editor</div>
                    <div style="font-size: 11.5px; color: #94a3b8; margin-top: 4px;">Você digita a instrução <code>SELECT</code> e clica no botão de Raio ⚡.</div>
                </div>
                <div style="background: rgba(255,255,255,0.05); padding: 14px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
                    <div style="color: #4ade80; font-weight: 800; font-size: 12px; margin-bottom: 4px;">ETAPA 2: PROCESSAMENTO</div>
                    <div style="font-size: 13px; font-weight: 700;">Motor MySQL Server</div>
                    <div style="font-size: 11.5px; color: #94a3b8; margin-top: 4px;">O SGBD lê os dados físicos nos arquivos do disco rígido sem travamentos.</div>
                </div>
                <div style="background: rgba(255,255,255,0.05); padding: 14px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
                    <div style="color: #fbbf24; font-weight: 800; font-size: 12px; margin-bottom: 4px;">ETAPA 3: RETORNO</div>
                    <div style="font-size: 13px; font-weight: 700;">Result Grid & Output</div>
                    <div style="font-size: 11.5px; color: #94a3b8; margin-top: 4px;">A tabela formatada aparece na <em>Result Grid</em> e o semáforo verde confirma o sucesso.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 2: SELECT PADRÃO (BUSCA GERAL COM *)
     ========================================== -->
<section id="select-padrao-geral" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">2. O SELECT Padrão (Busca Geral com Asterisco)</h2>
            <div class="section-subtitle">O comando fundamental que recupera absolutamente todas as colunas de uma tabela</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            O comando mais conhecido e básico do SQL é o <strong>SELECT Geral</strong> utilizando o caractere asterisco (<code>*</code>). Na linguagem de banco de dados, o asterisco significa <em>"traga todas as colunas existentes na tabela física"</em>.
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Script SQL: Consulta Geral com Asterisco (*)</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar Consulta Geral</button>
            </div>
            <pre><code>USE aluno140_metal;

-- 1. Traz todas as colunas e todas as linhas da tabela cliente
SELECT * FROM cliente;

-- 2. Traz todas as colunas e todas as linhas da tabela peca
SELECT * FROM peca;

-- 3. Traz todas as colunas da tabela categoria
SELECT * FROM categoria;</code></pre>
        </div>

        <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; margin: 18px 0;">
            <strong style="color: #0f172a; font-size: 13.5px; display: block; margin-bottom: 10px;">
                ⚖️ Quando usar e quando evitar o <code>SELECT *</code> em ambientes profissionais:
            </strong>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
                <div style="background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 8px; padding: 12px;">
                    <span style="font-weight: 700; color: #166534; font-size: 12.5px;">✅ Quando é Recomendado:</span>
                    <ul style="margin: 6px 0 0 16px; font-size: 12px; color: #166534; line-height: 1.5;">
                        <li>Em aulas de laboratório para verificar se o <code>INSERT</code> gravou todas as colunas com sucesso.</li>
                        <li>Em tarefas de testes pontuais e depuração rápida no MySQL Workbench.</li>
                    </ul>
                </div>
                <div style="background: #fff1f2; border: 1px solid #fecdd3; border-radius: 8px; padding: 12px;">
                    <span style="font-weight: 700; color: #9f1239; font-size: 12.5px;">⚠️ Por que Evitar em Produção:</span>
                    <ul style="margin: 6px 0 0 16px; font-size: 12px; color: #9f1239; line-height: 1.5;">
                        <li>Em tabelas com milhões de linhas, puxar colunas desnecessárias sobrecarrega a rede e a memória RAM do servidor.</li>
                        <li>Transfere dados confidenciais que a tela final nem precisava exibir.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- SIMULAÇÃO VISUAL DA RESULT GRID -->
        <div style="border: 1.5px solid #cbd5e1; border-radius: 8px; overflow: hidden; background: #ffffff; margin: 16px 0;">
            <div style="background: #f1f5f9; padding: 8px 14px; border-bottom: 1px solid #cbd5e1; display: flex; align-items: center; justify-content: space-between; font-size: 12px; font-weight: 700; color: #334155;">
                <span>📋 Visualização da Result Grid no Workbench: <code>SELECT * FROM cliente;</code></span>
                <span style="background: #dcfce7; color: #166534; padding: 2px 8px; border-radius: 4px; font-size: 11px;">3 row(s) returned</span>
            </div>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 12px; text-align: left; font-family: var(--font-mono);">
                    <thead>
                        <tr style="background: #f8fafc; color: #475569; border-bottom: 1.5px solid #cbd5e1;">
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">id_cliente</th>
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">nome_completo</th>
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">cpf_cnpj</th>
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">telefone</th>
                            <th style="padding: 8px 10px; border-right: 1px solid #e2e8f0;">email</th>
                            <th style="padding: 8px 10px;">endereco</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9; color: #0284c7; font-weight: 700;">1</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">Auto Mecânica Silva & Irmãos</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">12.345.678/0001-90</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">(19) 98765-4321</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">contato@mecanicasilva.com.br</td>
                            <td style="padding: 7px 10px;">Av. das Américas, 1500 - Campinas/SP</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f1f5f9; background: #fafafa;">
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9; color: #0284c7; font-weight: 700;">2</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">Centro Automotivo Paulista Ltda</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">98.765.432/0001-10</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">(11) 91234-5678</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">compras@paulistacar.com</td>
                            <td style="padding: 7px 10px;">Rua Augusta, 450 - São Paulo/SP</td>
                        </tr>
                        <tr>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9; color: #0284c7; font-weight: 700;">3</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">Oficina Brasil Turbo Performance</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">45.888.999/0001-22</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">(11) 99887-7665</td>
                            <td style="padding: 7px 10px; border-right: 1px solid #f1f5f9;">pedidos@brasilturbo.com.br</td>
                            <td style="padding: 7px 10px;">Av. Industrial, 890 - Santo André/SP</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 5.1 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 5.1
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Execução do SELECT * no MySQL Workbench</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 5.1: Execução do comando SELECT * FROM cliente; no MySQL Workbench com a Result Grid exibindo todas as colunas e o Action Output com 3 row(s) returned" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/select-geral-cliente-result-grid.png" alt="Execução do SELECT * FROM cliente no MySQL Workbench com a Result Grid e o Action Output exibindo 3 row(s) returned" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 5.1:</strong> Execução do comando <code>SELECT * FROM cliente;</code> no MySQL Workbench, demonstrando a <em>Result Grid</em> preenchida com todas as 5 colunas da tabela física e o painel <em>Action Output</em> confirmando o status verde com <code>3 row(s) returned</code>. <em>(Clique na imagem para ampliá-la em tela cheia)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 3: SELECT DIRECIONADO (PROJEÇÃO)
     ========================================== -->
<section id="select-direcionado-colunas" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
        </div>
        <div>
            <h2 class="section-title">3. O SELECT Direcionado (Profissional e Performático)</h2>
            <div class="section-subtitle">Projeção explícita: declarando apenas as colunas que a sua aplicação realmente precisa</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Em vez de trazer todas as colunas com <code>*</code>, a prática recomendada na engenharia de software é a <strong>Projeção Explícita de Colunas</strong>: você lista separadas por vírgula exatamente as colunas que deseja ler.
        </p>
        <p>
            Se a tela do atendente precisa apenas do <strong>nome</strong> e do <strong>email</strong> do cliente, não há motivo para obrigar o banco a processar e trafegar pela rede o endereço completo e o CPF/CNPJ. Isso torna a resposta do banco instantânea.
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Script SQL: Projeção Explícita de Colunas</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar SELECT Direcionado</button>
            </div>
            <pre><code>USE aluno140_metal;

-- 1. Traz apenas o nome e o email dos clientes (ignora CPF, telefone e endereço)
SELECT nome_completo, email FROM cliente;

-- 2. Traz apenas o nome da peça, seu preço de venda e a quantidade em estoque
SELECT nome_peca, preco_unitario, quantidade_estoque FROM peca;

-- 3. Traz apenas o ID e o nome das categorias
SELECT id_categoria, nome_categoria FROM categoria;</code></pre>
        </div>

        <!-- SIMULAÇÃO VISUAL DA PROJEÇÃO -->
        <div style="border: 1.5px solid #cbd5e1; border-radius: 8px; overflow: hidden; background: #ffffff; margin: 16px 0;">
            <div style="background: #f1f5f9; padding: 8px 14px; border-bottom: 1px solid #cbd5e1; display: flex; align-items: center; justify-content: space-between; font-size: 12px; font-weight: 700; color: #334155;">
                <span>📋 Result Grid Projeção Direcionada: <code>SELECT nome_completo, email FROM cliente;</code></span>
                <span style="background: #e0f2fe; color: #0369a1; padding: 2px 8px; border-radius: 4px; font-size: 11px;">2 colunas retornadas</span>
            </div>
            <table style="width: 100%; border-collapse: collapse; font-size: 12px; text-align: left; font-family: var(--font-mono);">
                <thead>
                    <tr style="background: #f8fafc; color: #475569; border-bottom: 1.5px solid #cbd5e1;">
                        <th style="padding: 8px 14px; border-right: 1px solid #e2e8f0;">nome_completo</th>
                        <th style="padding: 8px 14px;">email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 7px 14px; border-right: 1px solid #f1f5f9; font-weight: 600;">Auto Mecânica Silva & Irmãos</td>
                        <td style="padding: 7px 14px; color: #0284c7;">contato@mecanicasilva.com.br</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f1f5f9; background: #fafafa;">
                        <td style="padding: 7px 14px; border-right: 1px solid #f1f5f9; font-weight: 600;">Centro Automotivo Paulista Ltda</td>
                        <td style="padding: 7px 14px; color: #0284c7;">compras@paulistacar.com</td>
                    </tr>
                    <tr>
                        <td style="padding: 7px 14px; border-right: 1px solid #f1f5f9; font-weight: 600;">Oficina Brasil Turbo Performance</td>
                        <td style="padding: 7px 14px; color: #0284c7;">pedidos@brasilturbo.com.br</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 5.2 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 5.2
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Projeção Direcionada de Colunas</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 5.2: Execução de Projeção Direcionada (SELECT nome_completo, email FROM cliente;) no MySQL Workbench exibindo somente as 2 colunas solicitadas" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/select-projecao-cliente-result-grid.png" alt="Execução de Projeção Direcionada SELECT nome_completo, email FROM cliente no MySQL Workbench" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 5.2:</strong> Execução de consulta com projeção explícita (<code>SELECT nome_completo, email FROM cliente;</code>) no MySQL Workbench, demonstrando a <em>Result Grid</em> enxuta contendo apenas os campos requisitados pela aplicação e o status verde com <code>3 row(s) returned</code>. <em>(Clique na imagem para ampliá-la em tela cheia)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 4: SELECT COM FILTRO (CLÁUSULA WHERE)
     ========================================== -->
<section id="select-filtro-where" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
        </div>
        <div>
            <h2 class="section-title">4. O SELECT com Filtro (A Cláusula WHERE)</h2>
            <div class="section-subtitle">O coração de qualquer sistema de busca: limitando as linhas que atendem a uma condição</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            A cláusula <strong>WHERE</strong> é o filtro de precisão do SQL. Com ela, o banco de dados analisa linha por linha da tabela física e devolve <strong>apenas os registros que satisfazem a uma condição exata</strong>.
        </p>
        <p>
            A leitura lógica é muito intuitiva: <em>"Selecione o nome e o telefone do cliente ONDE (WHERE) o CPF for igual a X"</em>.
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Script SQL: Consultas com a Cláusula WHERE</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar Filtros WHERE</button>
            </div>
            <pre><code>USE aluno140_metal;

-- 1. Busca um cliente específico pelo seu documento (CPF/CNPJ)
SELECT nome_completo, telefone 
FROM cliente 
WHERE cpf_cnpj = '12.345.678/0001-90';

-- 2. Busca todas as peças com preço acima de R$ 200,00
SELECT nome_peca, preco_unitario, quantidade_estoque 
FROM peca 
WHERE preco_unitario > 200.00;

-- 3. Busca todas as peças vinculadas à categoria 2 (Freios)
SELECT nome_peca, descricao_peca, preco_unitario 
FROM peca 
WHERE id_categoria = 2;</code></pre>
        </div>

        <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; margin: 18px 0;">
            <strong style="color: #0f172a; font-size: 13.5px; display: block; margin-bottom: 10px;">
                📊 Tabela de Operadores Relacionais Essenciais no WHERE:
            </strong>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 10px; font-size: 12.5px;">
                <div style="background: #ffffff; padding: 10px; border-radius: 6px; border: 1px solid #e2e8f0;">
                    <code style="color: #0284c7; font-weight: 700;">=</code> <strong>Igual a</strong><br>
                    <code>WHERE id_categoria = 1</code>
                </div>
                <div style="background: #ffffff; padding: 10px; border-radius: 6px; border: 1px solid #e2e8f0;">
                    <code style="color: #0284c7; font-weight: 700;">!=</code> ou <code style="color: #0284c7; font-weight: 700;">&lt;&gt;</code> <strong>Diferente de</strong><br>
                    <code>WHERE status_pedido != 'Cancelado'</code>
                </div>
                <div style="background: #ffffff; padding: 10px; border-radius: 6px; border: 1px solid #e2e8f0;">
                    <code style="color: #0284c7; font-weight: 700;">&gt;</code> e <code style="color: #0284c7; font-weight: 700;">&gt;=</code> <strong>Maior / Maior ou Igual</strong><br>
                    <code>WHERE preco_unitario &gt;= 150.00</code>
                </div>
                <div style="background: #ffffff; padding: 10px; border-radius: 6px; border: 1px solid #e2e8f0;">
                    <code style="color: #0284c7; font-weight: 700;">&lt;</code> e <code style="color: #0284c7; font-weight: 700;">&lt;=</code> <strong>Menor / Menor ou Igual</strong><br>
                    <code>WHERE quantidade_estoque &lt; 15</code>
                </div>
            </div>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 5.3 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 5.3
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Filtro Preciso por Documento (WHERE)</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 5.3: Execução de filtro WHERE por CPF/CNPJ (WHERE cpf_cnpj = '12.345.678/0001-90') no MySQL Workbench retornando exatamente o registro único com status 1 row(s) returned" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/select-filtro-where-cliente-result-grid.png" alt="Execução do SELECT com cláusula WHERE por documento no MySQL Workbench com Result Grid e Action Output" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 5.3:</strong> Execução do comando com cláusula <code>WHERE</code> (<code>SELECT nome_completo, telefone FROM cliente WHERE cpf_cnpj = '12.345.678/0001-90';</code>) no MySQL Workbench, demonstrando o retorno preciso de exatamente uma linha (<code>1 row(s) returned</code>) com a <em>Auto Mecânica Silva & Irmãos</em>. <em>(Clique na imagem para ampliá-la em tela cheia)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 5: SELECT ORDENADO (ORDER BY)
     ========================================== -->
<section id="select-ordenacao-orderby" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M6 12h12M9 18h6"></path></svg>
        </div>
        <div>
            <h2 class="section-title">5. O SELECT Ordenado (A Cláusula ORDER BY)</h2>
            <div class="section-subtitle">Organizando os resultados em ordem alfabética, cronológica ou numérica</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Por padrão, o MySQL devolve as linhas na ordem física de inserção no disco. Para organizar os dados de forma inteligível para o usuário final ou para relatórios de diretoria, utilizamos a cláusula <strong>ORDER BY</strong> seguida do nome da coluna.
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin: 16px 0;">
            <div style="background: #ffffff; border: 2px solid #bae6fd; border-radius: 10px; padding: 16px;">
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 6px;">
                    <span style="background: #0284c7; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">ASC (PADRÃO)</span>
                    <h4 style="margin: 0; font-size: 14.5px; color: #0369a1;">Ordem Ascendente / Crescente</h4>
                </div>
                <p style="font-size: 12.5px; color: #334155; margin: 0; line-height: 1.5;">
                    Organiza textos de <strong>A até Z</strong>, números do <strong>menor para o maior</strong> (1, 2, 3...) e datas da <strong>mais antiga para a mais recente</strong>.
                </p>
            </div>

            <div style="background: #ffffff; border: 2px solid #fecdd3; border-radius: 10px; padding: 16px;">
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 6px;">
                    <span style="background: #e11d48; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">DESC</span>
                    <h4 style="margin: 0; font-size: 14.5px; color: #9f1239;">Ordem Descendente / Decrescente</h4>
                </div>
                <p style="font-size: 12.5px; color: #334155; margin: 0; line-height: 1.5;">
                    Organiza textos de <strong>Z até A</strong>, números do <strong>maior para o menor</strong> (ex: peças mais caras primeiro) e datas da <strong>mais recente para a mais antiga</strong>.
                </p>
            </div>
        </div>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Script SQL: Ordenação de Registros com ORDER BY</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar ORDER BY</button>
            </div>
            <pre><code>USE aluno140_metal;

-- 1. Lista os clientes em ordem alfabética (De A até Z)
SELECT id_cliente, nome_completo, email 
FROM cliente 
ORDER BY nome_completo ASC;

-- 2. Lista as peças em estoque da mais cara para a mais barata
SELECT nome_peca, preco_unitario, quantidade_estoque 
FROM peca 
ORDER BY preco_unitario DESC;

-- 3. Lista os pedidos dos mais recentes para os mais antigos
SELECT id_pedido, data_pedido, status_pedido, valor_total 
FROM pedido 
ORDER BY data_pedido DESC;</code></pre>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 5.4 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 5.4
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Ordenação com ORDER BY DESC</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 5.4: Execução de ordenação decrescente (SELECT nome_peca, preco_unitario, quantidade_estoque FROM peca ORDER BY preco_unitario DESC;) no MySQL Workbench listando as peças da mais cara para a mais barata com status 7 row(s) returned" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/select-ordenacao-orderby-peca-result-grid.png" alt="Execução do SELECT com ORDER BY DESC no MySQL Workbench com Result Grid e Action Output" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 5.4:</strong> Execução do comando com ordenação decrescente (<code>SELECT nome_peca, preco_unitario, quantidade_estoque FROM peca ORDER BY preco_unitario DESC;</code>) no MySQL Workbench, demonstrando a <em>Result Grid</em> com os produtos ranqueados a partir do item de maior valor (R$ 320,00) e o status verde com <code>7 row(s) returned</code>. <em>(Clique na imagem para ampliá-la em tela cheia)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 6: SELECT COMPLETO & OPERADOR LIKE
     ========================================== -->
<section id="select-completo-like" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">6. O SELECT Completo (Juntando Todas as Peças) & Operador LIKE</h2>
            <div class="section-subtitle">A estrutura oficial combinada e a poderosa busca textual com o caractere coringa (%)</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            No dia a dia profissional, combinamos todas essas técnicas em uma única instrução para gerar relatórios precisos. A ordem das cláusulas deve seguir rigorosamente a sintaxe oficial do SQL:
        </p>

        <div style="background: #0f172a; border-radius: 8px; padding: 14px 18px; margin: 16px 0; font-family: var(--font-mono); font-size: 13px; color: #e2e8f0; line-height: 1.7;">
            <span style="color: #38bdf8; font-weight: 700;">1. SELECT</span> <span style="color: #94a3b8;">[colunas desejadas]</span><br>
            <span style="color: #38bdf8; font-weight: 700;">2. FROM</span>   <span style="color: #94a3b8;">[tabela de origem]</span><br>
            <span style="color: #38bdf8; font-weight: 700;">3. WHERE</span>  <span style="color: #94a3b8;">[condição / filtro de linhas]</span><br>
            <span style="color: #38bdf8; font-weight: 700;">4. ORDER BY</span> <span style="color: #94a3b8;">[coluna de ordenação] [ASC | DESC]</span>;
        </div>

        <h4 style="margin: 20px 0 8px; font-size: 15px; color: #0f172a;">🔍 Busca Textual Parcial com o Operador LIKE e Coringa (%)</h4>
        <p>
            Muitas vezes o usuário não sabe o endereço ou nome exato cadastrado (por exemplo: procura por "Centro", mas o endereço completo é <em>"Av. das Américas, 1500 - Centro - Campinas/SP"</em>). Para isso utilizamos o operador <strong>LIKE</strong> com o símbolo de porcentagem (<code>%</code>):
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin: 14px 0;">
            <div style="background: #ffffff; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1;">
                <code style="color: #0284c7; font-weight: 700;">LIKE '%Centro%'</code><br>
                <span style="font-size: 12px; color: #475569;">Encontra a palavra "Centro" em <strong>qualquer posição</strong> do texto.</span>
            </div>
            <div style="background: #ffffff; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1;">
                <code style="color: #0284c7; font-weight: 700;">LIKE 'Auto%'</code><br>
                <span style="font-size: 12px; color: #475569;">Encontra textos que <strong>começam</strong> com "Auto".</span>
            </div>
            <div style="background: #ffffff; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1;">
                <code style="color: #0284c7; font-weight: 700;">LIKE '%Ltda'</code><br>
                <span style="font-size: 12px; color: #475569;">Encontra textos que <strong>terminam</strong> com "Ltda".</span>
            </div>
        </div>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Desafio Prático: Consulta Completa (SELECT + FROM + WHERE LIKE + ORDER BY)</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar Desafio</button>
            </div>
            <pre><code>USE aluno140_metal;

-- 🎯 DESAFIO: Lista telefônica dos clientes que possuem 'Centro' no endereço, ordenados por nome:
SELECT nome_completo, telefone, endereco 
FROM cliente 
WHERE endereco LIKE '%Centro%' 
ORDER BY nome_completo ASC;</code></pre>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 5.5 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 5.5
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Busca Textual com LIKE (%) e ORDER BY</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 5.5: Execução de busca textual com o operador LIKE '%Centro%' e ordenação ORDER BY nome_completo ASC no MySQL Workbench" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/select-like-centro-cliente-result-grid.png" alt="Execução do SELECT com operador LIKE e ORDER BY no MySQL Workbench com Result Grid e Action Output" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 5.5:</strong> Execução do comando completo com operador <code>LIKE</code> e ordenação alfabética (<code>SELECT nome_completo, telefone, endereco FROM cliente WHERE endereco LIKE '%Centro%' ORDER BY nome_completo ASC;</code>) no MySQL Workbench, demonstrando o processamento do filtro textual com status verde no <em>Action Output</em>. <em>(Clique na imagem para ampliá-la em tela cheia)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 7: CONSULTAS NO ESTOQUE DA AUTOMETAL
     ========================================== -->
<section id="consultas-praticas-autometal" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
        </div>
        <div>
            <h2 class="section-title">7. Consultas no Estoque Real da AutoMetal Brasil S.A.</h2>
            <div class="section-subtitle">Aplicando filtros com operadores lógicos (AND / OR) e gerando relatórios de fábrica</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            No ambiente de manufatura da AutoMetal Brasil, o gerente de logística e compras necessita de relatórios específicos combinando múltiplas condições. Utilizamos os operadores lógicos <strong>AND (E)</strong> e <strong>OR (OU)</strong>:
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Relatórios Gerenciais do Estoque de Autopeças</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar Relatórios de Estoque</button>
            </div>
            <pre><code>USE aluno140_metal;

-- 📊 RELATÓRIO 1: Alerta de Reposição de Estoque (Peças com menos de 20 unidades)
SELECT nome_peca, quantidade_estoque, preco_unitario 
FROM peca 
WHERE quantidade_estoque < 20 
ORDER BY quantidade_estoque ASC;

-- 📊 RELATÓRIO 2: Peças de Alta Performance (Preço >= 200 E Estoque > 10)
SELECT nome_peca, preco_unitario, quantidade_estoque 
FROM peca 
WHERE preco_unitario >= 200.00 AND quantidade_estoque > 10 
ORDER BY preco_unitario DESC;

-- 📊 RELATÓRIO 3: Busca por Peças de Freio e Transmissão (Operador OR)
SELECT nome_peca, preco_unitario, id_categoria 
FROM peca 
WHERE id_categoria = 2 OR id_categoria = 4 
ORDER BY id_categoria ASC, preco_unitario DESC;</code></pre>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 5.6 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 5.6
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Relatório de Estoque Crítico na Fábrica</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 5.6: Execução de Relatório de Estoque Crítico (SELECT nome_peca, quantidade_estoque, preco_unitario FROM peca WHERE quantidade_estoque < 20 ORDER BY quantidade_estoque ASC;) no MySQL Workbench com status 3 row(s) returned" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/select-relatorio-estoque-critico-result-grid.png" alt="Execução do Relatório de Estoque Crítico no MySQL Workbench com Result Grid e Action Output" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 5.6:</strong> Execução do relatório industrial de reposição de estoque (<code>SELECT nome_peca, quantidade_estoque, preco_unitario FROM peca WHERE quantidade_estoque &lt; 20 ORDER BY quantidade_estoque ASC;</code>) no MySQL Workbench, destacando os 3 itens abaixo do ponto de ressuprimento com status verde no <em>Action Output</em> (`3 row(s) returned`). <em>(Clique na imagem para ampliá-la em tela cheia)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 8: ATIVIDADE PRÁTICA DO MÓDULO 5
     ========================================== -->
<section id="atividade-pratica-select" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
        </div>
        <div>
            <h2 class="section-title">8. Atividade Prática: Consultas e Extração de Relatórios</h2>
            <div class="section-subtitle">Consolide seus conhecimentos de DQL e envie seus scripts de consulta oficiais</div>
        </div>
    </div>

    <div class="theory-block">
        <div class="company-case-box">
            <div class="company-case-header">
                <span class="company-badge-pill">🏆 Missão Prática de Consultas</span>
                <h4 class="company-case-title">Caso Real: Relatório de Vendas e Inventário para a Gerência</h4>
            </div>
            <p style="font-size: 13px; color: #166534; line-height: 1.55; margin: 0;">
                O diretor industrial da AutoMetal Brasil solicitou a você a escrita dos scripts SQL para responder a 3 demandas de negócio:
                <br>1. Uma lista com o <code>nome_peca</code> e o <code>preco_unitario</code> de todas as peças com preço superior a <code>R$ 150,00</code>, ordenadas da mais cara para a mais barata.
                <br>2. Uma busca na tabela <code>cliente</code> que encontre todas as oficinas ou autopeças cujo nome contenha o termo <code>'Mecânica'</code>.
                <br>3. Uma consulta na tabela <code>peca</code> que liste todas as peças com estoque crítico (menor ou igual a <code>15</code> unidades).
            </p>
        </div>

        <form class="project-submit-form" onsubmit="event.preventDefault(); alert('Parabéns! Sua atividade de consultas SELECT do Módulo 5 foi enviada com sucesso.');">
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    Nome Completo do Aluno:
                </label>
                <input type="text" required placeholder="Digite seu nome completo..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13.5px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    1. Por que o comando 'SELECT *' deve ser evitado em sistemas web de grande porte em produção?
                </label>
                <textarea rows="3" required placeholder="Explique sobre o consumo de memória RAM, banda de rede e segurança..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;"></textarea>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    2. Qual a diferença prática entre as ordenações ORDER BY ... ASC e ORDER BY ... DESC?
                </label>
                <textarea rows="3" required placeholder="Explique a ordem ascendente vs descendente..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;"></textarea>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    3. Seus Scripts SQL de Consulta (Exercícios 1, 2 e 3 da Missão):
                </label>
                <textarea rows="6" required placeholder="-- 1. Peças > 150 ordenadas por preço DESC:
SELECT nome_peca, preco_unitario FROM peca WHERE preco_unitario > 150.00 ORDER BY preco_unitario DESC;

-- 2. Clientes com 'Mecânica' no nome:
SELECT nome_completo, telefone FROM cliente WHERE nome_completo LIKE '%Mecânica%';

-- 3. Estoque crítico <= 15:
SELECT nome_peca, quantidade_estoque FROM peca WHERE quantidade_estoque <= 15 ORDER BY quantidade_estoque ASC;" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-family: var(--font-mono); font-size: 12.5px;"></textarea>
            </div>

            <button type="submit" style="background: #0284c7; color: #ffffff; font-weight: 700; font-size: 13.5px; padding: 11px 24px; border-radius: 6px; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Enviar Atividade de SELECT do Módulo 5
            </button>
        </form>
    </div>
</section>

