<?php namespace App\Models;

use App\Models\Database;

class Admin extends Database
{
    public function getAllAdmins()
    {
        $this->query("SELECT * FROM admins");
        return $this->resultSet();
    }

    public function getAdminById($id)
    {
        $this->query("SELECT * FROM admins WHERE id = :id");
        $this->bind(':id', $id);

        return $this->single();
    }

    public function getAdminByUsername($username)
    {
        $this->query("SELECT * FROM admins WHERE username = :username");
        $this->bind(':username', $username);

        return $this->single();
    }
}