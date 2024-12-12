<?php


if (!isset($_SESSION))
  session_start();

require('../conexao.php');


$rede = $_SESSION['rede'];
$distrito = $_SESSION['distrito'];
$nome = $_SESSION['nome'];


$sql = "SELECT DISTINCT * FROM tbl_dados where cor_rede_lider = '$rede'";

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





  header('Location: nivel.php');
} else {
  echo "Dados não aramazenados.";
}
