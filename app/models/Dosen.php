<?php
namespace App\Models;

use App\Models\Database;
use PDOException;

class Dosen extends Database
{
    public function getAllDosens()
    {
        $this->query("SELECT * FROM dosens");
        return $this->resultSet();
    }

    public function getDosenById($id)
    {
        $this->query("SELECT * FROM dosens WHERE id = :id");
        $this->bind(':id', $id);

        return $this->single();
    }

    public function add_dosen($nama, $nidn)
    {
        try {
            $password = password_hash($nidn, PASSWORD_DEFAULT);
            $this->query("INSERT INTO dosens (nama, nidn, password) VALUES (:nama, :nidn, :password)");
            $this->bind(':nama', $nama);
            $this->bind(':nidn', $nidn);
            $this->bind(':password', $password);
            $this->execute();

            return $this->lastInsertId();

        } catch (PDOException $e) {
            error_log('Error saat menambah dosen: ' . $e->getMessage());
            return false;
        }
    }

    public function update_dosen($id, $nama, $nidn, $password = null)
    {
        try {
            
            if (!empty($password)) {

                $hashPassword = password_hash($password, PASSWORD_DEFAULT);

                $this->query("UPDATE dosens SET nama = :nama, nidn = :nidn, password = :password WHERE id = :id");
                $this->bind(':password', $hashPassword);
            } else {
                $this->query("UPDATE dosens SET nama = :nama, nidn = :nidn WHERE id = :id");
            }
            
            $this->bind(':id', $id);
            $this->bind(':nama', $nama);
            $this->bind(':nidn', $nidn);
            $this->execute();

            return true;

        } catch (PDOException $e) {
            error_log('Error saat update dosen: ' . $e->getMessage());
            return false;
        }
    }

    public function delete_dosen($id)
    {
        try {
            $this->query("DELETE FROM dosens WHERE id = :id");
            $this->bind(':id', $id);
            $this->execute();

            return true;

        } catch (PDOException $e) {
            error_log('Error saat menghapus dosen: ' . $e->getMessage());
            return false;
        }
    }
}