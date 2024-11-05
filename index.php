<?php
session_start();
?>
<!-- CREATED by Andrey Logvinenko -->

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Головна</title>
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
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h2>Ласкаво просимо на нашу платформу!</h2>
        <p>Ось список доступних курсів...</p>
        
    </main>
<footer style="text-align: center; margin-top: 20px;">
    <p>CREATED by Andrey Logvinenko</p>
</footer>
</body>
</html>
