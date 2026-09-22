/**
 * Submissão e Persistência de Respostas dos Módulos (1 ao 9)
 * SENAI-SP • Habilitação Técnica em Desenvolvimento de Sistemas
 */

document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('.project-submit-form');
    if (!forms.length) return;

    // Se o aluno estiver logado, auto-preenche o campo de nome
    if (window.USUARIO_LOGADO) {
        document.querySelectorAll('input[placeholder*="nome" i], input[name*="nome" i], .quiz-input').forEach(input => {
            if (input.placeholder && input.placeholder.toLowerCase().includes('nome')) {
                input.value = window.USUARIO_LOGADO.nome;
                input.readOnly = true;
                input.style.backgroundColor = '#f1f5f9';
                input.style.cursor = 'not-allowed';
            }
        });
    }

    forms.forEach(form => {
        // Remove onsubmit inline se houver
        form.removeAttribute('onsubmit');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            // 1. Verifica autenticação
            if (!window.USUARIO_LOGADO) {
                const querLogar = confirm(
                    "⚠️ Você precisa estar conectado com sua conta de aluno para enviar e registrar formalmente suas respostas para avaliação do professor no SENAI.\n\nDeseja ir para a tela de Login / Cadastro agora?"
                );
                if (querLogar) {
                    window.location.href = 'index.php?page=login';
                }
                return;
            }

            // 2. Encontra o botão de submit e desabilita temporariamente
            const submitBtn = form.querySelector('button[type="submit"]');
            const textoOriginal = submitBtn ? submitBtn.innerHTML : 'Enviar Respostas';
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '⏳ Gravando respostas no banco...';
            }

            // 3. Monta FormData com identificador de cada pergunta
            const formData = new FormData();
            formData.append('modulo_num', window.MODULO_ATUAL || 1);

            // Mapeia todos os inputs e textareas do form
            const elementos = form.querySelectorAll('input, textarea, select');
            let contador = 1;

            elementos.forEach(el => {
                let chave = el.name;
                if (!chave) {
                    // Tenta obter do label anterior
                    const label = el.closest('div') ? el.closest('div').querySelector('.quiz-label, label') : null;
                    if (label) {
                        chave = 'pergunta_' + contador + '_' + label.innerText.replace(/[^a-zA-Z0-9]/g, '_').substring(0, 30);
                    } else {
                        chave = 'campo_' + contador;
                    }
                }
                formData.append(chave, el.value);
                contador++;
            });

            try {
                const response = await fetch('index.php?action=salvar-resposta', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    // Exibe container de confirmação estilizado
                    let feedbackBox = form.querySelector('.submission-feedback-box');
                    if (!feedbackBox) {
                        feedbackBox = document.createElement('div');
                        feedbackBox.className = 'submission-feedback-box';
                        form.appendChild(feedbackBox);
                    }

                    feedbackBox.style.cssText = 'background: #ecfdf5; border: 1.5px solid #10b981; border-radius: 8px; padding: 16px; margin-top: 16px; color: #065f46; font-size: 13px; line-height: 1.5; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.1);';
                    feedbackBox.innerHTML = `
                        <div style="display: flex; align-items: center; gap: 8px; font-size: 15px; font-weight: 800; color: #047857; margin-bottom: 6px;">
                            <span>✅ Parabéns, ${window.USUARIO_LOGADO.nome}!</span>
                        </div>
                        <div>Suas respostas do <strong>Módulo ${data.modulo}</strong> foram gravadas com sucesso no banco de dados do SENAI.</div>
                        <div style="margin-top: 8px; font-size: 11.5px; font-family: var(--font-mono); background: rgba(16, 185, 129, 0.15); padding: 4px 8px; border-radius: 4px; display: inline-block;">
                            Protocolo de Entrega: <strong>${data.protocolo}</strong>
                        </div>
                        <div style="margin-top: 8px; font-size: 12px; color: #059669;">
                            O professor já pode visualizar seu envio no Painel Docente para atribuição de nota e feedback.
                        </div>
                    `;

                    feedbackBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                } else {
                    alert('Erro ao gravar respostas: ' + (data.message || 'Falha na requisição.'));
                }
            } catch (err) {
                console.error(err);
                alert('Erro de comunicação com o servidor ao gravar suas respostas.');
            } finally {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '✅ Respostas Registradas (Reenviar se desejar)';
                }
            }
        });
    });
});
