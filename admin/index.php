<?php
require('../conexao.php');

$corQuery="SELECT DISTINCT cor_rede FROM tbl_redes ORDER BY cor_rede ASC";

$result = mysqli_query($conexao, $corQuery);


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logo_paz.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <title>Administrador</title>
</head>
<body>
    
<div class="">
    <h3>Bem vindo!</h3>
</div>
<div><form id="cadastrar" name="cadastrar" method="POST" action="login.php"  onsubmit="return validaCampo(); return false;">

<table align="center" border="0">
<tr>
        <td class="inputs">Nome: </td>
        <td><input type="text"  class="respostas" required></td>
    </tr>
   
    <tr>
        <td class="inputs">Rede: </td><td>
        <select name="cor_rede" id="cor_rede" align="center"  class="respostas">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <option value="<?php echo $row['cor_rede']; ?>"><?php echo $row['cor_rede']; ?></option>
  <?php } ?>
            
            

        </select>
    </tr>
    </tr>
    <tr>
        <td class="inputs">Senha: </td><td>
        <input type="password" class="respostas"></tr>
    </tr>
    
    <tr>
        <td class="inputs">Função: </td>
        <td>
        <select name="funcao" id="funcao" align="center"  class="respostas">
            <option value="supderede">Sup. de Rede</option>
            <option value="supderede">Pr. de Rede</option>
            <option value="supderede">Sup. de Distrito</option>
            <option value="supderede">Sup. de Área</option>
            <option value="supderede">Sup. de Setor</option>
        </select>
        </td>
    </tr>
    
</table>



</form>
</div>
    
</body>
</html>