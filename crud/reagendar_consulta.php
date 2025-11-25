<?php
require_once '../includes/conexao.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../index.php');
    exit;
}

if (isset($_POST['id_consulta'], $_POST['nova_data'], $_POST['novo_horario'])) {
    $id = $_POST['id_consulta'];
    $data = $_POST['nova_data'];
    $horario = $_POST['novo_horario'];

    try {
        $sql = "UPDATE Consulta 
                SET Data_consulta = :data, Horario = :horario, Status = 'Pendente'
                WHERE ID_consulta = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':data' => $data,
            ':horario' => $horario,
            ':id' => $id
        ]);

        header('Location: ../consulta.php?msg=Consulta reagendada com sucesso!');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao reagendar: " . $e->getMessage();
    }
} else {
    echo "Campos obrigatórios não informados.";
}
?>
