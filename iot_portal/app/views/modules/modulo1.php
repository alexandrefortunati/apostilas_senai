<div class="hero-card">
    <div class="hero-tags">
        <span class="badge-tag senai">SENAI - SP • Módulo 1</span>
        <span class="badge-tag accent">Capítulo 1: Fundamentos de IoT & IIoT</span>
        <span class="badge-tag time">Guia Teórico Auto-Instrucional</span>
    </div>
    <h1 class="hero-title"><?= htmlspecialchars($module['title']) ?></h1>
    <p class="hero-desc">
        Estudo aprofundado do conceito de <strong>Internet das Coisas (IoT)</strong>, origens históricas desde 1999 com Kevin Ashton, os <strong>4 Pilares da Arquitetura IoT</strong>, desafios de <strong>cibersegurança</strong>, diferenciação crítica entre <strong>IoT e IIoT (Indústria 4.0)</strong>, vertentes de automação (residencial, pessoal e industrial) e fundamentos essenciais de <strong>eletrônica e grandezas elétricas</strong>.
    </p>
</div>

<!-- Barra de Navegação Interna do Módulo -->
<div class="module-contents-nav-wrapper">
    <div class="contents-nav-header">
        <div class="contents-nav-title">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
            <span>Sumário de Estudos Auto-Instrucionais</span>
        </div>
        <span class="contents-nav-subtitle">Navegue pelos tópicos teóricos fundamentados no livro oficial "IOT – Internet das Coisas" do SENAI-SP:</span>
    </div>
    <div class="module-nav-bar">
        <a href="#conceito-historia" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
            1. Conceito & História
        </a>
        <a href="#pilares-arquitetura" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
            2. Os 4 Pilares da IoT
        </a>
        <a href="#seguranca-iot" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
            3. Segurança & Riscos
        </a>
        <a href="#iiot-industria" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
            4. IIoT vs IoT & Vertentes
        </a>
        <a href="#eletronica-basica" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
            5. Eletrônica & Lei de Ohm
        </a>
        <a href="#laboratorio-3d" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
            6. Modelos 3D Interativos
        </a>
        <a href="#guia-aula-pratica" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            7. Atividade em Sala de Aula
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

<!-- SEÇÃO 1: CONCEITO & HISTÓRIA -->
<section id="conceito-historia" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">1. O que é Internet das Coisas (IoT) e sua Evolução Histórica</h2>
            <div class="section-subtitle">Da máquina de refrigerante conectada de 1982 à era da hiperconectividade global (SENAI-SP, Cap. 1)</div>
        </div>
    </div>

    <div class="theory-block">
        <h3>1.1 Definição Formal</h3>
        <p>
            A <strong>Internet das Coisas (IoT - <em>Internet of Things</em>)</strong> é a infraestrutura global de comunicação que conecta objetos do mundo físico à internet e a redes privadas. Esses objetos ("coisas") possuem sensores eletrônicos, capacidade de processamento embarcado e atuadores que lhes permitem coletar, transmitir e responder a dados do ambiente em tempo real, sem necessidade direta de intervenção humana (comunicação M2M - <em>Machine-to-Machine</em>).
        </p>

        <h3>1.2 Linha do Tempo e Origens Históricas</h3>
        <div style="overflow-x: auto; margin: 16px 0;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
                <thead>
                    <tr style="background: #f1f5f9; text-align: left;">
                        <th style="padding: 10px; border: 1px solid #cbd5e1; width: 80px;">Ano</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1; width: 220px;">Marco Histórico</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1;">Impacto e Significado Tecnológico</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: bold; color: #0284c7;">1982</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">Máquina de Coca-Cola da Carnegie Mellon</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Estudantes conectaram microchaves na máquina de refrigerante via ARPANET para verificar remotamente se havia garrafas geladas disponíveis antes de ir até o corredor. É considerada o <strong>primeiro dispositivo IoT da história</strong>.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: bold; color: #0284c7;">1990</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">Torradeira IP de John Romkey</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Primeiro eletrodoméstico controlado diretamente pelo protocolo de internet TCP/IP (ligada e desligada via rede).</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: bold; color: #0284c7;">1999</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">Criação do Termo "Internet of Things"</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">O pesquisador britânico <strong>Kevin Ashton</strong>, cofundador do <em>Auto-ID Center no MIT</em>, cunhou a expressão durante uma apresentação executiva para a Procter & Gamble (P&G), propondo o uso de etiquetas RFID para conectar a cadeia logística de produtos à internet.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: bold; color: #0284c7;">2008</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">O Ponto de Virada (Cisco IBSG)</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Momento histórico em que o número de dispositivos conectados à internet superou oficialmente a população de seres humanos no planeta Terra.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: bold; color: #0284c7;">Hoje</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">Hiperconectividade, 5G e Edge AI</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Mais de 30 bilhões de dispositivos ativos, redes celulares 5G/NB-IoT, microrredes de sensores e inteligência artificial embarcada na borda (*Edge Computing*).</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- SEÇÃO 2: PILARES DA ARQUITETURA IOT -->
