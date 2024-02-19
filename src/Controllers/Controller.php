<?php

namespace Src\Controllers;

use \Src\Views\View;

class Controller 
{
    // protected чтобы можно было обращаться из дочернего класса
    protected $view;
    private $layout = 'default';

    public function __construct()
    {
        $this->view = new View($this->layout);
    }
}