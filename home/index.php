<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['account'])) {
    header('Location: ../account/login.php');
    exit();
}

$account = $_SESSION['account'];
$accounts = json_decode(file_get_contents("../account/users.json"), true);
$apps = json_decode(file_get_contents("./apps.json", true));
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <h2>Bem-vindo, <?php echo $account; ?>!</h2>
    </header>
    <div style="">
        <a href="../account/profile.php?accid=<?php echo $account; ?>"><button class="button">Perfil</button></a>
        <a href=""><button class="button">Creditos</button></a>
        <a href=""><button class="button">Chat</button></a>
    </div>
    <div id="sidebar">
        <h2>Aplicativos</h2>
        <hr>
        <?php
        // Mostrar todos os aplicativos disponíveis para o usuário logado
        foreach ($apps as $appname => $content) {
            echo "<a href='" . $content->link . "'><button class='button'>" . $appname . "</button></a><br>";
        }
        ?>
    </div>
</body>
</html>