<section id="pilares-arquitetura" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">2. Os 4 Pilares Fundamentais da Arquitetura IoT</h2>
            <div class="section-subtitle">O fluxo completo de ponta a ponta: do sensor físico à interface gráfica do usuário</div>
        </div>
    </div>

    <div class="theory-block">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 16px; margin: 18px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #0284c7; font-size: 14px; margin-bottom: 6px;">1. Dispositivos & Coisas (Camada Física)</div>
                <p style="font-size: 12.5px; color: #475569; line-height: 1.55;">
                    Sensores (coleta de grandezas físicas: temperatura, presença, luminosidade) e Atuadores (modificação do ambiente físico: motores, relés, lâmpadas). Microcontroladores dedicados como ESP32 e Arduino.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #059669; font-size: 14px; margin-bottom: 6px;">2. Conectividade & Redes (Camada de Transporte)</div>
                <p style="font-size: 12.5px; color: #475569; line-height: 1.55;">
                    Gateways e protocolos responsáveis por trafegar os pacotes de dados. Redes locais (Wi-Fi, Bluetooth BLE, Zigbee) e redes de longa distância de baixo consumo (LoRaWAN, NB-IoT).
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #7c3aed; font-size: 14px; margin-bottom: 6px;">3. Processamento & Nuvem (Cloud / Edge)</div>
                <p style="font-size: 12.5px; color: #475569; line-height: 1.55;">
                    Servidores em nuvem e corretores de mensagens (*Brokers MQTT*), bancos de dados de séries temporais (NoSQL), motores de regras de automação e análises estatísticas.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #d97706; font-size: 14px; margin-bottom: 6px;">4. Interface com o Usuário (Aplicações)</div>
                <p style="font-size: 12.5px; color: #475569; line-height: 1.55;">
                    Painéis de controle (*Dashboards* web em HTML5/JS), aplicativos mobile (iOS/Android), assistentes de voz (Alexa/Google) e sistemas supervisórios SCADA para visualização e comando.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SEÇÃO 3: SEGURANÇA NA IOT -->
<section id="seguranca-iot" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">3. Cibersegurança em IoT: Riscos, Vulnerabilidades e Proteção</h2>
            <div class="section-subtitle">O caso da Botnet Mirai, superfícies de ataque e medidas de mitigação (SENAI-SP, Cap. 1)</div>
        </div>
    </div>

    <div class="theory-block">
        <div class="callout-box" style="border-left-color: #ef4444; background: #fff8f8;">
            <div class="callout-title" style="color: #b91c1c;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                Estudo de Caso: A Botnet Mirai (2016)
            </div>
            <p style="font-size: 13px; color: #7f1d1d; margin-top: 6px;">
                Em 2016, um malware chamado <strong>Mirai</strong> escaneou a internet global buscando câmeras de segurança IP, roteadores e gravadores DVR que utilizavam <strong>senhas padrão de fábrica</strong> (como <code>admin:admin</code> ou <code>root:123456</code>). Milhões desses dispositivos foram infectados e transformados em um exército de "robôs zumbis", disparando o maior ataque de negação de serviço (DDoS) da história e derrubando serviços gigantes como Twitter, Netflix, Spotify e GitHub por várias horas.
            </p>
        </div>

        <h3>3.1 As Principais Vulnerabilidades em Dispositivos IoT</h3>
        <ul>
            <li><strong>Credenciais Fracas ou Padrão:</strong> Equipamentos vendidos com senhas universais não alteradas pelo usuário final.</li>
            <li><strong>Comunicação em Texto Puro:</strong> Envio de leituras de sensores e comandos via HTTP/MQTT sem criptografia TLS/SSL, permitindo interceptação na rede (*Sniffing / Man-in-the-Middle*).</li>
            <li><strong>Falta de Mecanismos de Atualização Segura:</strong> Firmwares sem capacidade de atualização remota autenticada (*Secure OTA - Over-The-Air*), deixando vulnerabilidades conhecidas abertas permanentemente.</li>
            <li><strong>Portas e Serviços Desnecessários Abertos:</strong> Telnet, SSH ou servidores web desprotegidos expostos diretamente para a internet.</li>
        </ul>

        <h3>3.2 Medidas Essenciais de Mitigação e Defesa</h3>
        <ol>
            <li><strong>Criptografia em Trânsito (MQTTS / HTTPS):</strong> Utilizar túneis criptografados TLS 1.3 com certificados digitais para todo o tráfego de dados.</li>
            <li><strong>Autenticação Forte e Tokens:</strong> Nunca embutir senhas mestras; utilizar chaves de API exclusivas e autenticação mútua (mTLS).</li>
            <li><strong>Segmentação de Rede (VLANs):</strong> Isolar todos os dispositivos IoT em uma rede Wi-Fi/VLAN dedicada para visitantes, impedindo que um sensor comprometido dê acesso a computadores corporativos ou bancos de dados confidenciais.</li>
        </ol>
    </div>
