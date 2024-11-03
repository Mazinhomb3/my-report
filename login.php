
<?php

// Conexão com o banco de dados
require ("conect.php");

// Inicia sessões
session_start();

// Recupera o login
$usuario = isset($_POST["usuario"]) ? addslashes(trim($_POST["usuario"])) : FALSE;
// Recupera a senha, a criptografando em MD5
$idcelula = isset($_POST["idcelula"]) ? md5(trim($_POST["idcelula"])) : FALSE;

// Usuário não forneceu a senha ou o login
if(!$usuario || !$idcelula)
{
	echo "Você deve digitar sua senha e login!";
	exit;
}


$query = "select nome_lider from tbl_dados where nome_lider = '{usuario}' and cod_lider_rede = '{idcelula}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

exit;

if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: painel.php');
    exit();
}else{
    $_SESSION['nao autenticado'] = true;
    header('Location: index.php');
    exit();
}

?>