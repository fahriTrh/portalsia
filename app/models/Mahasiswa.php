<?php
namespace App\Models;

use App\Models\Database;
use PDOException;

class Mahasiswa extends Database
{
    public function getAllMahasiswa()
    {
        $this->query("SELECT * FROM mahasiswa");
        return $this->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->query("SELECT * FROM mahasiswa WHERE id = :id");
        $this->bind(':id', $id);

        return $this->single();
    }

    public function add_mahasiswa($nama, $nim)
    {
        try {
            $password = password_hash($nim, PASSWORD_DEFAULT);
            $this->query("INSERT INTO mahasiswa (nama, nim, password) VALUES (:nama, :nim, :password)");
            $this->bind(':nama', $nama);
            $this->bind(':nim', $nim);
            $this->bind(':password', $password);
            $this->execute();

            return $this->lastInsertId();

        } catch (PDOException $e) {
            error_log('Error saat menambah mahasiswa: ' . $e->getMessage());
            return false;
        }
    }

    public function update_mahasiswa($id, $nama, $nim, $password = null)
    {
        try {

            if (!empty($password)) {

                $hashPassword = password_hash($password, PASSWORD_DEFAULT);

                $this->query("UPDATE mahasiswa SET nama = :nama, nim = :nim, password = :password WHERE id = :id");
                $this->bind(':password', $hashPassword);
            } else {
                $this->query("UPDATE mahasiswa SET nama = :nama, nim = :nim WHERE id = :id");
            }

            $this->bind(':id', $id);
            $this->bind(':nama', $nama);
            $this->bind(':nim', $nim);
            $this->execute();

            return true;

        } catch (PDOException $e) {
            error_log('Error saat update mahasiswa: ' . $e->getMessage());
            return false;
        }
    }

    public function delete_mahasiswa($id)
    {
        try {
            $this->query("DELETE FROM mahasiswa WHERE id = :id");
            $this->bind(':id', $id);
            $this->execute();

            return true;

        } catch (PDOException $e) {
            error_log('Error saat menghapus mahasiswa: ' . $e->getMessage());
            return false;
        }
    }
}