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
$valor = $_POST ['valor'];



$sql = "SELECT * FROM tbl_dados where  cod_lider_rede = '$senha' order by data_lider ";

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
    echo "Usuário ou senha incorretos.";
  }

?>