<?php

namespace App\Model;
use App\Database;

class Model
{
    protected \PDO $db;

    public function __construct()
    {
        $this->db = (new Database)();
    }
}