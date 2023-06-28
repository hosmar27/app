<?php
  include("conecta.php");
  session_start();

  // Atribuir as variáveis para as sessões criadas no verifica.php:
  $id = $_SESSION['id'];
  $nome = $_SESSION['nome'];
  $email = $_SESSION["email"];
?>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="chrome">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
</head>

<body>

  <main>
    <section>
      <!-- Exibir as variáveis para cada usuário e tals:-->
      <h1>Sua conta:<?php echo $nome ?></h1>
      <h1>Email:<?php echo $email ?></h1>
    </section>
  </main>

</body>

</html>