<?php
include('../includes/config.php');
$id_info	= $_POST['id_info'];
$alamat_kami	= $_POST['alamat_kami'];
$email_kami	= $_POST['email_kami'];
$telp_kami	= $_POST['telp_kami'];
$sql 	= "UPDATE contactusinfo SET alamat_kami='$alamat_kami',email_kami='$email_kami',telp_kami='$telp_kami' WHERE id_info='$id_info'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'kontak.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'kontak.php'; 
		</script>";

}
?>