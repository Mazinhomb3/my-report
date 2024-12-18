<?php
if (!isset($_SESSION))

    session_start();
// Estabelece o nivel da sessao
$nivel_necessario = 1;


// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION["nome"]) or ($_SESSION["nivel"] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php");
    exit;
}

// Conector
require('../conexao.php');

$nome = $_SESSION['nome'];
$rede = $_SESSION['rede'];
$correde = $_SESSION['correde'];
$dtini = $_SESSION['dtini'];
$setorlider = $_SESSION['nome'];


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
        <?php echo "Bem-vindo, " . $_SESSION['nome'] . "!" ?><br>
        <?php echo "Rede, " . $_SESSION['rede'] . "!" ?><br>

    </div>


    <div class="titulo">

        <h4>Líderes de Célula</h4>
    </div>
    <div>
    <table border="0" align="center" id="segunda">
            <tr>
                <?php
                $corQuery = "SELECT `lider_cel_rede`, cod_lider_rede FROM `tbl_redes` WHERE cor_rede like '$correde' and setor_rede like '$setorlider' ORDER BY lider_cel_rede ASC ";

                $result = mysqli_query($conexao, $corQuery);

                while ($row1 = mysqli_fetch_assoc($result)) {
 
                    $sql_verificar = "SELECT cod_lider_rede FROM tbl_dados WHERE nome_lider = '" . $row1["lider_cel_rede"] . "' AND cod_lider_rede = '" . $row1["cod_lider_rede"] . "' AND data_lider BETWEEN '$dtini' AND TIMESTAMPADD(DAY, 7, '$dtini') ";
                    $result_verificar = $conexao->query($sql_verificar);
                    $quantidade = mysqli_fetch_assoc($result_verificar);

                    if ($quantidade > 1) {
                        $cor = "respostasverd"; // Cor de fundo para recebidas
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
            <td><input class="botaoadmin" type="button" value="Detalhes" onClick="JavaScript: location.replace('detalhes1.php');"></td><br>
        </tr>

        <tr>
            <td><input class="botaoadmin" type="button" value="Voltar" onClick="JavaScript: location.replace('index.php');"></td>
        </tr>
    </div>
</body>

</html>