</section>

<!-- SEÇÃO 4: IIOT VS IOT & VERTENTES -->
<section id="iiot-industria" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
        </div>
        <div>
            <h2 class="section-title">4. IIoT (Internet das Coisas Industrial) e Vertentes de Aplicação</h2>
            <div class="section-subtitle">A transformação da Indústria 4.0, Automação Residencial, Pessoal e Industrial</div>
        </div>
    </div>

    <div class="theory-block">
        <h3>4.1 Matriz Comparativa: IoT de Consumo vs IIoT Industrial</h3>
        <div style="overflow-x: auto; margin: 16px 0;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
                <thead>
                    <tr style="background: #f1f5f9; text-align: left;">
                        <th style="padding: 10px; border: 1px solid #cbd5e1;">Aspecto</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1; color: #0284c7;">IoT de Consumo (Smart Home / Pessoal)</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1; color: #b91c1c;">IIoT (Internet das Coisas Industrial)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 9px; border: 1px solid #e2e8f0; font-weight: bold;">Foco Principal</td>
                        <td style="padding: 9px; border: 1px solid #e2e8f0;">Conveniência, conforto, estilo de vida e entretenimento do usuário.</td>
                        <td style="padding: 9px; border: 1px solid #e2e8f0;">Otimização de processos, segurança operacional, eficiência produtiva (OEE) e redução de custos.</td>
                    </tr>
                    <tr>
                        <td style="padding: 9px; border: 1px solid #e2e8f0; font-weight: bold;">Criticidade & Falha</td>
                        <td style="padding: 9px; border: 1px solid #e2e8f0;"><strong>Baixa:</strong> se uma lâmpada inteligente falhar, causa apenas pequeno incômodo.</td>
                        <td style="padding: 9px; border: 1px solid #e2e8f0;"><strong>Crítica:</strong> falhas podem causar paralisação de fábricas, perdas financeiras milionárias ou riscos à vida de operários.</td>
                    </tr>
                    <tr>
                        <td style="padding: 9px; border: 1px solid #e2e8f0; font-weight: bold;">Latência & Tempo Real</td>
                        <td style="padding: 9px; border: 1px solid #e2e8f0;">Segundos ou centenas de milissegundos são perfeitamente aceitáveis.</td>
                        <td style="padding: 9px; border: 1px solid #e2e8f0;">Exige <strong>tempo real estrito (determinismo)</strong> na faixa de milissegundos para paradas de emergência.</td>
                    </tr>
                    <tr>
                        <td style="padding: 9px; border: 1px solid #e2e8f0; font-weight: bold;">Ambiente Operacional</td>
                        <td style="padding: 9px; border: 1px solid #e2e8f0;">Ambientes climatizados, residenciais ou de escritório.</td>
                        <td style="padding: 9px; border: 1px solid #e2e8f0;">Chão de fábrica agressivo: altas temperaturas, vibração mecânica contínua, poeira e forte interferência eletromagnética (EMI).</td>
                    </tr>
                    <tr>
                        <td style="padding: 9px; border: 1px solid #e2e8f0; font-weight: bold;">Protocolos Típicos</td>
                        <td style="padding: 9px; border: 1px solid #e2e8f0;">Wi-Fi doméstico, Bluetooth BLE, Zigbee, MQTT padrão.</td>
                        <td style="padding: 9px; border: 1px solid #e2e8f0;">OPC UA, Modbus TCP/RTU, PROFINET, MQTT-SN, EtherCAT.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3>4.2 As Três Grandes Vertentes de Aplicação</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px; margin: 18px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #0284c7; font-size: 14px; margin-bottom: 6px;">1. Automação Residencial (Smart Home)</div>
                <p style="font-size: 12.5px; color: #475569; line-height: 1.55;">
                    Iluminação inteligente adaptativa, climatização automática baseada em ocupação, fechaduras inteligentes com biometria, sensores de vazamento de gás/água e assistentes de voz integrados.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #059669; font-size: 14px; margin-bottom: 6px;">2. Automação Pessoal (Wearables & Saúde)</div>
                <p style="font-size: 12.5px; color: #475569; line-height: 1.55;">
                    Smartwatches, pulseiras fitness, monitoramento contínuo de eletrocardiograma (ECG), oxigenação sanguínea (SpO2), alerta automático de queda de idosos e roupas esportivas inteligentes.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #7c3aed; font-size: 14px; margin-bottom: 6px;">3. Automação Industrial (Manutenção Preditiva)</div>
                <p style="font-size: 12.5px; color: #475569; line-height: 1.55;">
                    Gêmeos Digitais (<em>Digital Twins</em>), sensores de vibração em rolamentos de motores para prever falhas antes que ocorram, rastreamento de frotas por GPS e telemetria energética fabril.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SEÇÃO 5: ELETRÔNICA & LEI DE OHM -->
