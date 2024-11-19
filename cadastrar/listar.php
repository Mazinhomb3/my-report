<?php
session_start();


if (!isset($_SESSION['nome']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    //A última solicitação foi há mais de 30 minutos
    session_unset();     //Variável para o tempo de execução 
    session_destroy();   //Destruir os dados da sessão no armazenamento

     header('Location: index.php');
     
   }
   $_SESSION['LAST_ACTIVITY'] = time();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    <link rel="shortcut icon" href="../img/logo_paz.ico" type="image/x-icon">
    <title>Paz Santarém</title>
</head>

<body>
<div class="login"><?php echo "Bem vindo, " . $_SESSION['nome'] . "!";?></div>
<div class="titulo">
    <h2>Listar Usuários</h2>
    </div>
    <?php
    // Importa a classe Connection que estabelece a conexão com o banco de dados.
    require './Connection.php';

    // Importa a classe ListUsers que realiza a consulta aos usuários.
    require './ListUsers.php';

    // Instancia a classe ListUsers e armazena a referência em $listUsers.
    $listUsers = new ListUsers();

    // Executa o método list() para obter os usuários do banco de dados e armazena o resultado em $resultUsers.
    $resultUsers = $listUsers->list();

    // Percorre cada usuário retornado pela consulta.
    foreach ($resultUsers as $rowUser) {
        // Extrai as chaves do array associativo para variáveis individuais.
        extract($rowUser);

    
   
    ?>
    <div class="tabela">
<table align="center" border="0">
        <?php extract($rowUser);?>
        <tr>
            <td class="list">ID: <?php echo "$id <br>";?></td>
            
        </tr>
        <tr>
            <td class="list">Nome: <?php echo "$nome <br>";?></td>
            
        </tr>
        <tr>
            <td class="list">Rede: <?php echo "$rede <br>";?></td>
            
        </tr>
        <tr>
            <td class="list">Função: <?php echo "$funcao <br>";?></td>
           
        </tr>
        <tr align="center">
            <td class="botao3">
            <?php echo "<a href='view.php?id=$id'><span style='color:white;'>Visualizar</span></a>";?>
            </td>
        </tr>
        <tr class="list"><?php echo "<br>";?></tr>
    </table> 
        <?php }?>
        </div>    
            

</body>

</html>