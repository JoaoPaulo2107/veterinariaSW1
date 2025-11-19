<?php
session_start();
require_once __DIR__ . '/../includes/conexao.php';

// validação básica
if (!isset($_POST['nome'], $_POST['telefone'], $_POST['cpf'], $_POST['email'], $_POST['senha'])) {
    echo "Dados incompletos.";
    exit;
}

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senhaHash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

// INSERIR USUÁRIO
$sql = "INSERT INTO usuario (Nome, Telefone, CPF, Email, Senha)
        VALUES (:nome, :telefone, :cpf, :email, :senha)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senhaHash);

if ($stmt->execute()) {

    // pega o ID gerado
    $idInserido = $pdo->lastInsertId();

    // cria sessão automaticamente após cadastro
    session_regenerate_id(true);
    $_SESSION['usuario_id'] = $idInserido;
    $_SESSION['usuario_nome'] = $nome;
    $_SESSION['usuario_email'] = $email;

    header("Location: ../cadastro_sucesso.php");
    exit;
} else {
    echo "Erro ao cadastrar usuário.";
    exit;
}
?>
    
    