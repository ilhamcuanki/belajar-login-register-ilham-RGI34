<?php
// index.php (FRONT CONTROLLER)
session_start();
require_once 'controllers/AuthController.php';


// Tangkap perintah dari URL (misal: index.php?action=login)
// Jika tidak ada parameter action, set default ke 'login'
$action = isset($_GET['action']) ? $_GET['action'] : 'login';


// Arahkan ke fungsi Controller yang sesuai
switch ($action) {
    case 'login':
        handleLogin();
        break;
    case 'register':
        handleRegister();
        break;
    case 'dashboard':
        showDashboard();
        break;
    case 'logout':
        handleLogout();
        break;
    default:
        handleLogin();
        break;
}
?>
