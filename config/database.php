<?php
// config/database.php
function getDBConnection() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "db_belajar";
    $dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";


    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Koneksi database gagal: " . $e->getMessage());
    }
}
?>
