<?php
session_start();


// Cek apakah session login tidak ada
if (!isset($_SESSION['status_login'])) {
    // Jika tidak ada tiket login, tendang kembali ke halaman login
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html>


<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            margin-top: 100px;
        }


        .kotak {
            border: 2px solid green;
            padding: 30px;
            display: inline-block;
        }


        a.btn {
            background-color: red;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
        }
    </style>
</head>


<body>
    <div class="kotak">
        <h2>Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Anda berhasil login ke dalam sistem sederhana ini.</p>
        <br>
        <a href="logout.php" class="btn">Logout</a>
    </div>
</body>


</html>