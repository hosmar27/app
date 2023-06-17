<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Admin</title>
    <link rel="stylesheet" type="text/css" href="cadastro.css">
</head>
<body>
	<div class="container">

	<h1>Admin</h1>
        
	<div class="lacuna">

    <?php

		<div class="nome">
			<label for="nome">Nome de Usuário:</label>
			<input class="caixa" type="text" id="username" name="username" placeholder="Digite seu nome de usuário">
		</div>

	?>

	<div class="senha">
		<label for="senha">Senha:</label>
		<input class="caixa" type="text" id="senha" name="senha" placeholder="Digite seu CPF">
	</div>

    <div class="email">
		<label for="nome">Email:</label>
		<input class="caixa" type="email" id="email" name="email" placeholder="Digite seu email">
	</div>

	<div class="senha">
		<label for="senha">Senha:</label>
		<input class="caixa" type="password" id="senha" name="senha" placeholder="Digite sua senha">
	</div>

    <div class="senha">
		<label for="senha">Confirmar senha:</label>
		<input class="caixa" type="password" id="senha" name="senha" placeholder="Digite sua senha novamente">
	</div>
	<div class="botao">
	<input type="submit" value="Inserir">
	<input type="submit" value="Alterar">
	<input type="submit" value="Pesquisar">
	<input type="submit" value="Excluir">
	</div>
</form>

</body>

</html>