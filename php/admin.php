<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/admin.css">
	<title>Document</title>
</head>
<body>

	<header>
		<div class="esq">
			<div class="pqp">
				<nav role="navigation">
					<div id="menuToggle">

						<input type="checkbox" />
						<span></span>
						<span></span>
						<span></span>

						<ul id="menu">
							<a href="cadastro.html">
								<li>Cadastro</li>
							</a>
							<a href="pacotes.php">
								<li>Pacotes</li>
							</a>
							<a href="#">
								<li>Suporte</li>
							</a>
							<a href="index.html">
								<li>Inicio</li>
							</a>

						</ul>
					</div>
				</nav>

			</div>
			<div class="pqp_direita">
				<h1>
					Trailermarine
				</h1>
			</div>

		</div>
		<div class="dir">
			<a href="../php/pacotes.php"><img src="../imagens/submariano.png"></a>
			<a href="../html/login.html"><img src="../imagens/icone (3).png" class="perfil"> </a>
		</div>
	</header>

</body>

</html>

<?php
session_start();

if (!isset($_SESSION['nome'])) {
	echo ("<script type='text/javascript'>");
	echo ("window.alert('SAI DO ADM');");
	echo ("</script>");
}
?>

<html lang="pt-br">

<head>
	<title>PAGINA ADMIN</title>
</head>


<body>

	<div class="inserir">
		<form action="inserir_pacote.php" method="POST" enctype="multipart/form-data">
			<input type="text" required="" name="nome_pacote" placeholder="Nome">
			<input type="text" required="" name="valor_pacote" placeholder="Valor">
			<input type="text" required="" name="descricao_pacote" placeholder="Descrição">
			<input type="file" name="foto_pacote" accept="image/*">
			<input type="submit" value="Enviar">
		</form>
	</div>

	<div class="inserir">
		<form action="inserir_usuario.php" method="POST" enctype="multipart/form-data">
			<input type="text" required="" name="nome_usuario" placeholder="Nome">
			<input type="text" required="" name="email_usuario" placeholder="Email">
			<input type="text" required="" name="cpf_usuario" placeholder="CPF">
			<input type="text" required="" name="admin_usuario" placeholder="Admin">
			<input type="submit" value="Enviar">
		</form>
	</div>

	<br><br><br>

	<?php
	include("conecta.php");

	$comando = $pdo->prepare("SELECT * FROM usuario");
	$resultado = $comando->execute();

	while ($linhas = $comando->fetch()) {
		$id_usuario = $linhas["id"];
		$email_usuario = $linhas["email"];
		$nome_usuario = $linhas["nome"];
		$cpf_usuario = $linhas["cpf"];
		$admin_usuario =  $linhas["admin"];
		echo ("<title>Lista de Usuarios</title>
      <tr>
      <td class='tabela'>$id_usuario</td>
      <td class='tabela'>$nome_usuario</td>
      <td class='tabela'>$cpf_usuario</td>
      <td class='tabela'>$email_usuario</td>
      <td class='tabela'>$admin_usuario</td><br>
      </tr>
    ");
	}

	?>

	<br><br><br>

	</table>

	<title>Atualizar Pacote</title>
	<form action="update_pacote.php" method="POST" enctype="multipart/form-data">
		<label for="id_pacote">ID do Pacote:</label>
		<input type="text" name="id_pacote" required><br>

		<label for="nome_pacote">Nome do Pacote:</label>
		<input type="text" name="nome_pacote"><br>

		<label for="valor_pacote">Valor do Pacote:</label>
		<input type="text" name="valor_pacote"><br>

		<label for="descricao_pacote">Descrição do Pacote:</label>
		<textarea name="descricao_pacote"></textarea><br>

		<label for="foto_pacote">Imagem do Pacote:</label>
		<input type="file" name="foto_pacote"><br>

		<input type="submit" value="Atualizar Pacote">
	</form>

	<title>Excluir Pacote</title>

	<form method="POST" action="excluir_pacote.php">
		<label for="id_pacote">ID do Pacote:</label>
		<input type="text" name="id_pacote" id="id_pacote">
		<button type="submit">Excluir</button>
	</form>

</html>