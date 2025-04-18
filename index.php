<?php

use App\Controllers\DashboardAdminController;
use App\Controllers\JurusanController;
use App\Controllers\KelasController;
use App\Controllers\LoginAdminController;
use App\Controllers\MahasiswaController;
use App\Controllers\MataKuliahController;
use App\Middlewares\AuthAdminMiddleware;
use App\Models\Admin;
use App\Models\Kelas;
use App\Models\Matakuliah;
require 'vendor/autoload.php';


// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// Set lokasi view ke app/views
Flight::set('flight.views.path', __DIR__ . '/app/views');


Flight::route('/', function () {
    echo 'hello';
});

Flight::route('/login-admin', function () {
    $loginAdminController = new LoginAdminController();
    $loginAdminController->index();
});

Flight::route('POST /login-admin/save', function () {
    $loginAdminController = new LoginAdminController();
    $loginAdminController->login();
});

$adminMiddleware = new AuthAdminMiddleware();

Flight::group('', function () {

    Flight::route('/dashboard-admin', function () {
        $dashboardAdminController = new DashboardAdminController();
        $dashboardAdminController->index();
    });

    // manajemen dosen
    Flight::route('/dashboard-admin/manage-dosen', function () {
        $dashboardAdminController = new DashboardAdminController();
        $dashboardAdminController->manage_dosen();
    });

    Flight::route('POST /dashboard-admin/add-dosen', function () {
        $dashboardAdminController = new DashboardAdminController();
        $dashboardAdminController->add_dosen();
    });

    Flight::route('POST /dashboard-admin/update-dosen', function () {
        $dashboardAdminController = new DashboardAdminController();
        $dashboardAdminController->update_dosen();
    });

    Flight::route('POST /dashboard-admin/delete-dosen', function () {
        $dashboardAdminController = new DashboardAdminController();
        $dashboardAdminController->delete_dosen();
    });

    // manajemen mahasiswa
    Flight::route('/dashboard-admin/manage-mahasiswa', function () {
        $dashboardMahasiswaController = new MahasiswaController();
        $dashboardMahasiswaController->manage_mahasiswa();
    });

    Flight::route('POST /dashboard-admin/add-mahasiswa', function () {
        $dashboardMahasiswaController = new MahasiswaController();
        $dashboardMahasiswaController->add_mahasiswa();
    });

    Flight::route('POST /dashboard-admin/update-mahasiswa', function () {
        $dashboardMahasiswaController = new MahasiswaController();
        $dashboardMahasiswaController->update_mahasiwa();
    });

    Flight::route('POST /dashboard-admin/delete-mahasiswa', function () {
        $dashboardMahasiswaController = new MahasiswaController();
        $dashboardMahasiswaController->delete_mahasiwa();
    });

    // manajemen jurusan
    Flight::route('/dashboard-admin/manage-jurusan', function () {
        $dashboardJurusanController = new JurusanController();
        $dashboardJurusanController->manage_jurusan();
    });

    Flight::route('POST /dashboard-admin/add-jurusan', function () {
        $dashboardJurusanController = new JurusanController();
        $dashboardJurusanController->add_jurusan();
    });

    Flight::route('POST /dashboard-admin/update-jurusan', function () {
        $dashboardJurusanController = new JurusanController();
        $dashboardJurusanController->update_jurusan();
    });

    Flight::route('POST /dashboard-admin/delete-jurusan', function () {
        $dashboardJurusanController = new JurusanController();
        $dashboardJurusanController->delete_jurusan();
    });


    // manajemen matakuliah
    Flight::route('/dashboard-admin/manage-matakuliah', function () {
        $dashboardMatakuliahController = new MataKuliahController();
        $dashboardMatakuliahController->manage_matakuliah();
    });

    Flight::route('POST /dashboard-admin/add-matakuliah', function () {
        $dashboardMatakuliahController = new MataKuliahController();
        $dashboardMatakuliahController->add_matakuliah();
    });

    Flight::route('POST /dashboard-admin/update-matakuliah', function () {
        $dashboardMatakuliahController = new MataKuliahController();
        $dashboardMatakuliahController->update_matakuliah();
    });

    Flight::route('POST /dashboard-admin/delete-matakuliah', function () {
        $dashboardMatakuliahController = new MataKuliahController();
        $dashboardMatakuliahController->delete_matakuliah();
    });

    // manajemen kelas
    Flight::route('/dashboard-admin/manage-kelas', function () {
        $dashboardKelasController = new KelasController();
        $dashboardKelasController->manage_kelas();
    });

    // Flight::route('/dashboard-admin/test', function () {
    //     $matakuliah = new Matakuliah();
    //     $matakuliah = $matakuliah->getMatakuliahById(5);
    //     echo $matakuliah['matakuliah'];
    // });

    Flight::route('POST /dashboard-admin/add-kelas', function () {
        $dashboardKelasController = new KelasController();
        $dashboardKelasController->add_kelas();
    });
}, [$adminMiddleware]);



Flight::start();