<?php
 
session_start();
if (!isset($_SESSION['nome_lider']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    //A última solicitação foi há mais de 30 minutos
    session_unset();     //Variável para o tempo de execução 
    session_destroy();   //Destruir os dados da sessão no armazenamento
   
   
   
     header('Location: index.php');
   
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
  <title>Sucesso</title>

  <script type="text/javascript"> // Tipo do Script
function redirectTime(){ // Função que define o tempo
window.location = "http://www.my-report.site" //Define o link de redirecionamento
}
</script>

 
<style>
div {
  margin-top: 10%;
  align-items: center;
  text-align: center;
  font-size: 30px;
  color: green;
}

</style>
</head>

<body onLoad="setTimeout('redirectTime()', 4200)">
  <div><table align="center"; border="0">
<tr>
  <td><?php echo "Obrigado " . $_SESSION['nome_lider'] . ", ";?></td>
</tr>
<tr>
  <td><?php echo "seus dados foram enviados com sucesso!";?></td>
</tr>


  </table></div>
</body>
</html>