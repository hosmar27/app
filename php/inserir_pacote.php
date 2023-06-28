<?php
  include("conecta.php");

  // Pegar valores:
  $nome_pacote = $_POST['nome_pacote'];
  $valor = $_POST['valor_pacote'];
  $descricao = $_POST['descricao_pacote'];
  $imagem = file_get_contents($_FILES['foto_pacote']["tmp_name"]);

  $inserir = $pdo->prepare("INSERT INTO pacotes (nome, valor, descricao, imagem) VALUES (:nome, :valor, :descricao, :imagem)");
  // $inserir->bindParam(":nome", $nome_pacote);
  // $inserir->bindParam(":imagem", $imagem. PDO::PARAM_LOB);
  $inserir->bindParam(":nome", $nome_pacote);
  $inserir->bindParam(":valor", $valor);
  $inserir->bindParam(":descricao", $descricao);
  $inserir->bindParam(":imagem", $imagem, PDO::PARAM_LOB);

  $inserir->execute();

  if($inserir == TRUE)
  {
    header("Location: admin.php");
  }
?>