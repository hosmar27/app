<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacotes</title>
    <link href="../css/pacotes.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
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

          $nome  = $_POST["nome"];
          $valor  = $_POST["valor"];
          $imagem = $_POST["imagem"];

          // Executar consulta
          $sql = $pdo->prepare("SELECT imagem, nome, valor FROM pacote") ;
          $comando = $sql->execute();

          if ($comando->num_rows > 0) {
              // Loop através dos resultados da consulta
              while ($row = $comando->fetch_assoc()) {
                  $imagem = $row["imagem"];
                  $nome = $row["nome"];
                  $valor = $row["valor"];

                  // Faça algo com os valores e imagem, como exibi-los na página
                  echo '<img src="' . $imagem . '" alt="Imagem" /><br>';
                  echo "nome: " . $nome . "<br>";
                  echo "valor: " . $valor . "<br>";
              }
          } else {
              echo "0 resultados encontrados";
          }

          header("Location: ../html/index.html");
      ?>

      <div class="pacote" id="pacote_botao_2" onclick="bct('pacote2')">
        <img src="../imagens/pacote1.png" width="100%" height="70%">
        pacote 2
      </div>

     <div class="pacote" id="pacote_botao_3" onclick="bct('pacote3')">
      <img src="../imagens/pacote1.png" width="100%" height="70%">
      pacote 3
    </div>

    <div class="pacote" id="pacote_botao_4" onclick="bct('pacote4')">
      <img src="../imagens/pacote1.png" width="100%" height="70%">
      pacote 4
    </div>

   <div class="aviso" id="aviso">
    <p id="nome">pedido</p>
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
  function bct(x){

    document.getElementById('aviso').style.display = 'flex';
    document.getElementById('nome').innerHTML = x;
    document.getElementById('imagem').innerHTML = x;
  }

  function pnss(){

    document.getElementById('aviso').style.display = 'none';
  }
</script>
</html>