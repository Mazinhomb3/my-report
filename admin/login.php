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



$sql = "SELECT * FROM tbl_login_sup where nome_login = '$usuariomd5' && senha = '$senhamd5' && funcao = '$funcao' limit 1";

$result = $conexao->query($sql);

if ($result->num_rows > 0) {

  $row = $result->fetch_assoc();


  $_SESSION['id'] = $row['id'];
  $_SESSION['nome'] = $row['nome'];
  $_SESSION['rede'] = $row['rede'];
  $_SESSION['funcao'] = $row['funcao'];
  $_SESSION['nivel'] = $row['nivel'];
  $_SESSION['dtini'] = $dtini;
  $nivel = $_SESSION['nivel'];

  if ($nivel == 1) {
    header('Location: lider.php');
  }elseif ($nivel == 2) {
    header('Location: setor.php');
  }
  
} else {
  echo "Usuário ou senha incorretos.";
}
