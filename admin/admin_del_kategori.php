<?php
include("../includes/config.php");
error_reporting(0);
if(isset($_GET['id'])){
	$id	= $_GET['id'];
	$mySql	= "DELETE FROM kategori WHERE id_kategori='$id'";
	$myQry	= mysqli_query($koneksidb, $mySql);
	echo "<script type='text/javascript'>
			alert('Data berhasil dihapus.'); 
			document.location = 'admin_view_kategori.php'; 
		</script>";
}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'admin_view_kategori.php'; 
		</script>";
}

?>