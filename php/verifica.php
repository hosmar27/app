<?php
session_start();

include("conecta.php"); // Conecta com o banco de dados

$email = $_POST["email"]; // Pega o input
$senha = $_POST["senha"];
$admin = $_POST["admin"];

$comando = $pdo->prepare("SELECT * FROM usuario WHERE email = '$email' and senha = '$senha' ");
$comando->execute();

if ($comando->rowCount() > 0) {
    $_SESSION['logado'] = true; // Define o status de logado como true
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;

    while ($linhas = $comando->fetch()) {
        $admin = $linhas["admin"];
    }

    if ($admin == "s") {
        header("Location: ../php/admin.php");
    } 
    
    else ($admin == "n");{
        header("Location: ../html/index.php");
    }
} 
    else {
        header("Location: ../html/login.html");
    exit;
}
?>