<?php

namespace Src\Controllers;

use \Src\Views\View;
use Src\Services\Db;

class Controller 
{
    // protected чтобы можно было обращаться из дочернего класса
    protected $view;
    protected $db;
    private $layout = 'default';

    public function __construct()
    {
        $this->view = new View($this->layout);
        $this->db = new Db();
    }
}