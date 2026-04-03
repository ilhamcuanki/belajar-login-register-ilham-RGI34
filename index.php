<?php
session_start();
require_once 'controllers/AuthController.php';

// Tangkap perintah dari URL
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Buat object dari Controller
$controller = new AuthController();

// Cek apakah method (fungsi) ada di dalam controller tersebut
if (method_exists($controller, $action)) {
    // Panggil method secara dinamis
    $controller->$action();
} else {
    // Jika user mengetik sembarangan di URL, kembalikan ke login
    $controller->login();
}
?>