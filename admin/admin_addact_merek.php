<?php
include('../includes/config.php');
$nama_merek	= $_POST['nama_merek'];
$sql 	= "INSERT INTO merek (nama_merek) VALUES ('$nama_merek')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'admin_view_merek.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'admin_add_merek.php'; 
		</script>";

}
?>