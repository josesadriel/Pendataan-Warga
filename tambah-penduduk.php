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
				<form action="" id="tambahPenduduk" method="post">
					<b>NIK</b>:<br/>
					<input type="number" class="form-control form-control-user" name="nik" required><br/>
					<b>No. KK</b>:<br/>
					<input type="number" class="form-control form-control-user" name="kk" required><br/>
					<b>Nama</b>:<br/>
					<input type="text" class="form-control form-control-user" name="nama" required><br/>
					<b>TTL</b>:<br/>
					<div class="form-group row">
					  <div class="col-sm-3 mb-3 mb-sm-0">
						<input type="text" class="form-control form-control-user" name="tempatLahir" placeholder="Tempat Lahir..." required>
					  </div>
					  <div class="col-sm-3">
						<input type="date" class="form-control form-control-user" name="tglLahir" required>
					  </div>
					</div>
					<b>Jenis Kelamin</b>:<br/>
					<select name="gender" class="form-control form-control-user col-sm-3" required>
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select><br/>
					<b>Alamat</b>:<br/>
					<textarea class="form-control form-control-user" name="alamat" required></textarea><br/>
					<b>RT/RW</b>:<br/>
					<div class="form-group row">
					  <div class="col-sm-3 mb-3 mb-sm-0">
						<input type="number" name="rt" placeholder="RT" class="form-control form-control-user" required/>
					  </div>
					  <div class="col-sm-3">
						<input type="number" name="rw" placeholder="RW" class="form-control form-control-user" required/>
					  </div>
					</div>
					<b>Kelurahan</b>:<br/>
					<input type="text" class="form-control form-control-user" name="kelurahan" required><br/>
					<b>Kecamatan</b>:<br/>
					<input type="text" class="form-control form-control-user" name="kecamatan" required /><br/>
					<b>Kota</b>:<br/>
					<input type="text" class="form-control form-control-user" name="kota" required /><br/>
					<b>Provinsi</b>:<br/>
					<input type="text" class="form-control form-control-user" name="provinsi" required /><br/>
					<b>Agama</b>:<br/>
					<select name="agama" class="form-control form-control-user col-sm-3" required>
						<option value="Islam">Islam</option>
						<option value="Protestan">Protestan</option>
						<option value="Katolik">Katolik</option>
						<option value="Buddha">Buddha</option>
						<option value="Hindu">Hindu</option>
						<option value="Kong Hu Cu">Kong Hu Cu</option>
					</select><br/>
					<b>Status Perkawinan</b>:<br/>
					<select name="statusKawin" class="form-control form-control-user col-sm-3" required>
						<option value="Belum Menikah">Belum Menikah</option>
						<option value="Menikah">Menikah</option>
						<option value="Cerai Hidup">Cerai Hidup</option>
						<option value="Cerai Mati">Cerai Mati</option>
					</select><br/>
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
					<b>Pendidikan</b>:<br/>
					<select name="pendidikan" required class="form-control form-control-user col-sm-3">
						<option value='TIDAK / BELUM SEKOLAH'>TIDAK / BELUM SEKOLAH</option>
						<option value='BELUM TAMAT SD/SEDERAJAT'>BELUM TAMAT SD/SEDERAJAT</option>
						<option value='TAMAT SD / SEDERAJAT'>TAMAT SD / SEDERAJAT</option>
						<option value='SLTP/SEDERAJAT'>SLTP/SEDERAJAT</option>
						<option value='SLTA / SEDERAJAT'>SLTA / SEDERAJAT</option>
						<option value='DIPLOMA I / II'>DIPLOMA I / II</option>
						<option value='AKADEMI/ DIPLOMA III/S. MUDA'>AKADEMI/ DIPLOMA III/S. MUDA</option>
						<option value='DIPLOMA IV/ STRATA I'>DIPLOMA IV/ STRATA I</option>
						<option value='STRATA II'>STRATA II</option>
						<option value='STRATA III'>STRATA III</option>
					</select><br/>
					<b>Pekerjaan</b>:<br/>
					<select name="pekerjaan" class="form-control form-control-user col-sm-3" required>
						<option value="Belum Bekerja">Belum Bekerja</option>
						<option value="Swasta">Swasta</option>
						<option value="ASN">ASN</option>
						<option value="Wiraswasta">Wiraswasta</option>
						<option value="Pelajar">Pelajar</option>
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
						<span class="text">Tambah Penduduk</span>
					</button>
				</form>
				<?php
				if (isset($_POST['nik'])) {
					$nik = $_POST['nik'];
					$kk = $_POST['kk'];
					$nama = $_POST['nama'];
					$tempatLahir = $_POST['tempatLahir'];
					$tglLahir = $_POST['tglLahir'];
					$tglLahir = date("Y-m-d", strtotime($tglLahir));
					$gender = $_POST['gender'];
					$alamat = $_POST['alamat'];
					$rt = $_POST['rt'];
					$rw = $_POST['rw'];
					$kecamatan = $_POST['kecamatan'];
					$kelurahan = $_POST['kelurahan'];
					$kota = $_POST['kota'];
					$provinsi = $_POST['provinsi'];
					$agama = $_POST['agama'];
					$status = $_POST['statusKawin'];
					$diKeluarga = $_POST['diKeluarga'];
					$pendidikan = $_POST['pendidikan'];
					$pekerjaan = $_POST['pekerjaan'];
					$kependudukan = $_POST['kependudukan'];
					
					$insertSql = mysqli_query($db, "INSERT INTO penduduk (nik, no_kk, nama, tempatLahir, tglLahir, gender, alamat, rt, rw, kecamatan, kelurahan, kota, provinsi, agama, status, diKeluarga, pendidikan, pekerjaan, kependudukan) VALUES ('$nik', '$kk', '$nama', '$tempatLahir', '$tglLahir', '$gender', '$alamat', '$rt', '$rw', '$kecamatan', '$kelurahan', '$kota', '$provinsi', '$agama', '$status', '$diKeluarga', '$pendidikan', '$pekerjaan', '$kependudukan')");
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
