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
$setorlider = $_POST["setorlider"];
$arealider = $_POST['arealider'];
$_SESSION['arealider'] = $arealider;



$corQuery = "SELECT DISTINCT `nome_lider` FROM `tbl_dados` WHERE `cor_rede_lider` like '$rede'  
and `area_lider` like '$nome' and setor_lider like '$setorlider'";

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
        <?php echo "Bem-vindo, " . $_SESSION['nome'] ?>
        <h3>Lideres de célula</h3>

    </div>
    <table border="0" align="center">
        <tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        </tr>
    <?php } ?>

    </table>
    <div class="divbotao">
        <a href="setor.php" align="center" class="botao" id="voltar">Voltar</a>
    </div>
</body>

</html>