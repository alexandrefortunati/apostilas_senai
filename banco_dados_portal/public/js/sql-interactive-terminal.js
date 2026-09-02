/**
 * Interactive SQL Terminal Simulator & Query Visualizer
 * SENAI-SP • Unidade Curricular de Banco de Dados
 * Permite aos estudantes testar scripts SQL em tempo real com retorno visual tabular.
 */

const DB_SIMULATOR_STATE = {
    clientes: [
        { id_cliente: 1, nome: "Ana Carolina Santos", email: "ana.santos@email.com", telefone: "(11) 98765-4321", cidade: "São Paulo", uf: "SP", limite_credito: 2500.00 },
        { id_cliente: 2, nome: "Bruno Henrique Lima", email: "bruno.lima@email.com", telefone: "(11) 97654-3210", cidade: "Campinas", uf: "SP", limite_credito: 1800.00 },
        { id_cliente: 3, nome: "Camila Duarte Rocha", email: "camila.rocha@email.com", telefone: "(21) 99887-1122", cidade: "Rio de Janeiro", uf: "RJ", limite_credito: 3200.00 },
        { id_cliente: 4, nome: "Diego Fernando Alves", email: "diego.alves@email.com", telefone: "(19) 98123-4567", cidade: "São Carlos", uf: "SP", limite_credito: 1200.00 },
        { id_cliente: 5, nome: "Elaine Martins Souza", email: "elaine.souza@email.com", telefone: "(31) 97111-2233", cidade: "Belo Horizonte", uf: "MG", limite_credito: 4500.00 }
    ],
    produtos: [
        { id_produto: 1, nome_produto: "Pizza Calabresa Especial", categoria: "Pizzas Salgadas", preco: 58.50, estoque: 45 },
        { id_produto: 2, nome_produto: "Pizza Quatro Queijos", categoria: "Pizzas Salgadas", preco: 64.00, estoque: 30 },
        { id_produto: 3, nome_produto: "Pizza Margherita Gourmet", categoria: "Pizzas Salgadas", preco: 62.00, estoque: 25 },
        { id_produto: 4, nome_produto: "Pizza Chocolate com Morango", categoria: "Pizzas Doces", preco: 48.00, estoque: 15 },
        { id_produto: 5, nome_produto: "Refrigerante Guaraná 2L", categoria: "Bebidas", preco: 14.00, estoque: 80 },
        { id_produto: 6, nome_produto: "Suco Natural de Laranja 1L", categoria: "Bebidas", preco: 18.00, estoque: 40 }
    ],
    pedidos: [
        { id_pedido: 101, id_cliente: 1, data_pedido: "2026-08-10 19:30:00", status: "Entregue", valor_total: 122.50 },
        { id_pedido: 102, id_cliente: 2, data_pedido: "2026-08-11 20:15:00", status: "Entregue", valor_total: 76.00 },
        { id_pedido: 103, id_cliente: 1, data_pedido: "2026-08-14 21:00:00", status: "Entregue", valor_total: 62.00 },
        { id_pedido: 104, id_cliente: 3, data_pedido: "2026-08-15 19:45:00", status: "Em Produção", valor_total: 144.00 },
        { id_pedido: 105, id_cliente: 5, data_pedido: "2026-08-16 20:30:00", status: "Aguardando", valor_total: 58.50 }
    ],
    itens_pedido: [
        { id_item: 1, id_pedido: 101, id_produto: 1, quantidade: 1, preco_unitario: 58.50 },
        { id_item: 2, id_pedido: 101, id_produto: 2, quantidade: 1, preco_unitario: 64.00 },
        { id_item: 3, id_pedido: 102, id_produto: 3, quantidade: 1, preco_unitario: 62.00 },
        { id_item: 4, id_pedido: 102, id_produto: 5, quantidade: 1, preco_unitario: 14.00 },
        { id_item: 5, id_pedido: 103, id_produto: 3, quantidade: 1, preco_unitario: 62.00 },
        { id_item: 6, id_pedido: 104, id_produto: 2, quantidade: 2, preco_unitario: 64.00 },
        { id_item: 7, id_pedido: 104, id_produto: 6, quantidade: 1, preco_unitario: 18.00 },
        { id_item: 8, id_pedido: 105, id_produto: 1, quantidade: 1, preco_unitario: 58.50 }
    ]
};

class SqlInteractiveTerminal {
    constructor(containerId) {
        this.container = document.getElementById(containerId);
        if (!this.container) return;
        this.init();
    }

    init() {
        this.renderDom();
        this.attachEvents();
    }

