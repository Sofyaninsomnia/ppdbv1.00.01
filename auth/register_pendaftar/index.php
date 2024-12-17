<?php
include('../layouts/header.php');
include('../../database/koneksi.php');
include('../function/register_pendaftar.php');
?>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="../../assets/images/favicon.svg" height="48" class='mb-4'>
                                <h3>Sign Up</h3>
                                <p>Please fill the form to register.</p>
                            </div>
                            <?php

                            if (isset($_POST["register"])) {

                                if (registrasi($_POST) > 0) {
                                    echo "<script>
        alert('Registrasi berhasil'); location.href = '../login_pendaftar';
        </script>";
                                } else {
                                    echo mysqli_error($conn);
                                }
                            }

                            ?>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="username-column">Username</label>
                                            <input type="text" id="username" class="form-control" name="username" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Password</label>
                                            <input type="password" id="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Konfirmasi Password</label>
                                            <input type="password" id="password2" class="form-control" name="password2" required>
                                        </div>
                                    </div>
                                </div>

                                <a href="../login_pendaftar">Have an account? Login</a>
                                <div class="clearfix">
                                    <button type="submit" class="btn btn-primary float-right" name="register">Register</button>
                                </div>
                            </form>

                            <div class="divider">
                                <div class="divider-text">OR</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <button class="btn btn-block mb-2 btn-primary"><i data-feather="facebook"></i> Facebook</button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-block mb-2 btn-secondary"><i data-feather="github"></i> Github</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include('../layouts/footer.php');
        ?>