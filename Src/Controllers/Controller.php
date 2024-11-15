<?php

namespace Src\Controllers;

use Src\Models\Users\UsersAuthService;
use \Src\Views\View;

class Controller 
{
    protected $user;
    // protected чтобы можно было обращаться из дочернего класса
    protected $view;

    protected $layout = 'default';

    public function __construct()
    {
        $this->user = UsersAuthService::getUserByToken() ?? UsersAuthService::getUserByBearerToken();
        $this->view = new View($this->layout);
        $this->view->setVar('user', $this->user);
    }

    // Достает данные при передаче в теле запроса и декодирует
    public function getInputData() {
        return json_decode(
            file_get_contents('php://input'),
            true
        );
        
    }
}