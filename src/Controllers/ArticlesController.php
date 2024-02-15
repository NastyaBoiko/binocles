<?php

namespace Src\Controllers;

use \Src\Views\View;
use Src\Services\Db;

class ArticlesController extends Controller
{

    public function view(int $articleId)
    {
        $result = $this->db->query(
            'SELECT * FROM `articles` WHERE id = :id;',
            [':id' => $articleId]
        );

        if ($result === []) {
            // Здесь обработка ошибки
            return;
        }
        
        $this->view->renderHtml('Articles/view.php', ['article' => $result[0]]);
    }

    public function all()
    {
        $articles = $this->db->query('SELECT * FROM `articles`;');
        $this->view->renderHtml('Articles/articles.php', ['articles' => $articles]);
    }

}