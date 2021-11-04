<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pengajuan Surat Pengantar</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <?php
  include("koneksi.php");
  session_start();
  function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  }
  ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include("sidebar.php"); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <?php include("topBar.php"); ?>

        </nav>
        <!-- End of Topbar -->
	  <!-- Content Row -->
          <div class="container-fluid">
			<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pengajuan Surat Pengantar</h6>
            </div>
            <div class="card-body">
				<form action="cetak.php" id="tambahPenduduk" method="get">
					<b>No. Surat</b>:<br/>
					<input type="text" class="form-control form-control-user col-sm-4" id="noSurat" name="noSurat" required/><br/>
					<b>Tanggal</b>:<br/>
					<input type="text" name="tglSurat" class="form-control form-control-user col-sm-3" value="<?php echo tgl_indo(date('Y-m-d')); ?>" readonly="true"/><br/>
					<b>NIK</b>:<br/>
					<input type="text" class="form-control form-control-user col-sm-4" id="nik" name="nik" style="display:inline" required>
					<button type="button" class="btn btn-info btn-sm" onclick="location.href='?nik='+document.getElementById('nik').value+'&noSurat='+document.getElementById('noSurat').value;">
						<span class="icon text-white-100">
						  <i class="fas fa-search"></i>
						</span>
						<span class="text">Cari</span>
					</button>
					<br/>
					<div>
						<span id="found" class="btn btn-success btn-icon-split btn-sm" style="display:none">
							<span class="icon text-white-100">
							  <i class="fas fa-check"></i>
							</span>
							<span class="text">NIK Terdaftar!</span>
						</span>
						<span id="notFound" class="btn btn-danger btn-icon-split btn-sm" style="display:none">
							<span class="icon text-white-100">
							  <i class="fas fa-times"></i>
							</span>
							<span class="text">NIK Belum Terdaftar!</span>
						</span>
					</div>
					<br/>
					<b>Keperluan Surat</b>:<br/>
					<select name="surat" class="form-control form-control-user col-sm-4" required>
						<option value="KTP Baru/Perpanjang">KTP Baru/Perpanjang</option>
						<option value="Kartu Keluarga (KK)">Kartu Keluarga (KK)</option>
						<option value="Kelahiran">Kelahiran</option>
						<option value="Kematian">Kematian</option>
						<option value="Mutasi (Keluar/Masuk)">Mutasi (Keluar/Masuk)</option>
						<option value="Izin Keramaian">Izin Keramaian</option>
						<option value="Keterangan Keluarga Miskin">Keterangan Keluarga Miskin</option>
						<option value="Keterangan Usaha">Keterangan Usaha</option>
						<option value="Keterangan Tempat Tinggal/Domisili">Keterangan Tempat Tinggal/Domisili</option>
						<option value="Nikah">Nikah</option>
					</select>
					<br/>
					<button type="submit" name="e" class="btn btn-primary btn-icon-split btn-sm" id="submit" style="display:none">
						<span class="icon text-white-100">
						  <i class="fas fa-plus"></i>
						</span>
						<span class="text">Buat Surat</span>
					</button>
				</form>
				<?php
				if (isset($_GET['nik'])){
					if (isset($_GET['noSurat'])) {
						$noSurat = $_GET['noSurat'];
					}
					$nik = $_GET['nik'];
					$cekNik = mysqli_query($db, "SELECT * FROM penduduk WHERE nik = '$nik'");
					if (mysqli_num_rows($cekNik) > 0){
						echo "<script>";
						echo "document.getElementById('found').style.display='';";
						echo "document.getElementById('noSurat').value='" . $noSurat . "';";
						echo "document.getElementById('nik').value='" . $nik . "';";
						echo "document.getElementById('submit').style.display='';";
						echo "</script>";
					}
					else {
						echo "<script>";
						echo "document.getElementById('notFound').style.display='';";
						echo "document.getElementById('noSurat').value='" . $noSurat . "';";
						echo "document.getElementById('nik').value='" . $nik . "';";
						echo "</script>";
					}
				}
				?>
			</div>
			</div>
		  </div>
        </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

	<script>
	function klikSubmit(){
		document.getElementById('tambahJadwal').submit();
	}
	</script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
