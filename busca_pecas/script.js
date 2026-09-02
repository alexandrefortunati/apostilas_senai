function buscarPecas() {
    // Captura o que o usuário digitou no campo de texto
    const termo = document.getElementById('campoBusca').value;
    const divResultados = document.getElementById('resultados');
    
    // Mostra mensagem de carregamento
    divResultados.innerHTML = '<p style="color: #64748b; font-style: italic;">Buscando no banco de dados...</p>';
    
    // Faz a requisição para o arquivo PHP no servidor
    fetch(`busca.php?q=${encodeURIComponent(termo)}`)
        .then(resposta => resposta.json()) // Converte a resposta para JSON
        .then(dados => {
            // Limpa a tela
            divResultados.innerHTML = '';
            
            // Verifica se o banco encontrou alguma peça
            if (!dados || dados.length === 0) {
                divResultados.innerHTML = '<p style="color: #e11d48; font-weight: bold;">Nenhuma peça encontrada.</p>';
                return;
            }
            
            // Cria uma linha visual para cada peça encontrada usando as colunas do SELECT
            dados.forEach(peca => {
                // Transforma o valor numérico em formato de moeda (R$)
                const precoFormatado = parseFloat(peca.preco_unitario).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                const itemHTML = `
                    <div class="peca-item">
                        <strong>${peca.nome_peca}</strong>
                        <span>${precoFormatado}</span>
                    </div>
                `;
                divResultados.innerHTML += itemHTML;
            });
        })
        .catch(erro => {
            console.error('Erro:', erro);
            divResultados.innerHTML = '<p style="color: #e11d48;">Ocorreu um erro ao buscar os dados.</p>';
        });
}

// Dispara busca ao pressionar a tecla Enter
document.getElementById('campoBusca').addEventListener('keydown', function(e) {
    if (e.key === 'Enter') {
        buscarPecas();
    }
});
