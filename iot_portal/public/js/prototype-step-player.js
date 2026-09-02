/**
 * Prototype Step-by-Step Animated Player
 * Modelagem vetorial de alta precisão do Arduino Uno R3 e Protoboard.
 * Suporte a MÚLTIPLAS ATIVIDADES PRÁTICAS PROGRESSIVAS por módulo:
 * - Módulo 1:
 *   • Prática 1A: Circuito Básico (LED + Resistor 220Ω em 5V - Sem código)
 *   • Prática 1B: Controle Manual com Chave Pushbutton
 *   • Prática 1C: Primeiro Código no Arduino (Blink D13)
 *   • Prática 1D: Automação com Sensor LDR e Divisor de Tensão
 * - Módulo 2: PIR e Relé 5V
 * - Módulo 3: Telemetria DHT11
 * - Módulo 4: Mini Potenciômetro e Dashboard
 */

const MODULE_PRACTICES_DATA = {
    1: {
        currentPracticeKey: '1d',
        practices: {
            '1a': {
                id: '1a',
                title: "Prática 1A: Circuito Básico • LED e Resistor em 5V",
                badge: "Nível Zero • Sem Código",
                totalSteps: 4,
                activePinIds: ["5v", "gnd1"],
                steps: [
                    {
                        number: 1,
                        title: "Etapa 1: Posicionamento do Arduino e Protoboard",
                        desc: "Disponha o microcontrolador Arduino Uno R3 e a Protoboard de 400 pontos lado a lado.",
                        tip: "Nesta prática básica, o Arduino será usado apenas como fonte de alimentação regulada de 5V."
                    },
                    {
                        number: 2,
                        title: "Etapa 2: Inserção do Resistor de 220 Ω e LED Vermelho",
                        desc: "Encaixe o resistor de 220 Ω (Vermelho-Vermelho-Marrom) e o LED na protoboard. Conecte a perna longa do LED (Ânodo) na mesma coluna do resistor.",
                        tip: "Atenção à Polaridade: O ânodo (+) recebe a corrente que passa pelo resistor; o cátodo (-) fecha o circuito no terra (GND)."
                    },
                    {
                        number: 3,
                        title: "Etapa 3: Fiação da Alimentação (5V e GND)",
                        desc: "Ligue o jumper vermelho da porta 5V do Arduino ao resistor. Ligue o jumper preto da porta GND ao cátodo do LED.",
                        tip: "Passe o cursor sobre os fios para visualizar o caminho contínuo da corrente elétrica no circuito!"
                    },
                    {
                        number: 4,
                        title: "Etapa 4: Circuito Energizado e Funcionamento Contínuo",
                        desc: "Conecte o cabo USB ao computador. A corrente de 5V flui pelo resistor, que limita a corrente em seguros 15 mA, e o LED acende com luz estável e segura!",
                        tip: "Conceito: Você acaba de montar seu primeiro circuito eletrônico funcional sem necessidade de solda!"
                    }
                ]
            },
            '1b': {
                id: '1b',
                title: "Prática 1B: Controle Manual • Chave Pushbutton e LED",
                badge: "Interrupção Mecânica",
                totalSteps: 4,
                activePinIds: ["5v", "gnd1"],
                steps: [
                    {
                        number: 1,
                        title: "Etapa 1: Disposição do Botão Táctil (Pushbutton)",
                        desc: "Posicione o botão Pushbutton sobre o sulco central da protoboard, de modo que seus 4 terminais fiquem isolados em colunas diferentes.",
                        tip: "Funcionamento: O botão é do tipo 'Normalmente Aberto' (NA) e só conduz corrente enquanto for pressionado."
                    },
                    {
                        number: 2,
                        title: "Etapa 2: Conexão do LED e Resistor em Série",
                        desc: "Conecte o terminal de saída do botão ao resistor de 220 Ω e este ao ânodo do LED. Feche o cátodo no barramento de terra (GND).",
                        tip: "Circuito em Série: A corrente só consegue chegar ao LED se passar primeiro pelos contatos do botão e do resistor."
                    },
                    {
                        number: 3,
                        title: "Etapa 3: Fiação de Entrada de 5V e GND",
                        desc: "Conecte a porta 5V do Arduino no terminal de entrada do botão e a porta GND no cátodo do LED.",
                        tip: "Segurança: Ao abrir o circuito pelo botão, a tensão é cortada instantaneamente, protegendo os componentes."
                    },
                    {
                        number: 4,
                        title: "Etapa 4: Teste de Acionamento Mecânico",
                        desc: "Pressione o botão para fechar o contato elétrico: o LED acende instantaneamente! Solte o botão: o circuito abre e o LED apaga imediatamente.",
                        tip: "Aplicação: Este é o princípio de campainhas, teclados e interruptores industriais."
                    }
                ]
            },
            '1c': {
                id: '1c',
                title: "Prática 1C: Primeiro Código no Arduino • LED Blink na Porta D13",
                badge: "Programação C/C++",
                totalSteps: 5,
                activePinIds: ["d13", "gnd_top"],
                steps: [
                    {
                        number: 1,
                        title: "Etapa 1: Disposição do Hardware",
                        desc: "Posicione o Arduino e a protoboard. Agora o controle de energia será assumido pelo microcontrolador através de uma porta digital programável.",
                        tip: "Conceito: As portas digitais (D0 a D13) podem ser configuradas por software como SAÍDA (OUTPUT) para acionar dispositivos."
                    },
                    {
                        number: 2,
                        title: "Etapa 2: Inserção do LED e Resistor de 220 Ω",
                        desc: "Insira o resistor de 220 Ω e o LED na protoboard, alinhando o ânodo (+) com o resistor limitador.",
                        tip: "Dica: O resistor protege a porta do microcontrolador para não ultrapassar o limite máximo de 40 mA por pino."
                    },
                    {
                        number: 3,
                        title: "Etapa 3: Fiação do Sinal de Controle D13 e GND",
                        desc: "Ligue um jumper laranja da porta Digital D13 do Arduino ao resistor do LED. Ligue um jumper preto da porta GND ao cátodo do LED.",
                        tip: "Interação: Passe o mouse sobre o fio laranja para ver a rota de comando saindo do chip ATmega328P."
                    },
                    {
                        number: 4,
                        title: "Etapa 4: Carregamento do Código C/C++ (Blink)",
                        desc: "No Arduino IDE, envie o código com as funções pinMode(13, OUTPUT), digitalWrite(13, HIGH) e delay(1000).",
                        tip: "Entendimento: A função delay(1000) faz o microcontrolador aguardar 1000 milissegundos antes de apagar o LED."
                    },
                    {
                        number: 5,
                        title: "Etapa 5: Execução Automática e Pisca-Pisca Contínuo",
                        desc: "O LED pisca continuamente (1 segundo aceso, 1 segundo apagado) de forma totalmente autônoma controlada pelo microcontrolador!",
                        tip: "Parabéns: Você escreveu e executou seu primeiro programa embarcado no mundo físico!"
                    }
                ]
            },
            '1d': {
                id: '1d',
                title: "Prática 1D: Automação Inteligente • Sensor LDR & LED",
                badge: "Automação com Sensor",
                totalSteps: 5,
                activePinIds: ["5v", "gnd1", "a0", "d13"],
                steps: [
                    {
                        number: 1,
                        title: "Etapa 1: Posicionamento do Arduino Uno R3 e Protoboard",
                        desc: "Posicione o Arduino Uno R3 e a Protoboard na bancada, deixando espaço central para a fiação dos jumpers.",
                        tip: "Dica: Mantenha o cabo USB desconectado durante toda a fase de fiação para evitar curtos acidentais."
                    },
                    {
                        number: 2,
                        title: "Etapa 2: Inserção do LDR, Resistores e LED na Protoboard",
                        desc: "Insira o sensor Fotoresistor (LDR) nos furos destacados da protoboard. Conecte o resistor de 10 kΩ em série formando o divisor de tensão e insira o LED com o resistor limitador de 220 Ω.",
                        tip: "Atenção: Os furos em vermelho (5V), preto (GND), verde (A0) e laranja (D13) indicam exatamente onde cada terminal deve ser inserido."
                    },
                    {
                        number: 3,
                        title: "Etapa 3: Fiação da Alimentação (Portas 5V e GND)",
                        desc: "Ligue o jumper vermelho de 5V do Arduino na trilha positiva (+) e o jumper preto de GND na trilha negativa (-) de terra.",
                        tip: "Padrão de Cores: Utilize sempre vermelho para 5V e preto ou azul para GND para facilitar a manutenção visual."
                    },
                    {
                        number: 4,
                        title: "Etapa 4: Conexão dos Cabos de Sinal (Portas A0 e D13)",
                        desc: "Ligue o jumper verde do divisor de tensão do LDR à porta analógica A0. Ligue o jumper laranja da porta digital D13 ao resistor de 220 Ω do LED.",
                        tip: "Função: A porta A0 lê a luminosidade ambiente (0-1023) e a porta D13 aciona a lâmpada piloto."
                    },
                    {
                        number: 5,
                        title: "Etapa 5: Circuito Energizado e Teste de Funcionamento",
                        desc: "Conecte o cabo USB. Ao cobrir o sensor LDR (simulando escuro), a leitura em A0 cai abaixo do limiar (<500), o pino D13 envia sinal HIGH e o LED vermelho acende imediatamente!",
                        tip: "Validação: Abra o Monitor Serial no Arduino IDE (9600 baud) para acompanhar as leituras em tempo real."
                    }
                ]
            }
        }
    },
    2: {
        currentPracticeKey: '2a',
        practices: {
            '2a': {
                id: '2a',
                title: "Prática 2A: Entrada Digital com Pull-Up Interno (Botão em D2 & LED D13)",
                badge: "Portas Digitais & INPUT_PULLUP",
                totalSteps: 5,
                activePinIds: ["d2", "d13", "gnd_top"],
                steps: [
                    {
                        number: 1,
                        title: "Etapa 1: Posicionamento do Arduino Uno e Protoboard",
                        desc: "Disponha o Arduino Uno R3 e a Protoboard na bancada didática para montagem de entradas digitais sem resistores externos.",
                        tip: "Conceito: O microcontrolador ATmega328P possui resistores internos de pull-up (20kΩ a 50kΩ) ativáveis por software."
                    },
                    {
                        number: 2,
                        title: "Etapa 2: Inserção do Botão Pushbutton e LED com Resistor",
                        desc: "Insira o botão Pushbutton nos furos destacados (colunas de D2 e GND). Insira o LED com o resistor limitador de 220 Ω.",
                        tip: "Economia de Componentes: Com INPUT_PULLUP, o botão conecta diretamente o pino D2 ao GND ao ser pressionado."
                    },
                    {
                        number: 3,
                        title: "Etapa 3: Fiação da Entrada Digital D2 e Terra GND",
                        desc: "Ligue o jumper ciano da porta digital D2 a um terminal do botão. Ligue o jumper preto do outro terminal ao GND do Arduino.",
                        tip: "Lógica Invertida: Solto = 5V (HIGH); Pressionado = 0V (LOW)."
                    },
                    {
                        number: 4,
                        title: "Etapa 4: Fiação da Saída Digital D13 para o LED",
                        desc: "Conecte o jumper laranja da porta digital D13 ao resistor de 220 Ω do LED, fechando o cátodo no barramento de GND.",
                        tip: "Controle em Firmware: Quando digitalRead(2) == LOW, executamos digitalWrite(13, HIGH)."
                    },
                    {
                        number: 5,
                        title: "Etapa 5: Teste Operacional de Leitura Digital",
                        desc: "Alimente a placa. Ao pressionar o botão físico, a porta D2 detecta o nível LOW instantaneamente e o LED na porta D13 acende!",
                        tip: "Pronto: O estado lógico foi lido com sucesso e tratado em tempo real pelo firmware."
                    }
                ]
            },
            '2b': {
                id: '2b',
                title: "Prática 2B: Saída Analógica Simulada por PWM (Dimerização em D9 ~)",
                badge: "Modulação PWM & Dimerização",
                totalSteps: 5,
                activePinIds: ["d9", "gnd_top"],
                steps: [
                    {
                        number: 1,
                        title: "Etapa 1: Posicionamento dos Componentes para PWM",
                        desc: "Posicione o Arduino Uno R3 e a protoboard, identificando as portas marcadas com o símbolo til (~), como a porta D9.",
                        tip: "PWM: Permite simular tensões contínuas variáveis modulando a largura de pulsos de alta frequência (490 Hz / 980 Hz)."
                    },
                    {
                        number: 2,
                        title: "Etapa 2: Inserção do LED de Alto Brilho e Resistor 220 Ω",
                        desc: "Insira o LED vermelho ou azul na protoboard em série com o resistor de 220 Ω para limitação de corrente.",
                        tip: "Duty Cycle: A variação do ciclo de trabalho de 0% a 100% gera a percepção de variação de brilho (dimerização)."
                    },
                    {
                        number: 3,
                        title: "Etapa 3: Fiação da Porta PWM D9 ao Resistor do LED",
                        desc: "Ligue o jumper magenta da porta digital PWM D9 ao resistor limitador do LED.",
                        tip: "Função no Código: A função analogWrite(9, valor) aceita valores de 0 (0V eficaz) a 255 (5V eficaz)."
                    },
                    {
                        number: 4,
                        title: "Etapa 4: Conexão de Terra (GND)",
                        desc: "Ligue o jumper preto do cátodo do LED ao conector GND da barra de pinos do Arduino.",
                        tip: "Circuito Fechado: A corrente de pulso retorna pelo terra comum com segurança."
                    },
                    {
                        number: 5,
                        title: "Etapa 5: Teste de Dimerização Contínua (Efeito Fade)",
                        desc: "Energize o circuito. O LED aumentará e diminuirá suavemente de brilho de 0% a 100% de forma cíclica e automatizada!",
                        tip: "Aplicação Real: Dimerização de iluminação inteligente, controle de velocidade de motores DC e servomotores."
                    }
                ]
            },
            '2c': {
                id: '2c',
                title: "Prática 2C: Automação com Sensor PIR & Módulo Relé 5V",
                badge: "Detecção de Movimento & Potência",
                totalSteps: 5,
                activePinIds: ["5v", "gnd1", "d2", "d8"],
                steps: [
                    {
                        number: 1,
                        title: "Etapa 1: Posicionamento dos Dispositivos de Potência",
                        desc: "Disponha o Arduino Uno R3, a protoboard, o Sensor de Presença PIR HC-SR501 e o Módulo Relé 5V.",
                        tip: "Importante: Mantenha o módulo relé isolado para posterior conexão segura da carga externa."
                    },
                    {
                        number: 2,
                        title: "Etapa 2: Conexões de Alimentação do PIR e do Módulo Relé",
                        desc: "Ligue os pinos VCC do PIR e do Relé nos furos de 5V da protoboard. Ligue os pinos GND de ambos ao barramento de terra comum.",
                        tip: "Dica: Os furos em vermelho (5V) e preto (GND) fornecem energia simultânea para ambos os módulos."
                    },
                    {
                        number: 3,
                        title: "Etapa 3: Fiação do Sinal do Sensor PIR (Porta Digital D2)",
                        desc: "Conecte o pino central OUT do sensor PIR (furo ciano) à porta digital D2 do Arduino.",
                        tip: "Ajuste: Calibre o trimpot de temporização (Time Delay) do PIR para o tempo mínimo no teste inicial."
                    },
                    {
                        number: 4,
                        title: "Etapa 4: Fiação do Sinal de Controle do Relé (Porta Digital D8)",
                        desc: "Ligue o pino de controle IN do módulo Relé (furo roxo) à porta digital D8 do Arduino.",
                        tip: "Segurança: O módulo relé possui optoacoplador que isola eletricamente o microcontrolador da rede de potência."
                    },
                    {
                        number: 5,
                        title: "Etapa 5: Circuito Operacional e Teste de Comutação",
                        desc: "Alimente o Arduino. Ao movimentar a mão sobre o sensor PIR, a porta D2 detecta presença, o pino D8 envia pulso HIGH, o relé fecha os contatos com um 'click' e aciona a carga!",
                        tip: "Pronto: O sistema mantém a carga ligada pelo tempo programado (3s) e desliga em seguida."
                    }
                ]
            },
            '2d': {
                id: '2d',
                title: "Prática 2D: Alarme Inteligente com Sensor PIR & Buzzer Piezoelétrico",
                badge: "Alarme & Frequência Sonora",
                totalSteps: 5,
                activePinIds: ["5v", "gnd1", "d2", "d11"],
                steps: [
                    {
                        number: 1,
                        title: "Etapa 1: Disposição do Sensor PIR e Buzzer na Bancada",
                        desc: "Posicione o Arduino Uno R3, a protoboard, o Sensor PIR HC-SR501 e o Buzzer Piezoelétrico 5V.",
                        tip: "Buzzer Piezoelétrico: Converte pulsos elétricos de frequência em ondas sonoras audíveis (buzina/sirene)."
                    },
                    {
                        number: 2,
                        title: "Etapa 2: Inserção do Buzzer e Alimentação do Sensor PIR",
                        desc: "Insira o Buzzer Piezoelétrico na protoboard. Conecte os pinos VCC e GND do Sensor PIR às linhas de energia correspondentes.",
                        tip: "Polaridade: O terminal mais longo do buzzer ou marcado com (+) deve ser ligado ao pino de sinal."
                    },
                    {
                        number: 3,
                        title: "Etapa 3: Fiação do Sinal do Sensor PIR na Porta D2",
                        desc: "Conecte o pino OUT do sensor PIR à porta digital D2 do Arduino.",
                        tip: "Sinal: Ao detectar movimento térmico, o pino D2 sobe para nível HIGH (5V)."
                    },
                    {
                        number: 4,
                        title: "Etapa 4: Fiação do Buzzer na Porta PWM D11",
                        desc: "Ligue o jumper azul do terminal positivo do Buzzer à porta digital PWM D11. Feche o outro terminal no GND.",
                        tip: "Função tone(): O comando tone(11, 1200) gera uma frequência pura de 1200 Hz para simular um alarme de segurança."
                    },
                    {
                        number: 5,
                        title: "Etapa 5: Teste de Disparo do Sistema de Alarme",
                        desc: "Energize o sistema. Ao detectar presença no ambiente, o microcontrolador aciona o buzzer emitindo bipes sonoros de alerta e enviando mensagem de intrusão via Serial!",
                        tip: "Sucesso: O sistema de segurança predial autônomo está totalmente operacional."
                    }
                ]
            }
        }
    },
    3: {
        currentPracticeKey: '3b',
        practices: {
            '3b': {
                id: '3b',
                title: "Prática 3: Nó de Telemetria Ambiental (DHT11 & Nuvem)",
                badge: "Telemetria & MQTT",
                totalSteps: 5,
                activePinIds: ["5v", "gnd1", "d4", "d2"],
                steps: [
                    {
                        number: 1,
                        title: "Etapa 1: Posicionamento do Nó Sensor",
                        desc: "Disponha o microcontrolador Arduino Uno R3 e a protoboard na bancada, reservando o espaço para o sensor DHT11.",
                        tip: "Dica: Em projetos de campo com ESP32, o circuito pode ser alimentado diretamente via bateria de 3.7V."
                    },
                    {
                        number: 2,
                        title: "Etapa 2: Inserção do Sensor DHT11 e Resistor Pull-up",
                        desc: "Insira o sensor DHT11 nos 4 furos destacados. Conecte um resistor de 10 kΩ entre o pino 1 (5V) e o pino 2 (DATA) para estabilização da linha de dados.",
                        tip: "Furos Coloridos: Pino 1 = Vermelho (5V), Pino 2 = Âmbar (Dados), Pino 4 = Preto (GND)."
                    },
                    {
                        number: 3,
                        title: "Etapa 3: Alimentação e Conexão de Terra",
                        desc: "Ligue o Pino 1 (VCC) à porta 5V do Arduino e o Pino 4 (GND) à porta de terra GND.",
                        tip: "Atenção: O pino 3 do DHT11 não é conectado (NC)."
                    },
                    {
                        number: 4,
                        title: "Etapa 4: Fiação do Barramento de Dados e LED de Link",
                        desc: "Conecte o Pino 2 (DATA) do DHT11 à porta digital D4. Conecte um LED verde com resistor na porta D2 para sinalizar os pulsos MQTT.",
                        tip: "Protocolo: A biblioteca DHT decodifica os 40 bits seriais de temperatura e umidade enviados pelo sensor."
                    },
                    {
                        number: 5,
                        title: "Etapa 5: Transmissão de Telemetria e Publicação em Nuvem",
                        desc: "Conecte a alimentação. A cada 2 segundos, o LED de status pisca e o nó sensor emite o payload JSON formatado pronto para envio a Brokers MQTT e dashboards!",
                        tip: "Formato Gerado: {\"temp\":24.5,\"umid\":58.0,\"status\":\"ONLINE\"} pronto para a nuvem."
                    }
                ]
            }
        }
    },
    4: {
        currentPracticeKey: '4b',
        practices: {
            '4b': {
                id: '4b',
                title: "Prática 4: Interface Gráfica e Controle Bidirecional",
                badge: "Web Dashboard & IoT",
                totalSteps: 5,
                activePinIds: ["5v", "gnd1", "a0", "d13"],
                steps: [
                    {
                        number: 1,
                        title: "Etapa 1: Disposição do Hardware de Interação",
                        desc: "Posicione o Arduino Uno R3, a protoboard, o mini potenciômetro analógico e o LED sinalizador na bancada.",
                        tip: "Objetivo: Enviar dados analógicos em tempo real para a página web e receber comandos remotos de acionamento."
                    },
                    {
                        number: 2,
                        title: "Etapa 2: Inserção do Potenciômetro na Protoboard",
                        desc: "Insira os 3 terminais do mini potenciômetro nos furos destacados da protoboard: Terminal Esquerdo no 5V (vermelho), Wiper Central no sinal A0 (verde esmeralda) e Terminal Direito no GND (preto).",
                        tip: "Divisor Variável: O terminal central varia de 0V a 5V linearmente conforme o estudante gira o eixo."
                    },
                    {
                        number: 3,
                        title: "Etapa 3: Fiação da Alimentação (Portas 5V e GND)",
                        desc: "Ligue os cabos de alimentação 5V (vermelho) e GND (preto) do Arduino aos terminais laterais do potenciômetro.",
                        tip: "Passe o mouse sobre os fios para destacar o circuito completo e a rota da corrente elétrica!"
                    },
                    {
                        number: 4,
                        title: "Etapa 4: Fiação do Sinal A0 e LED de Atuação Remota D13",
                        desc: "Puxe o jumper verde esmeralda do pino central do potenciômetro até a porta analógica A0. Ligue o jumper laranja de comando D13 ao LED de carga.",
                        tip: "Controle Web: A porta A0 alimenta o gráfico em tempo real e a porta D13 recebe os comandos do dashboard."
                    },
                    {
                        number: 5,
                        title: "Etapa 5: Integração Completa com o Dashboard Web",
                        desc: "Circuito totalmente integrado! O potenciômetro alimenta o gráfico em tempo real com Chart.js e os botões da página acionam o LED físico instantaneamente com feedback de confirmação!",
                        tip: "Sucesso: O ecossistema completo de IoT (Hardware + Firmware + Protocolo + Dashboard) está operando."
                    }
                ]
            }
        }
    }
};

