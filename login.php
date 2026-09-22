<?php
/**
 * Portal Principal - Tela de Autenticação, Cadastro de Aluno e Recuperação de Senha
 * SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/banco_dados_portal/app/models/Database.php';
require_once __DIR__ . '/banco_dados_portal/app/models/Usuario.php';
require_once __DIR__ . '/banco_dados_portal/app/models/PasswordReset.php';

// Inicializa banco de dados se necessário
Database::getConnection();

$mensagemFeedback = null;
$tipoFeedback = null;
$abaAtiva = 'login';

// 1. Processamento de Logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['usuario']);
    session_destroy();
    header('Location: index.php');
    exit;
}

// 2. Processamento do Formulário de Login (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_action']) && $_POST['form_action'] === 'login') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (empty($email) || empty($senha)) {
        $mensagemFeedback = 'Por favor, preencha o e-mail e a senha para acessar.';
        $tipoFeedback = 'error';
        $abaAtiva = 'login';
    } else {
        $res = Usuario::autenticar($email, $senha);
        if ($res['success']) {
            $_SESSION['usuario'] = $res['user'];
            $destino = $_SESSION['redirect_after_login'] ?? 'index.php';
            unset($_SESSION['redirect_after_login']);
            header("Location: {$destino}");
            exit;
        } else {
            $mensagemFeedback = $res['message'];
            $tipoFeedback = 'error';
            $abaAtiva = 'login';
        }
    }
}

// 3. Processamento de Novo Cadastro de Aluno (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_action']) && $_POST['form_action'] === 'cadastro') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $cpf = trim($_POST['cpf'] ?? '');
    $turma = trim($_POST['turma'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $confirma = $_POST['confirma_senha'] ?? '';

    if (empty($nome) || empty($email) || empty($senha)) {
        $mensagemFeedback = 'Preencha todos os campos obrigatórios (Nome, E-mail e Senha).';
        $tipoFeedback = 'error';
        $abaAtiva = 'cadastro';
    } elseif (strlen($senha) < 6) {
        $mensagemFeedback = 'A senha de acesso deve possuir no mínimo 6 caracteres.';
        $tipoFeedback = 'error';
        $abaAtiva = 'cadastro';
    } elseif ($senha !== $confirma) {
        $mensagemFeedback = 'A confirmação de senha não coincide com a senha digitada.';
        $tipoFeedback = 'error';
        $abaAtiva = 'cadastro';
    } else {
        $res = Usuario::cadastrar($nome, $email, $cpf, $turma, $senha);
        if ($res['success']) {
            $mensagemFeedback = '✅ Cadastro realizado com sucesso! Sua conta está <strong>AGUARDANDO APROVAÇÃO</strong> do professor/administrador para ser liberada.';
            $tipoFeedback = 'success';
            $abaAtiva = 'login';
        } else {
            $mensagemFeedback = $res['message'];
            $tipoFeedback = 'error';
            $abaAtiva = 'cadastro';
        }
    }
}

// 4. Processamento de Solicitação de Recuperação de Senha (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_action']) && $_POST['form_action'] === 'esqueci') {
    $email = trim($_POST['email_recuperacao'] ?? '');

    if (empty($email)) {
        $mensagemFeedback = 'Por favor, informe seu e-mail cadastrado.';
        $tipoFeedback = 'error';
        $abaAtiva = 'esqueci';
    } else {
        $user = Usuario::buscarPorEmail($email);
        if (!$user) {
            $mensagemFeedback = 'Se o e-mail informado estiver cadastrado, um link de recuperação foi despachado.';
            $tipoFeedback = 'info';
            $abaAtiva = 'esqueci';
        } else {
            $token = PasswordReset::gerarToken((int)$user['id_usuario']);
            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $host = $_SERVER['HTTP_HOST'];
            $baseUri = dirname($_SERVER['SCRIPT_NAME']);
            $baseUri = rtrim(str_replace('\\', '/', $baseUri), '/');
            $link = "{$protocol}{$host}{$baseUri}/index.php?action=redefinir&token={$token}";

            $envio = PasswordReset::despacharEmail($user['email'], $user['nome'], $link);
            $msg = "Link de recuperação gerado com sucesso para o e-mail <strong>" . htmlspecialchars($user['email']) . "</strong>!";
            if (!$envio['mail_sent']) {
                $msg .= "<br><br><span style='font-size:12px; color:#c2410c;'><strong>Ambiente Local (XAMPP):</strong> O link seguro de redefinição pode ser acessado diretamente clicando aqui: <br><a href='{$link}' style='color:#0284c7; text-decoration:underline; word-break:break-all;'>{$link}</a></span>";
            }
            $mensagemFeedback = $msg;
            $tipoFeedback = 'success';
            $abaAtiva = 'esqueci';
        }
    }
}

// 5. Processamento de Gravação de Nova Senha (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_action']) && $_POST['form_action'] === 'gravar_nova_senha') {
    $token = $_POST['token'] ?? '';
    $senha = $_POST['nova_senha'] ?? '';
    $confirma = $_POST['confirma_nova_senha'] ?? '';

    if (empty($token)) {
        header('Location: index.php');
        exit;
    } elseif (strlen($senha) < 6) {
        $mensagemFeedback = 'A nova senha deve possuir pelo menos 6 caracteres.';
        $tipoFeedback = 'error';
        $abaAtiva = 'redefinir';
    } elseif ($senha !== $confirma) {
        $mensagemFeedback = 'A confirmação de senha não coincide com a nova senha.';
        $tipoFeedback = 'error';
        $abaAtiva = 'redefinir';
    } else {
        $ok = PasswordReset::redefinirSenha($token, $senha);
        if (!$ok) {
            $mensagemFeedback = 'Token inválido ou expirado. Por favor, solicite uma nova recuperação.';
            $tipoFeedback = 'error';
            $abaAtiva = 'esqueci';
        } else {
            $mensagemFeedback = '✅ Sua senha foi redefinida com sucesso! Você já pode entrar com sua nova credencial.';
            $tipoFeedback = 'success';
            $abaAtiva = 'login';
        }
    }
}

// Verifica se está na tela de redefinição via token GET
$isRedefinir = (isset($_GET['action']) && $_GET['action'] === 'redefinir' && !empty($_GET['token']));
$tokenValido = false;
$usuarioToken = null;
if ($isRedefinir) {
    $usuarioToken = PasswordReset::validarToken($_GET['token']);
    $tokenValido = ($usuarioToken !== null);
    $abaAtiva = 'redefinir';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Restrito • Portal Acadêmico | SENAI-SP</title>
    <meta name="description" content="Autenticação e cadastro de alunos do Portal Acadêmico de Disciplinas do SENAI-SP.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --senai-red: #d32f2f;
            --senai-red-dark: #b71c1c;
            --font-sans: 'Inter', sans-serif;
            --font-heading: 'Outfit', sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-sans);
            background: #0f172a url('public/img/study_login_bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 24px 16px;
            position: relative;
        }

        /* Overlay elegante escurecido com leve desfoque para máxima legibilidade */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.76) 0%, rgba(30, 27, 75, 0.70) 100%);
            backdrop-filter: blur(2px);
            z-index: 1;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 520px;
            position: relative;
            z-index: 2;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 16px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.2);
            overflow: hidden;
        }

        .auth-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
            padding: 26px 28px;
            text-align: center;
            color: #ffffff;
            border-bottom: 3.5px solid var(--senai-red);
        }

        .auth-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.12);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
            color: #fecaca;
        }

        .auth-title {
            font-family: var(--font-heading);
            font-size: 21px;
            font-weight: 800;
            margin-bottom: 4px;
            color: #ffffff;
        }

        .auth-subtitle {
            font-size: 12.5px;
            color: #cbd5e1;
            line-height: 1.4;
        }

        .auth-tabs {
            display: flex;
            border-bottom: 1px solid #e2e8f0;
            background: #f8fafc;
        }

        .tab-btn {
            flex: 1;
            padding: 13px 10px;
            font-size: 12.5px;
            font-weight: 700;
            border: none;
            background: transparent;
            cursor: pointer;
            border-bottom: 2.5px solid transparent;
            color: #64748b;
            transition: all 0.2s;
            text-align: center;
        }

        .tab-btn.active {
            background: #ffffff;
            color: var(--senai-red);
            border-bottom-color: var(--senai-red);
        }

        .auth-body {
            padding: 24px 28px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 4px;
        }

        .form-input {
            width: 100%;
            padding: 9.5px 12px;
            border: 1.5px solid #cbd5e1;
            border-radius: 6px;
            font-size: 13px;
            outline: none;
            transition: border-color 0.2s;
            font-family: var(--font-sans);
        }

        .form-input:focus {
            border-color: var(--senai-red);
            box-shadow: 0 0 0 3px rgba(211, 47, 47, 0.1);
        }

        .btn-primary {
            width: 100%;
            background: var(--senai-red);
            color: #ffffff;
            border: none;
            padding: 11px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background 0.2s;
        }

        .btn-primary:hover {
            background: var(--senai-red-dark);
        }

        .feedback-box {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 12px;
            line-height: 1.5;
            margin-bottom: 16px;
        }

        .feedback-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
        }

        .feedback-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        .feedback-info {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
        }

        .footer-note {
            margin-top: 18px;
            text-align: center;
            font-size: 12px;
            color: #f1f5f9;
            font-weight: 500;
            text-shadow: 0 1px 4px rgba(0, 0, 0, 0.8);
            position: relative;
            z-index: 2;
        }
    </style>
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-card">
        
        <!-- CABEÇALHO -->
        <div class="auth-header">
            <div class="auth-badge">
                <span>SENAI - SP • DESENVOLVIMENTO DE SISTEMAS</span>
            </div>
            <h1 class="auth-title">Portal Acadêmico de Disciplinas</h1>
            <p class="auth-subtitle">Autentique-se com sua conta de aluno ou professor para acessar os materiais e apostilas</p>
        </div>

        <!-- ABAS -->
        <?php if (!$isRedefinir): ?>
            <div class="auth-tabs">
                <button type="button" id="tabBtnLogin" class="tab-btn <?= ($abaAtiva === 'login') ? 'active' : '' ?>" onclick="alternarAba('login')">
                    🔑 Entrar
                </button>
                <button type="button" id="tabBtnCadastro" class="tab-btn <?= ($abaAtiva === 'cadastro') ? 'active' : '' ?>" onclick="alternarAba('cadastro')">
                    📝 Novo Cadastro
                </button>
                <button type="button" id="tabBtnEsqueci" class="tab-btn <?= ($abaAtiva === 'esqueci') ? 'active' : '' ?>" onclick="alternarAba('esqueci')">
                    ❓ Esqueci a Senha
                </button>
            </div>
        <?php endif; ?>

        <!-- CORPO -->
        <div class="auth-body">
            
            <?php if (!empty($mensagemFeedback)): ?>
                <div class="feedback-box <?= ($tipoFeedback === 'success') ? 'feedback-success' : (($tipoFeedback === 'info') ? 'feedback-info' : 'feedback-error') ?>">
                    <?= $mensagemFeedback ?>
                </div>
            <?php endif; ?>

            <!-- 1. ABA DE LOGIN -->
            <div id="painelLogin" style="display: <?= ($abaAtiva === 'login') ? 'block' : 'none' ?>;">
                <form action="index.php" method="POST">
                    <input type="hidden" name="form_action" value="login">

                    <div class="form-group">
                        <label class="form-label">E-mail Cadastrado:</label>
                        <input type="email" name="email" required placeholder="aluno@email.com ou admin@senai.br" class="form-input">
                    </div>

                    <div class="form-group">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
                            <label class="form-label" style="margin-bottom: 0;">Senha de Acesso:</label>
                            <a href="javascript:void(0)" onclick="alternarAba('esqueci')" style="font-size: 11px; color: var(--senai-red); text-decoration: none; font-weight: 600;">Esqueceu a senha?</a>
                        </div>
                        <div style="position: relative;">
                            <input type="password" id="loginSenhaInput" name="senha" required placeholder="Digite sua senha..." class="form-input" style="padding-right: 42px;">
                            <button type="button" onclick="toggleSenhaVisibilidade('loginSenhaInput', this)" style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #64748b; font-size: 15px; padding: 4px;" title="Mostrar/Ocultar Senha">👁️</button>
                        </div>
                    </div>

                    <button type="submit" class="btn-primary">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                        Acessar o Portal de Disciplinas
                    </button>

                    <div style="margin-top: 18px; padding-top: 14px; border-top: 1px solid #f1f5f9; text-align: center; font-size: 12px; color: #64748b;">
                        Ainda não possui conta? <a href="javascript:void(0)" onclick="alternarAba('cadastro')" style="color: var(--senai-red); font-weight: 700; text-decoration: none;">Cadastre-se aqui</a>
                    </div>
                </form>
            </div>

            <!-- 2. ABA DE CADASTRO -->
            <div id="painelCadastro" style="display: <?= ($abaAtiva === 'cadastro') ? 'block' : 'none' ?>;">
                <div style="background: #fdf2f8; border: 1px solid #fbcfe8; border-radius: 6px; padding: 10px 14px; margin-bottom: 14px; font-size: 11.5px; color: #831843; line-height: 1.45;">
                    ℹ️ <strong>Importante:</strong> Seu cadastro será submetido com status <em>Pendente</em> para autorização prévia da coordenação/professor antes da liberação do acesso.
                </div>

                <form action="index.php" method="POST">
                    <input type="hidden" name="form_action" value="cadastro">

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                        <div class="form-group">
                            <label class="form-label">Nome Completo do Aluno:</label>
                            <input type="text" name="nome" required placeholder="Ex: Alexandre Fortunati" class="form-input">
                        </div>
                        <div class="form-group">
                            <label class="form-label">E-mail Pessoal (Login & Recuperação):</label>
                            <input type="email" name="email" required placeholder="Ex: seu.email@gmail.com" class="form-input">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1.2fr 1fr 1fr; gap: 10px; margin-bottom: 16px;">
                        <div>
                            <label class="form-label">Turma / Unidade:</label>
                            <input type="text" name="turma" placeholder="Ex: Técnico em DS" class="form-input">
                        </div>
                        <div>
                            <label class="form-label">Criar Senha (mín. 6):</label>
                            <input type="password" name="senha" required minlength="6" placeholder="******" class="form-input">
                        </div>
                        <div>
                            <label class="form-label">Confirmar Senha:</label>
                            <input type="password" name="confirma_senha" required minlength="6" placeholder="******" class="form-input">
                        </div>
                    </div>

                    <button type="submit" class="btn-primary">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                        Solicitar Cadastro de Aluno
                    </button>
                </form>
            </div>

            <!-- 3. ABA ESQUECI A SENHA -->
            <div id="painelEsqueci" style="display: <?= ($abaAtiva === 'esqueci') ? 'block' : 'none' ?>;">
                <p style="font-size: 12.5px; color: #475569; margin-bottom: 14px; line-height: 1.5;">
                    Informe seu e-mail pessoal cadastrado. Enviaremos um link exclusivo com token seguro para você redefinir sua senha.
                </p>

                <form action="index.php" method="POST">
                    <input type="hidden" name="form_action" value="esqueci">

                    <div class="form-group">
                        <label class="form-label">Seu E-mail Cadastrado:</label>
                        <input type="email" name="email_recuperacao" required placeholder="Digite seu e-mail..." class="form-input">
                    </div>

                    <button type="submit" class="btn-primary" style="background: #0284c7;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                        Enviar Link de Recuperação
                    </button>

                    <div style="margin-top: 14px; text-align: center;">
                        <a href="javascript:void(0)" onclick="alternarAba('login')" style="font-size: 12px; color: #64748b; text-decoration: none;">&larr; Voltar para o Login</a>
                    </div>
                </form>
            </div>

            <!-- 4. REDEFINIÇÃO DE SENHA (QUANDO HOUVER TOKEN) -->
            <?php if ($isRedefinir): ?>
                <div id="painelRedefinir">
                    <?php if (!$tokenValido): ?>
                        <div class="feedback-box feedback-error">
                            ❌ <strong>Link Inválido ou Expirado!</strong><br>
                            O token de segurança não existe, já foi utilizado ou expirou.
                        </div>
                        <div style="text-align: center;">
                            <a href="index.php" class="btn-primary" style="text-decoration: none;">
                                Voltar para a Tela de Login
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="feedback-box feedback-success" style="margin-bottom: 14px;">
                            Identificado: <strong><?= htmlspecialchars($usuarioToken['nome']) ?></strong> (<?= htmlspecialchars($usuarioToken['email']) ?>)
                        </div>

                        <form action="index.php" method="POST">
                            <input type="hidden" name="form_action" value="gravar_nova_senha">
                            <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token'] ?? '') ?>">

                            <div class="form-group">
                                <label class="form-label">Nova Senha (mínimo 6 dígitos):</label>
                                <input type="password" name="nova_senha" required minlength="6" placeholder="Digite sua nova senha..." class="form-input">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Confirmar Nova Senha:</label>
                                <input type="password" name="confirma_nova_senha" required minlength="6" placeholder="Confirme a nova senha..." class="form-input">
                            </div>

                            <button type="submit" class="btn-primary" style="background: #0284c7;">
                                Gravar Nova Senha e Acessar
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <div class="footer-note">
        SENAI - SP CFP 7.91 "Luiz Massa" • Habilitação Técnica em Desenvolvimento de Sistemas
    </div>
