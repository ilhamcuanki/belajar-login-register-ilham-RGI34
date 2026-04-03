<?php
session_start();

// Panggil semua file yang dibutuhkan
require_once 'middlewares/AuthMiddleware.php';
require_once 'middlewares/GuestMiddleware.php';
require_once 'controllers/AuthController.php';

// Tangkap perintah dari URL
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// TABEL ROUTING: Mendefinisikan rute, controller, dan satpam (middleware) penjaganya
$routes = [
    'login'     => ['method' => 'login',     'middleware' => 'GuestMiddleware'],
    'register'  => ['method' => 'register',  'middleware' => 'GuestMiddleware'],
    'dashboard' => ['method' => 'dashboard', 'middleware' => 'AuthMiddleware'],
    'logout'    => ['method' => 'logout',    'middleware' => 'AuthMiddleware']
];

// Instansiasi Controller
$controller = new AuthController();

// Cek apakah action yang diminta user ada di tabel routing kita
if (array_key_exists($action, $routes)) {
    
    $route = $routes[$action];
    $middlewareClass = $route['middleware'];
    $methodName = $route['method'];

    // 1. EKSEKUSI MIDDLEWARE DULU (Cek Tiket / Satpam)
    if ($middlewareClass !== null) {
        // Contoh: AuthMiddleware::handle();
        $middlewareClass::handle(); 
    }

    // 2. JIKA LOLOS MIDDLEWARE, EKSEKUSI CONTROLLER
    $controller->$methodName();

} else {
    // Jika rute tidak ditemukan (404), kembalikan ke login
    header("Location: index.php?action=login");
    exit;
}
?>