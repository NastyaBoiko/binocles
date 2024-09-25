<?php

namespace Src\Controllers\Api;

use Src\Controllers\Controller;
use Src\Exceptions\NotFoundException;
use Src\Models\Articles\Article;
use Src\Models\Users\User;

class ArticlesApiController extends Controller
{
    public function view(int $articleId): void
    {
        $article = Article::getById($articleId);


        if ($article === null) {
            throw new NotFoundException();
        }

        $this->view->displayJson([
            'article' => [$article]
        ]);
    }

    public function all()
    {
        $articles = Article::findAll();

        if ($articles === null) {
            throw new NotFoundException();
        }

        $this->view->displayJson([
            'articles' => [$articles]
        ]);
    }
}
