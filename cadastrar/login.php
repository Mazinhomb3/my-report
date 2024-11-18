<?php
 session_start();

 require ('../conexao.php');

$usuario = $_POST["usuario"];
$usuariomd5=md5($usuario);
$senha = $_POST["senha"];
$senhamd5 = md5("$senha");



$sql = "SELECT * FROM tbl_login_sup where nome_login = '$usuariomd5' && senha = '$senhamd5' ";

$result = $conexao->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    $_SESSION['id'] = $row['id'];
    $_SESSION['nome'] = $row['nome'];
    $_SESSION['senha'] = $row['senha'];
    
    
    header('Location: index2.php');
  } else {
    echo "Usuário ou senha incorretos.";
  }



?>    