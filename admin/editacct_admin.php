 <?php
include('../includes/config.php');
$id		= $_POST['id'];
$UserName	= $_POST['UserName'];
$password	= $_POST['Pass'];
$password=md5($_POST['Pass']);
$sql 	= "UPDATE admin SET UserName='$UserName',Password='$password' WHERE id='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'dataadmin.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'edit_data_admin.php?id=$id'; 
		</script>";

}
?>