<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['account'])) {
    header('Location: ../../account/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <title>Chat simples</title>
</head>
<body>
    
</body>
</html>