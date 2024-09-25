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
            'article' => $article
        ]);
    }

    public function all()
    {
        $articles = Article::findAll();

        if ($articles === null) {
            throw new NotFoundException();
        }

        $this->view->displayJson([
            'articles' => $articles
        ]);
    }

    public function add()
    {
        $input = $this->getInputData();
        $articleFromRequest = $input['articles'][0];
        $authorId = $articleFromRequest['author_id'];
        $author = User::getById($authorId);
        $article = Article::createArticle($articleFromRequest, $author);

        header('Location: /binocles/api/articles/' . $article->getId(), true, 302);
    }
}
