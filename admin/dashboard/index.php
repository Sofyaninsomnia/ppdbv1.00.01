<?php
// Menghubungkan ke database, pastikan session sudah dimulai
include('../../database/koneksi.php');

// Memeriksa apakah pengguna sudah login dengan memeriksa session
// if (!isset($_SESSION['user'])) {
//     // Jika session tidak ada, arahkan ke halaman login
//     header('Location: ../../auth/login'); 
//     exit(); // Pastikan proses dihentikan setelah pengalihan
// }

// Menyertakan header layout
include('../../layouts/header.php');
?>

<div id="app">
    <?php
    // Menyertakan sidebar (aside)
    include('../layouts/aside.php');
    ?>

    <div id="main">
        <?php
        // Menyertakan navigasi
        include('../layouts/nav.php');
        ?>

        <!-- Konten Utama -->
        <div class="main-content container-fluid">
            <div class="page-title">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
            </div>

            <!-- Konten dashboard lainnya bisa ditambahkan di sini -->
        </div>

    </div>
</div>

<?php
// Menyertakan footer layout
include('../../layouts/footer.php');
?>
