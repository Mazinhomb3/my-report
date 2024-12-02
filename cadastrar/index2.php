<?php
if (!isset($_SESSION))
session_start();
// Estabelece o nivel da sessao
$nivel_necessario = 5;


// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION["nome"]) or ($_SESSION["nivel"] < $nivel_necessario)) {
// Destrói a sessão por segurança
session_destroy();
// Redireciona o visitante de volta pro login
header("Location: index.php");
exit;
}
?>




<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/medias.css">
    <link rel="shortcut icon" href="/img/logo_paz.ico" type="image/x-icon">
    <title>Paz Santarém</title>
<style>

</style>


</head>
<body>
    <div class="login"><?php echo "Bem vindo, " . $_SESSION['nome'] . "!";?></div>
    <div class="logo">           
    <img src="../img/logosup.png" class="logopaz"  alt="">
    
    </div>

<div class="div-botao1">
 <ul class="link">
<a href="cadastrar.php" class="botao">Cadastrar</a><br>
<a href="listar.php" class="botao">Listar</a><br>
<a href="edit.php" class="botao">Auterar</a><br>
<a href="deletar.php" class="botao">Deletar</a><br>
</ul>
    </div>
    
</body>
</html>