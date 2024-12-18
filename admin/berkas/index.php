<?php
include('../../database/koneksi.php');
include('../../layouts/header.php');

// Query untuk menampilkan daftar dokumen
$query = "SELECT * FROM dokumen";
$result = mysqli_query($conn, $query);

// Cek apakah query berhasil
if (!$result) {
    // Jika query gagal, tampilkan pesan error
    die('Error: ' . mysqli_error($conn));
}

?>

<div class="id">
    <?php include('../layouts/aside.php'); ?>

    <div id="main">
        <?php include('../layouts/nav.php'); ?>

        <section id="dokumen-list">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Dokumen</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Dokumen</th>
                                        <th>Jenis Dokumen</th>
                                        <th>NISN Siswa</th>
                                        <th>File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    while ($dokumen = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $dokumen['jenis_dokumen']; ?></td>
                                            <td>
                                                <?php
                                                // Ambil nama siswa berdasarkan id_siswa
                                                $query_siswa = "SELECT nisn FROM siswa WHERE id_siswa = '" . $dokumen['id_siswa'] . "'";
                                                $result_siswa = mysqli_query($conn, $query_siswa);
                                                
                                                if (!$result_siswa) {
                                                    die('Error: ' . mysqli_error($conn)); // Jika query siswa gagal
                                                }

                                                $siswa = mysqli_fetch_assoc($result_siswa);
                                                echo $siswa['nisn'];
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo $dokumen['path_dokumen']; ?>" target="_blank">Lihat Dokumen</a>
                                            </td>
                                            <td>
                                                <a href="detail.php?id_dokumen=<?php echo $dokumen['id_dokumen']; ?>" class="btn btn-info"><i data-feather="eye"></i></a>
                                                <a onclick="return confirm('asli bli pen diapus kuh?')" href="../function/hapus_doc.php?id_dokumen=<?php echo $dokumen['id_dokumen']; ?>" class="btn btn-danger"><i data-feather="trash"></i></a>
                                                </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include('../../layouts/footer.php'); ?>
    </div>
</div>
