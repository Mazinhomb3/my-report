<?php

$servername = "localhost"; // ou o endereço do servidor MySQL
$username = "root";
$password = "";
$dbname = "db_relatorios";

// Criar conexão
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
} 
//echo "Conexão bem-sucedida!";
//$conexao->close();
?>