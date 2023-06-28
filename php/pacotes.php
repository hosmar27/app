<?php 

  if((!isset($_SESSION['email']) == true ) and (!isset($_SESSION['senha']) == true))
      {
          unset($_SESSION['email']);
          header('Location: ../html/login.html');
      }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacotes</title>
    <link href="../css/pacotes.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400;700&display=swap" rel="stylesheet">
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
                <a href="pagina5.html"><li>Cadastro</li></a>
                <a href="#"><li>About</li></a>
                <a href="#"><li>Info</li></a>
                <a href="#"><li>Contact</li></a>
                
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
        
      </div>
        <div class="dir">
            <img src="../imagens/submariano.png">
            <img src="../imagens/icone (3).png" class="perfil" >
        </div>
      </div>  
    </header>
      
  </div>
<div>
  <div class="meio">
    <div class="balls">
      <h1 class="h1_pacotes">Pacotes:</h1> 

<div class="bals">

<?php

include("../php/conecta.php");



$sql = $pdo->prepare("SELECT * FROM pacotes");
$sql->execute();

while ($linhas = $sql->fetch()) {
  $id = $linhas["id"];
  $imagem = $linhas["imagem"];
  $nome = $linhas["nome"];
  $valor = $linhas["valor"];
  $descricao = $linhas["descricao"];
  echo "
  <div class='pacote' onclick=\"bct('$nome','R$ $valor','$descricao','$id')\">
    <img src='data:image/jpeg;base64," . base64_encode($imagem) . "' alt='imagem' /><br>
    $nome
    <br>
    R$ $valor
  </div>
  <div class=\"aviso\" id=\"aviso_$id\">

    <p id=\"nome_$id\">pedido</p>
    <p id=\"preco_$id\">pedido</p>
    <br>
    <p style='font-size: 20px;' id='descricao_$id'>pedido</p>
    <br>

    <div class='botao'>
    <a href=\"carrinho.php?id_pacote=$id\">
      <button class='botao' onclick=\"enviar_id($id)\" id=\"comprar\">comprar</button>
    </a>
    <button id=\"cancelar_pacote_$id\" onclick=\"pnss('$id')\">
      cancelar
    </button>
    </div>
    
  </div>";
}
?>

  </div>
  

      </div>
    </div>
  </div>
</div>

</body>
<script>
  function bct(x, y, z, id) {
  var avisoID = "aviso_" + id;
  var nomeID = "nome_" + id;
  var precoID = "preco_" + id;
  var descricaoID = "descricao_" + id;

  document.getElementById(avisoID).style.display = 'flex';
  document.getElementById(avisoID).style.position = 'fixed';
  document.getElementById(nomeID).innerHTML = x;
  document.getElementById(precoID).innerHTML = y;
  document.getElementById(descricaoID).innerHTML = z;
}

function pnss(id) {
  var avisoID = "aviso_" + id;
  document.getElementById(avisoID).style.display = 'none';
}

  function enviar_id(x){
  window.open("carrinho.php?id_pacote="+x,"_self")
  }
</script>
</html>