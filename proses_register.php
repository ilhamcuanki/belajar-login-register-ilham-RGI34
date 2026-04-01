<?php
// proses_register.php (Versi PDO)
include 'koneksi.php';


if (isset($_POST['submit_register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    try {
        // 1. PREPARE: Buat kerangka query dengan Named Parameters
        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($query);


        // 2 & 3. BIND & EXECUTE: PDO bisa melakukan bind dan execute sekaligus menggunakan array
        $hasil = $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);


        if ($hasil) {
            echo "<script>alert('Registrasi berhasil!'); window.location='login.php';</script>";
        }
    } catch (PDOException $e) {
        // Menangkap error jika username kembar atau masalah database lainnya
        echo "<script>alert('Gagal mendaftar: " . $e->getMessage() . "'); window.location='register.php';</script>";
    }
} else {
    header("Location: register.php");
    exit;
}
?>
