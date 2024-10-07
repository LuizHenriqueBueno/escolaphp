<?php

include_once 'Database.php';
include_once 'Matricula.php';


$database = new Database();
$db = $database->getConnection();


$matricula = new Matricula($db);


$matricula->id_aluno = $_POST['id_aluno'];
$matricula->id_turma = $_POST['id_turma'];
$matricula->data_matricula = date('Y-m-d'); // Definindo a data atual para a matrícula


if($matricula->cadastrar()) {
    echo "Matrícula realizada com sucesso!";
} else {
    echo "Erro ao realizar matrícula! Verifique se há vagas disponíveis.";
}
?>

