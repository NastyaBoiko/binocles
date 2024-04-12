<?php

namespace Src\Models\Products;

use Src\Exceptions\InvalidArgumentException;
use Src\Models\ActiveRecordEntity;
use Src\Models\Users\User;
use Src\Services\Db;


class Product extends ActiveRecordEntity {
    protected $categoryId;
    protected $title;
    // В бд по-другому, autorId = author_id и createdAt = created_at, надо использовать магический метод __set, в который попадает название поля из таблицы и его значение
    protected $content;
    protected $price;
    protected $oldPrice;
    protected $description;
    protected $img;
    protected $isOffer;

    public function getCategoryId(): string {
      return $this->categoryId;
    }
    public function getTitle(): string {
        return $this->title;
    }
    public function getContent(): string {
        return $this->content;
    }
    public function getPrice(): string {
        return $this->price;
    }
    public function getOldPrice(): string {
        return $this->oldPrice;
    }
    public function getDescription(): string {
        return $this->description;
    }
    public function getImg(): string {
        return $this->img;
    }
    

    protected static function getTableName(): string {
        return 'products';
    }

    public static function getByCategoryId(int $id): ?array {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() .
            '` WHERE category_id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities : null;
    }
    
    public static function search($searchString) {
        $db = Db::getInstance();
        $products = $db->query(
            "SELECT * FROM products WHERE title LIKE $searchString",
            [],
            static::class
        );
        if ($products) {
            return $products;
        } else {
            return null;
        }
    }
}