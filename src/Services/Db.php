<?php

namespace Src\Services;

class Db {
    private $pdo;

    public function __construct() {
        $dbOptions = (require __DIR__ . '/../Config/settings.php')['db'];
        $this->pdo = new \PDO(
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );
        // установка кодировки
        $this->pdo->exec('SET NAMES UTF8'); 
    }

    public function query(string $sql, $params = [], string $className = 'stdClass'): ?array {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        // Бомба - метод, записывает строки таблицы в объекты необходимого класса
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }
}
