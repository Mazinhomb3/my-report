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
     * ID do usuário para operações específicas (visualização).
     * @var int
     */
    public int $id;

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
     * Define o ID do usuário para operações que necessitam de um identificador específico.
     * 
     * @param int $id Identificador único do usuário.
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
        $sql = "SELECT * FROM tbl_login_sup ORDER BY nome ASC LIMIT 100";

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
        $sql = "INSERT INTO tbl_login_sup (nome, nome_login, rede, senha, funcao, data_user) VALUES (:nome, md5(:nome_login), :rede, MD5(:senha), :funcao, :data_user)";

        // Prepara a consulta SQL para inserção de dados.
        $addUser = $this->conn->prepare($sql);

        // Associa os valores das propriedades ao SQL.
        $addUser->bindParam(':nome', $this->formData['nome']);
        $addUser->bindParam(':nome_login', $this->formData['nome']);
        $addUser->bindParam(':rede', $this->formData['rede']);
        $addUser->bindParam(':senha', $this->formData['senha']);
        $addUser->bindParam(':funcao', $this->formData['funcao']);
        $data_user=date('Y-m-d');
        $addUser->bindParam(':data_user', $data_user);
        
       

        // Executa a consulta SQL.
        $addUser->execute();

        // Verifica se a inserção foi bem-sucedida e retorna o resultado.
        if ($addUser->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

     /**
     * Visualiza os detalhes de um usuário específico.
     * 
     * @return array|false Retorna um array contendo os dados do usuário se encontrado, ou false se não existir.
     */
    public function view()
    {
        // Estabelece a conexão com o banco de dados.
        $this->conn = $this->connect();

        // Consulta SQL para selecionar os dados de um usuário específico.
        $sql = "SELECT * FROM tbl_login_sup WHERE id = :id LIMIT 1";

        // Prepara a consulta SQL.
        $resultUser = $this->conn->prepare($sql);

        // Associa o valor do ID ao parâmetro na consulta SQL.
        $resultUser->bindParam(':id', $this->id);

        // Executa a consulta SQL.
        $resultUser->execute();

        // Retorna os dados do usuário ou false se não encontrado.
        return $resultUser->fetch();
    }


    /**
     * Edita as informações de um usuário existente.
     * 
     * @return bool Retorna true se o usuário for atualizado com sucesso, false caso contrário.
     */
    public function edit(): bool
    {
        // Estabelece a conexão com o banco de dados.
        $this->conn = $this->connect();

        // Consulta SQL para atualizar os dados do usuário específico.
        $sql = "UPDATE tbl_login_sup SET nome = :nome, nome_login = :nome_login, rede = :rede, senha = :senha, funcao = :funcao, data_user = :data_user WHERE id = :id
                LIMIT 1";

        // Prepara a consulta SQL.
        $editUser = $this->conn->prepare($sql);

        // Associa os valores das propriedades ao SQL.
        $editUser->bindParam(':nome', $this->formData['nome']);
        $editUser->bindParam(':nome_login', $this->formData['nome']);
        $editUser->bindParam(':rede', $this->formData['rede']);
        $editUser->bindParam(':senha', $this->formData['senha']);
        $editUser->bindParam(':funcao', $this->formData['funcao']);
        $data_user=date('Y-m-d');
        $editUser->bindParam(':data_user', $data_user);
        $editUser->bindParam(':id', $this->formData['id']);

        // Executa a consulta SQL.
        $editUser->execute();

        // Verifica se a atualização foi bem-sucedida e retorna o resultado.
        if ($editUser->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(): bool
    {
        // Estabelece a conexão com o banco de dados.
        $this->conn = $this->connect();

        // Consulta SQL para excluir um usuário específico baseado no seu ID.
        $sql = "DELETE FROM tbl_login_sup WHERE id = :id LIMIT 1";

        // Prepara a consulta SQL.
        $deleteUser = $this->conn->prepare($sql);

        // Associa o valor do ID ao parâmetro na consulta SQL.
        $deleteUser->bindParam(':id', $this->id);

        // Executa a consulta SQL.
        return $deleteUser->execute();
    }


}
