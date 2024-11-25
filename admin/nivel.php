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
$nivel = $_SESSION["nivel"];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="shortcut icon" href="../img/logo_paz.ico" type="image/x-icon">
    <title>Document</title>
</head>

<body>
    <div class="logo">
        <img src="./img/logosup.png" class="logopaz" alt="">
    </div>

    <div class="sessao">
        <?php echo "Bem-vindo, " . $_SESSION['nome'] . $_SESSION['area_lider'] ?>

    </div>

    <div class="div-botao1">
        <ul class="link">
            <?php if ($nivel >= 5) {
                echo '<a href="area.php " class = "botao">Sup. Rede</a><br>';
            } else {
                echo '<a href="" class = "botaoverm" >Sup. Rede</a><br>';
            } ?>
            <?php if ($nivel >= 4) {
                echo '<a href="area.php " class = "botao">Rede</a><br>';
            } else {
                echo '<a href="" class = "botaoverm" >Rede</a><br>';
            } ?>
            <?php if ($nivel >= 3) {
                echo '<a href="area.php " class = "botao">Distrito</a><br>';
            } else {
                echo '<a href="" class = "botaoverm" >Distrito</a><br>';
            } ?>
            <?php if ($nivel >= 2) {
                echo '<a href="setores.php " class = "botao">Área</a><br>';
            } else {
                echo '<a href="" class = "botaoverm" >Área</a><br>';
            } ?>

            <?php if ($nivel >= 1) {
                echo '<a href="lider.php " class = "botao">Setor</a><br>';
            } else {
                echo '<a href="lider.php " class = "botaoverm">Setor</a><br>';
            } ?>

        </ul>
    </div>
</body>

</html>