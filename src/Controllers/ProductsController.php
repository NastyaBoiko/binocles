<?php

namespace Src\Controllers;

use Src\Exceptions\NotFoundException;
use Src\Models\Products\Product;
use Src\Models\Categories\Category;
use Src\Models\Users\User;

class ProductsController extends Controller
{

    public function all()
    {
        $products = Product::findAll();
        
        $this->view->renderHtml('Categories/all.php', [
            'products' => $products,
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