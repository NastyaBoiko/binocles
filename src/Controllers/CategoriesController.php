<?php

namespace Src\Controllers;

use Src\Exceptions\NotFoundException;
use Src\Models\Categories\Category;
use Src\Models\Users\User;

class CategoriesController extends Controller
{

    public function all()
    {
        $categories = Category::findAll();
        
        $this->view->renderHtml('Categories/all.php', [
            'categories' => $categories,
        ]);
    }

    public function view(int $categoryId)
    {
        $categories = Category::getByCategoryId($categoryId);

        if ($categories === null) {
            // Здесь обработка ошибки
            throw new NotFoundException();
        }

        $this->view->renderHtml('Categories/all.php', [
            'categories' => $categories
        ]);
    }

}