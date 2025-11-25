<?php
require_once '../includes/conexao.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../index.php');
    exit;
}

if (isset($_POST['id_consulta'], $_POST['motivo'])) {
    $id = $_POST['id_consulta'];
    $motivo = $_POST['motivo'];

    try {
        // Atualiza status para Cancelada
        $sql = "UPDATE consulta 
                SET Status = 'Cancelada', motivo_cancelamento = :motivo
                WHERE ID_consulta = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':motivo' => $motivo,
            ':id' => $id
        ]);

        header('Location: ../consulta.php?msg=Consulta cancelada com sucesso!');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao cancelar: " . $e->getMessage();
    }
} else {
    echo "Campos obrigatórios não informados.";
}
?>
