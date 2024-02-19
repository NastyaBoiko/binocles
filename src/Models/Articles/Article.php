<?php

namespace Src\Models\Articles;

use Src\Models\ActiveRecordEntity;
use Src\Models\Users\User;

class Article extends ActiveRecordEntity {
    protected $name;
    protected $text;
    // В бд по-другому, autorId = author_id и createdAt = created_at, надо использовать магический метод __set, в который попадает название поля из таблицы и его значение
    protected $authorId;
    protected $createdAt;

    public function getName(): string {
        return $this->name;
    }
    public function getText(): string {
        return $this->text;
    }

    public function getAuthorId(): int {
        // (int) - приведение к типу int
        return (int) $this->authorId;
    }
    public function getAuthor(): User {
        return User::getById($this->authorId);
    }
    protected static function getTableName(): string {
        return 'articles';
    }
}