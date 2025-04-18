<?php
namespace App\Controllers;

use App\Models\Jurusan;
use Flight;

class JurusanController
{
    public function manage_jurusan()
    {
        $jurusan = new Jurusan();
        $jurusan = $jurusan->getAllJurusan();

        ob_start();
        Flight::render('dashboard/admin/manage-jurusan', ['jurusan' => $jurusan]);
        $viewContent = ob_get_clean();

        Flight::render('layout/main', [
            'content' => $viewContent,
            'pageTitle' => 'Manajemen Jurusan'
        ]);
    }

    public function add_jurusan()
    {
        $data = Flight::request()->data;
        $nama_jurusan = $data['jurusan'];

        $jurusan = new Jurusan();

        $jurusan->add_jurusan($nama_jurusan);

        return Flight::redirect('/dashboard-admin/manage-jurusan');
    }

    public function update_jurusan()
    {
        $data = Flight::request()->data;
        $nama_jurusan = $data['jurusan'];
        $id = $data['id-jurusan'];

        $jurusan = new Jurusan();

        $jurusan->update_jurusan($id, $nama_jurusan);

        return Flight::redirect('/dashboard-admin/manage-jurusan');
    }

    public function delete_jurusan()
    {
        $data = Flight::request()->data;
        $id = $data['id'];

        $jurusan = new Jurusan();

        $jurusan->delete_jurusan($id);

        return Flight::redirect('/dashboard-admin/manage-jurusan');
    }
}