<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>

<body>

    <h2>Listar Usuários</h2>

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
        echo "Função: $funcao <br>";
        echo "<hr>";
    }
    ?>

</body>

</html>