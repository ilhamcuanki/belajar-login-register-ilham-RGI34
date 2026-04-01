<?php
include 'koneksi.php';
if (isset($_POST['submit_register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    // 1. PREPARE: Buat kerangka query dengan tanda tanya (?)
    $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);


    if ($stmt) {
        // 2. BIND PARAMETER: Masukkan data ke tanda tanya
        // "ss" berarti ada 2 data bertipe String (username dan password)
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);


        // 3. EXECUTE: Jalankan query yang sudah disatukan dengan data
        $hasil = mysqli_stmt_execute($stmt);


        if ($hasil) {
            echo "<script>alert('Registrasi berhasil!'); window.location='login.php';</script>";
        } else {
            echo "Gagal mendaftar: " . mysqli_error($koneksi);
        }


        // Tutup statement untuk menghemat memori server
        mysqli_stmt_close($stmt);
    } else {
        echo "Query gagal disiapkan!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register (Prepared Statement)</title>
    <style>
        body { font-family: Arial; text-align: center; margin-top: 50px; }
        form { display: inline-block; border: 1px solid #ccc; padding: 20px; border-radius: 5px; }
        input { margin: 10px 0; padding: 8px; width: 200px; }
        button { padding: 10px 20px; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Halaman Register</h2>
    <form method="POST" action="" onsubmit="return validasiForm()">
        <input type="text" id="username" name="username" placeholder="Username"><br>
        <input type="password" id="password" name="password" placeholder="Password"><br>
        <button type="submit" name="submit_register">Daftar</button>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </form>


    <script>
        function validasiForm() {
            var user = document.getElementById("username").value;
            var pass = document.getElementById("password").value;
            if (user == "" || pass == "") {
                alert("Username dan Password tidak boleh kosong!");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>