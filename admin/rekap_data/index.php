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

// Proses untuk mengupdate status pendaftaran
if (isset($_POST['update_status'])) {
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $status_pendaftaran = $_POST['status_pendaftaran'];

    // Query untuk memperbarui status pendaftaran
    $update_query = "UPDATE info_pendaftaran SET status_pendaftaran = '$status_pendaftaran' WHERE id_pendaftaran = '$id_pendaftaran'";
    
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Status pendaftaran berhasil diperbarui!'); window.location.href = 'rekap_data.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
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
                        <div class="card-header">
                            <h4>Rekap Data Pendaftaran Casis</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive table-bordered">
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
                                                <form method="POST" action="rekap_data.php">
                                                    <input type="hidden" name="id_pendaftaran" value="<?php echo $pendaftaran['id_pendaftaran']; ?>">
                                                    <select name="status_pendaftaran" class="form-control" required>
                                                        <option value="Diterima" <?php if($pendaftaran['status_pendaftaran'] == 'Diterima') echo 'selected'; ?>>Diterima</option>
                                                        <option value="Tidak Diterima" <?php if($pendaftaran['status_pendaftaran'] == 'Tidak Diterima') echo 'selected'; ?>>Tidak Diterima</option>
                                                        <option value="Dalam Proses" <?php if($pendaftaran['status_pendaftaran'] == 'Dalam Proses') echo 'selected'; ?>>Dalam Proses</option>
                                                    </select>
                                                    <button type="submit" name="update_status" class="btn btn-info mt-2">Perbarui Status</button>
                                                </form>
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
