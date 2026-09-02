<div class="hero-card">
    <div class="hero-tags">
        <span class="badge-tag senai">SENAI - SP • Módulo 3</span>
        <span class="badge-tag accent">Capítulo 3: Protocolos & Conectividade Nuvem</span>
        <span class="badge-tag time">Guia Teórico Auto-Instrucional</span>
    </div>
    <h1 class="hero-title"><?= htmlspecialchars($module['title']) ?></h1>
    <p class="hero-desc">
        A espinha dorsal da conectividade na Internet das Coisas: estudo comparativo da pilha de protocolos, redes locais em malha (<strong>BLE e Zigbee Mesh</strong>), redes de longo alcance e baixo consumo (<strong>LoRaWAN e redes celulares NB-IoT / LTE-M</strong>), arquitetura orientada a mensagens com <strong>MQTT (Broker, Tópicos, QoS 0/1/2 e LWT)</strong> versus <strong>HTTP/REST</strong> e integração com plataformas de nuvem (<strong>ThingSpeak, Adafruit IO e Firebase</strong>).
    </p>
</div>

<!-- Barra de Navegação Interna do Módulo -->
<div class="module-contents-nav-wrapper">
    <div class="contents-nav-header">
        <div class="contents-nav-title">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
            <span>Sumário de Estudos Auto-Instrucionais</span>
        </div>
        <span class="contents-nav-subtitle">Navegue pelos tópicos teóricos fundamentados no Capítulo 3 da apostila oficial do SENAI-SP:</span>
    </div>
    <div class="module-nav-bar">
        <a href="#pilha-protocolos" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
            1. Pilha de Protocolos IoT
        </a>
        <a href="#redes-locais-lpwan" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
            2. BLE, Zigbee, LoRa & NB-IoT
        </a>
        <a href="#protocolo-mqtt" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
            3. Protocolo MQTT em Detalhes
        </a>
        <a href="#nuvem-telemetria" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>
            4. Plataformas em Nuvem
        </a>
        <a href="#simulador-bancada" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
            5. Simulador Interativo
        </a>
        <a href="#guia-aula-pratica" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            6. Atividade em Sala de Aula
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

<!-- SEÇÃO 1: PILHA DE PROTOCOLOS IOT -->
<section id="pilha-protocolos" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">1. A Pilha de Protocolos de Comunicação em IoT</h2>
            <div class="section-subtitle">Comparação entre o modelo OSI, o modelo TCP/IP e os requisitos de baixo consumo (SENAI-SP, Cap. 3)</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Enquanto a internet tradicional foi projetada para computadores com energia abundante e banda larga contínua, a <strong>Internet das Coisas</strong> exige uma pilha de conectividade adaptada para dispositivos com <strong>recursos severamente restritos</strong> (pouca memória RAM, processadores lentos e operação por baterias).
        </p>

        <div style="overflow-x: auto; margin: 16px 0;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
                <thead>
                    <tr style="background: #f1f5f9; text-align: left;">
                        <th style="padding: 10px; border: 1px solid #cbd5e1;">Camada</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1; color: #0284c7;">Internet Convencional (Web)</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1; color: #059669;">Internet das Coisas (IoT)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0; font-weight: bold;">Aplicação</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">HTTP / HTTPS (Cliente-Servidor)</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;"><strong>MQTT</strong> (Publish/Subscribe), CoAP, HTTP/REST</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0; font-weight: bold;">Transporte</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">TCP, UDP</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">TCP (para MQTT), UDP (para CoAP), DTLS</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0; font-weight: bold;">Rede / Roteamento</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">IPv4, IPv6</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">IPv6 sobre redes de baixo consumo (<strong>6LoWPAN</strong>)</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0; font-weight: bold;">Enlace e Física</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Ethernet (802.3), Wi-Fi (802.11 a/b/g/n/ac)</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;"><strong>BLE, Zigbee (802.15.4), LoRa/LoRaWAN, NB-IoT, LTE-M</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- SEÇÃO 2: REDES LOCAIS & LPWAN -->
