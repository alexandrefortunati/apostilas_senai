<?php
/**
 * View: Tela de Autenticação, Cadastro de Aluno e Recuperação de Senha
 * SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas
 */

$aba = $abaAtiva ?? 'login';
?>

<div class="auth-page-container" style="max-width: 580px; margin: 20px auto; padding: 10px;">
    <!-- CARD PRINCIPAL DE AUTENTICAÇÃO -->
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01); overflow: hidden;">
        
        <!-- CABEÇALHO DO CARD -->
        <div style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); padding: 24px 28px; text-align: center; color: #ffffff; border-bottom: 3.5px solid #db2777;">
            <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.1); padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 800; letter-spacing: 0.5px; margin-bottom: 10px; color: #fbcfe8;">
                <span>SENAI - SP • PORTAL DE BANCO DE DADOS</span>
            </div>
            <h1 style="margin: 0 0 6px; font-size: 20px; font-weight: 800; color: #ffffff; font-family: var(--font-heading);">Área do Aluno & Professor</h1>
            <p style="margin: 0; font-size: 12.5px; color: #cbd5e1;">Acesse para registrar suas respostas das atividades e acompanhar suas avaliações</p>
        </div>

        <!-- MENSAGENS DE FEEDBACK (ERRO OU SUCESSO) -->
        <?php if (!empty($mensagemFeedback)): ?>
            <div style="margin: 16px 24px 0; padding: 12px 16px; border-radius: 8px; font-size: 12px; line-height: 1.5; <?= ($tipoFeedback === 'success') ? 'background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46;' : (($tipoFeedback === 'info') ? 'background: #eff6ff; border: 1px solid #bfdbfe; color: #1e40af;' : 'background: #fef2f2; border: 1px solid #fecaca; color: #991b1b;') ?>">
                <?= $mensagemFeedback ?>
            </div>
        <?php endif; ?>

        <!-- ABAS DE NAVEGAÇÃO -->
        <div style="display: flex; border-bottom: 1px solid #e2e8f0; background: #f8fafc;">
            <button type="button" id="tabBtnLogin" onclick="alternarAbaAuth('login')" style="flex: 1; padding: 12px 14px; font-size: 12.5px; font-weight: 700; border: none; background: transparent; cursor: pointer; border-bottom: 2.5px solid transparent; color: #64748b; transition: all 0.2s;">
                🔑 Entrar na Conta
            </button>
            <button type="button" id="tabBtnCadastro" onclick="alternarAbaAuth('cadastro')" style="flex: 1; padding: 12px 14px; font-size: 12.5px; font-weight: 700; border: none; background: transparent; cursor: pointer; border-bottom: 2.5px solid transparent; color: #64748b; transition: all 0.2s;">
                📝 Novo Cadastro de Aluno
            </button>
            <button type="button" id="tabBtnEsqueci" onclick="alternarAbaAuth('esqueci')" style="flex: 1; padding: 12px 14px; font-size: 12.5px; font-weight: 700; border: none; background: transparent; cursor: pointer; border-bottom: 2.5px solid transparent; color: #64748b; transition: all 0.2s;">
                ❓ Esqueci a Senha
            </button>
        </div>

        <!-- CONTEÚDO DAS ABAS -->
        <div style="padding: 24px 28px;">
            
            <!-- 1. FORMULÁRIO DE LOGIN -->
            <div id="painelAuthLogin" style="display: none;">
                <form action="index.php?page=login" method="POST">
                    <div style="margin-bottom: 14px;">
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">E-mail Cadastrado:</label>
                        <input type="email" name="email" required placeholder="ex: aluno@email.com ou admin@senai.br" style="width: 100%; padding: 9px 12px; border: 1.5px solid #cbd5e1; border-radius: 6px; font-size: 13px; outline: none; box-sizing: border-box;">
                    </div>

                    <div style="margin-bottom: 14px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
                            <label style="font-size: 12px; font-weight: 700; color: #334155;">Senha de Acesso:</label>
                            <a href="javascript:void(0)" onclick="alternarAbaAuth('esqueci')" style="font-size: 11px; color: #db2777; text-decoration: none; font-weight: 600;">Esqueceu a senha?</a>
                        </div>
                        <input type="password" name="senha" required placeholder="Digite sua senha..." style="width: 100%; padding: 9px 12px; border: 1.5px solid #cbd5e1; border-radius: 6px; font-size: 13px; outline: none; box-sizing: border-box;">
                    </div>

                    <button type="submit" style="width: 100%; background: #0f172a; color: #ffffff; border: none; padding: 11px; border-radius: 6px; font-size: 13px; font-weight: 700; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; transition: background 0.2s;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                        Acessar Minha Conta
                    </button>

                    <div style="margin-top: 18px; padding-top: 14px; border-top: 1px solid #f1f5f9; text-align: center; font-size: 12px; color: #64748b;">
                        Ainda não possui cadastro? <a href="javascript:void(0)" onclick="alternarAbaAuth('cadastro')" style="color: #db2777; font-weight: 700; text-decoration: none;">Cadastre-se aqui</a>
                    </div>
                </form>
            </div>

            <!-- 2. FORMULÁRIO DE NOVO CADASTRO DE ALUNO -->
            <div id="painelAuthCadastro" style="display: none;">
                <div style="background: #fdf2f8; border: 1px solid #fbcfe8; border-radius: 6px; padding: 10px 14px; margin-bottom: 14px; font-size: 11.5px; color: #831843; line-height: 1.45;">
                    ℹ️ <strong>Atenção:</strong> Após enviar o seu cadastro, sua conta ficará com status <em>Pendente</em> até que o professor/administrador aprove seu acesso para liberar o envio de atividades.
                </div>

                <form action="index.php?page=cadastro" method="POST">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 12px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">Nome Completo do Aluno:</label>
                            <input type="text" name="nome" required placeholder="Ex: Alexandre Fortunati" style="width: 100%; padding: 8px 12px; border: 1.5px solid #cbd5e1; border-radius: 6px; font-size: 12.5px; outline: none; box-sizing: border-box;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">E-mail Pessoal (Login & Recuperação):</label>
                            <input type="email" name="email" required placeholder="Ex: seu.email@gmail.com" style="width: 100%; padding: 8px 12px; border: 1.5px solid #cbd5e1; border-radius: 6px; font-size: 12.5px; outline: none; box-sizing: border-box;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1.2fr 1fr 1fr; gap: 10px; margin-bottom: 16px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">Turma / Unidade:</label>
                            <input type="text" name="turma" placeholder="Ex: Técnico em DS" style="width: 100%; padding: 8px 12px; border: 1.5px solid #cbd5e1; border-radius: 6px; font-size: 12.5px; outline: none; box-sizing: border-box;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">Criar Senha (mín. 6):</label>
                            <input type="password" name="senha" required minlength="6" placeholder="******" style="width: 100%; padding: 8px 12px; border: 1.5px solid #cbd5e1; border-radius: 6px; font-size: 12.5px; outline: none; box-sizing: border-box;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">Confirmar Senha:</label>
                            <input type="password" name="confirma_senha" required minlength="6" placeholder="******" style="width: 100%; padding: 8px 12px; border: 1.5px solid #cbd5e1; border-radius: 6px; font-size: 12.5px; outline: none; box-sizing: border-box;">
                        </div>
                    </div>

                    <button type="submit" style="width: 100%; background: #db2777; color: #ffffff; border: none; padding: 11px; border-radius: 6px; font-size: 13px; font-weight: 700; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                        Solicitar Cadastro de Aluno
                    </button>
                </form>
            </div>

            <!-- 3. FORMULÁRIO DE ESQUECI MINHA SENHA -->
            <div id="painelAuthEsqueci" style="display: none;">
                <p style="font-size: 12.5px; color: #475569; margin: 0 0 14px; line-height: 1.5;">
                    Digite o e-mail pessoal cadastrado na sua conta. Nós enviaremos um link exclusivo com token seguro para você redefinir sua senha.
                </p>

                <form action="index.php?page=esqueci-senha" method="POST">
                    <div style="margin-bottom: 14px;">
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">Seu E-mail Cadastrado:</label>
                        <input type="email" name="email_recuperacao" required placeholder="Digite seu e-mail..." style="width: 100%; padding: 9px 12px; border: 1.5px solid #cbd5e1; border-radius: 6px; font-size: 13px; outline: none; box-sizing: border-box;">
                    </div>

                    <button type="submit" style="width: 100%; background: #0284c7; color: #ffffff; border: none; padding: 11px; border-radius: 6px; font-size: 13px; font-weight: 700; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                        Enviar Link de Recuperação
                    </button>

                    <div style="margin-top: 14px; text-align: center;">
                        <a href="javascript:void(0)" onclick="alternarAbaAuth('login')" style="font-size: 12px; color: #64748b; text-decoration: none;">&larr; Voltar para o Login</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
