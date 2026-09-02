/**
 * Main Client Scripts
 * SENAI-SP • Banco de Dados
 */

document.addEventListener('DOMContentLoaded', () => {
    // Smooth scrolling & active indicator for in-page navigation buttons
    const navButtons = document.querySelectorAll('.sidebar-subtopic-btn, .module-nav-btn');
    navButtons.forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href && href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    navButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    const headerOffset = 70;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // ScrollSpy with IntersectionObserver
    const sections = document.querySelectorAll('.content-section[id]');
    if (sections.length > 0 && navButtons.length > 0) {
        const observerOptions = {
            root: null,
            rootMargin: '-80px 0px -65% 0px',
            threshold: 0
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute('id');
                    navButtons.forEach(btn => {
                        if (btn.getAttribute('href') === `#${id}`) {
                            btn.classList.add('active');
                        } else {
                            btn.classList.remove('active');
                        }
                    });
                }
            });
        }, observerOptions);

        sections.forEach(sec => observer.observe(sec));
    }

    // Form submission feedback for activities
    document.querySelectorAll('.activity-submission-form').forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = form.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<span style="color: #ffffff;">Enviando relatório...</span>';
            btn.disabled = true;

            setTimeout(() => {
                btn.innerHTML = '✓ Atividade Registrada com Sucesso!';
                btn.style.background = '#059669';

                const successBox = document.createElement('div');
                successBox.className = 'callout-box';
                successBox.style.borderLeftColor = '#059669';
                successBox.style.background = '#ecfdf5';
                successBox.style.marginTop = '16px';
                successBox.innerHTML = `
                    <div class="callout-title" style="color: #059669;">
                        ✓ Submissão Concluída
                    </div>
                    <p style="margin: 0; font-size: 13px; color: #065f46;">
                        Seu script SQL, diagramas e relatório prático foram protocolados no sistema acadêmico do SENAI-SP. O docente avaliará a entrega com base na rubrica de 0 a 10 pontos.
                    </p>
                `;
                form.appendChild(successBox);
            }, 800);
        });
    });

    // ============================================================
    // Image Lightbox / Modal Popup Handler
    // ============================================================
    let lightboxModal = document.getElementById('global-image-lightbox');
    if (!lightboxModal) {
        lightboxModal = document.createElement('div');
        lightboxModal.id = 'global-image-lightbox';
        lightboxModal.className = 'image-lightbox-modal';
        lightboxModal.innerHTML = `
            <div class="lightbox-content-box">
                <button class="lightbox-close-btn" aria-label="Fechar" title="Fechar (ESC)">&times;</button>
                <div class="lightbox-img-wrapper">
                    <img src="" alt="" id="lightbox-target-img">
                </div>
                <div class="lightbox-caption-bar">
                    <span id="lightbox-caption-text"></span>
                    <span style="font-size: 11px; opacity: 0.7; margin-left: 12px; white-space: nowrap;">ESC para fechar</span>
                </div>
            </div>
        `;
        document.body.appendChild(lightboxModal);

        const closeBtn = lightboxModal.querySelector('.lightbox-close-btn');
        const closeModal = () => {
            lightboxModal.classList.remove('active');
            document.body.style.overflow = '';
        };

        if (closeBtn) {
            closeBtn.addEventListener('click', closeModal);
        }

        lightboxModal.addEventListener('click', (e) => {
            if (e.target === lightboxModal || e.target.classList.contains('lightbox-img-wrapper')) {
                closeModal();
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && lightboxModal.classList.contains('active')) {
                closeModal();
            }
        });
    }

    // Delegation for any zoomable image container or element with data-zoomable
    document.addEventListener('click', (e) => {
        const trigger = e.target.closest('.zoomable-image-container, [data-zoomable]');
        if (trigger) {
            const img = trigger.querySelector('img') || trigger;
            if (img && img.src) {
                const targetImg = document.getElementById('lightbox-target-img');
                const caption = document.getElementById('lightbox-caption-text');
                const captionText = trigger.getAttribute('data-caption') || img.getAttribute('alt') || 'Visualização Ampliada';
                
                if (targetImg) {
                    targetImg.src = img.src;
                    targetImg.alt = img.alt || '';
                }
                if (caption) {
                    caption.textContent = captionText;
                }

                lightboxModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }
    });

    // ============================================================
    // Centralização Automática do Módulo Expandido no Sidebar
    // ============================================================
    function centerActiveModuleInSidebar(smooth = true) {
        const sidebarNav = document.querySelector('.sidebar-nav-container');
        const activeModule = document.querySelector('.sidebar-module-wrapper.is-active-module');
        
        if (sidebarNav && activeModule) {
            // Calcula as dimensões e o deslocamento relativo
            const navRect = sidebarNav.getBoundingClientRect();
            const moduleRect = activeModule.getBoundingClientRect();
            
            const currentScroll = sidebarNav.scrollTop;
            const relativeTop = moduleRect.top - navRect.top;
            const moduleHeight = activeModule.offsetHeight;
            const navHeight = sidebarNav.clientHeight;
            
            // Posição ideal: módulo e seus subtópicos centralizados no visor do sidebar
            let targetScroll = currentScroll + relativeTop - (navHeight / 2) + (moduleHeight / 2);
            targetScroll = Math.max(0, targetScroll);
            
            sidebarNav.scrollTo({
                top: targetScroll,
                behavior: smooth ? 'smooth' : 'auto'
            });
        }
    }

    // Executa no carregamento da página com delay para garantir cálculo preciso das dimensões
    setTimeout(() => {
        centerActiveModuleInSidebar(true);
    }, 120);

    // Também centraliza se a janela for redimensionada
    window.addEventListener('resize', () => {
        centerActiveModuleInSidebar(false);
    });
});

