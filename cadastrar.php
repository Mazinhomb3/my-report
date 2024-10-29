<!doctype html>
<html lang "pt-Br">
<head>
<meta charset="utf-8">
<title>Documento sem título</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	
	
	<style type="text/css">
<!--
.style1 {
	color:aliceblue;
	font-size: x-small;
	
}
.style3 {color: #0000FF; font-size: x-small; }
		
.texto {
			text-align: center;
			color:aliceblue;
			font-weight: bold;
			
			
		}
		
				
-->
</style>

<script type="text/javascript">
function validaCampo()
{
if(document.cadastro.nome.value=="")
	{
	alert("O Campo nome é obrigatório!");
	return false;
	}
else
	if(document.cadastro.idcelula.value=="")
	{
	alert("O Campo Id de Célula é obrigatório!");
	return false;
	}
	
	else
	if(document.cadastro.mtc.value=="")
	{
	alert("O Campo Membros Totais Presentes é obrigatório!");
	return false;
	}
	
	else
	if(document.cadastro.mcp.value=="")
	{
	alert("O Campo Membros Compromissados Presentes é obrigatório!");
	return false;
	}
	
	
else
	if(document.cadastro.cp.value=="")
	{
	alert("O Campo Convidados Presentes é obrigatório!");
	return false;
	}
	else
	if(document.cadastro.cria.value=="")
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
	
	<h2 class="texto" >CADASTRE SEU RELATÓRIO</h2>
	
	<form id="cadastro" name="cadastro" method="post" action="cadastro.php" onsubmit="return validaCampo(); return false;" class="form">
  <table width="425" border="0" align="center">
    <tr>
      <td class='texto' >Nome</td><br>
	  </tr>
	  <tr>
      <td  class='texto'><input name="usuario" type="text" id="usuario"  maxlength="30" placeholder="Usuario" onkeyup="carregar_usuario(this.value)"/>
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td class="texto">Id-Célula:</td>
	  </tr>
	  <tr>
      <td class="texto"><input name="idcelula" type="text" id="idcelula"  maxlength="30" />
      <span class="style1">*</span></td>
    </tr>
	   <tr>
      <td class="texto">Membros total da célula:</td>
	  </tr>
	  <tr>
      <td class	= 'texto'><input name="mtc" type="text" id="mtc"  maxlength="30" />
      <span class="style1">*</span></td>
    </tr>  
    <tr>
      <td class="texto">Membros comp. presentes:</td>
	  </tr>
	  <tr>
      <td class="texto"><input name="mcp" type="text" id="mcp"  maxlength="30" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td class="texto">Convidados Presentes:</td>
	  </tr>
	  <tr>
      <td class="texto"><input name="cp" type="text" id="cp" maxlength="30" />
        <span class="style1">*</span></td>
    </tr>
  
    <tr>
      <td class="texto">Crianças</td>
	  </tr>
	  <tr>
      <td class="texto"><input name="cria" type="text" id="cria" maxlength="30" />
        <span class="style1">*</span></td>
    </tr>
        
    <tr align="center">
      <td  colspan="2"><p>
        <input name="cadastrar" type="submit" id="cadastrar" value="Concluir meu Envio!" /> 
        <br />
          <input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos!" />
          <br />
          <span class="style1">* Campos com * s&atilde;o obrigat&oacute;rios!         </span></p>
      <p>&nbsp; </p></td>
    </tr>
  </table>
</form>
	

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="js/custom.js"></script>


</body>
</html>