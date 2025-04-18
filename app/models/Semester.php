<?php namespace App\Models;

class Semester extends Database
{
    public function getAllSemester()
    {
        $this->query("SELECT * FROM semester");
        return $this->resultSet();
    }
}