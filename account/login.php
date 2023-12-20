<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Carregar dados dos usuários do arquivo JSON
    $users = json_decode(file_get_contents('users.json'), true);

    if (isset($users[$username]) && password_verify($password, $users[$username]['password'])) {
        // Armazenar informações do usuário na sessão
        $_SESSION['account'] = $username;
        $_SESSION['accountdata'] = $users[$username];
        // Redirecionar para a página inicial
        header("Location: ../home/index.php");
        exit();
    } else {
        echo 'Nome de usuário ou senha incorretos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <div>
        <form style="text-align:center;" method="post" action="">
            <label for="username">Nome de Usuário:</label><br>
            <input style="text-align:center;" placeholder="nome de usuário" type="text" name="username" required><br>

            <label for="password">Senha:</label><br>
            <input style="text-align:center;" placeholder="senha" type="password" name="password" required><br>
            <hr>
            <button type="submit">Login</button>
        </form>
    </div>
    <p>Não tem uma conta? <a href="./register.php">Registre-se</a></p>
</body>
</html>