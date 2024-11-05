<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $assignment_id = $_POST['assignment_id'];
    $content = $_POST['content'];
    $student_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO submissions (assignment_id, student_id, content) VALUES (?, ?, ?)");
    $stmt->execute([$assignment_id, $student_id, $content]);

    echo "Домашнє завдання надіслано на перевірку.";
}
?>
<!-- CREATED by Andrey Logvinenko -->
