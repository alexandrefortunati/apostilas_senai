<?php
/**
 * View Admin: Gestão Geral de Alunos
 * SENAI-SP • Painel do Professor
 */

$filtroStatus = $_GET['filtro_status'] ?? '';
$filtroTurma = $_GET['filtro_turma'] ?? '';
$busca = $_GET['busca'] ?? '';
?>

<div class="admin-card">
    <div class="admin-card-header">
        <div class="card-header-left">
            <span class="card-header-badge badge-indigo">👥 BASE DE ALUNOS</span>
            <h2 class="card-header-title">Gestão e Consulta de Alunos</h2>
            <p class="card-header-subtitle">Visualize todos os estudantes cadastrados, altere permissões de acesso e filtre por turma ou status.</p>
        </div>
        <div class="card-header-badge-count">
            <span class="badge-total-alunos"><?= count($listaAlunos) ?> alunos encontrados</span>
        </div>
    </div>

    <!-- BARRA DE FILTROS E PESQUISA -->
    <div class="admin-filter-container">
        <form action="index.php" method="GET" class="admin-filter-form">
            <input type="hidden" name="page" value="admin">
            <input type="hidden" name="section" value="alunos">

            <div class="filter-group filter-search">
                <label for="buscaInput" class="filter-label">Pesquisar Aluno</label>
                <div class="input-with-icon">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" id="buscaInput" name="busca" value="<?= htmlspecialchars($busca) ?>" placeholder="Buscar por nome, e-mail ou CPF...">
                </div>
            </div>

            <div class="filter-group">
                <label for="turmaSelect" class="filter-label">Turma</label>
                <select id="turmaSelect" name="filtro_turma" onchange="this.form.submit()">
                    <option value="">Todas as Turmas</option>
                    <?php foreach ($turmasDisponiveis as $t): ?>
                        <option value="<?= htmlspecialchars($t) ?>" <?= ($filtroTurma === $t) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($t) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="filter-group">
                <label for="statusSelect" class="filter-label">Status de Acesso</label>
                <select id="statusSelect" name="filtro_status" onchange="this.form.submit()">
                    <option value="">Todos os Status</option>
                    <option value="ativo" <?= ($filtroStatus === 'ativo') ? 'selected' : '' ?>>Ativos (Liberados)</option>
                    <option value="pendente" <?= ($filtroStatus === 'pendente') ? 'selected' : '' ?>>Pendentes</option>
                    <option value="bloqueado" <?= ($filtroStatus === 'bloqueado') ? 'selected' : '' ?>>Bloqueados</option>
                </select>
            </div>

            <div class="filter-group filter-buttons">
                <button type="submit" class="btn-filter-apply">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    Filtrar
                </button>
                <?php if (!empty($busca) || !empty($filtroTurma) || !empty($filtroStatus)): ?>
                    <a href="index.php?page=admin&section=alunos" class="btn-filter-clear" title="Limpar filtros">
                        Limpar
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- LISTAGEM DE ALUNOS -->
    <?php if (empty($listaAlunos)): ?>
        <div class="admin-empty-state">
            <div class="empty-icon text-indigo">🔍</div>
            <div class="empty-title">Nenhum aluno encontrado</div>
            <div class="empty-desc">Nenhum registro corresponde aos filtros ou termo de busca aplicado.</div>
            <div style="margin-top: 10px;">
                <a href="index.php?page=admin&section=alunos" class="btn-filter-clear">Limpar filtros</a>
            </div>
        </div>
    <?php else: ?>
        <div class="admin-table-responsive">
            <table class="admin-table admin-table-full">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Nome Completo</th>
                        <th>E-mail</th>
                        <th>CPF / Matrícula</th>
                        <th>Turma</th>
                        <th>Status</th>
                        <th>Cadastrado em</th>
                        <th style="text-align: center; width: 140px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaAlunos as $aluno): ?>
                        <tr>
                            <td class="table-cell-id">#<?= $aluno['id_usuario'] ?></td>
                            <td>
                                <div class="table-user-name font-bold"><?= htmlspecialchars($aluno['nome']) ?></div>
                            </td>
                            <td>
                                <a href="mailto:<?= htmlspecialchars($aluno['email']) ?>" class="table-link-email">
                                    <?= htmlspecialchars($aluno['email']) ?>
                                </a>
                            </td>
                            <td class="table-cell-mono">
                                <?= htmlspecialchars($aluno['cpf'] ?: '-') ?>
                            </td>
                            <td>
                                <span class="tag-turma">
                                    <?= htmlspecialchars($aluno['turma'] ?: 'Geral') ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($aluno['status'] === 'ativo'): ?>
                                    <span class="badge-status-pill status-active">Ativo</span>
                                <?php elseif ($aluno['status'] === 'pendente'): ?>
                                    <span class="badge-status-pill status-pending">Pendente</span>
                                <?php else: ?>
                                    <span class="badge-status-pill status-blocked">Bloqueado</span>
                                <?php endif; ?>
                            </td>
                            <td class="table-cell-date">
                                <?= date('d/m/Y', strtotime($aluno['criado_em'])) ?>
                            </td>
                            <td style="text-align: center;">
                                <?php if ($aluno['status'] === 'ativo'): ?>
                                    <a href="index.php?page=admin&action=bloquear&id=<?= $aluno['id_usuario'] ?>&return_section=alunos" 
                                       class="btn-table-block" 
                                       onclick="return confirm('Deseja realmente suspender/bloquear o acesso de <?= htmlspecialchars(addslashes($aluno['nome'])) ?>?');"
                                       title="Bloquear acesso">
                                        🚫 Bloquear
                                    </a>
                                <?php elseif ($aluno['status'] === 'bloqueado'): ?>
                                    <a href="index.php?page=admin&action=reativar&id=<?= $aluno['id_usuario'] ?>&return_section=alunos" 
                                       class="btn-table-reactivate" 
                                       onclick="return confirm('Deseja reativar o acesso de <?= htmlspecialchars(addslashes($aluno['nome'])) ?>?');"
                                       title="Reativar acesso">
                                        ⚡ Reativar
                                    </a>
                                <?php else: ?>
                                    <a href="index.php?page=admin&action=aprovar&id=<?= $aluno['id_usuario'] ?>&return_section=alunos" 
                                       class="btn-table-approve" 
                                       onclick="return confirm('Aprovar o cadastro de <?= htmlspecialchars(addslashes($aluno['nome'])) ?>?');"
                                       title="Aprovar cadastro">
                                        ✓ Aprovar
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
