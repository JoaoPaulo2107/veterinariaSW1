<?php
require_once __DIR__ . '/../includes/conexao.php';

if (isset($_GET['id'], $_GET['acao'])) {
    $id = $_GET['id'];
    $acao = $_GET['acao'];

    if ($acao === 'aceitar') {
        $novoStatus = 'Aceita';
    } elseif ($acao === 'recusar') {
        $novoStatus = 'Recusada';
    } else {
        header("Location: ../dashboard_adm.php?msg=Ação inválida!");
        exit;
    }

    $sql = "UPDATE consulta SET Status = :status WHERE ID_consulta = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':status', $novoStatus);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: ../dashboard_adm.php?msg=Consulta atualizada com sucesso!");
    exit;
} else {
    header("Location: ../dashboard_adm.php?msg=Erro: parâmetros inválidos.");
    exit;
}
?>
