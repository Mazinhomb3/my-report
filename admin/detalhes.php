<?php
/*
if (!isset($_SESSION))
    session_start();

$nivel_necessario = 1;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION["nome"]) or ($_SESSION["nivel"] <= $nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php");
    exit;
}
*/
require('../conexao.php');



$nome = $_SESSION['nome'];
$rede = $_SESSION['rede'];
$arealider = $_SESSION['arealider'];
$setorlider = $_POST["setorlider"];
$dtini = $_SESSION['dtini'];



$corQuery = "SELECT DISTINCT `nome_lider` FROM `tbl_dados` WHERE  `area_lider` like '$arealider' and setor_lider like '$setorlider' and data_lider >= '$dtini' ";

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
        <h3>Líderes de células</h3>
    </div>
    <table border="1" align="center">
    <thead>
        <th>Total de Membros</th>
        <th>Membros Presentes</th>
        <th>Conv. Presentes</th>
        <th>Crianças Presentes</th>
        <th>Tipo de Célula</th>
        </thead>
        <tbody>
            
        </tbody>


    </table>
    <div class="divbotao">
        <a href="distrito.php" align="center" class="botao" id="voltar">Voltar</a>
    </div>
</body>

</html>