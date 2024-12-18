<?php
include('../../database/koneksi.php');

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nisn = mysqli_real_escape_string($conn, $_POST['nisn']);
    $nama_orang_tua = mysqli_real_escape_string($conn, $_POST['nama_orang_tua']);
    $hubungan = mysqli_real_escape_string($conn, $_POST['hubungan']);
    $pekerjaan = mysqli_real_escape_string($conn, $_POST['pekerjaan']);
    $alamat_kerja = mysqli_real_escape_string($conn, $_POST['alamat_kerja']);
    $no_telepon_ortu = mysqli_real_escape_string($conn, $_POST['no_telepon_ortu']);
    
    // Cek apakah NISN ada di tabel siswa
    $cekNisn = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn = '$nisn'");
    
    if (mysqli_num_rows($cekNisn) == 0) {
        // Jika NISN tidak ada di tabel siswa, tampilkan alert gagal
        echo "<script>alert('NISN tidak ditemukan di database! Pendaftaran orang tua gagal.'); window.location.href = '../ortu';</script>";
    } else {

        // Query untuk menyimpan data ke tabel orang_tua
        $query = "INSERT INTO orang_tua (nisn, nama_orang_tua, hubungan, pekerjaan, alamat_kerja, no_telepon_ortu)
                  VALUES ('$nisn', '$nama_orang_tua', '$hubungan', '$pekerjaan', '$alamat_kerja', '$no_telepon_ortu')";
        
        if (mysqli_query($conn, $query)) {
            // Redirect atau pesan sukses
            echo "<script>alert('Pendaftaran orang tua berhasil!'); window.location.href = '../dashboard';</script>";
        } else {
            // Jika ada kesalahan
            echo "<script>alert('Terjadi kesalahan saat mendaftar orang tua!'); window.location.href = '../pendaftaran';</script>";
        }
    }
}
?>
