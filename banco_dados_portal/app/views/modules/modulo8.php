<?php
/**
 * View: Módulo 8 - Excluindo Dados com o Comando DELETE (DML)
 * Disciplina: Banco de Dados (75h) • SENAI-SP
 * Baseado no documento modelagem.docx e nas diretrizes metodológicas da apostila técnica.
 */
?>

<!-- ==========================================
     HERO CARD DO MÓDULO 8
     ========================================== -->
<div class="hero-card">
    <div class="hero-tags">
        <span class="badge-tag senai">SENAI - SP • Módulo 8</span>
        <span class="badge-tag accent">Capítulo 8: Exclusão de Dados (DML – DELETE)</span>
        <span class="badge-tag time">Fechamento do Ciclo CRUD</span>
    </div>
    <h1 class="hero-title"><?= htmlspecialchars($module['title']) ?></h1>
    <p class="hero-desc">
        O comando <strong>DELETE</strong> é a ferramenta fundamental utilizada para remover permanentemente registros do nosso servidor físico Linux. Com ele, fechamos com chave de ouro o ciclo <strong>CRUD</strong> (<em>Create, Read, Update, Delete</em>). Na administração profissional de bancos de dados relacionais, apagar uma informação raramente é uma ação isolada: como nossas tabelas estão amarradas por <strong>Chaves Estrangeiras (FK)</strong>, o MySQL atua como um verdadeiro guarda de trânsito, impedindo exclusões que deixariam o sistema quebrado ou com notas fiscais órfãs.
    </p>
</div>

<!-- ==========================================
     SEÇÃO 1: O CICLO CRUD E A REGRA DE OURO DO DELETE
     ========================================== -->
<section id="intro-delete-crud-regra-ouro" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #fee2e2; color: #dc2626;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
        </div>
        <div>
            <h2 class="section-title">1. O Ciclo CRUD & A Regra de Ouro do DELETE (O Perigo Oculto)</h2>
            <div class="section-subtitle">O fechamento das 4 operações essenciais e o risco crítico da ausência de filtro</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Ao longo dos módulos anteriores, construímos as bases completas para manipular o banco de dados da fábrica <strong>AutoMetal Brasil S.A.</strong>. Agora, completamos as 4 operações universais que todo sistema computacional do mundo executa:
        </p>

        <!-- CARDS DO CICLO CRUD -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 14px; margin: 18px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; border-top: 4px solid #059669;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                    <span style="font-weight: 800; color: #059669; font-size: 11px; background: #dcfce7; padding: 2px 8px; border-radius: 4px;">C • CREATE</span>
                    <span style="font-size: 11px; color: #64748b; font-weight: 700;">Módulo 4</span>
                </div>
                <h4 style="margin: 4px 0; font-size: 15px; color: #0f172a;">INSERT INTO</h4>
                <p style="font-size: 12px; color: #475569; margin: 0;">Cadastra novos registros (clientes, peças, pedidos) nas tabelas.</p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; border-top: 4px solid #0284c7;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                    <span style="font-weight: 800; color: #0284c7; font-size: 11px; background: #e0f2fe; padding: 2px 8px; border-radius: 4px;">R • READ</span>
                    <span style="font-size: 11px; color: #64748b; font-weight: 700;">Módulos 5 e 6</span>
                </div>
                <h4 style="margin: 4px 0; font-size: 15px; color: #0f172a;">SELECT</h4>
                <p style="font-size: 12px; color: #475569; margin: 0;">Consulta, filtra com WHERE, ordena com ORDER BY e projeta colunas.</p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; border-top: 4px solid #ea580c;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                    <span style="font-weight: 800; color: #ea580c; font-size: 11px; background: #ffedd5; padding: 2px 8px; border-radius: 4px;">U • UPDATE</span>
                    <span style="font-size: 11px; color: #64748b; font-weight: 700;">Módulo 7</span>
                </div>
                <h4 style="margin: 4px 0; font-size: 15px; color: #0f172a;">UPDATE ... SET</h4>
                <p style="font-size: 12px; color: #475569; margin: 0;">Modifica dados existentes sem alterar o ID original da linha.</p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; border-top: 4px solid #dc2626; box-shadow: 0 4px 12px rgba(220, 38, 38, 0.08);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                    <span style="font-weight: 800; color: #dc2626; font-size: 11px; background: #fee2e2; padding: 2px 8px; border-radius: 4px;">D • DELETE</span>
                    <span style="font-size: 11px; color: #dc2626; font-weight: 700;">Módulo 8 (Atual)</span>
                </div>
                <h4 style="margin: 4px 0; font-size: 15px; color: #991b1b;">DELETE FROM</h4>
                <p style="font-size: 12px; color: #475569; margin: 0;">Remove fisicamente registros do disco com controle referencial.</p>
            </div>
        </div>

        <!-- ALERTA CRÍTICO: REGRA DE OURO DO DELETE -->
        <div style="background: #fff1f2; border: 2px solid #f43f5e; border-radius: 10px; padding: 20px; margin: 20px 0; box-shadow: 0 4px 14px rgba(244, 63, 94, 0.1);">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#e11d48" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                <span style="font-size: 16px; font-weight: 800; color: #9f1239; font-family: var(--font-heading);">A REGRA DE OURO DO DBA: NUNCA EXECUTE UM DELETE SEM WHERE!</span>
            </div>
            <p style="font-size: 13.5px; color: #881337; margin: 0 0 10px 0; line-height: 1.6;">
                A mesma regra vital do módulo anterior se aplica aqui com <strong>peso em dobro</strong>: Se você digitar apenas <code>DELETE FROM cliente;</code> e pressionar <kbd>Ctrl+Enter</kbd>, o servidor MySQL <strong>apagará absolutamente todos os clientes cadastrados na loja em uma fração de segundo</strong>, sem pedir confirmação e sem perguntar se você tem certeza!
            </p>
            <div style="background: #ffffff; border-radius: 6px; padding: 12px 16px; border: 1px dashed #f43f5e; font-size: 13px; color: #9f1239;">
                <strong>Estrutura Sintática Segura e Obrigatória:</strong><br>
                <code><span style="color: #0033b3; font-weight: 700;">DELETE FROM</span> tabela <span style="color: #0033b3; font-weight: 700;">WHERE</span> condicao_filtro;</code>
            </div>
        </div>

        <p>
            A estrutura segura divide-se em 2 instruções lógicas:
        </p>
        <ul style="margin: 10px 0 18px 24px; color: var(--text-secondary); font-size: 14px;">
            <li><strong>DELETE FROM [tabela]:</strong> Especifica a tabela física de onde as linhas serão descarregadas.</li>
            <li><strong>WHERE [coluna = valor]:</strong> Especifica exatamente a condição restritiva (geralmente a Chave Primária <code>id</code>) que identifica a linha a ser deletada.</li>
        </ul>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 2: A EXCLUSÃO SIMPLES (TABELAS INDEPENDENTES)
     ========================================== -->
