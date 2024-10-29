<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php

require './Usuarios.php';

$listarUsuarios=new Usuarios();

$listarUsuarios->listar();


?>    




</body>
</html>