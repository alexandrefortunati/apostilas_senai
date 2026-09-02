<?php
/**
 * API Backend: busca.php (Método A - SQL Puro com PDO)
 * Recebe o termo 'q' via GET, executa a consulta DQL no MySQL e retorna JSON.
 */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');

$host = 'localhost';
$dbname = 'aluno140_metal';
$usuario = 'root';
$senha = '';

$termoBusca = isset($_GET['q']) ? trim($_GET['q']) : '';

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Método A (SQL Puro): A consulta com filtro e ordenação
    $sql = "SELECT nome_peca, preco_unitario 
            FROM peca 
            WHERE nome_peca LIKE :termo 
            ORDER BY preco_unitario ASC";
            
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':termo', '%' . $termoBusca . '%');
    $stmt->execute();
    
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultados);
    exit;
} catch (Exception $e) {
    // Fallback didático com os dados oficiais da AutoMetal Brasil caso o banco remoto/local não esteja ativo
    $catalogoPecas = [
        ['nome_peca' => 'Pistão Forjado 85mm', 'preco_unitario' => '249.90'],
        ['nome_peca' => 'Biela de Aço Forjado', 'preco_unitario' => '185.00'],
        ['nome_peca' => 'Pastilha de Freio Cerâmica', 'preco_unitario' => '89.90'],
        ['nome_peca' => 'Disco de Freio Ventilado 280mm', 'preco_unitario' => '160.00'],
        ['nome_peca' => 'Amortecedor Pressurizado a Gás', 'preco_unitario' => '210.00'],
        ['nome_peca' => 'Disco de Embreagem Heavy Duty', 'preco_unitario' => '320.00'],
        ['nome_peca' => 'Correia Dentada', 'preco_unitario' => '85.50'],
        ['nome_peca' => 'Platô de Embreagem 220mm', 'preco_unitario' => '289.00'],
        ['nome_peca' => 'Vela de Ignição Iridium', 'preco_unitario' => '65.90']
    ];

    $termo = mb_strtolower($termoBusca);
    $filtrados = [];

    foreach ($catalogoPecas as $peca) {
        if ($termo === '' || strpos(mb_strtolower($peca['nome_peca']), $termo) !== false) {
            $filtrados[] = $peca;
        }
    }

    usort($filtrados, function($a, $b) {
        return floatval($a['preco_unitario']) <=> floatval($b['preco_unitario']);
    });

    echo json_encode($filtrados);
    exit;
}
