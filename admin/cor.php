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

$corQuery = "SELECT nome_lider, cod_lider_rede, id_rede FROM `tbl_dados` WHERE cor_rede_lider='verde laguna' AND area_lider='bruno'AND setor_lider='bruno' AND data_lider>='2024-12-02'";

$result = mysqli_query($conexao, $corQuery);

while ($row = mysqli_fetch_assoc($result)) {
    $nome1 = $row['nome_lider'];
    print_r($nome1);
}

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

    </div>
    <div>

        <table border="0" align="center">

            <?php
            $sql = "SELECT `lider_cel_rede`, cod_lider_rede FROM `tbl_redes` WHERE cor_rede like 'verde laguna' and `area_rede` like 'bruno' and setor_rede like 'bruno' ORDER BY lider_cel_rede ASC ";

            $resultlider = mysqli_query($conexao, $sql);

            while ($rowlider = mysqli_fetch_assoc($resultlider)) {

                $nome2=array($rowlider["lider_cel_rede"]);
              

            ?>

                <td class="<?php echo $cor ?>"><?php echo $rowlider["lider_cel_rede"] ?><br>
                </td>
                </tr>
            <?php   } ?>
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

<?php
foreach ($result as $n) {
    foreach ($resultlider as $n2) {
        if ($n == $n2) {
            $nome3[] = $n2;
        }
    }
} 
//var_dump($n);
//var_dump($n2);
//var_dump($result);

?>