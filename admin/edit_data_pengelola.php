<?php
include('layout/header.php');
include('layout/navbar.php');
include('layout/sidebar.php');
?>

<!-- Main Content -->
<div class="page-title">
    <div class="title_left">
        <h3> Data Pengelola</h3>
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
                <h2>Edit Pengelola</h2>
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
                <!-- Form Add -->
                <form action="editacct_pengelola.php" method="POST" enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left'>
                <?php
                    $id=$_GET['id'];
                    $sql ="SELECT * FROM pengelola WHERE id_pengelola='$id'";
                    $query = mysqli_query($koneksidb,$sql);
                    $result = mysqli_fetch_array($query);
                ?>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="text" class="form-control" value="<?php echo htmlentities($result['nama']);?>" name="nama" required>
                    </div>
                </div>

                    <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">E-Mail</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="text" class="form-control" value="<?php echo htmlentities($result['email']);?>" name="email" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Password</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="Password" class="form-control" value="<?php echo htmlentities($result['password']);?>" name="Pass" required>
                    </div>
                </div>

                    <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">No Telephone</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="text" class="form-control" value="<?php echo htmlentities($result['telp']);?>" name="telp" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Alamat</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="text" class="form-control" value="<?php echo htmlentities($result['alamat']);?>" name="alamat" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Norek</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="text" class="form-control" value="<?php echo htmlentities($result['norek']);?>" name="norek" required>
                    </div> 
</div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Bank</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="text" class="form-control" value="<?php echo htmlentities($result['bank']);?>" name="bank" required>
                    </div>
                </div>

                    <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Atas Nama</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="text" class="form-control" value="<?php echo htmlentities($result['atas_nama']);?>" name="atas_nama" required>
               <input type="hidden" class="form-control" value="<?php echo htmlentities($id);?>" name="id" id="id" required>
                    </div>
                </div>

                
          
                 
                   
                
                <!-- <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Date Mask</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                </div> -->
                <div class='ln_solid'></div>
                <div class='form-group'>
                    <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
                    <button class='btn btn-sm btn-primary' type='button' onclick=self.history.back()>Cancel</button>
                    <button class='btn btn-sm btn-primary' type='reset'>Reset</button>
                    <button type='submit' class='btn btn-sm btn-success'>Submit</button>
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