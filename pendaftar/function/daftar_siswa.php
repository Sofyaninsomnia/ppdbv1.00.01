<?php
include('../../database/koneksi.php');
if (isset($_POST['submit'])) {
    $id_jurusan = $_POST['id_jurusan'];
    $nisn = $_POST['nisn'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $ttl = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $asal_sekolah = $_POST['asal_sekolah'];

    // Menyiapkan query menggunakan prepared statements untuk keamanan
    $stmt = $conn->prepare("INSERT INTO siswa (id_jurusan, nisn, nama_lengkap, jenis_kelamin, ttl, alamat, agama, no_telepon, email, asal_sekolah) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssss", $id_jurusan, $nisn, $nama_lengkap, $jenis_kelamin, $ttl, $alamat, $agama, $no_telepon, $email, $asal_sekolah);

    // Mengeksekusi query dan mengecek hasilnya
    if ($stmt->execute()) {
        echo '<script>alert("Pendaftaran Berhasil!"); location.href = "../pendaftaran";</script>';
    } else {
        echo '<script>alert("Pendaftaran Gagal! Error: ' . $stmt->error . '"); location.href = "../pendaftaran";</script>';
    }

    // Menutup statement
    $stmt->close();
}
?>