const ARDUINO_PIN_DEFINITIONS = {
    // Top Digital Pins
    "scl": { name: "Porta SCL", type: "I2C Clock", desc: "Barramento I2C Clock" },
    "sda": { name: "Porta SDA", type: "I2C Data", desc: "Barramento I2C Dados" },
    "aref": { name: "Pino AREF", type: "Analog Reference", desc: "Tensão de Referência do ADC" },
    "gnd_top": { name: "Porta GND", type: "Ground", desc: "Terra Digital (0V)" },
    "d13": { name: "Porta Digital D13", type: "Digital I/O / LED", desc: "Pino Digital 13 (com LED integrado na placa)" },
    "d12": { name: "Porta Digital D12", type: "Digital I/O", desc: "Pino Digital 12" },
    "d11": { name: "Porta Digital D11 ~", type: "PWM / Digital I/O", desc: "Pino Digital 11 com suporte a PWM" },
    "d10": { name: "Porta Digital D10 ~", type: "PWM / Digital I/O", desc: "Pino Digital 10 com suporte a PWM" },
    "d9": { name: "Porta Digital D9 ~", type: "PWM / Digital I/O", desc: "Pino Digital 9 com suporte a PWM" },
    "d8": { name: "Porta Digital D8", type: "Digital I/O", desc: "Pino Digital 8" },
    "d7": { name: "Porta Digital D7", type: "Digital I/O", desc: "Pino Digital 7" },
    "d6": { name: "Porta Digital D6 ~", type: "PWM / Digital I/O", desc: "Pino Digital 6 com suporte a PWM" },
    "d5": { name: "Porta Digital D5 ~", type: "PWM / Digital I/O", desc: "Pino Digital 5 com suporte a PWM" },
    "d4": { name: "Porta Digital D4", type: "Digital I/O", desc: "Pino Digital 4 (Single-Bus / Comunicação)" },
    "d3": { name: "Porta Digital D3 ~", type: "PWM / Digital I/O", desc: "Pino Digital 3 com suporte a PWM" },
    "d2": { name: "Porta Digital D2", type: "Digital I/O / INT0", desc: "Pino Digital 2 (com Interrupção Externa)" },
    "tx": { name: "Porta TX > 1", type: "Serial TX", desc: "Transmissão Serial UART (Pino 1)" },
    "rx": { name: "Porta RX < 0", type: "Serial RX", desc: "Recepção Serial UART (Pino 0)" },

    // Bottom Power & Analog Pins
    "nc": { name: "Pino NC", type: "No Connection", desc: "Não Conectado" },
    "ioref": { name: "Pino IOREF", type: "Voltage Ref", desc: "Referência de 5.0V para shields" },
    "reset": { name: "Pino RESET", type: "System Reset", desc: "Reinicia o Microcontrolador (nível LOW)" },
    "3v3": { name: "Porta 3.3V", type: "Power Output", desc: "Saída regulada de 3.3V (até 50mA)" },
    "5v": { name: "Porta 5V", type: "Power Output", desc: "Alimentação Principal de 5.0V da placa" },
    "gnd1": { name: "Porta GND", type: "Ground", desc: "Terra Comum da Placa (0V)" },
    "gnd2": { name: "Porta GND", type: "Ground", desc: "Terra Comum da Placa (0V)" },
    "vin": { name: "Porta VIN", type: "Power Input", desc: "Entrada de Alimentação Externa (7V a 12V)" },
    "a0": { name: "Porta Analógica A0", type: "Analog Input", desc: "Entrada Analógica 0 (ADC 10 bits: 0 a 1023)" },
    "a1": { name: "Porta Analógica A1", type: "Analog Input", desc: "Entrada Analógica 1 (ADC 10 bits: 0 a 1023)" },
    "a2": { name: "Porta Analógica A2", type: "Analog Input", desc: "Entrada Analógica 2 (ADC 10 bits: 0 a 1023)" },
    "a3": { name: "Porta Analógica A3", type: "Analog Input", desc: "Entrada Analógica 3 (ADC 10 bits: 0 a 1023)" },
    "a4": { name: "Porta Analógica A4", type: "Analog Input / SDA", desc: "Entrada Analógica 4 / I2C SDA" },
    "a5": { name: "Porta Analógica A5", type: "Analog Input / SCL", desc: "Entrada Analógica 5 / I2C SCL" }
};

