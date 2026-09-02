/**
 * Three.js 3D Interactive Step-by-Step Circuit Viewer
 * SENAI-SP • Internet das Coisas (IoT)
 * Fundo neutro claro, modelagem 3D do Arduino Uno R3, Protoboard, Sensores, Fiação Bézier e Componentes.
 * Suporta as 4 Práticas Progressivas do Módulo 1 (1A, 1B, 1C, 1D) com montagem passo a passo e controles de órbita 3D.
 */

const THREE_PRACTICES_DATA = {
    1: {
        '1a': {
            id: '1a',
            title: "Prática 1A: Circuito Básico • LED 5V e Resistor em 3D",
            badge: "Nível Zero • Sem Código",
            totalSteps: 4,
            steps: [
                { number: 1, title: "Etapa 1: Disposição do Arduino e Protoboard", desc: "Posicione a placa Arduino Uno R3 e a Protoboard na bancada virtual 3D. Gire a câmera com o botão esquerdo do mouse para inspecionar os detalhes.", tip: "Nesta prática o Arduino atua como fonte de alimentação regulada de 5V DC." },
                { number: 2, title: "Etapa 2: Inserção do Resistor de 220 Ω e LED Vermelho", desc: "Encaixe o resistor de 220 Ω (Vermelho-Vermelho-Marrom) e o LED de 5mm na protoboard, alinhando o terminal ânodo com o resistor.", tip: "Polaridade: O ânodo (+) recebe a corrente e o cátodo (-) fecha o circuito no GND." },
                { number: 3, title: "Etapa 3: Fiação dos Jumpers de Alimentação (5V e GND)", desc: "Puxe o cabo 3D vermelho saindo do pino 5V do Arduino até o resistor. Puxe o cabo 3D preto do GND até o cátodo do LED.", tip: "Observe as curvas suaves dos cabos jumpers conectando os soquetes aos furos da protoboard." },
                { number: 4, title: "Etapa 4: Circuito Energizado e Funcionamento Contínuo", desc: "Circuito energizado! A corrente elétrica flui com segurança limitada pelo resistor de 220 Ω e o LED 3D acende com emissão de luz difusa!", tip: "Conceito: Circuito fechado sem programação montado com sucesso!" }
            ]
        },
        '1b': {
            id: '1b',
            title: "Prática 1B: Controle Manual • Chave Pushbutton e LED em 3D",
            badge: "Interrupção Mecânica",
            totalSteps: 4,
            steps: [
                { number: 1, title: "Etapa 1: Disposição do Botão Pushbutton", desc: "Insira o botão táctil de 4 pinos sobre o canal central divisor da protoboard em 3D.", tip: "O botão é uma chave 'Normalmente Aberta' que fecha o circuito quando pressionada." },
                { number: 2, title: "Etapa 2: Conexão do LED e Resistor em Série", desc: "Conecte o resistor de 220 Ω na saída do botão e o ânodo do LED na mesma coluna condutora.", tip: "Circuito em Série: A corrente só chega ao LED se passar pelos contatos do botão." },
                { number: 3, title: "Etapa 3: Fiação de Alimentação 5V e Retorno GND", desc: "Conecte o cabo 3D vermelho de 5V na entrada do botão e o cabo preto de GND no cátodo do LED.", tip: "A fiação desimpedida permite visualizar claramente a rota dos sinais." },
                { number: 4, title: "Etapa 4: Acionamento Mecânico e Teste 3D", desc: "Botão acionado! O circuito fecha, permitindo o fluxo da corrente de 5V e iluminando o LED 3D!", tip: "Princípio fundamental de interruptores e interfaces mecânicas industriais." }
            ]
        },
        '1c': {
            id: '1c',
            title: "Prática 1C: Primeiro Código • LED Blink na Porta D13 em 3D",
            badge: "Programação C/C++",
            totalSteps: 5,
            steps: [
                { number: 1, title: "Etapa 1: Disposição para Controle por Microcontrolador", desc: "Posicione o hardware. Agora o controle de energia será fornecido diretamente por um pino digital inteligente.", tip: "As portas digitais operam como saídas (HIGH = 5V / LOW = 0V)." },
                { number: 2, title: "Etapa 2: Encaixe do LED e Resistor de 220 Ω", desc: "Insira o resistor de 220 Ω e o LED na protoboard 3D.", tip: "O resistor limita a corrente máxima em seguros 15 mA." },
                { number: 3, title: "Etapa 3: Fiação do Sinal de Controle D13 e Terra GND", desc: "Conecte o jumper 3D laranja da porta Digital D13 do Arduino ao resistor e o cabo preto ao GND superior.", tip: "O pino D13 é controlado pelas instruções escritas no código C++." },
                { number: 4, title: "Etapa 4: Envio do Firmware (Blink) via USB", desc: "O microcontrolador recebe e executa o código com digitalWrite(13, HIGH), delay(1000) e digitalWrite(13, LOW).", tip: "O processador ATmega328P assume a temporização autônoma do sistema." },
                { number: 5, title: "Etapa 5: Pisca-Pisca Contínuo Operacional", desc: "O LED pisca continuamente a cada 1 segundo com brilho e emissão luminosa em tempo real!", tip: "Parabéns: Seu primeiro código físico está operando no hardware real!" }
            ]
        },
        '1d': {
            id: '1d',
            title: "Prática 1D: Automação Inteligente • Sensor LDR & LED em 3D",
            badge: "Automação com Sensor",
            totalSteps: 5,
            steps: [
                { number: 1, title: "Etapa 1: Disposição do Sistema de Automação", desc: "Disponha o Arduino Uno R3 e a Protoboard 3D na bancada virtual.", tip: "Integração completa: 1 Sensor de Entrada (LDR) + 1 Atuador de Saída (LED)." },
                { number: 2, title: "Etapa 2: Inserção do Sensor LDR, Resistor 10k e LED", desc: "Encaixe o Fotoresistor LDR, o resistor de 10 kΩ (divisor de tensão) e o LED com resistor de 220 Ω.", tip: "O divisor de tensão converte a variação de luz em variação de milivolts." },
                { number: 3, title: "Etapa 3: Fiação dos Barramentos de Alimentação (5V e GND)", desc: "Ligue os cabos 3D de 5V (vermelho) e GND (preto) alimentando os componentes na protoboard.", tip: "Use o botão esquerdo para girar a câmera e inspecionar os pontos de conexão." },
                { number: 4, title: "Etapa 4: Fiação dos Sinais (Analógico A0 e Digital D13)", desc: "Ligue o jumper verde da leitura do LDR na porta analógica A0 e o jumper laranja de comando na porta D13.", tip: "A porta A0 lê valores de 0 a 1023 e o firmware decide quando acionar a lâmpada." },
                { number: 5, title: "Etapa 5: Sistema de Iluminação Automática Operando", desc: "Ambiente escuro detectado! A porta A0 lê valor abaixo do limiar (<500), a porta D13 envia sinal HIGH e o LED acende automaticamente!", tip: "Sistema de IoT autônomo e inteligente funcionando!" }
            ]
        }
    }
};

