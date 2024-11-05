<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: courses.php");
    exit();
}

$course_id = $_GET['id'];
$stmt = $pdo->prepare("INSERT INTO enrollments (user_id, course_id) VALUES (?, ?)");
$stmt->execute([$_SESSION['user_id'], $course_id]);


header("Location: courses.php?message=Успішно зареєстровано на курс!");
exit();
?>
<!-- CREATED by Andrey Logvinenko -->
