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

    public function search() {
        if (!empty($_GET)) {
            if (!isset($_GET['q'])) {
                $this->view->renderHtml('Categories/search.php');
                return;
            }
            $searchProducts = Product::search($_GET['q']);
            $this->view->renderHtml('Categories/search.php', ['searchProducts' => $searchProducts, 'q' => $_GET['q']]);
        }
        // $this->view->renderHtml('Categories/search.php');
    }

}