<?php
require_once __DIR__ . '/includes/conexao.php';

$sql = "INSERT INTO Funcionario (CRMV, Nome, Email, Telefone, Especialidade, Sexo, Data_Nascimento, CPF)
        VALUES (:CRMV, :Nome, :Email, :Telefone, :Especialidade, :Sexo, :Data_Nascimento, :CPF)";

$stmt = $pdo->prepare($sql);
$stmt->execute($_POST);

header("Location: funcionarios.php");
exit;
