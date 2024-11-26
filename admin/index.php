<?php


require('../conexao.php');


$corQuery = "SELECT DISTINCT rede FROM tbl_login_sup ";

$result = mysqli_query($conexao, $corQuery);


$funcaoQuery = "SELECT DISTINCT funcao FROM tbl_login_sup ";

$resultfuncao = mysqli_query($conexao, $funcaoQuery);





?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="shortcut icon" href="../img/logo_paz.ico" type="image/x-icon">
    <title>Administrador</title>
</head>

<body>

    <div class="divi-img">
        <img src="../img/logo_paz.png" alt="" class="img">
    </div>
    <div class="titulo">
        <h4>Bem vindo!</h4>
        <h4>Aqui você terá acesso as dados de sua Rede.</h4>
        <h4>Informe data inicial!</h4>
    </div>
    <div class="form">
        <form id="form" name="cadastrar" method="POST" action="login.php">

            <table align="center" border="0" class="table">
                <tr>
                    <td class="inputs">Nome: </td>
                    <td><input name="usuario" id="usuario" type="text" class="respostas" required></td>
                </tr>
                </tr>
                <tr>
                    <td class="inputs">Senha: </td>
                    <td>
                        <input name="senha" id="senha" type="password" class="respostas">
                </tr>
                </tr>
                <tr>
                    <td class="inputs">Rede: </td>
                    <td>
                        <select name="cor_rede" id="cor_rede" align="center" class="respostas">
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row['rede']; ?>"><?php echo $row['rede']; ?></option>
                            <?php } ?>
                    </td>
                    </select>
                </tr>
            
                <tr>
                    <td class="inputs">Função: </td>
                    <td>
                        <select name="funcao" id="funcao" align="center" class="respostas">
                            <?php while ($row = mysqli_fetch_assoc($resultfuncao)) { ?>
                                <option value="<?php echo $row['funcao']; ?>"><?php echo $row['funcao']; ?></option>
                            <?php } ?>
                    </td>
                    </select>
                </tr>
                <tr>
                    <td class="inputs">
                        Data Inicial:
                    </td>
                    <td>
                        <input name="dtini" type="date" id="dtini" class="respostas">
                    </td>
                </tr>

            </table>

            <tr>
                <td><input class="botaoadmin" type="submit" width="90" id="enviar" value="Login"></td>
            </tr>

        </form>
    </div>


<div class=""></div>

</body>

</html>