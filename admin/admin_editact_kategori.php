<?php
include('../includes/config.php');
$id		= $_POST['id'];
$kategori	= $_POST['kategori'];
$sql 	= "UPDATE kategori SET kategori='$kategori' WHERE id_kategori='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'admin_view_kategori.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'admin_edit_kategori.php?id=$id'; 
		</script>";

}
?>