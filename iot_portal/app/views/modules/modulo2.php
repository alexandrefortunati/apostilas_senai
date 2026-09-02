<div class="hero-card">
    <div class="hero-tags">
        <span class="badge-tag senai">SENAI - SP • Módulo 2</span>
        <span class="badge-tag accent">Capítulo 2: Hardware, Sensores, Atuadores & IDEs</span>
        <span class="badge-tag time">Guia Teórico Auto-Instrucional</span>
    </div>
    <h1 class="hero-title"><?= htmlspecialchars($module['title']) ?></h1>
    <p class="hero-desc">
        Seleção criteriosa de plataformas de hardware para IoT (<strong>Microcontroladores vs Microprocessadores</strong>), domínio das interfaces de entrada/saída (<strong>Digitais, Analógicas/ADC e modulação PWM</strong>), catálogo técnico aprofundado de <strong>sensores e atuadores de potência (Relés, Servos, Displays)</strong> e configuração de ambientes profissionais de desenvolvimento (<strong>Arduino IDE, PlatformIO, MicroPython e Simuladores</strong>).
    </p>
</div>

<!-- Barra de Navegação Interna do Módulo -->
<div class="module-contents-nav-wrapper">
    <div class="contents-nav-header">
        <div class="contents-nav-title">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
            <span>Sumário de Estudos Auto-Instrucionais</span>
        </div>
        <span class="contents-nav-subtitle">Navegue pelos tópicos teóricos fundamentados no Capítulo 2 da apostila oficial do SENAI-SP:</span>
    </div>
    <div class="module-nav-bar">
        <a href="#mcu-vs-mpu" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
            1. MCU vs MPU (Hardware)
        </a>
        <a href="#interfaces-io" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
            2. Interfaces I/O, ADC & PWM
        </a>
        <a href="#catalogo-sensores" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
            3. Catálogo de Sensores
        </a>
        <a href="#catalogo-atuadores" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
            4. Atuadores & Relés
        </a>
        <a href="#ambientes-ides" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>
            5. IDEs & Simuladores
        </a>
        <a href="#simulador-bancada" class="module-nav-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
            6. Simulador Interativo
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

<!-- SEÇÃO 1: MCU VS MPU -->
<section id="mcu-vs-mpu" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
        </div>
        <div>
            <h2 class="section-title">1. Plataformas de Hardware: Microcontrolador (MCU) vs Microprocessador (MPU / SBC)</h2>
            <div class="section-subtitle">Arquiteturas de computação embarcada para soluções de borda (SENAI-SP, Cap. 2)</div>
        </div>
    </div>

    <div class="theory-block">
        <h3>1.1 Diferenciação Arquitetural</h3>
        <p>
            Uma das primeiras decisões técnicas de um projetista de IoT é a escolha entre um <strong>Microcontrolador (MCU)</strong> e um <strong>Microprocessador / Computador em Placa Única (SBC)</strong>:
        </p>
        <ul>
            <li><strong>Microcontrolador (MCU):</strong> É um <em>System on a Chip (SoC)</em> que integra em um único circuito de silício o processador (CPU), memória de programa não-volátil (Flash), memória de trabalho (SRAM) e periféricos de entrada/saída (GPIO, Conversores ADC, Temporizadores). Executa um único firmware em loop contínuo (*bare-metal* ou FreeRTOS), possui consumo energético na faixa de miliwatts (podendo operar anos com baterias) e resposta instantânea a interrupções de hardware.</li>
            <li><strong>Microprocessador / Computador de Placa Única (SBC):</strong> Possui CPU potente multi-core, memória RAM externa de alta capacidade (1 GB a 8 GB LPDDR4), armazenamento em cartão microSD/SSD e roda um Sistema Operacional completo (Linux / Raspberry Pi OS). Consome mais energia (2W a 15W), necessita de fonte robusta e é indicado para tarefas pesadas como visão computacional (OpenCV), servidores locais e gateways de telemetria.</li>
        </ul>

        <div style="overflow-x: auto; margin: 16px 0;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
                <thead>
                    <tr style="background: #f1f5f9; text-align: left;">
                        <th style="padding: 10px; border: 1px solid #cbd5e1;">Especificação</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1; color: #0284c7;">Arduino Uno R3 (ATmega328P)</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1; color: #059669;">Espressif ESP32 (NodeMCU)</th>
                        <th style="padding: 10px; border: 1px solid #cbd5e1; color: #7c3aed;">Raspberry Pi 4 / 5 (SBC)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0; font-weight: bold;">Tipo de Chip</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Microcontrolador 8-bit AVR</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Microcontrolador 32-bit Dual-Core Xtensa LX6</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Microprocessador 64-bit Quad-Core ARM Cortex-A72</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0; font-weight: bold;">Frequência de Clock</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">16 MHz</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;"><strong>240 MHz</strong></td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">1.5 GHz a 2.4 GHz</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0; font-weight: bold;">Memória SRAM / RAM</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">2 KB</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">520 KB</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">2 GB, 4 GB ou 8 GB LPDDR4</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0; font-weight: bold;">Armazenamento Flash</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">32 KB</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">4 MB a 16 MB SPI Flash</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Cartão MicroSD / SSD NVMe (32GB+)</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0; font-weight: bold;">Conectividade Nativa</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Nenhuma (requer Shields externos)</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;"><strong>Wi-Fi 802.11 b/g/n + Bluetooth 4.2 / BLE</strong></td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Wi-Fi Dual-Band, Gigabit Ethernet, Bluetooth 5.0, USB 3.0, HDMI</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0; font-weight: bold;">Tensão de Operação</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">5.0 V</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">3.3 V</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">5.0 V (Porta USB-C 3A+)</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0; font-weight: bold;">Indicação Típica</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Ensino básico de eletrônica e robótica simples.</td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;"><strong>Padrão da indústria para nós sensores IoT e automação.</strong></td>
                        <td style="padding: 8px 10px; border: 1px solid #e2e8f0;">Gateways locais, processamento de imagem, servidores de automação (Home Assistant).</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- SEÇÃO 2: INTERFACES I/O, ADC & PWM -->