<section id="delete-simples-independentes" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #e0f2fe; color: #0284c7;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
        </div>
        <div>
            <h2 class="section-title">2. A Exclusão Simples (Tabelas Independentes / Sem Vínculos)</h2>
            <div class="section-subtitle">Como remover dados com segurança quando não existem dependências ativas</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Apagar um dado é simples e direto quando ele <strong>não possui vínculos relacionais ativos</strong> com outras partes do sistema. Imagine o seguinte cenário prático na AutoMetal Brasil:
        </p>

        <div style="background: #f8fafc; border-left: 4px solid #0284c7; padding: 14px 18px; margin: 16px 0; border-radius: 0 8px 8px 0;">
            <h4 style="margin: 0 0 6px 0; color: #0369a1; font-size: 14px;">📋 Cenário Prático da Fábrica:</h4>
            <p style="margin: 0; font-size: 13.5px; color: #334155;">
                O almoxarifado cadastrou por engano uma categoria chamada <em>"Acessórios"</em> com o <code>id_categoria = 6</code>. Como essa categoria é nova e nenhuma peça de estoque foi guardada dentro dela, ela não possui filhos vinculados.
            </p>
        </div>

        <div class="code-block-wrapper">
            <div class="code-header">
                <span class="code-lang">SQL Puro (MySQL Workbench)</span>
                <button class="btn-copy-code" onclick="navigator.clipboard.writeText('DELETE FROM categoria\nWHERE id_categoria = 6;'); alert('Código copiado com sucesso!');">Copiar SQL</button>
            </div>
            <pre class="code-content"><code class="language-sql"><span class="token-comment">-- Exclui a categoria "Acessórios" de ID 6 que não possui peças associadas</span>
<span class="token-keyword">DELETE FROM</span> categoria 
<span class="token-keyword">WHERE</span> id_categoria = <span class="token-number">6</span>;</code></pre>
        </div>

        <div style="background: #f0fdf4; border: 1.5px solid #86efac; border-radius: 8px; padding: 14px 18px; margin: 16px 0;">
            <h4 style="color: #166534; margin: 0 0 6px 0; font-size: 14px; font-weight: 700;">💡 Explicação Didática:</h4>
            <p style="color: #15803d; margin: 0; font-size: 13px; line-height: 1.55;">
                Como a categoria estava vazia e sem chaves estrangeiras apontando para ela, o banco de dados executa a exclusão imediatamente. A linha de ID 6 é removida do arquivo de dados e a resposta no console é <code>1 row(s) affected</code>.
            </p>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 8.1 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 8.1
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Execução do DELETE Simples no MySQL Workbench</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 8.1: Execução do comando DELETE FROM categoria WHERE id_categoria = 6; no MySQL Workbench com semáforo verde no Action Output indicando 1 row(s) affected" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/delete-simples-categoria-sucesso.png" alt="Execução do comando DELETE FROM categoria WHERE id_categoria = 6 no MySQL Workbench com semáforo verde no Action Output" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar Imagem</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 8.1:</strong> Execução do comando <code>DELETE FROM categoria WHERE id_categoria = 6;</code> no MySQL Workbench, exibindo o painel <em>Action Output</em> com o semáforo verde e a confirmação <code>1 row(s) affected</code>. <em>(Clique na imagem para ampliá-la)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 3: O BLOQUEIO DA CHAVE ESTRANGEIRA (ERRO 1451)
     ========================================== -->
