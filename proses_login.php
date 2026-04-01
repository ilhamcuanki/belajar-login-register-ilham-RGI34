<?php
// proses_login.php (Versi PDO)
session_start();
include 'koneksi.php';


if (isset($_POST['submit_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    try {
        // 1. PREPARE: Siapkan kerangka seleksi
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $pdo->prepare($query);


        // 2 & 3. EXECUTE: Jalankan query dengan memasukkan data ke parameter
        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);


        // 4. FETCH: Tarik hasil (jika ada)
        // FETCH_ASSOC berarti data ditarik sebagai array asosiatif (berdasarkan nama kolom)
        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        // Jika $user berisi data (tidak false)
        if ($user) {
            // Data cocok, buat sesi. Kita bahkan bisa mengambil ID dari database sekarang.
            $_SESSION['username'] = $user['username'];
            $_SESSION['status_login'] = true;
            header("Location: index.php");
        } else {
            // Data tidak cocok
            header("Location: login.php?pesan=gagal");
        }
    } catch (PDOException $e) {
        die("Error sistem: " . $e->getMessage());
    }
} else {
    header("Location: login.php");
    exit;
}
?>

