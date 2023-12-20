<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['account'])) {
    header('Location: ./login.php');
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountid = $_POST["accid"];
    $users = json_decode(file_get_contents("./users.json", true));
} else {
    $_POST["accid"] = $_SESSION["account"];
}
$current_account = $_SESSION['account'];
$current_account_data = $_SESSION['accountdata'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu perfil</title>
    <link rel="stylesheet" href="./profile.css">
</head>
<body style="margin: 50px;">
    <h1><?php
    echo 'Seja bem-vindo, '.$_SESSION['account'];
    ?></h1>
    <div style="display: inline-block; text-align: center; padding: 0;">
        <div style="display: inline-flex; width: 500px">
        <div style="width: 100px; text-align: center; padding: 0;">
                <p style="font-weight: bolder; font-size: xx-large;">
                    <?php
                    echo "0";
                    ?>
                </p>
                <h3>Seguidores</h3>
            </div>
            <div style="width: 100px; text-align: center; padding: 0;">
                <p style="font-weight: bolder; font-size: xx-large;">
                    <?php
                    echo "0";
                    ?>
                </p>
                <h3>Aplicativos</h3>
            </div>
            <div style="width: 100px; text-align: center; padding: 0;">
                <p style="font-weight: bolder; font-size: xx-large;">
                    <?php
                    echo "0";
                    ?>
                </p>
                <h3>Badges</h3>
            </div>
            
        </div>
        <hr>
    </div>
    <a href="../home/index.php"><button>Voltar</button></a>
    <a href="./logout.php"><button class="button" style="background-color: #ff6666; color: whitesmoke; font-weight: bolder;">Log out</button></a>
</body>
</html>
