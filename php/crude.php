<?php
    include("conecta.php");

    $nome  = $_POST["nome"];
    $cpf  = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $comando = $pdo->prepare("INSERT INTO usuario (nome, cpf, email, senha) VALUES(:nome,:cpf, :email, :senha)");

    $comando->bundParam(':nome',$nome);
    $comando->bundParam(':cpf',$cpf);
    $comando->bundParam(':email',$email);
    $comando->bundParam(':senha',$senha);

    $resultado = $comando->execute();
    header("Location: ../html/index.html");

?>