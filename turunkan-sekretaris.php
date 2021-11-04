<?php
include("koneksi.php");
if (isset($_GET['username'])) {
	$username = $_GET['username'];
	$hapus = mysqli_query($db, "DELETE FROM `account` WHERE username = '$username'");
	if ($hapus) {
		header("Location: tambah-sekretaris.php");
	}
}
?>