<?php
session_start();
require_once "includes/conexao.php";

if (!isset($_POST['id_consulta'], $_POST['motivo'])) {
    die("Erro: Dados incompletos.");
}

$id = $_POST['id_consulta'];
$motivo = $_POST['motivo'];

try {
    $sql = "UPDATE consulta
            SET status = 'Cancelado pelo Cliente',
                motivo_cancelamento = :motivo
            WHERE id_consulta = :id";   // <-- ALTERADO AQUI

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':motivo' => $motivo,
        ':id' => $id
    ]);

    header("Location: dashboard_cliente.php?msg=cancelado");
    exit;

} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}
