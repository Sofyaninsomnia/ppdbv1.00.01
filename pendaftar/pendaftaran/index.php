<?php
include('../../database/koneksi.php');
include('../../layouts/header.php');
?>
<div class="id">
    <?php
    include('../layouts/aside.php');
    ?>
    <div id="main">
        <?php
        include('../layouts/nav.php');
        ?>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sok daftar dewek</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="../function/daftar_siswa.php" method="post" class="form">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Nisn</label>
                                                <input type="text" id="first-name-column" class="form-control" placeholder="nisn"
                                                    name="nisn">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Nama Lengkap</label>
                                                <input type="text" id="last-name-column" class="form-control" placeholder="nama_lengkap"
                                                    name="nama_lengkap">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Jenis Kelamin</label>
                                                <select type="text" id="city-column" class="form-select" placeholder="jenis kelamin" name="jenis_kelamin">
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="country-floating">Tempat Tgl Lahir</label>
                                                <input type="text" id="country-floating" class="form-control" name="ttl"
                                                    placeholder="tempat tgl lahir">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="company-column">Alamat</label>
                                                <textarea type="text" id="company-column" class="form-control" name="alamat"
                                                    placeholder="alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Agama</label>
                                                <input type="text" id="email-id-column" class="form-control" name="agama"
                                                    placeholder="agama">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">No Telepon</label>
                                                <input type="number" id="email-id-column" class="form-control" name="no_telepon"
                                                    placeholder="no telepon">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Email</label>
                                                <input type="email" id="email-id-column" class="form-control" name="email"
                                                    placeholder="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Asal Sekolah</label>
                                                <input type="text" id="email-id-column" class="form-control" name="asal_sekolah"
                                                    placeholder="asal sekolah">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Pilih Jurusan</label>
                                                <select class="form-select" name="id_jurusan"
                                                    placeholder="Email">
                                                    <?php
                                                    $jur = mysqli_query($conn, "SELECT * FROM jurusan");
                                                    while ($jurusan = mysqli_fetch_array($jur)) {
                                                    ?>
                                                        <option value="<?php echo $jurusan['id_jurusan']; ?>"><?php echo $jurusan['jurusan']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1" name="submit" value="submit">Submit</button>
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
        <?php
        include('../../layouts/footer.php');
        ?>