<?php
session_start();
include 'koneksi.php';


if (isset($_POST['submit_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    // Prepared Statement
    $query = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = mysqli_prepare($koneksi, $query);


    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $hasil = mysqli_stmt_get_result($stmt);


        if (mysqli_num_rows($hasil) > 0) {
            // Data cocok, buat sesi
            $_SESSION['username'] = $username;
            $_SESSION['status_login'] = true;
            header("Location: index.php");
        } else {
            // Data tidak cocok, lempar kembali ke login.php dengan membawa pesan gagal
            header("Location: login.php?pesan=gagal");
        }
        mysqli_stmt_close($stmt);
    }
} else {
    header("Location: login.php");
    exit;
}
?>
