<?php
// Inicia a sessão para armazenar e acessar variáveis de sessão.
session_start();

require('../conexao.php');

if (!isset($_SESSION['nome']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    //A última solicitação foi há mais de 30 minutos
    session_unset();     //Variável para o tempo de execução 
    session_destroy();   //Destruir os dados da sessão no armazenamento

    header('Location: index.php');
}
$_SESSION['LAST_ACTIVITY'] = time();

$dados['supervisor_rede_lider'] = $_SESSION['supervisor_rede_lider'];
$dados['rede_lider'] = $_SESSION['rede_lider'];
$dados['cor_rede_lider'] = $_SESSION['cor_rede_lider'];
$dados['distrito_lider'] = $_SESSION['distrito_lider'];
$dados['area_lider'] = $_SESSION['area_lider'];
$dados['setor_lider'] = $_SESSION['setor_lider'];
$dados['cod_lider_rede'] = $_SESSION['cod_lider_rede'];
$dados['nome_lider'] = $_SESSION['nome_lider'];
$dados['mtp'] = $_SESSION['mtp'];
$dados['mcp'] = $_SESSION['mcp'];
$dados['cp'] = $_SESSION['cp'];
$dados['cria'] = $_SESSION['cria'];
$dados['tipo'] = $_SESSION['tipo'];
$dados['valor'] = $_SESSION['valor'];
$data = $_SESSION['data_lider'];
$datahoje = date('Y-m-d');



?>