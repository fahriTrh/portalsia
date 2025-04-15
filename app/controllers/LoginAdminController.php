<?php namespace App\Controllers;
use Flight;

class LoginAdminController
{
    public function index()
    {
        ob_start();
        Flight::render('auth/login-admin');
        $viewContent = ob_get_clean();

        Flight::render('layout/main', ['content' => $viewContent]);
    }

    public function login()
    {
        $data = Flight::request()->query;
        $nama = $data['nama'];

        Flight::json($data);
    }
}