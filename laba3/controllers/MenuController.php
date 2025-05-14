<?php
// Для контроллеров указываем свое пространство имен.
namespace controllers;
 
// Указываем, что используем базовый класс контроллера.
use classes\BaseController;

// Указываем, что используем класс шаблона.
use classes\Tpl;
 
// Объявляем класс контроллера как дочерний от базового контроллера.
class MenuController extends BaseController
{
     // Переопределенный метод run для отрисовки страницы.
   public function run($data)
{
    $tpl = new \classes\Tpl();
    $tpl->assign('currentPage', 'menu'); // для MenuController
    //$tpl->display('menu');

    // Генерация списка товаров
    $goodList = '';

    // Массив с товарами
    $products = [
        [
            'pic' => '/design/image/menu/01.jpg',
            'name' => 'Острый бургер',
            'price' => '$26',
            'description' => 'Товар предназначен для тестового использования на данном сайте.'
        ],
        [
            'pic' => '/design/image/menu/02.jpg',
            'name' => 'Гриль Бургер',
            'price' => '$16',
            'description' => 'Товар предназначен для тестового использования на данном сайте.'
        ],
        [
            'pic' => '/design/image/menu/03.jpg',
            'name' => 'Бурег Гигант',
            'price' => '$37',
            'description' => 'Товар предназначен для тестового использования на данном сайте.'
        ],
    ];

    // Генерация HTML для каждого товара
    foreach ($products as $product) {
        // Создаем объект шаблона для каждого товара
        $good = new Tpl();

        // Добавляем данные о товаре в шаблон
        $good->addVars([
            'pic' => $product['pic'],
            'name' => $product['name'],
            'price' => $product['price'],
            'description' => $product['description']
        ]);

        // Рендерим шаблон товара и добавляем в общий список
        $goodList .= $good->render('menuItem');  // 'good' - имя шаблона товара
    }

    // Передаем список товаров в шаблон 'menu'
    echo $this->renderFull('menu', ['goodList' => $goodList,
    'currentPage' => 'menu']);
}
}
?>