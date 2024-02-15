<?php

namespace Src\Models\Articles;

class Article {
    private $id;
    private $name;
    private $text;
    // В бд по-другому, autorId = author_id и createdAt = created_at, надо использовать магический метод __set, в который попадает название поля из таблицы и его значение
    private $authorId;
    private $createdAt;


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
    public function getName(): string {
        return $this->name;
    }
    public function getText(): string {
        return $this->text;
    }

    // Преобразует author_id в autorId 
    private function underscoreToCamelCase(string $source): string {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

}