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

  $sql = $pdo->prepare("SELECT imagem, nome, valor FROM pacote");
  $sql->execute();

  while ($linhas = $sql->fetch(PDO::FETCH_ASSOC)) {
      $imagem = $linhas["imagem"];
      $nome = $linhas["nome"];
      $valor = $linhas["valor"];
      echo "
      <div class='pacote' onclick=\"bct('pacote barbados','500')\">
        <img src='" . base64_encode($imagem) . "' alt='imagem' /><br>
        $nome
        $valor
      </div>";
  }
?>

  </div>

   <div class="aviso" id="aviso">
    <p id="nome">pedido</p>
    <p id="preco">pedido</p>
    <button id="cancelar_pacote_1" onclick="pnss()">
      cancelar
    </button>
   </div>

      </div>
    </div>
  </div>
</div>

</body>
<script>
  function bct(x,y){

    document.getElementById('aviso').style.display = 'flex';
    document.getElementById('nome').innerHTML = x;
    document.getElementById('preco').innerHTML = y;
  }

  function pnss(){

    document.getElementById('aviso').style.display = 'none';
  }
</script>
</html>