<section id="bloqueio-fk-erro-1451" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #fee2e2; color: #b91c1c;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
        </div>
        <div>
            <h2 class="section-title">3. O Bloqueio da Chave Estrangeira (Erro 1451: Foreign Key Constraint)</h2>
            <div class="section-subtitle">Por que o MySQL impede a exclusão de pais que possuem filhos vinculados</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            O verdadeiro desafio do <code>DELETE</code> em ambientes corporativos acontece quando tentamos apagar algo que <strong>já foi utilizado</strong> no sistema. Imagine a seguinte situação real:
        </p>

        <div style="background: #fef2f2; border-left: 4px solid #ef4444; padding: 14px 18px; margin: 16px 0; border-radius: 0 8px 8px 0;">
            <h4 style="margin: 0 0 6px 0; color: #991b1b; font-size: 14px;">⚠️ Cenário de Conflito de Integridade:</h4>
            <p style="margin: 0; font-size: 13.5px; color: #7f1d1d;">
                O cliente <strong>Carlos Almeida</strong> (ID 1) entra em contato e solicita a exclusão total do seu cadastro na loja. Um atendente desavisado tenta executar o comando lógico intuitivo:
            </p>
        </div>

        <div class="code-block-wrapper">
            <div class="code-header">
                <span class="code-lang">Tentativa com Falha (SQL)</span>
                <button class="btn-copy-code" onclick="navigator.clipboard.writeText('DELETE FROM cliente\nWHERE id_cliente = 1;'); alert('Código copiado!');">Copiar SQL</button>
            </div>
            <pre class="code-content"><code class="language-sql"><span class="token-comment">-- Tentativa de excluir um cliente que já possui compras e pedidos registrados</span>
