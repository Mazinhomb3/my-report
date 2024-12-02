<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    <link rel="shortcut icon" href="../img/logo_paz.ico" type="image/x-icon">
    <title>Paz santarém</title>
</head>
<body>
<div class="logo">           
    <img src="../img/logosup.png" class="logopaz"  alt="">
    </div>

<div class="sub">
    <h3>Cadastrar Surpervisores</h3>
</div>
    <div class="form">
        <form id="login" method="POST" name="login" action="./login.php">
            <table align="center" border="0" class="tabela">
                <tr>
                    <td class="inputs">Nome: </td>
                    <td><input name="usuario" id="usuario" type="text" class="respostas" placeholder="Usuario" require></td>
                </tr>
                <tr>
                    <td>Senha: </td>
                    <td><input name="senha" type="password" class="respostas" placeholder="senha" require></td>
                </tr>
            
            <div class="divbuton">
            <tr>
                <td></td>
            <td><button class="buton" type="submit">Entrar</button></td>
            
        </form>
        </table>
   
        </div>
    </div>
</body>
</html>
<?php

?>