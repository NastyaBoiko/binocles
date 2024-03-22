<?php

namespace Src\Controllers;

use Src\Exceptions\NotFoundException;
use Src\Models\Products\Product;
use Src\Models\Categories\Category;

class ProductsController extends Controller
{

    public function all()
    {
        $products = Product::findAll();
        
        $this->view->renderHtml('Categories/all.php', [
            'products' => $products,
        ]);
    }

    public function view(int $productId)
    {
        $product = Product::getById($productId);
        $category = Category::getById($product->getCategoryId());

        if ($product === null) {
            // Здесь обработка ошибки
            throw new NotFoundException();
        }

        $this->view->renderHtml('Products/view.php', [
            'product' => $product,
            'category' => $category
        ]);
    }

}