<?php
include('layout/header.php');
include('layout/navbar.php');
include('layout/sidebar.php');
?>

<!-- Main Content -->
<div class="page-title">
    <div class="title_left">
        <h3>Laporan</h3>
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
                <h2>Laporan</h2>
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
            <form method="get" name="laporan" onSubmit="return valid();"> 
                <div class="form-group">
                    <div class="col-sm-4">
                        <label>Tanggal Awal</label>
                        <input type="date" class="form-control" name="awal" placeholder="From Date(dd/mm/yyyy)" required>
                    </div>
                    <div class="col-sm-4">
                        <label>Tanggal Akhir</label>
                        <input type="date" class="form-control" name="akhir" placeholder="To Date(dd/mm/yyyy)" required>
                    </div>
                    <div class="col-sm-4">
                        <label>&nbsp;</label><br/>
                        <input type="submit" name="submit" value="Lihat Laporan" class="btn btn-primary">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<?php
							if(isset($_GET['submit'])){
								$no=0;
								$mulai 	 = $_GET['awal'];
								$selesai = $_GET['akhir'];
								$stt	 = "Sudah Dibayar";
								$sqlsewa = "SELECT booking.*,mobil.*,merek.*,users.* FROM booking,mobil,merek,users WHERE booking.id_mobil=mobil.id_mobil
											AND merek.id_merek=mobil.id_merek AND users.email=booking.email AND booking.status='$stt' 
											AND booking.tgl_booking BETWEEN '$mulai' AND '$selesai'";
								$querysewa = mysqli_query($koneksidb,$sqlsewa);
							?>
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Laporan Sewa Tanggal <?php echo IndonesiaTgl($mulai);?> sampai <?php echo IndonesiaTgl($selesai);?></div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode Sewa</th>
											<th>Tanggal Sewa</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
									<?php
										while ($result = mysqli_fetch_array($querysewa)) {
												$biayamobil=$result['durasi']*$result['harga'];
												$total=$result['driver']+$biayamobil;
										$no++;
									?>	
										<tr>
											<td><?php echo $no;?></td>
											<td><?php echo htmlentities($result['kode_booking']);?></td>
											<td><?php echo IndonesiaTgl(htmlentities($result['tgl_booking']));?></td>
											<td><?php echo format_rupiah($total);?></td>
										</tr>
							<?php } 
							?>
										
									</tbody>
								</table>
								
							</div>
						</div>
							<div class="form-group">
									<a href="laporan_cetak.php?awal=<?php echo $mulai;?>&akhir=<?php echo $selesai;?>" target="_blank" class="btn btn-primary">Cetak</a>
							</div>
						<?php }?>

<!-- End Main Content -->

<?php
include('layout/footer.php');
?>