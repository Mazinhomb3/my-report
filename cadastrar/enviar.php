<?php
// Inicia a sessão para armazenar e acessar variáveis de sessão.
session_start();

require('../conexao.php');

if (!isset($_SESSION['nome']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    //A última solicitação foi há mais de 30 minutos
    session_unset();     //Variável para o tempo de execução 
    session_destroy();   //Destruir os dados da sessão no armazenamento

    header('Location: index.php');
}
$_SESSION['LAST_ACTIVITY'] = time();






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
    <div class="divlogo">
        <img class="logopaz" src="../img/logo_paz.png" alt="">
    </div>
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
                            <input type="number" class="cadastro" name="idcelula" id="idcelula">
                        </td>
                    </tr>
                    <tr>
                        <td class="pergunta">
                            Total de Membros:
                        </td>
                        <td class="cadastro">
                            <input type="number" name="mtp" id="mtp" class="cadastro">
                        </td>
                    </tr>
                    <tr>
                        <td class="pergunta">
                            Membros Presentes:
                        </td>
                        <td class="cadastro">
                            <input type="number" name="mcp" id="mcp" class="cadastro">
                        </td>
                    </tr>
                    <tr>
                        <td class="pergunta">
                            Convidados Presentes:
                        </td>
                        <td class="cadastro">
                            <input type="number" name="cp" id="cp" class="cadastro">
                        </td>
                    </tr>
                    <tr>
                        <td class="pergunta">
                            Crianças Presentes:
                        </td>
                        <td class="cadastro">
                            <input type="number" name="cria" id="cria" class="cadastro">
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
                            <input class="valor" type="float" maxlength="10" id="valor">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div align="center">
                <br>
                <br>
                <td>
                    <a href="#" class="botao">Pesquisar</a>
                </td>
                <td>
                    <a href="#" class="botao">Cadastrar</a>
                </td>

            </div>
        </form>
    </div>
</body>

</html>