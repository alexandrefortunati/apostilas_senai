        </div> <!-- End of content-wrapper -->
    </main>
    
    <footer class="app-footer">
        <div class="footer-inner">
            SENAI - SP CFP 7.91 "Luiz Massa" • Habilitação Técnica em Desenvolvimento de Sistemas
        </div>
    </footer>
    </div> <!-- End of app-main-wrapper -->
</div> <!-- End of app-layout -->

<!-- Dados Globais de Sessão e Módulo -->
<script>
window.USUARIO_LOGADO = <?= json_encode($_SESSION['usuario'] ?? null) ?>;
window.MODULO_ATUAL = <?= json_encode($currentModule ?? null) ?>;
</script>

<!-- Main Interactive Scripts -->
<script src="public/js/prototype-step-player.js"></script>
<script src="public/js/three-circuit-viewer.js"></script>
<script src="public/js/main.js"></script>
</body>
</html>
