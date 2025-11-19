<?php
require_once __DIR__ . '/includes/conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM Funcionario WHERE ID_veterinario = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();

header("Location: funcionarios.php");
exit;
