<?php

require './Conexao.php';

final class Usuarios {

    public objeto|null $conexao ;

public function listar() : array
{
    
    $conexao= new conexao();
    $this->conexao = $conexao->conectar();
  
    return[];
}


}



?>