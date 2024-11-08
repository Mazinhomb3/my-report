<?php

require ("conexao.php");

session_start();

$usuario = $_POST ['usuario'];
$senha = $_POST ['idcelula'];


$sql = "SELECT * FROM tbl_dados where nome_lider = '$usuario' && cod_lider_rede = '$senha' order by data_lider desc limit 100";

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

    header('Location: cadastro.php');
  } else {
    echo "Usuário ou senha incorretos.";
  }
?>