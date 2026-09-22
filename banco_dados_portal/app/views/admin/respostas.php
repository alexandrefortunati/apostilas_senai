<?php
/**
 * View Admin: Correção de Projetos & Atividades dos Módulos
 * SENAI-SP • Painel do Professor
 */

$filtroModulo = isset($_GET['filtro_modulo']) ? intval($_GET['filtro_modulo']) : 0;
$filtroTurma = isset($_GET['filtro_turma']) ? trim($_GET['filtro_turma']) : '';
$filtroStatusNota = $_GET['filtro_status_nota'] ?? '';
?>

<div class="admin-card">
    <div class="admin-card-header">
        <div class="card-header-left">
            <span class="card-header-badge badge-indigo">📝 CORREÇÃO & AVALIAÇÃO</span>
            <h2 class="card-header-title">Respostas Submetidas pelos Alunos</h2>
            <p class="card-header-subtitle">Analise os projetos e atividades dos 9 módulos, lance notas de 0 a 10 e forneça feedback individual para cada estudante.</p>
        </div>
        <div class="card-header-badge-count">
            <span class="badge-total-alunos"><?= count($respostas) ?> submissões filtradas</span>
        </div>
    </div>

    <!-- BARRA DE FILTROS AVANÇADOS -->
    <div class="admin-filter-container">
        <form action="index.php" method="GET" class="admin-filter-form">
            <input type="hidden" name="page" value="admin">
            <input type="hidden" name="section" value="respostas">

            <div class="filter-group">
                <label for="moduloSelect" class="filter-label">Módulo da Disciplina</label>
                <select id="moduloSelect" name="filtro_modulo" onchange="this.form.submit()">
                    <option value="0">Todos os Módulos (1 a 9)</option>
                    <?php for ($i = 1; $i <= 9; $i++): ?>
                        <option value="<?= $i ?>" <?= ($filtroModulo === $i) ? 'selected' : '' ?>>
                            Módulo <?= $i ?>: <?= isset($modules[$i]) ? preg_replace('/^Módulo\s*\d+\s*:\s*/i', '', $modules[$i]['title']) : '' ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>

            <div class="filter-group">
                <label for="turmaRespSelect" class="filter-label">Turma</label>
                <input type="text" id="turmaRespSelect" name="filtro_turma" value="<?= htmlspecialchars($filtroTurma) ?>" placeholder="Filtrar por turma..." style="width: 160px;">
            </div>

            <div class="filter-group">
                <label for="statusNotaSelect" class="filter-label">Status da Avaliação</label>
                <select id="statusNotaSelect" name="filtro_status_nota" onchange="this.form.submit()">
                    <option value="">Todas as Submissões</option>
                    <option value="pendente" <?= ($filtroStatusNota === 'pendente') ? 'selected' : '' ?>>⏳ Pendentes de Nota</option>
                    <option value="avaliado" <?= ($filtroStatusNota === 'avaliado') ? 'selected' : '' ?>>✅ Já Avaliadas com Nota</option>
                </select>
            </div>

            <div class="filter-group filter-buttons">
                <button type="submit" class="btn-filter-apply">Filtrar</button>
                <?php if ($filtroModulo > 0 || !empty($filtroTurma) || !empty($filtroStatusNota)): ?>
                    <a href="index.php?page=admin&section=respostas" class="btn-filter-clear">Limpar</a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- LISTA DE CARDS DE RESPOSTAS -->
    <?php if (empty($respostas)): ?>
        <div class="admin-empty-state empty-state-large">
            <div class="empty-icon text-indigo">📂</div>
            <div class="empty-title">Nenhuma submissão encontrada</div>
            <div class="empty-desc">Não foram encontradas respostas que correspondam aos filtros selecionados acima.</div>
        </div>
    <?php else: ?>
        <div class="submissions-list-container">
            <?php foreach ($respostas as $resp): ?>
                <div id="resp-card-<?= $resp['id_resposta'] ?>" class="submission-card <?= ($resp['nota'] === null) ? 'is-ungraded' : 'is-graded' ?>">
                    
                    <!-- TOPO DO CARD DE SUBMISSÃO -->
                    <div class="sub-card-header">
                        <div class="sub-header-left">
                            <span class="badge-module-pill">
                                MÓDULO <?= $resp['modulo_num'] ?>
                            </span>
                            <div class="sub-user-info">
                                <span class="sub-user-name"><?= htmlspecialchars($resp['nome']) ?></span>
                                <span class="sub-user-meta">
                                    <?= htmlspecialchars($resp['email']) ?> • Turma: <strong><?= htmlspecialchars($resp['turma'] ?: 'Geral') ?></strong>
                                </span>
                            </div>
                        </div>

                        <div class="sub-header-right">
                            <div class="sub-time">
                                🕒 <?= date('d/m/Y \à\s H:i', strtotime($resp['data_envio'])) ?>
                            </div>
                            <?php if ($resp['nota'] !== null): ?>
                                <div class="grade-status-pill done">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Nota: <?= number_format($resp['nota'], 1, ',', '.') ?>
                                </div>
                            <?php else: ?>
                                <div class="grade-status-pill pending">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    Aguardando Avaliação
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- CORPO DO CARD COM AS RESPOSTAS DO ALUNO -->
                    <div class="sub-card-body">
                        <div class="sub-answers-label">Respostas preenchidas pelo aluno:</div>
                        <div class="sub-answers-box">
                            <?php if (!empty($resp['respostas']) && is_array($resp['respostas'])): ?>
                                <?php foreach ($resp['respostas'] as $campo => $valor): ?>
                                    <div class="answer-field-item">
                                        <div class="answer-field-title">
                                            <?= htmlspecialchars(ucwords(str_replace(['_', '-'], ' ', $campo))) ?>:
                                        </div>
                                        <div class="answer-field-content">
                                            <?= nl2br(htmlspecialchars($valor)) ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="answer-raw"><?= htmlspecialchars($resp['respostas_json']) ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- FORMULÁRIO DOCENTE: NOTA E FEEDBACK -->
                        <form action="index.php?page=admin&action=avaliar" method="POST" class="sub-grade-form">
                            <input type="hidden" name="id_resposta" value="<?= $resp['id_resposta'] ?>">
                            <input type="hidden" name="return_section" value="respostas">
                            <input type="hidden" name="filtro_modulo" value="<?= $filtroModulo ?>">

                            <div class="form-row-grade">
                                <div class="grade-input-group">
                                    <label class="form-label-mini">Nota (0 a 10):</label>
                                    <input type="number" step="0.1" min="0" max="10" name="nota" 
                                           value="<?= ($resp['nota'] !== null) ? $resp['nota'] : '' ?>" 
                                           required placeholder="10.0" class="input-nota">
                                </div>

                                <div class="feedback-input-group">
                                    <label class="form-label-mini">Feedback do Professor:</label>
                                    <input type="text" name="feedback" 
                                           value="<?= htmlspecialchars($resp['feedback_professor'] ?? '') ?>" 
                                           placeholder="Insira comentários, orientações ou pontos de melhoria para o aluno..." 
                                           class="input-feedback">
                                </div>

                                <button type="submit" class="btn-save-grade">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Gravar Nota & Feedback
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
