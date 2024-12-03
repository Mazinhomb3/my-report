<?php


/**
 * Classe para listar usuários do banco de dados.
 */
class ListUsers extends Connection
{
    /**
     * Conexão com o banco de dados.
     * @var object
     */
    public object $conn;

    /**
     * Lista os usuários cadastrados no banco de dados.
     * 
     * @return array Retorna um array contendo os dados dos usuários.
     */
    public function list(): array
    {
        // Estabelece a conexão com o banco de dados.
        $this->conn = $this->connect();

        // Consulta SQL para selecionar os dados dos usuários.
        $sql = "SELECT * FROM  tbl_login_sup ORDER BY nome DESC";

        // Prepara a consulta SQL.
        $stmt = $this->conn->prepare($sql);

        // Executa a consulta no banco de dados.
        $stmt->execute();

        // Retorna os resultados da consulta como um array.
        return $stmt->fetchAll();
    }
}
