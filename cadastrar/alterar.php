<?php 

include('../conexao.php');

$nome = $_POST["nome"];
$nomemd5 = $_POST["nome"];
$senha = $_POST["senha"];
$senhamd5 = md5($senha);
$rede = $_POST["rede"];
$funcao = $_POST["funcao"];

$sql = "SELECT * FROM tbl_lider_sup WHERE nome = '$nome' && senha = '$senhamd5' ";

$result = $conexao->$sql();



if ($result > 0) {
    $update = "UPDATE tbl_lider_sup set `nome`='$nome',`nome_login`='$nomemd5', `rede`='$rede',`senha`='$senhamd5',`funcao`='$funcao' WHERE id = '$id' ";
} else {
    # code...
}


?>