<section id="eletronica-basica" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
        </div>
        <div>
            <h2 class="section-title">5. Fundamentos de Eletrônica e a Lei de Ohm</h2>
            <div class="section-subtitle">Grandezas elétricas, cálculo de resistores e funcionamento da protoboard</div>
        </div>
    </div>

    <div class="theory-block">
        <h3>5.1 As 4 Grandezas Elétricas Fundamentais (Analogia Hidráulica)</h3>
        <p>
            Para compreender circuitos eletrônicos, imagine uma tubulação de água:
        </p>
        <ul>
            <li><strong>Tensão ($V$, em Volts):</strong> É a "pressão" da água que força os elétrons a se moverem. No Arduino Uno usamos <strong>5.0V</strong>; no ESP32 e Raspberry Pi usamos <strong>3.3V</strong>.</li>
            <li><strong>Corrente ($I$, em Ampères / Miliampères - mA):</strong> É a quantidade/vazão de elétrons fluindo por segundo. 1 A = 1000 mA. Um LED consome cerca de 20 mA.</li>
            <li><strong>Resistência ($R$, em Ohms - $\Omega$):</strong> É o "estrangulamento" do cano que restringe a passagem da corrente. Componente: <strong>Resistor</strong>.</li>
            <li><strong>Potência ($P$, em Watts - W):</strong> Energia transformada ou consumida por segundo ($P = V \times I$).</li>
        </ul>

        <div class="callout-box">
            <div class="callout-title" style="color: #0284c7;">
                Cálculo Didático: Por que o LED queima sem resistor? (1ª Lei de Ohm: $V = R \times I$)
            </div>
            <p style="font-size: 13.5px; margin-top: 6px; color: var(--text-secondary);">
                Um LED vermelho comum funciona com tensão de <strong>2.0V</strong> e corrente máxima segura de <strong>20 mA (0,02 A)</strong>. Ao conectá-lo na porta de <strong>5.0V</strong> do Arduino:<br>
                1. A tensão que precisa ser absorvida pelo resistor é: $V_R = 5{,}0\,\text{V} - 2{,}0\,\text{V} = 3{,}0\,\text{V}$.<br>
                2. Pela Lei de Ohm ($R = V / I$): $R = \frac{3{,}0\,\text{V}}{0{,}02\,\text{A}} = 150\,\Omega$.<br>
                3. Adotamos comercialmente o valor de <strong>220 $\Omega$ ou 330 $\Omega$</strong> para segurança e durabilidade do componente.
            </p>
        </div>

        <h3>5.2 Como Funciona a Protoboard (Matriz de Contatos)</h3>
        <p>
            A <strong>Protoboard</strong> permite montar circuitos eletrônicos de teste sem necessidade de solda:
        </p>
        <ul>
            <li><strong>Barramentos Laterais de Alimentação (+ e -):</strong> As duas colunas externas verticais são interligadas de cima a baixo no sentido longitudinal. O barramento vermelho (+) recebe o polo positivo (5V/3.3V) e o azul/preto (-) recebe o GND (terra).</li>
            <li><strong>Trilhas Centrais de Conexão (Nós):</strong> As linhas horizontais centrais (letras A-B-C-D-E e F-G-H-I-J) são conectadas <strong>horizontalmente</strong> em grupos de 5 furos. O sulco central isola o lado esquerdo do lado direito, permitindo encaixar circuitos integrados e microcontroladores.</li>
        </ul>
    </div>
