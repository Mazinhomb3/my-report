<?php


class ComparaData extends Connection
{

   public object $conexao;

   public function datas(): array
   {

      $this->conexao  = $this->connect();

      $sql = "SELECT DISTINCT data_lider, cod_lider_rede FROM  tbl_dados ORDER BY data_lider DESC LIMIT 1";

      $pst = $this->conexao->prepare($sql);

      $pst->execute();

      return $pst->fetchAll();
   }
   
}





?>