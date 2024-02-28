<?php

namespace Src\Controllers;

use Src\Models\Users\User;
use Src\Views\View;

class UsersController extends Controller
{

    public function all()
    {
        $users = User::findAll();
        // var_dump($users);
        $this->view->renderHtml('Users/all.php', ['users' => $users]);
    }
    public function signUp() {
        echo 'Регистрация';
    }

}