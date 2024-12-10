<?php


if (!isset($_SESSION))
    session_start();

$nivel_necessario = 5;

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
$correde = $_SESSION['correde'];


$sql = "SELECT DISTINCT * FROM `tbl_dados` WHERE `supervisor_rede_lider` like '$nome' and cor_rede_lider like '$correde' ";

$result = mysqli_query($conexao, $sql);

?>
 


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    <link rel="shortcut icon" href="../img/logo_paz.ico" type="image/x-icon">
    <title>Paz Santarém</title>
</head>

<body> 
<div class="login"><?php echo "Bem vindo, " . $_SESSION['nome'] . "!"; ?></div>
    <div class="divtabelalistar">
        <table class="tabelalistar" align="center">
            <caption>Listar</caption>
            
            <thead>
					<tr>
						<th>REDE</th>
						<th>ID</th>
                        <th>NOME LIDER</th>
                        <th>SETOR</th>
                        <th>AREA</th>
                        <th>DISTRITO</th>
                        <th>DETALHES</th>
					</tr>
				</thead>

            <?php

while ($row = mysqli_fetch_assoc($result)) {

            ?>

            <tbody>
                <tr>
                    
                    <td class="rede"><?php echo $row['cor_rede_lider']; ?></td>
                    <td class="id"><?php echo $row['cod_lider_rede']; ?></td>
                    <td class="nome"><?php echo $row['nome_lider']; ?></td>
                    <td class="funcao"><?php echo $row['setor_lider']; ?></td>
                    <td class="funcao"><?php echo $row['area_lider']; ?></td>
                    <td class="funcao"><?php echo $row['distrito_lider']; ?></td>
                    <td>
                        <a class="botaolistar" href="view.php?id=<?php echo "" ?>">Visualizar</a>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>

</body>

</html>