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

require('../conexao.php');

$nome = $_SESSION['nome'];
$rede = $_SESSION['rede'];
$funcao = $_SESSION['funcao'];
$dtini = $_SESSION['dtini'];
$arealider = $_SESSION['arealider'];
$setorlider = $_POST['setorlider'];
$_SESSION['setorlider'] = $setorlider;

$corQuery = "SELECT DISTINCT `nome_lider` FROM `tbl_dados` WHERE `area_lider` like '$arealider' and setor_lider like '$setorlider' and data_lider >= '$dtini'";

$result = mysqli_query($conexao, $corQuery);

?>



<!DOCTYPE html>
<html lang="en">

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
        <h3>Lider de Célula</h3>

    </div>
    <div>
        <form method="POST" name="pesquisar" id="form" action="">
            <table border="0" align="center">
                <tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <td>
                      
                            
                                <td class="respostas"><?php echo $row['nome_lider']; ?><br></td>
                            
                    </td>
                    <?php } ?>

                </tr>
            </table>
            <tr>
                <td><input class="botaoadmin" type="submit" width="90" id="enviar" value="Pesquisar"></td>
            </tr>
        </form>
    </div>
</body>

</html>