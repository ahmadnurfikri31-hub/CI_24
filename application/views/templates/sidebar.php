<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-15">
            <i class ="fas fa-laugh-wink"></i>
</div>
        <div class="sidebar-brand-text mx-3">Perpustakaan</div>
</a>

<hr class="sidebar-divider my-0">
<li class="nav-item active">
    <a class="nav-link" href="<?= site_url('dashboard'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= site_url('kategori'); ?>">
        <i class="fas fa-fw fa-folder"></i>
        <span>kategori</span>
</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= base_url('anggota'); ?>">
        <i class="fas fa-fw fa-users"></i>
        <span>Anggota</span>
    </a>
</li>

</ul>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">