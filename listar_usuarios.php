<?php

include_once "conexao.php";

$nome_usuario = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_STRING);

if(!empty($nome_usuario)){

    $pesq_usuarios = "%" . $nome_usuario . "%";

    $query_usuarios= "SELECT cod_lider_rede, nome_lider, supervisor_rede_lider,
    rede_lider, cor_rede_lider, distrito_lider, area_lider, setor_lider FROM tbl_dados WHERE nomeLider LIKE :nome ";
    $result_usuarios = $conexao->prepare($query_usuarios); //modificado $conn
    $result_usuarios->bindParam(':nome', $pesq_usuarios);
    $result_usuarios->execute();

    if(($result_usuarios) and ($result_usuarios->rowCount() != 0)){
        while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
            $dados[] = [
                'id' => $row_usuario['id'],
                'nome' => $row_usuario['nome']
            ];
        }

        $retorna = ['erro' => false, 'dados' => $dados];
        //$retorna = ['erro' => true, 'msg' => "Erro: Nenhum usuário encontrado!"];
    }else{
        $retorna = ['erro' => true, 'msg' => "Erro: Nenhum usuário encontrado!"];
    }
    
}else{
    $retorna = ['erro' => true, 'msg' => "Erro: Nenhum usuário encontrado!"];
}

echo json_encode($retorna);