<?php
require_once __DIR__ . '/../includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO Funcionario (CRMV, Nome, Email, Telefone, Especialidade, Sexo, Data_Nascimento, CPF)
            VALUES (:CRMV, :Nome, :Email, :Telefone, :Especialidade, :Sexo, :Data_Nascimento, :CPF)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':CRMV', $_POST['CRMV']);
    $stmt->bindParam(':Nome', $_POST['Nome']);
    $stmt->bindParam(':Email', $_POST['Email']);
    $stmt->bindParam(':Telefone', $_POST['Telefone']);
    $stmt->bindParam(':Especialidade', $_POST['Especialidade']);
    $stmt->bindParam(':Sexo', $_POST['Sexo']);
    $stmt->bindParam(':Data_Nascimento', $_POST['Data_Nascimento']);
    $stmt->bindParam(':CPF', $_POST['CPF']);
    $stmt->execute();

    header("Location: ../funcionarios.php?msg=Funcionário cadastrado com sucesso!");
    exit;
} else {
    header("Location: ../funcionarios.php?msg=Erro: método inválido!");
    exit;
}
?>
