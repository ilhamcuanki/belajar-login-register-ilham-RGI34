<?php
class BaseController {
    
    // Fungsi untuk memanggil file di folder views
    // $data digunakan untuk melempar variabel dari Controller ke View
    protected function view($viewName, $data = []) {
        // Mengubah array asosiatif menjadi variabel individu (contoh: ['pesan' => 'Halo'] menjadi $pesan = 'Halo')
        extract($data);
        require_once "views/" . $viewName . ".php";
    }

    // Fungsi untuk mempermudah redirect
    protected function redirect($action) {
        header("Location: index.php?action=" . $action);
        exit;
    }
}
?>