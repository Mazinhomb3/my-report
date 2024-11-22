<?php


if (!isset($_SESSION)) session_start();

$nivel_necessario = 6;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION["nome"]) OR ($_SESSION["funcao"] <$nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php"); exit;
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logo_paz.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <title>Document</title>
</head>
<body>
<?php 
echo "Bem-vindo, " . $_SESSION['nome'];
echo  $_SESSION['id'];
echo $_SESSION['rede'];
echo $_SESSION['funcao'];





?>
</body>
</html>