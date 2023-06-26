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
        <a href="carrinho.html" target="_blank">
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
        Nome: <input type=”text” id=”nome”>
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

    <div class="organizaitens">
        <div class="imgseadd">
            <br>
            <a>
                Pacote:
            </a>
            <br>
            <img src="../imagens/fotos (3).png" width="150px">
            <br>
            <a>
                Pacote para Havaí
            </a>
            <br><br>
            <p>
                 Família R$: 15000,00
            </p>
            <div class="organizabotao">
                <div class="pagar" href="https://www.google.com.br/?safe=active&ssui=on" target="_blank">
                    <p>
                        voltar
                    </p>
                </div>
                <div class="pagar">
                    <p>
                        comprar
                    </p>
                </div>
            </div>
        </div>

        <div class="adicional">
            <br>
            <a>
                adicionais:
            </a>
            <p>
                -Comidas R$200,00
                <br><br>
                -Bebidas R$350,00
                <br><br>
                -Roupas de cama R$100,00
                <br><br>
                 -itens higiene R$100,00
                 <br><br>
                 Total: R$15750,00
            </p>
        </div>
    </div>
</div>

</body>
</html>