class ThreeStepCircuitViewer {
    constructor(containerId, moduleId = 1) {
        this.container = document.getElementById(containerId);
        if (!this.container) return;

        this.moduleId = parseInt(moduleId) || 1;
        this.modulePractices = THREE_PRACTICES_DATA[this.moduleId] || THREE_PRACTICES_DATA[1];
        this.currentPracticeKey = '1d';
        this.currentPractice = this.modulePractices[this.currentPracticeKey];
        this.currentStep = 1;
        this.isPlaying = false;
        this.playInterval = null;

        this.scene = null;
        this.camera = null;
        this.renderer = null;
        this.controls = null;
        this.circuit3DGroup = null;
        this.animatedObjects = [];

        this.renderDomStructure();
        this.initThreeScene();
        this.updateStep(1);
    }

    renderDomStructure() {
        const practiceKeys = Object.keys(this.modulePractices);

        this.container.innerHTML = `
            <div class="three-step-player-card">
                <!-- Seletor de Práticas 3D -->
                <div class="practice-switcher-bar">
                    <span class="practice-switcher-label">Prática em 3D:</span>
                    <div class="practice-switcher-buttons">
                        ${practiceKeys.map(k => {
                            const p = this.modulePractices[k];
                            return `
                                <button class="practice-switch-btn ${k === this.currentPracticeKey ? 'active' : ''}" data-three-practice="${k}">
                                    ${p.title.split(':')[0]} • <small>${p.badge}</small>
                                </button>
                            `;
                        }).join('')}
                    </div>
                </div>

                <div class="step-player-header">
                    <div class="step-player-title">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        <span id="threePracticeTitle">${this.currentPractice.title}</span>
                    </div>
                    <div class="step-nav-pills" id="threeStepPillsContainer">
                        <!-- Step pills rendered dynamically -->
                    </div>
                </div>

                <div class="three-canvas-container" style="position: relative; width: 100%; height: 480px; background: #f1f5f9; border-radius: 8px; overflow: hidden; box-shadow: inset 0 1px 4px rgba(0,0,0,0.06);">
                    <div id="three3dMountPoint" style="width: 100%; height: 100%;"></div>
                    
                    <div class="three-3d-hint-badge" style="position: absolute; bottom: 14px; left: 16px; background: rgba(255,255,255,0.9); backdrop-filter: blur(4px); border: 1px solid #cbd5e1; border-radius: 6px; padding: 6px 12px; font-size: 11.5px; font-weight: 600; color: #475569; pointer-events: none; display: flex; align-items: center; gap: 6px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M12 8v8M8 12h8"></path></svg>
                        Gire com o Botão Esquerdo • Zoom com Scroll • Mova com Botão Direito
                    </div>

                    <div class="step-floating-badge" id="threeStepCounterBadge" style="position: absolute; top: 14px; right: 16px; background: rgba(255,255,255,0.92); border: 1px solid #cbd5e1; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 700; color: #0284c7;">
                        Etapa 1 de ${this.currentPractice.totalSteps}
                    </div>
                </div>

                <div class="step-info-card" id="threeStepInfoContainer">
                    <!-- Step info card -->
                </div>

                <div class="step-player-toolbar">
                    <div class="player-left-controls">
                        <button class="player-btn" id="btnThreePrev">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>
                            Etapa Anterior
                        </button>
                        <button class="player-btn primary" id="btnThreeNext">
                            Próxima Etapa
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </button>
                    </div>
                    
                    <div class="player-right-controls">
                        <button class="player-btn secondary" id="btnThreeAutoPlay">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                            Auto-Play 3D
                        </button>
                        <button class="player-btn secondary" id="btnThreeResetCam">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><path d="M3 3v5h5"></path></svg>
                            Resetar Câmera
                        </button>
                    </div>
                </div>
            </div>
        `;

        this.bindEvents();
    }

