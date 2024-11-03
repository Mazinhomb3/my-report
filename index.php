<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./teste.css">

    <script type="text/javascript">

    function validaCampo()
{
if(document.cadastrar.usuario.value=="")
{
	alert("O campo Nome é obrigatório")
	return false;
}
else
	if(document.cadastrar.idcelula.value=="")
	{
	alert("O Campo Id de Célula é obrigatório!");
	return false;
	}
	
	else
	if(document.cadastrar.mtp.value=="")
	{
	alert("O Campo Membros Totais Presentes é obrigatório!");
	return false;
	}
	
	else
	if(document.cadastrar.mcp.value=="")
	{
	alert("O Campo Membros Compromissados Presentes é obrigatório!");
	return false;
	}
	
	
else
	if(document.cadastrar.cp.value=="")
	{
	alert("O Campo Convidados Presentes é obrigatório!");
	return false;
	}
	else
	if(document.cadastrar.cria.value=="")
	{
	alert("O Campo Crianças é obrigatório!");
	return false;
	}

else
   return true;
}
<!-- Fim do JavaScript que validará os campos obrigatórios! -->
</script>


</head>

<body>
  <div class="sub">
    <h1>Sejam bem vindos aqui você pode enviar seu relatorio!</h1>
    </div>
    <div class="sub">

<h2>Preencha seu Relatório</h2>

    </div>

    <div class="form">
    <form id="cadastrar" name="cadastrar" method="POST" action="login.php"  onsubmit="return validaCampo(); return false;">
    
<table class="tabela" border="0" align="center">

    <tr>
        <td>Nome: </td>
    </tr>
    <tr>
        <td>
                <input id="usuario" class="inputs" name="usuario" type="text"  placeholder="Nome">
        </td>
    </tr>

    <tr>
        <td>Id-Célula: </td>
    </tr>
    <tr>
        <td>
                <input  name="idcelula" class="inputs" type="number" id="idcelula" placeholder="Id-Célula">
        </td>
    </tr>

    <tr>
        <td>Membros Total Presentes: </td>
    </tr>
    <tr>
        <td>
                <input  name="mtp" class="inputs" type="number" id="mtp" placeholder="MTP">
        </td>
    </tr>

    <tr>
        <td>Membros Compromissados Presentes: </td>
    </tr>
    <tr>
        <td>
                <input  name="mcp" class="inputs" type="number" id="mcp" placeholder="MCP">
        </td>
    </tr>

    <tr>
        <td>Convidados Presentes: </td>
    </tr>
    <tr>
        <td>
                <input  name="cp" class="inputs" type="number" id="cp" placeholder="Convidados Presentes">
        </td>
    </tr>

    <tr>
        <td>Crianças Presentes: </td>
    </tr>
    <tr>
        <td>
                <input  name="cria" class="inputs" type="number" id="cria" placeholder="Crianças">
        </td>
    </tr>
    <tr>

    <td><input  type="submit" id="enviar"></td>

    </tr>

    </table>

</form>
</div>
    
</body>
</html>