<?php
/**
 * Model: CourseData
 * Contém os dados estruturados da disciplina de Internet das Coisas (IoT),
 * correlação com o Plano de Curso (páginas 58 e 59) e capítulos da apostila SENAI.
 */

class CourseData {
    public static function getCourseInfo() {
        return [
            'course_title' => 'Internet das Coisas (IoT)',
            'course_code' => 'UC-IOT-75H',
            'course_hours' => 75,
            'institution' => 'SENAI - Serviço Nacional de Aprendizagem Industrial',
            'course_program' => 'Habilitação Técnica em Desenvolvimento de Sistemas',
            'module_type' => 'Módulo Específico I',
            'general_objective' => 'Desenvolver capacidades técnicas e socioemocionais necessárias à implementação de soluções com tecnologias de IoT para a integração de sistemas, por meio de sensores, atuadores e aplicações de interfaces gráficas.',
            'technical_capacities' => [
                1 => 'Identificar as diferenças entre as aplicações do IoT e IIoT',
                2 => 'Identificar os tipos de hardwares e soluções disponíveis',
                3 => 'Configurar ambientes de desenvolvimento',
                4 => 'Implementar protocolos de comunicação',
                5 => 'Integrar a automação em plataforma na nuvem',
                6 => 'Conectar as aplicações gráficas'
            ],
            'socioemotional_capacities' => [
                'Demonstrar autogestão',
                'Demonstrar pensamento analítico',
                'Demonstrar inteligência emocional',
                'Demonstrar autonomia'
            ],
            'methodological_recommendations' => [
                'Dispositivos: Arduino Uno, ESP8266, ESP32, Raspberry Pi, Kit de Sensores e Atuadores',
                'Ambientes e IDEs: Arduino IDE, PlatformIO, VS Code, Thonny, MicroPython, Tinkercad, Wokwi',
                'Linguagens: C/C++, JavaScript (Node.js), Python, HTML5/CSS3'
            ]
        ];
    }

