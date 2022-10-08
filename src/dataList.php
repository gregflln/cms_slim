<?php

namespace App;

class DataList
{
    private \PDO $db;
    private string $table;

    public function __construct()
    {
        $dsn = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};port={$_ENV['DB_PORT']};charset=utf8";
        $pdo = new \PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS']);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->db = $pdo;
        
    }
    public function getAll(string $table): array
    {
        $query = $this->db->query('SELECT * FROM ' . $table);
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        return $query->fetchAll();
    }
}