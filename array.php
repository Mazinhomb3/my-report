<?php
$conexao = mysql_connect ("localhost" , "root", "Fbcostame$1") 
     or die ("Conexão falhou!");
mysql_select_db ("tbl_relatorios") 
     or die ("base de dados não existe");
 
$sql = mysql_query("select campo1, campo2 from tabela");
 
while($linha = mysql_fetch_array($sql)){
   $vNome      = $linha["campo1"];
   $vSobrenome = $linha["campo2"];
   echo "Nome: $vNome"." - "."Sobrenome: $vSobrenome"."<br>";
}	
?>
