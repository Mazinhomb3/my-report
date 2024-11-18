<?php

/**
 * Classe para listar e criar usuários no banco de dados.
 * 
 * @author Cesar <cesar@celke.com.br>
 */
class Users extends Connection
{
    /**
     * Conexão com o banco de dados.
     * @var object
     */
    public object $conn;

    /**
     * Dados do formulário para criação de um novo usuário.
     * @var array
     */
    public array $formData;

    /**
     * Define os dados do formulário para criação de um novo usuário.
     * 
     * @param array $formData Dados do formulário contendo informações do usuário.
     * @return void
     */
    public function setFormData(array $formData): void
    {
        $this->formData = $formData;
    }

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
        $sql = "SELECT * FROM tbl_login_sup ORDER BY id DESC LIMIT 40";

        // Prepara a consulta SQL.
        $stmt = $this->conn->prepare($sql);

        // Executa a consulta no banco de dados.
        $stmt->execute();

        // Retorna os resultados da consulta como um array.
        return $stmt->fetchAll();
    }

    /**
     * Cria um novo usuário no banco de dados.
     * 
     * @return bool Retorna true se o usuário for criado com sucesso, false caso contrário.
     */
    public function create(): bool
    {
        // Estabelece a conexão com o banco de dados.
        $this->conn = $this->connect();

        // Consulta SQL para inserir um novo usuário.
        $sql = "INSERT INTO tbl_login_sup (nome, nome_login, rede, senha, funcao) VALUES (:nome, md5(:nome_login), :rede, MD5(:senha), :funcao)";

        // Prepara a consulta SQL para inserção de dados.
        $addUser = $this->conn->prepare($sql);

        // Associa os valores das propriedades ao SQL.
        $addUser->bindParam(':nome', $this->formData['nome']);
        $addUser->bindParam(':nome_login', $this->formData['nome']);
        $addUser->bindParam(':rede', $this->formData['rede']);
        $addUser->bindParam(':senha', $this->formData['senha']);
        $addUser->bindParam(':funcao', $this->formData['funcao']);

        // Executa a consulta SQL.
        $addUser->execute();

        // Verifica se a inserção foi bem-sucedida e retorna o resultado.
        if ($addUser->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
}
