<?php

namespace Src\Controllers;

use \Src\Views\View;
use Src\Services\Db;

class MainController 
{
    private $view;
    private $db;
    private $layout = 'default';
    
    public function __construct()
    {
        $this->view = new View($this->layout);
        $this->db = new Db();
    }

    public function main()
    {
        $articles = $this->db->query('SELECT * FROM `articles`;');
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