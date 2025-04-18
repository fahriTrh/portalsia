<?php
namespace App\Controllers;

use App\Models\Jurusan;
use App\Models\Matakuliah;
use App\Models\Semester;
use Flight;

class MataKuliahController
{
    public function manage_matakuliah()
    {
        $matakuliah = new Matakuliah();
        $matakuliah = $matakuliah->getAllMatakuliah();
        
        $jurusan = new Jurusan();
        $jurusan = $jurusan->getAllJurusan();
        
        $semester = new Semester();
        $semester = $semester->getAllSemester();

        ob_start();
        Flight::render('dashboard/admin/manage-matakuliah', [
            'matakuliah' => $matakuliah,
            'jurusan' => $jurusan,
            'semester' => $semester
        ]);

        $viewContent = ob_get_clean();

        Flight::render('layout/main', [
            'content' => $viewContent,
            'pageTitle' => 'Manajemen Matakuliah'
        ]);
    }

    public function add_matakuliah()
    {
        $data = Flight::request()->data;
        $nama_matakuliah = $data['matakuliah'];
        $jurusan_id = $data['jurusan_id'];
        $semester_id = $data['semester_id'];

        $matakuliah = new Matakuliah();

        $matakuliah->add_matakuliah($nama_matakuliah, $jurusan_id, $semester_id);

        return Flight::redirect('/dashboard-admin/manage-matakuliah');
    }

    public function update_matakuliah()
    {
        $data = Flight::request()->data;
        $nama_matakuliah = $data['matakuliah'];
        $jurusan_id = $data['jurusan_id'];
        $semester_id = $data['semester_id'];
        $id = $data['id-matakuliah'];

        $matakuliah = new Matakuliah();

        $matakuliah->update_matakuliah($id, $nama_matakuliah, $jurusan_id, $semester_id);

        return Flight::redirect('/dashboard-admin/manage-matakuliah');
    }

    public function delete_matakuliah()
    {
        $data = Flight::request()->data;
        $id = $data['id'];

        $matakuliah = new Matakuliah();

        $matakuliah->delete_matakuliah($id);

        return Flight::redirect('/dashboard-admin/manage-matakuliah');
    }
}