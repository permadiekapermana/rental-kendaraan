<?php
include('layout/header.php');
include('layout/navbar.php');
include('layout/sidebar.php');

if(isset($_POST['submit'])){
$status = $_POST['status'];
$kode = $_POST['id'];
$mySql	= "UPDATE booking SET status = '$status' WHERE kode_booking='$kode'";
$myQry	= mysqli_query($koneksidb, $mySql);
$mySql1	= "UPDATE cek_booking SET status = '$status' WHERE kode_booking='$kode'";
$myQry1	= mysqli_query($koneksidb, $mySql1);
echo "<script type='text/javascript'>
        alert('Status berhasil diupdate.'); 
        document.location = 'sewa_konfirmasi.php'; 
    </script>";
}

?>

<!-- Main Content -->
<div class="page-title">
    <div class="title_left">
        <h3>Edit Status Sewa</h3>
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
                <h2>Info Penyewa</h2>
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

                <!-- Form Edit -->
                <form name="theform" method="POST" enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left'>
                <?php
                    $id=$_GET['id'];
                    $sqlsewa = "SELECT booking.*,mobil.*,merek.*,users.* FROM booking,mobil,merek,users WHERE booking.id_mobil=mobil.id_mobil
                                AND merek.id_merek=mobil.id_merek AND users.email=booking.email AND booking.kode_booking ='$id'";
                    $querysewa = mysqli_query($koneksidb,$sqlsewa);
                    $result = mysqli_fetch_array($querysewa);
                    $biayamobil=$result['durasi']*$result['harga'];
                    $total = $result['driver']+$biayamobil;
                ?>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Kode Sewa</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" name="id" id="id" value="<?php echo $id;?>" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Status<span style="color:red"> *</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="status" required>
                                <?php
                                    $stt = $result['status'];
                                    echo "<option value='$stt' selected>".strtoupper($stt)."</option>";
                                    echo "<option value='Menunggu Pembayaran'>".strtoupper("Menunggu Pembayaran")."</option>";
                                    echo "<option value='Sudah Dibayar'>".strtoupper("Sudah Dibayar")."</option>";
                                    echo "<option value='Cancel'>".strtoupper("Cancel")."</option>";
                                ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Penyewa</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" name="penyewa" id="penyewa" value="<?php echo $result['nama_user'];?>" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Telepon</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" name="telp" id="telp" value="<?php echo $result['telp'];?>" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Telepon</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $result['alamat'];?>" required readonly>
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
                    <button type='submit' name="submit" class='btn btn-sm btn-success'>Submit</button>
                    </div>
                </div> 
                </form>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Detail Sewa</h2>
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

                <!-- Form Edit -->
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Mobil</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" name="nama_mobil" id="nama_mobil" value="<?php echo $result['nama_mobil'];?>" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Biaya Driver</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" name="driver" id="driver" value="<?php echo format_rupiah($result['driver']);?>" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Mulai</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" name="tgl_mulai" id="tgl_mulai" value="<?php echo IndonesiaTgl($result['tgl_mulai']);?>" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Biaya Mobil</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" name="biayamobil" id="biayamobil" value="<?php echo format_rupiah($biayamobil);?>" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Selesai</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" name="tgl_selesai" id="tgl_selesai" value="<?php echo IndonesiaTgl($result['tgl_selesai']);?>" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Total Biaya</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" name="total" id="total" value="<?php echo format_rupiah($total);?>" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Durasi</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" name="durasi" id="durasi" value="<?php echo $result['durasi'];?>" required readonly>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Date Mask</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
</div>

<!-- End Main Content -->

<?php
include('layout/footer.php');
?>