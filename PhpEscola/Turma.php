<?php


class Turma {
    private $conn;
    private $table_name = "turmas";

    public $id;
    public $descricao;
    public $ano;
    public $vagas;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function cadastrar() {
        $query = "INSERT INTO " . $this->table_name . " (descricao, ano, vagas) VALUES (:descricao, :ano, :vagas)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":ano", $this->ano);
        $stmt->bindParam(":vagas", $this->vagas);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
