<?php
session_start();

require('../conexao.php');

$usuario = $_POST["usuario"];
$usuariomd5 = md5($usuario);
$senha = $_POST["senha"];
$senhamd5 = md5("$senha");
$cor_rede = $_POST["cor_rede"];
$funcao = $_POST["funcao"];
$dtini = $_POST["dtini"];



$sql = "SELECT * FROM tbl_login_sup where nome_login = '$usuariomd5' && senha = '$senhamd5' ";

$result = $conexao->query($sql);

if ($result->num_rows > 0) {

  $row = $result->fetch_assoc();


  $_SESSION['id'] = $row['id'];
  $_SESSION['nome'] = $row['nome'];
  $_SESSION['rede'] = $cor_rede;
  $_SESSION['funcao'] = $funcao;
  $_SESSION['nivel'] = $row['nivel'];
  $_SESSION['dtini'] = $dtini;
  $nivel = $_SESSION['nivel'];

  if ($nivel == 1) {
    header('Location: lider.php');
  } elseif ($nivel == 2) {
    header('Location: setor.php');
  } elseif ($nivel == 3) {
    header('Location: area2.php');
  } elseif ($nivel == 4) {
    header('location: distrito.php');
  } elseif ($nivel == 5) {
    header('location: suprede.php');
  }
} else {



?>

  <!DOCTYPE html>
  <html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="shortcut icon" href="../img/logo_paz.ico" type="image/x-icon">
    <title>Paz Santarém</title>
  </head>

  <body>
    <div class="erro">
      <?php echo "Usuário ou senha incorretos.<br> Mande uma msg para o admin@my-report.site"; ?>
    <?php } ?>
    </div>
  </body>

  </html>