<?php


if (!isset($_SESSION))
    session_start();

$nivel_necessario = 3;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION["nome"]) or ($_SESSION["nivel"] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php");
    exit;
}


if (!empty($_POST["distlider"])) {

    $nome = $_SESSION['nome'];
    $dtini = $_SESSION['dtini'];
    $correde = $_SESSION['correde'];
    $_SESSION['distlider'] = $distlider = $_POST['distlider'];
} else {

    $nome = $_SESSION['nome'];
    $dtini = $_SESSION['dtini'];
    $correde = $_SESSION['correde'];
    $_SESSION['distlider'] = $distlider = $_SESSION['distlider'];
}

require('../conexao.php');

$sql = "SELECT DISTINCT `area_rede` FROM `tbl_redes` WHERE cor_rede like '$correde' and `distrito_rede` like '$distlider' ORDER BY area_rede ASC ";

$result = mysqli_query($conexao, $sql);

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
        <?php echo "Bem-vindo, " . $_SESSION['nome'] ?>
        <h3>Sup. de área</h3>
    </div>
    <form method="POST" name="pesquisar" id="form" action="area1.php">
        <table border="0" align="center">
            <tr>
                <td>
                    <select class="select" name="arealider" id="arealider" align="center" class="respostas">
                        <option value=""></option>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['area_rede']; ?>"><?php echo $row['area_rede']; ?></option>
                        <?php } ?>
                </td>
                </select>

            </tr>
        </table>
        <tr>
            <td><input class="botaoadmin" type="submit" width="90" id="enviar" value="Pesquisar"></td><br>
        </tr>
        <tr>
            <td><input class="botaoadmin" type="button" value="Voltar" onClick="JavaScript: location.replace('rede1.php');"></td>
        </tr>
    </form>
</body>

</html>

<?php header("refresh: 60; "); ?>