<?php
namespace App\Middlewares;

use Flight;

class AuthAdminMiddleware
{
    public function before()
    {
        session_start();

        if (isset($_SESSION['admin_id']) === false) {
            Flight::redirect('/login-admin');
            exit;
        }
    }
}