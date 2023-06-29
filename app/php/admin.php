<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/admin.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
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

<div class="tudo">

	<?php
	session_start();

	if (!isset($_SESSION['nome'])) {
		echo ("<script type='text/javascript'>");
		echo ("window.alert('SAI DO ADM');");
		echo ("</script>");
	}
	?>

	<head>
		<h1 style="font-size: 100px;">PAGINA ADMIN</h1>
	</head>


	<body>

		<br><br><br>

		<?php
		include("conecta.php");

		$comando = $pdo->prepare("SELECT * FROM usuario");
		$comando->execute();
		$usuarios = $comando->fetchAll(PDO::FETCH_ASSOC);
		?>

		<!DOCTYPE html>
		<html>

		<head>
			<style>
				table {
					border-collapse: collapse;
					width: 80%;
					font-family: Arial, sans-serif;
				}

				th,
				td {
					border: 1px solid black;
					padding: 8px;
					text-align: center;
				}

				th {
					background-color: #f2f2f2;
				}
			</style>
			<h1>Lista de Usuários</h1>
			<table>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>CPF</th>
					<th>Email</th>
					<th>Admin</th>
				</tr>
				<?php foreach ($usuarios as $usuario) { ?>
					<tr>
						<td><?php echo $usuario["id"]; ?></td>
						<td><?php echo $usuario["nome"]; ?></td>
						<td><?php echo $usuario["cpf"]; ?></td>
						<td><?php echo $usuario["email"]; ?></td>
						<td><?php echo $usuario["admin"]; ?></td>
					</tr>
				<?php } ?>
			</table>

			<br><br><br>

			<?php
			include("conecta.php");

			$comando = $pdo->prepare("SELECT * FROM pacotes");
			$comando->execute();
			$pacotes = $comando->fetchAll(PDO::FETCH_ASSOC);

			echo "<html>
<head>
  <style>
    table {
      border-collapse: collapse;
      width: 80%;
    }
    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
    }
  </style>
  <h1>Lista de Pacotes</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Valor</th>
      <th>Imagem</th>
    </tr>";

			foreach ($pacotes as $pacote) {
				$id_pacote = $pacote["id"];
				$nome_pacote = $pacote["nome"];
				$valor_pacote = $pacote["valor"];
				$imagem = $pacote["imagem"];

				echo "<tr>
          <td>$id_pacote</td>
          <td>$nome_pacote</td>
          <td>$valor_pacote</td>
          <td><img src='data:image/jpeg;base64," . base64_encode($imagem) . "' width='100' height='100'></td>
        </tr>";
			}

			echo "</table>";
			?>

			<br><br><br>

			<h1>Inserir Pacote</h1>

			<div class="inserir">
				<form action="inserir_pacote.php" method="POST" enctype="multipart/form-data">
					<input type="text" required="" name="nome_pacote" placeholder="Nome">
					<input type="text" required="" name="valor_pacote" placeholder="Valor">
					<input type="text" required="" name="descricao_pacote" placeholder="Descrição">
					<input type="file" name="foto_pacote" accept="image/*">
					<input type="submit" value="Enviar">
				</form>
			</div>

			<br><br><br>

			<h1>Inserir Usuario</h1>

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

			</table>

			<h1>Atualizar Pacote</h1>
			<form class="atualizar" action="update_pacote.php" method="POST" enctype="multipart/form-data">
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

			<br><br><br>

			<h1>Atualizar Usuario</h1>
			<form class="atualizar" action="update_usuario.php" method="POST" enctype="multipart/form-data">
				<label for="id_usuario">ID do Usuario:</label>
				<input type="text" name="id_usuario" required><br>

				<label for="nome_usuario">Nome do Usuario:</label>
				<input type="text" name="nome_usuario"><br>

				<label for="valor_usuario">Valor do Usuario:</label>
				<input type="text" name="valor_usuario"><br>

				<label for="descricao_usuario">Descrição do Usuario:</label>
				<textarea name="descricao_usuario"></textarea><br>

				<label for="foto_usuario">Imagem do Usuario:</label>
				<input type="file" name="foto_usuario"><br>

				<input type="submit" value="Atualizar Usuario">
			</form>

			<br><br><br>

	<div class="all-excluir">		
		<div class="inserir">
			<h1>Excluir Pacote</h1>

			<form method="POST" action="excluir_pacote.php">
				<label for="id_pacote">ID do Pacote:</label>
				<input type="text" name="id_pacote" style="width: 30%;" id="id_pacote">
				<button type="submit">Excluir</button>
			</form>
		</div>

		<br><br><br>

		<div class="inserir">
			<h1>Excluir Usuario</h1>

			<form method="POST" action="excluir_usuario.php">
				<label for="id_usuario">ID do Usuario:</label>
				<input type="text" name="id_usuario" style="width: 30%;" id="id_usuario">
				<button type="submit">Excluir</button>
			</form>
		</div>
		</div>
</div>
</body>

</html>