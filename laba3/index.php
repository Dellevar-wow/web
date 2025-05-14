<?php
// Отображение ошибок.
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Подключение автоконфига.
include_once 'classes/Autoload.php';

// Подключение класса App.
use classes\App;



// Инициализация App.
App::init();
// Получаем параметр page из URL (например, /menu)
$page = isset($_GET['page']) ? $_GET['page'] : '';

// Запуск соответствующего контроллера на основе параметра page
App::run($page);
?>