<section id="redes-locais-lpwan" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">2. Redes Locais (BLE, Zigbee) e Longo Alcance (LoRaWAN, NB-IoT)</h2>
            <div class="section-subtitle">Topologias de rede, alcance físico, taxas de transferência e consumo energético (SENAI-SP, Cap. 3)</div>
        </div>
    </div>

    <div class="theory-block">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px; margin: 16px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #0284c7; font-size: 14px; margin-bottom: 4px;">Bluetooth Low Energy (BLE)</div>
                <p style="font-size: 12.5px; color: #475569;">
                    <strong>Alcance:</strong> 10 a 30 metros.
                    <br><strong>Arquitetura:</strong> Baseada no perfil GATT (Generic Attribute Profile) com estrutura hierárquica de <em>Services</em> e <em>Characteristics</em> identificados por UUIDs.
                    <br><strong>Aplicação:</strong> Dispositivos vestíveis (smartwatches, fones, sensores cardíacos) operando meses com baterias tipo moeda (CR2032).
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #059669; font-size: 14px; margin-bottom: 4px;">Zigbee (IEEE 802.15.4)</div>
                <p style="font-size: 12.5px; color: #475569;">
                    <strong>Alcance:</strong> 20 a 100 metros por salto.
                    <br><strong>Topologia:</strong> Rede em Malha (<em>Mesh Network</em>) com 3 papéis: Coordenador (ZC), Roteadores (ZR) e Dispositivos Finais (ZED). Possui <strong>auto-regeneração de rotas (Self-Healing)</strong>: se um nó queimar, os dados encontram outro caminho automaticamente.
                    <br><strong>Aplicação:</strong> Automação residencial e predial (lâmpadas Philips Hue, sensores de presença).
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #7c3aed; font-size: 14px; margin-bottom: 4px;">LoRa / LoRaWAN (LPWAN)</div>
                <p style="font-size: 12.5px; color: #475569;">
                    <strong>Alcance:</strong> 5 km a 15 km em linha de visada.
                    <br><strong>Tecnologia:</strong> Modulação por espalhamento espectral (Chirp Spread Spectrum - CSS) em frequências ISM (915 MHz no Brasil). Arquitetura em estrela de estrelas (Nós &rarr; Gateways &rarr; Network Server &rarr; Nuvem).
                    <br><strong>Aplicação:</strong> Smart Agriculture (fazendas, pivôs de irrigação), monitoramento de hidrômetros em cidades inteligentes.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #d97706; font-size: 14px; margin-bottom: 4px;">NB-IoT & LTE-M (Celular)</div>
                <p style="font-size: 12.5px; color: #475569;">
                    <strong>Alcance:</strong> Cobertura celular das operadoras de telecom.
                    <br><strong>Tecnologia:</strong> Opera no espectro licenciado 4G/5G com SIM Card físico ou eSIM. Possui excelente penetração em subsolos, galerias subterrâneas e edificações de concreto espesso.
                    <br><strong>Aplicação:</strong> Rastreamento de frotas e contêineres marítimos, telemetria de gás encanado e energia elétrica.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SEÇÃO 3: PROTOCOLO MQTT EM DETALHES -->
