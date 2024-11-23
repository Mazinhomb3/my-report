<?php


if (!isset($_SESSION))
    session_start();

$nivel_necessario = 1;

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/medias.css">
    <link rel="shortcut icon" href="/img/logo_paz.ico" type="image/x-icon">
    <title>Document</title>
</head>
<body>
<div class="logo">           
    <img src="./img/logosup.png" class="logopaz"  alt="">
    </div>

<div class="div-botao1">
 <ul class="link">
<a href="index2.php" class="botao"><img src="./img/logo_paz.png" class="imgbt" alt="Descrição da imagem">Sup. de Rede</a><br>
<a href="" class="botao"><img src="./img/whats.png" class="imgbt" alt="Descrição da imagem">Rede</a><br>
<a href="" class="botao"><img src="./img/youtube.png" class="imgbt" alt="Descrição da imagem">Distrito</a><br>
<a href="" class="botao"><img src="./img/instagram.png" class="imgbt" alt="Descrição da imagem">Área</a><br>
<a href="setores.php" class="botao"><img src="./img/face.png" class="imgbt" alt="Descrição da imagem">Setor</a><br>
</ul>
    </div>
</body>
</html>