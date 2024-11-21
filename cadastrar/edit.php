<?php

// Inicia a sessão para armazenar e acessar variáveis de sessão.
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

// Importa a classe Connection que estabelece a conexão com o banco de dados.
require './Connection.php';

// Importa a classe Users que realiza a consulta ao usuário.
require './Users.php';

require('../conexao.php');

$corQuery="SELECT DISTINCT rede FROM tbl_login_sup ORDER BY rede ASC";

$result = mysqli_query($conexao, $corQuery);

$corQuery="SELECT DISTINCT funcao FROM tbl_login_sup ORDER BY funcao ASC";

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

    <!-- Links para navegação entre as páginas de listagem e cadastro de usuários -->
    <a href="index.php">Listar</a><br>
    <a href="view.php?id=<?php echo $id ?? ''; ?>">Visualizar</a><br><br>
    <div class="titulo">
    <h2>Cadastrar Usuário</h2>
    </div>
    <?php

    // Filtra os dados do formulário enviados via POST.
    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Verifica se o formulário foi submetido.
    if (!empty($formData['EditUser'])) {

        // Cria uma nova instância da classe Users.
        $updateUser = new Users();

        // Define os dados do formulário na instância da classe Users.
        $updateUser->setFormData($formData);

        // Tenta editar o usuário no banco de dados.
        $value = $updateUser->edit();

        // Verifica se o usuário foi editado com sucesso.
        if ($value) {
            // Define uma mensagem de sucesso na sessão e redireciona para a página de visualização.
            $_SESSION['msg'] = "<p style='color: #086;'>Usuário editado com sucesso!</p>";
            // Redireciona para a página de visualização do usuário.
            header("Location: view.php?id=$id");
        } else {
            // Exibe uma mensagem de erro se a edição falhar.
            echo "<p style='color: #f00;'>Usuário não editado!</p>";
        }
    }

    // Verifica se o ID do usuário foi fornecido.
    if (!empty($id)) {

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

            return;
        }
    }
    ?>
<table border="1" align="center">
    <!-- Formulário para edição de um usuário existente -->
    <form method="POST" action="">

        <!-- Campo oculto para armazenar o ID do usuário -->
        <input type="hidden" name="id" value="<?php echo $id ?? ''; ?>">
    <tr><td>
        <!-- Campo para edição do nome do usuário -->
        <label>Nome: </label>
        <input type="text" name="name" placeholder="Nome completo" value="<?php echo $name ?? ''; ?>" required>
        </td>    
    </tr>
    <tr><td>
        <!-- Campo para edição do e-mail do usuário -->
        <label>Rede: </label>
        
        <select name="rede" id="rede" align="center" class="respostas" >
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <option  value="<?php echo $row['rede']; ?>"><?php echo $row['rede']; ?></option>
        <?php } ?>
        </select>
        </td>
        <tr><td>
        <label>Função: </label>
        
        
        <select name="funcao" id="funcao" align="center"  class="respostas">
        <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
        <option value="<?php echo $row['funcao']; ?>"><?php echo $row['funcao']; ?></option>
        <?php } ?>
        </select>
        </td>
        </tr>
        <tr><td align="center">
            <!-- Botão para submeter as alterações -->
        <input align="center"  class="botao3" type="submit" name="EditUser" value="Editar">
        </td></tr>


        
    </form>
    </table>
</body>

</html>
