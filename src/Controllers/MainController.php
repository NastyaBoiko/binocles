<?php

namespace Src\Controllers;

use \Src\Views\View;

class MainController 
{
    private $view;
    private $layout = 'default';
    
    public function __construct()
    {
        $this->view = new View($this->layout);
    }

    public function main()
    {
        $articles = [
            ['name' => 'Статья 1', 'text' => 'Текст статьи 1'],
            ['name' => 'Статья 2', 'text' => 'Текст статьи 2']
        ];
        $this->view->renderHtml('Main/main.php', ['articles' => $articles]);
    }

    public function sayHello(string $name) 
    {
        $this->view->renderHtml('Main/hello.php', ['name' => $name]);
    } //hello/name

    public function len(string $string) 
    {
        echo 'Длина строки: ' . mb_strlen($string);
    }
}