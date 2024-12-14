<?php
// Include koneksi database
include('../../database/koneksi.php');

function register($nama, $no_telepon, $username, $password, $email, $level) {
    global $conn; // Pastikan koneksi database tersedia

    // Hash password untuk keamanan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk menyimpan data registrasi menggunakan prepared statement
    $sql = "INSERT INTO user (nama, no_telepon, username, password, email, level) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Menyiapkan prepared statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameter untuk query
        $stmt->bind_param("ssssss", $nama, $no_telepon, $username, $hashed_password, $email, $level);

        // Mengeksekusi query
        if ($stmt->execute()) {
            return true; // Berhasil
        } else {
            return false; // Gagal eksekusi
        }
    } else {
        return false; // Gagal menyiapkan query
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $no_telepon = $_POST['no_telepon'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $level = $_POST['level'];

    // Validasi form (contoh dasar)
    if (empty($nama) || empty($no_telepon) || empty($username) || empty($password) || empty($email) || empty($level)) {
        echo "<script>alert('Semua kolom harus diisi!'); window.location.href = 'register.php';</script>";
        exit();
    }

    // Panggil function register
    if (register($nama, $no_telepon, $username, $password, $email, $level)) {
        // Redirect ke halaman login atau success
        echo "<script>alert('Registrasi berhasil!'); window.location.href = '../login';</script>";
        exit();
    } else {
        // Jika gagal registrasi
        echo "<script>alert('Registrasi gagal. Silakan coba lagi.'); window.location.href = 'register.php';</script>";
        exit();
    }
}
?>