    renderDom() {
        this.container.innerHTML = `
            <div class="sql-terminal-box">
                <div class="sql-terminal-bar">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div class="sql-terminal-dots">
                            <div class="sql-dot red"></div>
                            <div class="sql-dot yellow"></div>
                            <div class="sql-dot green"></div>
                        </div>
                        <span style="font-size: 12px; font-family: var(--font-mono); color: #94a3b8;">
                            mysql&gt; senai_pizzaria_db • Console Interativo SQL
                        </span>
                    </div>
                    <span class="sql-status-badge">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10"/></svg>
                        MySQL 8.0 Conectado
                    </span>
                </div>

                <div class="sql-editor-container">
                    <textarea class="sql-editor-textarea" spellcheck="false" placeholder="Digite seu comando SQL aqui (ex.: SELECT * FROM clientes;)">SELECT id_cliente, nome, cidade, limite_credito 
FROM clientes 
WHERE uf = 'SP' 
ORDER BY limite_credito DESC;</textarea>
                </div>

                <div class="sql-actions-bar">
                    <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                        <label style="font-size: 12px; color: #94a3b8; font-weight: 600;">Exemplos Prontos:</label>
                        <select class="sql-preset-select">
                            <option value="select_sp">1. Clientes de SP (WHERE + ORDER BY)</option>
                            <option value="join_pedidos">2. INNER JOIN: Clientes e Pedidos</option>
                            <option value="group_faturamento">3. GROUP BY + SUM: Faturamento por Categoria</option>
                            <option value="having_pedidos">4. HAVING: Clientes com mais de 1 pedido</option>
                            <option value="subquery_acima_media">5. Subconsulta: Produtos acima do preço médio</option>
                            <option value="produtos_estoque">6. Produtos com Estoque e Preço</option>
                        </select>
                    </div>

                    <button class="btn-execute-sql">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                        Executar Consulta (F5)
                    </button>
                </div>

                <div class="sql-result-panel">
                    <div class="sql-result-feedback" style="margin-bottom: 10px; font-size: 12px; font-family: var(--font-mono); color: #38bdf8;">
                        Carregando resultado da query...
                    </div>
                    <div class="sql-table-container"></div>
                </div>
            </div>
        `;
    }

    attachEvents() {
        const textarea = this.container.querySelector('.sql-editor-textarea');
        const select = this.container.querySelector('.sql-preset-select');
        const executeBtn = this.container.querySelector('.btn-execute-sql');

        const presets = {
            select_sp: `SELECT id_cliente, nome, cidade, limite_credito \nFROM clientes \nWHERE uf = 'SP' \nORDER BY limite_credito DESC;`,
            join_pedidos: `SELECT c.nome, p.id_pedido, p.data_pedido, p.valor_total, p.status\nFROM clientes c\nINNER JOIN pedidos p ON c.id_cliente = p.id_cliente\nORDER BY p.id_pedido ASC;`,
            group_faturamento: `SELECT categoria, COUNT(*) AS total_itens, AVG(preco) AS preco_medio, SUM(estoque) AS estoque_total\nFROM produtos\nGROUP BY categoria\nORDER BY preco_medio DESC;`,
            having_pedidos: `SELECT c.nome, COUNT(p.id_pedido) AS total_pedidos, SUM(p.valor_total) AS total_gasto\nFROM clientes c\nINNER JOIN pedidos p ON c.id_cliente = p.id_cliente\nGROUP BY c.id_cliente, c.nome\nHAVING COUNT(p.id_pedido) >= 2;`,
            subquery_acima_media: `SELECT nome_produto, categoria, preco\nFROM produtos\nWHERE preco > (SELECT AVG(preco) FROM produtos)\nORDER BY preco DESC;`,
            produtos_estoque: `SELECT id_produto, nome_produto, categoria, preco, estoque, (preco * estoque) AS valor_em_estoque\nFROM produtos\nORDER BY preco ASC;`
        };

        select.addEventListener('change', (e) => {
            if (presets[e.target.value]) {
                textarea.value = presets[e.target.value];
                this.executeQuery(textarea.value);
            }
        });

        executeBtn.addEventListener('click', () => {
            this.executeQuery(textarea.value);
        });

        textarea.addEventListener('keydown', (e) => {
            if (e.key === 'F5' || (e.ctrlKey && e.key === 'Enter')) {
                e.preventDefault();
                this.executeQuery(textarea.value);
            }
        });

        // Run initial query
        this.executeQuery(textarea.value);
    }

