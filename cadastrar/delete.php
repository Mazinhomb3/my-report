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

ob_start();

/**
 * Obtém e sanitiza o ID do usuário da URL.
 * 
 * @var int|null $id ID do usuário ou null se não fornecido.
 */
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {

    // Importa a classe Connection que estabelece a conexão com o banco de dados.
    require './Connection.php';

    // Importa a classe Users que realiza a consulta ao usuário.
    require './Users.php';

    // Instancia a classe Users e define o ID do usuário para a operação de exclusão.
    $deleteUser = new Users();
    $deleteUser->setId($id);

    
    $valueUser = $deleteUser->delete();

    
    if ($valueUser) {

        
        $_SESSION['msg'] = "<p style='color: #086;'>Usuário apagado com sucesso!</p>";

       
        header("Location: index.php");
    } else {

        
        $_SESSION['msg'] = "<p style='color: #f00;'>Usuário não apagado!</p>";

        
        header("Location: index.php");
    }
} else {

   
    $_SESSION['msg'] = "<p style='color: #f00;'>Usuário não encontrado!</p>";

   
    header("Location: index.php");
}
