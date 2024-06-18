<?php

namespace App\Models\Managers;

use Core\Manager;
use App\Models\Entities\User;
use PDO;

class UserManager extends Manager
{
    public function getUserById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        return $stmt->fetch();
    }
}
