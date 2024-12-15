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


require('../conexao.php');

$corQuery = "SELECT DISTINCT rede FROM tbl_login_sup ORDER BY rede ASC";

$result = mysqli_query($conexao, $corQuery);

$corQuery = "SELECT DISTINCT funcao FROM tbl_login_sup ORDER BY funcao ASC";

$result1 = mysqli_query($conexao, $corQuery);

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
    <div class="logo">
        <img src="../img/logosup.png" class="logopaz" alt="">
    </div>

    <div class="titulo">
        <h2>Cadastrar Usuário</h2>
    </div>

    <?php

    // Importa a classe Connection que estabelece a conexão com o banco de dados.
    require('./Connection.php');

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
            header("Location: cadastrar.php");
        } else {
            // Exibe uma mensagem de erro se o cadastro falhar.
            echo "<p style='color: #f00;'>Usuário não cadastrado!</p>";
        }
    }
    ?>
    <div class="form">
        <table align="center">
            <!-- Formulário para cadastro de um novo usuário -->
            <form method="POST" action="">
                <tr>
                    <td class="inputs">
                        <label>Nome: </label>
                    </td>
                    <td>
                        <input type="text" name="nome" placeholder="Primeiro nome" class="respostas" required>
                    </td>
                </tr>
                <tr>
                    <td class="inputs">
                        <label>Senha: </label>
                    </td>
                    <td>
                        <input type="text" name="senha" placeholder="Senha" class="respostas" required>
                    </td>
                </tr>
                <tr>
                    <td class="inputs">
                        <label>Rede: </label>
                    </td>
                    <td>
                        <select name="rede" id="rede" align="center" class="respostas" required>
                            <option value=""></option>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row['rede']; ?>"><?php echo $row['rede']; ?></option>
                            <?php } ?>
                        </select>
                    </td>

                </tr>

                <tr>
                    <td class="inputs">
                        <label>Função: </label>
                    </td>
                    <td>
                        <select name="funcao" id="funcao" align="center" class="respostas" required>
                            <?php while ($row = mysqli_fetch_assoc($result1)) { 
                                ?>
                                <option value="<?php echo $row['funcao']; ?>"><?php echo $row['funcao']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>


       
        </table>
        <div class="botaocentro">
            <tr>

                <td>
                    <input type="submit" name="AddUser" class="botao2" value="Cadastrar"><br>
                </td>
            </tr>
        </div>

        </form>

    </div>

    <div class="botaocentro">
        <ul class="link">
            <tr>
                <td><a href="listar.php" class="botao2">Listar</a><br>

        </ul>
    </div>

</body>

</html>