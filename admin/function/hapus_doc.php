<?php
include('../../database/koneksi.php');

// Ambil id_dokumen dari URL
$id = $_GET['id_dokumen']; // Pastikan menggunakan 'id_dokumen' sesuai dengan parameter di URL

// Pastikan ID valid dan aman untuk query
if (isset($id) && is_numeric($id)) {
    $query = mysqli_query($conn, "DELETE FROM dokumen WHERE id_dokumen = $id");

    if ($query) {
        echo "<script>
                alert('Dokumen berhasil dihapus');
                location.href = '../berkas'; 
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus dokumen');
                location.href = '../berkas'; 
              </script>";
    }
}
?>
