/**
 * Main Interactive JS for IoT Portal
 */

document.addEventListener('DOMContentLoaded', () => {
    // Copy Code Button
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const codeBlock = btn.closest('.code-wrapper').querySelector('code');
            if (!codeBlock) return;
            
            navigator.clipboard.writeText(codeBlock.innerText).then(() => {
                const originalText = btn.innerText;
                btn.innerText = 'Copiado!';
                btn.style.borderColor = '#10b981';
                btn.style.color = '#10b981';
                
                setTimeout(() => {
                    btn.innerText = originalText;
                    btn.style.borderColor = '';
                    btn.style.color = '';
                }, 2000);
            });
        });
    });
    
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

                    const headerOffset = 80;
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
    
    // Initialize Prototype Step Player
    const playerContainer = document.getElementById('prototype-step-player');
    if (playerContainer && window.PrototypeStepPlayer) {
        const moduleId = playerContainer.dataset.module || 1;
        new PrototypeStepPlayer('prototype-step-player', moduleId);
    }

    // Initialize Three.js 3D Step-by-Step Circuit Viewer
    const threeContainer = document.getElementById('three-step-circuit-viewer');
    if (threeContainer && window.ThreeStepCircuitViewer) {
        const moduleId = threeContainer.dataset.module || 1;
        new ThreeStepCircuitViewer('three-step-circuit-viewer', moduleId);
    }
    
    // Graded Submission Mock
    const submitForm = document.getElementById('assessment-submission-form');
    if (submitForm) {
        submitForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = submitForm.querySelector('button[type="submit"]');
            btn.disabled = true;
            btn.innerHTML = '<span>Enviando Atividade...</span>';
            
            setTimeout(() => {
                const successAlert = document.createElement('div');
                successAlert.className = 'callout-box success';
                successAlert.innerHTML = `
                    <div class="callout-title">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        Atividade Prática Submetida com Sucesso!
                    </div>
                    <p>Seu relatório prático e link do projeto foram registrados no sistema acadêmico do SENAI. O instrutor fará a avaliação com base na rubrica oficial (0 a 10 pontos).</p>
                `;
                submitForm.replaceWith(successAlert);
            }, 1200);
        });
    }
});
