<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    <link rel="shortcut icon" href="../img/logo_paz.ico" type="image/x-icon">
    <title>Paz Santarém</title>
</head>
<body>
  
</body>
</html>

<?php
session_start();

require('../conexao.php');

$usuario = $_POST["usuario"];
$usuariomd5 = md5($usuario);
$senha = $_POST["senha"];
$senhamd5 = md5("$senha");
$funcao = "editor";


$sql = "SELECT * FROM tbl_login_sup where nome_login = '$usuariomd5' && senha = '$senhamd5' ";

$result = $conexao->query($sql);

if ($result->num_rows > 0) {

  $row = $result->fetch_assoc();

  $_SESSION['id'] = $row['id'];
  $_SESSION['nome'] = $row['nome'];
  $_SESSION['senha'] = $row['senha'];
  $_SESSION['funcao'] = $row['funcao'];
  $_SESSION['nivel'] = $row['nivel'];

  $nivel = $_SESSION['nivel'];

  if ($nivel == 6) {
    header('Location: index2.php');
  }else{
   
    echo "<body><div align=center> Seu nivel não e suficiente para essa auteração, entre em contato com administrador! </div></body>";
    
      
    
  }

  
} else {






?>

  <!DOCTYPE html>
  <html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    <link rel="shortcut icon" href="../img/logo_paz.ico" type="image/x-icon">
    <title>Erro</title>
  </head>

  <body>
    <div class="titulo1">
      <?php echo "Usuário ou senha incorretos."; ?>
    </div>
  <?php } ?>
  </body>

  </html>