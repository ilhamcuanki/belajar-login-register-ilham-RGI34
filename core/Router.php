<?php
// core/Router.php

class Router {
    private $routes = [];

    // Fungsi untuk mendaftarkan rute (GET/POST, URL, Controller, Method, Middleware)
    public function add($method, $path, $controller, $action, $middlewares = []) {
        $this->routes[] = [
            'method'      => strtoupper($method),
            'path'        => $path,
            'controller'  => $controller,
            'action'      => $action,
            'middlewares' => $middlewares
        ];
    }

    // Fungsi untuk mencocokkan URL browser dengan rute yang didaftarkan
    public function dispatch($currentPath, $currentMethod) {
        foreach ($this->routes as $route) {
            if ($route['path'] === $currentPath && $route['method'] === $currentMethod) {
                
                // 1. Jalankan Middleware jika ada
                foreach ($route['middlewares'] as $middleware) {
                    $middleware::handle();
                }

                // 2. Jalankan Controller
                $controllerName = $route['controller'];
                $actionName = $route['action'];
                
                $controller = new $controllerName();
                $controller->$actionName();
                
                return; // Hentikan pencarian jika rute sudah ketemu
            }
        }

        // Jika rute tidak ada di daftar
        echo "<h1 style='text-align:center; margin-top:50px;'>404 - Halaman Tidak Ditemukan</h1>";
    }
}
?>