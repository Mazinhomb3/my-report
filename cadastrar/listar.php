<?php

session_start();


require ("../Conexao.php");
require ("./cadastrar/User.php");

if (!isset($_SESSION['nome']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    //A última solicitação foi há mais de 30 minutos
    session_unset();     //Variável para o tempo de execução 
    session_destroy();   //Destruir os dados da sessão no armazenamento
   
   
   
     header('Location: index.php');
     
   }
   $_SESSION['LAST_ACTIVITY'] = time();

  foreach($users as $row):
    htmlspecialchars($row['nome'])

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logo_paz.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <title>Listar</title>
</head>
<body>
    <div>
    <table border="1" align="center">
        <tr>
    <td><?php echo "Bem-vindo, " . $_SESSION['nome'];?></td>
    </tr>
    <td class="nome"><?=htmlspecialchars($row['nome'])?></td>
    </table>
    </div>
    <?php endforeach; ?>
</body>
</html>
