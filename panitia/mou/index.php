<?php
include('../../database/koneksi.php');
// Check if the user is already logged in
if(! isset($_SESSION['user'])) {
    header('Location: ../../auth/login');
 }
?>

<?php
include('../../layouts/header.php');
?>
<div id="app">
    <?php
    include('../../layouts/aside.php');
    ?>
    <div id="main">
        <?php
        include('../../layouts/nav.php');
        ?>
    </div>
</div>
<?php
include('../../layouts/footer.php');
?>