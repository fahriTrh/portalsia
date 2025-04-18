<?php
namespace App\Models;

use PDOException;

class Matakuliah extends Database
{
    public function getAllMatakuliah()
    {
        $this->query("SELECT 
            matakuliah.id AS matakuliah_id,
            matakuliah.*,
            jurusan.*,
            semester.*
            FROM matakuliah
            JOIN jurusan ON matakuliah.jurusan_id = jurusan.id
            JOIN semester ON matakuliah.semester_id = semester.id
            ORDER BY matakuliah.id ASC
        ");
        return $this->resultSet();
    }

    public function getMatakuliahById($id)
    {
        $this->query("SELECT * FROM matakuliah WHERE id = :id");
        $this->bind(':id', $id);

        return $this->single();
    }

    public function add_matakuliah($nama_matakuliah, $jurusan_id, $semester_id)
    {
        try {
            $this->query("INSERT INTO matakuliah (matakuliah, jurusan_id, semester_id) VALUES (:matakuliah, :jurusan_id, :semester_id)");
            $this->bind(':matakuliah', $nama_matakuliah);
            $this->bind(':jurusan_id', $jurusan_id);
            $this->bind(':semester_id', $semester_id);
            $this->execute();

            return $this->lastInsertId();

        } catch (PDOException $e) {
            error_log('Error saat menambah matakuliah: ' . $e->getMessage());
            return false;
        }
    }

    public function update_matakuliah($id, $matakuliah, $jurusan_id, $semester_id)
    {
        try {

            $this->query("UPDATE matakuliah SET matakuliah = :matakuliah, jurusan_id = :jurusan_id, semester_id = :semester_id WHERE id = :id");
            $this->bind(':matakuliah', $matakuliah);
            $this->bind(':jurusan_id', $jurusan_id);
            $this->bind(':semester_id', $semester_id);
            $this->bind(':id', $id);
            $this->execute();

            return true;

        } catch (PDOException $e) {
            error_log('Error saat update matakuliah: ' . $e->getMessage());
            return false;
        }
    }

    public function delete_matakuliah($id)
    {
        try {
            $this->query("DELETE FROM matakuliah WHERE id = :id");
            $this->bind(':id', $id);
            $this->execute();

            return true;

        } catch (PDOException $e) {
            error_log('Error saat menghapus matakuliah: ' . $e->getMessage());
            return false;
        }
    }
}