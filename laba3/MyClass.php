<?php

class Product
{
    // Массив для хранения товаров
    private $products = [];

    // Пустой конструктор
    public function __construct()
    {
    }

    // Метод добавления товара
    public function addProduct($name, $type, $price)
    {
        $this->products[] = [
            'name' => $name,
            'type' => $type,
            'price' => $price
        ];
    }

    // Метод вывода товаров
    public function printProducts()
    {
        foreach ($this->products as $product) {
            echo "Название: {$product['name']}<br/>";
            echo "Тип: {$product['type']}<br/>";
            echo "Цена: {$product['price']} руб.<br/>";
            echo "<br/>";
        }
    }

    // Метод подсчета суммарной стоимости
    public function totalPrice()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product['price'];
        }
        return $sum;
    }
}

// Тестирование класса
$store = new Product();

// Добавление товаров
$store->addProduct("The Witcher 3", "RPG", 1999);
$store->addProduct("Minecraft", "Sandbox", 1499);
$store->addProduct("FIFA 23", "Sports", 2999);

// Вывод товаров
$store->printProducts();

// Подсчет и вывод общей стоимости
echo "Общая стоимость: " . $store->totalPrice() . " руб.";

?>
