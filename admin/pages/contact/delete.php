<?php

require_once('../koneksi/koneksi.php');
	// untuk Hapus data barang berdasarkan id barang
	$id = $_GET['id'];
	$sql = mysqli_query($conn,"DELETE FROM pemupukan WHERE id='$id'");
	
	echo '<script>alert("Berhasil Hapus Data");window.location="index.php"</script>';

?>