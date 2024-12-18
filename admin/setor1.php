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

if (!empty($_POST["setorlider"])) {
    $nome = $_SESSION['nome'];
    $dtini = $_SESSION['dtini'];
    $arealider = $_SESSION['arealider'];
    $correde = $_SESSION['correde'];
    $_SESSION['setorlider'] = $setorlider = $_POST['setorlider'];
} else {
    $nome = $_SESSION['nome'];
    $dtini = $_SESSION['dtini'];
    $arealider = $_SESSION['arealider'];
    $correde = $_SESSION['correde'];
    $setorlider = $_SESSION['setorlider'];
    //unset($_SESSION['setorlider']);
}

require('../conexao.php');

header("refresh: 180; url=https://my-report.site/admin");




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
        <?php echo "Bem-vindo, " . $_SESSION['nome'] ?><br>
        <h3>Lider de Célula da Rede <?php echo $correde; ?>.</h3>
        <h3 >Celulas setor de <?php echo $_SESSION['setorlider'] . "."?></h3>
    </div>
    <div>


         

        <table border="0" align="center" id="segunda">
            <tr>
                <?php
                $corQuery = "SELECT `lider_cel_rede`, cod_lider_rede FROM `tbl_redes` WHERE cor_rede like '$correde' and `area_rede` like '$arealider' 
                and setor_rede like '$setorlider' ORDER BY lider_cel_rede ASC ";

                $result = mysqli_query($conexao, $corQuery);

                while ($row1 = mysqli_fetch_assoc($result)) {

                    $sql_verificar = "SELECT cod_lider_rede FROM tbl_dados WHERE nome_lider = '" . $row1["lider_cel_rede"] . "' AND cod_lider_rede = '" . $row1["cod_lider_rede"] . "' and data_lider BETWEEN '$dtini' AND TIMESTAMPADD(DAY, 7, '$dtini')";
                    $result_verificar = $conexao->query($sql_verificar);
                    $quantidade = mysqli_fetch_assoc($result_verificar);

                    if ($quantidade > 1) {
                        $cor = "respostasverd"; // Cor de fundo para repetidas
                    } else {
                        $cor =  "respostasverm";
                    }
 
                ?>

                    <td class="<?php echo $cor ?>"><?php echo $row1["lider_cel_rede"] ?><br>
                       
                    </td>
                    

            </tr>
        <?php   } ?>

        </table>


        <tr>
            <td><input class="botaoadmin" type="button" value="Detalhes" onClick="JavaScript: location.replace('detalhes4.php');"></td><br>
        </tr>
        <tr>
            <td><input class="botaoadmin" type="button" value="Voltar" onClick="JavaScript: location.replace('area1.php');"></td>
        </tr>

    </div>
</body>

</html>