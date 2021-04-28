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
                <h2>Tambah Mobil</h2>
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
                
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Nama Mobil<span style="color:red"> *</span></label>
                    <div class="col-sm-4">
                        <input type="text" placeholder="Masukkan Nama Mobil" name="vehicletitle" class="form-control" required>
                    </div>
                    <label class="col-sm-2 control-label">Pilih Merek<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="brandname" required="" data-parsley-error-message="Field ini harus diisi" >
                            <option value="">-- Pilih Merek --</option>
                                <?php
                                    $mySql = "SELECT * FROM merek ORDER BY id_merek";
                                    $myQry = mysqli_query($koneksidb, $mySql);
                                    while ($myData = mysqli_fetch_array($myQry)) {
                                        if ($myData['id_merek']== $dataMerek) {
                                        $cek = " selected";
                                        } else { $cek=""; }
                                        echo "<option value='$myData[id_merek]' $cek>$myData[nama_merek] </option>";
                                    }
                                ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Deskripsi Mobil<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <textarea class="form-control" placeholder="Masukkan Deskripsi Mobil" name="vehicalorcview" rows="3" required></textarea>
                    </div>
                    <label class="col-sm-2 control-label">No. Polisi<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" placeholder="Masukkan Nomor Polisi" name="nopol" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Harga /Hari<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <input type="number" placeholder="Masukkan Harga Mobil per Hari" min="0" name="priceperday" class="form-control" required>
                    </div>
                    <label class="col-sm-2 control-label">Jenis Bahan Bakar<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="fueltype" required>
                        <option value="">-- Pilih Jenis Bahan Bakar --</option>
                        <option value="Bensin">Bensin</option>
                        <option value="Diesel">Diesel</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Tahun Registrasi<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <input type="number" placeholder="Masukkan Tahun Registrasi" min="0" name="modelyear" class="form-control" required>
                    </div>
                    <label class="col-sm-2 control-label">Kapasitas Tempat Duduk<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <input type="number" placeholder="Masukkan Kapasitas Tempat Duduk" min="1" name="seatingcapacity" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Pilih Kategori<span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="id_kategori" required="" data-parsley-error-message="Field ini harus diisi" >
                            <option value="">-- Pilih Kategori --</option>
                                <?php
                                    $mySql = "SELECT * FROM kategori ORDER BY id_kategori";
                                    $myQry = mysqli_query($koneksidb, $mySql);
                                    while ($myData = mysqli_fetch_array($myQry)) {
                                        if ($myData['id_kategori']== $dataKategori) {
                                        $cek = " selected";
                                        } else { $cek=""; }
                                        echo "<option value='$myData[id_kategori]' $cek>$myData[kategori] </option>";
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
                        Gambar 1<span style="color:red">*</span><br><input type="file" name="img1" accept="image/*" required>
                    </div>
                    <div class="col-sm-4">
                        Gambar 2<span style="color:red">*</span><br><input type="file" name="img2" accept="image/*" required>
                    </div>
                    <div class="col-sm-4">
                        Gambar 3<span style="color:red">*</span><br><input type="file" name="img3" accept="image/*" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        Gambar 4<span style="color:red">*</span><br><input type="file" name="img4" accept="image/*" required>
                    </div>
                    <div class="col-sm-4">
                        Gambar 5 <br> <input type="file" name="img5" accept="image/*">
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
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="airconditioner" name="airconditioner" value="1">
                            <label for="airconditioner"> Air Conditioner </label>
                        </div>
                    </div>
                
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">
                            <label for="powerdoorlocks"> Power Door Locks </label>
                        </div>
                    </div>
                
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1">
                            <label for="antilockbrakingsys"> AntiLock Braking System </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="brakeassist" name="brakeassist" value="1">
                            <label for="brakeassist"> Brake Assist </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="powersteering" name="powersteering" value="1">
                            <label for="inlineCheckbox5"> Power Steering </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="driverairbag" name="driverairbag" value="1">
                            <label for="driverairbag">Driver Airbag</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="passengerairbag" name="passengerairbag" value="1">
                            <label for="passengerairbag"> Passenger Airbag </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="powerwindow" name="powerwindow" value="1">
                            <label for="powerwindow"> Power Windows </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="cdplayer" name="cdplayer" value="1">
                            <label for="cdplayer"> CD Player </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox h checkbox-inline">
                            <input type="checkbox" id="centrallocking" name="centrallocking" value="1">
                            <label for="centrallocking">Central Locking</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="crashcensor" name="crashcensor" value="1">
                            <label for="crashcensor"> Crash Sensor </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="leatherseats" name="leatherseats" value="1">
                            <label for="leatherseats"> Leather Seats </label>
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