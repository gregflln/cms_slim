<?php

namespace App\Model;

class ModelUser extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function all(): array
    {
        $query = $this->db->query('SELECT * FROM users');
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        return $query->fetchAll();
    }
    public function findByEmail(string $email) : array | bool
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }
}