<?php
include('layout/header.php');
include('layout/navbar.php');
include('layout/sidebar.php');
?>

<!-- Main Content -->
<div class="page-title">
    <div class="title_left">
        <h3>Dashboard</h3>
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
                <h2>Dashboard</h2>
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

            <div class="row text-center mb-1">
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <?php 
                        $sqlbayar = "SELECT id FROM admin";
                        $querybayar = mysqli_query($koneksidb,$sqlbayar);
                        $bayar=mysqli_num_rows($querybayar);
                    ?>
                    <h1 class="card-title"><?php echo htmlentities($bayar);?></h1>
                    <p class="card-text">JUMLAH ADMIN</p>
                    <a href="dataadmin.php" class="btn btn-sm btn-primary">RINCIAN <span class="fa fa-arrow-circle-right"></span></a>
                </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <?php 
                        $sqlkonfir = "SELECT id_pengelola FROM pengelola";
                        $querykonfir = mysqli_query($koneksidb,$sqlkonfir);
                        $konfir=mysqli_num_rows($querykonfir);
                    ?>
                    <h1 class="card-title"><?php echo htmlentities($konfir);?></h1>
                    <p class="card-text">JUMLAH PENGELOLA</p>
                    <a href="datapengelola.php" class="btn btn-sm btn-warning">RINCIAN <span class="fa fa-arrow-circle-right"></span></a>
                </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <?php 
                        $sqlbelum = "SELECT id_user FROM users";
                        $querybelum = mysqli_query($koneksidb,$sqlbelum);
                        $belum=mysqli_num_rows($querybelum);
                    ?>
                    <h1 class="card-title"><?php echo htmlentities($belum);?></h1>
                    <p class="card-text">JUMLAH PELANGGAN</p>
                    <a href="datapelanggan.php" class="btn btn-sm btn-danger">RINCIAN <span class="fa fa-arrow-circle-right"></span></a>
                </div>
                </div>
            </div>
            </div>

            <div class="row text-center mb-1">
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <?php 
                        $sql1 = "SELECT id_merek FROM merek";
                        $query1 = mysqli_query($koneksidb,$sql1);
                        $totalvehicle=mysqli_num_rows($query1);
                    ?>
                    <h1 class="card-title"><?php echo htmlentities($totalvehicle);?></h1>
                    <p class="card-text">JUMLAH MEREK</p>
                    <a href="pengelola_view_merek.php" class="btn btn-sm btn-primary">RINCIAN <span class="fa fa-arrow-circle-right"></span></a>
                </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <?php 
                        $sql2 = "SELECT id_kategori FROM kategori";
                        $query2 = mysqli_query($koneksidb,$sql2);
                        $bookings=mysqli_num_rows($query2);
                    ?>
                    <h1 class="card-title"><?php echo htmlentities($bookings);?></h1>
                    <p class="card-text">TOTAL KATEGORI</p>
                    <a href="pengelola_view_kategori.php" class="btn btn-sm btn-warning">RINCIAN <span class="fa fa-arrow-circle-right"></span></a>
                </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <?php 
                        $sql2 = "SELECT id_cu FROM contactus";
                        $query2 = mysqli_query($koneksidb,$sql2);
                        $contactus=mysqli_num_rows($query2);
                    ?>
                    <h1 class="card-title"><?php echo htmlentities($contactus);?></h1>
                    <p class="card-text">KRITIK DAN SARAN</p>
                    <a href="kritik.php" class="btn btn-sm btn-danger">RINCIAN <span class="fa fa-arrow-circle-right"></span></a>
                </div>
                </div>
            </div>

            </div>

            </div>
        </div>
    </div>
</div>

<!-- End Main Content -->

<?php
include('layout/footer.php');
?>