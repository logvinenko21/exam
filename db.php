<!-- CREATED by Andrey Logvinenko -->

<?php
$host = 'sql208.infinityfree.com';
$db = 'if0_37657515_db';
$user = 'if0_37657515';
$pass = '6tLKoWYo8l3RJ';
$charset = 'utf8mb4';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>