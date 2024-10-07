<?php
include_once 'Database.php';
include_once 'Aluno.php';


$database = new Database();
$db = $database->getConnection();


$aluno = new Aluno($db);


$aluno->nome = $_POST['nome'];
$aluno->data_nascimento = $_POST['data_nascimento'];
$aluno->cpf = $_POST['cpf'];


if($aluno->cadastrar()) {
    echo "Aluno cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar aluno!";
}
?>
