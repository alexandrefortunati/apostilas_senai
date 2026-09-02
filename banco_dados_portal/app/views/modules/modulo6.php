<div class="hero-card">
    <div class="hero-tags">
        <span class="badge-tag senai">SENAI - SP • Módulo 6</span>
        <span class="badge-tag accent">Capítulo 6: Sistema Web Completo de Consultas (Full Stack)</span>
        <span class="badge-tag time">Guia Prático Passo a Passo</span>
    </div>
    <h1 class="hero-title"><?= htmlspecialchars($module['title']) ?></h1>
    <p class="hero-desc">
        Para colocar o motor de busca no ar diretamente no servidor físico Linux, vamos construir a aplicação dividindo-a em <strong>4 arquivos essenciais</strong>. Essa separação garante que os alunos compreendam o papel exato de cada tecnologia no fluxo da informação: o <strong>HTML</strong> desenha a tela, o <strong>CSS</strong> embeleza, o <strong>JavaScript</strong> faz o transporte assíncrono e o <strong>PHP</strong> executa o <strong>Método A (SQL Puro)</strong> com PDO no banco de dados da <strong>AutoMetal Brasil S.A.</strong>
    </p>
</div>

<!-- ==========================================
     SEÇÃO 1: A ARQUITETURA EM 4 CAMADAS
     ========================================== -->
