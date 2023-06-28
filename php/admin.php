<?php
  session_start();

  if(!isset($_SESSION['nome'])) {
    echo("<script type='text/javascript'>");
      echo("window.alert('SAI DO ADM');");
    echo("</script>");
  }
?>

<html lang="pt-br">

<head>
  <title>Admin Trailermarine</title>
</head>

<body>
  <form action="inserir_pacote.php" method="POST" enctype="multipart/form-data">
    <input type="text" required="" name="nome_pacote" placeholder="Nome">
    <input type="text" required="" name="valor_pacote" placeholder="Valor">
    <input type="text" required="" name="descricao_pacote" placeholder="Descrição">
    <input type="file" name="foto_pacote" accept="image/*">
    <input type="submit" value="Enviar">
  </form>
  <?php
    // DA UM ECHO TENDO EM VISTA:
      /*
        1. Consulte o banco de dados ($consulta = $pdo->prepare("SELECT * FROM pacotes"))
        2. Crie uma repetição com while pegando os valores da consulta (while($linhas = $consulta->fetch()))
        3. Pega os valores das $linhas e atribua para varíaveis que serão exibidas na div
        4. Dentro do while imprima as divs html, tlgd? e só criar a div
      */
  ?>
</body>

</html>