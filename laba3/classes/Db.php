<?php
namespace classes;
 
class Db
{
    // Свойство для хранения подключения к базе данных.
    protected $linkDb;
     
    // Метод подключения к базе данных.
    public function connect($config)
    {
        return true;
    }
}
?>