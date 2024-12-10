<div id="app">
    <div id="sidebar" class='active'>
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <img src="<?= BASE_URL ?>/assets/images/logo.svg" alt="" srcset="">
            </div>
            <div class="sidebar-menu">
                <ul class="menu">


                    <li class='sidebar-title'>Home</li>
                    <li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'dashboard') ? 'active' : ''; ?>">
                        <a href="<?= BASE_URL ?>/admin/dashboard" class='sidebar-link'>
                            <i data-feather="home" width="20"></i>
                            <span>Info PPDB</span>
                        </a>
                    </li>

                    <li class='sidebar-title'>Menu</li>
                    <li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'jurusan') ? 'active' : ''; ?>">
                        <a href="<?= BASE_URL ?>/admin/jurusan" class='sidebar-link'>
                            <i data-feather="home" width="20"></i>
                            <span>Jurusan</span>
                        </a>

                    </li>
                    <li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'berkas') ? 'active' : ''; ?>">
                        <a href="<?= BASE_URL ?>/admin/berkas" class='sidebar-link'>
                            <i data-feather="home" width="20"></i>
                            <span>Biodata/Pemberkasan</span>
                        </a>

                    </li>
                    <li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'jadwal') ? 'active' : ''; ?>">
                        <a href="<?= BASE_URL ?>/admin/jadwal" class='sidebar-link'>
                            <i data-feather="home" width="20"></i>
                            <span>Jadwal Promosi</span>
                        </a>

                    </li>
                    <li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'mou') ? 'active' : ''; ?>">
                        <a href="<?= BASE_URL ?>/admin/mou" class='sidebar-link'>
                            <i data-feather="home" width="20"></i>
                            <span>Upload MOU</span>
                        </a>

                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    <div id="main">
        <nav class="navbar navbar-header navbar-expand navbar-light">
            <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
            <button class="btn navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                    <li class="dropdown nav-icon">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-lg-inline-block">
                                <i data-feather="bell"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-large">
                            <h6 class='py-2 px-4'>Notifications</h6>
                            <ul class="list-group rounded-none">
                                <li class="list-group-item border-0 align-items-start">
                                    <div class="avatar bg-success mr-3">
                                        <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                    </div>
                                    <div>
                                        <h6 class='text-bold'>New Order</h6>
                                        <p class='text-xs'>
                                            An order made by Ahmad Saugi for product Samsung Galaxy S69
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown nav-icon mr-2">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-lg-inline-block">
                                <i data-feather="mail"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                            <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                            <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="avatar mr-1">
                                <img src="<?= BASE_URL ?>/assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                            </div>
                            <div class="d-none d-md-block d-lg-inline-block">Hi, Saugi</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                            <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                            <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main-content container-fluid">
            <div class="page-title">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
            </div>
        </div>


    </div>
</div>