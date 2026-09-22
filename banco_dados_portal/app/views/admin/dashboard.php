<?php
/**
 * View Admin: Visão Geral / Dashboard
 * SENAI-SP • Painel do Professor
 */
?>

<!-- CARDS DE MÉTRICAS RÁPIDAS -->
<div class="admin-metrics-grid">
    <div class="admin-metric-card card-amber">
        <div class="metric-icon-wrap icon-amber">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
        </div>
        <div class="metric-info">
            <span class="metric-label">Aprovações Pendentes</span>
            <span class="metric-number text-amber"><?= $qtdPendentes ?></span>
            <span class="metric-desc">Alunos aguardando liberação</span>
        </div>
        <a href="index.php?page=admin&section=pendentes" class="metric-link-action">
            Gerenciar &rarr;
        </a>
    </div>

    <div class="admin-metric-card card-emerald">
        <div class="metric-icon-wrap icon-emerald">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
        </div>
        <div class="metric-info">
            <span class="metric-label">Total de Alunos</span>
            <span class="metric-number text-emerald"><?= $totalAlunos ?></span>
            <span class="metric-desc">Matriculados na base do portal</span>
        </div>
        <a href="index.php?page=admin&section=alunos" class="metric-link-action">
            Ver Todos &rarr;
        </a>
    </div>

    <div class="admin-metric-card card-indigo">
        <div class="metric-icon-wrap icon-indigo">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
        </div>
        <div class="metric-info">
            <span class="metric-label">Projetos Submetidos</span>
            <span class="metric-number text-indigo"><?= $totalRespostas ?></span>
            <span class="metric-desc">Submissões dos módulos 1 ao 9</span>
        </div>
        <a href="index.php?page=admin&section=respostas" class="metric-link-action">
            Corrigir &rarr;
        </a>
    </div>

    <div class="admin-metric-card card-rose">
        <div class="metric-icon-wrap icon-rose">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
        </div>
        <div class="metric-info">
            <span class="metric-label">Pendentes de Nota</span>
            <span class="metric-number text-rose"><?= $qtdRespostasPendentes ?></span>
            <span class="metric-desc">Aguardando avaliação docente</span>
        </div>
        <a href="index.php?page=admin&section=respostas&filtro_status_nota=pendente" class="metric-link-action">
            Avaliar Agora &rarr;
        </a>
    </div>
</div>

<!-- ATALHOS RÁPIDOS PARA CADA FUNCIONALIDADE -->
<div class="admin-quick-actions-bar">
    <div class="quick-action-title">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
        <span>Acesso Rápido às Funcionalidades</span>
    </div>
    <div class="quick-action-buttons">
        <a href="index.php?page=admin&section=pendentes" class="admin-btn-action btn-amber-soft">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
            Aprovações Pendentes (<?= $qtdPendentes ?>)
        </a>
        <a href="index.php?page=admin&section=alunos" class="admin-btn-action btn-indigo-soft">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
            Gerenciar Alunos
        </a>
        <a href="index.php?page=admin&section=respostas" class="admin-btn-action btn-purple-soft">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
            Corrigir Projetos
        </a>
        <a href="index.php?page=admin&section=notas" class="admin-btn-action btn-emerald-soft">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
            Boletim de Notas
        </a>
        <a href="index.php" class="admin-btn-action btn-slate-soft">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
            Consultar Apostila
        </a>
    </div>
</div>

<!-- DUAS COLUNAS: SOLICITAÇÕES PENDENTES E ÚLTIMOS PROJETOS ENVIADOS -->
<div class="admin-dashboard-split">
    
    <!-- COLUNA 1: PENDÊNCIAS DE CADASTRO -->
    <div class="admin-card">
        <div class="admin-card-header">
            <div class="card-header-left">
                <span class="card-header-badge badge-amber">⏳ APROVAÇÃO</span>
                <h2 class="card-header-title">Solicitações de Cadastro</h2>
            </div>
            <a href="index.php?page=admin&section=pendentes" class="card-header-link">Ver todas &rarr;</a>
        </div>

        <?php if (empty($alunosPendentes)): ?>
            <div class="admin-empty-state">
                <div class="empty-icon text-emerald">✅</div>
                <div class="empty-title">Nenhum cadastro pendente</div>
                <div class="empty-desc">Todos os alunos registrados estão aprovados para uso do portal.</div>
            </div>
        <?php else: ?>
            <div class="admin-table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Aluno</th>
                            <th>Turma</th>
                            <th>Data</th>
                            <th style="text-align: right;">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_slice($alunosPendentes, 0, 5) as $aluno): ?>
                            <tr>
                                <td>
                                    <div class="table-user-name"><?= htmlspecialchars($aluno['nome']) ?></div>
                                    <div class="table-user-email"><?= htmlspecialchars($aluno['email']) ?></div>
                                </td>
                                <td><span class="tag-turma"><?= htmlspecialchars($aluno['turma'] ?: 'Geral') ?></span></td>
                                <td class="table-cell-date"><?= date('d/m H:i', strtotime($aluno['criado_em'])) ?></td>
                                <td style="text-align: right;">
                                    <a href="index.php?page=admin&action=aprovar&id=<?= $aluno['id_usuario'] ?>&return_section=dashboard" class="btn-table-approve" title="Aprovar aluno">
                                        ✓ Aprovar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <!-- COLUNA 2: ÚLTIMAS SUBMISSÕES DE PROJETOS -->
    <div class="admin-card">
        <div class="admin-card-header">
            <div class="card-header-left">
                <span class="card-header-badge badge-indigo">📝 PROJETOS</span>
                <h2 class="card-header-title">Últimas Submissões Enviadas</h2>
            </div>
            <a href="index.php?page=admin&section=respostas" class="card-header-link">Ver todas &rarr;</a>
        </div>

        <?php if (empty($ultimosEnvios)): ?>
            <div class="admin-empty-state">
                <div class="empty-icon text-indigo">📂</div>
                <div class="empty-title">Nenhum projeto enviado ainda</div>
                <div class="empty-desc">As respostas submetidas pelos alunos nos módulos aparecerão aqui.</div>
            </div>
        <?php else: ?>
            <div class="admin-table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Aluno</th>
                            <th>Módulo</th>
                            <th>Status / Nota</th>
                            <th style="text-align: right;">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ultimosEnvios as $envio): ?>
                            <tr>
                                <td>
                                    <div class="table-user-name"><?= htmlspecialchars($envio['nome']) ?></div>
                                    <div class="table-user-email"><?= htmlspecialchars($envio['turma'] ?: 'SENAI-SP') ?></div>
                                </td>
                                <td>
                                    <span class="module-pill-mini">Módulo <?= $envio['modulo_num'] ?></span>
                                </td>
                                <td>
                                    <?php if ($envio['nota'] !== null): ?>
                                        <span class="grade-pill-done">Nota: <?= number_format($envio['nota'], 1, ',', '.') ?></span>
                                    <?php else: ?>
                                        <span class="grade-pill-pending">Pendente</span>
                                    <?php endif; ?>
                                </td>
                                <td style="text-align: right;">
                                    <a href="index.php?page=admin&section=respostas&filtro_modulo=<?= $envio['modulo_num'] ?>#resp-card-<?= $envio['id_resposta'] ?>" class="btn-table-evaluate" title="Avaliar resposta">
                                        Corrigir
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

</div>
