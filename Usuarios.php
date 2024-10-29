<?php

require './Conexao.php';

 class Usuarios {

    public object | null $conexao;

public function listar() : array
{
    
    $conexao= new conexao();
   $this->conexao = $conexao->conectar();

    $queryUsuarios ="SELECT DISTINCT cod_lider_rede, nome_lider, supervisor_rede_lider,
    rede_lider, cor_rede_lider, distrito_lider, area_lider, setor_lider  FROM tbl_dados 
    ORDER BY nome_lider asc ";

    $resultadoUsuarios=$this->conexao->prepare($queryUsuarios);

    $resultadoUsuarios->execute();


    return $resultadoUsuarios->fetchAll();
}


}



?>