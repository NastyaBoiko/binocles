<?php

namespace Src\Controllers;

use Src\Models\Users\User;

class UsersController extends Controller
{

    public function all()
    {
        $users = User::findAll();
        $this->view->renderHtml('Users/all.php', ['users' => $users]);
    }
    public function signUp() {
        if (!empty($_POST)) {
            $user = User::signUp($_POST);
        }
        $this->view->renderHtml('Users/signUp.php');
    }

}