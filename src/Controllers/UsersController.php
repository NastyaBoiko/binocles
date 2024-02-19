<?php

namespace Src\Controllers;

use Src\Models\Users\User;

class UsersController extends Controller
{

    public function all()
    {
        $users = User::findAll();
        // var_dump($users);
        $this->view->renderHtml('Users/all.php', ['users' => $users]);
    }

}