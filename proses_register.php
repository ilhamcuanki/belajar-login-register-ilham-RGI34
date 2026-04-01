<?php
// Murni berisi logika PHP, tanpa HTML sama sekali
include 'koneksi.php';


// Cek apakah data benar-benar dikirim dari tombol submit
if (isset($_POST['submit_register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    // Prepared Statement
    $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);


    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        $hasil = mysqli_stmt_execute($stmt);


        if ($hasil) {
            // Jika sukses, munculkan alert dan lempar ke halaman login
            echo "<script>alert('Registrasi berhasil!'); window.location='login.php';</script>";
        } else {
            // Jika gagal, kembalikan ke form register
            echo "<script>alert('Gagal mendaftar!'); window.location='register.php';</script>";
        }
        mysqli_stmt_close($stmt);
    }
} else {
    // Jika ada yang mencoba akses file ini langsung dari URL, tendang kembali
    header("Location: register.php");
    exit;
}
?>
