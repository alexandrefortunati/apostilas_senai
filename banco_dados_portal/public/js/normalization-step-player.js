/**
 * Interactive Normalization Step Player (1FN, 2FN, 3FN)
 * SENAI-SP • Banco de Dados
 * Demonstra a transição passo a passo de uma planilha/tabela não normalizada até a 3ª Forma Normal.
 */

const NORMALIZATION_STEPS = [
    {
        step: 0,
        title: "Tabela Não-Normalizada (Tabela Não-Relacional / Bruta)",
        rule: "A tabela original contém grupos repetitivos em um único campo (pizzas pedidas separadas por vírgula), telefones múltiplos e dados redundantes do cliente.",
        badge: "Estado Inicial • Anomalias de Inserção e Exclusão",
        columns: ["id_pedido", "cliente_nome", "telefones", "cidade", "pizzas_pedidas", "total_pedido"],
        rows: [
            ["101", "Ana Santos", "(11) 98765-4321, (11) 3344-5566", "São Paulo", "Calabresa (1x R$58.50), 4 Queijos (1x R$64.00)", "R$ 122.50"],
            ["102", "Bruno Lima", "(11) 97654-3210", "Campinas", "Margherita (1x R$62.00), Guaraná 2L (1x R$14.00)", "R$ 76.00"]
        ],
        explanation: "❌ Violação: O campo 'pizzas_pedidas' é composto e multivalorado. Não é possível fazer consultas atômicas ou calcular relatórios de faturamento por sabor com eficiência."
    },
    {
        step: 1,
        title: "1ª Forma Normal (1FN): Atomicidade e Eliminação de Grupos Repetitivos",
        rule: "Todos os atributos devem ser atômicos (indivisíveis). Nenhum campo pode conter listas, vetores ou valores múltiplos. Criação da chave primária composta.",
        badge: "1FN Aplicada: Valores Atômicos e Linhas Únicas",
        columns: ["id_pedido", "id_pizza", "cliente_nome", "cidade", "nome_pizza", "qtd", "preco_unit", "total_pedido"],
        rows: [
            ["101", "1", "Ana Santos", "São Paulo", "Pizza Calabresa Especial", "1", "R$ 58.50", "R$ 122.50"],
            ["101", "2", "Ana Santos", "São Paulo", "Pizza Quatro Queijos", "1", "R$ 64.00", "R$ 122.50"],
            ["102", "3", "Bruno Lima", "Campinas", "Pizza Margherita Gourmet", "1", "R$ 62.00", "R$ 76.00"],
            ["102", "5", "Bruno Lima", "Campinas", "Refrigerante Guaraná 2L", "1", "R$ 14.00", "R$ 76.00"]
        ],
        explanation: "✓ 1FN Concluída: Cada célula agora contém exatamente um valor. ⚠️ Atenção: A chave primária é composta (id_pedido + id_pizza). O nome da pizza depende apenas de id_pizza, caracterizando dependência funcional parcial."
    },
    {
        step: 2,
        title: "2ª Forma Normal (2FN): Eliminação de Dependências Parciais",
        rule: "Estar na 1FN e garantir que todos os atributos não-chave dependam da TOTALIDADE da chave primária composta, e não apenas de parte dela.",
        badge: "2FN Aplicada: Decomposição em Tabelas Específicas",
        columns: ["Tabela: ITENS_PEDIDO", "id_pedido (PK/FK)", "id_produto (PK/FK)", "quantidade", "preco_unitario"],
        rows: [
            ["Item 1", "101", "1 (Calabresa)", "1", "R$ 58.50"],
            ["Item 2", "101", "2 (4 Queijos)", "1", "R$ 64.00"],
            ["Item 3", "102", "3 (Margherita)", "1", "R$ 62.00"],
            ["Item 4", "102", "5 (Guaraná)", "1", "R$ 14.00"]
        ],
        explanation: "✓ 2FN Concluída: Os dados do Produto/Pizza foram isolados na tabela PRODUTOS. ⚠️ Nova observação: Na tabela de Pedidos, a Cidade do cliente depende do Cliente, não diretamente do Pedido (Dependência Transitiva)."
    },
    {
        step: 3,
        title: "3ª Forma Normal (3FN): Eliminação de Dependências Transitivas",
        rule: "Estar na 2FN e garantir que nenhum atributo não-chave dependa de outro atributo não-chave (A → B e B → C, logo A → C transitivo).",
        badge: "3FN Plena: Estrutura Relacional Profissional e Sem Redundâncias",
        columns: ["Estrutura Final 3FN", "Tabela CLIENTES (id_cliente PK)", "Tabela PEDIDOS (id_pedido PK, id_cliente FK)", "Tabela ITENS_PEDIDO (PK composta)", "Tabela PRODUTOS (id_produto PK)"],
        rows: [
            ["1", "CLIENTES", "id_cliente, nome, telefone, cidade, uf", "Independência total de clientes"],
            ["2", "PEDIDOS", "id_pedido, id_cliente (FK), data_pedido, valor_total", "Vinculado ao cliente"],
            ["3", "PRODUTOS", "id_produto, nome_produto, categoria, preco", "Catálogo unificado"],
            ["4", "ITENS_PEDIDO", "id_item (PK), id_pedido (FK), id_produto (FK), qtd", "Tabela associativa N:M"]
        ],
        explanation: "🏆 3FN Atingida! Banco de dados 100% normalizado: integridade referencial perfeita, zero redundância indevida e proteção total contra anomalias de atualização ou exclusão."
    }
];