<section id="interfaces-io" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">2. Interfaces de Entrada e Saída: Digitais, ADC e Modulação PWM</h2>
            <div class="section-subtitle">Conversão de grandezas do mundo contínuo para valores discretos no código (SENAI-SP, Cap. 2)</div>
        </div>
    </div>

    <div class="theory-block">
        <h3>2.1 Portas Digitais (GPIO)</h3>
        <p>
            As portas <strong>GPIO (General Purpose Input/Output)</strong> operam com sinais binários de dois estados discretos:
        </p>
        <ul>
            <li><code>HIGH (1 lógico):</code> Representa o nível de tensão máxima (5.0V no Arduino ou 3.3V no ESP32).</li>
            <li><code>LOW (0 lógico):</code> Representa o nível de terra (0.0V / GND).</li>
            <li><strong>Comandos em C/C++:</strong> <code>pinMode(pino, INPUT / OUTPUT / INPUT_PULLUP)</code>, <code>digitalRead(pino)</code> e <code>digitalWrite(pino, HIGH / LOW)</code>.</li>
        </ul>

        <h3>2.2 Conversor Analógico para Digital (ADC)</h3>
        <p>
            Na natureza, grandezas como temperatura, som e luz são contínuas. O microcontrolador utiliza um <strong>ADC (Analog-to-Digital Converter)</strong> para amostrar e quantizar essa tensão contínua em um número inteiro proporcional:
        </p>
        <ul>
            <li><strong>Arduino Uno (Resolução de 10 bits):</strong> Divide a faixa de 0V a 5V em $2^{10} = 1024$ níveis (de 0 a 1023). Cada passo corresponde a $\frac{5{,}00\,\text{V}}{1024} \approx 4{,}88\,\text{mV}$.</li>
            <li><strong>ESP32 (Resolução de 12 bits):</strong> Divide a faixa de 0V a 3.3V em $2^{12} = 4096$ níveis (de 0 a 4095). Cada passo corresponde a $\frac{3{,}30\,\text{V}}{4096} \approx 0{,}805\,\text{mV}$, oferecendo precisão analógica 6 vezes superior.</li>
        </ul>

        <h3>2.3 Modulação por Largura de Pulso (PWM - Pulse Width Modulation)</h3>
        <p>
            Microcontroladores não conseguem variar a tensão contínua de saída (não possuem DAC em todas as portas). Para controlar a velocidade de motores DC ou o brilho de lâmpadas, utilizamos <strong>PWM</strong>: ligamos e desligamos a saída digital em altíssima frequência (ex: 490 Hz), variando a proporção de tempo em que o sinal permanece em nível alto (<strong>Duty Cycle - Ciclo de Trabalho</strong> de 0% a 100%):
        </p>
        <div style="background: #f8fafc; border-left: 4px solid #0284c7; padding: 12px; margin: 12px 0; font-size: 13px;">
            • <code>Duty Cycle 0% (analogWrite(pino, 0)):</code> Tensão média equivalente = 0.0V (LED apagado / motor parado).<br>
            • <code>Duty Cycle 50% (analogWrite(pino, 127)):</code> Tensão média equivalente = 2.5V (Meia potência).<br>
            • <code>Duty Cycle 100% (analogWrite(pino, 255)):</code> Tensão média equivalente = 5.0V (Potência máxima).
        </div>
    </div>
