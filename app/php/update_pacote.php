<?php
include("conecta.php");

session_start();

// Pegar o ID do pacote
$id_pacote = $_POST['id_pacote'];

// Pegar os outros valores
$nome = $_POST['nome_pacote'];
$valor = $_POST['valor_pacote'];
$descricao = $_POST['descricao_pacote'];
$imagem = file_get_contents($_FILES['foto_pacote']["tmp_name"]);

// Prepara a consulta
$update = $pdo->prepare("UPDATE pacotes SET nome = :nome, valor = :valor, descricao = :descricao, imagem = :imagem WHERE id = :id_pacote");

// Vincula os valores dos parâmetros
$update->bindParam(':nome', $nome);
$update->bindParam(':valor', $valor);
$update->bindParam(':descricao', $descricao);
$update->bindParam(':imagem', $imagem);
$update->bindParam(':id_pacote', $id_pacote);

// Executa a consulta
$update->execute();

// Verifica se a consulta foi executada com sucesso
if ($update->rowCount() > 0) {
  header('Location: admin.php');
} else {
  echo "Nenhum registro foi atualizado.";
}
?>