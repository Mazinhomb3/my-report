<?php
 
session_start();
if (!isset($_SESSION['nome_lider'])) {
  header('Location: cadastro.php');
}

?>


<?php echo "Bem-vindo, " . $_SESSION['cria'];?>