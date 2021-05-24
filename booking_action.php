<?php

session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');

// $mobilenumber=$_POST['mobilenumber'];
// $fullname=$_POST['fullname'];
// $arr=json_encode(array(
// 	"phone"=>"$mobilenumber",
// 	"body"=>"terimakasih Tuan $fullname",
	
// ));
// $url="https://api.chat-api.com/instance237323/message?token=iyweuftjamxe823j";
// $ch=curl_init();
// curl_setopt($ch,CURLOPT_URL,$url);
// curl_setopt($ch,CURLOPT_POST,true);
// curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
// curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
// curl_setopt($ch,CURLOPT_HTTPHEADER,array(
// 	'Content-type:application/json',
// 	'Content-length:'.strlen($arr)
// ));
// $result=curl_exec($ch);
// curl_close($ch);
// echo $result;


	
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$durasi=$_POST['durasi'];
$pickup=$_POST['pickup'];
$vid=$_POST['vid'];
$email=$_POST['email'];
$biayadriver=$_POST['biayadriver'];
// $kode = buatKode("booking", "TRX");

$pel="TRX";
$y=substr($pel,0,3);
$sql="select * from booking where substr(kode_booking,1,3)='$y' order by kode_booking desc limit 0,1";
$query=mysqli_query($koneksidb,$sql);
$row=mysqli_num_rows($query);
$data=mysqli_fetch_array($query);
if ($row>0){
$no=substr($data['kode_booking'],-5)+1;}
else{
$no=1;
}
$nourut=100000+$no;
$kode=$pel.substr($nourut,-5);

$status = "Menunggu Pembayaran";
$bukti = "";
$cek=0;
$tgl=date('Y-m-d');


//insert
$sql 	= "INSERT INTO booking (kode_booking,id_mobil,tgl_mulai,tgl_selesai,durasi,driver,status,email,pickup,tgl_booking)
			VALUES('$kode','$vid','$fromdate','$todate','$durasi','$biayadriver','$status','$email','$pickup','$tgl')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	for($cek;$cek<$durasi;$cek++){
		$tglmulai = strtotime($fromdate);
		$jmlhari  = 86400*$cek;
		$tgl	  = $tglmulai+$jmlhari;
		$tglhasil = date("Y-m-d",$tgl);
		$sql1	="INSERT INTO cek_booking (kode_booking,id_mobil,tgl_booking,status)VALUES('$kode','$vid','$tglhasil','$status')";
		$query1 = mysqli_query($koneksidb,$sql1);
	}
	echo " <script> alert ('Mobil berhasil disewa.'); </script> ";
	echo "<script type='text/javascript'> document.location = 'booking_detail.php?kode=$kode'; </script>";
	}else{
		echo " <script> alert ('Ooops, terjadi kesalahan. Silahkan coba lagi.'); </script> ";
    }
    
?>