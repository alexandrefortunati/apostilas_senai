<?php
/**
 * View Admin: Gestão de Aprovações Pendentes
 * SENAI-SP • Painel do Professor
 */
?>

<div class="admin-card">
    <div class="admin-card-header">
        <div class="card-header-left">
            <span class="card-header-badge badge-amber">⏳ CADASTROS PENDENTES</span>
            <h2 class="card-header-title">Alunos Aguardando Aprovação de Acesso</h2>
            <p class="card-header-subtitle">Libere ou recuse o acesso dos alunos para que eles possam salvar respostas e navegar nas atividades.</p>
        </div>
        <div class="card-header-badge-count">
            <span class="badge-total-pendentes"><?= count($alunosPendentes) ?> solicitações</span>
        </div>
    </div>

    <?php if (empty($alunosPendentes)): ?>
        <div class="admin-empty-state empty-state-large">
            <div class="empty-icon text-emerald">🎉</div>
            <div class="empty-title">Nenhum cadastro pendente no momento!</div>
            <div class="empty-desc">Todos os alunos que se cadastraram no portal já foram aprovados e estão com acesso liberado.</div>
            <div style="margin-top: 15px;">
                <a href="index.php?page=admin&section=alunos" class="admin-btn-action btn-indigo-soft">
                    Ver Lista Geral de Alunos &rarr;
                </a>
            </div>
        </div>
    <?php else: ?>
        <div class="admin-table-responsive">
            <table class="admin-table admin-table-full">
                <thead>
                    <tr>
                        <th>Nome Completo</th>
                        <th>E-mail de Acesso</th>
                        <th>CPF / Matrícula</th>
                        <th>Turma Informada</th>
                        <th>Data da Solicitação</th>
                        <th style="text-align: center; width: 190px;">Decisão Docente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alunosPendentes as $aluno): ?>
                        <tr>
                            <td>
                                <div class="table-user-name font-bold"><?= htmlspecialchars($aluno['nome']) ?></div>
                                <span class="badge-status-pill status-pending">Aguardando</span>
                            </td>
                            <td>
                                <a href="mailto:<?= htmlspecialchars($aluno['email']) ?>" class="table-link-email">
                                    <?= htmlspecialchars($aluno['email']) ?>
                                </a>
                            </td>
                            <td class="table-cell-mono">
                                <?= htmlspecialchars($aluno['cpf'] ?: 'Não informado') ?>
                            </td>
                            <td>
                                <span class="tag-turma tag-turma-highlight">
                                    <?= htmlspecialchars($aluno['turma'] ?: 'Geral / Não definida') ?>
                                </span>
                            </td>
                            <td class="table-cell-date">
                                📅 <?= date('d/m/Y \à\s H:i', strtotime($aluno['criado_em'])) ?>
                            </td>
                            <td style="text-align: center;">
                                <div class="btn-group-actions">
                                    <a href="index.php?page=admin&action=aprovar&id=<?= $aluno['id_usuario'] ?>&return_section=pendentes" 
                                       class="btn-action-approve" 
                                       onclick="return confirm('Deseja aprovar e liberar o acesso para <?= htmlspecialchars(addslashes($aluno['nome'])) ?>?');">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        Aprovar
                                    </a>
                                    <a href="index.php?page=admin&action=bloquear&id=<?= $aluno['id_usuario'] ?>&return_section=pendentes" 
                                       class="btn-action-reject" 
                                       onclick="return confirm('Deseja recusar e bloquear o cadastro de <?= htmlspecialchars(addslashes($aluno['nome'])) ?>?');">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        Recusar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
