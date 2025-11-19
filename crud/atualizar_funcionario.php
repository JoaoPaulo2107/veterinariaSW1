<?php
require_once __DIR__ . '/includes/conexao.php';

$sql = "UPDATE Funcionario SET 
            CRMV = :CRMV,
            Nome = :Nome,
            Email = :Email,
            Telefone = :Telefone,
            Especialidade = :Especialidade,
            Sexo = :Sexo,
            Data_Nascimento = :Data_Nascimento,
            CPF = :CPF
        WHERE ID_veterinario = :ID_veterinario";

$stmt = $pdo->prepare($sql);
$stmt->execute($_POST);

header("Location: funcionarios.php");
exit;
