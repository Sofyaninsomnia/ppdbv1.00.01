<?php
include('../../database/koneksi.php');
// Check if the user is already logged in
if (!isset($_SESSION['user'])) {
    header('Location: ../../auth/login');
    exit;
}
?>

<?php
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
                            Data Calon Siswa
                        </div>
                        <div class="card-body">
                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama Casis</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Agama</th>
                                        <th>No Handphone</th>
                                        <th>Email</th>
                                        <th>Asal Sekolah</th>
                                        <th>Jurusan</th>
                                        <th>Username Pendaftar</th> <!-- Kolom untuk menampilkan username -->
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    // Query untuk mengambil data siswa dengan data username dari tabel pendaftar
                                    // Ganti 'id_user' dengan 'id_pendaftar' untuk join dengan benar
                                    $query = mysqli_query($conn, "SELECT siswa.*, jurusan.jurusan, pendaftar.username FROM siswa 
                                                                  LEFT JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan 
                                                                  LEFT JOIN pendaftar ON siswa.id_pendaftar = pendaftar.id_pendaftar");
                                    // Periksa apakah query berhasil
                                    if ($query) {
                                        // Loop melalui data siswa
                                        while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                            <tr> 
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $data['nisn']; ?></td>
                                                <td><?php echo $data['nama_lengkap']; ?></td>
                                                <td><?php echo $data['jenis_kelamin']; ?></td>
                                                <td><?php echo $data['ttl']; ?></td>
                                                <td><?php echo $data['alamat']; ?></td>
                                                <td><?php echo $data['agama']; ?></td>
                                                <td><?php echo $data['no_telepon']; ?></td>
                                                <td><?php echo $data['email']; ?></td>
                                                <td><?php echo $data['asal_sekolah']; ?></td>
                                                <td><?php echo $data['jurusan']; ?></td>
                                                <td><?php echo $data['username']; ?></td> 
                                                <td>
                                                    <a href="function/ubah_data.php?id=<?php echo $data['id_siswa']; ?>" class="btn icon btn-primary"><i data-feather="edit"></i></a>
                                                    <a onclick="return confirm('asli bli pen diapus kuh?')" href="function/hapus_data.php?id=<?php echo $data['id_siswa']; ?>" class="btn icon btn-danger"><i data-feather="trash"></i></a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "Query error: " . mysqli_error($conn); // Menampilkan error query jika gagal
                                    }
                                    ?>
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
