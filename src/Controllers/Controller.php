<?php

namespace Src\Controllers;

use Src\Models\Users\UsersAuthService;
use \Src\Views\View;

class Controller 
{
    private $user;
    // protected чтобы можно было обращаться из дочернего класса
    protected $view;

    protected $layout = 'default';

    public function __construct()
    {
        $this->user = UsersAuthService::getUserByToken();
        $this->view = new View($this->layout);
        $this->view->setVar('user', $this->user);
    }
}