<?php

namespace Src\Models\Users;

use Src\Exceptions\InvalidArgumentException;
use Src\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity {
    protected $nickname;
    protected $email;
    protected $isConfirmed;
    protected $role;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;
    
    public function getNickname(): string {
        return $this->nickname;
    }

    public function getEmail(): string {
        return $this->email;
    }
    public function getRole(): string {
        return $this->role;
    }

    protected static function getTableName(): string {
        return 'users';
    }
    public static function signUp(array $userData) {
        if (empty($userData['nickname'])) {
            throw new InvalidArgumentException('Не передан nickname');
        }
        // Проверка на валидность
        if (!preg_match('/[a-zA-Z0-9]+$/', $userData['nickname'])) {
            throw new InvalidArgumentException('Nickname может состоять только из символов латинского алфавита и цифр');
        }
        if (empty($userData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }
        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email некорректен');
        }
        if (empty($userData['password'])) {
            throw new InvalidArgumentException('Не передан password');
        }
        if (mb_strlen($userData['password']) < 8) {
            throw new InvalidArgumentException('Пароль должен содержать не менее 8 символов');
        }


        var_dump($userData);
    }
}