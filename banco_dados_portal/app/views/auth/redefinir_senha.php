<?php
/**
 * View: Redefinição de Senha com Token
 * SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas
 */
?>

<div class="auth-page-container" style="max-width: 480px; margin: 30px auto; padding: 10px;">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05); overflow: hidden;">
        
        <div style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); padding: 22px; text-align: center; color: #ffffff; border-bottom: 3.5px solid #0284c7;">
            <h1 style="margin: 0 0 6px; font-size: 18px; font-weight: 800; color: #ffffff;">Criar Nova Senha de Acesso</h1>
            <p style="margin: 0; font-size: 12px; color: #cbd5e1;">Portal de Banco de Dados • SENAI-SP</p>
        </div>

        <div style="padding: 24px;">
            <?php if (!$tokenValido): ?>
                <div style="background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 14px; border-radius: 8px; font-size: 12.5px; line-height: 1.5; margin-bottom: 16px;">
                    ❌ <strong>Link Inválido ou Expirado!</strong><br>
                    O token de segurança informado não existe, já foi utilizado ou ultrapassou a validade de 1 hora.
                </div>
                <div style="text-align: center;">
                    <a href="index.php?page=login" style="display: inline-block; background: #0f172a; color: #ffffff; padding: 10px 18px; border-radius: 6px; text-decoration: none; font-size: 12.5px; font-weight: 700;">
                        Voltar para a Tela de Login
                    </a>
                </div>
            <?php else: ?>
                <?php if (!empty($mensagemErro)): ?>
                    <div style="background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 10px 14px; border-radius: 6px; font-size: 12px; margin-bottom: 14px;">
                        <?= $mensagemErro ?>
                    </div>
                <?php endif; ?>

                <div style="background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; padding: 10px 14px; border-radius: 6px; font-size: 12px; margin-bottom: 14px;">
                    Identificado: <strong><?= htmlspecialchars($usuarioToken['nome']) ?></strong> (<?= htmlspecialchars($usuarioToken['email']) ?>)
                </div>

                <form action="index.php?page=processar-redefinir-senha" method="POST">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token'] ?? '') ?>">

                    <div style="margin-bottom: 14px;">
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">Nova Senha (mínimo 6 dígitos):</label>
                        <input type="password" name="nova_senha" required minlength="6" placeholder="Digite sua nova senha..." style="width: 100%; padding: 9px 12px; border: 1.5px solid #cbd5e1; border-radius: 6px; font-size: 13px; outline: none; box-sizing: border-box;">
                    </div>

                    <div style="margin-bottom: 16px;">
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">Confirmar Nova Senha:</label>
                        <input type="password" name="confirma_nova_senha" required minlength="6" placeholder="Confirme a nova senha..." style="width: 100%; padding: 9px 12px; border: 1.5px solid #cbd5e1; border-radius: 6px; font-size: 13px; outline: none; box-sizing: border-box;">
                    </div>

                    <button type="submit" style="width: 100%; background: #0284c7; color: #ffffff; border: none; padding: 11px; border-radius: 6px; font-size: 13px; font-weight: 700; cursor: pointer;">
                        Gravar Nova Senha e Acessar
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
