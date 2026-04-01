<?php
// Panggil koneksi database
include 'koneksi.php';


if (isset($_POST['submit_register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    // Query untuk menyimpan data (Tanpa Hashing & Prepared Statement)
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $hasil = mysqli_query($koneksi, $query);


    if ($hasil) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
    } else {
        echo "Gagal mendaftar!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
        // Validasi menggunakan JavaScript murni
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