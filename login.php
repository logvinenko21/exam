<!-- CREATED by Andrey Logvinenko -->
<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Неправильне ім'я користувача або пароль.";
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вхід</title>
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
        .course {
            background-color: #2a2a2a;
            padding: 15px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .course h3 {
            margin: 0;
            color: #ff4c4c;
        }
        .course p {
            margin: 5px 0;
        }
        .register-button {
            display: inline-block;
            background-color: #ff4c4c;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 10px;
        }
        .register-button:hover {
            background-color: #e43a3a;
        }
        .message {
            background-color: #4caf50; 
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h2>Вхід</h2>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="username">Ім'я користувача:</label>
            <input type="text" name="username" id="username" required>
            <br>
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <button type="submit">Увійти</button>
        </form>
    </main>
<footer style="text-align: center; margin-top: 20px;">
    <p>CREATED by Andrey Logvinenko</p>
</footer>
</body>
</html>
