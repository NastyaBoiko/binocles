<?php

namespace Src\Controllers;

use Src\Models\Articles\Article;
use Src\Models\Users\User;

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

    public function edit(int $articleId): void {
        $article = Article::getById($articleId);
        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $this->view->renderHtml('Articles/edit.php', ['article' => $article]);
        // $article->setName('Новое название статьи');
        // $article->setText('Новый текст статьи');
        // $article->save();
    }

    public function add(): void {
        $author = User::getById(1);
        $article = new Article();
        $article->setAuthor($author);
        $article->setName('Еще одна статья');
        $article->setText('Текст еще одной статьи');
        $article->save();
        var_dump($article);
    }

}