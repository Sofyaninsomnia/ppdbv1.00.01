<?php
include('../../database/koneksi.php');

if (isset($_POST['submit'])) {
    // Menangkap data input
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

    // Menambahkan id_pendaftar yang didapatkan dari session atau cara lainnya
    $id_pendaftar = $_SESSION["user"]["id_pendaftar"]; // pastikan session sudah ada dan menyimpan id_pendaftar

    // Menyiapkan query menggunakan prepared statements untuk keamanan
    $stmt = $conn->prepare("INSERT INTO siswa (id_jurusan, nisn, nama_lengkap, jenis_kelamin, ttl, alamat, agama, no_telepon, email, asal_sekolah, id_pendaftar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameter ke query
    $stmt->bind_param("isssssssssi", $id_jurusan, $nisn, $nama_lengkap, $jenis_kelamin, $ttl, $alamat, $agama, $no_telepon, $email, $asal_sekolah, $id_pendaftar);

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
