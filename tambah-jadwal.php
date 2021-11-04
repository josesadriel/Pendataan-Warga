<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tambah Jadwal</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <?php
  include("koneksi.php");
  session_start();
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
              <h6 class="m-0 font-weight-bold text-primary">Tambah Jadwal</h6>
            </div>
            <div class="card-body">
				<form action="" id="tambahJadwal" method="post">
					<b>Tanggal</b>:<br/>
					<input type="date" class="form-control form-control-user" name="inputTanggal" aria-describedby="inputTanggal" value="<?php echo date("Y-m-d"); ?>">
					<b>Pukul</b>:<br/>
					<input type="time" class="form-control form-control-user" name="inputPukul" aria-describedby="inputPukul" value="<?php echo date("H:i"); ?>">
					<b>Kegiatan</b>:<br/>
					<textarea class="form-control form-control-user" name="inputKegiatan"></textarea><br/>
					<a class="btn btn-primary btn-icon-split btn-sm" onclick="klikSubmit()" style="color:white">
						<span class="icon text-white-100">
						  <i class="fas fa-plus"></i>
						</span>
						<span class="text">Tambah Jadwal</span>
					</a>
				</form>
				<?php
				if (isset($_POST['inputTanggal']) && isset($_POST['inputPukul']) && isset($_POST['inputKegiatan'])) {
					$id = "K" . date("dmYHis");
					$tanggal = $_POST['inputTanggal'];
					$pukul = $_POST['inputPukul'];
					$kegiatan = $_POST['inputKegiatan'];
					
					$insertSql = mysqli_query($db, "INSERT INTO jadwal (id_jadwal, tanggal, pukul, kegiatan) VALUES ('$id', '$tanggal', '$pukul', '$kegiatan')");
					if ($insertSql) {
						echo '<meta http-equiv="refresh" content="0;url=dashboard.php">';
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
