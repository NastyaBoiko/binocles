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
        // Встроенная проверка на email
        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email некорректен');
        }
        // Проверка на дубликаты
        if (static::findOneByColumn('nickname', $userData['nickname']) !== null) {
            throw new InvalidArgumentException('Пользователь с таким nickname уже существует');
        }
        if (static::findOneByColumn('email', $userData['email']) !== null) {
            throw new InvalidArgumentException('Пользователь с таким email уже существует');
        }
        if (empty($userData['password'])) {
            throw new InvalidArgumentException('Не передан password');
        }
        if (mb_strlen($userData['password']) < 8) {
            throw new InvalidArgumentException('Пароль должен содержать не менее 8 символов');
        }
        if ($userData['password'] !== $userData['password_repeat']) {
            throw new InvalidArgumentException('Пароли не совпадают');
        }
        if (!preg_match('/[A-ZА-Я]+/', $userData['password'])) {
            throw new InvalidArgumentException('В пароле должна быть заглавная буква!');
        }
        if (!preg_match('/[a-zа-я]+/', $userData['password'])) {
            throw new InvalidArgumentException('В пароле должна быть строчная буква!');
        }
        if (!preg_match('/[0-9]+/', $userData['password'])) {
            throw new InvalidArgumentException('В пароле должна быть хотя бы 1 цифра!');
        }

        $user = new User();
        $user->nickname = $userData['nickname'];
        $user->email = $userData['email'];
        $user->passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->isConfirmed = true;
        $user->role = 'user';
        $user->authToken = sha1(random_bytes(100).sha1(random_bytes(100)));
        $user->save();
        return $user;
    }

    public static function login(array $loginData): User 
    {
        if (empty($loginData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }
        if (empty($loginData['password'])) {
            throw new InvalidArgumentException('Не передан password');
        }
        $user = User::findOneByColumn('email', $loginData['email']);
        if ($user === null) {
            // Нет пользователя с таким email
            throw new InvalidArgumentException('Неправильный логин или пароль');
        }
        if (!password_verify($loginData['password'], $user->getPasswordHash())) {
            throw new InvalidArgumentException('Неправильный логин или пароль');
        }
        if (!$user->isConfirmed) {
            throw new InvalidArgumentException('Пользователь не подтвержден');
        }
        $user->refreshAuthToken();
        $user->save();
        return $user;
    }

    public function getPasswordHash(): string 
    {
        return $this->passwordHash;
    }

    public function getAuthToken(): string 
    {
        return $this->authToken;
    }

    private function refreshAuthToken() {
        $this->authToken = sha1(random_bytes(100) . sha1(random_bytes(100)));
    }
}