<?php
// index.php
session_start();

// Panggil semua file yang dibutuhkan
require_once 'middlewares/LogMiddleware.php';
require_once 'middlewares/AuthMiddleware.php';
require_once 'middlewares/GuestMiddleware.php';
require_once 'controllers/AuthController.php';

// --- EKSEKUSI GLOBAL MIDDLEWARE ---
// Mencatat semua aktivitas tanpa terkecuali!
LogMiddleware::handle();
// ----------------------------------

// Tangkap perintah dari URL
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// TABEL ROUTING
$routes = [
    'login'     => ['method' => 'login',     'middleware' => 'GuestMiddleware'],
    'register'  => ['method' => 'register',  'middleware' => 'GuestMiddleware'],
    'dashboard' => ['method' => 'dashboard', 'middleware' => 'AuthMiddleware'],
    'logout'    => ['method' => 'logout',    'middleware' => 'AuthMiddleware']
];

$controller = new AuthController();

if (array_key_exists($action, $routes)) {
    
    $route = $routes[$action];
    $middlewareClass = $route['middleware'];
    $methodName = $route['method'];

    // EKSEKUSI ROUTE MIDDLEWARE (Satpam Khusus Halaman)
    if ($middlewareClass !== null) {
        $middlewareClass::handle(); 
    }

    // EKSEKUSI CONTROLLER
    $controller->$methodName();

} else {
    header("Location: index.php?action=login");
    exit;
}
?>