// Fungsi validasi untuk halaman Register
function validasiRegister() {
    var user = document.getElementById("username").value;
    var pass = document.getElementById("password").value;
   
    if (user == "" || pass == "") {
        alert("Peringatan: Username dan Password tidak boleh kosong!");
        return false; // Mencegah form dikirim
    }
    return true; // Mengizinkan form dikirim
}


// Fungsi validasi untuk halaman Login
function validasiLogin() {
    var user = document.getElementById("username_login").value;
    var pass = document.getElementById("password_login").value;
   
    if (user == "" || pass == "") {
        alert("Peringatan: Silakan isi Username dan Password Anda!");
        return false;
    }
    return true;
}
