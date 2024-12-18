<?php
include('../../database/koneksi.php');
include('../../layouts/header.php');

if (isset($_POST['submit'])) {
    $file = $_FILES['file_dokumen']; // Assuming the name of the input field is 'file_dokumen'
    $nisn = $_POST['nisn']; // Ambil NISN dari input form

    // Cek jika NISN ada dalam database
    $query_siswa = "SELECT id_siswa FROM siswa WHERE nisn = '$nisn'";
    $result_siswa = mysqli_query($conn, $query_siswa);

    if (mysqli_num_rows($result_siswa) > 0) {
        // Jika NISN ditemukan, ambil ID Siswa
        $siswa = mysqli_fetch_assoc($result_siswa);
        $id_siswa = $siswa['id_siswa'];

        // Validasi siswa hanya bisa upload 1 kali
        $query_dokumen = "SELECT * FROM dokumen WHERE id_siswa = '$id_siswa' AND jenis_dokumen = 'PDF'";
        $result_dokumen = mysqli_query($conn, $query_dokumen);

        // Periksa jika sudah ada dokumen yang diupload
        if (mysqli_num_rows($result_dokumen) > 0) {
            // Jika sudah ada dokumen yang diupload, tampilkan pesan
            echo '<script>
                    alert("Anda sudah mengunggah dokumen sebelumnya. Hanya satu pengunggahan yang diperbolehkan.");
                  </script>';
        } else {
            // Cek jika file adalah PDF
            $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);

            if ($file_extension != 'pdf') {
                // Jika bukan PDF, tampilkan alert
                echo '<script>
                        alert("Format file tidak valid! Hanya file PDF yang diperbolehkan.");
                      </script>';
            } else {
                // Jika file adalah PDF, lanjutkan upload
                $target_directory = "../../admin/berkas/upload/"; // Folder tempat upload

                // Pastikan folder upload ada
                if (!is_dir($target_directory)) {
                    mkdir($target_directory, 0777, true); // Buat folder jika belum ada
                }

                // Sanitasi nama file untuk menghindari karakter aneh
                $sanitized_filename = preg_replace("/[^a-zA-Z0-9\._-]/", "_", $file["name"]);
                $target_file = $target_directory . basename($sanitized_filename);

                // Pindahkan file ke folder tujuan
                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                    // Insert data file ke database
                    $jenis_dokumen = 'PDF'; // Tipe dokumen (bisa disesuaikan)
                    $path_dokumen = $target_file; // Path dokumen yang sudah diupload

                    // Simpan ke tabel dokumen
                    $query = "INSERT INTO dokumen (id_siswa, jenis_dokumen, path_dokumen) 
                              VALUES ('$id_siswa', '$jenis_dokumen', '$path_dokumen')";

                    if (mysqli_query($conn, $query)) {
                        // Pesan sukses
                        echo '<script>
                                alert("Dokumen berhasil diunggah dan disimpan ke database!");
                              </script>';
                    } else {
                        // Pesan jika gagal menyimpan ke database
                        echo '<script>
                                alert("Gagal menyimpan dokumen ke database. Terjadi kesalahan.");
                              </script>';
                    }
                } else {
                    // Jika gagal mengupload file
                    echo '<script>
                            alert("Gagal mengunggah file! Terjadi kesalahan saat mengunggah file.");
                          </script>';
                }
            }
        }
    } else {
        // Jika NISN tidak ditemukan di database
        echo '<script>
                alert("NISN tidak terdaftar. Mohon periksa kembali.");
              </script>';
    }
}
?>

<div class="id">
    <?php include('../layouts/aside.php'); ?>
    
    <div id="main">
        <?php include('../layouts/nav.php'); ?>

        <section id="input-file-browser">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="text-align: center;">
                            <h4 class="card-title">File Input</h4>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-12 text-center">
                                    <!-- Form input file -->
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-file">
                                            <!-- Input NISN -->
                                            <input type="text" class="form-control" name="nisn" placeholder="Masukkan NISN" required>
                                        </div>

                                        <div class="form-file mt-3">
                                            <!-- Input file hanya untuk PDF -->
                                            <input type="file" class="form-file-input" id="customFile" accept="application/pdf" name="file_dokumen" required>
                                            <label class="form-file-label" for="customFile">
                                                <span class="form-file-text">Upload file pdf anda disini</span>
                                                <span class="form-file-button btn-primary"><i data-feather="upload"></i></span>
                                            </label>
                                        </div>

                                        <!-- Submit form -->
                                        <button type="submit" class="btn btn-primary mt-3" name="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include('../../layouts/footer.php'); ?>
    </div>
</div>
