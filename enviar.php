<?php
include "conect.php";

// Adicionar as informações do produto no banco de dados
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $supervisor_rede_lider = $dados['supervisor_rede_lider'];
    $rede_lider = $dados['rede_lider'];
    $cor_rede_lider = $dados['cor_rede_lider'];
    $distrito_lider = $dados['distrito_lider'];
    $area_lider = $dados['area_lider'];
    $setor_lider = $dados['setor_lider'];
    $lider = $dados;['nome_lider'];
    $cod_lider_rede = $dados;['cod_lider_rede'];
    $mtp = $dados;['mtp'];
    $mcp = $dados;['mcp'];
    $convPres = $dados;['cp'];
    $cria = $dados;['cria'];
    $hoje = date('Y/m/d');
    $insertDados = "INSERT INTO tbl_dados(cod_lider_rede, nome_lider, supervisor_rede_lider, rede_lider, cor_rede_lider, distrito_lider, area_lider, setor_lider, 
    data_lider, membros_celula, membroscomp_celula, convidadospres_celula, criancas_celula, total_pres_celula ) VALUES ('$cod_lider_rede', '$lider', '$supervisor_rede_lider', 
    '$rede_lider', '$cor_rede_lider', '$distrito_lider', '$area_lider', '$setor_lider', '$hoje', '$mtp', '$mcp', '$convPres', '$cria')";
    $connection->query($insertDados);
}

$url = "index.php";

header('Location: '.$url);

$connection->close();
?>