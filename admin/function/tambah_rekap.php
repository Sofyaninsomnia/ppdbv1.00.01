<?php
include('../../database/koneksi.php');
include('../../layouts/header.php');

// Proses untuk menambah rekap data
if (isset($_POST['submit'])) {
    $nisn = $_POST['nisn'];
    $jalur_pendaftaran = $_POST['jalur_pendaftaran'];
    $status_pendaftaran = $_POST['status_pendaftaran'];
    $id_jurusan = $_POST['id_jurusan'];

    // Cek apakah NISN ada di tabel siswa (siswa yang sudah terdaftar)
    $check_siswa_query = "SELECT * FROM siswa WHERE nisn = '$nisn'";
    $check_siswa_result = mysqli_query($conn, $check_siswa_query);

    if (mysqli_num_rows($check_siswa_result) == 0) {
        // Jika NISN tidak ditemukan di tabel siswa, tampilkan pesan error
        echo "<script>alert('NISN ini belum terdaftar!'); location.href = '../rekap_data';</script>";
    } else {
        // Cek apakah NISN sudah terdaftar di tabel info_pendaftaran
        $check_pendaftaran_query = "SELECT * FROM info_pendaftaran WHERE nisn = '$nisn'";
        $check_pendaftaran_result = mysqli_query($conn, $check_pendaftaran_query);

        if (mysqli_num_rows($check_pendaftaran_result) > 0) {
            // Jika NISN sudah terdaftar di tabel info_pendaftaran, tampilkan pesan error
            echo "<script>alert('Sudah pernah di rekap!'); location.href = '../rekap_data';</script>";
        } else {
            // Jika NISN belum terdaftar, lanjutkan untuk memasukkan data pendaftaran
            $query = "INSERT INTO info_pendaftaran (nisn, jalur_pendaftaran, status_pendaftaran, id_jurusan) 
                      VALUES ('$nisn', '$jalur_pendaftaran', '$status_pendaftaran', '$id_jurusan')";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Data berhasil ditambahkan!'); location.href = '../rekap_data';</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<div class="id">
    <?php include('../layouts/aside.php'); ?>

    <div id="main">
        <?php include('../layouts/nav.php'); ?>

        <section id="tambah-rekap">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Rekap Data Pendaftaran Casis</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="nisn">NISN</label>
                                    <input type="text" name="nisn" id="nisn" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jalur_pendaftaran">Jalur Pendaftaran</label>
                                    <select name="jalur_pendaftaran" class="form-select" required>
                                        <option value="Reguler">Reguler</option>
                                        <option value="Prestasi">Prestasi</option>
                                        <option value="Zona">Zona</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status_pendaftaran">Status Pendaftaran</label>
                                    <select name="status_pendaftaran" class="form-select" required>
                                        <option value="Diterima">Diterima</option>
                                        <option value="Tidak Diterima">Tidak Diterima</option>
                                        <option value="Dalam Proses">Dalam Proses</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_jurusan">Jurusan</label>
                                    <select name="id_jurusan" class="form-select" required>
                                        <?php
                                        // Menampilkan pilihan jurusan yang ada di tabel jurusan
                                        $jurusan_query = mysqli_query($conn, "SELECT * FROM jurusan");
                                        while ($jurusan = mysqli_fetch_assoc($jurusan_query)) {
                                            echo "<option value='" . $jurusan['id_jurusan'] . "'>" . $jurusan['jurusan'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include('../../layouts/footer.php'); ?>
    </div>
</div>
