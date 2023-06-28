<?php
  include("conecta.php");

  // Pegar valores:
  $nome_pacote = $_POST['nome_pacote'];
  $valor = $_POST['valor_pacote'];
  $descricao = $_POST['descricao_pacote'];
  $imagem = file_get_contents($_FILES['foto_pacote']["tmp_name"]);

  $update = $pdo->prepare("UPDATE FROM pacotes (nome, valor, descricao, imagem) TO (:nome, :valor, :descricao, :imagem)");
  // $update->bindParam(":nome", $nome_pacote);
  // $update->bindParam(":imagem", $imagem. PDO::PARAM_LOB);
  $update->bindParam(":nome", $nome_pacote);
  $update->bindParam(":valor", $valor);
  $update->bindParam(":descricao", $descricao);
  $update->bindParam(":imagem", $imagem, PDO::PARAM_LOB);

  $update->execute();

  if($update == TRUE)
  {
    header("Location: admin.php");
  }
?>