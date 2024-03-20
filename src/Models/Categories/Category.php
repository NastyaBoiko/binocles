<?php

namespace Src\Models\Categories;

use Src\Exceptions\InvalidArgumentException;
use Src\Models\ActiveRecordEntity;
use Src\Models\Users\User;
use Src\Services\Db;


class Category extends ActiveRecordEntity {
    protected $parentId;
    protected $title;
    protected $description;

    public function getTitle(): string {
        return $this->title;
    }
    public function getDescription(): string {
        return $this->description;
    }

    protected static function getTableName(): string {
        return 'categories';
    }
    
}