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
    <div class="divtabelalistar">
        <table class="tabelalistar" align="center">
            <caption>Cadastros</caption>
            
            <thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
                        <th>Rede</th>
                        <th>Função</th>
                        <th class="editar" >Editar</th>
					</tr>
				</thead>

            <?php

            foreach ($resultUsers as $rowUser) {

            ?>

            <tbody>
                <tr>
                    <?php extract($rowUser); ?>
                    <td class="id"><?php echo "$id"; ?></td>
                    <td class="nome"><?php echo "$nome"; ?></td>
                    <td class="rede"><?php echo "$rede"; ?></td>
                    <td class="funcao"><?php echo "$funcao"; ?></td>
                    <td>
                        <a class="botaolistar" href="view.php?id=<?php echo "$id" ?>">Edite</a>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>

</body>

</html>