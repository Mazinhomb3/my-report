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

$corQuery = "SELECT DISTINCT * FROM tbl_dados where cor_rede_lider like '$rede' and area_lider like '$nome' and data_lider > '$dtini' ";

$result = mysqli_query($conexao, $corQuery);

?>
 

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo_paz.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <title>Paz Santarém</title>
</head>

<body>
    <div class="sessao">
        <?php echo "Bem-vindo, " . $_SESSION['nome'] ?>

    </div>

    <div>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <table border="1" align="center">

                <tr>
                    <td class="inputs">Nome Lider:</td>
                    <td class="respostas"><?php echo $row['nome_lider']; ?></td>
                </tr>

            <?php } ?>
            </table>

    </div>
</body>

</html>