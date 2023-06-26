<?php
    include("conecta.php");

    $comando = $pdo->prepare("SELECT * FROM pacotes");
    $resultado = $comando->execute();
    
    while ($linhas = $comando->fetch() )
    {
        $id = $linhas["id"];
        $imagem = $linhas["imagem"];
        $nome = $linhas["nome"]; 
        $valor = $linhas["valor"]; 
    }

    $id_pacote=$_GET["id_pacote"];

    $comando = $pdo->prepare("SELECT * FROM pacotes WHERE id = '$id_pacote'");
    $resultado = $comando->execute();
    $pegar_nome = $comando->fetch();
    $nome_pacote = $pegar_nome["valor"];
    echo $nome_pacote;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" type="text/css" href="../css/carrinho.css">
</head>
<body>  
 
<div class="tiradecima">
    <nav class="navegador" role="navigation">
        <div id="menuToggle">
          <input type="checkbox"/>
          <span></span>
          <span></span>
          <span></span>
          <ul id="menu">
            <a href="#"><li>Home</li></a>
            <a href="#"><li>About</li></a>
            <a href="#"><li>Info</li></a>
            <a href="#"><li>Contato</li></a>
            <a href="https://erikterwan.com/" target="_blank"><li>Show me more</li></a>
          </ul>
        </div>
    </nav>
    <div class="carrinho">
        <a href="carrinho.php" target="_blank">
            <img src="../imagens/carrinho.png" width="130px">
        </a>
    </div> 
    <div class="perfil">      
        <img src="../imagens/perfil.png" width="100px">
    </div> 
    
</div> 

<datafield class="dadosperfil"> 
        <legend> Dados Pessoais</legend>
        <br>
        Nome: <php echo($nome); ?>
        <br> <br>
        @Email: <input type=”text” id=”email”>
        <br> <br>
        N°número: <input type=”text” id=”numero”>
        <br> <br>
        <a href="https://www.google.com.br/?safe=active&ssui=on" target="_blank">
            dados do cadastro
        </a>
</datafield> 

<div class="meucarrinho">

    <div class="organizatitulo">
        <img src="../imagens/meucarrinho.png" width="50px">
        <a>
            Meu carrinho
        </a>
        <img src="../imagens/meucarrinho.png" width="50px">
    </div>

</div>

</body>
</html>