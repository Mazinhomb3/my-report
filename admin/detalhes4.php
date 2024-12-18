<?php

if (!isset($_SESSION))
    session_start();

$nivel_necessario = 0;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION["nome"]) or ($_SESSION['nivel'] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php");
    exit;
}

require('../conexao.php');

$nome = $_SESSION['nome'];
$rede = $_SESSION['rede'];
$correde = $_SESSION['correde'];
$arealider = $_SESSION['arealider'];
$setorlider = $_SESSION['setorlider'];
$dtini = $_SESSION['dtini'];


header("refresh: 300; url=https://my-report.site/admin");

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
        <h3>Líderes de células do setor de <?php echo $_SESSION['setorlider'] ?></h3>
    </div>
    <div>
        <table class="tb_detalhes" align="center">
            <thead>
                <th>ID</th>
                <th>Lider</th>
                <th>Total Membros</th>
                <th>Membros Presentes</th>
                <th>Convidados Presentes</th>
                <th>Crianças</th>
                <th>Tipo de Célula</th>
                <th>Data</th>
            </thead>
            <?php

            $corQuery = "SELECT DATE_FORMAT(data_lider,'%d/%m/%Y') AS data_lider, nome_lider , membros_celula, membroscomp_celula, convidadospres_celula, 
            criancas_celula, totalpres_celula, oferta_celula, tipo_cel_dados FROM `tbl_dados` WHERE cor_rede_lider ='$correde' AND `area_lider` like '$arealider'
             and setor_lider like '$setorlider' and data_lider BETWEEN '$dtini' AND TIMESTAMPADD(DAY, 7, '$dtini') order by nome_lider ";

            $result = mysqli_query($conexao, $corQuery);

            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tbody>
                    <td class="num"><?php echo $row['cod_lider_rede']; ?></td>
                    <td class="nome"><?php echo $row['nome_lider']; ?></td>
                    <td class="num"><?php echo $row['membros_celula']; ?></td>
                    <td class="num"><?php echo $row['membroscomp_celula']; ?></td>
                    <td class="num"><?php echo $row['convidadospres_celula']; ?></td>
                    <td class="num"><?php echo $row['criancas_celula']; ?></td>
                    <td class="nome"><?php echo $row['tipo_cel_dados']; ?></td>
                    <td class="nome"><?php echo $row['data_lider']; ?></td>

                </tbody>
            <?php } ?>

        </table>
    </div>
    <div class="divbotao">
        <a href="setor1.php" class="botao" id="voltar">Voltar</a><br>
    </div>
    <div class="divbotao">
        <a href="index.php" class="botao" id="sair">Sair</a>
    </div>
</body>

</html>