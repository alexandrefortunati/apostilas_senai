<div class="hero-card">
    <div class="hero-tags">
        <span class="badge-tag senai">SENAI - SP • Módulo 4</span>
        <span class="badge-tag accent">Capítulo 4: Dashboards & Interfaces Interativas</span>
        <span class="badge-tag time">Guia Teórico Auto-Instrucional</span>
    </div>
    <h1 class="hero-title"><?= htmlspecialchars($module['title']) ?></h1>
    <p class="hero-desc">
        Desenvolvimento de <strong>Interfaces Homem-Máquina (IHM)</strong> e painéis de controle (*Dashboards*) web interativos para IoT: estruturação semântica com <strong>HTML5</strong>, estilização responsiva com <strong>CSS3 Grid/Flexbox</strong>, programação assíncrona com <strong>JavaScript ES6+ (Fetch, WebSockets e manipulação de DOM)</strong>, bibliotecas gráficas especializadas (<strong>Chart.js e Leaflet.js</strong>), programação em fluxos com <strong>Node-RED</strong> e algoritmos de tratamento de ruído (<strong>Filtro de Média Móvel</strong>).
    </p>
</div>

<!-- Barra de Navegação Interna do Módulo -->
<div class="module-contents-nav-wrapper">
    <div class="contents-nav-header">
        <div class="contents-nav-title">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
            <span>Sumário de Estudos Auto-Instrucionais</span>
        </div>
        <span class="contents-nav-subtitle">Navegue pelos tópicos teóricos fundamentados no Capítulo 4 da apostila oficial do SENAI-SP:</span>
    </div>
    <div class="module-nav-bar">
        <a href="#linguagens-web-iot" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
            1. HTML5, CSS3 & JavaScript IoT
        </a>
        <a href="#bibliotecas-chart-leaflet" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
            2. Chart.js, Mapas & Node-RED
        </a>
        <a href="#controle-feedbacks" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
            3. Controle Bidirecional & Filtros
        </a>
        <a href="#simulador-bancada" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
            4. Simulador Interativo
        </a>
        <a href="#guia-aula-pratica" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            5. Atividade em Sala de Aula
        </a>
    </div>
</div>

<!-- Cronograma Curricular -->
<div class="schedule-grid">
    <?php foreach ($module['lessons'] as $lesson): ?>
    <div class="lesson-card">
        <div class="lesson-header">
            <span class="lesson-pill">Aula <?= $lesson['number'] ?></span>
            <span class="lesson-time"><?= $lesson['duration'] ?></span>
        </div>
        <h4 class="lesson-title"><?= htmlspecialchars($lesson['title']) ?></h4>
        <p class="lesson-desc"><?= htmlspecialchars($lesson['desc']) ?></p>
    </div>
    <?php endforeach; ?>
</div>

<!-- SEÇÃO 1: LINGUAGENS WEB PARA IOT -->
<section id="linguagens-web-iot" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">1. Tecnologias Web na Construção de Interfaces IoT</h2>
            <div class="section-subtitle">HTML5 Semântico, CSS3 Responsivo e JavaScript Assíncrono com WebSockets (SENAI-SP, Cap. 4)</div>
        </div>
    </div>

    <div class="theory-block">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px; margin: 16px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #0284c7; font-size: 14px; margin-bottom: 4px;">HTML5 Estrutural Semântico</div>
                <p style="font-size: 12.5px; color: #475569;">
                    Estrutura modular de <em>Cards</em> de telemetria, medidores tipo *Gauge*, botões de alternância (*Toggle Switches*) e badges de status de conectividade (Online/Offline).
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #059669; font-size: 14px; margin-bottom: 4px;">CSS3 Grid & Flexbox</div>
                <p style="font-size: 12.5px; color: #475569;">
                    Design adaptativo que se redimensiona perfeitamente de monitores industriais a telas de smartphones, com temas de alto contraste (Dark/Light Mode) e animações CSS para pulsos de rede.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #7c3aed; font-size: 14px; margin-bottom: 4px;">JavaScript ES6+ Assíncrono</div>
                <p style="font-size: 12.5px; color: #475569;">
                    Atualização dinâmica do DOM em tempo real através da <strong>Fetch API</strong> e <strong>WebSockets</strong> full-duplex de baixa latência, sem jamais exigir que o operador recarregue a página (F5).
                </p>
            </div>
        </div>

        <div class="callout-box">
            <div class="callout-title" style="color: #0284c7;">
                WebSockets vs HTTP Polling em Dashboards IoT
            </div>
            <p style="font-size: 13px; margin: 0; color: var(--text-secondary);">
                • <strong>HTTP Polling (Tradicional):</strong> O navegador pergunta repetidamente a cada segundo: <em>"Tem novo dado de sensor?"</em>. Isso gera milhares de requisições inúteis, alto tráfego e latência elevada.<br>
                • <strong>WebSockets (Padrão IoT):</strong> Estabelece um canal TCP bidirecional e permanente com o servidor. Assim que o microcontrolador publica uma nova leitura, o servidor "empurra" o dado instantaneamente para a tela em menos de 10 milissegundos.
            </p>
        </div>
    </div>
