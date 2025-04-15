<?php
namespace App\Controllers;

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
        ob_start();
        Flight::render('dashboard/admin/manage-dosen');
        $viewContent = ob_get_clean();

        Flight::render('layout/main', [
            'content' => $viewContent,
            'pageTitle' => 'Manajemen Dosen'
        ]);
    }
}