</section>

<!-- SEÇÃO 3: CATÁLOGO DE SENSORES -->
<section id="catalogo-sensores" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        </div>
        <div>
            <h2 class="section-title">3. Catálogo Técnico e Físico de Sensores para IoT</h2>
            <div class="section-subtitle">Princípios físicos de funcionamento, interfaces e fórmulas de cálculo (SENAI-SP, Cap. 2)</div>
        </div>
    </div>

    <div class="theory-block">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px; margin: 16px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #0284c7; font-size: 14px; margin-bottom: 4px;">Sensor LDR (Fotoresistor)</div>
                <p style="font-size: 12.5px; color: #475569;">
                    <strong>Tipo:</strong> Analógico (Resistivo).
                    <br><strong>Princípio:</strong> A resistência elétrica cai drasticamente na presença de luz (de ~1 M$\Omega$ no escuro para ~1 k$\Omega$ sob luz intensa). Exige circuito em <strong>Divisor de Tensão</strong> com resistor fixo de 10k$\Omega$.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #059669; font-size: 14px; margin-bottom: 4px;">Sensor PIR HC-SR501 (Presença)</div>
                <p style="font-size: 12.5px; color: #475569;">
                    <strong>Tipo:</strong> Digital (Saída HIGH/LOW).
                    <br><strong>Princípio:</strong> Cristal piroelétrico que capta a radiação infravermelha térmica emitida pelo corpo humano através de uma <strong>Lente de Fresnel</strong>. Possui dois potenciômetros manuais: ajuste de sensibilidade/alcance (3 a 7 metros) e tempo de retenção do disparo (*delay time*).
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #7c3aed; font-size: 14px; margin-bottom: 4px;">Sensor DHT11 / DHT22 (Clima)</div>
                <p style="font-size: 12.5px; color: #475569;">
                    <strong>Tipo:</strong> Digital Proprietário (Barramento Single-Wire).
                    <br><strong>Princípio:</strong> Integra um elemento capacitivo de umidade e um termistor NTC de temperatura. Transmite um pacote serial de 40 bits com verificação por *Checksum* para evitar ruídos de leitura.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #d97706; font-size: 14px; margin-bottom: 4px;">Sensor Ultrassônico HC-SR04</div>
                <p style="font-size: 12.5px; color: #475569;">
                    <strong>Tipo:</strong> Digital por Tempo de Voo (TOF).
                    <br><strong>Princípio:</strong> Emite 8 pulsos de ultrassom a 40 kHz no pino *Trigger* e mede a duração do eco no pino *Echo*. Fórmula: $\text{Distância (cm)} = \frac{\text{Tempo do Echo (\mu s)} \times 0{,}034}{2}$.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SEÇÃO 4: CATÁLOGO DE ATUADORES -->