<section id="intro-arquitetura-web-sql" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
        </div>
        <div>
            <h2 class="section-title">1. A Arquitetura em 4 Camadas no Fluxo da Informação</h2>
            <div class="section-subtitle">Como os navegadores conversam com servidores e bancos de dados através de requisições assíncronas</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            No desenvolvimento web moderno, uma aplicação profissional nunca conecta o navegador diretamente ao banco de dados por razões cruciais de segurança e desempenho. Em vez disso, utilizamos uma arquitetura limpa e desacoplada em <strong>4 camadas especializadas</strong>:
        </p>

        <!-- DIAGRAMA VISUAL DAS 4 CAMADAS -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 14px; margin: 20px 0;">
            <div style="background: #ffffff; border: 2px solid #bae6fd; border-radius: 10px; padding: 16px; position: relative;">
                <span style="background: #0284c7; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">CAMADA 1 • FRONT-END</span>
                <h4 style="margin: 8px 0 4px; font-size: 15px; color: #0369a1;">1. A Interface (HTML5)</h4>
                <div style="font-family: var(--font-mono); font-size: 12px; color: #0284c7; font-weight: 700; margin-bottom: 6px;">index.html</div>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    <strong>O Esqueleto Visual:</strong> O usuário acessa a página no navegador. Contém a caixa de texto para digitação da busca e o espaço reservado para exibição das peças.
                </p>
            </div>

            <div style="background: #ffffff; border: 2px solid #cbd5e1; border-radius: 10px; padding: 16px;">
                <span style="background: #475569; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">CAMADA 2 • DESIGN</span>
                <h4 style="margin: 8px 0 4px; font-size: 15px; color: #1e293b;">2. O Estilo (CSS3)</h4>
                <div style="font-family: var(--font-mono); font-size: 12px; color: #475569; font-weight: 700; margin-bottom: 6px;">style.css</div>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    <strong>A Apresentação:</strong> Aplica tipografia limpa, sombras suaves, alinhamento centralizado com Flexbox e botões responsivos estilo Google Search.
                </p>
            </div>

            <div style="background: #ffffff; border: 2px solid #fed7aa; border-radius: 10px; padding: 16px;">
                <span style="background: #ea580c; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">CAMADA 3 • TRANSPORTE</span>
                <h4 style="margin: 8px 0 4px; font-size: 15px; color: #c2410c;">3. O Transportador (JavaScript)</h4>
                <div style="font-family: var(--font-mono); font-size: 12px; color: #ea580c; font-weight: 700; margin-bottom: 6px;">script.js</div>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    <strong>A Ponte Assíncrona:</strong> Captura o termo digitado, dispara uma chamada HTTP via <code>Fetch API</code> sem recarregar a página e renderiza os dados formatados.
                </p>
            </div>

            <div style="background: #ffffff; border: 2px solid #bbf7d0; border-radius: 10px; padding: 16px;">
                <span style="background: #166534; color: #ffffff; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 4px;">CAMADA 4 • BACK-END & SQL</span>
                <h4 style="margin: 8px 0 4px; font-size: 15px; color: #166534;">4. O Motor Lógico (PHP + MySQL)</h4>
                <div style="font-family: var(--font-mono); font-size: 12px; color: #166534; font-weight: 700; margin-bottom: 6px;">busca.php (Método A)</div>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    <strong>O Cérebro Seguro:</strong> Conecta ao MySQL via PDO, executa a consulta <code>SELECT ... WHERE nome_peca LIKE :termo</code> e devolve o resultado em JSON.
                </p>
            </div>
        </div>

        <!-- INFOGRÁFICO DO CICLO DE VIDA DE UMA REQUISIÇÃO -->
        <div style="background: #0f172a; border-radius: 12px; padding: 22px; margin: 24px 0; color: #ffffff; border: 1px solid #334155;">
            <div style="font-size: 14px; font-weight: 700; color: #38bdf8; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                O Fluxo Completo de Consulta em Tempo Real:
            </div>
            <div style="display: flex; flex-direction: column; gap: 10px; font-size: 13px; color: #cbd5e1; line-height: 1.6;">
                <div style="display: flex; align-items: center; gap: 12px; background: rgba(255,255,255,0.05); padding: 10px 14px; border-radius: 6px;">
                    <span style="background: #0284c7; color: #fff; font-weight: 800; font-size: 11px; padding: 2px 8px; border-radius: 4px;">PASSO 1</span>
                    <span>O usuário digita <code>"Disco"</code> no <code>index.html</code> e clica no botão <strong>Buscar</strong>.</span>
                </div>
                <div style="display: flex; align-items: center; gap: 12px; background: rgba(255,255,255,0.05); padding: 10px 14px; border-radius: 6px;">
                    <span style="background: #ea580c; color: #fff; font-weight: 800; font-size: 11px; padding: 2px 8px; border-radius: 4px;">PASSO 2</span>
                    <span>O <code>script.js</code> intercepta o clique e dispara uma requisição <code>fetch('busca.php?q=Disco')</code>.</span>
                </div>
                <div style="display: flex; align-items: center; gap: 12px; background: rgba(255,255,255,0.05); padding: 10px 14px; border-radius: 6px;">
                    <span style="background: #166534; color: #fff; font-weight: 800; font-size: 11px; padding: 2px 8px; border-radius: 4px;">PASSO 3</span>
                    <span>O <code>busca.php</code> no servidor recebe o parâmetro e executa o <strong>Método A (SQL Puro)</strong> com proteção contra SQL Injection.</span>
                </div>
                <div style="display: flex; align-items: center; gap: 12px; background: rgba(255,255,255,0.05); padding: 10px 14px; border-radius: 6px;">
                    <span style="background: #7c3aed; color: #fff; font-weight: 800; font-size: 11px; padding: 2px 8px; border-radius: 4px;">PASSO 4</span>
                    <span>O MySQL Server devolve as linhas encontradas, o PHP as empacota em formato <strong>JSON</strong> e o JavaScript desenha os cards na tela formatando os preços em <strong>R$</strong>.</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 2: ARQUIVO 1 - A INTERFACE (HTML)
     ========================================== -->
<section id="html-interface-busca" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">2. A Interface Visual (HTML5)</h2>
            <div class="section-subtitle">Arquivo index.html: estrutura semântica com campo de entrada, botão e container dinâmico</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Este é o arquivo que o usuário vai acessar pelo navegador. Ele contém a barra de pesquisa onde o operador da fábrica digita o nome ou código da peça e o espaço reservado com o identificador <code>id="resultados"</code> onde os dados retornados pelo banco de dados serão injetados.
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Arquivo 1 de 4: index.html</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar index.html</button>
            </div>
            <pre><code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html lang="pt-BR"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Busca de Peças&lt;/title&gt;
    &lt;link rel="stylesheet" href="style.css"&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div class="container"&gt;
        &lt;h1&gt;Buscar no Estoque&lt;/h1&gt;
        &lt;div class="search-box"&gt;
            &lt;input type="text" id="campoBusca" placeholder="Digite o nome da peça (ex: Filtro)..."&gt;
            &lt;button onclick="buscarPecas()"&gt;Buscar&lt;/button&gt;
        &lt;/div&gt;
        &lt;div id="resultados"&gt;
            &lt;!-- Os resultados aparecerão aqui --&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;script src="script.js"&gt;&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
        </div>

        <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; margin-top: 14px;">
            <strong style="color: #0f172a; font-size: 13.5px; display: block; margin-bottom: 8px;">
                💡 Análise dos Elementos Chave do HTML:
            </strong>
            <ul style="margin: 0 0 0 20px; font-size: 13px; color: #475569; line-height: 1.6;">
                <li><code>&lt;input id="campoBusca"&gt;</code>: O campo de texto onde o usuário digita o termo desejado. O <code>id</code> é a âncora que o JavaScript usará para ler o valor.</li>
                <li><code>&lt;button onclick="buscarPecas()"&gt;</code>: Quando clicado, executa imediatamente a função JavaScript responsável por disparar a consulta.</li>
                <li><code>&lt;div id="resultados"&gt;</code>: O elemento vazio que funcionará como "palco" para as peças devolvidas pelo banco.</li>
            </ul>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 3: ARQUIVO 2 - O ESTILO (CSS)
     ========================================== -->
