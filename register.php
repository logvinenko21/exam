<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $password]);

    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #1c1c1c;
            color: #ffffff;
            padding: 15px 0;
            text-align: center;
        }

        header h1 {
            color: #ff4c4c; 
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            color: #ff4c4c; 
            text-decoration: none;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
        }

        h2 {
            color: #ff4c4c; 
            border-bottom: 2px solid #ff4c4c;
            padding-bottom: 10px;
        }

        /* Форма */
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
        }

        form label {
            display: block;
            margin-top: 10px;
            color: #ff4c4c; 
        }

        form input {
            width: 100%;
            padding: 8px;
            margin: 5px 0 10px 0;
            box-sizing: border-box;
            background-color: #2a2a2a;
            border: 1px solid #444;
            color: #ffffff;
        }

        form input:focus {
            border-color: #ff4c4c; 
            outline: none;
        }

        button {
            background-color: #ff4c4c; 
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        button:hover {
            background-color: #e43a3a;
        }

  
        a {
            color: #ff4c4c;
        }

        a:hover {
            color: #ff3333;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h2>Реєстрація</h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Ім'я користувача" required>
            <input type="email" name="email" placeholder="Електронна пошта" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Зареєструватися</button>
        </form>
    </main>
</body>
</html>
