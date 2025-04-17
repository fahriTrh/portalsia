<?php
namespace App\Controllers;

use App\Models\Dosen;
use Flight;

class DashboardAdminController
{
    public function index()
    {
        ob_start();
        Flight::render('dashboard/admin/admin-dashboard');
        $viewContent = ob_get_clean();

        Flight::render('layout/main', [
            'content' => $viewContent,
            'pageTitle' => 'Dashboard Admin'
        ]);
    }

    public function manage_dosen()
    {
        $dosen = new Dosen();
        $dosens = $dosen->getAllDosens();

        ob_start();
        Flight::render('dashboard/admin/manage-dosen', ['dosens' => $dosens]);
        $viewContent = ob_get_clean();

        Flight::render('layout/main', [
            'content' => $viewContent,
            'pageTitle' => 'Manajemen Dosen'
        ]);
    }

    public function add_dosen()
    {
        $data = Flight::request()->data;
        $nama = $data['nama'];
        $nidn = $data['nidn'];

        $dosen = new Dosen();

        
        $dosen->add_dosen($nama, $nidn);

        return Flight::redirect('/dashboard-admin/manage-dosen');
    }

    public function update_dosen()
    {
        $data = Flight::request()->data;
        $nama = $data['nama'];
        $nidn = $data['nidn'];
        $id = $data['id-dosen'];

        $dosen = new Dosen();

        $dosen->update_dosen($id, $nama, $nidn);

        return Flight::redirect('/dashboard-admin/manage-dosen');
    }

    public function delete_dosen()
    {
        $data = Flight::request()->data;
        $id = $data['id'];

        $dosen = new Dosen();
        $dosen->delete_dosen($id);

        return Flight::redirect('/dashboard-admin/manage-dosen');
    }
}