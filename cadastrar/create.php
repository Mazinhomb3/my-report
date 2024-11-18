<?php

// Inicia a sessão para armazenar e acessar variáveis de sessão.
session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>

<body>

    <!-- Links para navegação entre as páginas de listagem e cadastro de usuários -->
    <a href="index.php">Listar</a><br>
    <a href="create.php">Cadastrar</a><br><br>

    <h2>Cadastrar Usuário</h2>

    <?php

    // Importa a classe Connection que estabelece a conexão com o banco de dados.
    require './Connection.php';

    // Importa a classe Users que realiza a consulta aos usuários.
    require './Users.php';

    // Filtra os dados do formulário enviados via POST.
    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Verifica se o formulário foi submetido.
    if (!empty($formData['AddUser'])) {

        // Cria uma nova instância da classe Users.
        $createUser = new Users();
        
        // Define os dados do formulário na instância da classe Users.
        $createUser->setFormData($formData);
        
        // Tenta criar um novo usuário no banco de dados.
        $value = $createUser->create();

        // Verifica se o usuário foi criado com sucesso.
        if ($value) {
            // Define uma mensagem de sucesso na sessão e redireciona para a página de listagem.
            $_SESSION['msg'] = "<p style='color: #086;'>Usuário cadastrado com sucesso!</p>";
            header("Location: index.php");
        } else {
            // Exibe uma mensagem de erro se o cadastro falhar.
            echo "<p style='color: #f00;'>Usuário não cadastrado!</p>";
        }
    }
    ?>

    <!-- Formulário para cadastro de um novo usuário -->
    <form method="POST" action="">

        <label>Nome: </label>
        <input type="text" name="name" placeholder="Nome completo" required><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Melhor e-mail" required><br><br>

        <input type="submit" name="AddUser" value="Cadastrar">
    </form>

</body>

</html>
