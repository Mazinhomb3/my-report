<?php
session_start();

if (!isset($_SESSION['nome']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    //A última solicitação foi há mais de 30 minutos
    session_unset();     //Variável para o tempo de execução 
    session_destroy();   //Destruir os dados da sessão no armazenamento
   
   
   
     header('Location: index.php');
     
   }
   $_SESSION['LAST_ACTIVITY'] = time();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logo_paz.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <title>Document</title>
</head>
<body>
<?php echo "Bem-vindo, " . $_SESSION['nome'];
$_SESSION['id'];
$_SESSION['rede'];
$_SESSION['funcao'];
$_SESSION['senha'];




?>
</body>
</html>