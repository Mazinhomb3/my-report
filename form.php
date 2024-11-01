<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    
</head>
<body>
  
    <div class="sub">

<h2>Preencha seu Relatório</h2>

    </div>
    <div>
    <form name="cadastrar" method="POST" action="cadastro.php"  onsubmit="return validaCampo(); return false;" >
    
<table class="tabela" border="1" align="center">

    <tr>
        <td>Nome: </td>
    </tr>
    <tr>
        <td>
                <input class="inputs" name="usuario" type="text" id="usuario" placeholder="Nome">
        </td>
    </tr>

    <tr>
        <td>Id-Célula: </td>
    </tr>
    <tr>
        <td>
                <input class="inputs" name="id-celula" type="text" id="id-celula" placeholder="Id-Célula">
        </td>
    </tr>

    <tr>
        <td>Membros Total Presentes: </td>
    </tr>
    <tr>
        <td>
                <input class="inputs" name="mtp" type="text" id="mtp" placeholder="MTP">
        </td>
    </tr>

    <tr>
        <td>Membros Compromissados Presentes: </td>
    </tr>
    <tr>
        <td>
                <input class="inputs" name="mcp" type="text" id="mcp" placeholder="MCP">
        </td>
    </tr>

    <tr>
        <td>Convidados Presentes: </td>
    </tr>
    <tr>
        <td>
                <input class="inputs" name="cp" type="text" id="cp" placeholder="Convidados Presentes">
        </td>
    </tr>

    <tr>
        <td>Crianças Presentes: </td>
    </tr>
    <tr>
        <td>
                <input class="inputs" name="cria" type="text" id="cria" placeholder="Crianças">
        </td>
    </tr>
    <tr>

    <td><input type="submit"></td>

    </tr>

    </table>

</form>
</div>
    
</body>
</html>