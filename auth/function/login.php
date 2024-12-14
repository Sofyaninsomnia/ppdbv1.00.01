<?php
// Menghubungkan PHP dengan koneksi database
include('../../database/koneksi.php');

// Mengecek apakah form login dikirimkan
if (isset($_POST['login'])) {
    // Menangkap data yang dikirim dari form login
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Menyeleksi data user dengan username yang sesuai
    $query = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();

    // Cek jika data ditemukan
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Verifikasi password menggunakan password_hash
        if (password_verify($password, $data['password'])) {
            // Set session data
            $_SESSION['username'] = $username;
            $_SESSION['level'] = $data['level'];

            // Tampilkan alert sesuai dengan level pengguna
            if ($data['level'] == "admin") {
                echo '<script>alert("Login berhasil! Selamat datang, Admin!"); window.location.href = "../../admin/dashboard";</script>';
                exit();
            } elseif ($data['level'] == "operator") {
                echo '<script>alert("Login berhasil! Selamat datang, Operator!"); window.location.href = "panitia/dashboard";</script>';
                exit();
            } elseif ($data['level'] == "pegawai") {
                echo '<script>alert("Login berhasil! Selamat datang, Pegawai!"); window.location.href = "admin/pegawai.php";</script>';
                exit();
            } else {
                echo '<script>alert("Level tidak dikenali!"); window.location.href = "../login";</script>';
                exit();
            }
        } else {
            // Jika password tidak sesuai
            echo '<script>alert("Username atau Password salah!"); window.location.href = "../login";</script>';
            exit();
        }
    } else {
        // Jika username tidak ditemukan
        echo '<script>alert("Username tidak ditemukan!"); window.location.href = "../login";</script>';
        exit();
    }
}
?>
