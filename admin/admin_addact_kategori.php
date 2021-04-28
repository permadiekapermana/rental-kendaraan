<?php
include('../includes/config.php');
$kategori	= $_POST['kategori'];
$sql 	= "INSERT INTO kategori (kategori) VALUES ('$kategori')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'admin_view_kategori.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'admin_add_kategori.php'; 
		</script>";

}
?>