<section id="css-estilo-motor-busca" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83M16.62 12l-5.74 9.94"></path></svg>
        </div>
        <div>
            <h2 class="section-title">3. O Estilo e Design (CSS3)</h2>
            <div class="section-subtitle">Arquivo style.css: layout limpo, tipografia profissional e experiência visual agradável</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Para dar um aspecto limpo e profissional, semelhante a um motor de busca real, o CSS centraliza a aplicação na tela, estiliza a caixa de busca com cantos arredondados e formata cada peça encontrada em um card com preço destacado.
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Arquivo 2 de 4: style.css</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar style.css</button>
            </div>
            <pre><code class="language-css">body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    display: flex;
    justify-content: center;
    padding-top: 50px;
}
.container {
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 600px;
}
.search-box {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}
input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}
button {
    padding: 10px 20px;
    background-color: #0056b3;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}
button:hover {
    background-color: #004494;
}
.peca-item {
    padding: 10px;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
}</code></pre>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 4: ARQUIVO 3 - MOTOR LÓGICO (PHP + SQL)
     ========================================== -->
<section id="php-motor-logico-sql" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
        </div>
        <div>
            <h2 class="section-title">4. O Motor Lógico no Servidor (PHP com PDO & Método A)</h2>
            <div class="section-subtitle">Arquivo busca.php: a conexão segura, Prepared Statements com LIKE (%) e entrega em JSON</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Este arquivo fica protegido no servidor web. Ele recebe a palavra digitada na tela via requisição <code>GET</code>, conecta-se ao banco de dados com a extensão segura <strong>PDO (PHP Data Objects)</strong> e executa a instrução <strong>SQL puro (Método A)</strong> que aprendemos no Módulo 5.
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Arquivo 3 de 4: busca.php</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar busca.php</button>
            </div>
            <pre><code class="language-php">&lt;?php
// Configurações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'aluno140_metal';
$usuario = 'root';
$senha = ''; // Altere para a senha do seu servidor MySQL

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Recebe o termo digitado na tela
    $termoBusca = isset($_GET['q']) ? $_GET['q'] : '';
    
    // Método A (SQL Puro): A consulta com filtro e ordenação
    // Usamos o LIKE para simular o "efeito Google" de busca parcial
    $sql = "SELECT nome_peca, preco_unitario 
            FROM peca 
            WHERE nome_peca LIKE :termo 
            ORDER BY preco_unitario ASC";
            
    $stmt = $conexao->prepare($sql);
    // Adiciona os curingas (%) antes e depois da palavra para buscar em qualquer parte do texto
    $stmt->bindValue(':termo', '%' . $termoBusca . '%');
    $stmt->execute();
    
    // Pega todos os resultados e transforma em um formato que o JavaScript entenda (JSON)
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($resultados);
} catch(PDOException $e) {
    echo json_encode(["erro" => "Erro na conexão: " . $e->getMessage()]);
}
?&gt;</code></pre>
        </div>

        <div style="background: #f0fdf4; border: 1.5px solid #86efac; border-radius: 10px; padding: 16px; margin-top: 14px;">
            <strong style="color: #166534; font-size: 13.5px; display: block; margin-bottom: 8px;">
                🔒 Princípios de Segurança e Engenharia no busca.php:
            </strong>
            <ul style="margin: 0 0 0 20px; font-size: 13px; color: #166534; line-height: 1.6;">
                <li><strong>Prepared Statements (<code>prepare</code> / <code>bindValue</code>)</strong>: O parâmetro <code>:termo</code> é tratado estritamente como texto puro pelo MySQL, impedindo ataques de injeção de código malicioso (<strong>SQL Injection</strong>).</li>
                <li><strong>Operador LIKE com Coringas <code>%...%</code></strong>: Permite ao operador digitar apenas parte da palavra (ex: "Freio" encontra "Pastilha de Freio Cerâmica" e "Disco de Freio Ventilado 280mm").</li>
                <li><strong>Formato JSON</strong>: É a linguagem universal de troca de dados na web, permitindo que qualquer navegador processe a resposta com velocidade máxima.</li>
            </ul>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 5: ARQUIVO 4 - O TRANSPORTADOR (JS)
     ========================================== -->
