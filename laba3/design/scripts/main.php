<?php
// Для контроллеров указываем свое пространство имен.
namespace controllers;
 
// Указываем, что используем базовый класс контроллера.
use classes\BaseController;
 
// Объявляем класс контроллера как дочерний от базового контроллера.
class NotfoundController extends BaseController
{
    // Переопределенный метод run для отрисовки страницы
    public function run($data)
    {
        // Отрисовываем шаблон notfound и выводим его на экран.
        echo $this->renderFull('notfound', $data);
    }
}
?>