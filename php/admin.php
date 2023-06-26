<?php
// Inclui o arquivo de conexão com o banco de dados
include("conecta.php");

// Conexão com o banco de dados
$id = "id"
$nome = "nome";
$senha = "senha";
$email = "email";

// Função para exibir a lista de usuários
function exibirUsuarios() {
    $sql = "SELECT * FROM usuarios";

    if ($sql->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>CPF</th><th>Email</th></tr>";
        while ($linha = $sql->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$linha['id']."</td>";
            echo "<td>".$linha['nome']."</td>";
            echo "<td>".$linha['cpf']."</td>";
            echo "<td>".$linha['email']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum usuário encontrado.";
    }
}


// Função para trocar informações do usuário
function trocarUsuario($id, $nome, $cpf, $email) {
    global $conexao;
    $sql = "UPDATE usuarios SET nome='$nome', cpf='$cpf', email='$email' WHERE id='$id'";
    
    if ($conexao->query($sql) === TRUE) {
        echo "Informações do usuário atualizadas com sucesso.";
    } else {
        echo "Erro ao atualizar as informações do usuário: " . $conexao->error;
    }
}


// Função para excluir um usuário
function excluirUsuario($id) {
    global $conexao;
    $sql = "DELETE FROM usuarios WHERE id='$id'";

    if ($conexao->query($sql) === TRUE) {
        echo "Usuário excluído com sucesso.";
    } else {
        echo "Erro ao excluir o usuário: " . $conexao->error;
    }
}


// Função para inserir um novo usuário
function inserirUsuario($nome, $cpf, $email) {
    global $conexao;
    $sql = "INSERT INTO usuarios (nome, cpf, email) VALUES ('$nome', '$cpf', '$email')";

    if ($conexao->query($sql) === TRUE) {
        echo "Novo usuário inserido com sucesso.";
    } else {
        echo "Erro ao inserir o novo usuário: " . $conexao->error;
    }
}


// Verifica se foi enviado um formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["acao"] == "trocar") {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        trocarUsuario($id, $nome, $cpf, $email);
    } elseif ($_POST["acao"] == "excluir") {
        $id = $_POST["id"];
        excluirUsuario($id);
    } elseif ($_POST["acao"] == "inserir") {
        $nome = $_POST["nome"];
	$cpf = $_POST["cpf"];
        $email = $_POST["email"];
        inserirUsuario($nome, $cpf, $email);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Página de Administração</title>

</head>
<body>

<div class="tiradecima">
    <nav class="navegador" role="navigation">
        <div id="menuToggle">
          <input type="checkbox"/>
          <span></span>
          <span></span>
          <span></span>
          <ul id="menu">
            <a href="#"><li>Home</li></a>
            <a href="#"><li>About</li></a>
            <a href="#"><li>Info</li></a>
            <a href="#"><li>Contato</li></a>
            <a href="https://erikterwan.com/" target="_blank"><li>Show me more</li></a>
          </ul>
        </div>
    </nav>
    <div class="carrinho">
        <a href="carrinho.php" target="_blank">
            <img src="../imagens/carrinho.png" width="130px">
        </a>
    </div> 
    <div class="perfil">      
        <img src="../imagens/perfil.png" width="100px">
    </div> 
    
</div> 

<datafield class="dadosperfil"> 
        <legend> Dados Pessoais</legend>
        <br>
        Nome: <input type=”text” id=”nome”>
        <br> <br>
        @Email: <input type=”text” id=”email”>
        <br> <br>
        N°número: <input type=”text” id=”numero”>
        <br> <br>
        <a href="https://www.google.com.br/?safe=active&ssui=on" target="_blank">
            dados do cadastro
        </a>
</datafield> 

    <!-- Exibir usuários -->
    <h2>Lista de Usuários</h2>
    <?php exibirUsuarios(); ?>

    <!-- Formulário para trocar informações do usuário -->
    <h2>Trocar Informações do Usuário</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="acao" value="trocar">
        <label>ID do Usuário:</label>
        <input type="text" name="id" required><br>
        <label>Novo Nome:</label>
        <input type="text" name="nome" required><br>
        <label>Novo CPF:</label>
        <input type="text" name="cpf" required><br>
        <label>Novo Email:</label>
        <input type="email" name="email" required><br>
        <input type="submit" value="Trocar Informações">
    </form>

    <!-- Formulário para excluir um usuário -->
    <h2>Excluir Usuário</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="acao" value="excluir">
        <label>ID do Usuário:</label>
        <input type="text" name="id" required><br>
        <input type="submit" value="Excluir Usuário">
    </form>

    <!-- Formulário para inserir um novo usuário -->
    <h2>Inserir Novo Usuário</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="acao" value="inserir">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>
        <label>CPF:</label>
        <input type="text" name="cpf" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <input type="submit" value="Inserir Usuário">
    </form>
</body>
</html>
