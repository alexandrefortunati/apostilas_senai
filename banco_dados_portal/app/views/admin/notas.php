<?php
/**
 * View Admin: Boletim & Matriz Consolidada de Notas
 * SENAI-SP • Painel do Professor
 */

$filtroTurma = isset($_GET['filtro_turma']) ? trim($_GET['filtro_turma']) : '';
?>

<div class="admin-card">
    <div class="admin-card-header">
        <div class="card-header-left">
            <span class="card-header-badge badge-emerald">📈 RENDIMENTO & NOTAS</span>
            <h2 class="card-header-title">Boletim Geral de Notas dos 9 Módulos</h2>
            <p class="card-header-subtitle">Acompanhe o progresso individual e consolidado de cada aluno em todas as atividades práticas do curso.</p>
        </div>
        <div class="card-header-badge-count" style="display: flex; gap: 8px;">
            <button onclick="window.print()" class="btn-print-report" title="Imprimir ou Salvar em PDF">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                Imprimir Relatório
            </button>
        </div>
    </div>

    <!-- FILTRO POR TURMA -->
    <div class="admin-filter-container">
        <form action="index.php" method="GET" class="admin-filter-form">
            <input type="hidden" name="page" value="admin">
            <input type="hidden" name="section" value="notas">

            <div class="filter-group">
                <label for="turmaNotasSelect" class="filter-label">Filtrar por Turma</label>
                <select id="turmaNotasSelect" name="filtro_turma" onchange="this.form.submit()">
                    <option value="">Todas as Turmas Cadastradas</option>
                    <?php foreach ($turmasDisponiveis as $t): ?>
                        <option value="<?= htmlspecialchars($t) ?>" <?= ($filtroTurma === $t) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($t) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="filter-group filter-buttons">
                <button type="submit" class="btn-filter-apply">Atualizar</button>
                <?php if (!empty($filtroTurma)): ?>
                    <a href="index.php?page=admin&section=notas" class="btn-filter-clear">Ver Todas</a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- TABELA MATRIZ DE NOTAS -->
    <?php if (empty($matrizNotas)): ?>
        <div class="admin-empty-state empty-state-large">
            <div class="empty-icon text-emerald">📊</div>
            <div class="empty-title">Nenhum aluno encontrado para esta seleção</div>
            <div class="empty-desc">Cadastre alunos ou selecione outra turma para visualizar as notas.</div>
        </div>
    <?php else: ?>
        <div class="admin-table-responsive" style="overflow-x: auto;">
            <table class="admin-table admin-table-matrix">
                <thead>
                    <tr>
                        <th style="min-width: 180px; text-align: left;">Aluno</th>
                        <th style="min-width: 110px; text-align: left;">Turma</th>
                        <?php for ($m = 1; $m <= 9; $m++): ?>
                            <th style="text-align: center; min-width: 60px;" title="Módulo <?= $m ?>">M0<?= $m ?></th>
                        <?php endfor; ?>
                        <th style="text-align: center; min-width: 80px;">Entregas</th>
                        <th style="text-align: center; min-width: 80px;">Média</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($matrizNotas as $aluno): ?>
                        <tr>
                            <td style="text-align: left;">
                                <div class="matrix-student-name"><?= htmlspecialchars($aluno['nome']) ?></div>
                                <div class="matrix-student-email"><?= htmlspecialchars($aluno['email']) ?></div>
                            </td>
                            <td style="text-align: left;">
                                <span class="tag-turma"><?= htmlspecialchars($aluno['turma'] ?: 'Geral') ?></span>
                            </td>

                            <!-- COLUNAS DOS MÓDULOS 1 A 9 -->
                            <?php for ($m = 1; $m <= 9; $m++): 
                                $modInfo = $aluno['modulos'][$m];
                            ?>
                                <td style="text-align: center;" class="cell-matrix-grade">
                                    <?php if ($modInfo['enviado']): ?>
                                        <?php if ($modInfo['nota'] !== null): ?>
                                            <a href="index.php?page=admin&section=respostas&filtro_modulo=<?= $m ?>#resp-card-<?= $modInfo['id_resposta'] ?>" 
                                               class="matrix-grade-tag <?= ($modInfo['nota'] >= 6.0) ? 'high' : 'low' ?>" 
                                               title="Módulo <?= $m ?> • Nota <?= number_format($modInfo['nota'], 1, ',', '.') ?> (Clique para ver)">
                                                <?= number_format($modInfo['nota'], 1, ',', '.') ?>
                                            </a>
                                        <?php else: ?>
                                            <a href="index.php?page=admin&section=respostas&filtro_modulo=<?= $m ?>#resp-card-<?= $modInfo['id_resposta'] ?>" 
                                               class="matrix-grade-tag pending" 
                                               title="Módulo <?= $m ?> • Pendente de Nota (Clique para avaliar)">
                                                ⏳
                                            </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span class="matrix-grade-dash" title="Módulo <?= $m ?> não entregue">-</span>
                                    <?php endif; ?>
                                </td>
                            <?php endfor; ?>

                            <!-- ENTREGAS -->
                            <td style="text-align: center;">
                                <span class="matrix-pill-count">
                                    <?= $aluno['total_entregue'] ?> / 9
                                </span>
                            </td>

                            <!-- MÉDIA -->
                            <td style="text-align: center;">
                                <?php if ($aluno['media'] !== null): ?>
                                    <span class="matrix-grade-average <?= ($aluno['media'] >= 6.0) ? 'avg-good' : 'avg-warn' ?>">
                                        <?= number_format($aluno['media'], 1, ',', '.') ?>
                                    </span>
                                <?php else: ?>
                                    <span class="matrix-grade-dash">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
