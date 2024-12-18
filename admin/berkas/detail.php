<?php
include('../../database/koneksi.php');
include('../../layouts/header.php');

// Cek apakah ID dokumen diberikan melalui URL
if (isset($_GET['id_dokumen'])) {
    $id_dokumen = $_GET['id_dokumen'];

    // Query untuk mendapatkan detail dokumen berdasarkan id_dokumen
    $query = "SELECT * FROM dokumen WHERE id_dokumen = '$id_dokumen'";
    $result = mysqli_query($conn, $query);

    // Jika dokumen ditemukan
    if (mysqli_num_rows($result) > 0) {
        $dokumen = mysqli_fetch_assoc($result);
    } else {
        // Jika tidak ditemukan dokumen
        echo "<script>alert('Dokumen tidak ditemukan.'); window.location.href = 'dokumen-list.php';</script>";
        exit;
    }
} else {
    // Jika ID dokumen tidak ada dalam URL
    echo "<script>alert('ID dokumen tidak valid.'); window.location.href = 'dokumen-list.php';</script>";
    exit;
}
?>

<div class="id">
    <?php include('../layouts/aside.php'); ?>

    <div id="main">
        <?php include('../layouts/nav.php'); ?>

        <section id="dokumen-detail">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detail Dokumen</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>ID Dokumen</th>
                                    <td><?php echo $dokumen['id_dokumen']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Dokumen</th>
                                    <td><?php echo $dokumen['jenis_dokumen']; ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <td>
                                        <?php
                                        // Ambil nama siswa berdasarkan id_siswa
                                        $query_siswa = "SELECT nama_lengkap FROM siswa WHERE id_siswa = '" . $dokumen['id_siswa'] . "'";
                                        $result_siswa = mysqli_query($conn, $query_siswa);
                                        $siswa = mysqli_fetch_assoc($result_siswa);
                                        echo $siswa['nama_lengkap'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Path Dokumen</th>
                                    <td><a href="<?php echo $dokumen['path_dokumen']; ?>" target="_blank">Lihat Dokumen</a></td>
                                </tr>
                            </table>
                            <a href="<?= BASE_URL ?>/admin/berkas" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include('../../layouts/footer.php'); ?>