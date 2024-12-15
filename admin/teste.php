<?php
/*
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
*/
require('../conexao.php');

//header("refresh: 60; url=https://my-report.site/admin");

$sql = "SELECT DISTINCT nome_lider, cod_lider_rede FROM tbl_dados WHERE cor_rede_lider='verde laguna' AND area_lider='bruno' and setor_lider='bruno' AND data_lider>='2024-12-02' order by nome_lider asc ";
$result2 = mysqli_query($conexao, $sql);


$sqlnome = "SELECT DISTINCT lider_cel_rede, cod_lider_rede FROM tbl_redes WHERE cor_rede='verde laguna' AND area_rede='bruno' and setor_rede='bruno' order by lider_cel_rede asc";
$result1 = mysqli_query($conexao, $sqlnome);

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
        <h3>Lideres de Célula de setor da Rede <?php echo $correde; ?>.</h3>

    </div>
    <div>

        <table border="0" align="center">
            <tr>
                <?php while ($row1 = $result1->fetch_assoc()) {
                  //$cor="respostas";
                ?>
                    <td class="<?php echo $cor ?>"><?php echo $row1["lider_cel_rede"]; ?><br>
                    </td>

            </tr>
        <?php   }  ?>
        <tr>
            <td>
                <h3>Relatórios enviados</h3>
            </td>
        </tr>
        <tr>
            <?php while ($row2 = $result2->fetch_assoc()) {
                if ($row2["nome_lider"]==$row1["lider_cel_rede"]) {
                    $cor="respostasverd";
                }else {
                    $cor="respostas";
                }
                ?>
                <td class="respostasverd"><?php echo $row2["nome_lider"]; ?></td>
                
        </tr>
    <?php } ?>
        </table>
        <tr>
            <td><input class="botaoadmin" type="button" value="Detalhes" onClick="JavaScript: location.replace('detalhes.php');"></td><br>
        </tr>
        <tr>
            <td><input class="botaoadmin" type="button" value="Voltar" onClick="JavaScript: location.replace('area.php');"></td>
        </tr>

    </div>
</body>

</html>