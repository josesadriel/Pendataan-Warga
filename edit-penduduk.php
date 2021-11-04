<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tambah Penduduk</title>

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
              <h6 class="m-0 font-weight-bold text-primary">Tambah Penduduk</h6>
            </div>
            <div class="card-body">
				<?php
				if (isset($_GET['nik'])){
					$id = $_GET['nik'];
					$cekId = mysqli_query($db, "SELECT * FROM penduduk WHERE nik = '$id'");
					if (mysqli_num_rows($cekId) > 0) {
						while ($edit = mysqli_fetch_array($cekId)) {
				?>
				<form action="" id="tambahPenduduk" method="post">
					<b>NIK</b>:<br/>
					<input type="number" class="form-control form-control-user" name="nik" value="<?php echo $edit['nik']; ?>" required><br/>
					<b>Nama</b>:<br/>
					<input type="text" class="form-control form-control-user" name="nama" value="<?php echo $edit['nama']; ?>" required><br/>
					<b>TTL</b>:<br/>
					<div class="form-group row">
					  <div class="col-sm-3 mb-3 mb-sm-0">
						<input type="text" class="form-control form-control-user" name="tempatLahir" value="<?php echo $edit['tempatLahir']; ?>" placeholder="Tempat Lahir..." required>
					  </div>
					  <div class="col-sm-3">
						<input type="date" class="form-control form-control-user" name="tglLahir" value="<?php echo $edit['tglLahir']; ?>" required>
					  </div>
					</div>
					<b>Alamat</b>:<br/>
					<textarea class="form-control form-control-user" name="alamat" required><?php echo $edit['alamat']; ?></textarea><br/>
					<b>RT/RW</b>:<br/>
					<div class="form-group row">
					  <div class="col-sm-3 mb-3 mb-sm-0">
						<input type="number" name="rt" placeholder="RT" class="form-control form-control-user" value="<?php echo $edit['rt']; ?>" required/>
					  </div>
					  <div class="col-sm-3">
						<input type="number" name="rw" placeholder="RW" class="form-control form-control-user" value="<?php echo $edit['rw']; ?>" required/>
					  </div>
					</div>
					<b>Kelurahan</b>:<br/>
					<input type="text" class="form-control form-control-user" name="kelDesa" value="<?php echo $edit['kelurahan']; ?>" required><br/>
					<b>Kecamatan</b>:<br/>
					<input type="text" class="form-control form-control-user" name="kecamatan" value="<?php echo $edit['kecamatan']; ?>" required /><br/>
					<b>Agama</b>:<br/>
					<select name="agama" class="form-control form-control-user col-sm-3" required>
						<option value="Islam">Islam</option>
						<option value="Protestan">Protestan</option>
						<option value="Katolik">Katolik</option>
						<option value="Buddha">Buddha</option>
						<option value="Hindu">Hindu</option>
						<option value="Kong Hu Cu">Kong Hu Cu</option>
					</select><br/>
					<b>Status Kawin</b>:<br/>
					<select name="statusKawin" class="form-control form-control-user col-sm-3" required>
						<option value="Belum Menikah">Belum Menikah</option>
						<option value="Menikah">Menikah</option>
					</select><br/>
					<b>Pekerjaan</b>:<br/>
					<input type="text" class="form-control form-control-user" name="pekerjaan" value="<?php echo $edit['pekerjaan']; ?>" required /><br/>
					<b>Status dalam keluarga</b>:<br/>
					<select name="diKeluarga" class="form-control form-control-user col-sm-3" required>
						<option value="Kepala Keluarga">Kepala Keluarga</option>
						<option value="Suami">Suami</option>
						<option value="Isteri">Isteri</option>
						<option value="Anak">Anak</option>
						<option value="Menantu">Menantu</option>
						<option value="Cucu">Cucu</option>
						<option value="Orangtua">Orangtua</option>
						<option value="Mertua">Mertua</option>
						<option value="Famili">Famili</option>
						<option value="Famili Lain">Famili Lain</option>
						<option value="Lainnya">Lainnya</option>
					</select><br/>
					<b>Jenis Kelamin</b>:<br/>
					<select name="gender" class="form-control form-control-user col-sm-3" required>
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select><br/>
					<b>Status Penduduk</b>:<br/>
					<select name="kependudukan" class="form-control form-control-user col-sm-3">
						<option value="tetap">Tetap</option>
						<option value="musiman">Musiman</option>
					</select><br/>
					<br/>
					<button type="submit" class="btn btn-primary btn-icon-split btn-sm">
						<span class="icon text-white-100">
						  <i class="fas fa-plus"></i>
						</span>
						<span class="text">Edit Penduduk</span>
					</button>
				</form>
				<?php
						}
					}
				}
				if (isset($_POST['nik'])) {
					$nik = $_POST['nik'];
					$nama = $_POST['nama'];
					$tempatLahir = $_POST['tempatLahir'];
					$tglLahir = $_POST['tglLahir'];
					$tglLahir = date("Y-m-d", strtotime($tglLahir));
					$gender = $_POST['gender'];
					$alamat = $_POST['alamat'];
					$rt = $_POST['rt'];
					$rw = $_POST['rw'];
					$kecamatan = $_POST['kecamatan'];
					$kelDesa = $_POST['kelDesa'];
					$agama = $_POST['agama'];
					$status = $_POST['statusKawin'];
					$pekerjaan = $_POST['pekerjaan'];
					$diKeluarga = $_POST['diKeluarga'];
					$noHp = $_POST['noHp'];
					$kependudukan = $_POST['kependudukan'];
					
					$insertSql = mysqli_query($db, "UPDATE penduduk SET nik = '$nik', nama = '$nama', tempatLahir = '$tempatLahir', tglLahir = '$tglLahir', gender = '$gender', alamat = '$alamat', rt = '$rt', rw = '$rw', kecamatan = '$kecamatan', kelurahan = '$kelDesa', agama = '$agama', status = '$status', pekerjaan = '$pekerjaan', diKeluarga = '$diKeluarga', kependudukan = '$kependudukan' WHERE nik = '$id'");
					if ($insertSql) {
						echo '<meta http-equiv="refresh" content="0;url=data-penduduk.php">';
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
  
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
