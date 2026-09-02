<?php
/**
 * Model: CourseData
 * Matriz curricular da disciplina de Banco de Dados (SENAI-SP • 75h),
 * estruturada em 4 Módulos fundamentais com foco didático para iniciantes e Oracle MySQL Workbench.
 */

class CourseData {
    public static function getCourseInfo() {
        return [
            'course_title' => 'Banco de Dados',
            'course_code' => 'UC-BD-75H',
            'course_hours' => 75,
            'institution' => 'SENAI - Serviço Nacional de Aprendizagem Industrial',
            'course_program' => 'Habilitação Técnica em Desenvolvimento de Sistemas',
            'module_type' => 'Módulo Específico I',
            'general_objective' => 'Introduzir os conceitos fundamentais de banco de dados, tipos e fabricantes, modelagem conceitual, lógica e física, e a manipulação básica de dados através de SQL no MySQL Workbench para estudantes iniciantes.',
            'technical_capacities' => [
                1 => 'Compreender os conceitos fundamentais de dados, informações, metadados e sistemas gerenciadores de banco de dados (SGBD)',
                2 => 'Identificar as características, diferenças e aplicações dos bancos de dados relacionais (SQL) e não-relacionais (NoSQL)',
                3 => 'Reconhecer os principais fabricantes, fornecedores e motores de banco de dados do mercado corporativo',
                4 => 'Elaborar a modelagem conceitual de dados identificando entidades, atributos e relacionamentos (MER/DER)',
                5 => 'Construir a modelagem lógica estruturando tabelas, tipos de dados, chaves primárias (PK) e chaves estrangeiras (FK)',
                6 => 'Implementar a modelagem física no MySQL Workbench utilizando comandos DDL (CREATE DATABASE e CREATE TABLE)',
                7 => 'Manipular registros de dados com precisão através de comandos DML e DQL (INSERT, SELECT com filtros WHERE, UPDATE e DELETE)',
                8 => 'Documentar as estruturas criadas através de dicionários de dados padronizados'
            ],
            'socioemotional_capacities' => [
                'Demonstrar raciocínio analítico na resolução e abstração de problemas reais',
                'Demonstrar atenção aos detalhes na escrita de comandos e estruturação de tabelas',
                'Demonstrar autogestão, organização e postura ética na manipulação e zelo pelos dados'
            ],
            'methodological_recommendations' => [
                'Ferramenta Principal: Oracle MySQL Workbench 8.0 (Modelagem Visual EER e Editor SQL)',
                'Servidor de Banco de Dados: MySQL Community Server / MariaDB (XAMPP Porta 3306)',
                'Metodologia: Aprendizagem baseada em exemplos reais de indústrias fictícias, passo a passo para leigos e comandos essenciais (CREATE, INSERT, SELECT, UPDATE, DELETE)'
            ],
            'bibliografia' => [
                'CRUZ, André Felipe Savedra. Banco de Dados: Uma Abordagem Prática. São Paulo: SENAI-SP Editora, 2025.',
                'CARVALHO, Victor. MySQL: Comece com o principal banco de dados Open Source do mercado. São Paulo: Casa do Código, 2018.',
                'MACHADO, Felipe N. R.; ABREU, Maurício P. Banco de Dados – Projeto e Implementação. São Paulo: Érica, 2020.',
                'MANZANO, José Augusto N. G. MySQL 5.5 Interativo: Guia Essencial de Orientação e Desenvolvimento. São Paulo: Saraiva, 2011.'
            ]
        ];
    }

