<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой сайт</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Добро пожаловать на наш сайт!</h1>
        <nav>
            <a href="?page=home">Главная</a>
            <a href="?page=about">О нас</a>
            <a href="?page=catalog">Каталог</a>
            <a href="?page=delivery">Доставка</a>
        </nav>
    </header>

    <main>
        <?php include $content_file; ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Мой сайт</p>
    </footer>
</body>
</html>
