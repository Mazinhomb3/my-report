<?php
if (!isset($_SESSION))
session_start();
// Estabelece o nivel da sessao
$nivel_necessario = 5;


// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION["nome"]) or ($_SESSION["nivel"] < $nivel_necessario)) {
// Destrói a sessão por segurança
session_destroy();
// Redireciona o visitante de volta pro login
header("Location: index.php");
exit;
}
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