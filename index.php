<?php

use App\Controllers\DashboardAdminController;
use App\Controllers\LoginAdminController;
use App\Models\Admin;
require 'vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Set lokasi view ke app/views
Flight::set('flight.views.path', __DIR__ . '/app/views');


Flight::route('/', function () {
    echo 'hello';
});

Flight::route('/login-admin', function() {
    $loginAdminController = new LoginAdminController();
    $loginAdminController->index();
});

Flight::route('POST /login-admin/save', function() {
    $loginAdminController = new LoginAdminController();
    $loginAdminController->login();
});

Flight::route('/dashboard-admin', function() {
    $dashboardAdminController = new DashboardAdminController();
    $dashboardAdminController->index();
});

Flight::route('/dashboard-admin/manage-dosen', function() {
    $dashboardAdminController = new DashboardAdminController();
    $dashboardAdminController->manage_dosen();
});

Flight::start();