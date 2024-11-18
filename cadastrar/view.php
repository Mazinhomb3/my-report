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
    <title>Celke</title>
</head>

<body>

    <h2>Visualizar Usuário</h2>

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
        require ('./Connection.php');

        // Importa a classe Users que realiza a consulta ao usuário.
        require ('./Users.php');

        // Instancia a classe Users e define o ID do usuário a ser visualizado.
        $viewUser = new Users();
        $viewUser->setId($id);

        // Executa o método view() para obter os detalhes do usuário.
        $valueUser = $viewUser->view();

        // Verifica se o usuário foi encontrado e exibe os detalhes.
        if (isset($valueUser['id'])) {

            // Extrai as chaves do array associativo para variáveis individuais.
            extract($valueUser);

            // Exibe o ID, nome e e-mail do usuário.
            echo "Id do usuário: $id <br>";
            echo "Nome do usuário: $nome <br>";
            echo "Nome do usuário: $rede <br>";
            echo "Função do usuário: $funcao <br>";
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

</body>

</html>
