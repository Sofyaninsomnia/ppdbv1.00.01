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
        <i data-feather="info" width="20"></i>
        <span>Info PPDB</span>
    </a>
</li>


<li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'berkas') ? 'active' : ''; ?>">
    <a href="<?= BASE_URL ?>/admin/berkas" class='sidebar-link'>
        <i data-feather="book-open" width="20"></i>
        <span>Pemberkasan</span>
    </a>

</li>
<li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'jadwal') ? 'active' : ''; ?>">
    <a href="<?= BASE_URL ?>/admin/jadwal" class='sidebar-link'>
        <i data-feather="upload-cloud" width="20"></i>
        <span>jadwal</span>
    </a>

</li>
<li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'jurusan') ? 'active' : ''; ?>">
    <a href="<?= BASE_URL ?>/admin/jurusan" class='sidebar-link'>
        <i data-feather="dollar-sign" width="20"></i>
        <span>jurusan</span>
    </a>

</li>
<li class="sidebar-item <?= (basename($_SERVER['REQUEST_URI']) == 'mou') ? 'active' : ''; ?>">
    <a href="<?= BASE_URL ?>/admin/mou" class='sidebar-link'>
        <i data-feather="dollar-sign" width="20"></i>
        <span>Mou</span>
    </a>

</li>
</ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>