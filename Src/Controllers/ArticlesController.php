<?php

namespace Src\Controllers;

use Src\Exceptions\InvalidArgumentException;
use Src\Exceptions\NotFoundException;
use Src\Exceptions\UnauthorizedException;
use Src\Models\Articles\Article;
use Src\Models\Users\User;

class ArticlesController extends Controller
{
    public string $csrf;

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
        
        $this->view->renderHtml('Articles/all.php', [
            'articles' => $articles,
        ]);
    }

    public function edit(int $articleId): void {
        $article = Article::getById($articleId);
        if ($article === null) {
            throw new NotFoundException();
        }
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        $csrf = bin2hex(random_bytes(32));

        if (!empty($_POST)) {

            try {
                if (!array_key_exists('csrf', $_POST)) {
                    throw new InvalidArgumentException('Ошибка csrf!');
                }

                if ($_POST['csrf'] == $_SESSION['csrf']) {
                    $article->updateArticle($_POST);
                }
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('Articles/edit.php', ['error' => $e->getMessage(), 'article' => $article]);
                return;
            }
            header('Location: /binocles/articles/' . $article->getId(), true, 302);
            exit();
        }

        $_SESSION['csrf'] = $csrf;

        $this->view->renderHtml('Articles/edit.php', ['article' => $article, 'csrf' => $csrf]);
    }

    public function add(): void {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        $csrf = bin2hex(random_bytes(32));

        if (!empty($_POST)) {

            try {
                if (!array_key_exists('csrf', $_POST)) {
                    throw new InvalidArgumentException('Ошибка csrf!');
                }

                if ($_POST['csrf'] == $_SESSION['csrf']) {
                    $article = Article::createArticle($_POST, $this->user);
                }
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('Articles/add.php', ['error' => $e->getMessage()]);
                return;
            }
            header('Location: /binocles/articles/' . $article->getId(), true, 302);
            exit();
        }

        $_SESSION['csrf'] = $csrf;

        $this->view->renderHtml('Articles/add.php', compact('csrf'));

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