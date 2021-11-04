<?php
include("koneksi.php");
if (isset($_GET['nik'])) {
	$id = $_GET['nik'];
	$delSql = mysqli_query($db, "DELETE FROM penduduk WHERE nik = '$id'");
	if ($delSql) {
		header('Location: data-penduduk.php');
	}
}
else header('location: 404.html');
?>