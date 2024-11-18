<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    <link rel="shortcut icon" href="../img/logo_paz.ico" type="image/x-icon">
    <title>Celke</title>
</head>

<body>
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

        // Exibe o ID, nome e e-mail do usuário.
        echo "ID: $id <br>";
        echo "Nome: $nome <br>";
        echo "Rede: $rede <br>";
        echo "Função: $funcao <br>";

        echo "<a href='view.php?id=$id'>Visualizar</a>";
        
        echo "<hr>";
    }
    ?>

</body>

</html>