<?php

// Inicia a sessão para armazenar e acessar variáveis de sessão.
session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/medias.css">
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    <title>Celke</title>
</head>

<body>
<div class="logo">           
    <img src="../img/logosup.png" class="logopaz"  alt="">
    </div>
     
<div class="titulo">
    <h2>Cadastrar Usuário</h2>
    </div>

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
<div class="form">
    <table align="center" border="0">
    <!-- Formulário para cadastro de um novo usuário -->
    <form method="POST" action="">
    <tr>
        <td>
        <label class="inputs">Nome: </label>
        <input type="text" name="nome" placeholder="Primeiro nome" class="respostas" required><br><br>
        </td>
    </tr>
    <tr>
        <td>
        <label class="inputs">Rede: </label>
        <input type="text" name="rede" placeholder="Rede" class="respostas" required><br><br>
        </td>
    </tr>
    <tr>
        <td>
        <label class="inputs">Senha: </label>
        <input type="password" name="senha" placeholder="Senha" class="respostas" required><br><br>    
        </td>
    </tr>
    <tr>
        <td>
        <label class="inputs">Função: </label>
        <input type="text" name="funcao" placeholder="Função" class="respostas" required><br><br>    
        </td>
    </tr>
    <tr>
        <td>
        
        <input type="submit" name="AddUser" class="botao2" value="Cadastrar"><br>
        </td>
    </tr>
    </form>
    
    </div>

<div class="div-botao1">
 <ul class="link">

<tr><td><a href="listar.php" class="botao2">Listar</a><br>
<tr><td><a href="https://www.youtube.com/@pazsantarempa" class="botao2">Auterar</a><br></td></tr>
<tr><td><a href="https://www.instagram.com/pazsantarempa/" class="botao2">Deletar</a><br></td></tr>
</table>
</ul>
    </div>



</body>

</html>
