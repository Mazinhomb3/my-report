<?php

if (!isset($_SESSION))
    session_start();

$nivel_necessario = 4;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION["nome"]) or ($_SESSION["nivel"] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php");
    exit;
}

if (!empty($_POST["redelider"])) {
    $_SESSION['redelider'] = $redelider = $_POST['redelider'];
    $correde = $_SESSION['correde'];
    
} else {
    $redelider = $_SESSION['redelider'];
    $correde = $_SESSION['correde'];
    // unset($_SESSION['distlider']);
  
}

require('../conexao.php');



$corQuery = "SELECT DISTINCT  `distrito_lider` FROM `tbl_dados` WHERE cor_rede_lider like '$correde' and `rede_lider` like '$redelider'";

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
        <h3>Pr. de Distrito Rede da <?php echo $correde; ?></h3>
    </div>
    <form method="POST" name="pesquisar" id="form" action="distrito.php">
        <table border="0" align="center">
            <tr>
                <td>
                    <select class="select" name="distlider" id="distlider" align="center" class="respostas">
                        <?php while ($row = mysqli_fetch_assoc($result)) {  ?>

                            <option class="respostas" value="<?php echo $row['distrito_lider']; ?>"><?php echo $row['distrito_lider']; ?></option>
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
