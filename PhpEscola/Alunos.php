<?php


class Alunos {
    private $conn;
    private $table_name = "alunos";

    public $id;
    public $nome;
    public $data_nascimento;
    public $cpf;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function cadastrar() {
        $query = "INSERT INTO " . $this->table_name . " (nome, data_nascimento, cpf) VALUES (:nome, :data_nascimento, :cpf)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":data_nascimento", $this->data_nascimento);
        $stmt->bindParam(":cpf", $this->cpf);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
