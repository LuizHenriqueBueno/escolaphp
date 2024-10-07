<?php
include_once 'Database.php';

$database = new Database();
$db = $database->getConnection();

$id_turma = $_GET['id_turma'];

$query = "SELECT a.nome, a.data_nascimento FROM alunos a 
          INNER JOIN matriculas m ON a.id = m.id_aluno 
          WHERE m.id_turma = :id_turma";

$stmt = $db->prepare($query);
$stmt->bindParam(":id_turma", $id_turma);
$stmt->execute();

echo "<table border='1'>";
echo "<tr><th>Nome</th><th>Data de Nascimento</th><th>Chamada</th></tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo "<tr>";
    echo "<td>{$nome}</td>";
    echo "<td>{$data_nascimento}</td>";
    echo "<td></td>"; // coluna para marcar presença
    echo "</tr>";
}
echo "</table>";
?>

