<?php
// Определяем текущую страницу по GET-параметру
$page = $_GET['page'] ?? 'home';

// Путь к файлу контента
$content_file = "pages/{$page}.php";

// Проверка существования файла
if (!file_exists($content_file)) {
    $content_file = "pages/404.php";
}

// Подключаем шаблон
include 'template.php';
?>

