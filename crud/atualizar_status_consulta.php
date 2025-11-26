<?php
require_once __DIR__ . '/../includes/conexao.php';

if (!isset($_GET['id']) || !isset($_GET['acao'])) {
    header('Location: ../dashboard_adm.php?msg=Erro: parâmetros inválidos.');
    exit;
}

$id = $_GET['id'];
$acao = $_GET['acao'];

$status = '';

if ($acao === 'aceitar') {
    $status = 'Aceita';
} elseif ($acao === 'recusar') {
    $status = 'Recusada';
} else {
    header('Location: ../dashboard_adm.php?msg=Ação inválida.');
    exit;
}

try {
    $sql = "UPDATE consulta SET Status = :status WHERE ID_consulta = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':status' => $status, ':id' => $id]);

    header('Location: ../dashboard_adm.php?msg=Consulta ' . strtolower($status) . ' com sucesso!');
    exit;
} catch (PDOException $e) {
    header('Location: ../dashboard_adm.php?msg=Erro: ' . urlencode($e->getMessage()));
    exit;
}
