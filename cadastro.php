<?php

require 'Handler.php';

$dados = Handler::arrayHandler();

?>



<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confimar Dados</title>
	<link rel="style" type="text/css" href="./css/style.css" media="screen" />
  
	<script>
  document.getElementById("backBtn").addEventListener("click", function(){
    history.back();
  });
</script>

</head>
	
<body background="./img/neve-hero-2.png"  background-size: "cover" >
<div >

<h2 align="center">Confirmação de Dados Enviados</h2><br>
	
	
	
	 
	  
<form id="cadastro" name="cadastro" method="post" action="cadastro.php" >
	      
  <table width="300" border="1" align="center" cellpadding="0" cellspacing="0" class="tabela">
	        
	        <tr>
	          
	          <th align="center" valign="middle" class="dados" style="color: #000000">Nome</th>
	          
           <tr>
              <th style="color: #FF0004">
	              <?=$dados['usuario'] ?>
              </th>
           <tr>
                <th style="color: #000000">
                  Id-Célula
              </th>
           <tr>
              <th style="color: #FF0004">
                  <?=$dados['idcelula'] ?>
              </th>
           <tr>
                <th style="color: #000000">
                  Membros Total Presentes
              </th>
           <tr>
              <th style="color: #FF0004">
                  <?=$dados['mtp'] ?>
              </th>
           <tr>
                <th style="color: #000000">
                  Membros Compromissados Presentes
              </th>
           <tr>
              <th style="color: #FF0004">
                  <?=$dados['mcp'] ?>
              </th>
           <tr>
                <th style="color: #000000">
                  Convidados Presentes
              </th>
           <tr>
              <th style="color: #FF0004">
                  <?=$dados['cp'] ?>
              </th>
           <tr>
                <th style="color: #000000">
                  Crianças
              </th>
           <tr>
              <th style="color: #FF0004">
                  <?=$dados['cria'] ?>
              </th>
           <tr>
                <th height="70">
                    <input name="completar_cadastro" type="submit" id="completar_cadastro" value="Completar Cadastro!" class="botton">
              </th>
		   </tr>                    
          
  </table>
	
	<br>
</form>
<div align="center">
	<button style="text-align: center" onclick="history.back()">Corrigir!</button>
	</div>
	
	


	</div>

</body>
</html>