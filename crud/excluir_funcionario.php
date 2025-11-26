<?php
require_once __DIR__ . '/../includes/conexao.php';

if (!isset($_GET['id'])) {
    header('Location: ../funcionarios.php?msg=ID inválido');
    exit;
}

$id = $_GET['id'];

try {
    // Exclui o funcionário mesmo se houver consultas
    $sql = "DELETE FROM funcionario WHERE ID_veterinario = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    header('Location: ../funcionarios.php?msg=Funcionário excluído com sucesso!');
    exit;
} catch (PDOException $e) {
    header('Location: ../funcionarios.php?msg=Erro ao excluir funcionário: ' . urlencode($e->getMessage()));
    exit;
}
