

<?php
session_start();

if (!isset($_SESSION['nome_lider']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
  
  
    //A última solicitação foi há mais de 30 minutos
    session_unset();     //Variável para o tempo de execução 
    session_destroy();   //Destruir os dados da sessão no armazenamento
  
   header('Location: login.php');
   die();
}
$_SESSION['LAST_ACTIVITY'] = time();


$dados['supervisor_rede_lider']=$_SESSION['supervisor_rede_lider'];
$dados['rede_lider']=$_SESSION['rede_lider'];
$dados['cor_rede_lider']=$_SESSION['cor_rede_lider'];
$dados['distrito_lider']=$_SESSION['distrito_lider'];
$dados['area_lider']=$_SESSION['area_lider'];
$dados['setor_lider']=$_SESSION['setor_lider'];
$dados['cod_lider_rede']=$_SESSION['cod_lider_rede'];
$dados['nome_lider']=$_SESSION['nome_lider'];
$dados['mtp']=$_SESSION['mtp'];
$dados['mcp']=$_SESSION['mcp'];
$dados['cp']=$_SESSION['cp'];
$dados['cria']=$_SESSION['cria'];
$dados['tipo']=$_SESSION['tipo'];
$dados['valor']=$_SESSION['valor'];

$data = $_SESSION['data_lider'];
$datahoje = date('Y-m-d');


if ($data == $datahoje) {

 $url = "imprimir.php";

header('Location: '.$url);


}else{

//echo "Dados diferentes";

}


?>


<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confimar Dados</title>
    <link rel="stylesheet" type="text/css" href="./css/estilo.css">
  
	<script>
  document.getElementById("backBtn").addEventListener("click", function(){
    history.back();
  });
</script>

</head>
	
<body>
   <br>
<div class="sub">
<?php echo "Bem-vindo, " . $_SESSION['nome_lider'];?>
<h3> Confirme se os dados enviados estão corretos!</h3>
	
</div>

<div class="form">
<form id="cadastro" name="cadastro" method="post" action="enviar.php" >
	      
  <table class="tabela" border="0" align="center">
	        
	        <tr>
	          
	          <th>
              Nome
            </th>
	          
           <tr>
              <th class="resposta">
	              <?=$dados['nome_lider'] ?>
                 
              </th>
           <tr>
                <th>
                  Id-Célula
              </th>
           <tr>
              <th class="resposta">
              <?=$dados['cod_lider_rede'] ?>
              </th>
           <tr>
                <th>
                  Membros Total Presentes
              </th>
           <tr>
              <th class="resposta">
                  <?=$dados['mtp'] ?>
              </th>
           <tr>
                <th>
                  Membros Compromissados Presentes
              </th>
           <tr>
              <th class="resposta">
                  <?=$dados['mcp'] ?>
              </th>
           <tr>
                <th>
                  Convidados Presentes
              </th>
           <tr>
              <th class="resposta">
                  <?=$dados['cp'] ?>
              </th>
           <tr>
                <th>
                  Crianças
              </th>
           <tr>
              <th class="resposta">
                  <?=$dados['cria'] ?>
              </th>
           <tr>
           <tr>
                <th>
                  Tipo de Célula
              </th>
           <tr>
              <th class="resposta">
                  <?=$dados['cria'] ?>
              </th>
           <tr>
                <th height="50">
                    <input name="Cocluir Envio" id="button" type="submit" value="Concluir Envio" class="botton">
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

