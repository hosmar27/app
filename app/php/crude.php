<?php
    include("conecta.php");

    $usuario  = $_POST["usuario"];
    $senha       = $_POST["senha"];
    $admin      = $_POST["admin"];

    if(isset($_POST["INSERIR"]))
    {
        $comando = $pdo->prepare("INSERT INTO alunos VALUES($usuario, '$senha', $admin)");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }

    if(isset($_POST["EXCLUIR"]))
    {
        $comando = $pdo->prepare("DELETE FROM alunos WHERE usuario=$usuario");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }
    
    if(isset($_POST["ALTERAR"]))
    {
        $comando = $pdo->prepare("UPDATE alunos SET senha='$senha', admin=$admin WHERE usuario=$usuario");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }

    if(isset($_POST["LISTAR"]))
    {
        $comando = $pdo->prepare("SELECT * FROM alunos");
        $resultado = $comando->execute();
        
        while ($linhas = $comando->fetch())
        {
            $m = $linhas["usuario"];
            $n = $linhas["senha"];
            $i = $linhas["admin"];
            echo("usuario: $m senha: $n admin: $i <br>");
        }
    }
?>