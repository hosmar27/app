<?php
  include("conecta.php");

  // Pegar valores:
  $nome_usuario = $_POST['nome_usuario'];
  $email_usuario = $_POST['email_usuario'];
  $cpf_usuario = $_POST['cpf_usuario'];
  $admin_usuario = $_POST['admin_pacote'];

  $inserir = $pdo->prepare("INSERT INTO usuario (nome, email, cpf, admin) VALUES (:nome, :email, :cpf, :admin)");
  // $inserir->bindParam(":nome", $nome_pacote);
  // $inserir->bindParam(":imagem", $imagem. PDO::PARAM_LOB);
  $inserir->bindParam(":nome", $nome_usuario);
  $inserir->bindParam(":valor", $email_usuario);
  $inserir->bindParam(":descricao", $cpf_usuario);
  $inserir->bindParam(":imagem", $admin_usuario);

  $inserir->execute();

  if($inserir == TRUE)
  {
    header("Location: admin.php");
  }
?>