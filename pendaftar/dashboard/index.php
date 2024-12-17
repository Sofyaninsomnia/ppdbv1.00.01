<?php
include('../../layouts/header.php');
include('../../database/koneksi.php');
if (!isset($_SESSION["user"])) {
    header("Location: ../../auth/login_pendaftar");
    exit;
    
} ?>
<div id="app">
    <?php include('../layouts/aside.php'); ?>
    <div id="main">
        <?php include('../layouts/nav.php'); ?>
        <div class="main-content container-fluid">
            <div class="page-title">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
            </div>
        </div>
    </div>
</div>
<?php include('../../layouts/footer.php'); ?>