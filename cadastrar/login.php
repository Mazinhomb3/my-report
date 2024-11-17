<?php
 session_start();

 require('../conexao.php');

$usuario = $_POST["senha"];
$usuariomd5=md5($usuario);
$senha = $_POST["senha"];
$senhamd5 = md5("$senha");
$cor_rede = $_POST["cor_rede"];
$funcao = $_POST["funcao"];



$sql = "SELECT * FROM tbl_login_sup where senha = '$usuariomd5' && senha = '$senhamd5' ";

$result = $conexao->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

   
    $_SESSION['id'] = $row['id'];
    $_SESSION['nome'] = $row['nome'];
    $_SESSION['rede'] = $row['rede'];
    $_SESSION['senha'] = $row['senha'];
    $_SESSION['funcao'] = $row['funcao'];
    

    
    
    header('Location: logado.php');
  } else {
    echo "Usuário ou senha incorretos.";
  }



?>    