<?php
include_once 'Database.php';
include_once 'Turma.php';


$database = new Database();
$db = $database->getConnection();


$turma = new Turma($db);


$turma->descricao = $_POST['descricao'];
$turma->ano = $_POST['ano'];
$turma->vagas = $_POST['vagas'];


if($turma->cadastrar()) {
    echo "Turma cadastrada com sucesso!";
} else {
    echo "Erro ao cadastrar turma!";
}
?>


