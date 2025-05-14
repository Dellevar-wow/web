<?php
namespace classes;
 
class BaseController
{
    // Метод запускает работу контроллера.
    public function run($data)
    {
 
    }
 
    // Метод отрисовывает страницу полностью.
    protected function renderFull($tplName, $data)
    {
    $out = $this->render('head', [
    'name' => App::$config->get('name'),
    'img_favicon' => App::$config->get('img_favicon'),
    'normalize' => App::$config->get('normalize'),
    'main_css' => App::$config->get('main_css'),
    ]);
    if($tplName == 'main'){ 
    $out .= $this->render('body_main', []);
     
    }
    else if($tplName == 'menu'){
         $out .= $this->render('header', []);
        $out .= $this->render('catalog', $data);  // Передаем данные в шаблон catalog
    } 
    else if($tplName == 'about'){
        $out .= $this->render('header', []);
        $out .= $this->render('about', $data);
    }
    else if($tplName == 'delivery'){
        $out .= $this->render('header', []);
        $out .= $this->render('delivery', $data);
    }
    $out .= $this->render('footer', []);
    // Возвращение результата.
        return $out;
    }
 
    // Метод отрисовывает один шаблон.
    protected function render($tplName, $data)
    {
        $out = new Tpl();
        $out->addVars($data);
        return $out->render($tplName);
    }
}
?>