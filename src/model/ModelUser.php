<?php

namespace App\Model;

class ModelUser extends Model
{
    public function __construct()
    {
        parent::__construct();
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