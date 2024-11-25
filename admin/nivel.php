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
    <link rel="shortcut icon" href="/img/logo_paz.ico" type="image/x-icon">
    <title>Document</title>
</head>

<body>
    <div class="logo">
        <img src="./img/logosup.png" class="logopaz" alt="">
    </div>

    <div class="sessao">
        <?php echo "Bem-vindo, " . $_SESSION['nome'] ?>

    </div>

    <div class="div-botao1">
        <ul class="link">
            <a href="" class="botao">Sup. de Rede</a><br>
            <a href="" class="botao">Rede</a><br>
            <a href="" class="botao">Distrito</a><br>
            <?php if ($nivel >= 2) {
                echo '<button class= "botao" href="">Área</button><br>';
            } else {
                echo '<button class="botao" disabled>Área</button><br>';
            } ?>

<?php if ($nivel >= 1) {
                echo '<a href="lider.php " class = "botao">Área</a><br>';
            } else {
                echo '<button class="botao" disabled>Área</button><br>';
            } ?>
           
        </ul>
    </div>
</body>

</html>