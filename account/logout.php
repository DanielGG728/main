<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['account'])) {
    // Se não estiver autenticado, redirecionar para a página de login
    header("Location: ./login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter o nome de usuário e senha do formulário
    $usernameFromForm = $_POST['username'];
    $passwordFromForm = $_POST['password'];

    // Verificar se o nome de usuário do formulário coincide com o nome de usuário autenticado
    if ($usernameFromForm == $_SESSION['account']) {
        // Verificar se a senha do formulário coincide com a senha armazenada
        $users = json_decode(file_get_contents("./users.json"), true);
        $hashedPassword = $users[$_SESSION['account']]['password'];

        if (password_verify($passwordFromForm, $hashedPassword)) {
            // Limpar todas as variáveis de sessão
            $_SESSION = array();
            
            // Destruir a sessão
            session_destroy();

            // Redirecionar para a página de login (ou outra página desejada)
            header("Location: ./login.php");
            exit();
        } else {
            // Senha incorreta, você pode lidar com isso de acordo com suas necessidades
            echo "Senha incorreta!";
        }
    } else {
        // Nome de usuário incorreto, você pode lidar com isso de acordo com suas necessidades
        echo "Nome de usuário incorreto!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar saída</title>
    <link rel="stylesheet" href="./profile.css">
</head>
<body>
    <header>
        <h1>Log out</h1>
    </header>
    <div>
        <form style="text-align:center;" action="logout.php" method="post">
            <h3>Nome de usuário</h3>
            <input style="text-align:center;" placeholder="Nome de usuário" type="text" name="username" required>
            <br>
            <h3>Senha</h3>
            <input style="text-align:center;" placeholder="Senha" type="password" name="password" required>
            <hr>
            <input style="text-align:center;" id="logout" type="submit" value="Sair da conta">
        </form>
        <a href="../home/index.php"><button>Voltar</button></a>
    </div>
</body>
</html>
