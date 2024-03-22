<?php

namespace Src\Controllers;

use Src\Exceptions\NotFoundException;
use Src\Models\Products\Product;
use Src\Models\Categories\Category;

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
        $products = Product::getByCategoryId($categoryId);
        $category = Category::getById($categoryId);

        if ($products === null) {
            // Здесь обработка ошибки
            throw new NotFoundException();
        }

        $this->view->renderHtml('Categories/view.php', [
            'products' => $products,
            'category' => $category
        ]);
    }

}