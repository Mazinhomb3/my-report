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

header("refresh: 60; url=https://my-report.site/admin");

$corQuery = "SELECT t1.lider_cel_rede, t1.cor AS cor_tabela1, t2.cor AS cor_tabela2 FROM tbl_redes t1 INNER JOIN tbl_dados t2 ON t1.lider_cel_rede = t2.nome_lider
";

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
        <?php echo "Bem-vindo, " . $_SESSION['nome'] ?><br>
        <h3>Lider de Célula da Rede <?php echo $correde; ?>.</h3>

    </div>
    <div>

        <table border="0" align="center">
            <tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { 
                    if ($row["cor_tabela1"] == $row["cor_tabela2"]) {
                        $cor="verde";
                    }else {
                        $cor= "vermelho";
                    }
                    ?>
                    <td>
                    <td class="respostas"><?php echo "<p style='color: $cor'>" . $row["nome_lider"] . "</p>" ?><br>
                    </td>
            </tr>
        <?php   }  ?>
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