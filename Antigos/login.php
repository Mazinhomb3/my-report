
<?php

session_start();

require ("conexao.php");


$usuario = $_POST ['usuario'];
$senha = $_POST ['idcelula'];
$mtp = $_POST ['mtp'];
$mcp = $_POST ['mcp'];
$cp = $_POST ['cp'];
$cria = $_POST ['cria'];
$tipo = $_POST ['tipo'];
$valor = $_POST ["valor"];



$sql = "SELECT * FROM tbl_dados where  cod_lider_rede = '$senha' order by data_lider desc limit 100";

$result = $conexao->query($sql);

if ($result->num_rows > 0) {  

    $row = $result->fetch_assoc();

    

    $_SESSION['cod_lider_rede'] = $row['cod_lider_rede'];
    $_SESSION['nome_lider'] = $row['nome_lider'];
    $_SESSION['supervisor_rede_lider'] = $row['supervisor_rede_lider'];
    $_SESSION['rede_lider'] = $row['rede_lider'];
    $_SESSION['cor_rede_lider'] = $row['cor_rede_lider'];
    $_SESSION['distrito_lider'] = $row['distrito_lider'];    
    $_SESSION['area_lider'] = $row['area_lider'];
    $_SESSION['setor_lider'] = $row['setor_lider'];
    $_SESSION['data_lider'] = $row['data_lider'];

    $_SESSION['mtp'] = $mtp;
    $_SESSION['mcp'] = $mcp;
    $_SESSION['cp'] = $cp;
    $_SESSION['cria'] = $cria;
    $_SESSION['tipo'] = $tipo;
    $_SESSION['valor'] = $valor;
 

    
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
  <div class="erro" >
<?php  echo "ID de célula incorreto."; ?>
<?php } ?>
  </div>
</body>
</html>