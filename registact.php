<?php
session_start();
error_reporting(0);
include('includes/config.php');
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$alamat=$_POST['alamat']; 
$pass = $_POST['pass'];
$conf = $_POST['conf'];
$image1=$_FILES["img1"]["name"];
$image2=$_FILES["img2"]["name"];
$newimg1 = date('dmYHis').$image1;
$newimg2 = date('dmYHis').$image2;
move_uploaded_file($_FILES["img1"]["tmp_name"],"image/id/".$newimg1);
move_uploaded_file($_FILES["img2"]["tmp_name"],"image/id/".$newimg2);

$arr=json_encode(array(
	"phone"=>"$mobile",
	"body"=>"Terima Kasih",
	
));
$url="https://api.chat-api.com/instance237323/message?token=iyweuftjamxe823j";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
	'Content-type:application/json',
	'Content-length:'.strlen($arr)
));
$result=curl_exec($ch);
curl_close($ch);
echo $result;

if($conf!=$pass){
	echo "<script>alert('Password tidak sama!');</script>";
	echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";			
}else{
	$sqlcek = "SELECT email FROM users WHERE email='$email'";
	$querycek = mysqli_query($koneksidb,$sqlcek);
		if(mysqli_num_rows($querycek)>0){
			echo "<script>alert('Email sudah terdaftar, silahkan gunakan email lain!');</script>";
			echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";			
		}else{
			$password=md5($_POST['pass']);
			$sql1="INSERT INTO users(nama_user,email,telp,password,alamat,ktp,kk) VALUES('$fname','$email','$mobile','$password','$alamat','$newimg1','$newimg2')";
			$lastInsertId = mysqli_query($koneksidb, $sql1);
				if($lastInsertId){
					echo "<script>alert('Registrasi berhasil. Sekarang anda bisa login.');</script>";
					echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
				}else {
					echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
					echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";
				}
		}	
}
?>