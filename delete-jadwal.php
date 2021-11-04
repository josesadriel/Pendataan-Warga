<?php
include("koneksi.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$delSql = mysqli_query($db, "DELETE FROM jadwal WHERE id_jadwal = '$id'");
	if ($delSql) {
		header('Location: dashboard.php');
	}
}
else header('location: 404.html');
?>