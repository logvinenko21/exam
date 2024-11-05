<!-- CREATED by Andrey Logvinenko -->
<?php
session_start();
require 'db.php';

$lesson_id = $_GET['lesson_id'];

$stmt = $pdo->prepare("SELECT * FROM assignments WHERE lesson_id = ?");
$stmt->execute([$lesson_id]);
$assignment = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Домашнє завдання</title>
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
    <h2><?php echo htmlspecialchars($assignment['description']); ?></h2>
    <form id="assignmentForm">
        <textarea name="content" placeholder="Ваша відповідь" required></textarea>
        <button type="submit">Надіслати</button>
    </form>
    <div id="submissionStatus">Очікує перевірки...</div>
    <div id="responseMessage"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const assignmentId = <?php echo $assignment['id']; ?>;
            const submissionStatus = document.getElementById('submissionStatus');
            const responseMessage = document.getElementById('responseMessage');
            const form = document.getElementById('assignmentForm');
            
            form.addEventListener("submit", function(e) {
                e.preventDefault();
                
                const formData = new FormData(form);
                formData.append("assignment_id", assignmentId);
                
                fetch("submit_assignment.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    responseMessage.innerHTML = data;
                    form.reset();
                });
            });
            
            setInterval(() => {
                fetch(`check_status.php?assignment_id=${assignmentId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "checked") {
                            submissionStatus.innerHTML = `Оцінено: ${data.grade}. Відгук: ${data.feedback}`;
                        } else {
                            submissionStatus.innerHTML = "Очікує перевірки...";
                        }
                    });
            }, 5000);
        });
    </script>
<footer style="text-align: center; margin-top: 20px;">
    <p>CREATED by Andrey Logvinenko</p>
</footer>
</body>
</html>
