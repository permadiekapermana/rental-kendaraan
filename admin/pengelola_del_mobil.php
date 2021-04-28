<?php
include("../includes/config.php");
error_reporting(0);
if(isset($_GET['id'])){
	$id	= $_GET['id'];
	$mySql	= "DELETE FROM mobil WHERE id_mobil='$id'";
	$myQry	= mysqli_query($koneksidb, $mySql);
	echo "<script type='text/javascript'>
			alert('Data berhasil dihapus.'); 
			document.location = 'pengelola_view_mobil.php'; 
		</script>";
}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'pengelola_view_mobil.php'; 
		</script>";
}

?>