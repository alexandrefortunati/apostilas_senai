/**
 * Interactive DER / MER Relational Schema Visualizer
 * SENAI-SP • Banco de Dados
 * Permite aos alunos visualizar diagramas relacionais (DER) com tabelas, PK/FK e relacionamentos.
 */

const SAMPLE_DER_SCHEMAS = {
    pizzaria: {
        title: "Esquema Relacional Lógico: Pizzaria SENAI",
        tables: [
            {
                name: "clientes",
                columns: [
                    { name: "id_cliente", type: "INT AUTO_INCREMENT", pk: true },
                    { name: "nome", type: "VARCHAR(100) NOT NULL" },
                    { name: "telefone", type: "VARCHAR(20) NOT NULL" },
                    { name: "endereco", type: "VARCHAR(150)" },
                    { name: "bairro", type: "VARCHAR(50)" },
                    { name: "cidade", type: "VARCHAR(50)" },
                    { name: "uf", type: "CHAR(2) DEFAULT 'SP'" }
                ]
            },
            {
                name: "pedidos",
                columns: [
                    { name: "id_pedido", type: "INT AUTO_INCREMENT", pk: true },
                    { name: "id_cliente", type: "INT NOT NULL", fk: true, ref: "clientes(id_cliente)" },
                    { name: "data_pedido", type: "DATETIME DEFAULT NOW()" },
                    { name: "valor_total", type: "DECIMAL(10,2) NOT NULL" },
                    { name: "status", type: "ENUM('Aguardando','Em Producao','Entregue')" }
                ]
            },
            {
                name: "pizzas",
                columns: [
                    { name: "id_pizza", type: "INT AUTO_INCREMENT", pk: true },
                    { name: "nome_pizza", type: "VARCHAR(80) NOT NULL UNIQUE" },
                    { name: "categoria", type: "VARCHAR(40)" },
                    { name: "preco_base", type: "DECIMAL(10,2) NOT NULL" }
                ]
            },
            {
                name: "itens_pedido",
                columns: [
                    { name: "id_item", type: "INT AUTO_INCREMENT", pk: true },
                    { name: "id_pedido", type: "INT NOT NULL", fk: true, ref: "pedidos(id_pedido)" },
                    { name: "id_pizza", type: "INT NOT NULL", fk: true, ref: "pizzas(id_pizza)" },
                    { name: "quantidade", type: "INT NOT NULL DEFAULT 1" },
                    { name: "preco_unitario", type: "DECIMAL(10,2) NOT NULL" }
                ]
            }
        ]
    }
};

class DerSchemaViewer {
    constructor(containerId, schemaKey = 'pizzaria') {
        this.container = document.getElementById(containerId);
        if (!this.container) return;
        this.schema = SAMPLE_DER_SCHEMAS[schemaKey] || SAMPLE_DER_SCHEMAS.pizzaria;
        this.render();
    }

    render() {
        let html = `
            <div class="der-visualizer-card">
                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e2e8f0; padding-bottom: 12px;">
                    <div>
                        <h4 style="font-family: var(--font-heading); font-size: 16px; color: var(--text-primary); margin: 0;">
                            ${this.schema.title}
                        </h4>
                        <span style="font-size: 12px; color: var(--text-muted);">
                            Diagrama de Entidade-Relacionamento Lógico (DER) com integridade referencial PK ↔ FK
                        </span>
                    </div>
                    <span class="badge-tag accent" style="font-size: 11px;">4 Tabelas Relacionadas</span>
                </div>

                <div class="der-grid">
                    ${this.schema.tables.map(table => `
                        <div class="der-table-box" data-table="${table.name}">
                            <div class="der-table-header">
                                <span class="table-name">📁 ${table.name}</span>
                                <span style="font-size: 11px; color: #94a3b8; font-weight: normal;">${table.columns.length} colunas</span>
                            </div>
                            <div class="der-column-list">
                                ${table.columns.map(col => `
                                    <div class="der-column-item ${col.pk ? 'is-pk' : ''} ${col.fk ? 'is-fk' : ''}">
                                        <div style="display: flex; align-items: center;">
                                            ${col.pk ? '<span class="pk-tag">PK</span>' : ''}
                                            ${col.fk ? `<span class="fk-tag" title="Chave Estrangeira aponta para ${col.ref}">FK</span>` : ''}
                                            <strong>${col.name}</strong>
                                        </div>
                                        <span class="col-type">${col.type}</span>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                    `).join('')}
                </div>

                <div style="margin-top: 18px; padding: 12px 16px; background: #f8fafc; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 12.5px; color: #475569; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                    <div style="display: flex; gap: 16px; align-items: center;">
                        <span><strong style="color: #b91c1c;">PK:</strong> Primary Key (Identificador Único)</span>
                        <span><strong style="color: #0369a1;">FK:</strong> Foreign Key (Chave Estrangeira / Ligação)</span>
                    </div>
                    <div style="color: #64748b; font-size: 11.5px;">
                        Relacionamentos: <code>clientes (1,N) ↔ (1,1) pedidos</code> • <code>pedidos (1,N) ↔ (1,1) itens_pedido</code>
                    </div>
                </div>
            </div>
        `;

        this.container.innerHTML = html;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const viewers = document.querySelectorAll('.der-schema-viewer');
    viewers.forEach(el => new DerSchemaViewer(el.id, el.dataset.schema || 'pizzaria'));
});