</div>

<script>
function alternarAba(aba) {
    const painelLogin = document.getElementById('painelLogin');
    const painelCadastro = document.getElementById('painelCadastro');
    const painelEsqueci = document.getElementById('painelEsqueci');

    const btnLogin = document.getElementById('tabBtnLogin');
    const btnCadastro = document.getElementById('tabBtnCadastro');
    const btnEsqueci = document.getElementById('tabBtnEsqueci');

    if (!painelLogin || !painelCadastro || !painelEsqueci) return;

    painelLogin.style.display = 'none';
    painelCadastro.style.display = 'none';
    painelEsqueci.style.display = 'none';

    [btnLogin, btnCadastro, btnEsqueci].forEach(btn => {
        if (btn) btn.classList.remove('active');
    });

    if (aba === 'cadastro') {
        painelCadastro.style.display = 'block';
        if (btnCadastro) btnCadastro.classList.add('active');
    } else if (aba === 'esqueci') {
        painelEsqueci.style.display = 'block';
        if (btnEsqueci) btnEsqueci.classList.add('active');
    } else {
        painelLogin.style.display = 'block';
        if (btnLogin) btnLogin.classList.add('active');
    }
}

function toggleSenhaVisibilidade(inputId, btn) {
    const input = document.getElementById(inputId);
    if (!input) return;
    if (input.type === 'password') {
        input.type = 'text';
        btn.textContent = '🔒';
    } else {
        input.type = 'password';
        btn.textContent = '👁️';
    }
}
</script>

</body>
</html>