<section id="catalogo-atuadores" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
        </div>
        <div>
            <h2 class="section-title">4. Catálogo Técnico de Atuadores e Controle de Potência</h2>
            <div class="section-subtitle">Módulos Relé com isolamento óptico, servomotores, motores DC e displays</div>
        </div>
    </div>

    <div class="theory-block">
        <h3>4.1 Módulo Relé Eletromecânico (Isolamento de Alta Tensão)</h3>
        <p>
            O <strong>Módulo Relé</strong> é a ponte segura que permite ao microcontrolador (que opera com míseros 5V e 20mA) ligar cargas residenciais e industriais pesadas de alta tensão (lâmpadas, motores, portões elétricos de 110V ou 220V AC até 10 Ampères).
        </p>
        
        <div class="callout-box">
            <div class="callout-title" style="color: #059669;">
                Componentes de Proteção do Módulo Relé
            </div>
            <p style="font-size: 13px; margin: 0; color: var(--text-secondary);">
                • <strong>Optoacoplador (Isolamento Galvânico):</strong> Transfere o sinal do microcontrolador através de luz interna (LED + Fototransistor), sem contato elétrico direto. Se a rede de 220V queimar o relé, o microcontrolador fica totalmente protegido.<br>
                • <strong>Diodo Flyback (Roda-Livre):</strong> Absorve o pico perigoso de tensão reversa induzida (força contra-eletromotriz) quando a bobina magnética é desenergizada.<br>
                • <strong>Contatos de Saída:</strong> <code>COM</code> (Comum), <code>NA / NO</code> (Normalmente Aberto - fecha o circuito ao acionar) e <code>NF / NC</code> (Normalmente Fechado).
            </p>
        </div>

        <h3>4.2 Servomotor SG90</h3>
        <p>
            Diferente de um motor DC convencional que gira continuamente, o <strong>Servomotor</strong> gira para um ângulo exato e mantém sua posição (de $0^\circ$ a $180^\circ$). Ele integra internamente um motor DC, caixa de engrenagens de redução, potenciômetro de feedback e circuito de controle acionado por pulsos PWM de período 20ms (com biblioteca <code>Servo.h</code>).
        </p>

        <h3>4.3 Displays para IoT: OLED I2C (SSD1306) vs LCD 16x2</h3>
        <ul>
            <li><strong>Display OLED 0.96" I2C (Controlador SSD1306):</strong> Resolução de $128 \times 64$ pixels gráficos com contraste infinito e baixíssimo consumo. Comunica-se por barramento I2C utilizando apenas 2 pinos de dados (SDA e SCL).</li>
            <li><strong>Display LCD 16x2 com Módulo I2C (PCF8574):</strong> Exibe 2 linhas de 16 caracteres alfanuméricos, ideal para painéis de monitoramento locais de telemetria.</li>
        </ul>
    </div>
</section>

<!-- SEÇÃO 5: AMBIENTES & IDES -->
<section id="ambientes-ides" class="content-section">
    <div class="section-header">
        <div class="section-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">5. Ambientes de Desenvolvimento e Ferramentas</h2>
            <div class="section-subtitle">Arduino IDE 2.x, PlatformIO (VS Code), MicroPython/Thonny e Simuladores Virtuais</div>
        </div>
    </div>

    <div class="theory-block">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px; margin: 16px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #0284c7; font-size: 14px; margin-bottom: 4px;">Arduino IDE 2.x</div>
                <p style="font-size: 12.5px; color: #475569;">
                    Ambiente oficial intuitivo. Estrutura baseada em duas funções obrigatórias: <code>setup()</code> (executada uma única vez na inicialização) e <code>loop()</code> (executada repetidamente em ciclo contínuo). Possui gerenciador de placas (Board Manager) e bibliotecas integradas.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #059669; font-size: 14px; margin-bottom: 4px;">VS Code + PlatformIO</div>
                <p style="font-size: 12.5px; color: #475569;">
                    Padrão profissional da indústria de sistemas embarcados. Gerencia dependências automaticamente através do arquivo <code>platformio.ini</code>, oferece autocompletion avançado (IntelliSense), compilação rápida e integração com Git.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px;">
                <div style="font-weight: 800; color: #7c3aed; font-size: 14px; margin-bottom: 4px;">Simuladores: Tinkercad & Wokwi</div>
                <p style="font-size: 12.5px; color: #475569;">
                    Permitem testar esquemáticos e firmwares no navegador antes de energizar os circuitos reais na bancada física, eliminando o risco de queima acidental de componentes por curto-circuito.
                </p>
            </div>
        </div>

        <div class="code-wrapper">
            <div class="code-header">
                <span>Código C++ Estruturado • Leitura do Sensor PIR e Acionamento de Relé</span>
                <button class="copy-btn" onclick="navigator.clipboard.writeText(this.closest('.code-wrapper').querySelector('code').innerText)">Copiar Código</button>
            </div>
            <pre><code>/**
 * Projeto: Automação Predial com Sensor PIR e Módulo Relé
 * SENAI-SP • Curso Técnico em Desenvolvimento de Sistemas
 */

