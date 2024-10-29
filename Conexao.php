


<?php


class Conexao{

    public string $host = "localhost";
    public string $usuario = "root";
    public string $senha = "";
    public string $dbnome = "db_relatorios";
    public int $porta = 3306;
    public object | null $conexao = null;


    public function conectar(){

try {

    //Conexao com porta
   //$this->conexao = new PDO("mysql:host={$this->host};port={$this->porta}; dbname=" . $this->dbnome, 
   //$this->usuario, $this->senha  ); 

    $this->conexao = new PDO("mysql:host={$this->host}; dbname=" . $this->dbnome, 
    $this->usuario, $this->senha  ); 

     //echo "Conexao realizada com sucesso!";

     return $this->conexao;


} catch (Exception $e) 
{

    die("Conexao não pode ser realizada!" .$e->getMessage());

   return false;
}




    }
   


}



?>