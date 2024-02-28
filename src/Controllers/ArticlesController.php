<?php

namespace Src\Controllers;

use Src\Exceptions\NotFoundException;
use Src\Models\Articles\Article;
use Src\Models\Users\User;

class ArticlesController extends Controller
{

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            // Здесь обработка ошибки
            throw new NotFoundException();
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
            throw new NotFoundException();
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
        // var_dump($article);
    }

    // void значит нет return
    public function delete(int $articleId): void {
        $article = Article::getById($articleId);
        if ($article === null) {
            throw new NotFoundException();
        }
        $article->delete();
        var_dump($article);
    }

}