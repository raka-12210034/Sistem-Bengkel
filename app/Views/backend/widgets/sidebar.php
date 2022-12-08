 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-warning sidebar sidebar-light accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-reguler fa-car"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Sistem Informasi <sup>Bengkel</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?=base_url('dashboard')?>">
        <i class="fas fa-reguler fa-taxi"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading text-light">
    Data Pelanggan & Karyawan
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-solid fa-user-nurse text-danger"></i>
        <span class="text-dark">Karyawan Komponen</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Karyawan:</h6>
            <a class="collapse-item" href="<?=site_url('karyawan')?>">Karyawan</a>
            <a class="collapse-item" href="<?=site_url('pemeriksaan')?>">Pemeriksaan</a>
            <a class="collapse-item" href="<?=site_url('metodebayar')?>">Metode Bayar</a>
            <a class="collapse-item" href="<?=site_url('unitsatuan')?>">Unit Satuan</a>
            <a class="collapse-item" href="<?=site_url('barangjasa')?>">Barang Jasa</a>
            <a class="collapse-item" href="<?=site_url('barangjasapemeriksaan')?>">Barang Jasa Pemeriksaan</a>
            <a class="collapse-item" href="<?=site_url('pembayaran')?>">Pembayaran</a>
            
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-solid fa-user text-danger"></i>
        <span class="text-dark">Pelanggan</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Pelanggan:</h6>
            <a class="collapse-item" href="<?=site_url('pelanggan')?>">Pelanggan</a>
            <a class="collapse-item" href="<?=site_url('jeniskendaraan')?>">Jenis Kendaraan</a>
            <a class="collapse-item" href="<?=site_url('warnakendaraan')?>">Warna Kendaraan</a>
            <a class="collapse-item" href="<?=site_url('statuspemeriksaan')?>">Status Pemeriksaan</a>
            <a class="collapse-item" href="<?=site_url('kendaraan')?>">Barang Jasa</a>
        </div>
    </div>
</li>


<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->