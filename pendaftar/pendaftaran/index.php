<?php
include('../../database/koneksi.php');
include('../../layouts/header.php');

// Pastikan pendaftar sudah login
if (!isset($_SESSION["user"])) {
    header("Location: ../../auth/login_pendaftar");
    exit;
}

// Ambil id_pendaftar dari session
$id_pendaftar = $_SESSION["user"]["id_pendaftar"];

// Cek apakah pendaftar sudah terdaftar di tabel siswa
$query = mysqli_query($conn, "SELECT * FROM siswa WHERE id_pendaftar = '$id_pendaftar'");
$isRegistered = mysqli_num_rows($query) > 0;  // Jika lebih dari 0 berarti sudah terdaftar
?>
<div class="id">
    <?php
    include('../layouts/aside.php');
    ?>
    <div id="main">
        <?php
        include('../layouts/nav.php');
        ?>
        <div class="row" id="table-responsive table-bordered">
            <div class="col-12">
                <div class="card">
                    <!-- Tambahkan div card-body di sini -->
                    <div class="card-body">
                        <div class="buttons">
                            <!-- Menampilkan tombol hanya jika belum terdaftar -->
                            <?php if (!$isRegistered): ?>
                                <a href="daftar" class="btn btn-primary round">Daftar Sekarang</a>
                            <?php endif; ?>
                        </div>

                        <!-- Card content untuk tabel, hanya tampilkan jika sudah terdaftar -->
                        <?php if ($isRegistered): ?>
                            <div class="card-content">
                                <!-- table bordered -->
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Nisn</th>
                                                <th>Nama Siswa</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tempat Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Agama</th>
                                                <th>No Telepon</th>
                                                <th>Email</th>
                                                <th>Asal Sekolah</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Query untuk menampilkan data siswa yang sudah terdaftar berdasarkan id_pendaftar
                                            $query = mysqli_query($conn, "SELECT siswa.*, jurusan.jurusan FROM siswa LEFT JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan WHERE siswa.id_pendaftar = '$id_pendaftar'");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td class="text-bold-500"><?php echo $data['nisn']; ?></td>
                                                    <td class="text-bold-500"><?php echo $data['nama_lengkap']; ?></td>
                                                    <td class="text-bold-500"><?php echo $data['jenis_kelamin']; ?></td>
                                                    <td class="text-bold-500"><?php echo $data['ttl']; ?></td>
                                                    <td class="text-bold-500"><?php echo $data['alamat']; ?></td>
                                                    <td class="text-bold-500"><?php echo $data['agama']; ?></td>
                                                    <td class="text-bold-500"><?php echo $data['no_telepon']; ?></td>
                                                    <td class="text-bold-500"><?php echo $data['email']; ?></td>
                                                    <td class="text-bold-500"><?php echo $data['asal_sekolah']; ?></td>
                                                    <td>
                                                        <a href="edit_siswa.php?id=<?php echo $data['id_siswa']; ?>" class="btn btn-warning">Edit</a>
                                                        <a href="hapus_siswa.php?id=<?php echo $data['id_siswa']; ?>" class="btn btn-danger">Cancel</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php else: ?>
                            <!-- Pesan jika pengguna belum mendaftar -->
                            <div class="alert alert-warning" role="alert">
                                Anda belum mendaftar! Klik tombol "Daftar Sekarang" untuk melanjutkan pendaftaran.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include('../../layouts/footer.php');
        ?>
    </div>
</div>