const int PINO_PIR = 2;   // Entrada Digital do Sensor PIR
const int PINO_RELE = 7;  // Saída Digital para o Módulo Relé
const int PINO_LED = 13;  // LED indicador na placa

void setup() {
    Serial.begin(9600);
    
    pinMode(PINO_PIR, INPUT);
    pinMode(PINO_RELE, OUTPUT);
    pinMode(PINO_LED, OUTPUT);
    
    // Módulo Relé ativo em nível LOW (desliga na inicialização)
    digitalWrite(PINO_RELE, HIGH); 
    digitalWrite(PINO_LED, LOW);
    
    Serial.println(">>> Sistema Inicializado. Calibrando sensor PIR (15s)...");
    delay(15000); // Tempo para estabilização do sensor piroelétrico
    Serial.println(">>> Sensor Pronto para Detecção!");
}

void loop() {
    int presencaDetectada = digitalRead(PINO_PIR);
    
    if (presencaDetectada == HIGH) {
        Serial.println("[ALERTA] Presença Detectada! Acionando Carga...");
        digitalWrite(PINO_RELE, LOW);  // Liga o Relé (contato COM-NA fecha)
        digitalWrite(PINO_LED, HIGH);  // Liga LED indicador
    } else {
        Serial.println("[INFO] Ambiente Vazio. Desligando Carga...");
        digitalWrite(PINO_RELE, HIGH); // Desliga o Relé
        digitalWrite(PINO_LED, LOW);   // Desliga LED indicador
    }
    
    delay(500); // Intervalo de amostragem
}</code></pre>
        </div>
    </div>
</section>

<!-- SEÇÃO 6: SIMULADOR INTERATIVO DE BANCADA -->
<section id="simulador-bancada" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #e0f2fe; color: #0284c7;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
        </div>
        <div>
            <h2 class="section-title">6. Simulador Interativo: Montagem e Testes Passo a Passo</h2>
            <div class="section-subtitle">Simulação animada de circuitos, pinagem detalhada, fiação e componentes interativos</div>
        </div>
    </div>

    <!-- Container do Simulador Interativo -->
    <div id="prototype-step-player" data-module="2"></div>
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
                A fundamentação teórica de sensores, relés e microcontroladores foi apresentada integralmente acima. O <strong>ensaio físico de acionamento com carga real e calibração de bancada</strong> será realizado sob supervisão do professor no laboratório.
            </p>
        </div>

        <h3>Briefing da Prática: <?= htmlspecialchars($module['project_name']) ?></h3>
        <p>
            Os grupos de alunos montarão um <strong>Sistema Inteligente de Controle de Acesso e Iluminação</strong> combinando sensores e atuadores:
        </p>
        <ul style="font-size: 13.5px; line-height: 1.7;">
            <li><strong>Hardware:</strong> Arduino Uno, Sensor de Presença PIR HC-SR501, Módulo Relé 5V, Lâmpada de teste 12V/110V e Buzzer de sinalização sonora.</li>
            <li><strong>Calibração:</strong> Ajustar fisicamente os trimpots de sensibilidade e delay do sensor PIR para resposta de 5 segundos.</li>
            <li><strong>Segurança:</strong> Respeitar a polaridade dos fios e garantir o isolamento galvânico entre os circuitos de controle (5V DC) e potência.</li>
            <li><strong>Entrega:</strong> Apresentar ao professor o funcionamento com logs no Monitor Serial demonstrando a detecção e o acionamento mecânico do relé.</li>
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
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">CT2 - Seleção e Integração de Hardwares</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Ligação elétrica correta do sensor PIR e módulo relé respeitando as portas digitais e níveis lógicos.</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; text-align: center; font-weight: bold;">40%</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">CT3 - Configuração de Ambientes (IDEs)</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Escrita de código C++ modular, configuração de baud rate no Serial e manipulação de temporizações.</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; text-align: center; font-weight: bold;">30%</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; font-weight: 600;">CT2 - Calibração e Testes</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0;">Demonstração prática de calibração física dos potenciômetros de sensibilidade e estabilização de hardware.</td>
                        <td style="padding: 10px; border: 1px solid #e2e8f0; text-align: center; font-weight: bold;">30%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
