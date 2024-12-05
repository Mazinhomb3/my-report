<?php 
include('../conexao.php');

$sql = "SELECT * FROM tbl_login_sup";

$result = mysqli_query($conexao, $sql);

$sql = "SELECT * FROM tbl_login_sup";

$result1 = mysqli_query($conexao, $sql);

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
    <div class="logo">
    <img src="../img/logosup.png" class="logopaz"  alt="">
    </div>
    <div class="form">
        <form action="alterar.php" method="POST" id="form">
            <table class="tblsenha" align="center">
                <tr>
                    <td class="pergunta">Nome:</td>
                    <td><input type="text" class="respostas" placeholder="nome" require></td>
                    <td>  Somente o primeiro nome!</td>
                </tr>
                <tr>
                    <td class="pergunta">Senha:</td>
                    <td><input name="senha" type="password" class="respostas" placeholder="senha" require></td>
                    <td>  Senha de 6 digitos!</td>
                </tr>
                
                <tr>
                    <td class="pergunta">Rede:</td>
                    <td class="respostas">
                    <select name="rede" id="rede" align="center" >
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <option value="<?php echo $row['rede']; ?>"><?php echo $row['rede']; ?></option>
                    <?php } ?>
                </select>
                    </td>
                </tr>
                <tr>
                    <td class="pergunta">Função:</td>
                    <td class="respostas">
                    <select name="rede" id="rede" align="center" >
                    <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
                        <option value="<?php echo $row['funcao']; ?>"><?php echo $row['funcao']; ?></option>
                    <?php } ?>
                </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td align="center">
                    <input name="enviar" type="submit" class="botaoedit" id="enviar">
                    </td>
                    <td></td>
                </tr>
            </table>
        </form>

    </div>
</body>
</html>