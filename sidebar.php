	<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<?php
	$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	?>
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Komplek <sup>Sunter</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
	  
      <li class="nav-item <?php if ($curPageName == "dashboard.php") echo "active"; ?>">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
	  <?php
	  if ($_SESSION['status'] == "admin") {
		?>
	  <li class="nav-item <?php if ($curPageName == "tambah-sekretaris.php") echo "active"; ?>">
        <a class="nav-link" href="tambah-sekretaris.php">
          <i class="fas fa-plus"></i>
          <span>Tambah Sekretaris</span></a>
      </li>
		<?php
	  }
	  ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if ($curPageName == "tambah-penduduk.php") echo "active"; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-plus"></i>
          <span>Tambah</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kategori:</h6>
            <a class="collapse-item" href="tambah-penduduk.php">Tambah Data Penduduk</a>
          </div>
        </div>
      </li>
	  
	  <li class="nav-item <?php if ($curPageName == "data-penduduk.php") echo "active"; ?>">
        <a class="nav-link" href="data-penduduk.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Penduduk</span></a>
      </li>
	  
	  <li class="nav-item <?php 
	  $listPage = [
		'list-kk.php', 'list-penduduk-musiman.php', 'list-lansia.php', 
		'list-penduduk-produktif.php', 'list-balita.php', 'list-warga-muslim.php',
		'list-pegawai-swasta.php', 'list-pegawai-asn.php', 'list-wiraswasta.php', 'list-janda-duda.php'];
	  for ($i = 0; $i < count($listPage); $i++) {
		  if ($curPageName == $listPage[$i]) echo "active";
	  }
	  ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseList" aria-expanded="true" aria-controls="collapseList">
          <i class="fas fa-list"></i>
          <span>Kategori Data</span>
        </a>
        <div id="collapseList" class="collapse" aria-labelledby="headingList" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kategori:</h6>
            <a class="collapse-item" href="list-kk.php">KK</a>
			<a class="collapse-item" href="list-penduduk-musiman.php">Warga Musiman / Kontrak</a>
			<a class="collapse-item" href="list-lansia.php">Lansia</a>
			<a class="collapse-item" href="list-penduduk-produktif.php">Penduduk Produktif</a>
			<a class="collapse-item" href="list-balita.php">Usia Balita</a>
			<a class="collapse-item" href="list-warga-muslim.php">Warga Muslim</a>
			<a class="collapse-item" href="list-pegawai-swasta.php">Pegawai Swasta</a>
			<a class="collapse-item" href="list-pegawai-asn.php">Pegawai ASN</a>
			<a class="collapse-item" href="list-wiraswasta.php">Wiraswasta</a>
			<a class="collapse-item" href="list-janda-duda.php">Janda / Duda</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
	  <li class="nav-item <?php if ($curPageName == "pengajuan-surat-pengantar.php") echo "active"; ?>">
        <a class="nav-link" href="pengajuan-surat-pengantar.php">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Pengajuan Surat Pengantar</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->