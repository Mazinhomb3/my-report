<?php

session_start();

require ("conexao.php");


$usuario = $_POST ['usuario'];
$senha = $_POST ['idcelula'];
$mtp = $_POST ['mtp'];
$mcp = $_POST ['mcp'];
$cp = $_POST ['cp'];
$cria = $_POST ['cria'];
$tipo = $_POST ['tipo'];
$valor = $_POST ["valor"];

$sqldata = "SELECT data_lider from tbl_dados where cod_lider_rede = '$senha' order by data_lider desc";

$resultdata = $conexao->query( $sqldata );

if ($resultdata->num_rows > 0) {
    $resultado = $resultdata->fetch_assoc();

    $_SESSION['data_lider'] = $resultado['data_lider'];

    

    $sql="SELECT * FROM tbl_redes where cod_lider_rede = '$senha' limit 1 ";

    $result = $conexao->query( $sql );

    if ($result->num_rows > 0) {

        $resultado = $result->fetch_assoc();

        $_SESSION["superv_rede"] = $resultado["superv_rede"];
        $_SESSION["cor_rede"] = $resultado["cor_rede"];
        $_SESSION["pr_rede"] = $resultado["pr_rede"];
        $_SESSION["distrito_rede"] = $resultado["distrito_rede"];
        $_SESSION["area_rede"] = $resultado["area_rede"];
        $_SESSION["setor_rede"] = $resultado["setor_rede"];
        $_SESSION["lider_cel_rede"] = $resultado["lider_cel_rede"];

        $_SESSION['mtp'] = $mtp;
        $_SESSION['mcp'] = $mcp;
        $_SESSION['cp'] = $cp;
        $_SESSION['cria'] = $cria;
        $_SESSION['tipo'] = $tipo;
        $_SESSION['valor'] = $valor;

        header('Location: cadastro.php');

    }else {
        echo "ID INVÁLIDO!";
    }
        

}else{
echo"DADOS NÃO ENCONTRADOS!";
}

?>