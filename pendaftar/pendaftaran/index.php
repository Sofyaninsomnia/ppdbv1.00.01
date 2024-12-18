<?php
include('../../layouts/header.php');
include('../../database/koneksi.php');
?>

<div class="id">
    <?php include('../layouts/aside.php'); ?>

    <div id="main">
        <?php include('../layouts/nav.php'); ?>

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sok Daftar Dewek</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="../function/daftar_siswa.php" method="post" class="form">
                                    <div class="row">
                                        <!-- Other form fields here -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nisn">NISN</label>
                                                <input type="text" id="nisn" class="form-control" placeholder="NISN" name="nisn" required>
                                            </div>
                                        </div>

                                        <!-- Nama Lengkap -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                <input type="text" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" required>
                                            </div>
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select id="jenis_kelamin" class="form-select" name="jenis_kelamin" required>
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Tempat dan Tanggal Lahir -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="ttl">Tempat dan Tanggal Lahir</label>
                                                <input type="text" id="ttl" class="form-control" name="ttl" placeholder="Tempat dan Tanggal Lahir" required>
                                            </div>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea id="alamat" class="form-control" name="alamat" placeholder="Alamat" required></textarea>
                                            </div>
                                        </div>

                                        <!-- Agama -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="agama">Agama</label>
                                                <input type="text" id="agama" class="form-control" name="agama" placeholder="Agama" required>
                                            </div>
                                        </div>

                                        <!-- No Telepon -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_telepon">No WhatsAap</label>
                                                <input type="number" id="no_telepon" class="form-control" name="no_telepon" placeholder="No Telepon" required>
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" class="form-control" name="email" placeholder="Email" required>
                                            </div>
                                        </div>

                                        <!-- Asal Sekolah -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="asal_sekolah">Asal Sekolah</label>
                                                <input type="text" id="asal_sekolah" class="form-control" name="asal_sekolah" placeholder="Asal Sekolah" required>
                                            </div>
                                        </div>

                                    <!-- Pilih Jurusan -->
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="id_jurusan">Pilih Jurusan</label>
                                            <select class="form-select" name="id_jurusan" placeholder="Email">
                                                <?php
                                                $jur = mysqli_query($conn, "SELECT * FROM jurusan");

                                                if (!$jur) {
                                                    // If the query failed, print the error and stop the script
                                                    die("Query failed: " . mysqli_error($conn));
                                                }

                                                while ($jurusan = mysqli_fetch_array($jur)) {
                                                ?>
                                                    <option value="<?php echo $jurusan['id_jurusan']; ?>"><?php echo $jurusan['jurusan']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select> <!-- Closing select tag added here -->
                                        </div>
                                    </div>

                                    <!-- Submit and Reset Buttons -->
                                    <div class="col-12 d-flex justify-content-end">
                                        <button onclick="return confirm('Semua data sudah benar?')" type="submit" class="btn btn-primary mr-1 mb-1" name="submit" value="submit">Submit</button>
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

    <?php include('../../layouts/footer.php'); ?>
</div>
</div>