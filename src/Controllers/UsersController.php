<?php

namespace Src\Controllers;

use Src\Exceptions\InvalidArgumentException;
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
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('Users/signUp.php', ['error' => $e->getMessage()]);
            }
        } else {
            $this->view->renderHtml('Users/signUp.php');
        }
    }

}