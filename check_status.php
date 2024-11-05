<!-- CREATED by Andrey Logvinenko -->
<?php
require 'db.php';

$assignment_id = $_GET['assignment_id'];
$stmt = $pdo->prepare("SELECT grade, feedback, status FROM submissions WHERE assignment_id = ?");
$stmt->execute([$assignment_id]);
$submission = $stmt->fetch();

echo json_encode($submission);
?>
