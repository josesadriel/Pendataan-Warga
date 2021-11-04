<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <?php
  include("koneksi.php");
  session_start();
  if (empty($_SESSION['username'])) {
	  echo '<meta http-equiv="refresh" content="0;url=login.php">';
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

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Penduduk</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
						<?php
						$totalPenduduk = mysqli_query($db, "SELECT COUNT(*) AS 'Jumlah' FROM penduduk");
						while($total = mysqli_fetch_array($totalPenduduk)) {
							echo $total['Jumlah'] . " orang";
						}
						?>
					  </div>
                    </div>
                    <div class="col-auto">
						<i class="fas fa-user-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Balita</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
						<?php
						$tBalita = mysqli_query($db, "select count(*) as totalBalita from penduduk where (year(now()) - year(tglLahir)) <= 5");
						while($totalBalita = mysqli_fetch_array($tBalita)) {
							echo $totalBalita['totalBalita'] . " orang";
						}
						?>
					  </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-baby fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Produktif</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
						  <?php
						  $tProduktif = mysqli_query($db, "select count(*) as totalProduktif, pekerjaan from penduduk where (year(now()) - year(tglLahir)) BETWEEN 18 AND 59");
						  while($totalProduktif = mysqli_fetch_array($tProduktif)) {
							  echo $totalProduktif['totalProduktif'] . " orang";
						  }
						  ?>
						  </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Lansia</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
					  <?php
					  $tLansia = mysqli_query($db, "select count(*) as tLansia from penduduk where (year(now()) - year(tglLahir)) >= 60");
					  while($totalLansia = mysqli_fetch_array($tLansia)) {
						  echo $totalLansia['tLansia'] . " orang";
					  }
					  ?>
					  </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-wheelchair fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- /.container-fluid -->

      </div>
	  <!-- Content Row -->
          <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Jadwal Kerja</h6>
            </div>
            <div class="card-body">
			<?php
			if (isset($_SESSION['status'])) {
				if ($_SESSION['status'] == "sekretaris" || $_SESSION['status'] == 'admin') {
			?>
			  <a href="tambah-jadwal.php" class="btn btn-primary btn-icon-split btn-sm">
				<span class="icon text-white-100">
				  <i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah Jadwal</span>
			  </a>
			<?php
				}
			}
			?>
			  <br/>
			  <br/>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
					  <th>Pukul</th>
                      <th>Keterangan</th>
					  <?php
					  if (isset($_SESSION['status'])) {
						  if ($_SESSION['status'] == "sekretaris" || $_SESSION['status'] == 'admin') {
							  echo "<th>Actions</th>";
						  }
					  }
					  ?>
                    </tr>
                  </thead>
                  <tbody>
					<?php
					$showData = mysqli_query($db, "SELECT * FROM jadwal ORDER BY tanggal");
					if (mysqli_num_rows($showData) > 0) {
						while($data = mysqli_fetch_array($showData)) {
					?>
					<tr>
						<td><?php echo $data['tanggal']; ?></td>
						<td><?php echo $data['pukul']; ?></td>
						<td><?php echo $data['kegiatan']; ?></td>
						<?php
						if (isset($_SESSION['status'])) {
							if ($_SESSION['status'] == "sekretaris" || $_SESSION['status'] == 'admin') {
						?>
						<td>
							<a href="edit-jadwal.php?id=<?php echo $data['id_jadwal']; ?>" class="btn btn-success btn-circle btn-sm">
								<i class="fas fa-pen"></i>
							</a>
							<a href="delete-jadwal.php?id=<?php echo $data['id_jadwal']; ?>" class="btn btn-danger btn-circle btn-sm">
								<i class="fas fa-trash"></i>
							</a>
						</td>
						<?php
							}
						}
						?>
					</tr>
					<?php
						}
					}
					?>
                  </tbody>
                </table>
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
