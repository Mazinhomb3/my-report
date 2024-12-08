<?php



require './comparaDados.php';

$listardatas = new comparaDados ();

$listardatas->listarDatas();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/dados.css">
    <link rel="shortcut icon" href="../img/logo_paz.ico" type="image/x-icon">
    <title>Paz Santarém</title>
</head>

<body>
    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['pesquisar'])) {

            require './Connection.php';
            require './ComparaData.php';

            $comparaData = new ComparaData();

            $resultdata = $comparaData->datas();

            foreach ($resultdata as $rowsData) {

                extract($rowsData);
            }
        }
    }
    ?>
    <br>
     <div class="login"><?php echo "Bem vindo, " . $_SESSION['nome'] . "!";?></div>

    <?php if ($data_lider <= $_POST['dtpesq'] && $cod_lider_rede == $_POST['idcelula']) { ?>

        <div align="center">
            <img class="logopaz" src="../img/logo_paz_vermelho.png" alt="">
        </div>

    <?php } elseif ($data_lider >= $_POST['dtpesq'] && $cod_lider_rede == $_POST['idcelula']) { ?>
        <div align="center">
            <img class="logopaz" src="../img/logo_paz_verde.png" alt="">
        </div>
    <?php } ?>
    <div>
        <form action="" method="POST" id="form">
            <div class="divdata">
                <thead>
                    <tr>
                        <th>
                            Data pesquisa:
                        </th>
                        <th>
                            <input type="date" name="dtpesq" id="tdpesq">
                        </th>
                        <th>
                            Data cadastro:
                        </th>
                        <th>
                            <input type="date" name="dtcadast" id="dtcadast">
                        </th>
                    </tr>
                </thead>
            </div>


            <table class="tabelaenviar" align="center">
                <tbody align="center">
                    <tr>
                        <td class="pergunta">
                            ID Célula:
                        </td>
                        <td class="cadastro">
                            <input type="number" class="cadastro" name="idcelula" id="idcelula" require>
                        </td>
                    </tr>
                    <tr>
                        <td class="pergunta">
                            Total de Membros:
                        </td>
                        <td class="cadastro">
                            <input type="number" name="mtp" id="mtp" class="cadastro" require>
                        </td>
                    </tr>
                    <tr>
                        <td class="pergunta">
                            Membros Presentes:
                        </td>
                        <td class="cadastro">
                            <input type="number" name="mcp" id="mcp" class="cadastro" require>
                        </td>
                    </tr>
                    <tr>
                        <td class="pergunta">
                            Convidados Presentes:
                        </td>
                        <td class="cadastro">
                            <input type="number" name="cp" id="cp" class="cadastro" require>
                        </td>
                    </tr>
                    <tr>
                        <td class="pergunta">
                            Crianças Presentes:
                        </td>
                        <td class="cadastro">
                            <input type="number" name="cria" id="cria" class="cadastro" require>
                        </td>
                    </tr>
                    <tr>
                        <td class="pergunta">
                            Tipo de Célula:
                        </td>
                        <td class="select">
                            <select name="tipo" id="tipo" class="select">
                                <option value="Adulto">Adulto</option>
                                <option value="Adolecentes">Adolecentes</option>
                                <option value="Crianças">Crianças</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="pergunta">
                            Oferta Célula:
                        </td>
                        <td class="valor">
                            <input class="valor" type="float" maxlength="10" id="valor" require>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div align="center">
        
                <td class="botao">
                    <button type="submit" name="pesquisar" class="botao">Pesquisar</button>
                </td>
                <td class="botao">
                    <?php 
                    
                   
                    
                    ?>
                    <button type="submit" name="cadastrar" class="botao">Cadastrar</button>
                </td>

            </div>
        </form>
    </div>
</body>

</html>