<section id="js-transportador-fetch" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">5. O Transportador Assíncrono (JavaScript & Fetch API)</h2>
            <div class="section-subtitle">Arquivo script.js: a ponte que conecta o front-end ao back-end sem recarregar a tela</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            O JavaScript atua como a <strong>ponte de transporte</strong>. Ele captura o que foi digitado no HTML, envia para o PHP processar no servidor através da <strong>Fetch API</strong> e, quando a resposta retorna do banco de dados, desenha as peças dinamicamente na tela formatando os valores numéricos em moeda Real (<code>R$</code>).
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Arquivo 4 de 4: script.js</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar script.js</button>
            </div>
            <pre><code class="language-javascript">function buscarPecas() {
    // Captura o que o usuário digitou no campo de texto
    const termo = document.getElementById('campoBusca').value;
    const divResultados = document.getElementById('resultados');
    
    // Mostra mensagem de carregamento
    divResultados.innerHTML = '<p>Buscando...</p>';
    
    // Faz a requisição para o arquivo PHP no servidor
    fetch(`busca.php?q=${encodeURIComponent(termo)}`)
        .then(resposta => resposta.json()) // Converte a resposta para JSON
        .then(dados => {
            // Limpa a tela
            divResultados.innerHTML = '';
            
            // Verifica se o banco encontrou alguma peça
            if (!dados || dados.length === 0) {
                divResultados.innerHTML = '<p>Nenhuma peça encontrada.</p>';
                return;
            }
            
            // Cria uma linha visual para cada peça encontrada usando as colunas do SELECT
            dados.forEach(peca => {
                // Transforma o valor numérico em formato de moeda (R$)
                const precoFormatado = parseFloat(peca.preco_unitario).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                const itemHTML = `
                    <div class="peca-item">
                        <strong>${peca.nome_peca}</strong>
                        <span>${precoFormatado}</span>
                    </div>
                `;
                divResultados.innerHTML += itemHTML;
            });
        })
        .catch(erro => {
            console.error('Erro:', erro);
            divResultados.innerHTML = '<p>Ocorreu um erro ao buscar os dados.</p>';
        });
}</code></pre>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 6: SIMULADOR INTERATIVO AO VIVO
     ========================================== -->
