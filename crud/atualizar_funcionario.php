<?php
require_once __DIR__ . '/../includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    $stmt->bindParam(':CRMV', $_POST['CRMV']);
    $stmt->bindParam(':Nome', $_POST['Nome']);
    $stmt->bindParam(':Email', $_POST['Email']);
    $stmt->bindParam(':Telefone', $_POST['Telefone']);
    $stmt->bindParam(':Especialidade', $_POST['Especialidade']);
    $stmt->bindParam(':Sexo', $_POST['Sexo']);
    $stmt->bindParam(':Data_Nascimento', $_POST['Data_Nascimento']);
    $stmt->bindParam(':CPF', $_POST['CPF']);
    $stmt->bindParam(':ID_veterinario', $_POST['ID_veterinario']);

    $stmt->execute();

    // ✅ Redireciona para a lista com mensagem
    header("Location: ../funcionarios.php?msg=Funcionário atualizado com sucesso!");
    exit;
} else {
    header("Location: ../funcionarios.php?msg=Erro: método inválido");
    exit;
}
?>
