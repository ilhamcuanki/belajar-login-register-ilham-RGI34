<?php
// controllers/AuthController.php
require_once 'models/UserModel.php';


function handleLogin() {
    // Jika ada pengiriman form (POST)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];


        $user = authenticateUser($username, $password);


        if ($user) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['status_login'] = true;
            header("Location: index.php?action=dashboard");
            exit;
        } else {
            // Lempar ke view login dengan status gagal
            $pesan_error = "Username atau Password salah!";
            require 'views/login.php';
        }
    } else {
        // Jika hanya akses biasa (GET), tampilkan form login
        require 'views/login.php';
    }
}


function handleRegister() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];


        $sukses = registerUser($username, $password);


        if ($sukses) {
            echo "<script>alert('Registrasi berhasil!'); window.location='index.php?action=login';</script>";
        } else {
            echo "<script>alert('Gagal mendaftar!');</script>";
            require 'views/register.php';
        }
    } else {
        require 'views/register.php';
    }
}


function showDashboard() {
    // Keamanan: Cek tiket session
    if (!isset($_SESSION['status_login'])) {
        header("Location: index.php?action=login");
        exit;
    }
    require 'views/dashboard.php';
}


function handleLogout() {
    session_destroy();
    header("Location: index.php?action=login");
    exit;
}
?>
