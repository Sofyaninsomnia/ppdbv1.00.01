<?php
include('../../database/koneksi.php.php');
include('../../layouts/header.php');
if (!isset($_SESSION["user"])) {
    header("Location: ../../auth/login_pendaftar");
    exit;
}
?>
<div id="app">
    <?php
    include('../layouts/aside.php');
    ?>
    <div id="main">
        <?php
        include('../layouts/nav.php');
        ?>
    </div>
</div>
<?php
include('../../layouts/footer.php');
?>