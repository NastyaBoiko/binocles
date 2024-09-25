<?php

namespace Src\Controllers\Api;

use Src\Models\Users\User;
use Src\Controllers\Controller;
use Src\Models\Articles\Article;
use Src\Exceptions\NotFoundException;
use Src\Exceptions\WrongMethodException;

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
        $articleFromRequest = $input['article'][0];
        $authorId = $articleFromRequest['author_id'];
        $author = User::getById($authorId);
        $article = Article::createArticle($articleFromRequest, $author);

        header('Location: /binocles/api/articles/' . $article->getId(), true, 302);
    }

    public function edit(int $articleId)
    {
        if (METHOD === 'PUT' || METHOD === 'PATCH') {
            $input = $this->getInputData();
            $article = Article::getById($articleId);

            if ($article === null) {
                throw new NotFoundException("Article not found");
            }

            $articleFromRequest = $input['article'][0];
            // var_dump($articleFromRequest);
            $article->updateArticle($articleFromRequest);

            header('Location: /binocles/api/articles/' . $article->getId(), true, 302);
        } else {
            throw new WrongMethodException('Choose method PUT or PATCH to edit');
        }
    }

    public function delete(int $articleId)
    {
        if (METHOD === 'DELETE') {
            $article = Article::getById($articleId);
            if ($article === null) {
                throw new NotFoundException('Article already deleted');
            }

            $article->delete();
            echo "Article $articleId deleted";
        } else {
            throw new WrongMethodException('Choose method DELETE to delete');
        }
    }
}
