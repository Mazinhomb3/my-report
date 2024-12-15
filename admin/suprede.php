<?php


if (!isset($_SESSION))
    session_start();

$nivel_necessario = 5;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION["nome"]) or ($_SESSION["nivel"] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php");
    exit;
}

require('../conexao.php');

$nome = $_SESSION['nome'];
$correde = $_SESSION['correde'];
$dtini = $_SESSION['dtini'];

header("refresh: 60; url=https://my-report.site/admin");


$sql = "SELECT DISTINCT rede_lider FROM `tbl_dados` WHERE `supervisor_rede_lider` like '$nome' and cor_rede_lider like '$correde' and data_lider like '$dtini' ";

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
        <?php echo "Bem-vindo, " . $_SESSION['nome'] . "!" ?>
        <h3>Pr. de Rede da Rede <?php echo $correde; ?>.</h3>
    </div>
    <form method="POST" name="pesquisar" id="form" action="rede.php">
        <table border="0" align="center">
            <tr>
                <td>
                    <select class="select" name="redelider" id="redelider" align="center" class="respostas">

                        <?php while ($row = mysqli_fetch_assoc($result)) {  ?>

                            <option class="respostas" value="<?php echo $row['rede_lider']; ?>"><?php echo $row['rede_lider']; ?></option>

                        <?php } ?>
                </td>
                </select>

            </tr>
        </table>
        <tr>
            <td><input class="botaoadmin" type="submit" width="90" id="enviar" value="Pesquisar"></td>
        </tr>
    </form>
</body>

</html>


<?php header("refresh: 30; url=index.php"); ?>