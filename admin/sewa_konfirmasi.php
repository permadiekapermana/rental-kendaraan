<?php
include('layout/header.php');
include('layout/navbar.php');
include('layout/sidebar.php');
?>

<!-- Main Content -->
<div class="page-title">
    <div class="title_left">
        <h3>Sewa Menunggu Konfirmasi</h3>
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
                <h2>Daftar Sewa Menunggu Konfirmasi</h2>
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

            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Sewa</th>
                    <th>Mobil</th>
                    <th>Tgl. Mulai</th>
                    <th>Tgl. Selesai</th>
                    <th>Total</th>
                    <th>Penyewa</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>


                <tbody>
                <?php
                    $i=0;
                    $sqlsewa = "SELECT booking.*,mobil.*,merek.*,users.* FROM booking,mobil,merek,users WHERE booking.id_mobil=mobil.id_mobil AND merek.id_merek=mobil.id_merek AND users.email=booking.email AND status='Menunggu Konfirmasi' ORDER BY booking.kode_booking DESC";
                    $querysewa = mysqli_query($koneksidb,$sqlsewa);
                    while ($result = mysqli_fetch_array($querysewa)) {
                    $biayamobil=$result['durasi']*$result['harga'];
                    $total=$result['driver']+$biayamobil;
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo htmlentities($result['kode_booking']);?></td>
                    <td><?php echo htmlentities($result['nama_mobil']);?></td>
                    <td><?php echo IndonesiaTgl(htmlentities($result['tgl_mulai']));?></td>
                    <td><?php echo IndonesiaTgl(htmlentities($result['tgl_selesai']));?></td>
                    <td><?php echo format_rupiah(htmlentities($total));?></td>
                    <td><a href="#myModal" data-toggle="modal" data-load-id="<?php echo $result['email']; ?>" data-remote-target="#myModal .modal-body"><?php echo $result['nama_user']; ?></a></td>
                    <td><?php echo htmlentities($result['status']);?></td>
                    <td>
                    <a href="#myModal" data-toggle="modal" data-load-code="<?php echo $result['kode_booking']; ?>" data-remote-target="#myModal .modal-body"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;&nbsp;
                    <a href="sewaedit.php?id=<?php echo $result['kode_booking'];?>"><i class="fa fa-edit"></i></a></td>
                </tr>
                <?php }?>
                </tbody>
            </table>

            <!-- Large modal -->
            <div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Masih dalam proses development</p>
                        </div>
                    </div>
                </div>
            </div>    
            <!-- Large modal --> 

            </div>
        </div>
    </div>
</div>

<!-- End Main Content -->

<?php
include('layout/footer.php');
?>