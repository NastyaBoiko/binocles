<?php

namespace Src\Models\Users;

class UsersAuthService
 {
    public static function createToken(User $user): void {
        $token = $user->getId() . ':' . $user->getAuthToken();
        // 60*60 значит устанавливаем на 1 час
        setcookie('token', $token, time()+60*60, '/', '', false, true);
    }

    public static function getUserByToken(): ?User {
        $token = $_COOKIE['token'] ?? '';
        if (empty($token)) {
            return null;
        }
        [$userId, $authToken] = explode(':', $token, 2);

        $user = User::getById((int) $userId);
        if ($user === null) {
            return null;
        }

        if ($user->getAuthToken() !== $authToken) {
            return null;
        }

        return $user;
    }

    public static function getUserByBearerToken(): ?User 
    { 
        // Получаем заголовки
        $headers = getallheaders();
        $user = null;

        // Проверяем наличие заголовка авторизации
        if (isset($headers['Authorization'])) {
            // Извлекаем токен
            $authHeader = $headers['Authorization'];
            $token = str_replace('Bearer ', '', $authHeader); // Предполагаем, что используется Bearer токен

            $user = User::findOneByColumn('auth_token', $token);
            if ($user === null) {
                return null;
            }
        }

        return $user;
    }
 }