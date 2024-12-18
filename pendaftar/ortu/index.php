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
                            <h4 class="card-title">Form Pendaftaran Orang Tua</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="../function/daftar_ortu.php" method="post" class="form">
                                    <div class="row">
                                        <!-- NISN -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nisn">NISN Calon Siswa</label>
                                                <input type="text" id="nisn" class="form-control" placeholder="NISN" name="nisn" required>
                                            </div>
                                        </div>

                                        <!-- Nama Orang Tua -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_orang_tua">Nama Orang Tua</label>
                                                <input type="text" id="nama_orang_tua" class="form-control" placeholder="Nama Orang Tua" name="nama_orang_tua" required>
                                            </div>
                                        </div>

                                        <!-- Hubungan (Ayah/Ibu/Wali) -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="hubungan">Hubungan</label>
                                                <select id="hubungan" class="form-select" name="hubungan" required>
                                                    <option value="Ayah">Ayah</option>
                                                    <option value="Ibu">Ibu</option>
                                                    <option value="Wali">Wali</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Pekerjaan Orang Tua -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <input type="text" id="pekerjaan" class="form-control" placeholder="Pekerjaan" name="pekerjaan" required>
                                            </div>
                                        </div>

                                        <!-- Alamat Kerja -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="alamat_kerja">Alamat Rumah</label>
                                                <textarea id="alamat_kerja" class="form-control" name="alamat_kerja" placeholder="Alamat Rumah" required></textarea>
                                            </div>
                                        </div>

                                        <!-- No Telepon Orang Tua -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_telepon_ortu">No Telepon</label>
                                                <input type="number" id="no_telepon_ortu" class="form-control" name="no_telepon_ortu" placeholder="No Telepon Orang Tua" required>
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
