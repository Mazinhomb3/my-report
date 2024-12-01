<?php
session_start();


if (!isset($_SESSION['nome']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    //A última solicitação foi há mais de 30 minutos
    session_unset();     //Variável para o tempo de execução 
    session_destroy();   //Destruir os dados da sessão no armazenamento

    header('Location: index.php');
}
$_SESSION['LAST_ACTIVITY'] = time();

// Importa a classe Connection que estabelece a conexão com o banco de dados.
require './Connection.php';

// Importa a classe ListUsers que realiza a consulta aos usuários.
require './ListUsers.php';

// Instancia a classe ListUsers e armazena a referência em $listUsers.
$listUsers = new ListUsers();

// Executa o método list() para obter os usuários do banco de dados e armazena o resultado em $resultUsers.
$resultUsers = $listUsers->list();

// Percorre cada usuário retornado pela consulta.

// Extrai as chaves do array associativo para variáveis individuais.


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
    <div class="login"><?php echo "Bem vindo, " . $_SESSION['nome'] . "!"; ?></div>
    <div>
        <table border="1" align="center">
            <caption>Cadastros</caption>
            
            <thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
                        <th>Rede</th>
                        <th>Função</th>
					</tr>
				</thead>
            <?php
            foreach ($resultUsers as $rowUser) {

            ?>
            <tbody>
                <tr>
                    <?php extract($rowUser); ?>
                    <td><?php echo "$id"; ?></td>
                    <td><?php echo "$nome"; ?></td>
                    <td><?php echo "$rede"; ?></td>
                    <td><?php echo "$funcao"; ?></td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>

</body>

</html>