<span class="token-keyword">DELETE FROM</span> cliente 
<span class="token-keyword">WHERE</span> id_cliente = <span class="token-number">1</span>;</code></pre>
        </div>

        <!-- BOX DO ERRO 1451 -->
        <div style="background: #1e1b4b; color: #ffffff; border-radius: 8px; padding: 18px; margin: 18px 0; border: 1.5px solid #4338ca; box-shadow: 0 4px 14px rgba(0,0,0,0.15);">
            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f87171" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                <span style="font-weight: 800; color: #f87171; font-size: 14px; font-family: var(--font-mono);">RESPOSTA DO SERVIDOR: ERROR 1451 (23000)</span>
            </div>
            <code style="font-family: var(--font-mono); font-size: 12.5px; color: #cbd5e1; display: block; line-height: 1.5; background: rgba(0,0,0,0.3); padding: 10px; border-radius: 6px;">
                Error Code: 1451. Cannot delete or update a parent row: a foreign key constraint fails (`autometal_db`.`pedido`, CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`))
            </code>
        </div>

        <div style="background: #fffbeb; border: 1.5px solid #fde68a; border-radius: 8px; padding: 16px 20px; margin: 16px 0;">
            <h4 style="color: #92400e; margin: 0 0 6px 0; font-size: 14.5px; font-weight: 800;">🛡️ Explicação Didática da Proteção:</h4>
            <p style="color: #78350f; margin: 0 0 10px 0; font-size: 13px; line-height: 1.6;">
                <strong>O sistema está protegendo a nota fiscal e a integridade do negócio!</strong> O Carlos (ID 1) já tem um Pedido registrado no nome dele. Se o banco permitisse apagar o Carlos, o Pedido ficaria <strong>"órfão"</strong>, apontando para um cliente fantasma que não existe mais no banco de dados.
            </p>
            <p style="color: #78350f; margin: 0; font-size: 13px; line-height: 1.6;">
                Bancos de dados relacionais (SQL) <strong>não permitem pontas soltas</strong>. A integridade referencial garante que nenhuma tabela dependente aponte para um ID inexistente.
            </p>
        </div>

        <!-- ==================== ORIENTAÇÃO DE IMAGEM 8.2 ==================== -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #fca5a5; background: #ffffff; margin-top: 18px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #dc2626; color: #ffffff; border-color: #dc2626;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    📸 Imagem Oficial do Workbench: Figura 8.2
                </span>
                <span class="screenshot-target-pill" style="background: #fee2e2; color: #991b1b; font-weight: 700;">Demonstração do Erro 1451 no Action Output</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 8.2: Erro 1451 no MySQL Workbench ao tentar excluir cliente com compras vinculadas, exibindo o semáforo vermelho e o bloqueio da Foreign Key" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #f87171; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.08); margin: 12px 0;">
                <img src="public/img/delete-erro-1451-foreign-key.png" alt="Erro 1451 no MySQL Workbench ao tentar excluir cliente com compras vinculadas" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar Imagem</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 8.2:</strong> O MySQL Workbench exibe o semáforo vermelho no <em>Action Output</em> com o <code>Error Code: 1451</code>, evidenciando que o motor InnoDB impediu a deleção para manter a integridade referencial com a tabela <code>pedido</code>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 4: A FORMA CORRETA: DE BAIXO PARA CIMA
     ========================================== -->
<section id="exclusao-baixo-para-cima" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #ecfdf5; color: #059669;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="7 11 12 6 17 11"></polyline><polyline points="7 18 12 13 17 18"></polyline></svg>
        </div>
        <div>
            <h2 class="section-title">4. A Forma Correta de Excluir: A Regra "De Baixo para Cima"</h2>
            <div class="section-subtitle">A hierarquia relacional exata: primeiro apague os filhos para depois apagar o pai</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Para conseguir excluir um registro que está amarrado por Chaves Estrangeiras, você precisa respeitar a ordem hierárquica das tabelas. A regra universal é:
        </p>

        <div style="background: #0f172a; border-radius: 10px; padding: 18px 22px; color: #ffffff; margin: 18px 0; border: 1px solid #334155;">
            <div style="font-size: 15px; font-weight: 800; color: #38bdf8; margin-bottom: 8px;">
                🌳 A REGRA DA HIERARQUIA: APAGUE PRIMEIRO OS FILHOS, PARA DEPOIS APAGAR O PAI!
            </div>
            <p style="font-size: 13px; color: #cbd5e1; margin: 0; line-height: 1.6;">
                Para conseguir excluir o cliente Carlos Almeida (ID 1), você precisa desfazer todo o rastro dele no banco de dados, começando pelas pontas da árvore (tabelas associativas) e subindo até a tabela base.
            </p>
        </div>

        <!-- FLUXO VISUAL EM 3 ETAPAS -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px; margin: 20px 0;">
            <!-- ETAPA 1 -->
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; border-top: 4px solid #ef4444;">
                <span style="font-weight: 800; color: #ef4444; font-size: 11px; background: #fee2e2; padding: 2px 8px; border-radius: 4px;">PASSO 1 • PONTA DA LINHA</span>
                <h4 style="margin: 8px 0 4px; font-size: 14px; color: #0f172a;">Itens do Pedido (Filho do Filho)</h4>
                <p style="font-size: 12px; color: #64748b; margin-bottom: 10px;">Exclui todos os produtos que pertencem ao pedido n° 1 do Carlos:</p>
                <code style="display: block; background: #f8fafc; padding: 8px; border-radius: 6px; font-size: 11.5px; color: #0f172a; font-family: var(--font-mono); border: 1px solid #e2e8f0;">
                    DELETE FROM itens_pedido<br>WHERE id_pedido = 1;
                </code>
            </div>

            <!-- ETAPA 2 -->
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; border-top: 4px solid #f59e0b;">
                <span style="font-weight: 800; color: #d97706; font-size: 11px; background: #fef3c7; padding: 2px 8px; border-radius: 4px;">PASSO 2 • CABEÇALHO DO PEDIDO</span>
                <h4 style="margin: 8px 0 4px; font-size: 14px; color: #0f172a;">Pedido (Filho Intermediário)</h4>
                <p style="font-size: 12px; color: #64748b; margin-bottom: 10px;">Com os itens apagados, o pedido vazio agora pode ser excluído:</p>
                <code style="display: block; background: #f8fafc; padding: 8px; border-radius: 6px; font-size: 11.5px; color: #0f172a; font-family: var(--font-mono); border: 1px solid #e2e8f0;">
                    DELETE FROM pedido<br>WHERE id_pedido = 1;
                </code>
            </div>

            <!-- ETAPA 3 -->
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 16px; border-top: 4px solid #10b981;">
                <span style="font-weight: 800; color: #059669; font-size: 11px; background: #dcfce7; padding: 2px 8px; border-radius: 4px;">PASSO 3 • A BASE (PAI)</span>
                <h4 style="margin: 8px 0 4px; font-size: 14px; color: #0f172a;">Cliente (A Raiz)</h4>
                <p style="font-size: 12px; color: #64748b; margin-bottom: 10px;">Sem nenhuma nota fiscal atrelada, o cliente pode ser removido:</p>
                <code style="display: block; background: #f8fafc; padding: 8px; border-radius: 6px; font-size: 11.5px; color: #0f172a; font-family: var(--font-mono); border: 1px solid #e2e8f0;">
                    DELETE FROM cliente<br>WHERE id_cliente = 1;
                </code>
            </div>
        </div>

        <!-- SCRIPT COMPLETO PASSO A PASSO -->
        <div class="code-block-wrapper">
            <div class="code-header">
                <span class="code-lang">Script Completo de Exclusão Hierárquica (SQL)</span>
                <button class="btn-copy-code" onclick="navigator.clipboard.writeText('-- 1. Apaga itens\nDELETE FROM itens_pedido WHERE id_pedido = 1;\n\n-- 2. Apaga cabeçalho\nDELETE FROM pedido WHERE id_pedido = 1;\n\n-- 3. Apaga cliente\nDELETE FROM cliente WHERE id_cliente = 1;'); alert('Script copiado!');">Copiar Script Completo</button>
            </div>
            <pre class="code-content"><code class="language-sql"><span class="token-comment">-- PASSO 1: Apaga os itens do carrinho vinculados ao pedido 1 (2 produtos removidos)</span>
<span class="token-keyword">DELETE FROM</span> itens_pedido 
<span class="token-keyword">WHERE</span> id_pedido = <span class="token-number">1</span>;

<span class="token-comment">-- PASSO 2: Agora que o pedido está sem itens, apagamos o documento de venda</span>
<span class="token-keyword">DELETE FROM</span> pedido 
<span class="token-keyword">WHERE</span> id_pedido = <span class="token-number">1</span>;

<span class="token-comment">-- PASSO 3: Sem nenhuma nota fiscal atrelada, o cliente finalmente é apagado com sucesso</span>
<span class="token-keyword">DELETE FROM</span> cliente 
<span class="token-keyword">WHERE</span> id_cliente = <span class="token-number">1</span>;</code></pre>
        </div>

        <!-- EVIDÊNCIA OFICIAL DO WORKBENCH: FIGURA 8.3 -->
        <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff; margin-top: 24px;">
            <div class="screenshot-header-row">
                <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; border-color: #0284c7;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    📸 Imagem Oficial do Workbench: Figura 8.3
                </span>
                <span class="screenshot-target-pill" style="background: #e0f2fe; color: #0369a1; font-weight: 700;">Execução Linear das 3 Etapas de Exclusão De Baixo para Cima</span>
            </div>

            <div class="zoomable-image-container" data-caption="Figura 8.3: Execução linear das 3 queries de exclusão hierárquica (itens_pedido, pedido e cliente) no MySQL Workbench com semáforos verdes no Action Output" style="border-radius: 8px; overflow: hidden; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0,0,0,0.06); margin: 12px 0;">
                <img src="public/img/delete-hierarquia-linear-sucesso.png" alt="Execução sequencial das 3 queries de exclusão hierárquica no MySQL Workbench" style="width: 100%; height: auto; display: block; object-fit: contain;">
                <div class="image-zoom-overlay">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                    <span>Ampliar Imagem</span>
                </div>
            </div>

            <div style="padding-top: 6px; font-size: 12px; color: #64748b;">
                <strong>Figura 8.3:</strong> Execução sequencial e linear no MySQL Workbench: o painel <em>Action Output</em> confirma o sucesso com semáforos verdes nas três etapas consecutivas (<code>2 row(s) affected</code> em <code>itens_pedido</code>, <code>1 row(s) affected</code> em <code>pedido</code> e <code>1 row(s) affected</code> em <code>cliente</code>). <em>(Clique na imagem para ampliá-la)</em>.
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 5: PROTOCOLO DE SEGURANÇA (SELECT PRÉVIO)
     ========================================== -->
<section id="boas-praticas-select-previo" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #fef3c7; color: #d97706;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
        </div>
        <div>
            <h2 class="section-title">5. Boas Práticas do DBA: O Protocolo de Segurança do SELECT Prévio</h2>
            <div class="section-subtitle">O teste visual que impede a exclusão acidental de linhas por erro de digitação de ID</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Para alunos iniciantes e desenvolvedores que operam em bancos de dados de produção, apagar dados exige um <strong>protocolo de segurança duplo</strong>. Antes de digitar a palavra <code>DELETE</code>, digite <code>SELECT *</code> utilizando exatamente a mesma condição de filtro <code>WHERE</code>:
        </p>

        <!-- DUAS ETAPAS DO MÉTODO PREVENTIVO -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin: 18px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px; border-left: 4px solid #0284c7;">
                <h4 style="margin: 0 0 6px 0; color: #0284c7; font-size: 14px;">1ª Etapa: O Teste com SELECT</h4>
                <p style="font-size: 12.5px; color: #475569; margin-bottom: 8px;">Rode a consulta para inspecionar no Result Grid se a linha é exatamente a desejada:</p>
                <code style="display: block; background: #f8fafc; padding: 8px; border-radius: 4px; font-size: 12px; font-family: var(--font-mono); color: #0f172a;">
                    SELECT * FROM peca WHERE id_peca = 2;
                </code>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px; border-left: 4px solid #059669;">
                <h4 style="margin: 0 0 6px 0; color: #059669; font-size: 14px;">2ª Etapa: A Troca por DELETE</h4>
                <p style="font-size: 12.5px; color: #475569; margin-bottom: 8px;">Confirmou que o produto é o correto? Troque <code>SELECT *</code> por <code>DELETE</code>:</p>
                <code style="display: block; background: #f8fafc; padding: 8px; border-radius: 4px; font-size: 12px; font-family: var(--font-mono); color: #0f172a;">
                    DELETE FROM peca WHERE id_peca = 2;
                </code>
            </div>
        </div>

        <p style="font-size: 13.5px; color: var(--text-secondary);">
            Esse hábito simples garante que um erro de digitação involuntário (por exemplo, digitar ID <code>20</code> em vez de <code>2</code>) não faça você apagar o produto errado do estoque da fábrica.
        </p>

        <!-- DUAS IMAGENS DO SELECT PRÉVIO -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-top: 18px;">
            <!-- FIGURA 8.4: SELECT -->
            <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bae6fd; background: #ffffff;">
                <div class="screenshot-header-row">
                    <span class="screenshot-badge" style="background: #0284c7; color: #ffffff; font-size: 10.5px;">📸 Figura 8.4: 1. SELECT</span>
                </div>
                <div class="zoomable-image-container" data-caption="Figura 8.4: Validação visual no Result Grid antes da exclusão" style="border-radius: 6px; overflow: hidden; border: 1px solid #cbd5e1; margin: 8px 0;">
                    <img src="public/img/delete-preventivo-passo1-select.png" alt="Passo 1: SELECT prévio de validação no MySQL Workbench" style="width: 100%; height: auto; display: block; object-fit: contain;">
                    <div class="image-zoom-overlay"><span>Ampliar</span></div>
                </div>
                <div style="font-size: 11.5px; color: #64748b;">
                    <strong>Passo 1:</strong> O <em>Result Grid</em> exibe a peça de ID 2 (Biela de Aço Forjado).
                </div>
            </div>

            <!-- FIGURA 8.5: DELETE -->
            <div class="workbench-screenshot-card" style="border-style: solid; border-color: #bbf7d0; background: #ffffff;">
                <div class="screenshot-header-row">
                    <span class="screenshot-badge" style="background: #059669; color: #ffffff; font-size: 10.5px;">📸 Figura 8.5: 2. DELETE</span>
                </div>
                <div class="zoomable-image-container" data-caption="Figura 8.5: Execução segura do DELETE após confirmação visual" style="border-radius: 6px; overflow: hidden; border: 1px solid #cbd5e1; margin: 8px 0;">
                    <img src="public/img/delete-preventivo-passo2-delete.png" alt="Passo 2: DELETE com status verde no MySQL Workbench" style="width: 100%; height: auto; display: block; object-fit: contain;">
                    <div class="image-zoom-overlay"><span>Ampliar</span></div>
                </div>
                <div style="font-size: 11.5px; color: #64748b;">
                    <strong>Passo 2:</strong> O <em>Action Output</em> confirma o sucesso com semáforo verde e <code>1 row(s) affected</code>.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 6: COMPARATIVO: DELETE vs TRUNCATE vs DROP
     ========================================== -->
<section id="comparativo-delete-truncate-drop" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #f1f5f9; color: #475569;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
        </div>
        <div>
            <h2 class="section-title">6. Análise Técnica Comparativa: DELETE vs TRUNCATE vs DROP</h2>
            <div class="section-subtitle">Diferenças cruciais entre os 3 comandos de remoção e limpeza no MySQL</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            No universo dos bancos de dados, existem 3 comandos distintos capazes de apagar dados. Conhecer a diferença técnica entre eles é uma competência fundamental exigida em qualquer entrevista técnica de TI:
        </p>

        <!-- TABELA COMPARATIVA -->
        <div style="overflow-x: auto; margin: 18px 0; border: 1.5px solid #cbd5e1; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
                <thead>
                    <tr style="background: #0f172a; color: #ffffff;">
                        <th style="padding: 12px 14px; border-right: 1px solid #334155;">Critério de Comparação</th>
                        <th style="padding: 12px 14px; border-right: 1px solid #334155; color: #38bdf8;">DELETE FROM</th>
                        <th style="padding: 12px 14px; border-right: 1px solid #334155; color: #fbbf24;">TRUNCATE TABLE</th>
                        <th style="padding: 12px 14px; color: #f87171;">DROP TABLE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #e2e8f0; background: #ffffff;">
                        <td style="padding: 10px 14px; font-weight: 700; color: #0f172a; border-right: 1px solid #f1f5f9;">Categoria SQL</td>
                        <td style="padding: 10px 14px; border-right: 1px solid #f1f5f9;"><span style="background: #e0f2fe; color: #0369a1; padding: 2px 6px; border-radius: 4px; font-weight: 700; font-size: 11px;">DML</span> (Manipulação)</td>
                        <td style="padding: 10px 14px; border-right: 1px solid #f1f5f9;"><span style="background: #fef3c7; color: #92400e; padding: 2px 6px; border-radius: 4px; font-weight: 700; font-size: 11px;">DDL</span> (Definição)</td>
                        <td style="padding: 10px 14px;"><span style="background: #fee2e2; color: #991b1b; padding: 2px 6px; border-radius: 4px; font-weight: 700; font-size: 11px;">DDL</span> (Definição)</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e2e8f0; background: #f8fafc;">
                        <td style="padding: 10px 14px; font-weight: 700; color: #0f172a; border-right: 1px solid #f1f5f9;">Aceita Cláusula WHERE?</td>
                        <td style="padding: 10px 14px; border-right: 1px solid #f1f5f9; color: #166534; font-weight: 700;">✅ SIM (Filtro Linha a Linha)</td>
                        <td style="padding: 10px 14px; border-right: 1px solid #f1f5f9; color: #991b1b; font-weight: 700;">❌ NÃO (Limpa a tabela toda)</td>
                        <td style="padding: 10px 14px; color: #991b1b; font-weight: 700;">❌ NÃO (Destrói tudo)</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e2e8f0; background: #ffffff;">
                        <td style="padding: 10px 14px; font-weight: 700; color: #0f172a; border-right: 1px solid #f1f5f9;">Estrutura da Tabela</td>
                        <td style="padding: 10px 14px; border-right: 1px solid #f1f5f9;">Permanece intacta</td>
                        <td style="padding: 10px 14px; border-right: 1px solid #f1f5f9;">Permanece intacta (vazia)</td>
                        <td style="padding: 10px 14px; color: #dc2626; font-weight: 700;">Apagada permanentemente</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e2e8f0; background: #f8fafc;">
                        <td style="padding: 10px 14px; font-weight: 700; color: #0f172a; border-right: 1px solid #f1f5f9;">AUTO_INCREMENT</td>
                        <td style="padding: 10px 14px; border-right: 1px solid #f1f5f9;">Mantém o contador atual</td>
                        <td style="padding: 10px 14px; border-right: 1px solid #f1f5f9; color: #d97706; font-weight: 700;">Reseta o contador para 1</td>
                        <td style="padding: 10px 14px;">Destruído junto com a tabela</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e2e8f0; background: #ffffff;">
                        <td style="padding: 10px 14px; font-weight: 700; color: #0f172a; border-right: 1px solid #f1f5f9;">Transação / Rollback</td>
                        <td style="padding: 10px 14px; border-right: 1px solid #f1f5f9; color: #166534;">Permite ROLLBACK</td>
                        <td style="padding: 10px 14px; border-right: 1px solid #f1f5f9; color: #991b1b;">Commit automático (sem volta)</td>
                        <td style="padding: 10px 14px; color: #991b1b;">Commit automático (sem volta)</td>
                    </tr>
                    <tr style="background: #f8fafc;">
                        <td style="padding: 10px 14px; font-weight: 700; color: #0f172a; border-right: 1px solid #f1f5f9;">Velocidade / Performance</td>
                        <td style="padding: 10px 14px; border-right: 1px solid #f1f5f9;">Mais lento (grava log linha a linha)</td>
                        <td style="padding: 10px 14px; border-right: 1px solid #f1f5f9; color: #166534; font-weight: 700;">Ultra rápido (desaloca páginas)</td>
                        <td style="padding: 10px 14px; color: #166534; font-weight: 700;">Instantâneo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- ==========================================
     SEÇÃO 7: ATIVIDADE PRÁTICA DE FIXAÇÃO
     ========================================== -->
<section id="atividade-pratica-delete" class="content-section">
    <div class="section-header">
        <div class="section-icon" style="background: #ecfdf5; color: #059669;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"></path><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
        </div>
        <div>
            <h2 class="section-title">7. Atividade Prática de Fixação & Desafios de Fábrica</h2>
            <div class="section-subtitle">Exercícios para consolidar a integridade referencial e a manipulação com DELETE</div>
        </div>
    </div>

    <div class="theory-block">
        <p>
            Resolva as demandas reais abaixo no seu SQL Editor do MySQL Workbench conectando-se ao banco de dados <code>autometal_db</code>:
        </p>

        <!-- CARDS DOS DESAFIOS -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px; margin: 18px 0;">
            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px; border-top: 4px solid #0284c7;">
                <span style="font-weight: 800; color: #0284c7; font-size: 11px; background: #e0f2fe; padding: 2px 8px; border-radius: 4px;">DESAFIO 1</span>
                <h4 style="margin: 8px 0 4px; font-size: 14px; color: #0f172a;">Exclusão Simples de Categoria</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    Crie uma categoria de teste <em>"Tintas e Solventes"</em> (ID 7) e execute a exclusão simples dela com <code>DELETE</code> e filtro <code>WHERE</code>.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px; border-top: 4px solid #ea580c;">
                <span style="font-weight: 800; color: #ea580c; font-size: 11px; background: #ffedd5; padding: 2px 8px; border-radius: 4px;">DESAFIO 2</span>
                <h4 style="margin: 8px 0 4px; font-size: 14px; color: #0f172a;">Diagnóstico do Erro 1451</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    Tente excluir a categoria 1 (Freios) e registre no seu caderno técnico qual mensagem o servidor exibiu e por que ela foi bloqueada.
                </p>
            </div>

            <div style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 16px; border-top: 4px solid #059669;">
                <span style="font-weight: 800; color: #059669; font-size: 11px; background: #dcfce7; padding: 2px 8px; border-radius: 4px;">DESAFIO 3</span>
                <h4 style="margin: 8px 0 4px; font-size: 14px; color: #0f172a;">Exclusão De Baixo para Cima</h4>
                <p style="font-size: 12.5px; color: #475569; margin: 0; line-height: 1.55;">
                    Escreva a sequência exata de 3 comandos para cancelar e excluir o Pedido 2 (da cliente Mariana Souza), respeitando a hierarquia de dependências.
                </p>
            </div>
        </div>

        <!-- FORMULÁRIO INTERATIVO DE ENTREGA -->
        <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 24px; margin-top: 24px;">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 14px;">
                <div style="background: #ea580c; color: #ffffff; width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                </div>
                <div>
                    <h3 style="margin: 0; font-size: 16px; color: #0f172a;">Formulário de Entrega da Prática • Módulo 8 (DELETE)</h3>
                    <p style="margin: 0; font-size: 12.5px; color: #64748b;">Preencha os campos abaixo com as suas respostas e scripts testados no Workbench:</p>
                </div>
            </div>

            <form class="project-submit-form" onsubmit="event.preventDefault(); alert('Parabéns! Sua atividade de exclusão DELETE do Módulo 8 foi enviada com sucesso. O ciclo CRUD foi concluído!');">
                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                        Nome Completo do Aluno:
                    </label>
                    <input type="text" required placeholder="Digite seu nome completo..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13.5px;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                        1. Por que o MySQL bloqueia a exclusão de um cliente que possui compras registradas (Erro 1451)? Explique com suas palavras:
                    </label>
                    <textarea rows="3" required placeholder="Explique a proteção da integridade referencial e notas fiscais..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; font-family: var(--font-main);"></textarea>
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                        2. Escreva o script de 3 passos para excluir o Pedido 2 de Mariana Souza seguindo a regra "De Baixo para Cima":
                    </label>
                    <textarea rows="6" required placeholder="-- 1. Apagar itens&#10;DELETE FROM itens_pedido WHERE id_pedido = 2;&#10;&#10;-- 2. Apagar cabeçalho do pedido&#10;DELETE FROM pedido WHERE id_pedido = 2;&#10;&#10;-- 3. Apagar cliente&#10;DELETE FROM cliente WHERE id_cliente = 2;" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; font-family: var(--font-mono);"></textarea>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 700; font-size: 13px; margin-bottom: 6px; color: var(--text-primary);">
                        3. Escreva o comando do protocolo preventivo com SELECT antes de apagar a categoria com id_categoria = 5:
                    </label>
                    <textarea rows="4" required placeholder="-- 1. Teste preventivo com SELECT&#10;SELECT * FROM categoria WHERE id_categoria = 5;&#10;&#10;-- 2. Exclusão confirmada com DELETE&#10;DELETE FROM categoria WHERE id_categoria = 5;" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; font-family: var(--font-mono);"></textarea>
                </div>

                <button type="submit" class="btn-submit-project" style="background: #dc2626; border: none; color: #ffffff; padding: 12px 24px; border-radius: 8px; font-weight: 700; font-size: 14px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    Enviar Atividade de DELETE do Módulo 8 & Concluir Ciclo CRUD
                </button>
            </form>
        </div>
    </div>
</section>
