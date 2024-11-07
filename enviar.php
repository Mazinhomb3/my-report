<?php


session_start();


require ("conect.php");

// Adicionar as informações do produto no banco de dados

    $supervisor_rede_lider = $_SESSION['supervisor_rede_lider'];
    $rede_lider = $_SESSION['rede_lider'];
    $cor_rede_lider = $_SESSION['cor_rede_lider'];
    $distrito_lider = $_SESSION['distrito_lider'];
    $area_lider = $_SESSION['area_lider'];
    $setor_lider = $_SESSION['setor_lider'];
    $lider = $_SESSION['nome_lider'];
    $cod_lider_rede = $_SESSION['cod_lider_rede'];
    $mtp = $_SESSION['mtp'];
    $mcp = $_SESSION['mcp'];
    $convPres = $_SESSION['cp'];
    $cria = $_SESSION['cria'];
    $hoje = date('Y/m/d');

    $insertDados = "INSERT INTO tbl_dados(cod_lider_rede, nome_lider, supervisor_rede_lider, rede_lider, cor_rede_lider, distrito_lider, area_lider, setor_lider, 
    data_lider, membros_celula, membroscomp_celula, convidadospres_celula, criancas_celula, totalpres_celula ) VALUES ('$cod_lider_rede', '$lider', '$supervisor_rede_lider', 
    '$rede_lider', '$cor_rede_lider', '$distrito_lider', '$area_lider', '$setor_lider', '$hoje', '$mtp', '$mcp', '$convPres', '$cria')";
  
print_r($_SESSION);

  if ($conexao->query($insertDados) === TRUE) {
    echo "Cadastro realizado com sucesso!";
  } else {
    echo "Erro ao cadastrar: " . $conexao->error;
  }




$url = "index.php";

header('Location: '.$url);

$connection->close();
?>