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

$corQuery = "SELECT DISTINCT id, nome FROM tbl_login_sup where rede like '$rede' and funcao like 'setor'";

$result = mysqli_query($conexao, $corQuery);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paz Santarém</title>
</head>

<body>

    ß<div class="sessao">
        <?php echo "Bem-vindo, " . $_SESSION['nome'] ?>

    </div>

    <table border="1" align="center">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td class="inputs">Nome Setor:</td>
            <td class="respostas"><?php echo $row['nome']; ?><br></td>
        </tr>
        <?php } ?>
    </table>
    
</body>

</html>