<?php

namespace App\Service;

use MongoDB\Client;

class DatabaseService
{
    private $client;
    private $db;

    public function __construct()
    {
        $uri = $_ENV['MONGODB_URI'];
        $this->client = new Client($uri);
        $this->db = $this->client->selectDatabase($_ENV['MONGODB_DB']);
    }

    public function getDb()
    {
        return $this->db;
    }
}
