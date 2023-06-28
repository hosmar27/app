<?php
// Verifica se o usuário está autenticado
include("verifica.php");

// Função para exibir a lista de usuários
function exibirUsuarios() {
    global $pdo; // Acessando a variável $pdo do arquivo "verifica.php"
    $sql = "SELECT * FROM usuarios";
    $stmt = $pdo->query($sql);

    if ($stmt->rowCount() > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>CPF</th><th>Email</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['cpf']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum usuário encontrado.";
    }
}

// Função para trocar informações do usuário
function trocarUsuario($id, $nome, $cpf, $email) {
    global $pdo;
    $sql = "UPDATE usuarios SET nome=?, cpf=?, email=? WHERE id=?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $cpf, $email, $id]);
    
    if ($stmt->rowCount() > 0) {
        echo "Informações do usuário atualizadas com sucesso.";
    } else {
        echo "Erro ao atualizar as informações do usuário.";
    }
}

// Função para excluir um usuário
function excluirUsuario($id) {
    global $pdo;
    $sql = "DELETE FROM usuarios WHERE id=?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    
    if ($stmt->rowCount() > 0) {
        echo "Usuário excluído com sucesso.";
    } else {
        echo "Erro ao excluir o usuário.";
    }
}

// Função para inserir um novo usuário
function inserirUsuario($nome, $cpf, $email) {
    global $pdo;
    $sql = "INSERT INTO usuarios (nome, cpf, email) VALUES (?, ?, ?)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $cpf, $email]);
    
    if ($stmt->rowCount() > 0) {
        echo "Novo usuário inserido com sucesso.";
    } else {
        echo "Erro ao inserir o novo usuário.";
    }
}

// Verifica se foi enviado um formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "trocar") {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        trocarUsuario($id, $nome, $cpf, $email);
    } elseif ($_POST["action"] == "excluir") {
        $id = $_POST["id"];
        excluirUsuario($id);
    } elseif ($_POST["action"] == "inserir") {
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        inserirUsuario($nome, $cpf, $email);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Administração de Usuários</h1>

    <h2>Lista de Usuários</h2>
    <?php exibirUsuarios(); ?>

    <h2>Trocar Informações do Usuário</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="action" value="trocar">
        <label for="id">ID do Usuário:</label>
        <input type="text" name="id" required><br>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <input type="submit" value="Trocar Informações">
    </form>

    <h2>Excluir Usuário</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="action" value="excluir">
        <label for="id">ID do Usuário:</label>
        <input type="text" name="id" required><br>
        <input type="submit" value="Excluir Usuário">
    </form>

    <h2>Inserir Novo Usuário</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="action" value="inserir">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <input type="submit" value="Inserir Usuário">
    </form>
</body>
</html>