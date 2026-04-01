<?php
// koneksi.php (Versi PDO)
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_belajar";


// DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";


try {
    // Membuat koneksi PDO baru
    $pdo = new PDO($dsn, $user, $pass);
   
    // Atur mode error PDO ke Exception agar mudah dilacak jika ada salah query
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Jika koneksi gagal, hentikan program dan tampilkan pesan
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
