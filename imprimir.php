<?php
 
session_start();

if (!isset($_SESSION['nome_lider']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
 //A última solicitação foi há mais de 30 minutos
 session_unset();     //Variável para o tempo de execução 
 session_destroy();   //Destruir os dados da sessão no armazenamento



  header('Location: index.php');
  die();
}
$_SESSION['LAST_ACTIVITY'] = time();
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/estilo.css">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
  <title>Documento Enviado</title>
<style>
div {
  margin-top: 10%;
  align-items: center;
  text-align: center;
  font-size: 30px;
}

</style>
</head>
<body>
  <div><table align="center"; border="0">
<tr>
  <td><?php echo "Bem-vindo novamente, " . $_SESSION['nome_lider'] . ", ";?></td>
</tr>
<tr>
  <td><?php echo "mas seu dados ja foram enviados!";?></td>
</tr>


  </table></div>
</body>
</html>