<?php
session_start();

include("conecta.php"); // Conecta com o banco de dados

$email = $_POST["email"]; // Pega o input
$senha = $_POST["senha"];

// Realizar a consulta SQL para encontrar usuario e etc.
$comando = $pdo->prepare("SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'");
$comando->execute();
$resultado = $comando->fetch();

// PEGAR VALORES PARA ARMAZENAR EM SESSÃO E EXIBIR PELA PÁGINA:
if($resultado)
{
    $id = $resultado['id'];
    $nome = $resultado['nome'];
}

// ID para realizar consultas baseadas no ID usuário:
$_SESSION['id'] = $id;

$admin = $resultado["admin"];

if ($comando->rowCount() > 0) {
    // Consulta SQL obteve resultado (atribuição de sessões):
    $_SESSION['logado'] = true;
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;

    // Arruma o admin depois Osmar porra
    if ($admin == "s") {
        header("Location: ../php/admin.php");
        exit();
    } else {
        header("Location: ../php/index.php");
        exit();
    }
} else {
    header("Location: ../html/login.html");
    exit();
}
?>
