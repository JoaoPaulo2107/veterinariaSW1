<?php
// 🔧 Configurações do banco
$host = 'localhost';
$dbname = 'veterinaria';
$user = 'root';
$pass = '';

try {
    // ✅ Adicionado charset UTF-8
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

    // ✅ Exibe erros do PDO como exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // ❌ Em produção, evite exibir detalhes do erro — use log.
    die('Erro na conexão com o banco de dados: ' . $e->getMessage());
}
?>
