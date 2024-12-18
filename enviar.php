<?php

require ("conexao.php");

session_start();

if (!isset($_SESSION['nome_lider']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
 //A última solicitação foi há mais de 30 minutos
 session_unset();     //Variável para o tempo de execução 
 session_destroy();   //Destruir os dados da sessão no armazenamento



  header('Location: index.php');
  
}
$_SESSION['LAST_ACTIVITY'] = time();



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
    $tipo = $_SESSION['tipo'];
    $valor = $_SESSION['valor'];
    $hoje = date('Y-m-d');
    $total = $_SESSION['totalpres_celula'];

    

    $insertDados = "INSERT INTO tbl_dados(cod_lider_rede, nome_lider, supervisor_rede_lider, rede_lider, cor_rede_lider, distrito_lider, area_lider, setor_lider, 
    data_lider, membros_celula, membroscomp_celula, convidadospres_celula, criancas_celula, totalpres_celula,oferta_celula, id_rede, tipo_cel_dados) VALUES ('$cod_lider_rede', '$lider', '$supervisor_rede_lider', 
    '$rede_lider', '$cor_rede_lider', '$distrito_lider', '$area_lider', '$setor_lider', '$hoje', '$mtp', '$mcp', '$convPres', '$cria', '$total','$valor', '10', '$tipo')";
  
//print_r($_SESSION);

  if ($conexao->query($insertDados) === TRUE) {
   // echo "Cadastro realizado com sucesso!";

    header('Location: sucesso.php');

  } else {
    echo "Erro ao cadastrar: " . $conexao->error;
  }


$conexao->close();
?>