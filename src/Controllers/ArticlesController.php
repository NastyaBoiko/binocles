<?php

namespace Src\Controllers;

use \Src\Views\View;
use Src\Services\Db;

class ArticlesController extends Controller
{

    public function main()
    {
        $articles = $this->db->query('SELECT * FROM `articles`;');
        $this->view->renderHtml('Articles/articles.php', ['articles' => $articles]);
    }

}