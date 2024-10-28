<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
<link rel="stylesheet" type="text/css" href="style.css">

	
	
	<script type="text/javascript">
	function validaCampo(){
		
		if(document.cadastro.nome.value==""){
			alert("O campo nome é obrigatório")
			return false;
		}
		
		if(document.cadastro.idecelula.value==""){
			alert("O campo id-célula é obrigatório")
			return false;
		}
		
		if(document.cadastro.mtc.value==""){
			alert("O campo MTC é obrigatório")
			return false;
		}
		
		if(document.cadastro.mcp.value==""){
			alert("O campo MCP é obrigatório")
			return false;
		}
		
		if(document.cadastro.convp.value==""){
			alert("O campo Convidados presentes é obrigatório")
			return false;
		}
		

		if(document.cadastro.criancas.value==""){
			alert("O campo crianças é obrigatório")
			return false;
		}
		

		
		
	}
	
	
	</script>
	
</head>
	
<body class="body">
	
	<br>
	<br>
	<br>
	
	<section class= "formulario">
		
	<form id="cadastro" name="cadastro" method="post" action="cadastro.php" onsubmite= "return validacapo(); return false;">
		
				    <label for="titulo" class = "subtitulo">CADASTRAR SEU RELATÓRIO</label><br><br>
		
                    <label for="nome" class = "label">NOME</label><br>
                    <input name="nome" class = "imput-padrao" type="text" id="nome" size="50" maxlength="60" /><br>
                    <label for="id-celula" class = "label">Id-Célula</label><br>
                    <input name="idcelula" class = "imput-padrao" type="text" id="idcelula" size="50" maxlength="60" /><br>
                    <label for="MTC" class = "label">Membros total da célula</label><br>
                    <input name="mtc" class = "imput-padrao" type="text" id="mtc" size="50" maxlength="60" /><br>
                    <label for="MCP" class = "label">Membros compromissados presentes</label><br> 
					<input name="mcp" class = "imput-padrao" type="text" id="mcp" size="50" maxlength="60" /><br>
                    <label for="ConvP" class = "label">convidados presentes</label><br> 
					<input name="convp" class = "imput-padrao" type="text" id="convp" size="50" maxlength="60" /><br>
                    <label for="criancas" class = "label">Crianças</label><br> 
					<input name="criancas" class = "imput-padrao" type="text" id="criancas" size="50" maxlength="60" /><br><br>
                    <input name="cadastrar" type="submit" id="cadastrar" value="Concluir meu Envio!" /><br>
  </form>
           
		
  </section>
		
		
</body>
	
</html>
