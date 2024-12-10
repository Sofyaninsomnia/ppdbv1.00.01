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
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
                <section class="section">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title">Bar Chart</h4>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonSec" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Secondary
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                                    <a class="dropdown-item" href="#">Option 1</a>
                                                    <a class="dropdown-item" href="#">Option 2</a>
                                                    <a class="dropdown-item" href="#">Option 3</a>
                                                </div>

                                            </button>
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