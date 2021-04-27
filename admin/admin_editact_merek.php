<?php
include('../includes/config.php');
$id		= $_POST['id'];
$brand	= $_POST['nama_merek'];
$sql 	= "UPDATE merek SET nama_merek='$brand' WHERE id_merek='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'admin_view_merek.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'admin_edit_merek.php?id=$id'; 
		</script>";

}
?>