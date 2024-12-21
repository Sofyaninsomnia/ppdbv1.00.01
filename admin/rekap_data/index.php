<?php
include('../../database/koneksi.php');


if (!isset($_SESSION['user'])) {
    header('Location: ../../auth/login');
    exit;
}

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

include('../layouts/header.php');
?>

<body>
    <div id="app">
        <?php
        include('../layouts/aside.php');
        ?>
        <div id="main">
            <?php
            include('../layouts/nav.php');
            ?>
            <div class="main-content container-fluid">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Rekap data casis
                        </div>
                        <div class="card-body">
                            <table class='table table-striped' id="table1">
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
                                    $no = 1;
                                    while ($data = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nisn']; ?></td>
                                            <td><?php echo $data['nama_lengkap']; ?></td>
                                            <td><?php echo $data['jalur_pendaftaran']; ?></td>
                                            <td><?php echo $data['tanggal_pendaftaran']; ?></td> <!-- Tanggal diambil dari tabel siswa -->
                                            <td><?php echo $data['jurusan']; ?></td>
                                            <td><?php echo $data['status_pendaftaran']; ?></td>
                                            <td>
                                                <!-- Form untuk mengubah status pendaftaran -->
                                                <a href="../function/set_status.php?id=<?php echo $data['id_pendaftaran']; ?>" class="btn icon btn-primary"><i data-feather="edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            <?php
            include('../layouts/footer.php');
            ?>
        </div>
    </div>
</body>

</html>