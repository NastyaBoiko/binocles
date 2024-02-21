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
        $db = Db::getInstance();
        // Позднее статическое связывание посмотреть
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }

    // self - обозначает, что возвращает объект этого класса
    public static function getById(int $id): ?self {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() .
            '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }

    public function save(): void {
        $mappedProperties = $this->mapPropertiesToDbFormat();
        if ($this->id !== null) {
            $this->update($mappedProperties);
        } else {
            $this->insert($mappedProperties);
        }
    } 

    private function update(array $mappedProperties): void {
        // Здесь обновляем существующую запись в базе
        $columns2params = [];
        $params2values = [];
        $index = 1;
        foreach ($mappedProperties as $column => $value) {
            $param = ':param' . $index;
            $columns2params[] = $column . '=' . $param;
            $params2values[$param] = $value;
            $index++;
        }
        // Массив со значениями name=:param1, text=:param2 и тд
        // var_dump($columns2params);
        // Массив с колючами ":param1" и со значениями "Новое название статьи" и тд
        // var_dump($params2values);
        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;
        // var_dump($sql);
        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
    }

    private function insert(array $mappedProperties): void {
        // Здесь создаем новую запись в базе
    }

    private function mapPropertiesToDbFormat(): array {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();
        $mappedProperties = [];
        foreach ($properties as $property) {
            // в property лежат все поля свойств 
            // var_dump($property);
            $propertyName = $property->getName();
            // в propertyName лежат все названия полей
            // var_dump($propertyName);
            $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
        }
        return $mappedProperties;
    }

    private function camelCaseToUnderscore(string $source): string 
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

    // абстрактный метод реализуется в классах-наследниках
    abstract protected static function getTableName(): string;
}