class PrototypeStepPlayer {
    constructor(containerId, moduleId) {
        this.container = document.getElementById(containerId);
        if (!this.container) return;

        this.moduleId = parseInt(moduleId) || 1;
        this.moduleData = MODULE_PRACTICES_DATA[this.moduleId] || MODULE_PRACTICES_DATA[1];
        this.currentPracticeKey = this.moduleData.currentPracticeKey || Object.keys(this.moduleData.practices)[0];
        this.currentPractice = this.moduleData.practices[this.currentPracticeKey];
        this.currentStep = 1;
        this.isPlaying = false;
        this.playInterval = null;

        this.renderPlayerStructure();
        this.updateStepView(1);
    }

    renderPlayerStructure() {
        const practiceKeys = Object.keys(this.moduleData.practices);

        this.container.innerHTML = `
            <div class="step-player-card">
                <!-- Seletor de Práticas Progressivas do Módulo -->
                <div class="practice-switcher-bar">
                    <span class="practice-switcher-label">Selecione a Prática:</span>
                    <div class="practice-switcher-buttons">
                        ${practiceKeys.map(key => {
                            const p = this.moduleData.practices[key];
                            return `
                                <button class="practice-switch-btn ${key === this.currentPracticeKey ? 'active' : ''}" data-practice-key="${key}">
                                    ${p.title.split(':')[0]} • <small>${p.badge}</small>
                                </button>
                            `;
                        }).join('')}
                    </div>
                </div>

                <div class="step-player-header">
                    <div class="step-player-title">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        <span id="practicePlayerTitle">${this.currentPractice.title}</span>
                    </div>
                    <div class="step-nav-pills" id="stepPillsContainer">
                        <!-- Step pills injected dynamically -->
                    </div>
                </div>

                <div class="step-player-canvas-wrapper">
                    <svg id="schematicSvg" viewBox="0 0 900 460" class="schematic-vector-svg">
                        <!-- SVG elements rendered dynamically -->
                    </svg>
                    
                    <!-- Floating Interactive Pin & Wire HUD on Mouse Hover -->
                    <div id="pinHoverTooltip" class="pin-hover-tooltip" style="display: none;"></div>

                    <div class="step-floating-badge" id="stepCounterBadge">Etapa 1 de ${this.currentPractice.totalSteps}</div>
                </div>

                <div class="step-info-card" id="stepInfoContainer">
                    <!-- Step description injected here -->
                </div>

                <div class="step-player-toolbar">
                    <div class="player-left-controls">
                        <button class="player-btn" id="btnPrevStep">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>
                            Etapa Anterior
                        </button>
                        <button class="player-btn primary" id="btnNextStep">
                            Próxima Etapa
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </button>
                    </div>
                    
                    <div class="player-right-controls">
                        <button class="player-btn secondary" id="btnAutoPlay">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                            Auto-Play
                        </button>
                        <button class="player-btn secondary" id="btnResetStep">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><path d="M3 3v5h5"></path></svg>
                            Reiniciar
                        </button>
                    </div>
                </div>
            </div>
        `;

        this.bindEvents();
    }

