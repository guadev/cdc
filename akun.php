<?php
require_once 'core/init.php';
require_once 'view/header.php';
require_once 'view/navbar_fix.php';

if(!isset($_SESSION['user'])) {
  header('location:login');
}
$profile = $_SESSION['user'];
$readData = akun($profile);
$akunPost = showAkunPost($profile);

while($row = mysqli_fetch_assoc($readData)) {
  $nama     = $row['nama'];
  $jenis_id = $row['jenis_id'];
  $no_id    = $row['no_id'];
  $alamat   = $row['alamat'];
  $hp       = $row['hp'];
}
?>

    <section class="sec">
      <div class="container">
        <div class="row">
          <br><br><br>
          <div class="col-md-3">
            <div class="photo-wrapper">
              <img src="../assets/bg.jpeg" class="img-responsive img-thumbnail" alt="">
            </div>
          </div>
          <div class="col-md-8">
            <div class="featured no-margin no-padding">
              <h2><?php echo $nama; ?></h2>
              <!-- <small><i class="fa fa-star"></i> Premium User</small><br> -->
              <small>Kartu Identitas: <?php echo $jenis_id; ?>, No Identitas: <?php echo $no_id; ?></small><br>
              <small>Alamat: <?php echo $alamat; ?></small><br>
              <small>Contact: <?php echo $hp; ?></small><br>
              <p>Bergabung sejak 2 Juli 2018</p>
              <ul class="nav nav-pills">
                <li role="presentation" class="active"><a href="#" class="garisbawah">Koleksi Buku</a></li>
                <li role="presentation" ><a href="#" class="garisbawah">Pengaturan akun</a></li>
              </ul>

              <?php while($row2 = mysqli_fetch_array($akunPost)) { ?>
              <div class="media ">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="../assets/coverbuku.jpg" alt="Judul Buku">
                  </a>
                </div>
                <div class="media-body garisbawah">
                  <a href="post?show=<?php echo $row2['url']; ?>"><h4 class="media-heading"><?php echo $row2['judul']; ?></h4></a>
                  <small><?php echo $row2['pengarang']; ?></small>
                  <p><?php echo excerpt($row2['deskripsi'], 250); ?></p>
                  <div class="navbody">
                    <!-- <div class="col-md-6">
                      <a href="#"><button type="button" class="btn btn-primary" name="button">Sewa</button></a>
                      <a href="#"><button type="button" class="btn btn-danger" name="button">Beli</button></a>
                    </div> -->
                  </div>
                </div>
              </div>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <section class="darklight">
        <div class="container">
          <div class="row">
            <div class="col-md-12"><h4 class="text-center text-muted">Mengapa Gedebuk.com ?</h4></div>
              <div class="col-md-3 text-center">
                <div class="fade-up">
                <div class="spec center-block wow animated pulse">
                  <h1 class="inline"><i class="fa fa-pencil fa-fw"></i></h1>
                </div>
                <h2>User Interface Ramah</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nulla.</p>
              </div>
            </div>
              <div class="col-md-3 text-center">
                <div class="fade-up">
                <div class="spec center-block wow animated pulse delay-2s">
                  <h1 class="inline"><i class="fa fa-pencil fa-fw"></i></h1>
                </div>
                <h2>Tingkat akurasi maksimal</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nulla.</p>
              </div>
            </div>
              <div class="col-md-3 text-center">
                <div class="fade-up">
                <div class="spec center-block wow animated pulse delay-4s">
                  <h1 class="inline"><i class="fa fa-pencil fa-fw"></i></h1>
                </div>
                <h2>Lebih mudah</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nulla.</p>
              </div>
            </div>
              <div class="col-md-3 text-center">
                <div class="fade-up">
                <div class="spec center-block wow animated pulse delay-6s">
                  <h1 class="inline"><i class="fa fa-pencil fa-fw"></i></h1>
                </div>
                <h2>Saling menguntungkan</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nulla.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="dark">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <a href="#">
                <div class="block help text-center">Hubungi kami</div>
              </a>
              <a href="#">
                <div class="block help text-center">Tips belanja aman</div>
              </a>
              <a href="#">
                <div class="block help text-center">Tips measas</div>
              </a>
            </div>
            <div class="col-md-6 about">
              <div class="col-md-12">
                <a class="block" href="#"><h4>Gedebuk.com</h4></a>
                <div class="col-md-4 no-padding">
                  <a href="">About Us</a>
                </div>
                <div class="col-md-8 no-padding">
                  <a href="">FAQ</a>
                </div>
                <div class="col-md-4 no-padding">
                  <a href="">About Us</a>
                </div>
                <div class="col-md-8 no-padding">
                  <a href="">FAQ</a>
                </div>
              </div>
          </div>
          <div class="col-md-3" id="logo">
            <abbr title="developed by GUAdev"><img src="GUAdev.jpg" class="pull-right guadev img-circle" alt="GUAdev"></abbr>
          </div>
        </div>
      </section>
    </footer>

    <script src="..js/jquery.js"></script>
    <script src="..js/parallax.min.js"></script>
    <script src="..js/wow.min.js"></script>
    <script src="..js/main.js"></script>
    <script src="..js/bootstrap.min.js"></script>
  </body>
</html>
