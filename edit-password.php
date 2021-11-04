<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <?php
  include("koneksi.php");
  session_start();
  if (empty($_SESSION['username'])) {
	  header("Location: login.php");
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
				  <h6 class="m-0 font-weight-bold text-primary">Edit Password</h6>
				</div>
				<div class="card-body">
					<?php
					if (isset($_GET['e'])) {
						if ($_GET['e'] == 'sukses') {
					?>
					<div class="bg-success col-xl-2 col-sm-2 text-white py-2" style="border-radius:3px" align="center">
						Sukses!
					</div>
					<?php
						}
						else if ($_GET['e'] == 'gagal') {
					?>
					<div class="bg-danger col-xl-4 col-sm-4 text-white py-2" style="border-radius:3px" align="center">
						Error! Terjadi kesalahan pada password!
					</div>
					<?php
						}
					}
					?>
					<form action="" id="tambahPenduduk" method="post">
						<b>Password Lama</b>:<br/>
						<input type="password" class="form-control form-control-user col-xl-5" name="password" required /><br/>
						<b>Password Baru</b>:<br/>
						<input type="password" class="form-control form-control-user col-xl-5" name="newpassword" required /><br/>
						<button type="submit" name="edit" class="btn btn-primary btn-icon-split btn-sm">
							<span class="icon text-white-100">
							  <i class="fas fa-pen"></i>
							</span>
							<span class="text">Ubah Password</span>
						</button>
					</form>
					<?php
					if (isset($_POST['edit'])) {
						$username = $_SESSION['username'];
						$oldPassword = $_POST['password'];
						$newPassword = $_POST['newpassword'];
						$gantiPassword = false;
						
						$cekPass = mysqli_query($db, "SELECT * FROM `account` WHERE username = '$username'");
						if (mysqli_num_rows($cekPass) > 0) {
							while ($cek = mysqli_fetch_array($cekPass)) {
								if ($cek['password'] == $oldPassword) {
									$gantiPassword = true;
								}
								else echo '<meta http-equiv="refresh" content="0;url=edit-password.php?e=gagal">';
							}
							if ($gantiPassword == true) {
								$ubahPass = mysqli_query($db, "UPDATE `account` SET password = '$newPassword' WHERE username = '$username'");
								if ($ubahPass) {
									echo '<meta http-equiv="refresh" content="0;url=edit-password.php?e=sukses">';
								}
							}
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
