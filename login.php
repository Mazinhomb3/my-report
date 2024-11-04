
<?php

// Conexão com o banco de dados
require ("conect.php");

// Inicia sessões
session_start();

// Recupera o login



$usuario = isset($_POST["usuario"]) ? addslashes(trim($_POST["usuario"])) : FALSE;
$idcelula = isset($_POST["idcelula"]) ? ($_POST["idcelula"]) : FALSE;

$_SESSION['mtp'] = $_POST['mtp'];
$_SESSION['mcp'] = $_POST['mcp'];
$_SESSION['cp'] = $_POST['cp'];
$_SESSION['cria'] = $_POST['cria'];



// Usuário não forneceu a senha ou o login
if(!$usuario || !$idcelula)
{
	echo "Você deve digitar sua senha e login!";
	exit;
}

$sql = "SELECT * FROM tbl_dados WHERE nome_lider = '$usuario' AND cod_lider_rede = '$idcelula'";

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

  header('Location: cadastro.php');
} else {
 
echo "Lider ou ID de celula errado!";

}

?>


