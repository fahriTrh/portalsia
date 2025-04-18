<?php
namespace App\Models;

use PDOException;

class Jurusan extends Database
{
    public function getAllJurusan()
    {
        $this->query("SELECT * FROM jurusan");
        return $this->resultSet();
    }

    public function getJurusanById($id)
    {
        $this->query("SELECT * FROM jurusan WHERE id = :id");
        $this->bind(':id', $id);

        return $this->single();
    }

    public function add_jurusan($jurusan)
    {
        try {
            $this->query("INSERT INTO jurusan (jurusan) VALUES (:jurusan)");
            $this->bind(':jurusan', $jurusan);
            $this->execute();

            return $this->lastInsertId();

        } catch (PDOException $e) {
            error_log('Error saat menambah jurusan: ' . $e->getMessage());
            return false;
        }
    }

    public function update_jurusan($id, $jurusan)
    {
        try {

            $this->query("UPDATE jurusan SET jurusan = :jurusan WHERE id = :id");
            $this->bind(':id', $id);
            $this->bind(':jurusan', $jurusan);
            $this->execute();

            return true;

        } catch (PDOException $e) {
            error_log('Error saat update jurusan: ' . $e->getMessage());
            return false;
        }
    }

    public function delete_matakuliah($id)
    {
        try {
            $this->query("DELETE FROM jurusan WHERE id = :id");
            $this->bind(':id', $id);
            $this->execute();

            return true;

        } catch (PDOException $e) {
            error_log('Error saat menghapus jurusan: ' . $e->getMessage());
            return false;
        }
    }
}