function alternarAbaAuth(aba) {
    const painelLogin = document.getElementById('painelAuthLogin');
    const painelCadastro = document.getElementById('painelAuthCadastro');
    const painelEsqueci = document.getElementById('painelAuthEsqueci');

    const btnLogin = document.getElementById('tabBtnLogin');
    const btnCadastro = document.getElementById('tabBtnCadastro');
    const btnEsqueci = document.getElementById('tabBtnEsqueci');

    // Esconde todos
    painelLogin.style.display = 'none';
    painelCadastro.style.display = 'none';
    painelEsqueci.style.display = 'none';

    // Reseta botões
    [btnLogin, btnCadastro, btnEsqueci].forEach(btn => {
        btn.style.borderBottom = '2.5px solid transparent';
        btn.style.color = '#64748b';
        btn.style.background = 'transparent';
    });

    if (aba === 'cadastro') {
        painelCadastro.style.display = 'block';
        btnCadastro.style.borderBottom = '2.5px solid #db2777';
        btnCadastro.style.color = '#db2777';
        btnCadastro.style.background = '#ffffff';
    } else if (aba === 'esqueci') {
        painelEsqueci.style.display = 'block';
        btnEsqueci.style.borderBottom = '2.5px solid #0284c7';
        btnEsqueci.style.color = '#0284c7';
        btnEsqueci.style.background = '#ffffff';
    } else {
        painelLogin.style.display = 'block';
        btnLogin.style.borderBottom = '2.5px solid #0f172a';
        btnLogin.style.color = '#0f172a';
        btnLogin.style.background = '#ffffff';
    }
}

// Inicia com a aba ativa passada pelo controller
document.addEventListener('DOMContentLoaded', () => {
    alternarAbaAuth('<?= $aba ?>');
});
</script>
