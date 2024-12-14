<?php
include('../../layouts/header.php');
?>
    <?php
    include('../layouts/aside.php');
    ?>
        <?php
        include('../layouts/nav.php');
        ?>
        <div class="main-content container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Datatable</h3>
                        <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can check the full documentation <a href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Simple Datatable
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-end">
                            <div class="col-md-6 mb-1">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="sok goleti dewek..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-primary" type="button" id="button-addon2">Cari</button>
                                </div>
                            </div>
                        </div>
                        <table class='table table-striped' id="table1">
                            <thead>
                                <tr>
                                    <th>Nisn</th>
                                    <th>Nama Siswa</th>
                                    <th>Nama jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Graiden</td>
                                    <td>vehicula.aliquet@semconsequat.co.uk</td>
                                    <td>076 4820 8838</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dale</td>
                                    <td>fringilla.euismod.enim@quam.ca</td>
                                    <td>0500 527693</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nathaniel</td>
                                    <td>mi.Duis@diam.edu</td>
                                    <td>(012165) 76278</td>
                                    <td>
                                        <span class="badge bg-danger">Inactive</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Darius</td>
                                    <td>velit@nec.com</td>
                                    <td>0309 690 7871</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                          </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>
<?php
include('../../layouts/footer.php');
?>