    bindEvents() {
        const btnPrev = this.container.querySelector('#btnThreePrev');
        const btnNext = this.container.querySelector('#btnThreeNext');
        const btnAuto = this.container.querySelector('#btnThreeAutoPlay');
        const btnReset = this.container.querySelector('#btnThreeResetCam');
        const practiceBtns = this.container.querySelectorAll('[data-three-practice]');

        practiceBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const k = btn.dataset.threePractice;
                this.switchPractice(k);
            });
        });

        btnPrev.addEventListener('click', () => {
            if (this.currentStep > 1) this.updateStep(this.currentStep - 1);
        });

        btnNext.addEventListener('click', () => {
            if (this.currentStep < this.currentPractice.totalSteps) this.updateStep(this.currentStep + 1);
            else this.updateStep(1);
        });

        btnAuto.addEventListener('click', () => {
            if (this.isPlaying) this.stopAutoPlay();
            else this.startAutoPlay();
        });

        btnReset.addEventListener('click', () => {
            this.resetCamera();
        });
    }

    switchPractice(key) {
        if (!this.modulePractices[key]) return;
        this.stopAutoPlay();
        this.currentPracticeKey = key;
        this.currentPractice = this.modulePractices[key];
        this.currentStep = 1;

        this.container.querySelectorAll('[data-three-practice]').forEach(b => {
            if (b.dataset.threePractice === key) b.classList.add('active');
            else b.classList.remove('active');
        });

        const titleEl = this.container.querySelector('#threePracticeTitle');
        if (titleEl) titleEl.innerText = this.currentPractice.title;

        this.updateStep(1);
    }

    startAutoPlay() {
        this.isPlaying = true;
        const btn = this.container.querySelector('#btnThreeAutoPlay');
        if (btn) {
            btn.innerHTML = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect></svg> Pausar`;
            btn.classList.add('playing');
        }

        this.playInterval = setInterval(() => {
            if (this.currentStep < this.currentPractice.totalSteps) {
                this.updateStep(this.currentStep + 1);
            } else {
                this.updateStep(1);
            }
        }, 3600);
    }

    stopAutoPlay() {
        this.isPlaying = false;
        if (this.playInterval) clearInterval(this.playInterval);
        const btn = this.container.querySelector('#btnThreeAutoPlay');
        if (btn) {
            btn.innerHTML = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg> Auto-Play 3D`;
            btn.classList.remove('playing');
        }
    }

    initThreeScene() {
        const mount = this.container.querySelector('#three3dMountPoint');
        if (!mount || typeof THREE === 'undefined') return;

        const width = mount.clientWidth || 800;
        const height = mount.clientHeight || 480;

        // Scene
        this.scene = new THREE.Scene();
        this.scene.background = new THREE.Color(0xf1f5f9);
        this.scene.fog = new THREE.FogExp2(0xf1f5f9, 0.006);

        // Camera
        this.camera = new THREE.PerspectiveCamera(40, width / height, 0.1, 1000);
        this.camera.position.set(0, 36, 46);

        // Renderer
        this.renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        this.renderer.setSize(width, height);
        this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        this.renderer.shadowMap.enabled = true;
        this.renderer.shadowMap.type = THREE.PCFSoftShadowMap;
        mount.appendChild(this.renderer.domElement);

        // OrbitControls
        if (typeof THREE.OrbitControls !== 'undefined') {
            this.controls = new THREE.OrbitControls(this.camera, this.renderer.domElement);
            this.controls.enableDamping = true;
            this.controls.dampingFactor = 0.05;
            this.controls.maxPolarAngle = Math.PI / 2 - 0.04;
            this.controls.minDistance = 15;
            this.controls.maxDistance = 110;
            this.controls.target.set(0, 0, 0);
        }

        // Lighting
        const ambient = new THREE.AmbientLight(0xffffff, 0.95);
        this.scene.add(ambient);

        const dirLight = new THREE.DirectionalLight(0xffffff, 0.9);
        dirLight.position.set(30, 60, 40);
        dirLight.castShadow = true;
        dirLight.shadow.mapSize.width = 2048;
        dirLight.shadow.mapSize.height = 2048;
        this.scene.add(dirLight);

        const fillLight = new THREE.DirectionalLight(0xe2e8f0, 0.5);
        fillLight.position.set(-30, 30, -30);
        this.scene.add(fillLight);

        // Studio Floor & Grid
        const floorGeo = new THREE.PlaneGeometry(160, 160);
        const floorMat = new THREE.MeshStandardMaterial({ color: 0xffffff, roughness: 0.9, metalness: 0.05 });
        const floor = new THREE.Mesh(floorGeo, floorMat);
        floor.rotation.x = -Math.PI / 2;
        floor.position.y = -0.5;
        floor.receiveShadow = true;
        this.scene.add(floor);

        const grid = new THREE.GridHelper(160, 40, 0xcbd5e1, 0xe2e8f0);
        grid.position.y = -0.48;
        this.scene.add(grid);

        // Group container for circuit
        this.circuit3DGroup = new THREE.Group();
        this.scene.add(this.circuit3DGroup);

        window.addEventListener('resize', () => this.onWindowResize());
        this.animate();
    }

    onWindowResize() {
        const mount = this.container.querySelector('#three3dMountPoint');
        if (!mount || !this.camera || !this.renderer) return;
        const width = mount.clientWidth;
        const height = mount.clientHeight;
        this.camera.aspect = width / height;
        this.camera.updateProjectionMatrix();
        this.renderer.setSize(width, height);
    }

    resetCamera() {
        if (!this.camera || !this.controls) return;
        this.camera.position.set(0, 36, 46);
        this.controls.target.set(0, 0, 0);
        this.controls.update();
    }

    updateStep(stepNumber) {
        this.currentStep = stepNumber;
        const step = this.currentPractice.steps[stepNumber - 1];

        // Update pills
        const pillsContainer = this.container.querySelector('#threeStepPillsContainer');
        if (pillsContainer) {
            let pillsHtml = '';
            for (let i = 1; i <= this.currentPractice.totalSteps; i++) {
                pillsHtml += `
                    <button class="step-pill-btn ${i === stepNumber ? 'active' : ''}" data-step-pill="${i}">
                        Etapa ${i}
                    </button>
                `;
            }
            pillsContainer.innerHTML = pillsHtml;

            this.container.querySelectorAll('[data-step-pill]').forEach(pill => {
                pill.addEventListener('click', () => {
                    const s = parseInt(pill.dataset.stepPill);
                    this.updateStep(s);
                });
            });
        }

        // Update badge
        const badge = this.container.querySelector('#threeStepCounterBadge');
        if (badge) badge.innerText = `Etapa ${stepNumber} de ${this.currentPractice.totalSteps}`;

        // Update description info
        const info = this.container.querySelector('#threeStepInfoContainer');
        if (info && step) {
            info.innerHTML = `
                <div class="step-info-header">
                    <span class="step-num-badge">Etapa ${step.number}</span>
                    <h3 class="step-info-title">${step.title}</h3>
                </div>
                <p class="step-info-desc">${step.desc}</p>
                <div class="step-info-tip">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                    <span>${step.tip}</span>
                </div>
            `;
        }

        this.rebuild3DCircuit(stepNumber);
    }

    rebuild3DCircuit(step) {
        if (!this.circuit3DGroup || typeof THREE === 'undefined') return;

        // Clear previous 3D objects
        while (this.circuit3DGroup.children.length > 0) {
            const obj = this.circuit3DGroup.children[0];
            this.circuit3DGroup.remove(obj);
        }
        this.animatedObjects = [];

        // 1. Always build 3D Arduino Uno R3 & Protoboard
        this.build3DArduinoUno();
        this.build3DBreadboard();

        // 2. Build practice-specific 3D parts based on current step
        const pKey = this.currentPracticeKey;

        if (pKey === '1a') {
            // PRÁTICA 1A: LED 5V + RESISTOR 220Ω
            if (step >= 2) {
                this.add3DResistor(12, 2.2, 0, 0xef4444); // Resistor 220Ω
                this.add3DLED(15, 2.2, 0, step >= 4);      // LED Vermelho
            }
            if (step >= 3) {
                // Cabo 5V (Vermelho)
                this.add3DJumperWire(
                    new THREE.Vector3(-14, 2.5, 6.8),
                    new THREE.Vector3(12, 2.2, -4),
                    0xef4444,
                    step >= 4
                );
                // Cabo GND (Preto)
                this.add3DJumperWire(
                    new THREE.Vector3(-12.5, 2.5, 6.8),
                    new THREE.Vector3(15, 2.2, 4),
                    0x1e293b,
                    step >= 4
                );
            }
        } else if (pKey === '1b') {
            // PRÁTICA 1B: PUSHBUTTON + LED
            if (step >= 2) {
                this.add3DPushbutton(10, 2.2, 0);
                this.add3DResistor(14, 2.2, 0, 0xef4444);
                this.add3DLED(17, 2.2, 0, step >= 4);
            }
            if (step >= 3) {
                this.add3DJumperWire(
                    new THREE.Vector3(-14, 2.5, 6.8),
                    new THREE.Vector3(8, 2.2, -2),
                    0xef4444,
                    step >= 4
                );
                this.add3DJumperWire(
                    new THREE.Vector3(-12.5, 2.5, 6.8),
                    new THREE.Vector3(17, 2.2, 4),
                    0x1e293b,
                    step >= 4
                );
            }
        } else if (pKey === '1c') {
            // PRÁTICA 1C: ARDUINO BLINK D13
            if (step >= 2) {
                this.add3DResistor(12, 2.2, 0, 0xef4444);
                this.add3DLED(15, 2.2, 0, step >= 5);
            }
            if (step >= 3) {
                // Jumper D13 (Laranja)
                this.add3DJumperWire(
                    new THREE.Vector3(-10, 2.5, -6.8),
                    new THREE.Vector3(12, 2.2, -3),
                    0xf59e0b,
                    step >= 5
                );
                // Jumper GND (Preto)
                this.add3DJumperWire(
                    new THREE.Vector3(-8.5, 2.5, -6.8),
                    new THREE.Vector3(15, 2.2, 3),
                    0x1e293b,
                    step >= 5
                );
            }
        } else if (pKey === '1d') {
            // PRÁTICA 1D: AUTOMAÇÃO LDR
            if (step >= 2) {
                this.add3DLDR(10, 2.2, -4);
                this.add3DResistor(10, 2.2, 2, 0x78350f); // 10kΩ
                this.add3DResistor(16, 2.2, -2, 0xef4444); // 220Ω
                this.add3DLED(16, 2.2, 2, step >= 5);
            }
            if (step >= 3) {
                // Cabo 5V
                this.add3DJumperWire(
                    new THREE.Vector3(-14, 2.5, 6.8),
                    new THREE.Vector3(8, 2.2, -6),
                    0xef4444,
                    step >= 5
                );
                // Cabo GND
                this.add3DJumperWire(
                    new THREE.Vector3(-12.5, 2.5, 6.8),
                    new THREE.Vector3(10, 2.2, 6),
                    0x1e293b,
                    step >= 5
                );
            }
            if (step >= 4) {
                // Sinal A0 (Verde)
                this.add3DJumperWire(
                    new THREE.Vector3(-7, 2.5, 6.8),
                    new THREE.Vector3(10, 2.2, -1),
                    0x059669,
                    step >= 5
                );
                // Controle D13 (Laranja)
                this.add3DJumperWire(
                    new THREE.Vector3(-10, 2.5, -6.8),
                    new THREE.Vector3(16, 2.2, -5),
                    0xf59e0b,
                    step >= 5
                );
            }
        }
    }

    build3DArduinoUno() {
        const uno = new THREE.Group();
        uno.position.set(-16, 0, 0);

        // PCB (Teal Blue)
        const pcbGeo = new THREE.BoxGeometry(22, 1.4, 16);
        const pcbMat = new THREE.MeshStandardMaterial({ color: 0x0078a8, roughness: 0.35, metalness: 0.1 });
        const pcb = new THREE.Mesh(pcbGeo, pcbMat);
        pcb.position.y = 0.7;
        pcb.castShadow = true;
        pcb.receiveShadow = true;
        uno.add(pcb);

        // USB
        const usbGeo = new THREE.BoxGeometry(6, 4, 5);
        const silverMat = new THREE.MeshStandardMaterial({ color: 0xd1d5db, metalness: 0.85, roughness: 0.2 });
        const usb = new THREE.Mesh(usbGeo, silverMat);
        usb.position.set(-9, 2.7, -4);
        usb.castShadow = true;
        uno.add(usb);

        // DC Jack
        const jackGeo = new THREE.BoxGeometry(5.5, 4.5, 4.5);
        const blackMat = new THREE.MeshStandardMaterial({ color: 0x1e293b, roughness: 0.6 });
        const jack = new THREE.Mesh(jackGeo, blackMat);
        jack.position.set(-9, 2.7, 4.5);
        jack.castShadow = true;
        uno.add(jack);

        // ATmega328P Chip
        const chipGeo = new THREE.BoxGeometry(10, 1.2, 3);
        const chip = new THREE.Mesh(chipGeo, blackMat);
        chip.position.set(2, 1.6, 2);
        chip.castShadow = true;
        uno.add(chip);

        // Female Headers
        const headerTopGeo = new THREE.BoxGeometry(14, 2.8, 1.4);
        const headerTop = new THREE.Mesh(headerTopGeo, blackMat);
        headerTop.position.set(1, 2.4, -6.8);
        uno.add(headerTop);

        const headerBottomGeo = new THREE.BoxGeometry(14, 2.8, 1.4);
        const headerBottom = new THREE.Mesh(headerBottomGeo, blackMat);
        headerBottom.position.set(1, 2.4, 6.8);
        uno.add(headerBottom);

        // Reset Button
        const btnGeo = new THREE.CylinderGeometry(0.8, 0.8, 1.2, 16);
        const redMat = new THREE.MeshStandardMaterial({ color: 0xd32f2f, roughness: 0.3 });
        const btn = new THREE.Mesh(btnGeo, redMat);
        btn.position.set(-8, 2.0, -6.5);
        uno.add(btn);

        // Power ON LED
        const ledGeo = new THREE.BoxGeometry(0.6, 0.4, 0.6);
        const ledGreenMat = new THREE.MeshStandardMaterial({ color: 0x22c55e, emissive: 0x22c55e, emissiveIntensity: 0.6 });
        const ledPower = new THREE.Mesh(ledGeo, ledGreenMat);
        ledPower.position.set(-2, 1.6, -4);
        uno.add(ledPower);

        this.circuit3DGroup.add(uno);
    }

    build3DBreadboard() {
        const bb = new THREE.Group();
        bb.position.set(14, 0, 0);

        // Body
        const bbGeo = new THREE.BoxGeometry(20, 2, 28);
        const bbMat = new THREE.MeshStandardMaterial({ color: 0xffffff, roughness: 0.4 });
        const body = new THREE.Mesh(bbGeo, bbMat);
        body.position.y = 1;
        body.castShadow = true;
        body.receiveShadow = true;
        bb.add(body);

        // Power lines (+ and -)
        const redLineGeo = new THREE.BoxGeometry(0.4, 0.1, 25);
        const redMat = new THREE.MeshBasicMaterial({ color: 0xfca5a5 });
        const r1 = new THREE.Mesh(redLineGeo, redMat);
        r1.position.set(-8.5, 2.06, 0);
        bb.add(r1);

        const blueLineGeo = new THREE.BoxGeometry(0.4, 0.1, 25);
        const blueMat = new THREE.MeshBasicMaterial({ color: 0x93c5fd });
        const b1 = new THREE.Mesh(blueLineGeo, blueMat);
        b1.position.set(-7.5, 2.06, 0);
        bb.add(b1);

        // Center trough
        const troughGeo = new THREE.BoxGeometry(1.0, 0.2, 25);
        const trMat = new THREE.MeshBasicMaterial({ color: 0xe2e8f0 });
        const trough = new THREE.Mesh(troughGeo, trMat);
        trough.position.set(0, 2.06, 0);
        bb.add(trough);

        this.circuit3DGroup.add(bb);
    }

    add3DResistor(x, y, z, colorBand = 0xef4444) {
        const resGroup = new THREE.Group();
        resGroup.position.set(x, y, z);

        const bodyGeo = new THREE.CylinderGeometry(0.6, 0.6, 2.2, 16);
        const bodyMat = new THREE.MeshStandardMaterial({ color: 0xe2d4be, roughness: 0.5 });
        const body = new THREE.Mesh(bodyGeo, bodyMat);
        body.rotation.z = Math.PI / 2;
        body.position.y = 0.6;
        resGroup.add(body);

        const bandGeo = new THREE.CylinderGeometry(0.62, 0.62, 0.3, 16);
        const bandMat = new THREE.MeshStandardMaterial({ color: colorBand });
        const b1 = new THREE.Mesh(bandGeo, bandMat);
        b1.rotation.z = Math.PI / 2;
        b1.position.set(-0.5, 0.6, 0);
        resGroup.add(b1);

        this.circuit3DGroup.add(resGroup);
    }

    add3DLED(x, y, z, isLit = false) {
        const ledGroup = new THREE.Group();
        ledGroup.position.set(x, y, z);

        // Bulb
        const bulbGeo = new THREE.SphereGeometry(1.1, 16, 16);
        const bulbMat = new THREE.MeshStandardMaterial({
            color: isLit ? 0xe11d48 : 0xf43f5e,
            emissive: isLit ? 0xff0033 : 0x000000,
            emissiveIntensity: isLit ? 0.85 : 0.0,
            roughness: 0.2,
            transparent: true,
            opacity: 0.9
        });
        const bulb = new THREE.Mesh(bulbGeo, bulbMat);
        bulb.position.y = 1.8;
        ledGroup.add(bulb);

        if (isLit) {
            const light = new THREE.PointLight(0xff0033, 1.8, 12);
            light.position.set(0, 2.2, 0);
            ledGroup.add(light);
            this.animatedObjects.push(bulb);
        }

        this.circuit3DGroup.add(ledGroup);
    }

    add3DPushbutton(x, y, z) {
        const btnGroup = new THREE.Group();
        btnGroup.position.set(x, y, z);

        const baseGeo = new THREE.BoxGeometry(2.5, 1.2, 2.5);
        const baseMat = new THREE.MeshStandardMaterial({ color: 0x334155, roughness: 0.6 });
        const base = new THREE.Mesh(baseGeo, baseMat);
        base.position.y = 0.6;
        btnGroup.add(base);

        const capGeo = new THREE.CylinderGeometry(0.8, 0.8, 0.8, 16);
        const capMat = new THREE.MeshStandardMaterial({ color: 0xd32f2f, roughness: 0.3 });
        const cap = new THREE.Mesh(capGeo, capMat);
        cap.position.y = 1.4;
        btnGroup.add(cap);

        this.circuit3DGroup.add(btnGroup);
    }

    add3DLDR(x, y, z) {
        const ldrGroup = new THREE.Group();
        ldrGroup.position.set(x, y, z);

        const headGeo = new THREE.CylinderGeometry(1.2, 1.2, 0.5, 16);
        const headMat = new THREE.MeshStandardMaterial({ color: 0xd97706, roughness: 0.4 });
        const head = new THREE.Mesh(headGeo, headMat);
        head.position.y = 1.4;
        ldrGroup.add(head);

        const trackGeo = new THREE.TorusGeometry(0.7, 0.1, 8, 16);
        const trackMat = new THREE.MeshBasicMaterial({ color: 0x78350f });
        const track = new THREE.Mesh(trackGeo, trackMat);
        track.rotation.x = Math.PI / 2;
        track.position.y = 1.68;
        ldrGroup.add(track);

        this.circuit3DGroup.add(ldrGroup);
    }

    add3DJumperWire(startVec, endVec, wireColor = 0xef4444, isFlowing = false) {
        const midVec = new THREE.Vector3(
            (startVec.x + endVec.x) / 2,
            Math.max(startVec.y, endVec.y) + 9.5,
            (startVec.z + endVec.z) / 2
        );

        const curve = new THREE.QuadraticBezierCurve3(startVec, midVec, endVec);
        const tubeGeo = new THREE.TubeGeometry(curve, 32, 0.28, 8, false);
        const tubeMat = new THREE.MeshStandardMaterial({
            color: wireColor,
            roughness: 0.3,
            metalness: 0.1
        });
        const tube = new THREE.Mesh(tubeGeo, tubeMat);
        tube.castShadow = true;
        this.circuit3DGroup.add(tube);

        // Dupont Pin Headers at ends
        const pinGeo = new THREE.BoxGeometry(0.6, 1.4, 0.6);
        const pinMat = new THREE.MeshStandardMaterial({ color: 0x1e293b, roughness: 0.5 });
        const p1 = new THREE.Mesh(pinGeo, pinMat);
        p1.position.copy(startVec);
        p1.position.y -= 0.5;
        this.circuit3DGroup.add(p1);

        const p2 = new THREE.Mesh(pinGeo, pinMat);
        p2.position.copy(endVec);
        p2.position.y -= 0.5;
        this.circuit3DGroup.add(p2);
    }

    animate() {
        requestAnimationFrame(() => this.animate());

        if (this.controls) this.controls.update();

        // Pulsing LED effect
        if (this.animatedObjects.length > 0) {
            const time = Date.now() * 0.005;
            this.animatedObjects.forEach(obj => {
                if (obj.material && obj.material.emissiveIntensity !== undefined) {
                    obj.material.emissiveIntensity = 0.5 + Math.sin(time) * 0.35;
                }
            });
        }

        if (this.renderer && this.scene && this.camera) {
            this.renderer.render(this.scene, this.camera);
        }
    }
}

// Global initialization
window.ThreeStepCircuitViewer = ThreeStepCircuitViewer;