    public static function getModules() {
        return [
            1 => [
                'id' => 1,
                'title' => 'Módulo 1: Fundamentos de IoT, IIoT e Automação',
                'senai_chapter' => 'Capítulo 1: Internet das Coisas',
                'plano_curso_item' => 'Item 1: Automação em IoT (1.1 Residencial, 1.2 Pessoal, 1.3 Industrial, 1.4 Aplicações)',
                'tech_capacity' => '1. Identificar as diferenças entre as aplicações do IoT e IIoT',
                'hours_total' => '3h 45min (5 aulas de 45 minutos)',
                'summary' => 'Apresentação do conceito de Internet das Coisas, origens e evolução histórica, pilares de funcionamento (sensores, conectividade, nuvem, interfaces), segurança da informação em IoT e IIoT, e análise aprofundada de aplicações em automação residencial, pessoal e industrial.',
                'lessons' => [
                    ['number' => 1, 'duration' => '45 min', 'title' => 'Conceito, Origens e Evolução da IoT', 'desc' => 'Definição de IoT, histórico desde 1999 com Kevin Ashton, evolução dos dispositivos conectados e os 4 pilares essenciais (sensores, conectividade, processamento e interface).'],
                    ['number' => 2, 'duration' => '45 min', 'title' => 'IoT vs IIoT (Internet das Coisas Industrial)', 'desc' => 'Diferenciação crítica entre IoT de consumo e IIoT para indústria 4.0: requisitos de confiabilidade, tolerância a falhas, latência e impacto operacional.'],
                    ['number' => 3, 'duration' => '45 min', 'title' => 'Segurança, Riscos e Aplicações Práticas', 'desc' => 'Desafios de cibersegurança em IoT/IIoT, vulnerabilidades em firmware, criptografia e análise das vertentes: Automação Residencial, Pessoal (Wearables/Saúde) e Industrial.'],
                    ['number' => 4, 'duration' => '45 min', 'title' => '1ª Prática: Simulação no Autodesk Tinkercad', 'desc' => 'Construção orientada de um sistema de automação residencial com sensor de luminosidade (LDR), LED indicador e lógica de acionamento no simulador virtual.'],
                    ['number' => 5, 'duration' => '45 min', 'title' => '2ª Prática: Montagem em Hardware Real & Avaliação', 'desc' => 'Montagem física em bancada no Arduino Uno real com protoboard e componentes físicos, testes elétricos, depuração e entrega da atividade prática avaliativa.']
                ],
                'project_name' => 'Sistema Inteligente de Iluminação Residencial com Sensor LDR',
                'project_type' => 'Automação Residencial / Sensoriamento de Luminosidade'
            ],
            2 => [
                'id' => 2,
                'title' => 'Módulo 2: Requisitos de Instalação, Hardware, Sensores e IDEs',
                'senai_chapter' => 'Capítulo 2: Requisitos e Ferramentas para Desenvolvimento',
                'plano_curso_item' => 'Item 2: Requisitos para Instalação (Hardware, Conectividade, Periféricos, Sensores e Atuadores) e Item 3: Ambiente de Desenvolvimento (IDEs e Configuração)',
                'tech_capacity' => '2. Identificar os tipos de hardwares e soluções disponíveis / 3. Configurar ambientes de desenvolvimento',
                'hours_total' => '3h 45min (5 aulas de 45 minutos)',
                'summary' => 'Critérios de seleção de microcontroladores (Arduino Uno, ESP32, Raspberry Pi), interfaces de entrada/saída (Digitais, Analógicas e PWM), catálogo técnico de sensores (PIR, LDR, DHT) e atuadores (Relés, Servos, Motores, Buzzers), e configuração de IDEs profissionais (Arduino IDE, VS Code + PlatformIO).',
                'lessons' => [
                    ['number' => 1, 'duration' => '45 min', 'title' => 'Hardwares para IoT: Microcontroladores vs Microprocessadores', 'desc' => 'Análise comparativa entre Arduino Uno (ATmega328P), ESP32 (Wi-Fi/Bluetooth integrado) e Raspberry Pi (computador em placa única). Conectividade e periféricos.'],
                    ['number' => 2, 'duration' => '45 min', 'title' => 'Interfaces de I/O, Sensores e Atuadores', 'desc' => 'Portas Digitais (HIGH/LOW), Analógicas (ADC 10-bit/12-bit) e modulação PWM. Estudo dos sensores de presença PIR e atuadores de potência (Módulos Relé eletromecânicos).'],
                    ['number' => 3, 'duration' => '45 min', 'title' => 'Ambientes de Desenvolvimento (IDEs e Ferramentas)', 'desc' => 'Instalação e configuração de Arduino IDE 2.x, VS Code com PlatformIO, bibliotecas essenciais e simuladores (Tinkercad e Wokwi).'],
                    ['number' => 4, 'duration' => '45 min', 'title' => '1ª Prática: Simulação no Tinkercad (PIR + Relé)', 'desc' => 'Tutorial passo a passo de montagem no Tinkercad de um sistema de automação predial com sensor infravermelho passivo (PIR) e acionamento de lâmpada via Relé.'],
                    ['number' => 5, 'duration' => '45 min', 'title' => '2ª Prática: Montagem em Hardware Real & Avaliação', 'desc' => 'Montagem em bancada com Arduino Uno físico, sensor PIR HC-SR501, módulo relé 5V, calibração de sensibilidade/tempo e submissão da atividade avaliativa.']
                ],
                'project_name' => 'Sistema de Controle de Carga com Sensor de Presença PIR e Módulo Relé',
                'project_type' => 'Automação Predial / Controle de Potência'
            ],
            3 => [
                'id' => 3,
                'title' => 'Módulo 3: Protocolos de Comunicação e Integração com a Nuvem',
                'senai_chapter' => 'Capítulo 3: Protocolos de Comunicação e Integração',
                'plano_curso_item' => 'Item 4: Protocolos de Comunicação (MQTT, HTTP, BLE, Zigbee, LoRaWAN, NB-IoT) e Item 5: Preparação de dispositivo IoT (Conexão nuvem, envio de dados, regras, lógica e controle)',
                'tech_capacity' => '4. Implementar protocolos de comunicação / 5. Integrar a automação em plataforma na nuvem',
                'hours_total' => '3h 45min (5 aulas de 45 minutos)',
                'summary' => 'Estudo aprofundado da pilha de protocolos de comunicação para IoT: MQTT (Publish/Subscribe, Broker, Tópicos, QoS), HTTP/REST, BLE, Zigbee em malha, redes de longo alcance LoRaWAN e celulares NB-IoT/LTE-M. Integração prática com plataformas em nuvem (Firebase, Adafruit IO, ThingSpeak), telemetria e regras de automação.',
                'lessons' => [
                    ['number' => 1, 'duration' => '45 min', 'title' => 'Redes Locais e Longo Alcance: BLE, Zigbee, LoRaWAN, NB-IoT', 'desc' => 'Topologias de rede, consumo energético, alcance e largura de banda: redes em estrela (LoRaWAN/NB-IoT) vs redes em malha (Zigbee) e comunicação de curto alcance (BLE).'],
                    ['number' => 2, 'duration' => '45 min', 'title' => 'Protocolos de Aplicação: MQTT vs HTTP/REST', 'desc' => 'Arquitetura Publish/Subscribe do MQTT, funcionamento do Broker, tópicos, níveis de qualidade de serviço (QoS 0, 1, 2) e comparação com o modelo cliente-servidor HTTP.'],
                    ['number' => 3, 'duration' => '45 min', 'title' => 'Integração em Nuvem: Dashboards, Regras e Telemetria', 'desc' => 'Configuração de serviços em nuvem (Firebase Realtime Database, Adafruit IO, ThingSpeak), autenticação com API Keys, criação de feeds e regras de alerta.'],
                    ['number' => 4, 'duration' => '45 min', 'title' => '1ª Prática: Simulação de Nó Telemetria no Simulador', 'desc' => 'Tutorial passo a passo no simulador criando um nó transmissor de telemetria de temperatura, formatando payloads JSON e simulando publicação MQTT.'],
                    ['number' => 5, 'duration' => '45 min', 'title' => '2ª Prática: Montagem em Hardware Real & Avaliação', 'desc' => 'Montagem física do nó sensor com ESP32 / Arduino + sensor de temperatura DHT11/LM35, transmissão real de telemetria e entrega da atividade prática avaliativa.']
                ],
                'project_name' => 'Nó de Telemetria e Monitoramento Climático Conectado à Nuvem',
                'project_type' => 'Telemetria IoT / Conectividade MQTT & Nuvem'
            ],
            4 => [
                'id' => 4,
                'title' => 'Módulo 4: Desenvolvimento de Interfaces Gráficas Interativas para IoT',
                'senai_chapter' => 'Capítulo 4: Desenvolvimento de Interfaces Gráficas',
                'plano_curso_item' => 'Item 6: Interfaces com elementos visuais interativos (6.1 Linguagens HTML, CSS, JavaScript; 6.2 Aplicações: Visualização de dados, Interatividade, Testes e Feedbacks)',
                'tech_capacity' => '6. Conectar as aplicações gráficas',
                'hours_total' => '3h 45min (5 aulas de 45 minutos)',
                'summary' => 'Concepção e construção de interfaces homem-máquina (HMI) modernas e dashboards web para IoT. Aplicação de HTML5 semântico, CSS3 responsivo e JavaScript assíncrono (Fetch API e WebSockets), integração de gráficos dinâmicos com Chart.js, botões e switches de comando, feedback visual de status e testes de usabilidade.',
                'lessons' => [
                    ['number' => 1, 'duration' => '45 min', 'title' => 'Princípios de UX/UI e Arquitetura de Dashboards IoT', 'desc' => 'Ergonomia visual, hierarquia de informações, atualização em tempo real, consistência de layout e prevenção de sobrecarga cognitiva em painéis de monitoramento.'],
                    ['number' => 2, 'duration' => '45 min', 'title' => 'Linguagens Web para IoT: HTML5, CSS3 e JS Assíncrono', 'desc' => 'Estruturação semântica, estilização com CSS Grid/Flexbox, requisições assíncronas via Fetch API e WebSockets para comunicação bidirecional de baixa latência.'],
                    ['number' => 3, 'duration' => '45 min', 'title' => 'Visualização de Dados com Chart.js e Controles Interativos', 'desc' => 'Implementação de gráficos de linha em tempo real, medidores (gauges), botões liga/desliga com feedback de status e tratamento de erros de conexão.'],
                    ['number' => 4, 'duration' => '45 min', 'title' => '1ª Prática: Simulação de Atuação e Painel no Tinkercad', 'desc' => 'Construção no Tinkercad de um protótipo com Arduino enviando dados via Serial para o painel de depuração e recebendo comandos de atuador.'],
                    ['number' => 5, 'duration' => '45 min', 'title' => '2ª Prática: Hardware Real Integrado ao Dashboard Web & 3D', 'desc' => 'Montagem final integrando o hardware real ao Dashboard Web completo com Three.js, visualização de dados em tempo real, comando de atuador e avaliação final.']
                ],
                'project_name' => 'Dashboard Web Interativo de Telemetria e Controle Remoto IoT',
                'project_type' => 'Interface Web IoT / Visualização de Dados e Controle'
            ]
        ];
    }

    public static function getModuleById($id) {
        $modules = self::getModules();
        return isset($modules[$id]) ? $modules[$id] : null;
    }
}
