<?php

require 'Handler.php';

$dados = Handler::arrayHandler();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <li>
<p>
    <?=$dados['usuario']?>
</p>
</li>


    
</body>
</html>
