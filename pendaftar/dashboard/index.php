<?php
include('../../layouts/header.php');
?>

<div class="id">
    <?php
    include('../layouts/menu.php');
    ?>
    <div id="main">
        <?php
        include('../layouts/nav.php');
        ?>
        <div class="main-content container-fluid">
            <div class="page-title">
                <div class="text-center">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">Selamat datang di data PPDB 2025-2026</p>
                </div>
                <section class="section">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title">Sisa Kouta</h4>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonSec" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Joining schools
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSec">
                                                <a class="dropdown-item" href="#">Option 1</a>
                                                <a class="dropdown-item" href="#">Option 2</a>
                                                <a class="dropdown-item" href="#">Option 3</a>
                                            </div>
                                        </div>
                                        </div>
                                    <div class="card-body">
                                        <canvas id="bar"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
</div>
<?php
include('../../layouts/footer.php');
?>