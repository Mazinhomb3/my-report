
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/estilo.css">
    <link rel="shortcut icon" href="./img/logo_paz.ico" type="image/x-icon">
    <title>Paz Santarém</title>
    <script type="text/javascript">

    function validaCampo()
{

if
	(document.cadastrar.idcelula.value=="")
	{
	alert("O Campo Id de Célula é obrigatório!");
	return false;
	}
	
	else
	if(document.cadastrar.mtp.value=="")
	{
	alert("O Campo Total de Membros da Célula é obrigatório!");
	return false;
	}
	
	else
	if(document.cadastrar.mcp.value=="")
	{
	alert("O Campo Membros Presentes na Célula é obrigatório!");
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
	}else
	if(document.cadastrar.tipo.value=="")
	{
	alert("O Campo Tipo de célula é obrigatório!");
	return false;
	}
    if(document.cadastrar.oferta.value=="")
	{
	alert("O Campo oferta de célula é obrigatório!");
	return false;
	}
else
   return true;
}
<!-- Fim do JavaScript que validará os campos obrigatórios! -->
</script>


</head>

<body>
  <div class="divsub">
    <img class="logo" src="./img/logo_paz.png" alt="">
    <p>Paz Santarém</p>
    <p>Sejam bem vindos, aqui você pode enviar seu relatório.</p>
    </div>
    <div class="sub">

<p>Preencha seu Relatório</p>

    </div>

    <div class="form">
    <form id="cadastrar" name="cadastrar" method="POST" action="login.php"  onsubmit="return validaCampo(); return false;">
    
<table class="tabela" border="0" align="center">


    <tr>
        <td class="inputs">ID-Célula </td>
    </tr>
    <tr>
        <td>
                <input  name="idcelula" class="inputs" type="number" id="idcelula" placeholder="ID-Célula">
        </td>
    </tr>

    <tr>
        <td class="inputs">Total de Membros</td>
    </tr>
    <tr>
        <td>
                <input  name="mtp" class="inputs" type="number" id="mtp" placeholder="TM">
        </td>
    </tr>

    <tr>
        <td class="inputs">Membros Presentes</td>
    </tr>
    <tr>
        <td>
                <input  name="mcp" class="inputs" type="number" id="mcp" placeholder="MP">
        </td>
    </tr>

    <tr>
        <td class="inputs">Convidados Presentes </td>
    </tr>
    <tr>
        <td>
                <input  name="cp" class="inputs" type="number" id="cp" placeholder="Convidados Presentes">
        </td>
    </tr>

    <tr>
        <td class="inputs">Crianças Presentes </td>
    </tr>
    <tr>
        <td>
                <input  name="cria" class="inputs" type="number" id="cria" placeholder="Crianças">
        </td>
    </tr>
    <TR>
        <td class="inputs">Tipo de Célula</td>
    </TR>
    <tr>
    <td  align="center">
        <select name="tipo" id="tipo">
            <option value="Adulto">Adulto</option>
            <option value="Adolecentes">Adolecentes</option>
            <option value="Crianças">Crianças</option>
        </select>
    </td>
    </tr>  
    <tr>
        <td class="inputs">Valor da Oferta da Célula</td>
    </tr>
    <tr>
        <td align="center">R$ 
            <input name="oferta" class="valor" type="float"  maxlength="10" id="oferta" placeholder="Oferta">
        </td>
    </tr>
   
    <tr>
      <td  align="center"><input  type="submit"  width="90" id="enviar" value="Enviar Dados"></td>
    </tr>
    </div>
    </table>

</form>

    
</body>
</html>