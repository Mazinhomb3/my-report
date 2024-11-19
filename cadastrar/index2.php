<?php
session_start();

if (!isset($_SESSION['nome']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    //A última solicitação foi há mais de 30 minutos
    session_unset();     //Variável para o tempo de execução 
    session_destroy();   //Destruir os dados da sessão no armazenamento

     header('Location: index.php');
     
   }
   $_SESSION['LAST_ACTIVITY'] = time();
?>




<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/medias.css">
    <link rel="shortcut icon" href="/img/logo_paz.ico" type="image/x-icon">
    <title>PAZ-STM</title>
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
<a href="listar.php" class="botao">Deletar</a><br>
</ul>
    </div>
    
</body>
</html>