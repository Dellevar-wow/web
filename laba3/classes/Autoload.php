<?php
// Актуальный вариант с безымянной функцией
spl_autoload_register(function ($class)
{
    $class = str_replace('\\', '/', $class);
    require_once realpath('./') . '/' . $class .'.php'; }
);
?>