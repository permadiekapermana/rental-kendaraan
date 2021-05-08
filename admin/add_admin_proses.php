<?php
include('../includes/config.php');
$UserName	= $_POST['UserName'];
$password	= $_POST['Pass'];
$password=md5($_POST['Pass']);
$sql 	= "INSERT INTO admin (UserName,Password) VALUES ('$UserName','$password')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'dataadmin.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'tambahadmin.php'; 
		</script>";

}
?>