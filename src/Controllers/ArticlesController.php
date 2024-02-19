<?php

namespace Src\Controllers;

use Src\Models\Articles\Article;

class ArticlesController extends Controller
{

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === []) {
            // Здесь обработка ошибки
            $this->view->renderHtml('Errors/404.php', [], 404);
            return;
        }

        $this->view->renderHtml('Articles/view.php', ['article' => $article]);
    }

    public function all()
    {
        $articles = Article::findAll();
        // var_dump($articles);
        $this->view->renderHtml('Articles/all.php', ['articles' => $articles]);
    }

}