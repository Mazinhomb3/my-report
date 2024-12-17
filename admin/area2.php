<?php


if (!isset($_SESSION))
    session_start();

$nivel_necessario = 2;


// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION["nome"]) or ($_SESSION["nivel"] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php");
    exit;
}



if (!empty($_POST["arealider"])) {

    $nome = $_SESSION['nome'];
    $dtini = $_SESSION['dtini'];
    $_SESSION['arealider'] = $arealider = $_POST['arealider'];
    $correde = $_SESSION['correde'];
} else {
    $nome = $_SESSION['nome'];
    $dtini = $_SESSION['dtini'];
    $arealider = $_SESSION['arealider'];
    $correde = $_SESSION['correde'];
}

require('../conexao.php');


header("refresh: 60; url=https://my-report.site/admin");


$corQuery = "SELECT DISTINCT `setor_lider` FROM `tbl_dados` WHERE  cor_rede_lider like '$correde' and `area_lider` like '$arealider'";

$result = mysqli_query($conexao, $corQuery);

?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="shortcut icon" href="../img/logo_paz.ico" type="image/x-icon">
    <title>Paz Santarém</title>
</head>

<body>

    <div class="sessao">
        <?php echo "Bem-vindo, " . $_SESSION['nome'] . "!" ?>
        <h3>Sup. de Setor</h3>
    </div>
    <form method="POST" name="pesquisar" id="form" action="setor2.php">
        <table border="0" align="center">
            <tr>
                <td>
                    <select class="select" name="setorlider" id="setorlider" align="center" class="respostas">
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['setor_lider']; ?>"><?php echo $row['setor_lider']; ?></option>
                        <?php } ?>
                </td>
                </select>

            </tr>
        </table>
        <tr>
            <td><input class="botaoadmin" type="submit" width="90" id="enviar" value="Pesquisar"></td><br>
        </tr>
        <tr>
        <td><input class="botaoadmin" type="button" value="Detalhes" onClick="JavaScript: location.replace('detarea.php');"></td>
    </tr>
</body>

</html>

<?php header("refresh: 60; "); ?>