<?php
include('layout/header.php');
include('layout/navbar.php');
include('layout/sidebar.php');
?>

<!-- Main Content -->
<div class="page-title">
    <div class="title_left">
        <h3>Data Kategori</h3>
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
                <h2>Data Kategori</h2>
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

            <a href="admin_add_kategori.php" class="btn btn-sm btn-primary">Tambah</a>

            <br>
            
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Telp</th>
                                            <th>Pesan</th>
                                            <th>Tgl. Posting</th>
                                            
                </tr>
                </thead>


                <tbody>
                <?php 
                    $nomor = 0;
                    $sqlcontactus = "SELECT * FROM contactus";
                    $querycontactus = mysqli_query($koneksidb,$sqlcontactus);
                    while ($result = mysqli_fetch_array($querycontactus)) {
                    $nomor++;
                ?>
                <tr>
                    <td><?php echo htmlentities($nomor);?></td>
                    <td><?php echo htmlentities($result['nama_visit']);?></td>
                                            <td><?php echo htmlentities($result['email_visit']);?></td>
                                            <td><?php echo htmlentities($result['telp_visit']);?></td>
                                            <td><?php echo htmlentities($result['pesan']);?></td>
                                            <td><?php echo htmlentities($result['tgl_posting']);?></td>
                                          
                                        
                </tr>
                <?php }?>
                </tbody>
            </table>

            </div>
        </div>
    </div>
</div>

<!-- End Main Content -->

<?php
include('layout/footer.php');
?>