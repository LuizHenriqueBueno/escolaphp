<?php


class Matricula {
    private $conn;
    private $table_name = "matriculas";

    public $id_aluno;
    public $id_turma;
    public $data_matricula;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function verificarVagas($id_turma) {
        $query = "SELECT vagas FROM turmas WHERE id = :id_turma";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_turma", $id_turma);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['vagas'] > 0;
    }

    public function cadastrar() {
        if ($this->verificarVagas($this->id_turma)) {
            $query = "INSERT INTO " . $this->table_name . " (id_aluno, id_turma, data_matricula) VALUES (:id_aluno, :id_turma, :data_matricula)";
            $stmt = $this->conn->prepare($query);
            
            $stmt->bindParam(":id_aluno", $this->id_aluno);
            $stmt->bindParam(":id_turma", $this->id_turma);
            $stmt->bindParam(":data_matricula", $this->data_matricula);

            if ($stmt->execute()) {
                // Atualiza o número de vagas
                $query_update_vagas = "UPDATE turmas SET vagas = vagas - 1 WHERE id = :id_turma";
                $stmt_update = $this->conn->prepare($query_update_vagas);
                $stmt_update->bindParam(":id_turma", $this->id_turma);
                $stmt_update->execute();

                return true;
            }
        }
        return false;
    }
}
