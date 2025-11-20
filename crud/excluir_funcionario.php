<?php
require_once __DIR__ . '/../includes/conexao.php';

$id = $_GET['id'];

try {
    $sql = "DELETE FROM Funcionario WHERE ID_veterinario = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    header("Location: ../funcionarios.php?msg=Funcionário excluído com sucesso!");
    exit;

} catch (PDOException $e) {
    // Verifica se é erro de integridade (chave estrangeira)
    if ($e->getCode() == 23000) {
        header("Location: ../funcionarios.php?msg=Erro: não é possível excluir este funcionário pois há consultas vinculadas.");
        exit;
    } else {
        header("Location: ../funcionarios.php?msg=Erro ao excluir funcionário: " . urlencode($e->getMessage()));
        exit;
    }
}
?>
