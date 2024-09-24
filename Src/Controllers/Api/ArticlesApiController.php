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
}
