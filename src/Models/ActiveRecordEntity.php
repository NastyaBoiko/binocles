<?php

namespace Src\Models;

use Src\Services\Db;

// у абстрактного класса нельзя создать объект, но от него можно наследоваться 
abstract class ActiveRecordEntity {
    protected $id;

    // Вызывается при попытке изменить значение несуществующего (как в данном случае не существует $autor_id) или скрытого свойства
    public function __set($name, $value)
    {
        // echo 'Пытаюсь создать для свойства ' . $name . ' значение ' . $value . '<br>';
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    public function getId(): int {
        return $this->id;
    }

    // Преобразует author_id в autorId 
    private function underscoreToCamelCase(string $source): string {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    public static function findAll(): array {
        $db = new Db();
        // Позднее статическое связывание посмотреть
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }

    // self - обозначает, что возвращает объект этого класса
    public static function getById(int $id): ?self {
        $db = new Db();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() .
            '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }

    // абстрактный метод реализуется в классах-наследниках
    abstract protected static function getTableName(): string;
}