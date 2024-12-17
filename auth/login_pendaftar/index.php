<?php
include('../layouts/header.php');
include('../../database/koneksi.php');


// Cek apakah sudah ada sesi login
if (isset($_SESSION["user"])) {
    header("Location: ../../pendaftar/dashboard");
    exit;
}

// Proses login ketika tombol login ditekan
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Melindungi query dari SQL Injection dengan prepared statement
    $stmt = mysqli_prepare($conn, "SELECT * FROM pendaftar WHERE username = ?");
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Cek apakah username ditemukan
    if (mysqli_num_rows($result) === 1) {
        // Ambil data pengguna
        $row = mysqli_fetch_assoc($result);

        // Cek apakah password yang dimasukkan benar
        if (password_verify($password, $row["password"])) {
            // Set session login
            $_SESSION["user"] = [
                "id_pendaftar" => $row["id_pendaftar"],
                "username" => $row["username"]
            ];

            // Menampilkan alert jika login berhasil dan redirect ke dashboard
            echo "<script>
                    alert('Login berhasil! Selamat datang di dashboard.');
                    location.href = '../../pendaftar/dashboard';
                  </script>";
            exit;
        }
    }

    // Jika username atau password salah, set error flag
    $error = true;
}

?>

<body>
    <div id="auth">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="<?= BASE_URL ?>/assets/images/favicon.svg" height="48" class="mb-4">
                                <h3>Sign In</h3>
                                <p>Please sign in to continue to Voler.</p>
                            </div>

                            <!-- Menampilkan alert ketika login gagal -->
                            <?php
                            if (isset($error) && $error === true) {
                                echo "<script>alert('Username atau Password salah!');</script>";
                            }
                            ?>

                            <!-- Form Login -->
                            <form action="" method="post">
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="username" required>
                                        <div class="form-control-icon">
                                            <i data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                        <a href="auth-forgot-password.html" class="float-right">
                                            <small>Forgot password?</small>
                                        </a>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" name="password" required>
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check clearfix my-4">
                                    <div class="checkbox float-left">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <label for="checkbox1">Remember me</label>
                                    </div>
                                    <div class="float-right">
                                        <a href="../register_pendaftar">Don't have an account?</a>
                                    </div>
                                </div>

                                <div class="clearfix">
                                    <button class="btn btn-primary float-right" name="login" value="login">Login</button>
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
    </div>

    <?php
    include('../layouts/footer.php');
    ?>
</body>
