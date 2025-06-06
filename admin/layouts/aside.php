        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="<?= BASE_URL ?>/assets/images/logo.svg" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class='sidebar-title'>Home</li>



                        <li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'dashboard') ? 'active' : ''; ?> ">
                            <a href="<?= BASE_URL ?>/admin/dashboard" class='sidebar-link'>
                                <i data-feather="alert-circle" width="20"></i>
                                <span>Info PPDB</span>
                            </a>

                        </li>

                        <li class='sidebar-title'>Main Menu</li>

                        <li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'data_casis') ? 'active' : ''; ?> ">
                            <a href="<?= BASE_URL ?>/admin/data_casis" class='sidebar-link'>
                                <i data-feather="trello" width="20"></i>
                                <span>Data Casis</span>
                            </a>

                        </li>
                        <li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'data_ortu') ? 'active' : ''; ?> ">
                            <a href="<?= BASE_URL ?>/admin/data_ortu" class='sidebar-link'>
                                <i data-feather="trello" width="20"></i>
                                <span>Data Ortu</span>
                            </a>

                        </li>
                        <li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'berkas') ? 'active' : ''; ?> ">
                            <a href="<?= BASE_URL ?>/admin/berkas" class='sidebar-link'>
                                <i data-feather="folder" width="20"></i>
                                <span>Pemberkasan</span>
                            </a>

                        </li>
                        <li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'rekap_data') ? 'active' : ''; ?> ">
                            <a href="<?= BASE_URL ?>/admin/rekap_data" class='sidebar-link'>
                                <i data-feather="folder" width="20"></i>
                                <span>Rekap data casis</span>
                            </a>

                        </li>
                        <li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'jadwal') ? 'active' : ''; ?> ">
                            <a href="<?= BASE_URL ?>/admin/jadwal" class='sidebar-link'>
                                <i data-feather="calendar" width="20"></i>
                                <span>Jadwal</span>
                            </a>

                        </li>
                        <li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'mou') ? 'active' : ''; ?> ">
                            <a href="<?= BASE_URL ?>/admin/mou" class='sidebar-link'>
                                <i data-feather="share" width="20"></i>
                                <span>Upload MOU</span>
                            </a>

                        </li>
                        <li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'update') ? 'active' : ''; ?> ">
                            <a href="<?= BASE_URL ?>/admin/update" class='sidebar-link'>
                                <i data-feather="share" width="20"></i>
                                <span>Update landing page</span>
                            </a>

                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>