<?php
session_start();
include("conecta.php");

$valor = $_GET['valor'];
$pacote = $_GET['id_pacote'];
$nome = $_GET['nome'];
$user = $_SESSION['id'];

$comando = $pdo->prepare("INSERT INTO pacote(valor, usuario,pedido) VALUES (:valor, :user, :pedido, :nome");
$comando->bindParam(':valor', $valor);
$comando->bindParam(':user', $user);
$comando->bindParam(':pedido', $pedido);
$comando->bindParam(':pedido', $nome);
$comando->execute();

echo "user: $user <br> pacote: $pacote <br> nome: $nome <br> userid: $user";
//header("location: ../php/carrinho.php");
?>