</section>

<!-- SEÇÃO 2: CHART.JS, MAPAS & NODE-RED -->
<section id="bibliotecas-chart-leaflet" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">2. Bibliotecas Especializadas: Chart.js, Leaflet e Node-RED</h2>
            <div class="section-subtitle">Renderização de séries temporais de dados, geolocalização e programação em fluxos</div>
        </div>
    </div>

    <div class="theory-block">
        <h3>2.1 Visualização de Séries Temporais com Chart.js</h3>
        <p>
            O <strong>Chart.js</strong> é a biblioteca padrão de mercado para renderização de gráficos dinâmicos de alto desempenho sobre o elemento <code>&lt;canvas&gt;</code> do HTML5. Ele permite atualizar gráficos em tempo real adicionando novos pontos de telemetria com o método <code>chart.update()</code>:
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Implementação JavaScript • Gráfico de Linha em Tempo Real com Chart.js</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar Script</button>
            </div>
            <pre><code>// Inicialização do Gráfico de Séries Temporais
const ctx = document.getElementById('graficoTemperatura').getContext('2d');
const graficoTemp = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [], // Horários das leituras
        datasets: [{
            label: 'Temperatura (°C)',
            data: [],
            borderColor: '#0284c7',
            backgroundColor: 'rgba(2, 132, 199, 0.1)',
            fill: true,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: { min: 10, max: 45 }
        }
    }
});

// Função chamada a cada nova mensagem MQTT/WebSocket recebida
function adicionarLeituraSensor(horario, valorTemperatura) {
    if (graficoTemp.data.labels.length > 20) {
        graficoTemp.data.labels.shift(); // Remove a leitura mais antiga (janela deslizante)
        graficoTemp.data.datasets[0].data.shift();
    }
    graficoTemp.data.labels.push(horario);
    graficoTemp.data.datasets[0].data.push(valorTemperatura);
    graficoTemp.update(); // Redesenha suavemente o gráfico
}</code></pre>
        </div>

        <h3>2.2 Programação Visual em Fluxos com Node-RED</h3>
        <p>
            Desenvolvido pela IBM, o <strong>Node-RED</strong> é uma ferramenta de programação visual baseada em fluxos (<em>Flow-Based Programming</em>) para integração rápida de hardware IoT, protocolos MQTT/HTTP e dashboards gráficos:
        </p>
        <ul>
            <li><strong>Nós de Entrada (*Input Nodes*):</strong> Recebem dados de tópicos MQTT, requisições HTTP, portas seriais ou timers.</li>
            <li><strong>Nós de Função (*Function Nodes*):</strong> Processam dados escrevendo código JavaScript simples para formatar payloads ou disparar alertas.</li>
            <li><strong>Nós de Interface (*Dashboard Nodes*):</strong> Módulos como <code>ui_gauge</code>, <code>ui_chart</code> e <code>ui_switch</code> geram painéis web visuais automaticamente sem necessidade de escrever HTML/CSS do zero.</li>
        </ul>
    </div>
</section>

<!-- SEÇÃO 3: CONTROLE BIDIRECIONAL & FILTROS -->
<section id="controle-feedbacks" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">3. Controle Bidirecional, Feedbacks e Tratamento de Ruído</h2>
            <div class="section-subtitle">Confirmação de estado e algoritmo de Filtro de Média Móvel para sensores (SENAI-SP, Cap. 4)</div>
        </div>
    </div>

    <div class="theory-block">
        <h3>3.1 O Princípio da Confirmação Bidirecional de Estado</h3>
        <p>
            Em sistemas de controle de missão crítica, <strong>o botão na tela nunca deve mudar de cor apenas porque o operador clicou nele</strong>. O botão deve exibir um estado de <em>"Aguardando confirmação..."</em> e somente mudar para <em>"Ligado"</em> após o microcontrolador físico executar o comando no relé e publicar uma mensagem de retorno de confirmação de status (<em>State Acknowledgment</em>).
        </p>

        <h3>3.2 Eliminação de Ruído com Filtro de Média Móvel (Moving Average)</h3>
        <p>
            Sensores físicos sofrem com ruídos eletromagnéticos que causam picos espúrios (ex: uma leitura repentina de 80°C em uma sala de 25°C). O <strong>Filtro de Média Móvel</strong> suaviza essas oscilações calculando a média aritmética de uma janela das últimas $N$ amostras:
        </p>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Algoritmo de Média Móvel em JavaScript</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar Filtro</button>
            </div>
            <pre><code>class FiltroMediaMovel {
    constructor(tamanhoJanela = 5) {
        this.tamanho = tamanhoJanela;
        this.amostras = [];
    }

    filtrar(novoValor) {
        this.amostras.push(novoValor);
        if (this.amostras.length > this.tamanho) {
            this.amostras.shift(); // Remove a amostra mais antiga
        }
        
        const soma = this.amostras.reduce((acc, val) => acc + val, 0);
        return parseFloat((soma / this.amostras.length).toFixed(2));
    }
}

