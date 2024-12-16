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

require('../conexao.php');

//header("refresh: 60; url=https://my-report.site/admin");

$cor="";


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


        <h3>Celulas setor do <?php echo $_SESSION['setorlider'] ?></h3>

        <table border="0" align="center" id="segunda">
            <tr>
                <?php
                $corQuery = "SELECT `lider_cel_rede`, cod_lider_rede FROM `tbl_redes` WHERE cor_rede like '$correde' and `area_rede` like '$arealider' 
                and setor_rede like '$setorlider' ORDER BY lider_cel_rede ASC ";

                $result = mysqli_query($conexao, $corQuery);

                while ($row1 = mysqli_fetch_assoc($result)) { ?>
                    
                    <td class="respostas"><?php echo $row1["lider_cel_rede"] ?><br>
                        <?php
                        $id1 = array($row1['cod_lider_rede']);
                        ?>
                    </td>

            </tr>
        <?php   } ?>
        
        </table>

        <h3>Relatórios enviados.</h3>
        <table border="0" align="center" id="primeira">
            <tr>

                <?php
                $corQuery = "SELECT DISTINCT nome_lider, cod_lider_rede FROM `tbl_dados` WHERE cor_rede_lider like '$correde' and `area_lider` like '$arealider' 
                and setor_lider like '$setorlider' and data_lider >= '$dtini' order by nome_lider asc ";

                $result = mysqli_query($conexao, $corQuery);

                while ($row2 = mysqli_fetch_assoc($result)) { 
                    $id2 = array($row2['cod_lider_rede']);
                    
                    foreach ($id2 as $n) {
                        foreach ($id1 as $n2) {
                            if ($n == $n2) {
                                 echo"verde";
                            }
                        }
                    }
                    ?>
                    <td>

                    <td class="<?php echo $cor ?>"><?php echo $row2['nome_lider']; ?><br>
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

