<?php
namespace App\Controllers;

use App\Models\Mahasiswa;
use Flight;

class MahasiswaController
{
    public function manage_mahasiswa()
    {
        $mahasiwa = new Mahasiswa();
        $mahasiwa = $mahasiwa->getAllMahasiswa();

        ob_start();
        Flight::render('dashboard/admin/manage-mahasiswa', ['mahasiswa' => $mahasiwa]);
        $viewContent = ob_get_clean();

        Flight::render('layout/main', [
            'content' => $viewContent,
            'pageTitle' => 'Manajemen Mahasiswa'
        ]);
    }

    public function add_mahasiswa()
    {
        $data = Flight::request()->data;
        $nama = $data['nama'];
        $nim = $data['nim'];

        $mahasiwa = new Mahasiswa();

        $mahasiwa->add_mahasiswa($nama, $nim);

        return Flight::redirect('/dashboard-admin/manage-mahasiswa');
    }

    public function update_mahasiwa()
    {
        $data = Flight::request()->data;
        $nama = $data['nama'];
        $nim = $data['nim'];
        $id = $data['id-mahasiswa'];

        $mahasiwa = new Mahasiswa();

        $mahasiwa->update_mahasiswa($id, $nama, $nim);

        return Flight::redirect('/dashboard-admin/manage-mahasiswa');
    }

    public function delete_mahasiwa()
    {
        $data = Flight::request()->data;
        $id = $data['id'];

        $mahasiwa = new Mahasiswa();
        $mahasiwa->delete_mahasiswa($id);

        return Flight::redirect('/dashboard-admin/manage-mahasiswa');
    }
}