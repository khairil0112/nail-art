<?php

require_once('../koneksi/koneksi.php');
	// untuk Hapus data barang berdasarkan id barang
	$id = $_GET['id'];
	$sql = mysqli_query($conn,"DELETE FROM user WHERE id='$id'");
	
	echo '<script>alert("Delete successfully");window.location="index.php"</script>';

?>