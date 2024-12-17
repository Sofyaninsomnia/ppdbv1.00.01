<?php
include('../../../database/koneksi.php');
$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa=$id");
?>
 <script>
    alert('aja nyesel yahhh');
    location.href = "../../data_casis";
 </script>