<!-- CREATED by Andrey Logvinenko -->
<?php
session_start();
require 'db.php';

$course_id = $_GET['course_id'];

$stmt = $pdo->prepare("SELECT * FROM lessons WHERE course_id = ?");
$stmt->execute([$course_id]);
$lessons = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Уроки</title>
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
    <h2>Уроки курсу</h2>
    <?php foreach ($lessons as $lesson): ?>
        <div>
            <h3><?php echo htmlspecialchars($lesson['title']); ?></h3>
            <div class="video-container">
                <div class="loading" id="loading-<?php echo $lesson['id']; ?>">Завантаження...</div>
                <video controls width="600" id="video-<?php echo $lesson['id']; ?>">
                    <source src="<?php echo htmlspecialchars($lesson['video_url']); ?>" type="video/mp4">
                </video>
            </div>
            <a href="assignment.php?lesson_id=<?php echo $lesson['id']; ?>">Домашнє завдання</a>
        </div>
    <?php endforeach; ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const videos = document.querySelectorAll("video");
            
            videos.forEach(video => {
                const loadingText = document.getElementById("loading-" + video.id.split('-')[1]);
                
                video.addEventListener("waiting", function() {
                    loadingText.style.display = "block";
                });
                
                video.addEventListener("canplay", function() {
                    loadingText.style.display = "none";
                });
            });
        });
    </script>
<footer style="text-align: center; margin-top: 20px;">
    <p>CREATED by Andrey Logvinenko</p>
</footer>
</body>
</html>