    bindEvents() {
        const btnPrev = this.container.querySelector('#btnPrevStep');
        const btnNext = this.container.querySelector('#btnNextStep');
        const btnAutoPlay = this.container.querySelector('#btnAutoPlay');
        const btnReset = this.container.querySelector('#btnResetStep');
        const practiceBtns = this.container.querySelectorAll('.practice-switch-btn');

        practiceBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const key = btn.dataset.practiceKey;
                this.switchPractice(key);
            });
        });

        btnPrev.addEventListener('click', () => {
            if (this.currentStep > 1) this.goToStep(this.currentStep - 1);
        });

        btnNext.addEventListener('click', () => {
            if (this.currentStep < this.currentPractice.totalSteps) this.goToStep(this.currentStep + 1);
            else this.goToStep(1);
        });

        btnReset.addEventListener('click', () => {
            this.stopAutoPlay();
            this.goToStep(1);
        });

        btnAutoPlay.addEventListener('click', () => {
            if (this.isPlaying) {
                this.stopAutoPlay();
            } else {
                this.startAutoPlay();
            }
        });

        this.bindTooltipEvents();
    }

    switchPractice(practiceKey) {
        if (!this.moduleData.practices[practiceKey]) return;
        this.stopAutoPlay();
        this.currentPracticeKey = practiceKey;
        this.currentPractice = this.moduleData.practices[practiceKey];
        this.currentStep = 1;

        // Update practice switcher active state
        this.container.querySelectorAll('.practice-switch-btn').forEach(b => {
            if (b.dataset.practiceKey === practiceKey) b.classList.add('active');
            else b.classList.remove('active');
        });

        // Update title
        const titleEl = this.container.querySelector('#practicePlayerTitle');
        if (titleEl) titleEl.innerText = this.currentPractice.title;

        this.updateStepView(1);
    }

    bindTooltipEvents() {
        const tooltip = this.container.querySelector('#pinHoverTooltip');
        const canvasWrapper = this.container.querySelector('.step-player-canvas-wrapper');
        const svg = this.container.querySelector('#schematicSvg');
        if (!tooltip || !canvasWrapper || !svg) return;

        canvasWrapper.addEventListener('mousemove', (e) => {
            const wireTarget = e.target.closest('.circuit-wire-trace');
            const pinTarget = e.target.closest('.interactive-pin');

            if (wireTarget) {
                const traceName = wireTarget.dataset.traceName || 'Conexão';
                const fromDesc = wireTarget.dataset.fromDesc || '';
                const toDesc = wireTarget.dataset.toDesc || '';
                const color = wireTarget.dataset.traceColor || '#38bdf8';

                svg.classList.add('trace-inspect-mode');
                svg.querySelectorAll('.circuit-wire-trace').forEach(el => {
                    if (el === wireTarget) el.classList.add('trace-highlighted');
                    else el.classList.remove('trace-highlighted');
                });

                const pinId = wireTarget.dataset.arduinoPin;
                if (pinId) {
                    svg.querySelectorAll(`.interactive-pin[data-pin-id="${pinId}"]`).forEach(p => p.classList.add('pin-spotlight'));
                }

                tooltip.innerHTML = `
                    <div class="tooltip-header">
                        <span class="tooltip-circuit-dot" style="background:${color};"></span>
                        <span class="tooltip-pin-name">${traceName}</span>
                        <span class="tooltip-active-tag" style="background:${color};">CIRCUITO ATIVO</span>
                    </div>
                    <div class="tooltip-circuit-route">
                        <div class="route-point"><strong>Origem:</strong> ${fromDesc}</div>
                        <div class="route-arrow">⬇ Ligação Direta por Jumper ⬇</div>
                        <div class="route-point"><strong>Destino:</strong> ${toDesc}</div>
                    </div>
                `;
                tooltip.style.display = 'block';

                const rect = canvasWrapper.getBoundingClientRect();
                const mouseX = e.clientX - rect.left;
                const mouseY = e.clientY - rect.top;

                tooltip.style.left = `${Math.min(mouseX + 16, rect.width - 290)}px`;
                tooltip.style.top = `${Math.max(mouseY - 70, 10)}px`;
                return;
            } else if (pinTarget) {
                const pinId = pinTarget.dataset.pinId;
                const pinInfo = ARDUINO_PIN_DEFINITIONS[pinId];
                if (pinInfo) {
                    const isActive = pinTarget.dataset.isActive === 'true';
                    tooltip.innerHTML = `
                        <div class="tooltip-header">
                            <span class="tooltip-pin-name">${pinInfo.name}</span>
                            ${isActive ? '<span class="tooltip-active-tag">EM USO</span>' : '<span class="tooltip-inactive-tag">Livre</span>'}
                        </div>
                        <div class="tooltip-body">${pinInfo.desc}</div>
                    `;
                    tooltip.style.display = 'block';

                    const rect = canvasWrapper.getBoundingClientRect();
                    const mouseX = e.clientX - rect.left;
                    const mouseY = e.clientY - rect.top;

                    tooltip.style.left = `${mouseX + 12}px`;
                    tooltip.style.top = `${mouseY - 38}px`;
                }
                return;
            }

            svg.classList.remove('trace-inspect-mode');
            svg.querySelectorAll('.circuit-wire-trace').forEach(el => el.classList.remove('trace-highlighted'));
            svg.querySelectorAll('.pin-spotlight').forEach(el => el.classList.remove('pin-spotlight'));
            tooltip.style.display = 'none';
        });

        canvasWrapper.addEventListener('mouseleave', () => {
            svg.classList.remove('trace-inspect-mode');
            svg.querySelectorAll('.circuit-wire-trace').forEach(el => el.classList.remove('trace-highlighted'));
            svg.querySelectorAll('.pin-spotlight').forEach(el => el.classList.remove('pin-spotlight'));
            tooltip.style.display = 'none';
        });
    }

    startAutoPlay() {
        this.isPlaying = true;
        const btn = this.container.querySelector('#btnAutoPlay');
        if (btn) {
            btn.innerHTML = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect></svg> Pausar`;
            btn.classList.add('playing');
        }

        this.playInterval = setInterval(() => {
            if (this.currentStep < this.currentPractice.totalSteps) {
                this.goToStep(this.currentStep + 1);
            } else {
                this.goToStep(1);
            }
        }, 3400);
    }

    stopAutoPlay() {
        this.isPlaying = false;
        if (this.playInterval) clearInterval(this.playInterval);
        const btn = this.container.querySelector('#btnAutoPlay');
        if (btn) {
            btn.innerHTML = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg> Auto-Play`;
            btn.classList.remove('playing');
        }
    }

    goToStep(stepNumber) {
        this.currentStep = stepNumber;
        this.updateStepView(stepNumber);
    }

    updateStepView(stepNumber) {
        const step = this.currentPractice.steps[stepNumber - 1];

        // Rebuild step pills for the current practice
        const pillsContainer = this.container.querySelector('#stepPillsContainer');
        if (pillsContainer) {
            let pillsHtml = '';
            for (let i = 1; i <= this.currentPractice.totalSteps; i++) {
                pillsHtml += `
                    <button class="step-pill-btn ${i === stepNumber ? 'active' : ''}" data-step="${i}">
                        Etapa ${i}
                    </button>
                `;
            }
            pillsContainer.innerHTML = pillsHtml;

            this.container.querySelectorAll('.step-pill-btn').forEach(pill => {
                pill.addEventListener('click', () => {
                    const s = parseInt(pill.dataset.step);
                    this.goToStep(s);
                });
            });
        }

        const badge = this.container.querySelector('#stepCounterBadge');
        if (badge) badge.innerText = `Etapa ${stepNumber} de ${this.currentPractice.totalSteps}`;

        const info = this.container.querySelector('#stepInfoContainer');
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

        this.drawSchematicSvg(stepNumber);
    }

    drawSchematicSvg(step) {
        const svg = this.container.querySelector('#schematicSvg');
        if (!svg) return;

        let content = `
            <defs>
                <linearGradient id="pcbTeal" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#00838f" />
                    <stop offset="60%" stop-color="#006064" />
                    <stop offset="100%" stop-color="#004d40" />
                </linearGradient>
                
                <linearGradient id="metalSilver" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#f1f5f9" />
                    <stop offset="50%" stop-color="#cbd5e1" />
                    <stop offset="100%" stop-color="#94a3b8" />
                </linearGradient>

                <linearGradient id="bbWhite" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#ffffff" />
                    <stop offset="100%" stop-color="#f8fafc" />
                </linearGradient>

                <filter id="pcbShadow" x="-5%" y="-5%" width="115%" height="115%">
                    <feDropShadow dx="2" dy="5" stdDeviation="3" flood-color="#0f172a" flood-opacity="0.12" />
                </filter>

                <filter id="wireShadow" x="-10%" y="-10%" width="130%" height="130%">
                    <feDropShadow dx="1" dy="3" stdDeviation="2" flood-color="#0f172a" flood-opacity="0.18" />
                </filter>

                <filter id="glowEffect" x="-30%" y="-30%" width="160%" height="160%">
                    <feGaussianBlur stdDeviation="4" result="blur" />
                    <feComposite in="SourceGraphic" in2="blur" operator="over" />
                </filter>

                <style>
                    .interactive-pin {
                        cursor: pointer;
                        transition: transform 0.15s ease, filter 0.2s ease;
                    }
                    .interactive-pin:hover rect {
                        filter: drop-shadow(0 0 6px #38bdf8);
                    }
                    .pin-spotlight rect {
                        filter: drop-shadow(0 0 10px #38bdf8) !important;
                        stroke: #ffffff !important;
                        stroke-width: 2.2px !important;
                    }
                    .active-wire {
                        stroke-dasharray: 8 6;
                        animation: dashFlow 1.2s linear infinite;
                    }
                    @keyframes dashFlow {
                        to {
                            stroke-dashoffset: -28;
                        }
                    }
                    .pulsing-led {
                        animation: ledBlink 1s ease-in-out infinite alternate;
                    }
                    @keyframes ledBlink {
                        0% { opacity: 0.6; }
                        100% { opacity: 1; filter: drop-shadow(0 0 8px #ef4444); }
                    }

                    .circuit-wire-trace {
                        cursor: pointer;
                        transition: opacity 0.25s ease, filter 0.25s ease, stroke-width 0.2s ease;
                    }
                    .schematic-vector-svg.trace-inspect-mode .circuit-wire-trace {
                        opacity: 0.2;
                    }
                    .schematic-vector-svg.trace-inspect-mode #arduinoUnoR3,
                    .schematic-vector-svg.trace-inspect-mode #breadboard {
                        opacity: 0.45;
                        transition: opacity 0.25s ease;
                    }
                    .circuit-wire-trace.trace-highlighted {
                        opacity: 1 !important;
                        filter: drop-shadow(0 0 10px currentColor);
                    }
                    .circuit-wire-trace.trace-highlighted path {
                        stroke-width: 5.5px !important;
                    }
                    .circuit-wire-trace.trace-highlighted .circuit-endpoint-dot {
                        transform: scale(1.35);
                        transform-origin: center;
                    }
                </style>
            </defs>

            <!-- Background Workspace Grid -->
            <pattern id="bgGrid" width="24" height="24" patternUnits="userSpaceOnUse">
                <path d="M 24 0 L 0 0 0 24" fill="none" stroke="#e2e8f0" stroke-width="0.8"/>
            </pattern>
            <rect width="100%" height="100%" fill="url(#bgGrid)" />

            <!-- ARDUINO UNO R3 -->
            <g id="arduinoUnoR3" transform="translate(45, 55)" filter="url(#pcbShadow)">
                <path d="M 12 0 
                         L 278 0 A 10 10 0 0 1 288 10 
                         L 288 190 A 10 10 0 0 1 278 200 
                         L 12 200 A 10 10 0 0 1 2 190 
                         L 2 135 L 0 135 L 0 65 L 2 65 
                         L 2 10 A 10 10 0 0 1 12 0 Z" 
                      fill="url(#pcbTeal)" stroke="#004d40" stroke-width="2"/>

                <circle cx="15" cy="188" r="7" fill="none" stroke="#b45309" stroke-width="2"/>
                <circle cx="15" cy="188" r="4" fill="#f8fafc" stroke="#cbd5e1"/>
                <circle cx="15" cy="12" r="7" fill="none" stroke="#b45309" stroke-width="2"/>
                <circle cx="15" cy="12" r="4" fill="#f8fafc" stroke="#cbd5e1"/>
                <circle cx="272" cy="70" r="7" fill="none" stroke="#b45309" stroke-width="2"/>
                <circle cx="272" cy="70" r="4" fill="#f8fafc" stroke="#cbd5e1"/>
                <circle cx="272" cy="188" r="7" fill="none" stroke="#b45309" stroke-width="2"/>
                <circle cx="272" cy="188" r="4" fill="#f8fafc" stroke="#cbd5e1"/>

                <!-- USB Type-B -->
                <rect x="-18" y="25" width="44" height="48" rx="3" fill="url(#metalSilver)" stroke="#64748b" stroke-width="2"/>
                <rect x="-12" y="32" width="10" height="34" rx="2" fill="#334155"/>
                <text x="3" y="53" font-size="9" font-family="'JetBrains Mono', monospace" font-weight="bold" fill="#334155">USB</text>

                <!-- DC Power Jack -->
                <rect x="-18" y="120" width="50" height="46" rx="4" fill="#1e293b" stroke="#0f172a" stroke-width="2"/>
                <circle cx="-2" cy="143" r="6" fill="#0f172a"/>
                <circle cx="-2" cy="143" r="3" fill="#cbd5e1"/>

                <!-- Reset Button -->
                <rect x="52" y="14" width="18" height="18" rx="2" fill="#cbd5e1" stroke="#64748b" stroke-width="1"/>
                <circle cx="61" cy="23" r="5" fill="#dc2626" stroke="#991b1b" stroke-width="1"/>
                <text x="48" y="42" font-size="7.5" font-family="sans-serif" font-weight="bold" fill="#ffffff">RESET</text>

                <!-- Crystal 16 MHz -->
                <rect x="86" y="125" width="16" height="26" rx="8" fill="url(#metalSilver)" stroke="#64748b" stroke-width="1"/>
                <text x="88" y="141" font-size="6" font-family="monospace" fill="#0f172a" font-weight="bold">16.0</text>

                <!-- ATmega328P DIP -->
                <rect x="125" y="112" width="115" height="38" rx="2" fill="#0f172a" stroke="#334155" stroke-width="1.5"/>
                <path d="M 125 126 A 5 5 0 0 1 125 136 Z" fill="#334155"/>

                <!-- Header Strip (Top Digital Pins) -->
                <rect x="80" y="6" width="198" height="18" fill="#1e293b" rx="2" stroke="#0f172a" stroke-width="1"/>
                ${this.renderTopDigitalSockets()}

                <!-- Header Strip (Bottom Power & Analog Pins) -->
                <rect x="80" y="176" width="198" height="18" fill="#1e293b" rx="2" stroke="#0f172a" stroke-width="1"/>
                ${this.renderBottomPowerAnalogSockets()}

                <!-- Power ON LED -->
                <rect x="98" y="60" width="8" height="6" rx="1" fill="#334155"/>
                <circle cx="102" cy="63" r="2.5" fill="${step >= 4 ? '#22c55e' : '#64748b'}" filter="${step >= 4 ? 'url(#glowEffect)' : 'none'}"/>
                <text x="96" y="55" font-size="7" font-family="sans-serif" font-weight="bold" fill="#ffffff">ON</text>
            </g>

            <!-- PROTOBOARD -->
            <g id="breadboard" transform="translate(470, 45)" filter="url(#pcbShadow)">
                <rect x="0" y="0" width="365" height="250" rx="8" fill="url(#bbWhite)" stroke="#cbd5e1" stroke-width="2"/>
                
                <!-- Power Rails -->
                <line x1="20" y1="18" x2="345" y2="18" stroke="#fca5a5" stroke-width="1.2" stroke-dasharray="6 3" opacity="0.65"/>
                <line x1="20" y1="34" x2="345" y2="34" stroke="#93c5fd" stroke-width="1.2" stroke-dasharray="6 3" opacity="0.65"/>
                <text x="7" y="21" font-size="10" font-weight="bold" fill="#f87171" opacity="0.75">+</text>
                <text x="350" y="21" font-size="10" font-weight="bold" fill="#f87171" opacity="0.75">+</text>
                <text x="8" y="37" font-size="12" font-weight="bold" fill="#60a5fa" opacity="0.75">-</text>
                <text x="351" y="37" font-size="12" font-weight="bold" fill="#60a5fa" opacity="0.75">-</text>

                <line x1="20" y1="216" x2="345" y2="216" stroke="#93c5fd" stroke-width="1.2" stroke-dasharray="6 3" opacity="0.65"/>
                <line x1="20" y1="232" x2="345" y2="232" stroke="#fca5a5" stroke-width="1.2" stroke-dasharray="6 3" opacity="0.65"/>
                <text x="8" y="219" font-size="12" font-weight="bold" fill="#60a5fa" opacity="0.75">-</text>
                <text x="351" y="219" font-size="12" font-weight="bold" fill="#60a5fa" opacity="0.75">-</text>
                <text x="7" y="235" font-size="10" font-weight="bold" fill="#f87171" opacity="0.75">+</text>
                <text x="350" y="235" font-size="10" font-weight="bold" fill="#f87171" opacity="0.75">+</text>

                <!-- Central Trough -->
                <rect x="15" y="120" width="335" height="10" fill="#f1f5f9" stroke="#e2e8f0" stroke-width="0.5" rx="1"/>

                ${this.generateDetailedBreadboardHoles()}
            </g>
        `;

        content += this.getPracticeSpecificSvgContent(this.currentPracticeKey, step);

        svg.innerHTML = content;
    }

    renderTopDigitalSockets() {
        const pins = [
            "scl", "sda", "aref", "gnd_top",
            "d13", "d12", "d11", "d10", "d9", "d8",
            "d7", "d6", "d5", "d4", "d3", "d2", "tx", "rx"
        ];

        let out = '';
        pins.forEach((pinId, idx) => {
            const px = 85 + (idx * 10.5);
            const isActive = this.currentPractice.activePinIds && this.currentPractice.activePinIds.includes(pinId);
            const pinDef = ARDUINO_PIN_DEFINITIONS[pinId];
            const displayLabel = pinId.replace('gnd_top', 'GND').toUpperCase();
            
            out += `
                <g class="interactive-pin ${isActive ? 'pin-spotlight' : ''}" data-pin-id="${pinId}" data-is-active="${isActive}">
                    <title>${pinDef ? `${pinDef.name} - ${pinDef.desc}` : ''}</title>
                    <rect x="${px}" y="10" width="7.5" height="10" rx="1.5" 
                          fill="${isActive ? '#0284c7' : '#0f172a'}" 
                          stroke="${isActive ? '#38bdf8' : '#334155'}" 
                          stroke-width="${isActive ? 1.8 : 0.5}"/>
                    <circle cx="${px + 3.7}" cy="15" r="1.8" fill="${isActive ? '#ffffff' : '#475569'}"/>
                    ${isActive ? `
                        <!-- Rótulo visível apenas na porta em uso -->
                        <rect x="${px - 1}" y="23" width="9.5" height="9" rx="2" fill="#0284c7" stroke="#38bdf8" stroke-width="0.8"/>
                        <text x="${px + 3.7}" y="30" font-size="6.5" font-family="'JetBrains Mono', monospace" font-weight="900" fill="#ffffff" text-anchor="middle">${displayLabel}</text>
                    ` : ''}
                </g>
            `;
        });
        return out;
    }

    renderBottomPowerAnalogSockets() {
        const pins = [
            "nc", "ioref", "reset", "3v3", "5v", "gnd1", "gnd2", "vin",
            "", "",
            "a0", "a1", "a2", "a3", "a4", "a5"
        ];

        let out = '';
        pins.forEach((pinId, idx) => {
            const px = 85 + (idx * 10.5);
            if (!pinId) return;
            const isActive = this.currentPractice.activePinIds && this.currentPractice.activePinIds.includes(pinId);
            const pinDef = ARDUINO_PIN_DEFINITIONS[pinId];
            const displayLabel = pinId.replace(/gnd[12]/, 'GND').toUpperCase();

            out += `
                <g class="interactive-pin ${isActive ? 'pin-spotlight' : ''}" data-pin-id="${pinId}" data-is-active="${isActive}">
                    <title>${pinDef ? `${pinDef.name} - ${pinDef.desc}` : ''}</title>
                    <rect x="${px}" y="180" width="7.5" height="10" rx="1.5" 
                          fill="${isActive ? '#ea580c' : '#0f172a'}" 
                          stroke="${isActive ? '#fb923c' : '#334155'}" 
                          stroke-width="${isActive ? 1.8 : 0.5}"/>
                    <circle cx="${px + 3.7}" cy="185" r="1.8" fill="${isActive ? '#ffffff' : '#475569'}"/>
                    ${isActive ? `
                        <!-- Rótulo visível apenas na porta em uso -->
                        <rect x="${px - 1}" y="168" width="9.5" height="9" rx="2" fill="#ea580c" stroke="#fb923c" stroke-width="0.8"/>
                        <text x="${px + 3.7}" y="175" font-size="6.5" font-family="'JetBrains Mono', monospace" font-weight="900" fill="#ffffff" text-anchor="middle">${displayLabel}</text>
                    ` : ''}
                </g>
            `;
        });
        return out;
    }

    generateDetailedBreadboardHoles() {
        let holes = '';
        for (let x = 28; x <= 335; x += 11.5) {
            holes += `<rect x="${x}" y="15" width="4.5" height="5" rx="1" fill="#e2e8f0" stroke="#cbd5e1" stroke-width="0.6"/>`;
            holes += `<rect x="${x}" y="31" width="4.5" height="5" rx="1" fill="#e2e8f0" stroke="#cbd5e1" stroke-width="0.6"/>`;
        }
        for (let x = 28; x <= 335; x += 11.5) {
            for (let y = 62; y <= 110; y += 12) {
                holes += `<rect x="${x}" y="${y}" width="4.5" height="5" rx="1" fill="#e2e8f0" stroke="#cbd5e1" stroke-width="0.6"/>`;
            }
        }
        for (let x = 28; x <= 335; x += 11.5) {
            for (let y = 138; y <= 186; y += 12) {
                holes += `<rect x="${x}" y="${y}" width="4.5" height="5" rx="1" fill="#e2e8f0" stroke="#cbd5e1" stroke-width="0.6"/>`;
            }
        }
        for (let x = 28; x <= 335; x += 11.5) {
            holes += `<rect x="${x}" y="213" width="4.5" height="5" rx="1" fill="#e2e8f0" stroke="#cbd5e1" stroke-width="0.6"/>`;
            holes += `<rect x="${x}" y="229" width="4.5" height="5" rx="1" fill="#e2e8f0" stroke="#cbd5e1" stroke-width="0.6"/>`;
        }
        return holes;
    }

    renderPaintedBreadboardHole(absX, absY, color, labelText = "") {
        return `
            <g filter="url(#wireShadow)">
                <rect x="${absX - 3}" y="${absY - 3}" width="6.5" height="6.5" rx="1.5" fill="${color}" stroke="#ffffff" stroke-width="1.2"/>
                <circle cx="${absX + 0.2}" cy="${absY + 0.2}" r="1.5" fill="#ffffff"/>
                ${labelText ? `
                    <text x="${absX}" y="${absY - 6}" font-size="7.5" font-family="'JetBrains Mono', monospace" font-weight="bold" fill="${color}" text-anchor="middle">${labelText}</text>
                ` : ''}
            </g>
        `;
    }

    renderInteractiveWireTrace({ id, arduinoPin, traceName, fromDesc, toDesc, color, pathD, startX, startY, endX, endY, badgeX, badgeY, badgeText, isAnimated = true }) {
        return `
            <g class="circuit-wire-trace" data-trace-id="${id}" data-arduino-pin="${arduinoPin}" data-trace-name="${traceName}" data-from-desc="${fromDesc}" data-to-desc="${toDesc}" data-trace-color="${color}">
                <path d="${pathD}" fill="none" stroke="${color}" stroke-width="8" stroke-linecap="round" opacity="0" class="wire-hover-aura"/>
                <path d="${pathD}" fill="none" stroke="${color}" stroke-width="3.8" stroke-linecap="round" class="${isAnimated ? 'active-wire' : ''}" filter="url(#wireShadow)"/>
                ${this.generateDupontConnector(startX, startY, color)}
                ${this.generateDupontConnector(endX, endY, color)}
                <circle cx="${startX}" cy="${startY}" r="3" fill="#ffffff" stroke="${color}" stroke-width="1.5" class="circuit-endpoint-dot"/>
                <circle cx="${endX}" cy="${endY}" r="3" fill="#ffffff" stroke="${color}" stroke-width="1.5" class="circuit-endpoint-dot"/>
                <g transform="translate(${badgeX}, ${badgeY})">
                    <rect x="0" y="0" width="${badgeText.length * 7.5 + 20}" height="20" rx="4" fill="#ffffff" stroke="${color}" stroke-width="1.2" filter="url(#wireShadow)"/>
                    <text x="${(badgeText.length * 7.5 + 20) / 2}" y="14" font-size="10" font-family="'Outfit', sans-serif" font-weight="bold" fill="${color}" text-anchor="middle">${badgeText}</text>
                </g>
            </g>
        `;
    }

    getPracticeSpecificSvgContent(practiceKey, step) {
        let svg = '';

        if (practiceKey === '1a') {
            // ====================================================
            // PRÁTICA 1A: LED BÁSICO EM 5V (SEM PROGRAMAÇÃO)
            // ====================================================
            if (step >= 2) {
                svg += this.renderPaintedBreadboardHole(620, 145, '#ef4444', '5V');
                svg += this.renderPaintedBreadboardHole(655, 145, '#1e293b', 'GND');

                svg += `
                    <!-- Resistor 220 Ω -->
                    <g filter="url(#wireShadow)">
                        <line x1="620" y1="145" x2="620" y2="115" stroke="#94a3b8" stroke-width="1.6"/>
                        <rect x="615" y="90" width="10" height="25" rx="2.5" fill="#e2d4be" stroke="#a89a84" stroke-width="1"/>
                        <rect x="615" y="94" width="10" height="2.5" fill="#dc2626"/>
                        <rect x="615" y="99" width="10" height="2.5" fill="#dc2626"/>
                        <rect x="615" y="104" width="10" height="2.5" fill="#78350f"/>
                        <text x="630" y="105" font-size="8.5" font-family="'JetBrains Mono', monospace" font-weight="bold" fill="#475569">220Ω</text>
                    </g>

                    <!-- LED Vermelho -->
                    <g filter="url(#wireShadow)">
                        <line x1="620" y1="90" x2="635" y2="90" stroke="#94a3b8" stroke-width="1.6"/>
                        <line x1="635" y1="90" x2="635" y2="120" stroke="#94a3b8" stroke-width="1.6"/>
                        <line x1="655" y1="120" x2="655" y2="145" stroke="#94a3b8" stroke-width="1.6"/>
                        <rect x="630" y="118" width="28" height="4" rx="1" fill="#be123c"/>
                        <path d="M 631 118 C 631 106, 657 106, 657 118 Z" fill="${step >= 4 ? '#e11d48' : '#fda4af'}" stroke="#9f1239" stroke-width="1.2" class="${step >= 4 ? 'pulsing-led' : ''}"/>
                        <text x="644" y="98" font-size="9" font-family="'Outfit', sans-serif" font-weight="bold" fill="#e11d48" text-anchor="middle">LED 5mm</text>
                    </g>
                `;
            }

            if (step >= 3) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-5v-1a',
                    arduinoPin: '5v',
                    traceName: 'Alimentação +5V DC',
                    fromDesc: 'Porta 5V do Arduino',
                    toDesc: 'Terminal do Resistor 220Ω (Protoboard)',
                    color: '#ef4444',
                    pathD: 'M 175.7 240 L 175.7 325 C 175.7 395, 480 395, 620 250 L 620 148',
                    startX: 175.7, startY: 240, endX: 620, endY: 148,
                    badgeX: 340, badgeY: 365, badgeText: 'Cabo 5V (Energia)',
                    isAnimated: step >= 4
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-gnd-1a',
                    arduinoPin: 'gnd1',
                    traceName: 'Retorno de Terra (GND)',
                    fromDesc: 'Porta GND do Arduino',
                    toDesc: 'Cátodo do LED (Protoboard)',
                    color: '#1e293b',
                    pathD: 'M 186.2 240 L 186.2 355 C 186.2 435, 520 435, 655 250 L 655 148',
                    startX: 186.2, startY: 240, endX: 655, endY: 148,
                    badgeX: 420, badgeY: 405, badgeText: 'Cabo GND (Terra)',
                    isAnimated: step >= 4
                });
            }

            if (step >= 4) {
                svg += `
                    <g transform="translate(300, 420)" filter="url(#glowEffect)">
                        <rect x="0" y="0" width="330" height="34" rx="6" fill="#f0fdf4" stroke="#86efac" stroke-width="2"/>
                        <circle cx="18" cy="17" r="6" fill="#22c55e"/>
                        <text x="32" y="21" font-size="11.5" font-family="'Outfit', sans-serif" font-weight="bold" fill="#15803d">CIRCUITO FECHADO: LED ACESO EM 5V (20mA)</text>
                    </g>
                `;
            }
        } else if (practiceKey === '1b') {
            // ====================================================
            // PRÁTICA 1B: PUSHBUTTON + LED
            // ====================================================
            if (step >= 2) {
                svg += this.renderPaintedBreadboardHole(570, 145, '#ef4444', '5V');
                svg += this.renderPaintedBreadboardHole(600, 145, '#ea580c', 'BTN');
                svg += this.renderPaintedBreadboardHole(660, 145, '#1e293b', 'GND');

                svg += `
                    <!-- Pushbutton 4-pin -->
                    <g filter="url(#wireShadow)">
                        <rect x="565" y="105" width="40" height="30" rx="3" fill="#334155" stroke="#1e293b" stroke-width="1.5"/>
                        <circle cx="585" cy="120" r="8" fill="#dc2626" stroke="#991b1b" stroke-width="1.5"/>
                        <text x="585" y="98" font-size="8.5" font-family="'Outfit', sans-serif" font-weight="bold" fill="#0f172a" text-anchor="middle">Botão Táctil</text>
                    </g>

                    <!-- Resistor & LED -->
                    <g filter="url(#wireShadow)">
                        <line x1="600" y1="145" x2="625" y2="145" stroke="#94a3b8" stroke-width="1.6"/>
                        <rect x="625" y="140" width="22" height="9" rx="2" fill="#e2d4be" stroke="#a89a84" stroke-width="1"/>
                        <rect x="629" y="140" width="2" height="9" fill="#dc2626"/>
                        <rect x="633" y="140" width="2" height="9" fill="#dc2626"/>
                        <rect x="637" y="140" width="2" height="9" fill="#78350f"/>
                        
                        <rect x="650" y="120" width="20" height="4" rx="1" fill="#be123c"/>
                        <path d="M 651 120 C 651 108, 669 108, 669 120 Z" fill="${step >= 4 ? '#e11d48' : '#fda4af'}" stroke="#9f1239" stroke-width="1.2" class="${step >= 4 ? 'pulsing-led' : ''}"/>
                    </g>
                `;
            }

            if (step >= 3) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-5v-1b',
                    arduinoPin: '5v',
                    traceName: 'Entrada 5V no Botão',
                    fromDesc: 'Porta 5V do Arduino',
                    toDesc: 'Pino de Entrada do Pushbutton',
                    color: '#ef4444',
                    pathD: 'M 175.7 240 L 175.7 325 C 175.7 395, 450 395, 570 250 L 570 148',
                    startX: 175.7, startY: 240, endX: 570, endY: 148,
                    badgeX: 310, badgeY: 365, badgeText: '5V (Botão)',
                    isAnimated: step >= 4
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-gnd-1b',
                    arduinoPin: 'gnd1',
                    traceName: 'Terra GND',
                    fromDesc: 'Porta GND do Arduino',
                    toDesc: 'Cátodo do LED',
                    color: '#1e293b',
                    pathD: 'M 186.2 240 L 186.2 355 C 186.2 435, 520 435, 660 250 L 660 148',
                    startX: 186.2, startY: 240, endX: 660, endY: 148,
                    badgeX: 420, badgeY: 405, badgeText: 'Cabo GND',
                    isAnimated: step >= 4
                });
            }

            if (step >= 4) {
                svg += `
                    <g transform="translate(280, 420)" filter="url(#glowEffect)">
                        <rect x="0" y="0" width="370" height="34" rx="6" fill="#f0fdf4" stroke="#86efac" stroke-width="2"/>
                        <circle cx="18" cy="17" r="6" fill="#22c55e"/>
                        <text x="32" y="21" font-size="11.5" font-family="'Outfit', sans-serif" font-weight="bold" fill="#15803d">BOTÃO PRESSIONADO -> CIRCUITO FECHADO -> LED ACENDE!</text>
                    </g>
                `;
            }
        } else if (practiceKey === '1c') {
            // ====================================================
            // PRÁTICA 1C: ARDUINO BLINK D13
            // ====================================================
            if (step >= 2) {
                svg += this.renderPaintedBreadboardHole(620, 145, '#f59e0b', 'D13');
                svg += this.renderPaintedBreadboardHole(655, 145, '#1e293b', 'GND');

                svg += `
                    <g filter="url(#wireShadow)">
                        <line x1="620" y1="145" x2="620" y2="115" stroke="#94a3b8" stroke-width="1.6"/>
                        <rect x="615" y="90" width="10" height="25" rx="2.5" fill="#e2d4be" stroke="#a89a84" stroke-width="1"/>
                        <rect x="615" y="94" width="10" height="2.5" fill="#dc2626"/>
                        <rect x="615" y="99" width="10" height="2.5" fill="#dc2626"/>
                        <rect x="615" y="104" width="10" height="2.5" fill="#78350f"/>
                        <text x="630" y="105" font-size="8.5" font-family="'JetBrains Mono', monospace" font-weight="bold" fill="#475569">220Ω</text>
                    </g>

                    <g filter="url(#wireShadow)">
                        <line x1="620" y1="90" x2="635" y2="90" stroke="#94a3b8" stroke-width="1.6"/>
                        <line x1="635" y1="90" x2="635" y2="120" stroke="#94a3b8" stroke-width="1.6"/>
                        <line x1="655" y1="120" x2="655" y2="145" stroke="#94a3b8" stroke-width="1.6"/>
                        <rect x="630" y="118" width="28" height="4" rx="1" fill="#be123c"/>
                        <path d="M 631 118 C 631 106, 657 106, 657 118 Z" fill="${step >= 5 ? '#e11d48' : '#fda4af'}" stroke="#9f1239" stroke-width="1.2" class="${step >= 5 ? 'pulsing-led' : ''}"/>
                        <text x="644" y="98" font-size="9" font-family="'Outfit', sans-serif" font-weight="bold" fill="#e11d48" text-anchor="middle">LED 5mm</text>
                    </g>
                `;
            }

            if (step >= 3) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-d13-1c',
                    arduinoPin: 'd13',
                    traceName: 'Comando Digital D13 (HIGH/LOW)',
                    fromDesc: 'Porta Digital D13 do Arduino',
                    toDesc: 'Resistor 220Ω do LED',
                    color: '#f59e0b',
                    pathD: 'M 175.7 70 L 175.7 30 C 175.7 5, 550 5, 620 70 L 620 142',
                    startX: 175.7, startY: 70, endX: 620, endY: 142,
                    badgeX: 380, badgeY: 10, badgeText: 'Sinal D13',
                    isAnimated: step >= 5
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-gnd-1c',
                    arduinoPin: 'gnd_top',
                    traceName: 'Terra Digital GND',
                    fromDesc: 'Porta GND Superior do Arduino',
                    toDesc: 'Cátodo do LED',
                    color: '#1e293b',
                    pathD: 'M 165.2 70 L 165.2 15 C 165.2 0, 580 0, 655 70 L 655 142',
                    startX: 165.2, startY: 70, endX: 655, endY: 142,
                    badgeX: 470, badgeY: 4, badgeText: 'Terra GND',
                    isAnimated: step >= 5
                });
            }

            if (step >= 5) {
                svg += `
                    <g transform="translate(280, 420)" filter="url(#glowEffect)">
                        <rect x="0" y="0" width="370" height="34" rx="6" fill="#eff6ff" stroke="#93c5fd" stroke-width="2"/>
                        <circle cx="18" cy="17" r="6" fill="#3b82f6"/>
                        <text x="32" y="21" font-size="11.5" font-family="'JetBrains Mono', monospace" font-weight="bold" fill="#1e40af">ARDUINO BLINK: digitalWrite(13, HIGH/LOW) OK!</text>
                    </g>
                `;
            }
        } else if (practiceKey === '1d') {
            // ====================================================
            // PRÁTICA 1D: AUTOMAÇÃO COM SENSOR LDR
            // ====================================================
            if (step >= 2) {
                svg += this.renderPaintedBreadboardHole(570, 117, '#ef4444', '5V');
                svg += this.renderPaintedBreadboardHole(604, 117, '#059669', 'A0');
                svg += this.renderPaintedBreadboardHole(604, 183, '#1e293b', 'GND');
                svg += this.renderPaintedBreadboardHole(720, 143, '#f59e0b', 'D13');
                svg += this.renderPaintedBreadboardHole(743, 143, '#1e293b', 'GND');

                svg += `
                    <g id="ldrSensor" filter="url(#wireShadow)">
                        <line x1="570" y1="102" x2="570" y2="117" stroke="#b45309" stroke-width="1.8"/>
                        <line x1="604" y1="102" x2="604" y2="117" stroke="#059669" stroke-width="1.8"/>
                        <circle cx="587" cy="94" r="13" fill="#d97706" stroke="#78350f" stroke-width="1.8"/>
                        <circle cx="587" cy="94" r="10.5" fill="#fef3c7"/>
                        <path d="M 580 91 Q 587 88 594 91 Q 587 94 580 97 Q 587 100 594 97" fill="none" stroke="#b45309" stroke-width="1.8" stroke-linecap="round"/>
                        <text x="587" y="74" font-size="9.5" font-family="'Outfit', sans-serif" font-weight="bold" fill="#d97706" text-anchor="middle">Sensor LDR</text>
                    </g>

                    <g filter="url(#wireShadow)">
                        <line x1="604" y1="117" x2="604" y2="140" stroke="#94a3b8" stroke-width="1.5"/>
                        <line x1="604" y1="165" x2="604" y2="183" stroke="#94a3b8" stroke-width="1.5"/>
                        <rect x="599" y="140" width="10" height="25" rx="2.5" fill="#e2d4be" stroke="#a89a84" stroke-width="1"/>
                        <rect x="599" y="144" width="10" height="2.5" fill="#78350f"/>
                        <rect x="599" y="149" width="10" height="2.5" fill="#000000"/>
                        <rect x="599" y="154" width="10" height="2.5" fill="#ea580c"/>
                        <rect x="599" y="159" width="10" height="2" fill="#ca8a04"/>
                        <text x="618" y="156" font-size="8.5" font-family="'JetBrains Mono', monospace" font-weight="bold" fill="#475569">10kΩ</text>
                    </g>

                    <g id="ledIndicator" filter="url(#wireShadow)">
                        <line x1="720" y1="125" x2="720" y2="143" stroke="#94a3b8" stroke-width="1.6"/>
                        <line x1="743" y1="125" x2="743" y2="143" stroke="#94a3b8" stroke-width="1.6"/>
                        <rect x="715" y="122" width="20" height="4" rx="1" fill="#be123c"/>
                        <path d="M 716 122 C 716 110, 734 110, 734 122 Z" fill="${step >= 5 ? '#e11d48' : '#fda4af'}" stroke="#9f1239" stroke-width="1.2" class="${step >= 5 ? 'pulsing-led' : ''}"/>
                        <text x="725" y="103" font-size="9" font-family="'Outfit', sans-serif" font-weight="bold" fill="#e11d48" text-anchor="middle">LED 5mm</text>
                    </g>

                    <g filter="url(#wireShadow)">
                        <rect x="715" y="155" width="10" height="25" rx="2.5" fill="#e2d4be" stroke="#a89a84" stroke-width="1"/>
                        <rect x="715" y="159" width="10" height="2.5" fill="#dc2626"/>
                        <rect x="715" y="164" width="10" height="2.5" fill="#dc2626"/>
                        <rect x="715" y="169" width="10" height="2.5" fill="#78350f"/>
                        <text x="732" y="171" font-size="8.5" font-family="'JetBrains Mono', monospace" font-weight="bold" fill="#475569">220Ω</text>
                    </g>
                `;
            }

            if (step >= 3) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-5v',
                    arduinoPin: '5v',
                    traceName: 'Alimentação +5V (VCC)',
                    fromDesc: 'Porta 5V do Arduino (Pino de Alimentação)',
                    toDesc: 'Terminal 1 do Sensor LDR (Protoboard)',
                    color: '#ef4444',
                    pathD: 'M 175.7 240 L 175.7 325 C 175.7 395, 450 395, 570 295 L 570 120',
                    startX: 175.7, startY: 240, endX: 570, endY: 120,
                    badgeX: 280, badgeY: 360, badgeText: 'Cabo 5V',
                    isAnimated: step >= 5
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-gnd',
                    arduinoPin: 'gnd1',
                    traceName: 'Referência de Terra (GND)',
                    fromDesc: 'Porta GND do Arduino (0V Comum)',
                    toDesc: 'Resistor 10k e Cátodo do LED (Protoboard)',
                    color: '#1e293b',
                    pathD: 'M 186.2 240 L 186.2 355 C 186.2 435, 480 435, 604 315 L 604 185',
                    startX: 186.2, startY: 240, endX: 604, endY: 185,
                    badgeX: 380, badgeY: 405, badgeText: 'Cabo GND',
                    isAnimated: step >= 5
                });
            }

            if (step >= 4) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-a0',
                    arduinoPin: 'a0',
                    traceName: 'Sinal Analógico de Leitura A0',
                    fromDesc: 'Porta Analógica A0 (ADC 10-bits)',
                    toDesc: 'Divisor de Tensão do LDR (Protoboard)',
                    color: '#059669',
                    pathD: 'M 238.7 240 L 238.7 295 C 238.7 345, 510 320, 604 195 L 604 120',
                    startX: 238.7, startY: 240, endX: 604, endY: 120,
                    badgeX: 350, badgeY: 285, badgeText: 'Sinal A0 (LDR)',
                    isAnimated: step >= 5
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-d13',
                    arduinoPin: 'd13',
                    traceName: 'Controle Digital de Saída D13',
                    fromDesc: 'Porta Digital D13 do Arduino (Saída HIGH/LOW)',
                    toDesc: 'Resistor 220Ω do LED (Protoboard)',
                    color: '#f59e0b',
                    pathD: 'M 175.7 70 L 175.7 30 C 175.7 5, 650 5, 720 70 L 720 140',
                    startX: 175.7, startY: 70, endX: 720, endY: 140,
                    badgeX: 410, badgeY: 8, badgeText: 'Controle D13',
                    isAnimated: step >= 5
                });
            }

            if (step >= 5) {
                svg += `
                    <g transform="translate(310, 420)" filter="url(#glowEffect)">
                        <rect x="0" y="0" width="310" height="34" rx="6" fill="#f0fdf4" stroke="#86efac" stroke-width="2"/>
                        <circle cx="18" cy="17" r="6" fill="#22c55e"/>
                        <text x="32" y="21" font-size="11.5" font-family="'Outfit', sans-serif" font-weight="bold" fill="#15803d">TESTE: LDR < 500 -> LED ACESO (HIGH)</text>
                    </g>
                `;
            }
        } else if (practiceKey === '2a') {
            // ====================================================
            // PRÁTICA 2A: INPUT_PULLUP (BOTÃO EM D2 + LED D13)
            // ====================================================
            if (step >= 2) {
                svg += this.renderPaintedBreadboardHole(560, 145, '#1e293b', 'GND');
                svg += this.renderPaintedBreadboardHole(585, 145, '#06b6d4', 'D2');
                svg += this.renderPaintedBreadboardHole(635, 145, '#f59e0b', 'D13');
                svg += this.renderPaintedBreadboardHole(665, 145, '#1e293b', 'GND');

                svg += `
                    <!-- Pushbutton -->
                    <g filter="url(#wireShadow)">
                        <rect x="555" y="105" width="35" height="30" rx="3" fill="#334155" stroke="#1e293b" stroke-width="1.5"/>
                        <circle cx="572.5" cy="120" r="7" fill="#0284c7" stroke="#0369a1" stroke-width="1.5"/>
                        <text x="572.5" y="98" font-size="8.5" font-family="'Outfit', sans-serif" font-weight="bold" fill="#0f172a" text-anchor="middle">Botão D2</text>
                    </g>

                    <!-- LED & Resistor D13 -->
                    <g filter="url(#wireShadow)">
                        <line x1="635" y1="145" x2="635" y2="115" stroke="#94a3b8" stroke-width="1.6"/>
                        <rect x="630" y="90" width="10" height="25" rx="2.5" fill="#e2d4be" stroke="#a89a84" stroke-width="1"/>
                        <rect x="630" y="94" width="10" height="2.5" fill="#dc2626"/>
                        <rect x="630" y="99" width="10" height="2.5" fill="#dc2626"/>
                        <rect x="630" y="104" width="10" height="2.5" fill="#78350f"/>
                        <text x="645" y="105" font-size="8.5" font-family="'JetBrains Mono', monospace" font-weight="bold" fill="#475569">220Ω</text>

                        <line x1="635" y1="90" x2="650" y2="90" stroke="#94a3b8" stroke-width="1.6"/>
                        <line x1="650" y1="90" x2="650" y2="120" stroke="#94a3b8" stroke-width="1.6"/>
                        <line x1="665" y1="120" x2="665" y2="145" stroke="#94a3b8" stroke-width="1.6"/>
                        <rect x="645" y="118" width="24" height="4" rx="1" fill="#be123c"/>
                        <path d="M 646 118 C 646 106, 668 106, 668 118 Z" fill="${step >= 5 ? '#e11d48' : '#fda4af'}" stroke="#9f1239" stroke-width="1.2" class="${step >= 5 ? 'pulsing-led' : ''}"/>
                        <text x="657" y="98" font-size="9" font-family="'Outfit', sans-serif" font-weight="bold" fill="#e11d48" text-anchor="middle">LED D13</text>
                    </g>
                `;
            }

            if (step >= 3) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-btn-d2',
                    arduinoPin: 'd2',
                    traceName: 'Leitura Digital D2 (INPUT_PULLUP)',
                    fromDesc: 'Porta Digital D2 do Arduino',
                    toDesc: 'Terminal do Botão Pushbutton',
                    color: '#06b6d4',
                    pathD: 'M 291.2 70 L 291.2 25 C 291.2 10, 500 10, 585 75 L 585 142',
                    startX: 291.2, startY: 70, endX: 585, endY: 142,
                    badgeX: 380, badgeY: 12, badgeText: 'Sinal D2 (Pull-up)',
                    isAnimated: step >= 5
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-btn-gnd',
                    arduinoPin: 'gnd_top',
                    traceName: 'Terra GND do Botão',
                    fromDesc: 'Porta GND Superior do Arduino',
                    toDesc: 'Terminal de Fechamento do Botão',
                    color: '#1e293b',
                    pathD: 'M 165.2 70 L 165.2 20 C 165.2 0, 480 0, 560 70 L 560 142',
                    startX: 165.2, startY: 70, endX: 560, endY: 142,
                    badgeX: 290, badgeY: 6, badgeText: 'GND Botão',
                    isAnimated: step >= 5
                });
            }

            if (step >= 4) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-led-d13-2a',
                    arduinoPin: 'd13',
                    traceName: 'Saída Digital de Controle D13',
                    fromDesc: 'Porta Digital D13 do Arduino',
                    toDesc: 'Resistor 220Ω do LED',
                    color: '#f59e0b',
                    pathD: 'M 175.7 70 L 175.7 30 C 175.7 5, 580 5, 635 70 L 635 142',
                    startX: 175.7, startY: 70, endX: 635, endY: 142,
                    badgeX: 470, badgeY: 8, badgeText: 'Saída D13',
                    isAnimated: step >= 5
                });
            }

            if (step >= 5) {
                svg += `
                    <g transform="translate(260, 420)" filter="url(#glowEffect)">
                        <rect x="0" y="0" width="400" height="34" rx="6" fill="#eff6ff" stroke="#93c5fd" stroke-width="2"/>
                        <circle cx="18" cy="17" r="6" fill="#3b82f6"/>
                        <text x="32" y="21" font-size="11" font-family="'JetBrains Mono', monospace" font-weight="bold" fill="#1e40af">BOTÃO PRESSIONADO -> digitalRead(2) == LOW -> LED 13 ON!</text>
                    </g>
                `;
            }
        } else if (practiceKey === '2b') {
            // ====================================================
            // PRÁTICA 2B: SAÍDA PWM (PORTA D9 ~)
            // ====================================================
            if (step >= 2) {
                svg += this.renderPaintedBreadboardHole(620, 145, '#d946ef', 'D9 ~');
                svg += this.renderPaintedBreadboardHole(655, 145, '#1e293b', 'GND');

                svg += `
                    <g filter="url(#wireShadow)">
                        <line x1="620" y1="145" x2="620" y2="115" stroke="#94a3b8" stroke-width="1.6"/>
                        <rect x="615" y="90" width="10" height="25" rx="2.5" fill="#e2d4be" stroke="#a89a84" stroke-width="1"/>
                        <rect x="615" y="94" width="10" height="2.5" fill="#dc2626"/>
                        <rect x="615" y="99" width="10" height="2.5" fill="#dc2626"/>
                        <rect x="615" y="104" width="10" height="2.5" fill="#78350f"/>
                        <text x="630" y="105" font-size="8.5" font-family="'JetBrains Mono', monospace" font-weight="bold" fill="#475569">220Ω</text>
                    </g>

                    <g filter="url(#wireShadow)">
                        <line x1="620" y1="90" x2="635" y2="90" stroke="#94a3b8" stroke-width="1.6"/>
                        <line x1="635" y1="90" x2="635" y2="120" stroke="#94a3b8" stroke-width="1.6"/>
                        <line x1="655" y1="120" x2="655" y2="145" stroke="#94a3b8" stroke-width="1.6"/>
                        <rect x="630" y="118" width="28" height="4" rx="1" fill="#c026d3"/>
                        <path d="M 631 118 C 631 106, 657 106, 657 118 Z" fill="${step >= 5 ? '#d946ef' : '#f0abfc'}" stroke="#a21caf" stroke-width="1.2" class="${step >= 5 ? 'pulsing-led' : ''}"/>
                        <text x="644" y="98" font-size="9" font-family="'Outfit', sans-serif" font-weight="bold" fill="#c026d3" text-anchor="middle">LED PWM</text>
                    </g>
                `;
            }

            if (step >= 3) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-pwm-d9',
                    arduinoPin: 'd9',
                    traceName: 'Sinal PWM Modulado D9 (~)',
                    fromDesc: 'Porta Digital PWM D9 do Arduino (Timer1)',
                    toDesc: 'Resistor 220Ω do LED',
                    color: '#d946ef',
                    pathD: 'M 217.7 70 L 217.7 25 C 217.7 5, 550 5, 620 70 L 620 142',
                    startX: 217.7, startY: 70, endX: 620, endY: 142,
                    badgeX: 360, badgeY: 10, badgeText: 'PWM D9 (~)',
                    isAnimated: step >= 5
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-gnd-pwm',
                    arduinoPin: 'gnd_top',
                    traceName: 'Terra Digital GND',
                    fromDesc: 'Porta GND do Arduino',
                    toDesc: 'Cátodo do LED',
                    color: '#1e293b',
                    pathD: 'M 165.2 70 L 165.2 15 C 165.2 0, 580 0, 655 70 L 655 142',
                    startX: 165.2, startY: 70, endX: 655, endY: 142,
                    badgeX: 470, badgeY: 4, badgeText: 'Terra GND',
                    isAnimated: step >= 5
                });
            }

            if (step >= 5) {
                svg += `
                    <g transform="translate(250, 420)" filter="url(#glowEffect)">
                        <rect x="0" y="0" width="420" height="34" rx="6" fill="#fdf4ff" stroke="#f0abfc" stroke-width="2"/>
                        <circle cx="18" cy="17" r="6" fill="#d946ef"/>
                        <text x="32" y="21" font-size="11" font-family="'JetBrains Mono', monospace" font-weight="bold" fill="#86198f">PWM FADE: analogWrite(9, 0..255) -> DIMERIZAÇÃO CONTÍNUA</text>
                    </g>
                `;
            }
        } else if (practiceKey === '2c') {
            // ====================================================
            // PRÁTICA 2C: PIR + RELÉ 5V
            // ====================================================
            if (step >= 2) {
                svg += this.renderPaintedBreadboardHole(535, 150, '#ef4444', '5V');
                svg += this.renderPaintedBreadboardHole(558, 150, '#06b6d4', 'D2');
                svg += this.renderPaintedBreadboardHole(581, 150, '#1e293b', 'GND');

                svg += this.renderPaintedBreadboardHole(700, 150, '#ef4444', '5V');
                svg += this.renderPaintedBreadboardHole(723, 150, '#8b5cf6', 'D8');
                svg += this.renderPaintedBreadboardHole(746, 150, '#1e293b', 'GND');

                svg += `
                    <g id="pirSensor" transform="translate(515, 75)" filter="url(#wireShadow)">
                        <rect x="0" y="0" width="80" height="55" rx="5" fill="#15803d" stroke="#14532d" stroke-width="1.8"/>
                        <circle cx="52" cy="27" r="18" fill="#ffffff" stroke="#cbd5e1" stroke-width="1.8"/>
                        <line x1="20" y1="55" x2="20" y2="75" stroke="#94a3b8" stroke-width="1.8"/>
                        <line x1="43" y1="55" x2="43" y2="75" stroke="#06b6d4" stroke-width="1.8"/>
                        <line x1="66" y1="55" x2="66" y2="75" stroke="#94a3b8" stroke-width="1.8"/>
                        <text x="40" y="-8" font-size="10" font-family="'Outfit', sans-serif" font-weight="bold" fill="#15803d" text-anchor="middle">Sensor PIR</text>
                    </g>

                    <g id="relayModule" transform="translate(685, 70)" filter="url(#wireShadow)">
                        <rect x="0" y="0" width="80" height="60" rx="5" fill="#4338ca" stroke="#312e81" stroke-width="1.8"/>
                        <rect x="8" y="6" width="42" height="30" rx="2" fill="#3730a3"/>
                        <text x="12" y="20" font-size="7.5" font-family="sans-serif" font-weight="900" fill="#ffffff">SONGLE</text>
                        <text x="12" y="30" font-size="6.5" font-family="monospace" fill="#e0e7ff">5V RELAY</text>
                        <circle cx="16" cy="48" r="2.5" fill="${step >= 5 ? '#22c55e' : '#64748b'}" filter="${step >= 5 ? 'url(#glowEffect)' : 'none'}"/>
                        <line x1="15" y1="60" x2="15" y2="80" stroke="#94a3b8" stroke-width="1.8"/>
                        <line x1="38" y1="60" x2="38" y2="80" stroke="#8b5cf6" stroke-width="1.8"/>
                        <line x1="61" y1="60" x2="61" y2="80" stroke="#94a3b8" stroke-width="1.8"/>
                        <text x="40" y="-8" font-size="10" font-family="'Outfit', sans-serif" font-weight="bold" fill="#4338ca" text-anchor="middle">Módulo Relé 5V</text>
                    </g>
                `;
            }

            if (step >= 3) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-5v-pir',
                    arduinoPin: '5v',
                    traceName: 'Alimentação 5V (PIR e Relé)',
                    fromDesc: 'Porta 5V do Arduino',
                    toDesc: 'Pinos VCC do Sensor PIR e Módulo Relé',
                    color: '#ef4444',
                    pathD: 'M 175.7 240 L 175.7 325 C 175.7 395, 440 395, 535 240 L 535 152',
                    startX: 175.7, startY: 240, endX: 535, endY: 152,
                    badgeX: 290, badgeY: 365, badgeText: 'Alimentação 5V',
                    isAnimated: step >= 5
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-gnd-pir',
                    arduinoPin: 'gnd1',
                    traceName: 'Terra Comum GND (PIR e Relé)',
                    fromDesc: 'Porta GND do Arduino',
                    toDesc: 'Pinos GND do Sensor PIR e Módulo Relé',
                    color: '#1e293b',
                    pathD: 'M 186.2 240 L 186.2 355 C 186.2 435, 470 435, 581 240 L 581 152',
                    startX: 186.2, startY: 240, endX: 581, endY: 152,
                    badgeX: 380, badgeY: 405, badgeText: 'Cabo GND',
                    isAnimated: step >= 5
                });
            }

            if (step >= 4) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-d2-pir',
                    arduinoPin: 'd2',
                    traceName: 'Sinal Digital de Presença D2',
                    fromDesc: 'Porta Digital D2 do Arduino (Entrada/INT0)',
                    toDesc: 'Pino Central OUT do Sensor PIR',
                    color: '#06b6d4',
                    pathD: 'M 291.2 70 L 291.2 25 C 291.2 10, 480 10, 558 75 L 558 148',
                    startX: 291.2, startY: 70, endX: 558, endY: 148,
                    badgeX: 350, badgeY: 12, badgeText: 'Sinal D2 (PIR)',
                    isAnimated: step >= 5
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-d8-relay',
                    arduinoPin: 'd8',
                    traceName: 'Sinal de Acionamento do Relé D8',
                    fromDesc: 'Porta Digital D8 do Arduino (Saída de Controle)',
                    toDesc: 'Pino IN do Módulo Relé 5V',
                    color: '#8b5cf6',
                    pathD: 'M 228.2 70 L 228.2 15 C 228.2 0, 640 0, 723 70 L 723 148',
                    startX: 228.2, startY: 70, endX: 723, endY: 148,
                    badgeX: 470, badgeY: 2, badgeText: 'Controle D8 (Relé)',
                    isAnimated: step >= 5
                });
            }

            if (step >= 5) {
                svg += `
                    <g transform="translate(280, 420)" filter="url(#glowEffect)">
                        <rect x="0" y="0" width="360" height="34" rx="6" fill="#f0fdf4" stroke="#86efac" stroke-width="2"/>
                        <circle cx="18" cy="17" r="6" fill="#22c55e"/>
                        <text x="32" y="21" font-size="11.5" font-family="'Outfit', sans-serif" font-weight="bold" fill="#15803d">MOVIMENTO DETECTADO -> RELÉ ACIONADO (CLICK!)</text>
                    </g>
                `;
            }
        } else if (practiceKey === '2d') {
            // ====================================================
            // PRÁTICA 2D: ALARME PIR + BUZZER PIEZO (PORTA D11 ~)
            // ====================================================
            if (step >= 2) {
                svg += this.renderPaintedBreadboardHole(535, 150, '#ef4444', '5V');
                svg += this.renderPaintedBreadboardHole(558, 150, '#06b6d4', 'D2');
                svg += this.renderPaintedBreadboardHole(581, 150, '#1e293b', 'GND');

                svg += this.renderPaintedBreadboardHole(700, 150, '#3b82f6', 'D11 ~');
                svg += this.renderPaintedBreadboardHole(725, 150, '#1e293b', 'GND');

                svg += `
                    <!-- Sensor PIR -->
                    <g id="pirSensor" transform="translate(515, 75)" filter="url(#wireShadow)">
                        <rect x="0" y="0" width="80" height="55" rx="5" fill="#15803d" stroke="#14532d" stroke-width="1.8"/>
                        <circle cx="52" cy="27" r="18" fill="#ffffff" stroke="#cbd5e1" stroke-width="1.8"/>
                        <line x1="20" y1="55" x2="20" y2="75" stroke="#94a3b8" stroke-width="1.8"/>
                        <line x1="43" y1="55" x2="43" y2="75" stroke="#06b6d4" stroke-width="1.8"/>
                        <line x1="66" y1="55" x2="66" y2="75" stroke="#94a3b8" stroke-width="1.8"/>
                        <text x="40" y="-8" font-size="10" font-family="'Outfit', sans-serif" font-weight="bold" fill="#15803d" text-anchor="middle">Sensor PIR</text>
                    </g>

                    <!-- Buzzer Piezoelétrico -->
                    <g id="piezoBuzzer" transform="translate(685, 80)" filter="url(#wireShadow)">
                        <circle cx="28" cy="28" r="26" fill="#1e293b" stroke="#0f172a" stroke-width="2"/>
                        <circle cx="28" cy="28" r="7" fill="#0f172a"/>
                        <text x="38" y="18" font-size="11" font-weight="bold" fill="#ef4444">+</text>
                        <line x1="15" y1="54" x2="15" y2="70" stroke="#3b82f6" stroke-width="1.8"/>
                        <line x1="40" y1="54" x2="40" y2="70" stroke="#94a3b8" stroke-width="1.8"/>
                        <text x="28" y="-10" font-size="10" font-family="'Outfit', sans-serif" font-weight="bold" fill="#3b82f6" text-anchor="middle">Buzzer 5V</text>
                        ${step >= 5 ? `
                            <path d="M 58 15 Q 66 28 58 41 M 64 8 Q 76 28 64 48" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round"/>
                        ` : ''}
                    </g>
                `;
            }

            if (step >= 3) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-5v-pir-2d',
                    arduinoPin: '5v',
                    traceName: 'Alimentação +5V (PIR)',
                    fromDesc: 'Porta 5V do Arduino',
                    toDesc: 'Pino VCC do Sensor PIR',
                    color: '#ef4444',
                    pathD: 'M 175.7 240 L 175.7 325 C 175.7 395, 440 395, 535 240 L 535 152',
                    startX: 175.7, startY: 240, endX: 535, endY: 152,
                    badgeX: 290, badgeY: 365, badgeText: '5V (PIR)',
                    isAnimated: step >= 5
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-gnd-pir-2d',
                    arduinoPin: 'gnd1',
                    traceName: 'Terra Comum GND',
                    fromDesc: 'Porta GND do Arduino',
                    toDesc: 'Pinos GND do PIR e Buzzer',
                    color: '#1e293b',
                    pathD: 'M 186.2 240 L 186.2 355 C 186.2 435, 470 435, 581 240 L 581 152',
                    startX: 186.2, startY: 240, endX: 581, endY: 152,
                    badgeX: 380, badgeY: 405, badgeText: 'Cabo GND',
                    isAnimated: step >= 5
                });
            }

            if (step >= 4) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-d2-pir-2d',
                    arduinoPin: 'd2',
                    traceName: 'Sinal Digital de Presença D2',
                    fromDesc: 'Porta Digital D2 do Arduino',
                    toDesc: 'Pino OUT do Sensor PIR',
                    color: '#06b6d4',
                    pathD: 'M 291.2 70 L 291.2 25 C 291.2 10, 480 10, 558 75 L 558 148',
                    startX: 291.2, startY: 70, endX: 558, endY: 148,
                    badgeX: 350, badgeY: 12, badgeText: 'Sinal D2 (PIR)',
                    isAnimated: step >= 5
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-d11-buzzer',
                    arduinoPin: 'd11',
                    traceName: 'Sinal de Frequência Sonora D11 (~)',
                    fromDesc: 'Porta Digital PWM D11 do Arduino',
                    toDesc: 'Terminal Positivo (+) do Buzzer',
                    color: '#3b82f6',
                    pathD: 'M 196.7 70 L 196.7 15 C 196.7 0, 630 0, 700 70 L 700 148',
                    startX: 196.7, startY: 70, endX: 700, endY: 148,
                    badgeX: 450, badgeY: 2, badgeText: 'Sirene D11 (~)',
                    isAnimated: step >= 5
                });
            }

            if (step >= 5) {
                svg += `
                    <g transform="translate(260, 420)" filter="url(#glowEffect)">
                        <rect x="0" y="0" width="390" height="34" rx="6" fill="#fef2f2" stroke="#fca5a5" stroke-width="2"/>
                        <circle cx="18" cy="17" r="6" fill="#ef4444"/>
                        <text x="32" y="21" font-size="11" font-family="'JetBrains Mono', monospace" font-weight="bold" fill="#991b1b">INTRUSÃO DETECTADA -> tone(11, 1200) -> ALARME ATIVADO!</text>
                    </g>
                `;
            }
        } else if (practiceKey === '3b') {
            // MÓDULO 3
            if (step >= 2) {
                svg += this.renderPaintedBreadboardHole(560, 160, '#ef4444', '5V');
                svg += this.renderPaintedBreadboardHole(575, 160, '#f59e0b', 'D4');
                svg += this.renderPaintedBreadboardHole(605, 160, '#1e293b', 'GND');

                svg += this.renderPaintedBreadboardHole(720, 143, '#059669', 'D2');
                svg += this.renderPaintedBreadboardHole(743, 143, '#1e293b', 'GND');

                svg += `
                    <g id="dhtSensor" transform="translate(545, 80)" filter="url(#wireShadow)">
                        <rect x="0" y="0" width="55" height="65" rx="5" fill="#0891b2" stroke="#0e7490" stroke-width="1.8"/>
                        <line x1="10" y1="15" x2="45" y2="15" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                        <line x1="10" y1="24" x2="45" y2="24" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                        <line x1="10" y1="33" x2="45" y2="33" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                        <text x="12" y="52" font-size="9.5" font-family="sans-serif" font-weight="bold" fill="#ffffff">DHT11</text>
                        <line x1="15" y1="65" x2="15" y2="80" stroke="#94a3b8" stroke-width="1.8"/>
                        <line x1="30" y1="65" x2="30" y2="80" stroke="#f59e0b" stroke-width="1.8"/>
                        <line x1="45" y1="65" x2="45" y2="80" stroke="#94a3b8" stroke-width="1.8"/>
                        <line x1="60" y1="65" x2="60" y2="80" stroke="#94a3b8" stroke-width="1.8"/>
                        <text x="27" y="-8" font-size="10" font-family="'Outfit', sans-serif" font-weight="bold" fill="#0891b2" text-anchor="middle">Sensor DHT11</text>
                    </g>

                    <g filter="url(#wireShadow)">
                        <rect x="615" y="115" width="22" height="9" rx="2" fill="#e2d4be" stroke="#a89a84" stroke-width="1"/>
                        <text x="615" y="136" font-size="8" font-family="monospace" font-weight="bold" fill="#475569">10k Pull-up</text>
                    </g>

                    <g id="ledLink" filter="url(#wireShadow)">
                        <line x1="720" y1="125" x2="720" y2="143" stroke="#94a3b8" stroke-width="1.6"/>
                        <line x1="743" y1="125" x2="743" y2="143" stroke="#94a3b8" stroke-width="1.6"/>
                        <circle cx="731" cy="115" r="9" fill="${step >= 5 ? '#10b981' : '#a7f3d0'}" stroke="#059669" stroke-width="1.5" class="${step >= 5 ? 'pulsing-led' : ''}"/>
                        <text x="731" y="98" font-size="9" font-family="'Outfit', sans-serif" font-weight="bold" fill="#059669" text-anchor="middle">LED Link MQTT</text>
                    </g>
                `;
            }

            if (step >= 3) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-5v-dht',
                    arduinoPin: '5v',
                    traceName: 'Alimentação +5V (DHT11)',
                    fromDesc: 'Porta 5V do Arduino',
                    toDesc: 'Pino 1 (VCC) do Sensor DHT11',
                    color: '#ef4444',
                    pathD: 'M 175.7 240 L 175.7 325 C 175.7 395, 460 395, 560 250 L 560 162',
                    startX: 175.7, startY: 240, endX: 560, endY: 162,
                    badgeX: 290, badgeY: 365, badgeText: '5V (DHT11)',
                    isAnimated: step >= 5
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-gnd-dht',
                    arduinoPin: 'gnd1',
                    traceName: 'Terra Comum GND (DHT11)',
                    fromDesc: 'Porta GND do Arduino',
                    toDesc: 'Pino 4 (GND) do Sensor DHT11',
                    color: '#1e293b',
                    pathD: 'M 186.2 240 L 186.2 355 C 186.2 435, 490 435, 605 250 L 605 162',
                    startX: 186.2, startY: 240, endX: 605, endY: 162,
                    badgeX: 380, badgeY: 405, badgeText: 'Cabo GND',
                    isAnimated: step >= 5
                });
            }

            if (step >= 4) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-d4-dht',
                    arduinoPin: 'd4',
                    traceName: 'Barramento de Dados Serial Single-Bus D4',
                    fromDesc: 'Porta Digital D4 do Arduino',
                    toDesc: 'Pino 2 (DATA) do Sensor DHT11',
                    color: '#f59e0b',
                    pathD: 'M 270.2 70 L 270.2 25 C 270.2 10, 490 10, 575 80 L 575 158',
                    startX: 270.2, startY: 70, endX: 575, endY: 158,
                    badgeX: 350, badgeY: 12, badgeText: 'Sinal D4 (DHT11)',
                    isAnimated: step >= 5
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-d2-link',
                    arduinoPin: 'd2',
                    traceName: 'Sinalizador de Link MQTT D2',
                    fromDesc: 'Porta Digital D2 do Arduino',
                    toDesc: 'LED Indicador de Transmissão MQTT',
                    color: '#059669',
                    pathD: 'M 291.2 70 L 291.2 10 C 291.2 0, 670 0, 720 70 L 720 140',
                    startX: 291.2, startY: 70, endX: 720, endY: 140,
                    badgeX: 470, badgeY: 4, badgeText: 'Status D2 (Link)',
                    isAnimated: step >= 5
                });
            }

            if (step >= 5) {
                svg += `
                    <g transform="translate(260, 420)" filter="url(#glowEffect)">
                        <rect x="0" y="0" width="370" height="34" rx="6" fill="#eff6ff" stroke="#93c5fd" stroke-width="2"/>
                        <circle cx="18" cy="17" r="6" fill="#3b82f6"/>
                        <text x="32" y="21" font-size="11.5" font-family="'JetBrains Mono', monospace" font-weight="bold" fill="#1e40af">PUB: {"temp":24.5,"umid":58.0,"status":"ONLINE"}</text>
                    </g>
                `;
            }
        } else if (practiceKey === '4b') {
            // MÓDULO 4
            if (step >= 2) {
                svg += this.renderPaintedBreadboardHole(550, 145, '#ef4444', '5V');
                svg += this.renderPaintedBreadboardHole(573, 145, '#059669', 'A0');
                svg += this.renderPaintedBreadboardHole(596, 145, '#1e293b', 'GND');

                svg += this.renderPaintedBreadboardHole(720, 145, '#f59e0b', 'D13');
                svg += this.renderPaintedBreadboardHole(743, 145, '#1e293b', 'GND');

                svg += `
                    <g id="miniPotentiometer" filter="url(#wireShadow)">
                        <line x1="550" y1="118" x2="550" y2="145" stroke="#94a3b8" stroke-width="2"/>
                        <line x1="573" y1="118" x2="573" y2="145" stroke="#059669" stroke-width="2"/>
                        <line x1="596" y1="118" x2="596" y2="145" stroke="#94a3b8" stroke-width="2"/>

                        <rect x="540" y="96" width="66" height="24" rx="3" fill="#334155" stroke="#1e293b" stroke-width="1.5"/>
                        <circle cx="573" cy="108" r="13" fill="#059669" stroke="#047857" stroke-width="1.8"/>
                        <line x1="573" y1="108" x2="573" y2="97" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round"/>

                        <text x="573" y="84" font-size="10" font-family="'Outfit', sans-serif" font-weight="bold" fill="#059669" text-anchor="middle">Mini Potenciômetro 10k</text>
                    </g>

                    <g transform="translate(720, 110)" filter="url(#wireShadow)">
                        <line x1="0" y1="18" x2="0" y2="35" stroke="#94a3b8" stroke-width="1.6"/>
                        <line x1="23" y1="18" x2="23" y2="35" stroke="#94a3b8" stroke-width="1.6"/>
                        <rect x="-3" y="16" width="29" height="4" rx="1" fill="#be123c"/>
                        <path d="M -2 16 C -2 4, 25 4, 25 16 Z" fill="${step >= 5 ? '#e11d48' : '#fda4af'}" stroke="#9f1239" stroke-width="1.2" class="${step >= 5 ? 'pulsing-led' : ''}"/>
                        <text x="11" y="-4" font-size="9" font-family="'Outfit', sans-serif" font-weight="bold" fill="#e11d48" text-anchor="middle">LED Carga (Web)</text>
                    </g>
                `;
            }

            if (step >= 3) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-5v-pot',
                    arduinoPin: '5v',
                    traceName: 'Alimentação +5V do Potenciômetro',
                    fromDesc: 'Porta 5V do Arduino',
                    toDesc: 'Pino 1 (Esquerda) do Potenciômetro 10k',
                    color: '#ef4444',
                    pathD: 'M 175.7 240 L 175.7 325 C 175.7 395, 450 395, 550 250 L 550 148',
                    startX: 175.7, startY: 240, endX: 550, endY: 148,
                    badgeX: 280, badgeY: 365, badgeText: 'Cabo 5V',
                    isAnimated: step >= 5
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-gnd-pot',
                    arduinoPin: 'gnd1',
                    traceName: 'Referência de Terra GND',
                    fromDesc: 'Porta GND do Arduino',
                    toDesc: 'Pino 3 (Direita) do Potenciômetro e LED',
                    color: '#1e293b',
                    pathD: 'M 186.2 240 L 186.2 355 C 186.2 435, 480 435, 596 250 L 596 148',
                    startX: 186.2, startY: 240, endX: 596, endY: 148,
                    badgeX: 380, badgeY: 405, badgeText: 'Cabo GND',
                    isAnimated: step >= 5
                });
            }

            if (step >= 4) {
                svg += this.renderInteractiveWireTrace({
                    id: 'wire-a0-pot',
                    arduinoPin: 'a0',
                    traceName: 'Sinal de Telemetria Analógica A0',
                    fromDesc: 'Porta Analógica A0 (ADC 10-bits)',
                    toDesc: 'Pino 2 (Wiper Central) do Potenciômetro',
                    color: '#059669',
                    pathD: 'M 238.7 240 L 238.7 295 C 238.7 345, 490 320, 573 220 L 573 148',
                    startX: 238.7, startY: 240, endX: 573, endY: 148,
                    badgeX: 340, badgeY: 280, badgeText: 'Sinal A0 (Telemetria)',
                    isAnimated: step >= 5
                });

                svg += this.renderInteractiveWireTrace({
                    id: 'wire-d13-cmd',
                    arduinoPin: 'd13',
                    traceName: 'Comando de Atuação Remota D13',
                    fromDesc: 'Porta Digital D13 do Arduino',
                    toDesc: 'Ânodo do LED de Carga Web',
                    color: '#f59e0b',
                    pathD: 'M 175.7 70 L 175.7 25 C 175.7 10, 640 10, 720 70 L 720 143',
                    startX: 175.7, startY: 70, endX: 720, endY: 143,
                    badgeX: 410, badgeY: 10, badgeText: 'Comando D13',
                    isAnimated: step >= 5
                });
            }

            if (step >= 5) {
                svg += `
                    <g transform="translate(270, 420)" filter="url(#glowEffect)">
                        <rect x="0" y="0" width="360" height="34" rx="6" fill="#f0fdf4" stroke="#86efac" stroke-width="2"/>
                        <circle cx="18" cy="17" r="6" fill="#22c55e"/>
                        <text x="32" y="21" font-size="11.5" font-family="'Outfit', sans-serif" font-weight="bold" fill="#15803d">DASHBOARD CONECTADO: CONTROLE BIDIRECIONAL OK</text>
                    </g>
                `;
            }
        }

        return svg;
    }

    generateDupontConnector(x, y, color) {
        return `
            <rect x="${x - 3.5}" y="${y - 7}" width="7" height="14" rx="1.5" fill="#1e293b" stroke="#0f172a" stroke-width="1"/>
            <rect x="${x - 1.8}" y="${y - 3.5}" width="3.6" height="7" fill="${color}"/>
        `;
    }
}

window.PrototypeStepPlayer = PrototypeStepPlayer;
