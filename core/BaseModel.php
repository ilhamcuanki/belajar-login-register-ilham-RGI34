<?php
class BaseModel {
    protected $pdo;

    public function __construct() {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "db_belajar";
        $dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

        try {
            // Properti $this->pdo akan bisa dipakai oleh semua class turunannya
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }
}
?>