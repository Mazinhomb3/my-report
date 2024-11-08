<?php
/*$servername = "br210.hostgator.com.br"; // ou o endereço do servidor MySQL
$username = "myrepo89_mazinho";
$password = "#(J4B7U?x9^C";
$dbname = "myrepo89_db_relatorios";
*/
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