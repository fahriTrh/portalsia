<?php
namespace App\Models;
use PDOException;

class Kelas extends Database
{
    public function getAllKelas()
    {
        $this->query("SELECT 
            kelas.id AS kelas_id,
            kelas.*,
            matakuliah.*,
            jurusan.*,
            semester.*
            FROM kelas
            JOIN matakuliah ON kelas.matakuliah_id = matakuliah.id
            JOIN jurusan ON kelas.jurusan_id = jurusan.id
            JOIN semester ON kelas.semester_id = semester.id
            ORDER BY kelas.id ASC
        ");
        return $this->resultSet();
    }

    public function add_kelas($kelas, $matakuliah_id, $jurusan_id, $semester_id)
    {
        try {
            $this->query("INSERT INTO kelas (kelas, matakuliah_id, jurusan_id, semester_id) VALUES (:kelas, :matakuliah_id, :jurusan_id, :semester_id)");
            $this->bind(':kelas', $kelas);
            $this->bind(':matakuliah_id', $matakuliah_id);
            $this->bind(':jurusan_id', $jurusan_id);
            $this->bind(':semester_id', $semester_id);
            $this->execute();

            return $this->lastInsertId();

        } catch (PDOException $e) {
            error_log('Error saat menambah matakuliah: ' . $e->getMessage());
            return false;
        }
    }

    public function getAllSameKelas($matakuliah_id)
    {
        $this->query("SELECT * FROM kelas WHERE matakuliah_id = :matakuliah_id");
        $this->bind(':matakuliah_id', $matakuliah_id);
        
        return count($this->resultSet());
    }
}