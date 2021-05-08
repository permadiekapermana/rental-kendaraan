 <?php
include('../includes/config.php');
$id		= $_POST['id'];
$nama	= $_POST['nama'];
$email 	= $_POST['email'];
$Password	= $_POST['Pass'];
$telp 	= $_POST['telp'];
$alamat	= $_POST['alamat'];
$norek	= $_POST['norek'];
$bank	= $_POST['bank'];
$atas_nama	= $_POST['atas_nama'];
$Password=md5($_POST['Pass']);
$sql 	= "UPDATE pengelola SET nama='$nama',email='$email',password='$Password',telp='$telp',alamat='$alamat',norek='$norek',bank='$bank',atas_nama='$atas_nama' WHERE id_pengelola='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'datapengelola.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'edit_data_pengelola.php?id_pengelola=$id'; 
		</script>";

}
?>