<?php

namespace Src\Models\Goods;

use Src\Exceptions\InvalidArgumentException;
use Src\Models\ActiveRecordEntity;
use Src\Models\Users\User;

class Good extends ActiveRecordEntity {
    protected $ownerId;
    protected $title;
    // В бд по-другому, autorId = author_id и createdAt = created_at, надо использовать магический метод __set, в который попадает название поля из таблицы и его значение
    protected $description;
    protected $image;

    public function getTitle(): string {
        return $this->title;
    }
    public function getDescription(): string {
        return $this->description;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }
    public function setDescription(string $description): void {
        $this->description = $description;
    }
    public function setOwner(User $owner): void {
        $this->owner = $owner->getId();
    }

    public function getOwnerId(): int {
        // (int) - приведение к типу int
        return (int) $this->ownerId;
    }
    public function getOwner(): User {
        return User::getById($this->ownerId);
    }
    protected static function getTableName(): string {
        return 'goods';
    }
    public static function createGood(array $fields, User $owner): Good {
        if (empty($fields['title'])) {
            throw new InvalidArgumentException('Не передано название товара');
        }
        if (empty($fields['description'])) {
            throw new InvalidArgumentException('Не передано описание товара');
        }

        $good = new Good();
        $good->setOwner($owner);
        $good->setTitle($fields['title']);
        $good->setDescription($fields['description']);
        $good->save();
        return $good;
    }

    public function updateGood(array $fields): Good {
        if (empty($fields['title'])) {
            throw new InvalidArgumentException('Не передано название товара');
        }
        if (empty($fields['description'])) {
            throw new InvalidArgumentException('Не передано описание товара');
        }

        $this->setTitle($fields['title']);
        $this->setDescription($fields['description']);
        $this->save();
        return $this;
    }

}