<section id="protocolo-mqtt" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">3. O Protocolo MQTT (Message Queuing Telemetry Transport)</h2>
            <div class="section-subtitle">O padrão de mensagens da IoT: Broker, Tópicos, Níveis de QoS e LWT (SENAI-SP, Cap. 3)</div>
        </div>
    </div>

    <div class="theory-block">
        <h3>3.1 Histórico e Arquitetura Publish / Subscribe</h3>
        <p>
            Criado em 1999 por <strong>Andy Stanford-Clark (IBM)</strong> e <strong>Arlen Nipper</strong> para monitorar oleodutos no deserto via conexões de satélite caríssimas, o <strong>MQTT</strong> é um protocolo binário ultraleve com cabeçalho fixo de apenas <strong>2 bytes</strong> (contra milhares de bytes do HTTP).
        </p>
        <p>
            Ele adota o padrão <strong>Publicador / Assinante (Pub/Sub)</strong> mediado por um servidor central chamado <strong>Broker MQTT</strong> (como Eclipse Mosquitto, EMQX, HiveMQ):
        </p>
        <ul>
            <li><strong>Publicador (Publisher):</strong> O sensor envia a leitura para um endereço temático chamado <em>Tópico</em> (ex: publica <code>{"temp": 26.5}</code> no tópico <code>senai/sala10/temperatura</code>).</li>
            <li><strong>Assinante (Subscriber):</strong> Aplicações ou atuadores que desejam receber esses dados "assinam" o tópico no Broker. Assim que uma mensagem chega, o Broker a repassa instantaneamente para todos os assinantes conectados.</li>
            <li><strong>Desacoplamento:</strong> O nó sensor não sabe e não precisa saber quem vai consumir seus dados, garantindo escalabilidade ilimitada.</li>
        </ul>

        <h3>3.2 Hierarquia de Tópicos e Caracteres Curinga (Wildcards)</h3>
        <p>
            Os tópicos são estruturados com barras em níveis hierárquicos: <code>predio/andar/sala/dispositivo/variavel</code>. Ao assinar, podemos usar dois caracteres coringa:
        </p>
        <div style="background: #f8fafc; border-left: 4px solid #0284c7; padding: 12px; margin: 12px 0; font-size: 13px;">
            • <code>+ (Single-Level Wildcard):</code> Substitui exatamente <strong>um nível</strong> hierárquico. Exemplo: <code>senai/+/temperatura</code> recebe leituras de temperatura de todas as salas.<br>
            • <code># (Multi-Level Wildcard):</code> Substitui <strong>todos os níveis subsequentes</strong> até o final da árvore. Exemplo: <code>senai/predioA/#</code> recebe absolutamente tudo que for publicado dentro do Prédio A.
        </div>

        <h3>3.3 Níveis de Qualidade de Serviço (QoS)</h3>
        <div style="overflow-x: auto; margin: 16px 0;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
                <thead>
                    <tr style="background: #f1f5f9; text-align: left;">
                        <th style="padding: 10px; border: 1px solid #cbd5e1;">Nível QoS</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1;">Conceito / Garantia</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1;">Mecanismo de Comunicação</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1;">Caso de Uso Recomendado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0; font-weight: bold; color: #0284c7;">QoS 0</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">No máximo uma vez (*At most once*)</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">"Fogo e Esquece". O publicador envia o pacote sem esperar confirmação. Se houver queda de rede, a mensagem é descartada.</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Telemetria contínua periódica (temperatura a cada 5s).</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0; font-weight: bold; color: #059669;">QoS 1</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Pelo menos uma vez (*At least once*)</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">O receptor envia um pacote <code>PUBACK</code> de confirmação. Se o publicador não receber o ACK, reenvia a mensagem (pode ocorrer duplicação).</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Alertas de presença, notificações de portas abertas.</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0; font-weight: bold; color: #7c3aed;">QoS 2</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Exatamente uma vez (*Exactly once*)</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Handshake de 4 vias rigoroso (<code>PUBLISH &rarr; PUBREC &rarr; PUBREL &rarr; PUBCOMP</code>), garantindo entrega única sem perdas nem duplicatas.</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Comandos de faturamento, acionamento de máquinas críticas.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="callout-box">
            <div class="callout-title" style="color: #0284c7;">
                Recursos Avançados: Retained Messages e Last Will (LWT)
            </div>
            <p style="font-size: 13px; margin: 0; color: var(--text-secondary);">
                • <strong>Retained Message (Mensagem Retida):</strong> O Broker armazena a última mensagem válida publicada no tópico. Quando um novo cliente se conecta e assina o tópico, ele recebe imediatamente o estado atual, sem precisar esperar o sensor publicar novamente.<br>
                • <strong>Last Will and Testament (LWT - Testamento):</strong> Na conexão inicial, o sensor cadastra uma mensagem de aviso no Broker (ex: <code>{"status": "offline"}</code>). Se o dispositivo perder energia ou a conexão cair abruptamente, o Broker detecta o timeout e publica automaticamente esse testamento para avisar todos os sistemas de monitoramento.
            </p>
        </div>
    </div>
</section>

