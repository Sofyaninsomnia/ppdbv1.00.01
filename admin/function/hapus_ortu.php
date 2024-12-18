<?php
include('../../database/koneksi.php');

$id = $_GET['id']; // Ambil id dari URL
$query = "DELETE FROM orang_tua WHERE id_orang_tua = '$id'";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Data orang tua berhasil dihapus!'); window.location.href = '../data_ortu';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location.href = '../data_ortu';</script>";
}
?>
