<?php
include('../includes/config.php');
$nama	= $_POST['nama'];
$email 	= $_POST['email'];
$Password	= $_POST['Pass'];
$telp 	= $_POST['telp'];
$alamat	= $_POST['alamat'];
$norek	= $_POST['norek'];
$bank	= $_POST['bank'];
$atas_nama	= $_POST['atas_nama'];
$Password=md5($_POST['Pass']);
$sql 	= "INSERT INTO pengelola (nama,email,password,telp,alamat,norek,bank,atas_nama) VALUES ('$nama','$email','$Password','$telp','$alamat','$norek','$bank','$atas_nama')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'datapengelola.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'tambahpengelola.php'; 
		</script>";

}
?>