<section id="simulador-busca-tempo-real" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg>
        </div>
        <div>
            <h2 class="section-title">6. Laboratório Prático: Simulador Interativo ao Vivo</h2>
            <div class="section-subtitle">Teste o motor de busca completo funcionando agora mesmo diretamente na página</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Abaixo você pode experimentar a aplicação real funcionando em tempo real. Digite qualquer termo (ex: <code>Pistão</code>, <code>Freio</code>, <code>Disco</code>, <code>Embreagem</code> ou <code>85</code>) para observar a consulta SQL sendo executada e os resultados retornando imediatamente:
        </p>

        <!-- WIDGET EMBUTIDO DO SISTEMA DE BUSCA -->
        <div style="background: #ffffff; border: 2px solid #38bdf8; border-radius: 12px; padding: 24px; box-shadow: 0 8px 24px rgba(2, 132, 199, 0.08); margin: 20px 0; max-width: 650px; margin-left: auto; margin-right: auto;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; border-bottom: 1px solid #e2e8f0; padding-bottom: 12px;">
                <div>
                    <h3 style="margin: 0; font-size: 18px; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        AutoMetal Brasil • Busca de Peças
                    </h3>
                    <div style="font-size: 12px; color: #64748b; margin-top: 2px;">Motor DQL em SQL Puro (Método A) com Fetch API</div>
                </div>
                <span style="background: #dcfce7; color: #166534; font-size: 11px; font-weight: 800; padding: 3px 8px; border-radius: 6px;">🟢 API ONLINE</span>
            </div>

            <div style="display: flex; gap: 10px; margin-bottom: 18px;">
                <input type="text" id="simuladorCampoBusca" placeholder="Digite o nome da peça (ex: Disco, Freio, Pistão)..." style="flex: 1; padding: 12px 14px; border: 1.5px solid #cbd5e1; border-radius: 6px; font-size: 14.5px; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#0284c7';" onblur="this.style.borderColor='#cbd5e1';" onkeydown="if(event.key==='Enter') executarSimulacaoBusca();">
                <button type="button" onclick="executarSimulacaoBusca()" style="background: #0284c7; color: #ffffff; border: none; border-radius: 6px; padding: 12px 22px; font-weight: 700; font-size: 14px; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; transition: background 0.2s;" onmouseover="this.style.background='#0369a1';" onmouseout="this.style.background='#0284c7';">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    Buscar
                </button>
            </div>

            <!-- TAGS DE ATALHO RÁPIDO -->
            <div style="display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 16px; align-items: center;">
                <span style="font-size: 12px; color: #64748b; font-weight: 600;">Exemplos rápidos:</span>
                <button type="button" onclick="document.getElementById('simuladorCampoBusca').value='Freio'; executarSimulacaoBusca();" style="background: #f1f5f9; border: 1px solid #cbd5e1; border-radius: 4px; padding: 2px 8px; font-size: 11.5px; cursor: pointer; color: #334155;">Freio</button>
                <button type="button" onclick="document.getElementById('simuladorCampoBusca').value='Disco'; executarSimulacaoBusca();" style="background: #f1f5f9; border: 1px solid #cbd5e1; border-radius: 4px; padding: 2px 8px; font-size: 11.5px; cursor: pointer; color: #334155;">Disco</button>
                <button type="button" onclick="document.getElementById('simuladorCampoBusca').value='Pistão'; executarSimulacaoBusca();" style="background: #f1f5f9; border: 1px solid #cbd5e1; border-radius: 4px; padding: 2px 8px; font-size: 11.5px; cursor: pointer; color: #334155;">Pistão</button>
                <button type="button" onclick="document.getElementById('simuladorCampoBusca').value='Embreagem'; executarSimulacaoBusca();" style="background: #f1f5f9; border: 1px solid #cbd5e1; border-radius: 4px; padding: 2px 8px; font-size: 11.5px; cursor: pointer; color: #334155;">Embreagem</button>
                <button type="button" onclick="document.getElementById('simuladorCampoBusca').value=''; executarSimulacaoBusca();" style="background: #e0f2fe; border: 1px solid #bae6fd; border-radius: 4px; padding: 2px 8px; font-size: 11.5px; cursor: pointer; color: #0369a1; font-weight: 600;">Listar Todos</button>
            </div>

            <!-- CONTAINER DE RESULTADOS -->
            <div id="simuladorResultados" style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px; background: #f8fafc; min-height: 120px;">
                <p style="color: #64748b; font-size: 13px; margin: 0; text-align: center; padding: 30px 0;">
                    Digite um termo acima ou clique em <strong>"Listar Todos"</strong> para testar a busca.
                </p>
            </div>

            <div style="margin-top: 14px; display: flex; align-items: center; justify-content: space-between; font-size: 11.5px; color: #64748b;">
                <span>⚡ Consulta executada via <code>public/api/busca.php?q=...</code></span>
                <a href="../busca_pecas/index.html" target="_blank" style="color: #0284c7; text-decoration: none; font-weight: 700; display: inline-flex; align-items: center; gap: 4px;">
                    <span>Abrir aplicação em nova aba</span>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                </a>
            </div>
        </div>

        <script>
        function executarSimulacaoBusca() {
            const campo = document.getElementById('simuladorCampoBusca');
            const termo = campo ? campo.value.trim() : '';
            const div = document.getElementById('simuladorResultados');
            if (!div) return;

            div.innerHTML = '<div style="text-align: center; padding: 25px 0; color: #0284c7; font-weight: 600; font-size: 13px;"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="animation: spin 1s linear infinite; display: inline-block; vertical-align: middle; margin-right: 6px;"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a10 10 0 0 1 10 10"></path></svg>Consultando servidor MySQL via Método A...</div>';

            fetch(`public/api/busca.php?q=${encodeURIComponent(termo)}`)
                .then(res => res.json())
                .then(dados => {
                    div.innerHTML = '';
                    if (!dados || dados.length === 0) {
                        div.innerHTML = '<div style="text-align: center; padding: 25px 0; color: #e11d48; font-weight: 600; font-size: 13.5px;">⚠️ Nenhuma peça encontrada no estoque para o termo pesquisado.</div>';
                        return;
                    }

                    let html = `<div style="font-size: 11.5px; font-weight: 700; color: #475569; margin-bottom: 8px; display: flex; justify-content: space-between;"><span>ITENS RETORNADOS (${dados.length})</span><span>ORDENAÇÃO: PREÇO ASC</span></div><div style="display: flex; flex-direction: column; gap: 6px;">`;
                    
                    dados.forEach(item => {
                        const preco = parseFloat(item.preco_unitario).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                        html += `
                            <div style="background: #ffffff; padding: 10px 14px; border-radius: 6px; border: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <span style="width: 8px; height: 8px; border-radius: 50%; background: #0284c7; display: inline-block;"></span>
                                    <strong style="color: #0f172a; font-size: 13.5px;">${item.nome_peca}</strong>
                                </div>
                                <span style="color: #059669; font-weight: 800; font-size: 14px; background: #ecfdf5; padding: 3px 8px; border-radius: 4px; border: 1px solid #a7f3d0;">${preco}</span>
                            </div>
                        `;
                    });

                    html += '</div>';
                    div.innerHTML = html;
                })
                .catch(err => {
                    console.error(err);
                    div.innerHTML = '<div style="text-align: center; padding: 25px 0; color: #e11d48;">Erro na comunicação com a API de busca.</div>';
                });
        }
        </script>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 7: ATIVIDADE PRÁTICA DO MÓDULO 6
     ========================================== -->
