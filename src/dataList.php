<?php

namespace App;

class DataList
{
    private \PDO $db;
    private string $table;

    public function __construct()
    {
        $this->db = (new Database)();
    }
    public function getAll(string $table): array
    {
        $query = $this->db->query('SELECT * FROM ' . $table);
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        return $query->fetchAll();
    }
}