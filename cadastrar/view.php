<?php

/**
 * Inicia a sessão para armazenar e acessar variáveis de sessão.
 */
session_start();

/**
 * Ativa o buffer de saída para permitir redirecionamentos após o envio de cabeçalhos.
 */
ob_start();

/**
 * Obtém e sanitiza o ID do usuário da URL.
 * 
 * @var int|null $id ID do usuário ou null se não fornecido.
 */
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

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
    <div class="titulo">
        <h2>Visualizar Usuário</h2>
    </div>
    <?php
    // Verifica se existe uma mensagem armazenada na sessão.
    if (isset($_SESSION['msg'])) {
        // Imprime a mensagem na tela.
        echo $_SESSION['msg'];

        // Remove a mensagem da sessão para evitar que ela seja exibida novamente ao recarregar a página.
        unset($_SESSION['msg']);
    }

    // Verifica se o ID foi fornecido e não está vazio.
    if (!empty($id)) {

        // Importa a classe Connection que estabelece a conexão com o banco de dados.
        require('./Connection.php');

        // Importa a classe Users que realiza a consulta ao usuário.
        require('./Users.php');

        // Instancia a classe Users e define o ID do usuário a ser visualizado.
        $viewUser = new Users();
        $viewUser->setId($id);

        // Executa o método view() para obter os detalhes do usuário.
        $valueUser = $viewUser->view();

        // Verifica se o usuário foi encontrado e exibe os detalhes.
        if (isset($valueUser['id'])) {

            // Extrai as chaves do array associativo para variáveis individuais.
            extract($valueUser);

        } else {

            // Armazena uma mensagem de erro na sessão se o usuário não for encontrado.
            $_SESSION['msg'] = "<p style='color: #f00;'>Usuário não encontrado!</p>";

            // Redireciona para a página de listagem de usuários.
            header("Location: index.php");
        }
    } else {
        // Armazena uma mensagem de erro na sessão se o ID não for válido.
        $_SESSION['msg'] = "<p style='color: #f00;'>Usuário não encontrado!</p>";

        // Redireciona para a página de listagem de usuários.
        header("Location: index.php");
    }
    ?>

    <div class="tabela">
        <table align="center" border="0">
            <tr>
                <td class="list">ID: <?php echo "$id <br>"; ?></td>
            </tr>
            <tr>
                <td class="list">Nome: <?php echo "$nome <br>"; ?></td>
            </tr>
            <tr>
                <td class="list">Rede: <?php echo "$rede <br>"; ?></td>
            </tr>
            <tr>
                <td class="list">Função: <?php echo "$funcao <br>"; ?></td>
            </tr>

            <td align="center">
                <a class="botaoedit" href="edit.php?id=<?php echo $id ?? ''; ?>">Editar</a>
            </td>
            <tr>
            <td align="center">
                <a class="botaoedit" href="delete.php?id=<?php echo $id ?? ''; ?>">Delete</a>
            </td>
            </tr>

        </table>

    </div>


</body>

</html>