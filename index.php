<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">

    <script type="text/javascript">
	
	function validaCampo()
{
if(document.cadastrar.usuario.value=="")
{
	alert("O campo Usuario é obrigatório")
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
	<h2>CADASTRE SEU RELATÓRIO</h2>


	

	<form name="cadastrar" method="POST" action="cadastro.php"  onsubmit="return validaCampo(); return false;" >
  
	<table class='tabela'>
    <tr>
      <td class='texto' >Nome</td><br>
	  </tr>
	  <tr>
      <td  class='texto'>
	  <input name="usuario"  type="text" id="usuario"  maxlength="30" placeholder="Usuario" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td class="texto">Id-Célula:</td>
	  </tr>
	  <tr>
      <td class="texto">
		  <input name="idcelula" class="texto" type="text" id="idcelula"  maxlength="30" />
      <span class="style1">*</span></td>
    </tr>
	   <tr>
      <td class="texto">Membros Total Presentes:</td>
	  </tr>
	  <tr>
      <td class	= 'texto'><input name="mtp"  class="texto" type="text" id="mtp"  maxlength="30"/>
      <span class="style1">*</span></td>
    </tr>  
    <tr>
      <td class="texto">Membros Comp. presentes:</td>
	  </tr>
	  <tr>
      <td class="texto"><input name="mcp" class="texto" type="text" id="mcp"  maxlength="30"/>
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td class="texto">Convidados Presentes:</td>
	  </tr>
	  <tr>
      <td class="texto"><input name="cp" class="texto" type="text" id="cp" maxlength="30" />
        <span class="style1">*</span></td>
    </tr>
  
    <tr>
      <td class="texto">Crianças</td>
	  </tr>
	  <tr>
      <td class="texto"><input name="cria" class="texto" type="text" id="cria" maxlength="30"/>
        <span class="style1">*</span></td>
    </tr>
        
    <tr >
      <td  colspan="2"><p>
        <input name="cadastrar" type="submit" id="cadastrar" value="Concluir meu Envio!" /><br/><br>
          <input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos!" /></br>
          <span class="style1">* Campos com * s&atilde;o obrigat&oacute;rios!</span></p>
      <p>&nbsp; </p></td>
    </tr>
  </table>
</form>
	



</body>
</html>