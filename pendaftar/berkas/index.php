<?php
include('../../database/koneksi.php.php');
include('../../layouts/header.php');
if (!isset($_SESSION["user"])) {
    header("Location: ../../auth/login_pendaftar");
    exit;
    
}
?>
 <div class="id">
<?php
include('../layouts/aside.php');
?>
 <div id="main">
<?php
include('../layouts/nav.php');
?>
<section id="input-file-browser">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">File Input</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <p>Kartu Keluarga</p>
                            <div class="form-file">
                                <input type="file" class="form-file-input" id="customFile">
                                <label class="form-file-label" for="customFile">
                                    <span class="form-file-text">upload kartu keluarga...</span>
                                    <span class="form-file-button btn-primary "><i data-feather="upload"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>Akta Kelahiran</p>
                            <div class="form-file">
                                <input type="file" class="form-file-input" id="customFile">
                                <label class="form-file-label" for="customFile">
                                    <span class="form-file-text">upload akta kelahiran...</span>
                                    <span class="form-file-button btn-primary "><i data-feather="upload"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>SKL</p>
                            <div class="form-file">
                                <input type="file" class="form-file-input" id="customFile">
                                <label class="form-file-label" for="customFile">
                                    <span class="form-file-text">upload surat keterangan lulus...</span>
                                    <span class="form-file-button btn-primary "><i data-feather="upload"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>PasPhoto</p>
                            <div class="form-file">
                                <input type="file" class="form-file-input" id="customFile">
                                <label class="form-file-label" for="customFile">
                                    <span class="form-file-text">upload foto 3x4...</span>
                                    <span class="form-file-button btn-primary "><i data-feather="upload"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>Ktp Ayah</p>
                            <div class="form-file">
                                <input type="file" class="form-file-input" id="customFile">
                                <label class="form-file-label" for="customFile">
                                    <span class="form-file-text">upload ktp ayah...</span>
                                    <span class="form-file-button btn-primary "><i data-feather="upload"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>Ktp Ibu</p>
                            <div class="form-file">
                                <input type="file" class="form-file-input" id="customFile">
                                <label class="form-file-label" for="customFile">
                                    <span class="form-file-text">upload ktp ibu...</span>
                                    <span class="form-file-button btn-primary "><i data-feather="upload"></i></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('../../layouts/footer.php');
?>
