<?php
namespace App\Controllers;
use App\Models\Admin;
use Flight;

class LoginAdminController
{
    public function index()
    {
        Flight::render('auth/login-admin');
    }

    public function login()
    {
        $data = Flight::request()->data;
        $username = $data['username'];
        $password = $data['password'];

        $admin = new Admin();
        $admin = $admin->getAdminByUsername($username);

        if ($admin) {

            $hashPasswordFromDb = $admin['password'];

            if (password_verify($password, $hashPasswordFromDb)) {
                session_start();
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_username'] = $admin['username'];

                return Flight::redirect('/dashboard-admin');
            } else {
                return Flight::redirect('/login-admin');
            }

        }

        return Flight::redirect('/login-admin');

    }
}