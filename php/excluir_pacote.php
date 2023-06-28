<?php
include("conecta.php");

// Pegar valores:
$nome_pacote = $_POST['nome_pacote'];
$valor = $_POST['valor_pacote'];
$descricao = $_POST['descricao_pacote'];
$imagem = file_get_contents($_FILES['foto_pacote']["tmp_name"]);

$excluir = $pdo->prepare("DELETE FROM pacotes WHERE nome = 'valor_do_nome'");
// $excluir->bindParam(":nome", $nome_pacote);
// $excluir->bindParam(":imagem", $imagem. PDO::PARAM_LOB);
$excluir->bindParam(":nome", $nome_pacote);
$excluir->bindParam(":valor", $valor);
$excluir->bindParam(":descricao", $descricao);
$excluir->bindParam(":imagem", $imagem, PDO::PARAM_LOB);

$excluir->execute();

if($excluir == TRUE)
{
	header("Location: admin.php");
}

// DA UM ECHO TENDO EM VISTA:
  /*
    1. Consulte o banco de dados ($consulta = $pdo->prepare("SELECT * FROM pacotes"))
    2. Crie uma repetição com while pegando os valores da consulta (while($linhas = $consulta->fetch()))
    3. Pega os valores das $linhas e atribua para varíaveis que serão exibidas na div
    4. Dentro do while imprima as divs html, tlgd? e só criar a div
  */

?>