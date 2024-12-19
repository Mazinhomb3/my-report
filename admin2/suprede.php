<?php
require '../Conexao.php';

$sql = "SELECT DISTINCT superv_rede FROM `tbl_redes` order by superv_rede asc ";

$result = mysqli_query($conexao, $sql);

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["suprede"];
    $senha = $_POST["senha"];
    $confirma_senha = $_POST["confirma_senha"];

    $data = date('Y-m-d');

    // Verificar se as senhas coincidem
    if ($senha == $confirma_senha) {
        // Cadastrar senha no banco de dados
        // (Lembre-se de hasher a senha!)
        $senha_hash = md5($senha);
        // Inserir no banco de dados



        $sql = "SELECT * FROM tbl_login_sup WHERE nome = '$login'";
        $result = $conexao->query($sql);
        if ($result->num_rows > 0) {
            echo "Usuário já cadastrado!";
        } else {


            $insertDados = "INSERT INTO tbl_login_sup (nome, nome_login, rede, senha, funcao, data_user, nivel) VALUES ('$login', '$login', 'Sup. de Rede', 
        '$senha_hash', 'Sup. de Rede', '$data', '5')";

            //print_r($_SESSION);

            if ($conexao->query($insertDados) === TRUE) {
                // echo "Cadastro realizado com sucesso!";

                header('Location: sucesso.php');
            } else {
                echo "Erro ao cadastrar: " . $conexao->error;
            }


            $conexao->close();
        }
    } else {
        echo "Senhas não são iguais!";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/admin2.css">
    <link rel="shortcut icon" href="../img/logo_paz.ico" type="image/x-icon">
    <title>Paz Santarém</title>
</head>

<body>

    <div class="divi-img">
        <img src="../img/logosup.png" class="img" alt="">
    </div>
    <div class="titulo">
        <h3>Escolha seu nome.</h3>
    </div>
    <div class="form">
        <form action="" method="POST">
            <table align="center" border="0">
                <tr>
                    <td>
                        <select name="suprede" id="suprede">
                            <?php while ($row = mysqli_fetch_assoc($result)) {  ?>
                                <option class="respostas" value="<?php echo $row['superv_rede']; ?>"><?php echo $row['superv_rede']; ?></option>
                            <?php } ?>
                        </select><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Senha</label><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="number" name="senha" required><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Confirmar Senha</label><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="number" name="confirma_senha" required><br>
                    </td>
                </tr>
                <tr>

                    <td><input class="botao" type="submit" value="Cadastrar"></td>

                </tr>
            </table>
        </form>
        <tr>
            <td>
                <a href="suprede.php" class="botao">limpar</a>
            </td>
        </tr>
    </div>
</body>

</html>