</section>

<!-- SEÇÃO 6: LABORATÓRIO 3D INTERATIVO (THREE.JS) -->
<section id="laboratorio-3d" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #e0f2fe; color: #0284c7;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
        </div>
        <div>
            <h2 class="section-title">6. Laboratório 3D Interativo: Montagem Passo a Passo de Circuitos</h2>
            <div class="section-subtitle">Modelagem 3D tridimensional com órbita 360°, fiação Bézier, Arduino Uno R3 e sensores virtuais</div>
        </div>
    </div>

    <!-- Container dos Modelos 3D Three.js -->
    <div id="three-step-circuit-viewer" data-module="1"></div>
</section>

<!-- SEÇÃO 7: GUIA DA ATIVIDADE EM SALA DE AULA -->
<section id="guia-aula-pratica" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #fee2e2; color: #b91c1c;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">7. Roteiro e Avaliação da Atividade em Sala de Aula</h2>
            <div class="section-subtitle">Orientações para o desenvolvimento do projeto prático em laboratório com o docente</div>
        </div>
    </div>

    <div class="theory-block">
        <div class="callout-box" style="border-left-color: #b91c1c; background: #fff5f5;">
            <div class="callout-title" style="color: #b91c1c;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                Aviso Pedagógico: Execução Prática Presencial
            </div>
            <p style="font-size: 13.5px; color: #475569; margin-top: 6px;">
                Os conceitos teóricos de IoT, arquitetura e eletricidade foram fundamentados nas seções acima. A <strong>montagem prática do circuito na protoboard física e no simulador Tinkercad</strong>, assim como a avaliação formativa, serão realizadas na bancada de aula com o professor.
            </p>
        </div>

        <h3>Briefing da Atividade: <?= htmlspecialchars($module['project_name']) ?></h3>
        <p>
            Cada bancada receberá um kit de componentes para implementar um <strong>Poste de Iluminação Pública Inteligente</strong> que acende automaticamente quando a luminosidade natural diminui:
        </p>
        <ul style="font-size: 13.5px; line-height: 1.7;">
            <li><strong>Componentes de Bancada:</strong> 1 Arduino Uno R3, 1 Protoboard, 1 Sensor LDR, 1 Resistor de 10k$\Omega$ (divisor de tensão), 1 LED de alto brilho, 1 Resistor de 220$\Omega$ e jumpers.</li>
            <li><strong>Lógica de Programação:</strong> Ler a porta analógica A0, calibrar o limiar de escuridão e acionar digitalmente a porta D13 com feedback no Monitor Serial.</li>
            <li><strong>Etapa 1 (Simulador):</strong> Prototipar e validar a montagem no Autodesk Tinkercad Circuits.</li>
            <li><strong>Etapa 2 (Hardware Real):</strong> Montar fisicamente na bancada, realizar testes elétricos de continuidade e apresentar o funcionamento ao professor.</li>
        </ul>

        <h3>Critérios de Avaliação Presencial (Rubrica SENAI)</h3>
        <div style="overflow-x: auto; margin: 16px 0;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
                <thead>
                    <tr style="background: #f1f5f9; text-align: left;">
                        <th style="padding: 10px; border: 1px solid #cbd5e1;">Capacidade Técnica</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1;">Evidência de Desempenho Prático</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1; width: 100px;">Peso</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">CT1 - Aplicações de IoT e IIoT</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Diferenciação correta dos requisitos de confiabilidade, segurança e latência entre aplicações residenciais e industriais.</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; text-align: center; font-weight: bold;">30%</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">CT2 - Seleção de Hardware e Montagem</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Dimensionamento correto do resistor limitador pela Lei de Ohm e montagem correta na matriz da protoboard sem curto-circuitos.</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; text-align: center; font-weight: bold;">40%</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">CT3 - Ambiente de Desenvolvimento</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Compilação e upload funcional do código via Arduino IDE e monitoramento serial dos valores analógicos do LDR.</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; text-align: center; font-weight: bold;">30%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
