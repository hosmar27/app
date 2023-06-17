<?php

    $nome = $_POST["nome"]; //Pega o input
    $senha = $_POST["senha"];

    include("conecta.php"); //Conecta com o banco de dados 

    $comando = $pdo->prepare("SELECT * FROM usuario WHERE nome = '$nome' and senha = '$senha' ");
    $resultado = $comando->execute();
    $n = 0;
    while( $linhas = $comando->fetch() )
    {
        $n = 1;
        $admin = $linhas["admin"];
    }

    if($n == 0)
    {
        header("Location: index.html");
    }

    if($n == 1)
    {
        if($admin == "s")
        {
            header("Location: admin.html");
        }
        else
        {
            header("Location: ../html/index.html");
        }
    }

?>