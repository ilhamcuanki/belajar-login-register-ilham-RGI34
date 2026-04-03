<?php
require_once 'core/BaseController.php';
require_once 'models/UserModel.php';

class AuthController extends BaseController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login() {
        // Pengecekan if (isset($_SESSION...)) SUDAH DIHAPUS. Diurus Middleware!
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->authenticate($username, $password);

            if ($user) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['status_login'] = true;
                $this->redirect('dashboard');
            } else {
                $this->view('login', ['error_message' => 'Username atau Password salah!']);
            }
        } else {
            $this->view('login');
        }
    }

    public function register() {
        // Pengecekan if (isset($_SESSION...)) SUDAH DIHAPUS. Diurus Middleware!

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->userModel->register($username, $password)) {
                echo "<script>alert('Registrasi berhasil!'); window.location='index.php?action=login';</script>";
            } else {
                $this->view('register', ['error_message' => 'Gagal mendaftar, username sudah dipakai.']);
            }
        } else {
            $this->view('register');
        }
    }

    public function dashboard() {
        // Pengecekan if (!isset($_SESSION...)) SUDAH DIHAPUS. Diurus Middleware!
        $this->view('dashboard');
    }

    public function logout() {
        session_destroy();
        $this->redirect('login');
    }
}
?>