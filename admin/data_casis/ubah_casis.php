<?php
include('../../layouts/head_table.php');
include('../function/crud_casis.php');
?>

<body>
    <div id="app">
        <?php include('../layouts/aside.php'); ?>
        <div id="main">
            <?php include('../layouts/nav.php'); ?>
 
            <?php
            // Get the student ID from URL parameter
            $id = $_GET['id'];

            // Fetch student data and join with the 'jurusan' table
            $query = mysqli_query($conn, "SELECT siswa.*, jurusan.jurusan FROM siswa 
                                          LEFT JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan
                                          WHERE siswa.id_siswa = $id");

            // Check if the query is successful
            if ($query) {
                $data = mysqli_fetch_array($query);
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            // Process the form submission
            if (isset($_POST["submit"])) {
                // Call the 'ubah' function to update student data
                if (ubah($_POST) > 0) {
                    echo "
                    <script>
                        alert('Data berhasil diubah');
                        document.location.href = 'index.php';
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                        alert('Data gagal diubah');
                        document.location.href = 'index.php';
                    </script>
                    ";
                }
            }
            ?>

            <div class="main-content container-fluid">
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ubah Data Casis</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Form for editing student data -->
                                        <form class="form" method="POST">
                                            <!-- Hidden input to pass the student ID -->
                                            <input type="hidden" name="id_siswa" value="<?= $data['id_siswa'] ?>">

                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="nisn">NISN</label>
                                                        <input type="text" id="nisn" class="form-control" name="nisn" value="<?= $data['nisn'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="nama_lengkap">Nama Lengkap</label>
                                                        <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                                        <select type="text" id="jenis_kelamin" class="form-select" name="jenis_kelamin" required>
                                                            <option <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?> value="Laki-laki">Laki-laki</option>
                                                            <option <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="ttl">Tanggal Lahir</label>
                                                        <input type="text" id="ttl" class="form-control" name="ttl" value="<?= $data['ttl'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <input type="text" id="alamat" class="form-control" name="alamat" value="<?= $data['alamat'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="agama">Agama</label>
                                                        <input type="text" id="agama" class="form-control" name="agama" value="<?= $data['agama'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="no_telepon">No Telepon</label>
                                                        <input type="text" id="no_telepon" class="form-control" name="no_telepon" value="<?= $data['no_telepon'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" class="form-control" name="email" value="<?= $data['email'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="asal_sekolah">Asal Sekolah</label>
                                                        <input type="text" id="asal_sekolah" class="form-control" name="asal_sekolah" value="<?= $data['asal_sekolah'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="id_jurusan">Jurusan</label>
                                                        <select name="id_jurusan" class="form-select" required>
                                                            <option value="">Pilih Jurusan</option>
                                                            <?php
                                                            // Fetch available jurusan from the database
                                                            $jurusanQuery = mysqli_query($conn, "SELECT * FROM jurusan");
                                                            while ($jurusan = mysqli_fetch_array($jurusanQuery)) {
                                                                echo "<option value='{$jurusan['id_jurusan']}' " . ($jurusan['id_jurusan'] == $data['id_jurusan'] ? 'selected' : '') . ">{$jurusan['jurusan']}</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" name="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-left">
                        <p>2020 &copy; Voler</p>
                    </div>
                    <div class="float-right">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="http://ahmadsaugi.com">Ahmad Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <?php include('../../layouts/foot_table.php'); ?>
</body>
