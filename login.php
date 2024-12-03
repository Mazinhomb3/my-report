<?php

session_start();

require("conexao.php");


$usuario = $_POST['usuario'];
$senha = $_POST['idcelula'];
$mtp = $_POST['mtp'];
$mcp = $_POST['mcp'];
$cp = $_POST['cp'];
$cria = $_POST['cria'];
$tipo = $_POST['tipo'];
$valor = $_POST["valor"];

$sql = "SELECT * FROM tbl_redes where cod_lider_rede = '$senha' limit 1 ";

$result = $conexao->query($sql);

if ($result->num_rows > 0) {

  $resultado = $result->fetch_assoc();
  $_SESSION["cod_lider_rede"] = $resultado["cod_lider_rede"];
  $_SESSION["supervisor_rede_lider"] = $resultado["superv_rede"];
  $_SESSION["cor_rede_lider"] = $resultado["cor_rede"];
  $_SESSION["rede_lider"] = $resultado["pr_rede"];
  $_SESSION["distrito_lider"] = $resultado["distrito_rede"];
  $_SESSION["area_lider"] = $resultado["area_rede"];
  $_SESSION["setor_lider"] = $resultado["setor_rede"];
  $_SESSION["nome_lider"] = $resultado["lider_cel_rede"];

  $_SESSION['mtp'] = $mtp;
  $_SESSION['mcp'] = $mcp;
  $_SESSION['cp'] = $cp;
  $_SESSION['cria'] = $cria;
  $_SESSION['tipo'] = $tipo;
  $_SESSION['valor'] = $valor;

  $sqldata = "SELECT data_lider from tbl_dados where cod_lider_rede = '$senha' order by data_lider desc";

  $resultdata = $conexao->query($sqldata);

  if ($resultdata->num_rows > 0) {
    $resultado = $resultdata->fetch_assoc();

    $_SESSION['data_lider'] = $resultado['data_lider'];
  }

  header('Location: cadastro.php');
} else {



?>

  <!DOCTYPE html>
  <html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/estilo.css">
    <link rel="shortcut icon" href="./img/logo_paz.ico" type="image/x-icon">
    <title>Paz Santarém</title>
  </head>

  <body>
    <div class="erro">
      <h3 class="erro"><?php echo "ID INVÁLIDO!"; ?></h3>
    <?php } ?>
    </div>
  </body>

  </html>