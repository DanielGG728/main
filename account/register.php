<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nick = $_POST['nick'];
    // Verificar se o usuário já existe (opcional)
    $users = json_decode(file_get_contents('users.json'), true);

    if (isset($users[$username])) {
        echo 'Nome de usuário já existe. Escolha outro.';
    } else {
        // Criptografar a senha
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Adicionar usuário ao arquivo JSON
        $users[$username] = ['password' => $hashedPassword,"nick"=>$nick, "followers" => [], "following" => [], "bio" => "", "posts" =>[], "tier"=>0];
        file_put_contents('users.json', json_encode($users));

        echo 'Registrado com sucesso!';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Registro</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>Registre-se</h1>
    <div>
        <form style="text-align:center;" method="post" action="">
            <label for="username">Nome de Usuário:</label><br>
            <input style="text-align:center;"type="text" name="username" placeholder="Nome de usuário" required><br>
            <label for="username">Apelido:</label><br>
            <input style="text-align:center;"type="text" name="nick" placeholder="Apelido" required><br>
            <label for="password">Senha:</label><br>
            <input style="text-align:center;" type="password" name="password" placeholder="Senha" required><br>
            <hr>

            <button type="submit">Registrar</button>
        </form>
    </div>
    <p>Já tem uma conta? <a href="./login.php">Faça login</a></p>
</body>
</html>