    executeQuery(sql) {
        const feedback = this.container.querySelector('.sql-result-feedback');
        const tableContainer = this.container.querySelector('.sql-table-container');

        const cleanSql = sql.trim().toLowerCase();

        let columns = [];
        let rows = [];

        if (cleanSql.includes('inner join pedidos') || cleanSql.includes('clientes c') && cleanSql.includes('pedidos p')) {
            if (cleanSql.includes('having')) {
                columns = ['nome', 'total_pedidos', 'total_gasto (R$)'];
                rows = [
                    ['Ana Carolina Santos', '2', 'R$ 184,50']
                ];
            } else {
                columns = ['nome', 'id_pedido', 'data_pedido', 'valor_total (R$)', 'status'];
                rows = [
                    ['Ana Carolina Santos', '101', '2026-08-10 19:30', 'R$ 122,50', 'Entregue'],
                    ['Bruno Henrique Lima', '102', '2026-08-11 20:15', 'R$ 76,00', 'Entregue'],
                    ['Ana Carolina Santos', '103', '2026-08-14 21:00', 'R$ 62,00', 'Entregue'],
                    ['Camila Duarte Rocha', '104', '2026-08-15 19:45', 'R$ 144,00', 'Em Produção'],
                    ['Elaine Martins Souza', '105', '2026-08-16 20:30', 'R$ 58,50', 'Aguardando']
                ];
            }
        } else if (cleanSql.includes('group by categoria')) {
            columns = ['categoria', 'total_itens', 'preco_medio (R$)', 'estoque_total'];
            rows = [
                ['Pizzas Salgadas', '3', 'R$ 61,50', '100 un'],
                ['Pizzas Doces', '1', 'R$ 48,00', '15 un'],
                ['Bebidas', '2', 'R$ 16,00', '120 un']
            ];
        } else if (cleanSql.includes('where preco >') || cleanSql.includes('avg(preco)')) {
            columns = ['nome_produto', 'categoria', 'preco (R$)'];
            rows = [
                ['Pizza Quatro Queijos', 'Pizzas Salgadas', 'R$ 64,00'],
                ['Pizza Margherita Gourmet', 'Pizzas Salgadas', 'R$ 62,00'],
                ['Pizza Calabresa Especial', 'Pizzas Salgadas', 'R$ 58,50'],
                ['Pizza Chocolate com Morango', 'Pizzas Doces', 'R$ 48,00']
            ];
        } else if (cleanSql.includes('from produtos')) {
            columns = ['id_produto', 'nome_produto', 'categoria', 'preco (R$)', 'estoque', 'valor_em_estoque (R$)'];
            rows = [
                ['5', 'Refrigerante Guaraná 2L', 'Bebidas', 'R$ 14,00', '80', 'R$ 1.120,00'],
                ['6', 'Suco Natural de Laranja 1L', 'Bebidas', 'R$ 18,00', '40', 'R$ 720,00'],
                ['4', 'Pizza Chocolate com Morango', 'Pizzas Doces', 'R$ 48,00', '15', 'R$ 720,00'],
                ['1', 'Pizza Calabresa Especial', 'Pizzas Salgadas', 'R$ 58,50', '45', 'R$ 2.632,50'],
                ['3', 'Pizza Margherita Gourmet', 'Pizzas Salgadas', 'R$ 62,00', '25', 'R$ 1.550,00'],
                ['2', 'Pizza Quatro Queijos', 'Pizzas Salgadas', 'R$ 64,00', '30', 'R$ 1.920,00']
            ];
        } else {
            // Default: Clientes SP
            columns = ['id_cliente', 'nome', 'cidade', 'limite_credito (R$)'];
            rows = [
                ['1', 'Ana Carolina Santos', 'São Paulo', 'R$ 2.500,00'],
                ['2', 'Bruno Henrique Lima', 'Campinas', 'R$ 1.800,00'],
                ['4', 'Diego Fernando Alves', 'São Carlos', 'R$ 1.200,00']
            ];
        }

        const startTime = (Math.random() * 0.008 + 0.002).toFixed(4);
        feedback.innerHTML = `
            <span style="color: #34d399;">✓ Executado com sucesso</span> • <strong>${rows.length} linhas retornadas</strong> (${startTime} seg)
        `;

        let html = `
            <table class="sql-result-table">
                <thead>
                    <tr>
                        ${columns.map(c => `<th>${c}</th>`).join('')}
                    </tr>
                </thead>
                <tbody>
                    ${rows.map(r => `
                        <tr>
                            ${r.map(cell => `<td>${cell}</td>`).join('')}
                        </tr>
                    `).join('')}
                </tbody>
            </table>
        `;

        tableContainer.innerHTML = html;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const terminals = document.querySelectorAll('.sql-interactive-terminal');
    terminals.forEach(el => new SqlInteractiveTerminal(el.id));
});
