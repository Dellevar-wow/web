<?php
// Для контроллеров указываем свое пространство имен.
namespace controllers;
 
// Указываем, что используем базовый класс контроллера.
use classes\BaseController;
 
// Объявляем класс контроллера как дочерний от базового контроллера.
class AboutController extends BaseController
{
    // Переопределенный метод run для отрисовки страницы
    public function run($data)
    {
        // Добавляем currentPage в массив $data
        $data['currentPage'] = 'about';
        //$tpl->display('about');
        // Отрисовываем шаблон main и выводим его на экран.
        echo $this->renderFull('about', $data);
    }
}
?>