<section id="atividade-pratica-fullstack" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
        </div>
        <div>
            <h2 class="section-title">7. Atividade Prática: Análise e Customização do Sistema Web</h2>
            <div class="section-subtitle">Consolide seus conhecimentos da integração de Banco de Dados com aplicações web</div>
        </div>
    </div>

    <div class="theory-block">
        <div class="company-case-box">
            <div class="company-case-header">
                <span class="company-badge-pill">🏆 Missão Prática Full Stack</span>
                <h4 class="company-case-title">Caso Real: Expansão do Motor de Busca para Incluir Quantidade em Estoque</h4>
            </div>
            <p style="font-size: 13px; color: #166534; line-height: 1.55; margin: 0;">
                O setor de almoxarifado da AutoMetal Brasil solicitou que o sistema de busca, além do <strong>nome</strong> e do <strong>preço</strong>, passe a exibir também a <strong>quantidade em estoque</strong> de cada peça (ex: <em>"15 unidades"</em>).
                <br>Responda às questões conceituais e envie a alteração necessária no <code>busca.php</code> (SQL) e no <code>script.js</code> (DOM).
            </p>
        </div>

        <form class="project-submit-form" onsubmit="event.preventDefault(); alert('Parabéns! Sua atividade prática do Módulo 6 foi enviada com sucesso.');">
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    Nome Completo do Aluno:
                </label>
                <input type="text" required placeholder="Digite seu nome completo..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13.5px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    1. Explique o papel de cada uma das 4 camadas (HTML, CSS, JavaScript e PHP) no fluxo de uma consulta web:
                </label>
                <textarea rows="4" required placeholder="Explique como cada arquivo colabora no processo desde o clique até o retorno do MySQL..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;"></textarea>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    2. Por que o uso de 'prepare' e 'bindValue' no PHP é fundamental para a segurança contra SQL Injection?
                </label>
                <textarea rows="3" required placeholder="Explique sobre a separação entre comandos SQL e dados digitados pelo usuário..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;"></textarea>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                    3. Como ficaria a instrução SQL no arquivo 'busca.php' para incluir a coluna 'quantidade_estoque' no SELECT?
                </label>
                <textarea rows="3" required placeholder="SELECT nome_peca, preco_unitario, quantidade_estoque FROM peca WHERE nome_peca LIKE :termo ORDER BY preco_unitario ASC;" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-family: var(--font-mono); font-size: 12.5px;"></textarea>
            </div>

            <button type="submit" style="background: #0284c7; color: #ffffff; font-weight: 700; font-size: 13.5px; padding: 11px 24px; border-radius: 6px; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Enviar Atividade de Integração do Módulo 6
            </button>
        </form>
    </div>
</section>
