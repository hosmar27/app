<?php
include("conecta.php");

$id_pacote = $_GET["id_pacote"];

// Mensagem caso o usuário não tenha selecionado nada para o carrinho:
if (!isset($id_pacote)) {
    echo ("<script type='text/javascript'>");
    echo ("window.alert('Nada no carrinho!');");
    echo ("window.location.replace('index.php');");
    echo ("</script>");
}

$comando = $pdo->prepare("SELECT * FROM pacotes WHERE id = :id_pacote");
$comando->bindParam(":id_pacote", $id_pacote);
$resultado = $comando->execute();
$dados_pacote = $comando->fetch();

$nome_pacote = $dados_pacote["nome"];
$valor_pacote = $dados_pacote["valor"];
$imagem_pacote = $dados_pacote["imagem"];
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

</head>
<body>
    <header>
      <div class="esq">
        <div class="pqp">
          <nav role="navigation">
            <div id="menuToggle">
              
          
              <input type="checkbox" />
              
            
            
              <span></span>
              <span></span>
              <span></span>
              
           
              <ul id="menu">
                <a href="cadastro.html"><li>Cadastro</li></a>
                <a href="pacotes.php"><li>Pacotes</li></a>
                <a href="#"><li>Suporte</li></a>
                <a href="index.html"><li>Inicio</li></a>
                
              </ul>
            </div>
          </nav>

        </div>
        <div class="pqp_direita">
          <h1>
            Trailermarine
          </h1>
        </div>
       
      </div>  
        <div class="dir">
            <a href="../php/pacotes.php"><img src="../imagens/submariano.png"></a>
            <a href="../html/login.html"><img src="../imagens/icone (3).png" class="perfil" > </a>
        </div>
    </header>
    </div>

    <datafield class="dadosperfil">
        <legend> Dados Pessoais</legend>
        <br>
        Nome: <input type="text" id="nome">
        <br> <br>
        @Email: <input type="text" id="email">
        <br> <br>
        N°número: <input type="text" id="numero">
        <br> <br>
        <a href="https://www.google.com.br/?safe=active&ssui=on" target="_blank">
            dados do cadastro
        </a>
    </datafield>

    <div class="meucarrinho">
        <div class="organizatitulo">
            <img src="../imagens/meucarrinho.png" width="50px">
            <a style="font-size: 35px;">Meu carrinho</a>
            <img src="../imagens/meucarrinho.png" width="50px">
        </div>

        <div class="organizaitens">
            <div class="imgseadd">
                <br>
                <a><?php echo $nome_pacote; ?></a>
                <br>
                <img style="height: 192px; width: 262px" src="data:image/jpeg;base64,<?php echo base64_encode($imagem_pacote); ?>" alt="imagem" /><br>

                <a>Valor R$: <?php echo $valor_pacote; ?></a>
                <div class="organizabotao">
                    <a href="pacotes.php"><button class="pagar">Voltar</button></a>
                    <a><button class="pagar">Comprar</button></a>
                </div>
            </div>

            <div class="adicional">
                <br>
                <a>
                    adicionais:
                </a>
                <ul>
                    <?php
                    include("conecta.php");

                    $id_pacote = $_GET["id_pacote"];

                    $comando = $pdo->prepare("SELECT * FROM pacotes WHERE id = :id_pacote");
                    $comando->bindParam(":id_pacote", $id_pacote, PDO::PARAM_INT);
                    $comando->execute();
                    $pacote = $comando->fetch();

                    $detalhes_adicionais = $pacote["adicionais"];

                    if (!empty($detalhes_adicionais)) {
                        $detalhes = explode(",", $detalhes_adicionais);

                        echo "<ul>";
                        foreach ($detalhes as $detalhe) {
                            echo "<li>$detalhe</li>";
                        }
                        echo "</ul>";
                    }
                    ?>

                </ul>
            </div>

        </div>
    </div>

</body>

</html>