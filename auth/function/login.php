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
            // Set session data, mengganti 'username' menjadi 'user'
            $_SESSION['user'] = $data['username'];  // Menyimpan username dalam session 'user'
            $_SESSION['level'] = $data['level'];  // Menyimpan level dalam session

            // Tampilkan alert sesuai dengan level pengguna
            if ($data['level'] == "admin") {
                echo '<script>alert("Login berhasil! Anda login sebagai Admin!"); window.location.href = "../../admin/dashboard";</script>';
                exit();
            } elseif ($data['level'] == "kepsek") {
                echo '<script>alert("Login berhasil! Anda login sebagai Kepsek!"); window.location.href = "../../kepsek/dashboard";</script>';
                exit();
            } elseif ($data['level'] == "panitia") {
                echo '<script>alert("Login berhasil! Anda login sebagai Panitia!"); window.location.href = "../../panitia/dashboard";</script>';
                exit();
            } elseif ($data['level'] == "guru") {
                echo '<script>alert("Login berhasil! Anda login sebagai Guru!"); window.location.href = "../../guru/dashboard";</script>';
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
