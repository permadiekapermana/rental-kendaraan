            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <?php
                  if($_SESSION['role']=='admin'){
                  ?>
                  <li><a href="?module=dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a><i class="fa fa-users"></i> Data User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Data Admin</a></li>
                      <li><a href="index2.html">Data Pengelola</a></li>
                    </ul>
                  </li>
                  <li><a href="admin_view_merek.php"><i class="fa fa-car"></i> Data Merek</a></li>
                  <li><a href="admin_view_kategori.php"><i class="fa fa-gear"></i> Data Kategori</a></li>
                  <li><a><i class="fa fa-money"></i> Data Sewa Mobil <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Menunggu Pembayaran</a></li>
                      <li><a href="index2.html">Menunggu Konfirmasi</a></li>
                      <li><a href="index3.html">Pengembalian</a></li>
                      <li><a href="index3.html">Data Sewa</a></li>
                    </ul>
                  </li>                  
                  <li><a><i class="fa fa-gear"></i> Content Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Kritik dan Saran Pelanggan</a></li>
                      <li><a href="index2.html">Kelola Halaman</a></li>
                      <li><a href="index3.html">Info Kontak</a></li>
                    </ul>
                  </li>
                  <li><a href="?module=dashboard"><i class="fa fa-file"></i> Laporan</a></li>
                  <?php
                  } elseif($_SESSION['role']=='pengelola'){
                  ?>
                  <li><a href="?module=dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a href="pengelola_view_mobil.php"><i class="fa fa-car"></i> Data Mobil</a></li>
                  <li><a><i class="fa fa-money"></i> Data Sewa Mobil <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Menunggu Pembayaran</a></li>
                      <li><a href="index2.html">Menunggu Konfirmasi</a></li>
                      <li><a href="index3.html">Pengembalian</a></li>
                      <li><a href="index3.html">Data Sewa</a></li>
                    </ul>
                  </li>
                  <li><a href="pengelola_biaya_driver.php"><i class="fa fa-money"></i> Biaya Driver</a></li>
                  <li><a href="?module=dashboard"><i class="fa fa-file"></i> Laporan</a></li>
                  <?php
                  }
                  ?>                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <?php
                      if($_SESSION['role']=='admin'){
                        $sql = "SELECT * FROM admin WHERE id='$_SESSION[id_admin]'";
                        $query = mysqli_query($koneksidb,$sql);
                        $results = mysqli_fetch_array($query);
                        $nama = $results['UserName'];
                      } elseif($_SESSION['role']=='pengelola'){
                        $sql = "SELECT * FROM pengelola WHERE id_pengelola='$_SESSION[id_pengelola]'";
                        $query = mysqli_query($koneksidb,$sql);
                        $results = mysqli_fetch_array($query);
                        $nama = $results['nama'];
                      }
                      ?>
                      <img src="production/images/img.jpg" alt=""> <?=$nama?>                      
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span>Ubah Password</span>
                        </a>
                      <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                  <!-- <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li> -->
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Log Out</h5>
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Apakah anda yakin ingin Log Out ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="logout.php"><button type="button" class="btn btn-primary">Log Out</button></a>
              </div>
            </div>
          </div>
        </div>
        <!-- /Modal Logout -->

        <!-- page content -->
        <div class="right_col" role="main">
                <div class="">