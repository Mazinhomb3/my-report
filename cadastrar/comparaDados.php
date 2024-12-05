<?php

require './Connection.php';

class comparaDados extends Connection
{
     public object | null $conexao;

     public function listarDatas() :array
{
   $conexao = new Connection();

   $this->conexao = $conexao->connect();
    
   return [];
}
}
?>