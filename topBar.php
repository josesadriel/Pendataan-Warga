			<!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Messages -->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
			<?php
			if (isset($_SESSION['username'])) {
				$username = $_SESSION['username'];
				$userSql = mysqli_query($db, "SELECT * FROM account WHERE username = '$username'");
				
				if ($userSql) {
					while($profile = mysqli_fetch_array($userSql)) {
			?>
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $profile['nama']; ?></span>
                <img class="img-profile rounded-circle" src="profile/<?php echo $profile['gambar']; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="edit-password.php?username=<?php echo $profile['username']; ?>">
                  <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
			<?php
					}
				}
			}
			?>
          </ul>
		  <!-- Logout Modal-->
		  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="exampleModalLabel">Keluar?</h5>
				  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				  </button>
				</div>
				<div class="modal-body">Klik "Logout" untuk keluar dari website ini.</div>
				<div class="modal-footer">
				  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
				  <a class="btn btn-primary" href="logout.php">Logout</a>
				</div>
			  </div>
			</div>
		  </div>