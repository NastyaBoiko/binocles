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
        if (empty($userData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }
        if (empty($userData['password'])) {
            throw new InvalidArgumentException('Не передан password');
        }
        var_dump($userData);
    }
}