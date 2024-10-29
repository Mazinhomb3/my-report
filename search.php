<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca</title>
</head>
<body>
<?php

$host="localhost";
$port= 3306;
$user= "root";
$pass= "";
$db= "db_relatorio";

$conn=mysqli_connect($host,$port,$user,$pass);

$termodebusca=$_GET['term'];

$query=$db->query("SELECT * FROM tbl_dados ");



?>    



</body>
</html>