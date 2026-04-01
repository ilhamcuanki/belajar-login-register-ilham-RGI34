<?php
session_start();
include 'koneksi.php';


if (isset($_SESSION['status_login'])) {
    header("Location: index.php");
    exit;
}


if (isset($_POST['submit_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    // 1. PREPARE: Siapkan kerangka seleksi
    $query = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = mysqli_prepare($koneksi, $query);


    if ($stmt) {
        // 2. BIND PARAMETER: Hubungkan variabel ke tanda tanya ('ss' = string, string)
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);


        // 3. EXECUTE: Jalankan query
        mysqli_stmt_execute($stmt);


        // 4. GET RESULT: Ambil hasil dari eksekusi statement
        $hasil = mysqli_stmt_get_result($stmt);


        // Hitung baris yang ditemukan
        $cek_baris = mysqli_num_rows($hasil);


        if ($cek_baris > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['status_login'] = true;
            header("Location: index.php");
        } else {
            echo "<script>alert('Username atau password salah!');</script>";
        }


        mysqli_stmt_close($stmt);
    }
}
?>


<!DOCTYPE html>
<html>


<head>
    <title>Login (Prepared Statement)</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            margin-top: 50px;
        }


        form {
            display: inline-block;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }


        input {
            margin: 10px 0;
            padding: 8px;
            width: 200px;
        }


        button {
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>


<body>
    <h2>Halaman Login</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="submit_login">Login</button>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </form>
</body>


</html>