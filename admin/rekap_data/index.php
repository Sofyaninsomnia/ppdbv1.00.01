<?php
include('../../database/koneksi.php');
include('../../layouts/header.php');

// Query untuk mengambil data pendaftaran siswa
$query = "
    SELECT 
        ip.id_pendaftaran, 
        ip.nisn, 
        s.tanggal_pendaftaran,  -- Mengambil tanggal pendaftaran dari tabel siswa
        ip.jalur_pendaftaran, 
        ip.status_pendaftaran, 
        j.jurusan, 
        s.nama_lengkap
    FROM 
        info_pendaftaran ip
    JOIN 
        siswa s ON ip.nisn = s.nisn   -- JOIN dengan tabel siswa untuk mendapatkan tanggal pendaftaran dan nama siswa
    JOIN 
        jurusan j ON ip.id_jurusan = j.id_jurusan
";

$result = mysqli_query($conn, $query);

// Cek apakah query berhasil
if (!$result) {
    die('Error: ' . mysqli_error($conn));
}
?>

<div class="id">
    <?php include('../layouts/aside.php'); ?>

    <div id="main">
        <?php include('../layouts/nav.php'); ?>

        <section id="rekap-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Rekap Data Pendaftaran Casis</h4>
                            <!-- Tombol untuk tambah rekap data -->
                            <a href="../function/tambah_rekap.php" class="btn btn-success"><i data-feather="plus"></i> Tambah Rekap Data</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Jalur Pendaftaran</th>
                                        <th>Tanggal Pendaftaran</th>
                                        <th>Jurusan</th>
                                        <th>Status Pendaftaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    while ($pendaftaran = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $pendaftaran['nisn']; ?></td>
                                            <td><?php echo $pendaftaran['nama_lengkap']; ?></td>
                                            <td><?php echo $pendaftaran['jalur_pendaftaran']; ?></td>
                                            <td><?php echo $pendaftaran['tanggal_pendaftaran']; ?></td> <!-- Tanggal diambil dari tabel siswa -->
                                            <td><?php echo $pendaftaran['jurusan']; ?></td>
                                            <td><?php echo $pendaftaran['status_pendaftaran']; ?></td>
                                            <td>
                                                <!-- Form untuk mengubah status pendaftaran -->
                                                <a href="../function/set_status.php?id=<?php echo $pendaftaran['id_pendaftaran']; ?>" class="btn icon btn-primary"><i data-feather="edit"></i></a>
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
