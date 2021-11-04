<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tambah Sekretaris</title>

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
			<?php
			if ($_SESSION['status'] != 'admin') {
				echo '<meta http-equiv="refresh" content="0;url=dashboard.php">';
			}
			else if (empty($_SESSION['username'])) {
				echo '<meta http-equiv="refresh" content="0;url=login.php">';
			}
			?>
			<div class="card shadow mb-4">
				<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
					<h6 class="m-0 font-weight-bold text-primary">Tambah Sekretaris</h6>
				</a>
				<div class="collapse show" id="collapseCardExample">
					<div class="card-body">
						<form action="" id="tambahPenduduk" method="post">
							<b>Username</b>:<br/>
							<input type="text" class="form-control form-control-user" name="username" required /><br/>
							<b>Password</b>:<br/>
							<input type="password" class="form-control form-control-user" name="password" required /><br/>
							<b>Nama</b>:<br/>
							<input type="text" class="form-control form-control-user" name="nama" required /><br/>
							<b>No. HP</b>:<br/>
							<input type="number" class="form-control form-control-user" name="noHp" required /><br/>
							<b>Pendidikan</b>:<br/>
							<input type="text" class="form-control form-control-user" name="pendidikan" required /><br/>
							<b>Alamat</b>:<br/>
							<textarea class="form-control form-control-user" name="alamat" required></textarea><br/>
							<button type="submit" name="tambah" class="btn btn-primary btn-icon-split btn-sm">
								<span class="icon text-white-100">
								  <i class="fas fa-plus"></i>
								</span>
								<span class="text">Tambah Sekretaris</span>
							</button>
						</form>
						<?php
						if (isset($_POST['tambah'])) {
							$username = $_POST['username'];
							$password = $_POST['password'];
							$nama = $_POST['nama'];
							$noHp = $_POST['noHp'];
							$pendidikan = $_POST['pendidikan'];
							$alamat = $_POST['alamat'];
							
							$inputSql = mysqli_query($db, "INSERT INTO `account` (username, password, nama, alamat, no_hp, pendidikan) VALUES ('$username', '$password', '$nama', '$alamat', '$noHp', '$pendidikan')");
							if ($inputSql) {
								echo '<meta http-equiv="refresh" content="0;url=tambah-sekretaris.php">';
							}
						}
						?>
					</div>
				</div>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">Sekretaris saat ini</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table" width="100%">
							<tr>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Nomor HP</th>
								<th>Action</th>
							</tr>
							<?php
							$getSekretaris = mysqli_query($db, "SELECT * FROM `account` WHERE status = 'sekretaris'");
							if (mysqli_num_rows($getSekretaris) > 0) {
								while ($list = mysqli_fetch_array($getSekretaris)) {
							?>
							<tr>
								<td><?php echo $list['nama']; ?></td>
								<td><?php echo $list['alamat']; ?></td>
								<td><?php echo $list['no_hp']; ?></td>
								<td><a href="turunkan-sekretaris.php?username=<?php echo $list['username']; ?>" class="btn btn-danger">Hapus Jabatan</a></td>
							</tr>
							<?php
								}
							}
							?>
						</table>
					</div>
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