// Utilização no recebimento de dados do sensor:
const filtroTemp = new FiltroMediaMovel(5);
const tempSuavizada = filtroTemp.filtrar(leituraBruta);</code></pre>
        </div>
    </div>
</section>

<!-- SEÇÃO 4: SIMULADOR INTERATIVO DE BANCADA -->
<section id="simulador-bancada" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #e0f2fe; color: #0284c7;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
        </div>
        <div>
            <h2 class="section-title">4. Simulador Interativo: Montagem e Testes Passo a Passo</h2>
            <div class="section-subtitle">Simulação animada de circuitos, pinagem detalhada, fiação e componentes interativos</div>
        </div>
    </div>

    <!-- Container do Simulador Interativo -->
    <div id="prototype-step-player" data-module="4"></div>
</section>

<!-- SEÇÃO 5: GUIA DA ATIVIDADE EM SALA DE AULA -->
<section id="guia-aula-pratica" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #fee2e2; color: #b91c1c;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">5. Roteiro e Avaliação da Atividade em Sala de Aula</h2>
            <div class="section-subtitle">Orientações para o desenvolvimento do projeto prático em laboratório com o docente</div>
        </div>
    </div>

    <div class="theory-block">
        <div class="callout-box" style="border-left-color: #b91c1c; background: #fff5f5;">
            <div class="callout-title" style="color: #b91c1c;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                Aviso Pedagógico: Avaliação Final Integrada em Sala de Aula
            </div>
            <p style="font-size: 13.5px; color: #475569; margin-top: 6px;">
                Esta unidade curricular encerra-se com a entrega de um <strong>Projeto Integrador Completo</strong> de ponta a ponta. A interface web interativa desenvolvida pelo aluno será conectada ao microcontrolador na bancada física durante a aula presencial.
            </p>
        </div>

        <h3>Briefing do Projeto Integrador: <?= htmlspecialchars($module['project_name']) ?></h3>
        <p>
            Desenvolver um <strong>Dashboard Web Profissional de Telemetria e Comando para Smart Building</strong>:
        </p>
        <ul style="font-size: 13.5px; line-height: 1.7;">
            <li><strong>Interface Gráfica:</strong> Desenvolver um painel moderno com HTML5/CSS3/JavaScript exibindo:
                <br>• Cards de telemetria com cores semafóricas (Verde / Amarelo / Vermelho).
                <br>• Gráfico de linha interativo em tempo real via <strong>Chart.js</strong>.
                <br>• Interruptores (*Toggle Switches*) e seletores deslizantes (*Sliders PWM*) para acionamento de atuadores.
            </li>
            <li><strong>Comunicação Bidirecional:</strong> Conectar a interface web ao Broker MQTT via WebSockets (utilizando a biblioteca <code>mqtt.js</code> ou <code>paho-mqtt</code>).</li>
            <li><strong>Validação de Hardware:</strong> Ao clicar no botão da tela, o ESP32 deve acionar fisicamente o relé e devolver o feedback de status para a interface.</li>
        </ul>

        <h3>Critérios de Avaliação Presencial (Rubrica SENAI)</h3>
        <div style="overflow-x: auto; margin: 16px 0;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
                <thead>
                    <tr style="background: #f1f5f9; text-align: left;">
                        <th style="padding: 10px; border: 1px solid #cbd5e1;">Capacidade Técnica</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1;">Evidência de Desempenho no Laboratório</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1; width: 100px;">Peso</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">CT6 - Desenvolvimento de Interfaces Gráficas</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Construção de dashboard responsivo com visualização dinâmica de telemetria e gráficos com Chart.js.</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; text-align: center; font-weight: bold;">40%</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">CT4 / CT6 - Controle Bidirecional & WebSockets</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Comunicação assíncrona funcional em tempo real com confirmação bidirecional do estado de atuadores.</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; text-align: center; font-weight: bold;">35%</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">CT2 - Tratamento de Erros e Filtros</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Implementação de tratamento de desconexão, detecção de nó offline e algoritmo de média móvel.</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; text-align: center; font-weight: bold;">25%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
