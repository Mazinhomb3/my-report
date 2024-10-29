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

$resultadoUsuarios=$listarUsuarios->listar();

foreach($resultadoUsuarios as $rowUsuario){

extract($rowUsuario);

echo "Nome do usuario: $nome_lider<br>";
echo "Id do usuario: $cod_lider_rede<br>";
echo "Supervisor de Rede: $supervisor_rede_lider<br>";
echo "Pr. de Rede: $rede_lider<br>";
echo "Pr. de Distrito: $distrito_lider<br>";
echo "Sup. de Area: $area_lider<br>";
echo "Sup. de setor: $setor_lider<br>";
echo"<hr>";

}
?>    




</body>
</html>