class NormalizationStepPlayer {
    constructor(containerId) {
        this.container = document.getElementById(containerId);
        if (!this.container) return;
        this.currentStep = 0;
        this.render();
    }

    render() {
        const stepData = NORMALIZATION_STEPS[this.currentStep];

        this.container.innerHTML = `
            <div style="background: #ffffff; border: 1.5px solid #e2e8f0; border-radius: 14px; padding: 24px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); margin: 24px 0;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
                    <div>
                        <span class="badge-tag ${this.currentStep === 3 ? 'accent' : 'senai'}" style="margin-bottom: 6px;">
                            ${stepData.badge}
                        </span>
                        <h3 style="font-family: var(--font-heading); font-size: 18px; color: #0f172a; margin: 0;">
                            ${stepData.title}
                        </h3>
                    </div>

                    <!-- Step Selector Buttons -->
                    <div style="display: flex; gap: 6px;">
                        ${NORMALIZATION_STEPS.map((s, idx) => `
                            <button class="norm-step-btn ${idx === this.currentStep ? 'active' : ''}" data-step="${idx}" style="padding: 6px 14px; border-radius: 6px; border: 1px solid #cbd5e1; background: ${idx === this.currentStep ? '#0284c7' : '#f8fafc'}; color: ${idx === this.currentStep ? '#ffffff' : '#334155'}; font-weight: 700; font-size: 12px; cursor: pointer;">
                                ${idx === 0 ? 'Bruto' : idx + 'ª FN'}
                            </button>
                        `).join('')}
                    </div>
                </div>

                <p style="font-size: 13.5px; color: #475569; margin-bottom: 16px; line-height: 1.6;">
                    ${stepData.rule}
                </p>

                <div class="data-table-wrapper" style="margin: 12px 0;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                ${stepData.columns.map(col => `<th>${col}</th>`).join('')}
                            </tr>
                        </thead>
                        <tbody>
                            ${stepData.rows.map(row => `
                                <tr>
                                    ${row.map(cell => `<td>${cell}</td>`).join('')}
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 14px; padding: 12px 16px; background: ${this.currentStep === 3 ? '#ecfdf5' : '#eff6ff'}; border: 1px solid ${this.currentStep === 3 ? '#a7f3d0' : '#bfdbfe'}; border-radius: 8px; font-size: 13px; color: ${this.currentStep === 3 ? '#065f46' : '#1e40af'}; line-height: 1.5;">
                    ${stepData.explanation}
                </div>
            </div>
        `;

        this.container.querySelectorAll('.norm-step-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                this.currentStep = parseInt(btn.dataset.step);
                this.render();
            });
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const players = document.querySelectorAll('.normalization-step-player');
    players.forEach(el => new NormalizationStepPlayer(el.id));
});
