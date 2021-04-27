            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="production/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
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
                <h2><?=$nama?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />