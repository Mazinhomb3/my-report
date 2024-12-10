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
    $distlider = $_SESSION['distlider'];
    
}


require('../conexao.php');


$sql = "SELECT DISTINCT `area_lider` FROM `tbl_dados` WHERE cor_rede_lider like '$correde' and `distrito_lider` like '$distlider'";

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
        <h3>Sup. de área da rede <?php echo $correde; ?>.</h3>
    </div>
    <form method="POST" name="pesquisar" id="form" action="area.php">
        <table border="0" align="center">
            <tr>
                <td>
                    <select class="select" name="arealider" id="arealider" align="center" class="respostas">
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                            <option class="respostas" value="<?php echo $row['area_lider']; ?>"><?php echo $row['area_lider']; ?></option>
                        <?php } ?>
                </td>
                </select>

            </tr>
        </table>
        <tr>
            <td><input class="botaoadmin" type="submit" width="90" id="enviar" value="Pesquisar"></td>
        </tr>
        <tr>
            <td><input class="botaoadmin" type="button" value="Voltar" onClick="JavaScript: location.replace('rede.php');"></td>
        </tr>
    </form>
</body>

</html>
