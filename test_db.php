<?php
require_once __DIR__ . '/banco_dados_portal/app/models/Database.php';

try {
    $pdo = Database::getConnection();
    $stmt = $pdo->prepare("SELECT id_usuario, nome, email, nivel, status FROM usuarios_portal WHERE email = :email");
    $stmt->execute([':email' => 'admin@senai.br']);
    $user = $stmt->fetch();
    echo "SUCCESS: " . json_encode($user);
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
