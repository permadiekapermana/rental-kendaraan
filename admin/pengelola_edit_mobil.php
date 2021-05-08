<?php
include('layout/header.php');
include('layout/navbar.php');
include('layout/sidebar.php');
?>

<!-- Main Content -->
<div class="page-title">
    <div class="title_left">
        <h3>Data Mobil</h3>
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
                <h2>Edit Mobil</h2>
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
                <form action="pengelola_addact_mobil.php" method="POST" enctype='multipart/form-data' id='demo-form2' data-parsley-validate class='form-horizontal form-label-left'>

                <?php 
                    $id=intval($_GET['id']);
                    $sql ="SELECT mobil.*,merek.* FROM mobil, merek WHERE mobil.id_merek=merek.id_merek AND mobil.id_mobil='$id'";
                    $query = mysqli_query($koneksidb,$sql);
                    $result = mysqli_fetch_array($query);
                ?>
                
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Nama Mobil<span style="color:red"> *</span></label>
                    <div class="col-sm-4">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" required>
                        <input type="text" placeholder="Masukkan Nama Mobil" name="vehicletitle" class="form-control" value="<?php echo htmlentities($result['nama_mobil']);?>" required>
                    </div>
                    <label class="col-sm-2 control-label">Pilih Merek<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="brandname" required="" data-parsley-error-message="Field ini harus diisi" >
                            <option value=""></option>
                                <?php
                                $mySql = "SELECT * FROM merek ORDER BY nama_merek";
                                $myQry = mysqli_query($koneksidb, $mySql);
                                $dataMerek = $result['id_merek'];
                                while ($merekData = mysqli_fetch_array($myQry)) {
                                    if ($merekData['id_merek']== $dataMerek) {
                                    $cek = " selected";
                                    } else { $cek=""; }
                                    echo "<option value='$merekData[id_merek]' $cek>".strtoupper($merekData[nama_merek])."</option>";
                                }
                                ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Deskripsi Mobil<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <textarea class="form-control" placeholder="Masukkan Deskripsi Mobil" name="vehicalorcview" rows="3" required><?php echo htmlentities($result['deskripsi']);?></textarea>
                    </div>
                    <label class="col-sm-2 control-label">No. Polisi<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" placeholder="Masukkan Nomor Polisi" name="nopol" class="form-control" value="<?php echo htmlentities($result['nopol']);?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Harga /Hari<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <input type="number" placeholder="Masukkan Harga Mobil per Hari" min="0" name="priceperday" class="form-control" value="<?php echo htmlentities($result['harga']);?>" required>
                    </div>
                    <label class="col-sm-2 control-label">Jenis Bahan Bakar<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="fueltype" required>
                            <?php
                                $jk = $result['bb'];
                                echo "<option value='$jk' selected>".$jk."</option>";
                                echo "<option value='Bensin'>Bensin</option>";
                                echo "<option value='Diesel'>Diesel</option>";
                            ?>
						</select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Tahun Registrasi<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <input type="number" placeholder="Masukkan Tahun Registrasi" min="0" name="modelyear" class="form-control" value="<?php echo htmlentities($result['tahun']);?>" required>
                    </div>
                    <label class="col-sm-2 control-label">Kapasitas Tempat Duduk<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <input type="number" placeholder="Masukkan Kapasitas Tempat Duduk" min="1" name="seatingcapacity" class="form-control" value="<?php echo htmlentities($result['seating']);?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Pilih Kategori<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="id_kategori" required="" data-parsley-error-message="Field ini harus diisi" >
                            <option value=""></option>
                                <?php
                                $mySql = "SELECT * FROM kategori ORDER BY id_kategori";
                                $myQry = mysqli_query($koneksidb, $mySql);
                                $dataKategori = $result['id_kategori'];
                                while ($kategoriData = mysqli_fetch_array($myQry)) {
                                    if ($kategoriData['id_kategori']== $dataKategori) {
                                    $cek = " selected";
                                    } else { $cek=""; }
                                    echo "<option value='$kategoriData[id_kategori]' $cek>".strtoupper($kategoriData[kategori])."</option>";
                                }
                                ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <h4><b>Upload Gambar</b></h4>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-4">
                        Gambar 1 <img src="img/vehicleimages/<?php echo htmlentities($result['image1']);?>" width="300" height="200" style="border:solid 1px #000">
                        <a href="pengelola_changeimage1.php?imgid=<?php echo htmlentities($result['id_mobil'])?>" class='btn btn-sm btn-success mt-1'>Ganti Gambar 1</a>
                    </div>
                    <div class="col-sm-4">
                        Gambar 2<img src="img/vehicleimages/<?php echo htmlentities($result['image2']);?>" width="300" height="200" style="border:solid 1px #000">
                        <a href="pengelola_changeimage2.php?imgid=<?php echo htmlentities($result['id_mobil'])?>" class='btn btn-sm btn-success mt-1'>Ganti Gambar 2</a>
                    </div>
                    <div class="col-sm-4">
                        Gambar 3<img src="img/vehicleimages/<?php echo htmlentities($result['image3']);?>" width="300" height="200" style="border:solid 1px #000">
                        <a href="pengelola_changeimage3.php?imgid=<?php echo htmlentities($result['id_mobil'])?>" class='btn btn-sm btn-success mt-1'>Ganti Gambar 3</a>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                        Gambar 4<img src="img/vehicleimages/<?php echo htmlentities($result['image4']);?>" width="300" height="200" style="border:solid 1px #000">
                        <a href="pengelola_changeimage4.php?imgid=<?php echo htmlentities($result['id_mobil'])?>" class='btn btn-sm btn-success mt-1'>Ganti Gambar 4</a>
                    </div>
                    <div class="col-sm-4">
                        Gambar 5
                        <?php if($result['image5']=="")
                        {
                            echo htmlentities("File not available");
                        }else{?>
                            <img src="img/vehicleimages/<?php echo htmlentities($result['image5']);?>" width="300" height="200" style="border:solid 1px #000">
                            <a href="pengelola_changeimage5.php?imgid=<?php echo htmlentities($result['id_mobil'])?>" class='btn btn-sm btn-success mt-1'>Ganti Gambar 5</a>
                        <?php } ?>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <h4><b>Accessories</b></h4>
                    </div>
                </div>                

                <div class="form-group row">
                    <div class="col-sm-3">
                        <?php if($result['AirConditioner']==1)
                        {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="airconditioner" checked value="1">
                                <label for="inlineCheckbox1"> Air Conditioner </label>
                            </div>
                        <?php } else { ?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="airconditioner" value="1">
                                <label for="inlineCheckbox1"> Air Conditioner </label>
                            </div>
                        <?php } ?>
                    </div>
                
                    <div class="col-sm-3">
                        <?php if($result['PowerDoorLocks']==1)
                        {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="powerdoorlocks" checked value="1">
                                <label for="inlineCheckbox2"> Power Door Locks </label>
                            </div>
                        <?php } else {?>
                            <div class="checkbox checkbox-success checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="powerdoorlocks" value="1">
                                <label for="inlineCheckbox2"> Power Door Locks </label>
                            </div>
                        <?php }?>
                    </div>
                
                    <div class="col-sm-3">
                        <?php if($result['AntiLockBrakingSystem']==1)
                        {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="antilockbrakingsys" checked value="1">
                                <label for="inlineCheckbox3"> AntiLock Braking System </label>
                            </div>
                        <?php } else {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="antilockbrakingsys" value="1">
                                <label for="inlineCheckbox3"> AntiLock Braking System </label>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-sm-3">
                        <?php if($result['BrakeAssist']==1)
                        {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="brakeassist" checked value="1">
                                <label for="inlineCheckbox3"> Brake Assist </label>
                            </div>
                        <?php } else {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="brakeassist" value="1">
                                <label  for="inlineCheckbox3"> Brake Assist </label>
                            </div>
                        <?php } ?>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-3">
                        <?php if($result['PowerSteering']==1)
                        {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="powersteering" checked value="1">
                                <label for="inlineCheckbox1"> Power Steering </label>
                            </div>
                        <?php } else {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="powersteering" value="1">
                                <label for="inlineCheckbox1"> Power Steering </label>
                            </div>
                        <?php } ?>
                    </div>
                    
                    <div class="col-sm-3">
                        <?php if($result['DriverAirbag']==1)
                        {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="driverairbag" checked value="1">
                                <label for="inlineCheckbox2">Driver Airbag</label>
                            </div>
                        <?php } else { ?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="driverairbag" value="1">
                                <label for="inlineCheckbox2">Driver Airbag</label>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-sm-3">
                        <?php if($result['DriverAirbag']==1)
                        {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="passengerairbag" checked value="1">
                                <label for="inlineCheckbox3"> Passenger Airbag </label>
                            </div>
                        <?php } else { ?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="passengerairbag" value="1">
                                <label for="inlineCheckbox3"> Passenger Airbag </label>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-sm-3">
                        <?php if($result['PowerWindows']==1)
                        {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="powerwindow" checked value="1">
                                <label for="inlineCheckbox3"> Power Windows </label>
                            </div>
                        <?php } else { ?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="powerwindow" value="1">
                                <label for="inlineCheckbox3"> Power Windows </label>
                            </div>
                        <?php } ?>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-3">
                        <?php if($result['CDPlayer']==1)
                        {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="cdplayer" checked value="1">
                                <label for="inlineCheckbox1"> CD Player </label>
                            </div>
                        <?php } else {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="cdplayer" value="1">
                                <label for="inlineCheckbox1"> CD Player </label>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-sm-3">
                        <?php if($result['CentralLocking']==1)
                        {?>
                            <div class="checkbox  checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="centrallocking" checked value="1">
                                <label for="inlineCheckbox2">Central Locking</label>
                            </div>
                        <?php } else { ?>
                            <div class="checkbox checkbox-success checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="centrallocking" value="1">
                                <label for="inlineCheckbox2">Central Locking</label>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-sm-3">
                        <?php if($result['CrashSensor']==1)
                        {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="crashcensor" checked value="1">
                                <label for="inlineCheckbox3"> Crash Sensor </label>
                            </div>
                        <?php } else {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="crashcensor" value="1">
                                <label for="inlineCheckbox3"> Crash Sensor </label>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-sm-3">
                        <?php if($result['LeatherSeats']==1)
                        {?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="leatherseats" checked value="1">
                                <label for="inlineCheckbox3"> Leather Seats </label>
                            </div>
                        <?php } else { ?>
                            <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="leatherseats" value="1">
                                <label for="inlineCheckbox3"> Leather Seats </label>
                            </div>
                        <?php } ?>
                        </div>
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