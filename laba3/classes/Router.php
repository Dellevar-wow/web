<?php
namespace classes;

use controllers;

class Router
{
    public static function getController($params = [])
    {
        // Если в гет-параметре нет page, то по умолчанию указываем главную страницу
        $page = 'main';
        if (isset($params['page'])) {
            $page = $params['page'];
        }

        // Преобразуем имя страницы в имя контроллера
        $controllerClass = mb_convert_case($page, MB_CASE_TITLE, "UTF-8") . 'Controller';

        // Логируем, какой контроллер мы пытаемся загрузить
        error_log("Попытка загрузить контроллер: " . $controllerClass);

        // Проверяем, существует ли файл контроллера
        if (!file_exists('controllers/' . $controllerClass . '.php')) {
            // Если файл не существует, загружаем контроллер ошибки
            $controllerClass = 'NotfoundController';
        }

        // Логируем, какой контроллер в итоге выбран
        error_log("Выбранный контроллер: " . $controllerClass);

        // Подключаем соответствующий файл контроллера
        require_once 'controllers/' . $controllerClass . '.php';

        // Формируем полный класс с учетом пространства имен
        $controllerClass = 'controllers\\' . $controllerClass;

        // Возвращаем экземпляр контроллера
        return new $controllerClass();
    }
}

?>