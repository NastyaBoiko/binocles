<?php

namespace Src\Controllers;

use \Src\Views\View;

class ProductController {
    private $view;
    private $layout = 'default';
    private $products;

    public function __construct()
    {
        $this->view = new View($this->layout);
        $this->products = [

            1 => [
            
            'name' => 'product1',
            
            'price' => 100,
            
            'quantity' => 5,
            
            'category' => 'category1',
            
            ],
            
            2 => [
            
            'name' => 'product2',
            
            'price' => 200,
            
            'quantity' => 6,
            
            'category' => 'category2',
            
            ],
            
            3 => [
            
            'name' => 'product3',
            
            'price' => 300,
            
            'quantity' => 7,
            
            'category' => 'category2',
            
            ],
            
            4 => [
            
            'name' => 'product4',
            
            'price' => 400,
            
            'quantity' => 8,
            
            'category' => 'category3',
            
            ],
            
            5 => [
            
            'name' => 'product5',
            
            'price' => 500,
            
            'quantity' => 9,
            
            'category' => 'category3',
            
            ],
            
        ];
    }

    public function show($n) {
        if (isset($this->products[$n])) {
            $this->view->renderHtml('Product/product.php', ['product' => $this->products[$n]]);
        } else {
            echo 'Такого продукта нет';
        }
    }

    public function all() {
        $this->view->renderHtml('Product/products.php', ['products' => $this->products]);
    }
}