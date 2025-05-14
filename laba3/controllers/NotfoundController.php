<?php
namespace controllers;

class NotfoundController
{
    // Метод запускает работу контроллера
    public function run()
    {
        // Устанавливаем HTTP статус 404 для страницы "Не найдено"
        http_response_code(404);

        // Выводим страницу с ошибкой 404
        //echo "Страница не найдена!";
    }
}

