<?php

namespace App;

use PDO;
use PDOException;

class Database
{
    private PDO $connection;

    public function __construct(string $host, string $db, string $user, string $pass)
    {
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        try {
            $this->connection = new PDO($dsn, $user, $pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new \RuntimeException("Не удалось подключиться к базе данных, проверьте данные и настройки подключения.");
        }
    }

    public function getUsers(): array
    {
        $stmt = $this->connection->query("SELECT id, name, email FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
