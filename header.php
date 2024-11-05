<header>
    <h1>Онлайн Платформа для Навчання</h1>
    <nav>
        <ul>
            <li><a href="index.php">Головна</a></li>
            <li><a href="courses.php">Курси</a></li>
            <?php if (isset($_SESSION['user_id'])==false): ?>
            <li><a href="login.php">Вхід</a></li>
            <li><a href="register.php">Реєстрація</a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="profile.php">Профіль</a></li>
            <li><a href="logout.php">Вихід</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<!-- CREATED by Andrey Logvinenko -->
