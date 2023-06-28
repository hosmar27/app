<?php

include("conecta.php");

session_start();

$comando = $pdo->prepare("SELECT * FROM usuario");
$comando->execute();
$dados_usuarios = $comando->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_usuarios as $dados_usuario) {
    $id_usuario = $dados_usuario["id"];
    $nome_usuario = $dados_usuario["nome"];
    $email_usuario = $dados_usuario["email"];
    $cpf_usuario = $dados_usuario["cpf"];
    $admin_usuario = $dados_usuario["admin"];

    // Faça algo com os dados do usuário, como exibição em uma tabela ou manipulação deles.
}
?>