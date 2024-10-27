<?php

class Cookie {
    private $type;

    private $availableTypes = ['шоколадное', 'клубничное', 'банановое', 'ванильное'];

    public function setType($type) {
        if (in_array($type, $this->availableTypes)) {
            $this->type = $type;
        } else {
            throw new Exception("Недопустимый тип печенья: $type. Доступные типы: " . implode(', ', $this->availableTypes));
        }
    }

    public function getType() {
        return $this->type;
    }

    public function displayInfo() {
        echo "<div style='font-family: Arial, sans-serif; border: 1px solid #ccc; padding: 10px; border-radius: 5px;'>";
        echo "<h1 style='color: black;'>Информация о печенье</h2>";

        if ($this->type) {
            echo "<p>Тип печенья: <strong style='color: #FF5722;'>{$this->getType()}</strong></p>";
        } else {
            echo "<p>Тип печенья еще не установлен.</p>";
        }

        echo "<h3>Доступные типы:</h3>";
        echo "<ul style='list-style-type: square;'>";
        foreach ($this->availableTypes as $availableType) {
            echo "<li>{$availableType}</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
}

try {
    $cookie = new Cookie();
    $cookie->setType('шоколадное');
    $cookie->displayInfo();
    $cookie->setType('подгорелое');
} catch (Exception $e) {
    echo "<div style='color: red; font-family: Arial, sans-serif;'>Ошибка: " . $e->getMessage() . "</div>";
}