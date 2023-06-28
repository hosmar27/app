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
						<a href="cadastro.html"><li>Cadastro</li></a>
						<a href="pacotes.php"><li>Pacotes</li></a>
						<a href="#"><li>Suporte</li></a>
						<a href="index.html"><li>Inicio</li></a> 
						
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
				<a href="../html/login.html"><img src="../imagens/icone (3).png" class="perfil" > </a>
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
  <title>Admin Trailermarine</title>
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

  <br><br><br>


<!-- <div class="lista_usuario">   
	<form action="mostrar_usuario.php" method="$_REQUEST">
		<tr>
			<th class="tabela">EMAIL DO USUÁRIO</th>
			<th class="tabela">NOME DO USUÁRIO</th>
			<th class="tabela">CPF DO USUÁRIO</th>
			<th class="tabela">TELEFONE DO USUÁRIO</th>
			<th class="tabela">PERMISSÃO</th>
			</th>
		</tr>
	</form>
</div> -->

<?php
	include("conecta.php");

  $comando = $pdo->prepare("SELECT * FROM usuario");
  $resultado = $comando->execute();

  while( $linhas = $comando->fetch()){
		$id_usuario = $linhas["id"];
    $email_usuario = $linhas["email"];
    $nome_usuario = $linhas["nome"];
    $cpf_usuario = $linhas["cpf"];
		$admin_usuario =  $linhas["admin"];
    echo("
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

</table>

<div class="atualizar"> 
  <form action="update_pacote.php" method="POST" enctype="multipart/form-data">
    <input type="text" required="" name="id_pacote" placeholder="Nome">
    <input type="submit" value="Enviar">
  </form>
</div>




<?php
    session_start();

    //<form action=""


  // DA UM ECHO TENDO EM VISTA:
  /*
    1. Consulte o banco de dados ($consulta = $pdo->prepare("SELECT * FROM pacotes"))
    2. Crie uma repetição com while pegando os valores da consulta (while($linhas = $consulta->fetch()))
    3. Pega os valores das $linhas e atribua para varíaveis que serão exibidas na div
    4. Dentro do while imprima as divs html, tlgd? e só criar a div
  */
?>


</body>
</html>