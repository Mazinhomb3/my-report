
<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'db_relatorios');
define('PORTA', '3306' );
 
$conexao = mysqli_connect(HOST, PORTA, USUARIO, SENHA, DB) or die ('Não foi possível conectar');