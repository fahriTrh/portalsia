<?php
namespace App\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Matakuliah;
use App\Models\Semester;
use Flight;

class KelasController
{
    public function manage_kelas()
    {
        $kelas = new Kelas();
        $kelas = $kelas->getAllKelas();

        $matakuliah = new Matakuliah();
        $matakuliah = $matakuliah->getAllMatakuliah();
        
        $jurusan = new Jurusan();
        $jurusan = $jurusan->getAllJurusan();
        
        $semester = new Semester();
        $semester = $semester->getAllSemester();

        ob_start();
        Flight::render('dashboard/admin/manage-kelas', [
            'kelas' => $kelas,
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

    public function add_kelas()
    {
        $data = Flight::request()->data;
        $matakuliah_id = $data['matakuliah_id'];
        $jurusan_id = $data['jurusan_id'];
        $semester_id = $data['semester_id'];

        $kelas = new Kelas();
        $matakuliah = new Matakuliah();
        
        $matakuliah_name = $matakuliah->getMatakuliahById($matakuliah_id);
        $matakuliah_name = $matakuliah_name['matakuliah'];

        $getCount = $kelas->getAllSameKelas($matakuliah_id);
        $getCount = $getCount + 1;

        $kelas_name = $matakuliah_name . '-' . $getCount;

        $kelas->add_kelas($kelas_name, $matakuliah_id, $jurusan_id, $semester_id);

        return Flight::redirect('/dashboard-admin/manage-kelas');
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