<!-- SEÇÃO 4: NUVEM & TELEMETRIA -->
<section id="nuvem-telemetria" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">4. Plataformas em Nuvem e Telemetria</h2>
            <div class="section-subtitle">ThingSpeak, Adafruit IO, Google Firebase e motores de regras em nuvem (SENAI-SP, Cap. 3)</div>
        </div>
    </div>

    <div class="theory-block">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px; margin: 16px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #0284c7; font-size: 14px; margin-bottom: 4px;">ThingSpeak (MathWorks)</div>
                <p style="font-size: 12.5px; color: #475569;">
                    Organizado em <em>Canais</em> com até 8 campos (Fields). Gera gráficos históricos automáticos e permite processamento analítico com rotinas do MATLAB para predição e estatística.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #059669; font-size: 14px; margin-bottom: 4px;">Adafruit IO</div>
                <p style="font-size: 12.5px; color: #475569;">
                    Baseado em <em>Feeds</em> de dados com suporte completo a MQTT e REST API. Oferece blocos visuais (*Dashboards* com medidores Gauge, interruptores e sliders) e criação de <em>Triggers</em> (alertas por email/webhook).
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #7c3aed; font-size: 14px; margin-bottom: 4px;">Firebase Realtime Database (Google)</div>
                <p style="font-size: 12.5px; color: #475569;">
                    Banco de dados NoSQL baseado em árvore de documentos JSON em nuvem. Possui sincronização instantânea em tempo real via WebSockets para web e mobile.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SEÇÃO 5: SIMULADOR INTERATIVO DE BANCADA -->
<section id="simulador-bancada" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #e0f2fe; color: #0284c7;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
        </div>
        <div>
            <h2 class="section-title">5. Simulador Interativo: Montagem e Testes Passo a Passo</h2>
            <div class="section-subtitle">Simulação animada de circuitos, pinagem detalhada, fiação e componentes interativos</div>
        </div>
    </div>

    <!-- Container do Simulador Interativo -->
    <div id="prototype-step-player" data-module="3"></div>
</section>

<!-- SEÇÃO 6: GUIA DA ATIVIDADE EM SALA DE AULA -->
<section id="guia-aula-pratica" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #fee2e2; color: #b91c1c;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">6. Roteiro e Avaliação da Atividade em Sala de Aula</h2>
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
                Os conceitos de protocolos de rede e MQTT foram apresentados integralmente acima. O <strong>ensaio de telemetria conectada e transmissão de pacotes MQTT para a nuvem</strong> será realizado na bancada do laboratório com orientação do docente.
            </p>
        </div>

        <h3>Briefing da Prática: <?= htmlspecialchars($module['project_name']) ?></h3>
        <p>
            Cada grupo implementará um <strong>Nó de Monitoramento Climático e Telemetria Conectado à Nuvem</strong>:
        </p>
        <ul style="font-size: 13.5px; line-height: 1.7;">
            <li><strong>Hardware:</strong> ESP32 (com Wi-Fi nativo) ou Arduino com shield de conectividade, Sensor de Temperatura/Umidade DHT11/LM35 e LED indicador de status de conexão.</li>
            <li><strong>Formatação de Dados:</strong> Empacotar as variáveis de temperatura e umidade em payload <strong>JSON estruturado</strong>: <code>{"temperatura": 25.4, "umidade": 60, "status": "normal"}</code>.</li>
            <li><strong>Transmissão:</strong> Conectar ao Broker MQTT (ex: <code>broker.hivemq.com</code> ou Adafruit IO) e publicar no tópico estruturado a cada 10 segundos com QoS 1.</li>
            <li><strong>Validação:</strong> Demonstrar a recepção dos dados no aplicativo MQTT Dash / MQTT Explorer e na nuvem para o professor.</li>
        </ul>

        <h3>Critérios de Avaliação Presencial (Rubrica SENAI)</h3>
        <div style="overflow-x: auto; margin: 16px 0;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
                <thead>
                    <tr style="background: #f1f5f9; text-align: left;">
                        <th style="padding: 10px; border: 1px solid #cbd5e1;">Capacidade Técnica</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1;">Critério de Desempenho</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1; width: 100px;">Peso</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">CT4 - Protocolos de Comunicação</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Configuração correta do cliente MQTT, definição de tópicos hierárquicos e escolha de QoS adequado.</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; text-align: center; font-weight: bold;">40%</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">CT5 - Integração em Plataforma na Nuvem</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Envio contínuo e bem-sucedido de telemetria para a plataforma em nuvem com gráficos temporais ativos.</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; text-align: center; font-weight: bold;">35%</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">CT3 - Tratamento e Formatação JSON</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Serialização correta de dados numéricos em JSON sem truncamentos ou erros de tipo primitivo.</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; text-align: center; font-weight: bold;">25%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
