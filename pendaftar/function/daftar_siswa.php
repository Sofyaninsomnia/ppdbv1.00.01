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

    // Step 1: Check if the NISN already exists in the database
    $check_nisn = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn = '$nisn'");

    if (mysqli_num_rows($check_nisn) > 0) {
        // If NISN already exists, show an alert
        echo '<script>alert("NISN sudah terdaftar!"); location.href = "../pendaftaran";</script>';
    } else {
        // Step 2: If NISN is not duplicated, proceed with inserting the data
        $query = mysqli_query($conn, "INSERT INTO siswa(id_jurusan, nisn, nama_lengkap, jenis_kelamin, ttl, alamat, agama, no_telepon, email, asal_sekolah) 
                                      VALUES('$id_jurusan', '$nisn', '$nama_lengkap', '$jenis_kelamin', '$ttl', '$alamat', '$agama', '$no_telepon', '$email', '$asal_sekolah')");

        if ($query) {
            // If the insert query is successful, show a success alert
            echo '<script>alert("Pendaftaran Berhasil!"); location.href = "../pendaftaran";</script>';
        } else {
            // If the insert query fails, show a general error alert
            $error_message = mysqli_error($conn);
            echo '<script>alert("Pendaftaran gagal! Error: ' . $error_message . '"); location.href = "../pendaftaran";</script>';
        }
    }
}
?>