    public static function getModules() {
        return [
            1 => [
                'id' => 1,
                'title' => 'Módulo 1: Conceitos Fundamentais, Tipos & Fabricantes de Bancos de Dados',
                'senai_chapter' => 'Capítulo 1: Conceitos de Bancos de Dados, Importância nos Sistemas de Informação e Mercado',
                'plano_curso_item' => 'Item 1: O que é Banco de Dados e SGBD • Item 2: Benefícios e Importância em Sistemas de Informação • Item 3: Tipos de Bancos e Dicas de Escolha • Item 4: Principais Fabricantes, Empresas e Big Techs',
                'tech_capacity' => '1. Compreender o que é um banco de dados e SGBD / 2. Reconhecer os benefícios e a importância em sistemas de informação / 3. Diferenciar tipos de bancos e aplicar critérios de escolha / 4. Mapear os principais fabricantes e Big Techs do mercado',
                'hours_total' => '18h 45min',
                'summary' => 'Introdução conceitual completa para iniciantes: o que é um banco de dados, benefícios e por que utilizá-lo, a importância crucial nos sistemas de informação modernos, classificação de tipos de bancos de dados (Relacionais SQL e NoSQL), dicas e critérios para a escolha do banco ideal e o panorama das principais Big Techs, empresas desenvolvedoras e fabricantes do mercado mundial.',
                'lessons' => [
                    ['number' => 1, 'duration' => '45 min', 'title' => 'O que é Banco de Dados e SGBD?', 'desc' => 'Diferença entre Dado, Informação, Conhecimento, Metadados e o papel do Sistema Gerenciador de Banco de Dados.'],
                    ['number' => 2, 'duration' => '45 min', 'title' => 'Benefícios: Por que utilizar um Banco de Dados?', 'desc' => 'Concorrência multiusuário, eliminação de redundâncias, integridade, segurança, auditoria e backups corporativos.'],
                    ['number' => 3, 'duration' => '45 min', 'title' => 'Importância da Utilização em Sistemas de Informação', 'desc' => 'O papel do banco de dados como cérebro de ERPs, e-commerces, indústrias, aplicativos móveis e decisões estratégicas.'],
                    ['number' => 4, 'duration' => '45 min', 'title' => 'Tipos de Bancos de Dados e Dicas para a Escolha', 'desc' => 'Relacionais (SQL), NoSQL (Documentos, Chave-Valor, Grafos, Colunares), Vetoriais de IA e critérios práticos para escolher o banco certo.'],
                    ['number' => 5, 'duration' => '45 min', 'title' => 'Fabricantes, Empresas e Big Techs de Banco de Dados', 'desc' => 'Oracle, Microsoft, AWS, Google Cloud, IBM, PostgreSQL, MariaDB, MongoDB, Redis e estudo de caso teórico da AutoMetal Brasil.']
                ],
                'project_name' => 'Diagnóstico Conceitual e Seleção Tecnológica de Banco de Dados',
                'project_type' => 'Análise Conceitual e Teórica',
                'topics' => [
                    ['id' => 'o-que-e-banco-de-dados', 'title' => '1. O que é Banco de Dados?'],
                    ['id' => 'beneficios-pq-utilizar', 'title' => '2. Benefícios: Por que Utilizar?'],
                    ['id' => 'importancia-sistemas-informacao', 'title' => '3. Importância em Sistemas'],
                    ['id' => 'tipos-banco-dados', 'title' => '4. Tipos de Bancos de Dados'],
                    ['id' => 'dicas-escolha-banco', 'title' => '5. Dicas para a Escolha'],
                    ['id' => 'fabricantes-empresas-bigtechs', 'title' => '6. Big Techs & Fabricantes'],
                    ['id' => 'estudo-caso-teorico', 'title' => '7. Empresa Fictícia'],
                    ['id' => 'atividade-fixacao-teorica', 'title' => '8. Atividade de Fixação']
                ]
            ],
            2 => [
                'id' => 2,
                'title' => 'Módulo 2: Modelagem Conceitual de Dados (MER & DER)',
                'senai_chapter' => 'Capítulo 2: Modelagem de Dados – Nível Conceitual',
                'plano_curso_item' => 'Item 5: Modelagem Conceitual (Entidades, Atributos, Relacionamentos e Cardinalidades 1:1, 1:N, N:M)',
                'tech_capacity' => '5. Elaborar diagramas de modelagem conceitual (MER/DER) / 6. Identificar entidades e cardinalidades',
                'hours_total' => '18h 45min',
                'summary' => 'Aprenda a planejar um banco de dados antes de programar: identificação de entidades no mundo real, definição de atributos e chaves identificadoras, regras de relacionamentos e cardinalidades (1:1, 1:N, N:M) explicadas passo a passo.',
                'lessons' => [
                    ['number' => 1, 'duration' => '45 min', 'title' => 'O que é Modelagem e Por que Planejar?', 'desc' => 'A analogia da planta baixa de uma construção e a importância de entender as regras de negócio antes de criar tabelas.'],
                    ['number' => 2, 'duration' => '45 min', 'title' => 'Identificando Entidades no Mundo Real', 'desc' => 'O que deve virar entidade no sistema da AutoMetal Brasil (Peças, Clientes, Fornecedores, Pedidos e Máquinas).'],
                    ['number' => 3, 'duration' => '45 min', 'title' => 'Atributos e Identificadores Únicos', 'desc' => 'Características das entidades, atributos simples vs compostos e a importância de um código identificador único.'],
                    ['number' => 4, 'duration' => '45 min', 'title' => 'Relacionamentos e Cardinalidades Descomplicadas', 'desc' => 'Como entidades conversam: entendendo 1:1, 1:N e N:M através de perguntas simples do dia a dia.'],
                    ['number' => 5, 'duration' => '45 min', 'title' => 'Construção Visual do Diagrama Conceitual (DER)', 'desc' => 'Desenhando o diagrama conceitual da indústria fictícia e preparando a modelagem para a próxima etapa.']
                ],
                'project_name' => 'Elaboração do Modelo Conceitual (DER) para o Sistema da AutoMetal Brasil',
                'project_type' => 'Modelagem Conceitual de Dados',
                'topics' => [
                    ['id' => 'intro-modelagem', 'title' => '1. Por que Modelar?'],
                    ['id' => 'entidades-mundo-real', 'title' => '2. Entidades'],
                    ['id' => 'atributos-identificadores', 'title' => '3. Atributos'],
                    ['id' => 'cardinalidades-relacionamentos', 'title' => '4. Relacionamentos (1:1, 1:N, N:M)'],
                    ['id' => 'diagrama-der-passoapasso', 'title' => '5. Diagrama DER'],
                    ['id' => 'atividade-pratica-conceitual', 'title' => '6. Prática em Sala']
                ]
            ],
            3 => [
                'id' => 3,
                'title' => 'Módulo 3: Modelagem Lógica, Interface do Workbench & Conexão Remota',
                'senai_chapter' => 'Capítulo 3: Modelagem Lógica, Dicionário de Dados e Acesso Remoto no MySQL Workbench',
                'plano_curso_item' => 'Item 7: Modelo Lógico Relacional (Tipos de Dados, Chaves PK e FK, Cardinalidades e Dicionário de Dados) • Item 8: Interface do Workbench, Criação no Portal SENAI e Conexão Remota com Vault',
                'tech_capacity' => '2. Utilizar o MySQL Workbench / 3. Tipos de dados / 4. Conectar e gerenciar banco remoto / 5. Relacionamentos PK e FK / 7. Dicionário de Dados',
                'hours_total' => '18h 45min',
                'summary' => 'Tradução do modelo conceitual para a estrutura de tabelas relacionais (tipos de dados primitivos, chaves PK e FK, resolução de relacionamentos 1:N e N:M e dicionário de dados), apresentação completa dos 4 painéis da interface do Oracle MySQL Workbench, passo a passo ilustrado de criação do banco de dados remoto no Portal Educacional SENAI e configuração detalhada da conexão remota no Workbench em 8 etapas com Store in Vault e atalhos de acesso.',
                'lessons' => [
                    ['number' => 1, 'duration' => '45 min', 'title' => 'Do Conceitual ao Lógico: Regras de Conversão', 'desc' => 'Como entidades viram tabelas, atributos viram colunas e ocorrências viram linhas.'],
                    ['number' => 2, 'duration' => '45 min', 'title' => 'Tipos de Dados Primitivos, Chaves PK e FK', 'desc' => 'INT, VARCHAR, DECIMAL para moeda, DATE para datas e a integridade referencial com Primary e Foreign Keys.'],
                    ['number' => 3, 'duration' => '45 min', 'title' => 'Resolvendo Cardinalidades e Dicionário de Dados', 'desc' => 'Posicionamento da FK em 1:N, tabelas associativas em N:M e o catálogo técnico da AutoMetal Brasil.'],
                    ['number' => 4, 'duration' => '45 min', 'title' => 'Conhecendo a Interface do Oracle MySQL Workbench', 'desc' => 'Navegação pelos 4 painéis essenciais: Navigator/Schemas, SQL Query Editor, Result Grid e Action Output.'],
                    ['number' => 5, 'duration' => '45 min', 'title' => 'Criação no Portal SENAI e Conexão Remota no Workbench', 'desc' => 'Passo a passo no portal educacional (passos 1 a 5) e configuração da conexão remota via TCP/IP em 8 etapas com Vault.']
                ],
                'project_name' => 'Estruturação Lógica, Dicionário de Dados e Conexão Remota no Workbench',
                'project_type' => 'Modelagem Lógica & Configuração de Ambiente',
                'topics' => [
                    ['id' => 'conversao-conceitual-logico', 'title' => '1. Regras de Conversão'],
                    ['id' => 'tipos-dados-essenciais', 'title' => '2. Tipos de Dados'],
                    ['id' => 'chaves-pk-fk', 'title' => '3. Chaves PK & FK'],
                    ['id' => 'resolucao-cardinalidades', 'title' => '4. Relacionamentos & N:M'],
                    ['id' => 'dicionario-dados-empresa', 'title' => '5. Dicionário de Dados'],
                    ['id' => 'ambiente-workbench', 'title' => '6. Interface do Workbench'],
                    ['id' => 'criacao-banco-remoto', 'title' => '7. Criação no Portal SENAI'],
                    ['id' => 'conexao-workbench-remoto', 'title' => '8. Conexão no Workbench'],
                    ['id' => 'modelagem-visual-workbench', 'title' => '9. Modelagem Lógica no Workbench'],
                    ['id' => 'forward-engineer-workbench', 'title' => '10. Forward Engineer (DDL)'],
                    ['id' => 'atividade-pratica-logica', 'title' => '11. Atividade Prática']
                ]
            ],
            4 => [
                'id' => 4,
                'title' => 'Módulo 4: Manipulação de Dados (DML) – O Comando INSERT INTO na Prática',
                'senai_chapter' => 'Capítulo 4: Inserção de Dados, Integridade Referencial e Povoamento no MySQL Workbench',
                'plano_curso_item' => 'Item 9: Linguagem de Manipulação de Dados (DML) • Comando INSERT INTO (Sintaxe Simples e em Lote, AUTO_INCREMENT, Chaves Estrangeiras, Tratamento de Erros 1062 e 1452 e Validação de Dados)',
                'tech_capacity' => '2. Utilizar o MySQL Workbench / 10. Executar comandos DML (INSERT INTO) / 11. Validar integridade referencial e chaves / 12. Diagnosticar e corrigir erros de inserção',
                'hours_total' => '18h 45min',
                'summary' => 'Tutorial passo a passo completo sobre o comando INSERT INTO no MySQL Workbench: aprenda como persistir dados na fábrica AutoMetal Brasil S.A., respeitar a ordem lógica das Chaves Estrangeiras (FK), utilizar inserções individuais e em lote (Bulk Insert), gerenciar colunas AUTO_INCREMENT e diagnosticar visualmente os erros comuns de integridade (Erro 1062 de duplicidade e Erro 1452 de chave inexistente).',
                'lessons' => [
                    ['number' => 1, 'duration' => '45 min', 'title' => 'O Papel do DML e a Persistência com INSERT', 'desc' => 'Como as aplicações gravam dados no disco e a relação com as operações CRUD (Create).'],
                    ['number' => 2, 'duration' => '45 min', 'title' => 'Sintaxe do INSERT INTO e Tipos de Dados', 'desc' => 'Inserção com e sem declaração de colunas, formatação de textos, datas e números decimais.'],
                    ['number' => 3, 'duration' => '45 min', 'title' => 'A Regra de Ouro da Ordem de Povoamento (FK)', 'desc' => 'Por que tabelas independentes (categoria e cliente) devem ser povoadas antes das dependentes (peça e pedido).'],
                    ['number' => 4, 'duration' => '45 min', 'title' => 'Povoando as 5 Tabelas da AutoMetal Brasil', 'desc' => 'Scripts práticos comentados para categorias, clientes, peças, pedidos e itens do pedido.'],
                    ['number' => 5, 'duration' => '45 min', 'title' => 'Bulk Insert e Diagnóstico de Erros Comuns', 'desc' => 'Inserção em lote para alta performance e resolução prática dos Erros 1062, 1452 e 1048.']
                ],
                'project_name' => 'Povoamento Estruturado e Teste de Integridade Referencial da AutoMetal Brasil',
                'project_type' => 'Prática de Inserção SQL (DML) / MySQL Workbench',
                'topics' => [
                    ['id' => 'intro-dml-insert', 'title' => '1. Introdução ao DML e INSERT'],
                    ['id' => 'sintaxe-regras-insert', 'title' => '2. Sintaxes e Regras de Tipos'],
                    ['id' => 'ordem-integridade-povoamento', 'title' => '3. Ordem de Povoamento (FK)'],
                    ['id' => 'tutorial-insert-autometal', 'title' => '4. Povoando as 5 Tabelas'],
                    ['id' => 'bulk-insert-performance', 'title' => '5. Inserção em Lote (Bulk Insert)'],
                    ['id' => 'erros-comuns-diagnostico', 'title' => '6. Diagnóstico de Erros'],
                    ['id' => 'atividade-pratica-insert', 'title' => '7. Atividade Prática']
                ]
            ],
            5 => [
                'id' => 5,
                'title' => 'Módulo 5: Consultando Dados com o Comando SELECT (DQL)',
                'senai_chapter' => 'Capítulo 5: Consultas SQL Puras, Projeções de Colunas, Filtros com WHERE, Ordenação e Operadores',
                'plano_curso_item' => 'Item 10: Linguagem de Consulta de Dados (DQL) • Comando SELECT (Busca Geral com Asterisco, Projeção Explícita de Colunas, Cláusula WHERE com Operadores Relacionais e Lógicos, Ordenação com ORDER BY ASC/DESC, Busca Textual com LIKE e Consultas no Estoque)',
                'tech_capacity' => '2. Utilizar o MySQL Workbench / 7. Manipular e consultar registros com precisão através de comandos DQL (SELECT com filtros WHERE, LIKE e ORDER BY) / 10. Executar consultas no servidor MySQL',
                'hours_total' => '18h 45min',
                'summary' => 'Guia prático e didático sobre consultas a banco de dados com SQL puro: aprenda a usar o SELECT como a lanterna de busca do banco de dados, domine a diferença entre a busca geral (*) e a projeção direcionada de colunas, aplique filtros precisos com a cláusula WHERE, ordene relatórios com ORDER BY (ASC e DESC), realize buscas parciais com LIKE (%) e extraia relatórios operacionais no estoque da AutoMetal Brasil S.A.',
                'lessons' => [
                    ['number' => 1, 'duration' => '45 min', 'title' => 'A Lanterna do Banco: O Papel do DQL e do SELECT', 'desc' => 'Como as aplicações e relatórios leem dados persistidos e a relação com o "Read" do CRUD.'],
                    ['number' => 2, 'duration' => '45 min', 'title' => 'SELECT Geral (*) vs SELECT Direcionado (Projeção)', 'desc' => 'Por que selecionar colunas específicas deixa o sistema mais rápido, seguro e profissional.'],
                    ['number' => 3, 'duration' => '45 min', 'title' => 'A Cláusula WHERE e os Operadores Condicionais', 'desc' => 'Filtrando linhas por CPF, código, faixas de preço e comparações lógicas (=, >, <, >=, <=, !=).'],
                    ['number' => 4, 'duration' => '45 min', 'title' => 'Ordenação com ORDER BY (ASC e DESC)', 'desc' => 'Como organizar os resultados em ordem alfabética (A-Z), cronológica ou do maior para o menor valor.'],
                    ['number' => 5, 'duration' => '45 min', 'title' => 'Busca Textual com LIKE e Consultas no Estoque', 'desc' => 'Uso do caractere coringa (%) para busca de termos parciais e emissão de relatórios práticos de fábrica.']
                ],
                'project_name' => 'Consultas Estruturadas e Relatórios Gerenciais da AutoMetal Brasil',
                'project_type' => 'Consultas SQL (DQL) / MySQL Workbench',
                'topics' => [
                    ['id' => 'intro-dql-select', 'title' => '1. A Lanterna do Banco (DQL)'],
                    ['id' => 'select-padrao-geral', 'title' => '2. SELECT Padrão (Busca Geral)'],
                    ['id' => 'select-direcionado-colunas', 'title' => '3. SELECT Direcionado (Projeção)'],
                    ['id' => 'select-filtro-where', 'title' => '4. Filtros com a Cláusula WHERE'],
                    ['id' => 'select-ordenacao-orderby', 'title' => '5. Ordenação com ORDER BY'],
                    ['id' => 'select-completo-like', 'title' => '6. SELECT Completo & LIKE'],
                    ['id' => 'consultas-praticas-autometal', 'title' => '7. Consultas no Estoque Real'],
                    ['id' => 'atividade-pratica-select', 'title' => '8. Atividade Prática']
                ]
            ],
            6 => [
                'id' => 6,
                'title' => 'Módulo 6: Sistema Web Completo de Consulta em SQL (Full Stack)',
                'senai_chapter' => 'Capítulo 6: Construção e Análise de um Motor de Busca Real com HTML, CSS, JavaScript e PHP (Método A)',
                'plano_curso_item' => 'Item 11: Integração de Banco de Dados com Aplicações Web • Arquitetura Cliente-Servidor (Front-End HTML/CSS/JS, Back-End PHP e SGBD MySQL), Requisições Assíncronas com Fetch API/JSON e Execução Segura de Consultas DQL com PDO e Prepared Statements',
                'tech_capacity' => '2. Utilizar o MySQL Workbench / 7. Manipular e consultar registros com precisão através de comandos DQL / 10. Executar consultas no servidor MySQL / 13. Integrar banco de dados MySQL com aplicações Web',
                'hours_total' => '18h 45min',
                'summary' => 'Construção passo a passo de um sistema web completo de busca no estoque da AutoMetal Brasil: compreenda o fluxo de informação entre o HTML (interface visual), CSS (estilo e layout), JavaScript (transporte assíncrono via Fetch API) e PHP com PDO (execução de SQL puro no banco de dados) e teste o sistema interativo em tempo real.',
                'lessons' => [
                    ['number' => 1, 'duration' => '45 min', 'title' => 'A Arquitetura Web de 4 Camadas no Fluxo SQL', 'desc' => 'Como o navegador, o front-end, o servidor web PHP e o banco de dados conversam entre si.'],
                    ['number' => 2, 'duration' => '45 min', 'title' => 'A Interface Visual (HTML5) e o Estilo (CSS3)', 'desc' => 'Construção do index.html e style.css para criar a barra de busca e o container de resultados.'],
                    ['number' => 3, 'duration' => '45 min', 'title' => 'O Motor Lógico no Servidor (PHP com PDO & SQL Puro)', 'desc' => 'Criação do busca.php recebendo o termo de busca e executando SELECT com LIKE e ORDER BY.'],
                    ['number' => 4, 'duration' => '45 min', 'title' => 'O Transportador Assíncrono (JavaScript & Fetch API)', 'desc' => 'Criação do script.js para enviar requisições sem recarregar a página e renderizar resultados.'],
                    ['number' => 5, 'duration' => '45 min', 'title' => 'Teste em Tempo Real e Publicação no Servidor Linux', 'desc' => 'Simulação prática interativa, diagnóstico de conexões e boas práticas de segurança contra SQL Injection.']
                ],
                'project_name' => 'Motor de Busca de Peças em Tempo Real (AutoMetal Search Engine)',
                'project_type' => 'Desenvolvimento Full Stack & Integração SQL',
                'topics' => [
                    ['id' => 'intro-arquitetura-web-sql', 'title' => '1. Arquitetura em 4 Camadas'],
                    ['id' => 'html-interface-busca', 'title' => '2. A Interface Visual (HTML)'],
                    ['id' => 'css-estilo-motor-busca', 'title' => '3. O Estilo e Design (CSS)'],
                    ['id' => 'php-motor-logico-sql', 'title' => '4. Motor Lógico (PHP + SQL)'],
                    ['id' => 'js-transportador-fetch', 'title' => '5. Transportador (JavaScript)'],
                    ['id' => 'simulador-busca-tempo-real', 'title' => '6. Simulador Interativo ao Vivo'],
                    ['id' => 'atividade-pratica-fullstack', 'title' => '7. Atividade Prática']
                ]
            ],
            7 => [
                'id' => 7,
                'title' => 'Módulo 7: Atualizando Dados com o Comando UPDATE (DML)',
                'senai_chapter' => 'Capítulo 7: Atualização Segura de Dados (UPDATE), Cláusula WHERE, Operações em Lote e Boas Práticas',
                'plano_curso_item' => 'Item 12: Linguagem de Manipulação de Dados (DML) • Comando UPDATE (Atualização Simples de Atributos, Modificação de Múltiplas Colunas com SET, Operações Matemáticas em Lote, A Importância Crítica da Cláusula WHERE, Safe Updates no MySQL Workbench e Validação Prévia com SELECT)',
                'tech_capacity' => '2. Utilizar o MySQL Workbench / 7. Manipular e atualizar registros com precisão através de comandos DML (UPDATE) / 10. Executar comandos no servidor MySQL',
                'hours_total' => '18h 45min',
                'summary' => 'Guia prático e didático sobre atualização de dados em SQL com o comando UPDATE: domine a regra de ouro do WHERE para evitar alterações indesejadas, atualize um único campo com segurança, modifique múltiplas colunas simultaneamente, execute reajustes matemáticos em lote e aplique o método preventivo do SELECT prévio no banco de dados da fábrica AutoMetal Brasil S.A.',
                'lessons' => [
                    ['number' => 1, 'duration' => '45 min', 'title' => 'A Importância do UPDATE e a Regra de Ouro do WHERE', 'desc' => 'Por que dados mudam constantemente no mundo real e os riscos catastróficos de esquecer o filtro WHERE.'],
                    ['number' => 2, 'duration' => '45 min', 'title' => 'Atualizando um Único Campo (O Básico Seguro)', 'desc' => 'Alteração pontual de registros com chave primária (ex: novo telefone do cliente Carlos Almeida).'],
                    ['number' => 3, 'duration' => '45 min', 'title' => 'Atualizando Múltiplas Colunas na Mesma Instrução', 'desc' => 'Sintaxe com vírgulas e SET único para atualizar preço e reposição de estoque simultaneamente.'],
                    ['number' => 4, 'duration' => '45 min', 'title' => 'UPDATE com Cálculos Matemáticos e Reajustes em Lote', 'desc' => 'Aumento percentual em categorias de produtos (ex: reajuste de 10% na categoria Filtros).'],
                    ['number' => 5, 'duration' => '45 min', 'title' => 'Boas Práticas de Prevenção e Atividade Prática', 'desc' => 'Técnica do SELECT prévio, Safe Updates no Workbench e resolução dos desafios de negócio da fábrica.']
                ],
                'project_name' => 'Atualização Cadastral e Reajustes no Estoque da AutoMetal Brasil',
                'project_type' => 'Manipulação DML (UPDATE) / MySQL Workbench',
                'topics' => [
                    ['id' => 'intro-update-regra-ouro', 'title' => '1. A Regra de Ouro do UPDATE'],
                    ['id' => 'update-unico-valor', 'title' => '2. Atualizando um Único Valor'],
                    ['id' => 'update-multiplas-colunas', 'title' => '3. Múltiplas Colunas ao Mesmo Tempo'],
                    ['id' => 'update-calculos-matematicos', 'title' => '4. Cálculos Matemáticos em Lote'],
                    ['id' => 'boas-praticas-prevencao', 'title' => '5. Prevenção de Erros (SELECT Prévio)'],
                    ['id' => 'safe-updates-workbench', 'title' => '6. Safe Updates no MySQL Workbench'],
                    ['id' => 'atividade-pratica-update', 'title' => '7. Atividade Prática']
                ]
            ],
            8 => [
                'id' => 8,
                'title' => 'Módulo 8: Excluindo Dados com o Comando DELETE (DML)',
                'senai_chapter' => 'Capítulo 8: Exclusão Controlada de Dados (DELETE), Fechamento do Ciclo CRUD e Integridade Referencial',
                'plano_curso_item' => 'Item 13: Linguagem de Manipulação de Dados (DML) • Comando DELETE (Exclusão Simples de Registros, A Regra de Ouro do WHERE, Integridade Referencial e Bloqueio da Chave Estrangeira - Erro 1451, Exclusão Hierárquica De Baixo para Cima, Protocolo de Segurança com SELECT Prévio e Diferenças entre DELETE, TRUNCATE e DROP)',
                'tech_capacity' => '2. Utilizar o MySQL Workbench / 7. Manipular e excluir registros com precisão através de comandos DML (DELETE) / 10. Executar comandos no servidor MySQL / 11. Validar e preservar a integridade referencial',
                'hours_total' => '18h 45min',
                'summary' => 'Guia prático e didático sobre exclusão segura de registros em SQL com o comando DELETE: feche o ciclo fundamental do CRUD, domine a regra de ouro da cláusula WHERE para evitar desastres irreversíveis, compreenda o bloqueio de Chave Estrangeira (Erro 1451), aprenda a estratégia de exclusão hierárquica de baixo para cima, aplique o protocolo preventivo com SELECT prévio e compare as diferenças operacionais entre DELETE, TRUNCATE TABLE e DROP TABLE no banco de dados da fábrica AutoMetal Brasil S.A.',
                'lessons' => [
                    ['number' => 1, 'duration' => '45 min', 'title' => 'O Papel do DELETE e o Fechamento do Ciclo CRUD', 'desc' => 'Como o comando DELETE atua na remoção física de dados e completa as 4 operações fundamentais (Create, Read, Update, Delete).'],
                    ['number' => 2, 'duration' => '45 min', 'title' => 'A Regra de Ouro do WHERE e o Perigo Oculto', 'desc' => 'Por que nunca executar um DELETE sem a cláusula WHERE e o risco catastrófico de perda total da base de dados.'],
                    ['number' => 3, 'duration' => '45 min', 'title' => 'Exclusão Simples em Tabelas Independentes', 'desc' => 'Remoção pontual e imediata de categorias ou registros sem vínculos relacionais ativos.'],
                    ['number' => 4, 'duration' => '45 min', 'title' => 'O Bloqueio da Chave Estrangeira (Erro 1451) e a Exclusão Hierárquica', 'desc' => 'Como o MySQL protege notas fiscais com integridade referencial e o método de exclusão ordenada De Baixo para Cima (filho -> pai).'],
                    ['number' => 5, 'duration' => '45 min', 'title' => 'Protocolo Preventivo (SELECT Prévio) e DELETE vs TRUNCATE vs DROP', 'desc' => 'Técnica de conferência visual antes do DELETE e análise detalhada das diferenças de impacto e performance entre os 3 comandos de limpeza.']
                ],
                'project_name' => 'Exclusão Segura e Gestão de Integridade Referencial da AutoMetal Brasil',
                'project_type' => 'Manipulação DML (DELETE) / MySQL Workbench',
                'topics' => [
                    ['id' => 'intro-delete-crud-regra-ouro', 'title' => '1. O Ciclo CRUD & Regra de Ouro'],
                    ['id' => 'delete-simples-independentes', 'title' => '2. Exclusão Simples (Sem Vínculos)'],
                    ['id' => 'bloqueio-fk-erro-1451', 'title' => '3. Bloqueio de FK (Erro 1451)'],
                    ['id' => 'exclusao-baixo-para-cima', 'title' => '4. Exclusão De Baixo para Cima'],
                    ['id' => 'boas-praticas-select-previo', 'title' => '5. Protocolo do SELECT Prévio'],
                    ['id' => 'comparativo-delete-truncate-drop', 'title' => '6. DELETE vs TRUNCATE vs DROP'],
                    ['id' => 'atividade-pratica-delete', 'title' => '7. Atividade Prática de Fixação']
                ]
            ]
        ];
    }

    public static function getModuleById($id) {
        $modules = self::getModules();
        return isset($modules[$id]) ? $modules[$id] : null;
    }
}
