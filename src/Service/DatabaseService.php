<?php

namespace App\Service;

use PDO;
use PDOException;

class DatabaseService
{
    private $pdo;

    public function __construct()
    {
        $host = $_ENV['MONGODB_URI'];
        $db = $_ENV['MONGODB_DB'];
        $user = $_ENV['MONGODB_USER'];
        $pass = $_ENV['MONGODB_PASSWORD'];
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;port=8889;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}
