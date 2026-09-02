<?php
// Configurações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'aluno140_metal';
$usuario = 'root';
$senha = ''; // Altere para a senha do seu servidor MySQL

header('Content-Type: application/json; charset=utf-8');

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Recebe o termo digitado na tela
    $termoBusca = isset($_GET['q']) ? trim($_GET['q']) : '';
    
    // Método A (SQL Puro): A consulta com filtro e ordenação
    // Usamos o LIKE para simular o "efeito Google" de busca parcial
    $sql = "SELECT nome_peca, preco_unitario 
            FROM peca 
            WHERE nome_peca LIKE :termo 
            ORDER BY preco_unitario ASC";
            
    $stmt = $conexao->prepare($sql);
    // Adiciona os curingas (%) antes e depois da palavra para buscar em qualquer parte do texto
    $stmt->bindValue(':termo', '%' . $termoBusca . '%');
    $stmt->execute();
    
    // Pega todos os resultados e transforma em um formato que o JavaScript entenda (JSON)
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultados);
} catch(PDOException $e) {
    // Fallback didático para visualização imediata caso o banco local esteja offline
    $catalogoPecas = [
        ['nome_peca' => 'Pistão Forjado 85mm', 'preco_unitario' => '249.90'],
        ['nome_peca' => 'Biela de Aço Forjado', 'preco_unitario' => '185.00'],
        ['nome_peca' => 'Pastilha de Freio Cerâmica', 'preco_unitario' => '89.90'],
        ['nome_peca' => 'Disco de Freio Ventilado 280mm', 'preco_unitario' => '160.00'],
        ['nome_peca' => 'Amortecedor Pressurizado a Gás', 'preco_unitario' => '210.00'],
        ['nome_peca' => 'Disco de Embreagem Heavy Duty', 'preco_unitario' => '320.00'],
        ['nome_peca' => 'Correia Dentada', 'preco_unitario' => '85.50']
    ];
    $termo = isset($_GET['q']) ? mb_strtolower(trim($_GET['q'])) : '';
    $filtrados = [];
    foreach ($catalogoPecas as $peca) {
        if ($termo === '' || strpos(mb_strtolower($peca['nome_peca']), $termo) !== false) {
            $filtrados[] = $peca;
        }
    }
    echo json_encode($filtrados);
}
?>
