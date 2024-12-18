<?php
include('../../database/koneksi.php');


if (!isset($_SESSION['user'])) {
    header('Location: ../../auth/login');
    exit;
}

include('../layouts/header.php');
?>

<body>
    <div id="app"> 
        <?php
        include('../layouts/aside.php');
        ?>
        <div id="main">
            <?php
            include('../layouts/nav.php');
            ?>
            <div class="main-content container-fluid">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Data Orang Tua
                        </div>
                        <div class="card-body">
                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Orang Tua</th>
                                        <th>Nama Siswa</th>
                                        <th>Hubungan dengan siswa</th>
                                        <th>Pekerjaan</th>
                                        <th>Alamat</th>
                                        <th>No WhatsApp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query to retrieve data from both orang_tua and siswa tables
                                    $query = "SELECT ot.id_orang_tua, ot.nama_orang_tua, ot.hubungan, ot.pekerjaan, ot.alamat_kerja, ot.no_telepon_ortu, s.nama_lengkap 
                                              FROM orang_tua ot
                                              LEFT JOIN siswa s ON ot.nisn = s.nisn";
                                    $result = mysqli_query($conn, $query);

                                    // Check if the query was successful
                                    if (!$result) {
                                        die("Query failed: " . mysqli_error($conn)); // This will output the SQL error if it fails
                                    }

                                    $no = 1; // Initialize row number
                                    if (mysqli_num_rows($result) > 0) {
                                        // Loop through the result and display data
                                        while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nama_orang_tua']; ?></td>
                                        <td><?php echo $data['nama_lengkap']; ?></td>
                                        <td><?php echo $data['hubungan']; ?></td>
                                        <td><?php echo $data['pekerjaan']; ?></td>
                                        <td><?php echo $data['alamat_kerja']; ?></td>
                                        <td><?php echo $data['no_telepon_ortu']; ?></td>
                                        <td>
                                            <a href="edit_orang_tua.php?id=<?php echo $data['id_orang_tua']; ?>" class="btn btn-primary">Edit</a>
                                            <a onclick="return confirm('Are you sure to delete this?')" href="../function/hapus_ortu.php?id=<?php echo $data['id_orang_tua']; ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='8' class='text-center'>No data available</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            <?php
            include('../layouts/footer.php');
            ?>
        </div>
    </div>
</body>
</html>
