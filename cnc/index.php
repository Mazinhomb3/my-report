<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./convert.css">
    <link rel="shortcut icon" href="/img/logo_paz.ico" type="image/x-icon">
    <title>Cadastro Conversão</title>
</head>

<body>
    <div class="img">
        <img class="imglg" src="../img/logo_paz.png" alt="">
    </div>
    <div class="titulo">
        <h4>Cadastro de Converção</h4>
    </div>
    <div class="form">
        <form action="enviar.php" class="form" name="form">
            <table align="center" border="0">
                <tr>
                    <td class="pergunta">Nome: </td>
                    <td><input type="text" class="input"></td>
                </tr>
                <tr>
                    <td class="pergunta">Idade: </td>
                    <td><input type="text" class="input"></td>
                </tr>
                <tr>
                    <td class="pergunta">Endereço: </td>
                    <td><input type="text" class="input"></td>
                </tr>
                <tr>
                    <td class="pergunta">Número: </td>
                    <td><input type="number" class="input"></td>
                </tr>
                <tr>
                    <td class="pergunta">Bairro: </td>
                    <td><input type="text" class="input"></td>
                </tr>
                <tr>
                    <td class="pergunta">Contato: </td>
                    <td><input type="number" class="input"></td>
                </tr>
                <tr>
                    <td class="pergunta">Lider: </td>
                    <td><input type="text" class="input"></td>
                </tr>
                <tr>
                    <td class="pergunta">N. Pastor: </td>
                    <td><input type="text" class="input"></td>
                </tr>
                <tr>
                    <td class="pergunta">Cor da Rede: </td>
                    <td><input type="text" class="input"></td>
                </tr>
                <tr>
                    <td class="pergunta">Distrito: </td>
                    <td><input type="text" class="input"></td>
                </tr>
                <tr>
                    <td class="pergunta">Sexo: </td>
                    <td>
                        <INPUT TYPE="RADIO" NAME="tipo" id="tipo" VALUE="Masculino"> Masculino
                        <INPUT TYPE="RADIO" NAME="tipo" id="tipo" VALUE="Feminino"> Feminino
                    </td>
                </tr>
                <tr>
                    <td class="pergunta">Est. Civil: </td>
                    <td>
                        <INPUT TYPE="RADIO" NAME="estcivil" id="estcivil" VALUE="Casado"> Casado
                        <INPUT TYPE="RADIO" NAME="estcivil" id="estcivil" VALUE="Solteiro"> Solteiro
                        <INPUT TYPE="RADIO" NAME="estcivil" id="estcivil" VALUE="Outros"> Outros
                    </td>
                </tr>
                <tr>
                    <td class="pergunta">Tem Célula: </td>
                    <td>
                        <INPUT TYPE="RADIO" NAME="tipo" id="tipo" VALUE="Sim"> Sim
                        <INPUT TYPE="RADIO" NAME="tipo" id="tipo" VALUE="Nao"> Não
                    </td>
                </tr>
                <tr>
                    <td class="pergunta">Núcleo: </td>
                    <td><input type="text" class="input"></td>
                </tr>

            </table>
            <div class="buton">
                <input type="submit">
            </div>
        </form>

    </div>
</body>

</html>