<?php

namespace Src\Models\Goods;

use Src\Exceptions\InvalidArgumentException;
use Src\Exceptions\NotFoundException;
use Src\Models\ActiveRecordEntity;
use Src\Models\Users\User;

class Good extends ActiveRecordEntity
{
    protected $ownerId;
    protected $title;
    // В бд по-другому, autorId = author_id и createdAt = created_at, надо использовать магический метод __set, в который попадает название поля из таблицы и его значение
    protected $description;
    protected $image;
    protected $amount;

    public function getTitle(): string
    {
        return $this->title;
    }
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setOwner(User $owner): void
    {
        $this->ownerId = $owner->getId();
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getOwnerId(): int
    {
        // (int) - приведение к типу int
        return (int) $this->ownerId;
    }
    public function getOwner(): User
    {
        return User::getById($this->ownerId);
    }
    protected static function getTableName(): string
    {
        return 'goods';
    }
    public static function createGood(array $fields, User $owner): Good
    {
        if (empty($fields['title'])) {
            throw new InvalidArgumentException('Не передано название товара');
        }
        if (empty($fields['description'])) {
            throw new InvalidArgumentException('Не передано описание товара');
        }
        if (empty($fields['image'])) {
            throw new InvalidArgumentException('Не передана картинка товара');
        }

        $good = new Good();
        $good->setOwner($owner);
        $good->setTitle($fields['title']);
        $good->setDescription($fields['description']);
        $good->setImage($fields['image']);
        $good->setAmount($fields['amount']);
        $good->save();
        return $good;
    }

    public function updateGood(array $fields): Good
    {
        if (empty($fields)) {
            throw new InvalidArgumentException('Не переданы данные для обновления');
        }
        if (isset($fields['title'])) {
            $this->setTitle($fields['title']);
        }
        if (isset($fields['description'])) {
            $this->setDescription($fields['description']);
        }
        if (isset($fields['amount'])) {
            $this->setAmount($fields['amount']);
        }
        if (isset($fields['image'])) {
            $this->setImage($fields['image']);
        }
        if (isset($fields['owner_id'])) {
            $owner = User::getById($fields['owner_id']);

            if ($owner === null) {
                throw new NotFoundException('Пользователя с таким id не существует');
            }

            $this->setOwner($owner);
        }

        $this->save();
        return $this;
    }
}
