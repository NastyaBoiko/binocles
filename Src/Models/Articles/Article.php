<?php

namespace Src\Models\Articles;

use Src\Exceptions\InvalidArgumentException;
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

    public function setName(string $name): void {
        $this->name = $name;
    }
    public function setText(string $text): void {
        $this->text = $text;
    }
    public function setAuthor(User $author): void {
        $this->authorId = $author->getId();
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
    public static function createArticle(array $fields, User $author): Article {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }
        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $article = new Article();
        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);
        $article->save();
        return $article;
    }

    public function updateArticle(array $fields): Article {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }
        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $this->setName($fields['name']);
        $this->setText($fields['text']);
        $this->save();
        return $this;
    }

    
}