<?php
error_reporting(0);
include('layout/header.php');
include('layout/navbar.php');
include('layout/sidebar.php');

if(isset($_POST['update'])){
	$image4=$_FILES["img4"]["name"];
	$id=$_POST['id'];
	move_uploaded_file($_FILES["img4"]["tmp_name"],"img/vehicleimages/".$_FILES["img4"]["name"]);
	$sql="update mobil set image4='$image4' where id_mobil='$id'";
	$query	= mysqli_query($koneksidb, $sql);
	echo "<script type='text/javascript'>
			alert('Berhasil ganti gambar.');
			document.location = 'pengelola_edit_mobil.php?id=$id'; 
    	</script>";
    // var_dump($image4);
}

?>

<!-- Main Content -->
<div class="page-title">
    <div class="title_left">
        <h3>Ubah Gambar Mobil</h3>
    </div>

    <!-- <div class="title_right">
        <div class="col-md-5 col-sm-5 form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
            </div>
        </div>
    </div> -->
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Ubah Gambar Mobil 4</h2>
                <!-- <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 4</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul> -->
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

            <form enctype="multipart/form-data" id="demo-form2" method="POST" data-parsley-validate class="form-horizontal form-label-left">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="driver">Gambar 4 Sekarang <span class="required">*</span>
                </label>

                <?php 
                    $id=intval($_GET['imgid']);
                    $sql ="SELECT image4 from mobil where id_mobil='$id'";
                    $query	= mysqli_query($koneksidb, $sql);
                    $cnt=4;
                    while ($result = mysqli_fetch_array($query)){
                    ?>
                    <div class="col-sm-8">
                        <img src="img/vehicleimages/<?php echo htmlentities($result['image4']);?>" width="300" height="200" style="border:solid 4px #000">
                    </div>
                <?php }?>

            </div>

            

            <div class="item form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>"required>
            <label class="col-form-label col-md-3 col-sm-3 label-align">Upload Gambar 4 Baru<span style="color:red">*</span></label>
                <div class="col-sm-8">
                    <input type="file" name="img4" accept="image/*" required>
                </div>
            </div>
            
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" name="update" class="btn btn-success">Update</button>
                </div>
            </div>
            </form>

            </div>
        </div>
    </div>
</div>

<!-- End Main Content -->

<?php
include('layout/footer.php');
?>