<?php
namespace classes;
 
class Tpl
{
    // Список переменных для шаблона.
    protected $varList = [];
    protected array $vars = [];
 
    // Добавление новой переменной для шаблона.
public function addVar($id, $value)
{
    // Добавление в массив varList новой переменной.
    $this->varList[$id] = $value;
}
 
   // Добавление списка переменных для шаблона.
public function addVars($varList)
{
    // Перебор всех переменных в массиве.
    foreach ($varList as $id => $value) {
        // Добавление переменной в varList.
        $this->addVar($id, $value);
    }
}
 
   // Отрисовка шаблона.
public function render($tplName)
{
    // Загрузка шаблона из файла, в качестве части пути используется получение базовой директории сайта.
    $result = file_get_contents(App::$config->get('basedir').'/views/' . $tplName . '.tpl');
    // Перебор всех переменных из varList.
    foreach ($this->varList as $id => $value) {
        // Замена с помощью функции str_replace ид на значение.
        $result = str_replace('{#' . $id . '}', $value, $result);
    }
    // Возвращение результата обработки.
    return $result;
}

// Метод assign — сохраняет переменные для шаблона
    public function assign($key, $value)
    {
        $this->vars[$key] = $value;
    }

    // Метод display — подключает шаблон и передаёт переменные
    public function display($template)
    {
        $templatePath = __DIR__ . '/../views/' . $template . '.tpl';

        if (!file_exists($templatePath)) {
            die("Template $templatePath not found");
        }

        // Передаём переменные в шаблон
        extract($this->vars);
        include $templatePath;
    }
}
?>