<?php
include('layout/header.php');
include('layout/navbar.php');
include('layout/sidebar.php');

if(isset($_POST['submit'])){
	$driver=$_POST['driver'];
	$sql="update tblpages set detail='$driver' WHERE id='0'";
	$query = mysqli_query($koneksidb,$sql);
	$msg="Info Berhasil diupdate";
}

?>

<!-- Main Content -->
<div class="page-title">
    <div class="title_left">
        <h3>Data Biaya Driver</h3>
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
                <h2>Update Biaya Driver</h2>
                <!-- <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul> -->
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

            <form id="demo-form2" method="POST" name="chngpwd" onSubmit="return valid();" data-parsley-validate class="form-horizontal form-label-left">
            <!-- <?php if(1+1==2){?>
                <div class="alert alert-danger alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>ERROR!</strong> <?php echo htmlentities(1+1==2); ?>
                </div>
            <?php } 
            else if($msg){?>
                <div class="alert alert-success alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>SUCCESS!</strong> <?php echo htmlentities($msg); ?>
                </div>
            <?php }?> -->
            <?php 
            $sql = "SELECT * from tblpages where id='0'";
            $query = mysqli_query($koneksidb,$sql);
            while($result=mysqli_fetch_array($query))
            {?>	
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="driver">Biaya Driver / Hari <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="driver" value="<?php echo htmlentities($result['detail']);?>" name="driver" required="required" class="form-control ">
                </div>
            </div>
            <?php } ?>
            
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button class="btn btn-primary" type="button">Cancel</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" name="submit" class="btn btn-success">Update</button>
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