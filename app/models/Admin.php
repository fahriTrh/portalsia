<?php namespace App\Models;

      use PDO;

class Admin extends \flight\ActiveRecord
{
    public function __construct()
    {
        $host = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $dbUsername = $_ENV['DB_USERNAME'];

        $databaseConnection = new PDO("mysql:host=$host;dbname=$dbName", "$dbUsername", '');

        parent::__construct($databaseConnection, 'admins');
    }
}