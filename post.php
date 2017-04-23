<?php
require_once 'core/init.php';
include_once 'view/header.php';

$login = false;
if(isset($_SESSION['user'])) {
  $login = true;
}

$allPost = showAllPost();

$url          = $_GET['show'];
$readData     = showPostByUrl($url);
$trackView    = viewsCounter($url);

if(isset($_GET['show'])) {
  $readData = showPostByUrl($url);
  while($row = mysqli_fetch_assoc($readData)) {
    $judulBuku      = $row['judul_buku'];
    $penulisPost    = $row['penulis_post'];
    $penulisBuku    = $row['penulis_buku'];
    $penerbit       = $row['penerbit'];
    $harga          = $row['harga'];
    $alamat         = $row['alamat'];
    $tanggalPost    = $row['tanggal_post'];
    $tag            = $row['tag'];
    $deskripsi      = $row['deskripsi_buku'];
    $views          = $row['views'];
  }
}

?>
    <!-- nav -->
    <nav id="top-bar" class="navbar navbar-default navbar-fixed-top" data-nav-status="toggle">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">GEDEBUK</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="menu">
          <ul class="nav navbar-nav navbar-right">
            <?php
              if($login) { ?>
                <li><a href="akun.php">Dashboard</a></li>
                <li><a  href="logout.php"><span class="text-warning">Log out</span></a></li>
            <?php } else { ?>
                <li><a href="login.php">Log in</a></li>
                <li><a  href="register.php"><span class="text-warning">Register</span></a></li>
            <?php } ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <br>
    <!--end of nav -->

    <section class="first-content upload">
      <div class="container">
        <div class="row">
          <div class="col-md-3 panelkiri ">
            <div class="photo-wrapper">
              <img src="../assets/bg.jpeg" class="img-responsive img-thumbnail" alt="">
            </div>
            <table class="table table-bordered">
              <tr>
                <td>Judul Buku</td>
                <td><?php echo $judulBuku; ?></td>
              </tr>
              <tr>
                <td>Penulis</td>
                <td><?php echo $penulisBuku; ?></td>
              </tr>
              <tr>
                <td>Penerbit</td>
                <td><?php echo $penerbit; ?></td>
              </tr>
              <tr>
                <td>Harga</td>
                <td>Rp. <?php echo number_format($harga,'0',',','.'); ?>,-</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><?php echo $alamat; ?></td>
              </tr>
            </table>
          </div>

          <div class="col-md-9 panelkanan">
            <h3><?php echo $judulBuku; ?></h3>
            <div class="alert alert-info" role="alert"><strong style="color:#31708f;">Tersedia!</strong> Buku tidak sedang dipinjam.</div>
            <small><i class="fa fa-pencil-square-o"></i> Diposting oleh: <?php echo $penulisPost; ?></small><br>
            <small>Tanggal: <?php echo $tanggalPost; ?></small><br>
            <small>Kategori: <?php echo $tag; ?></small><br>
            <small>Dilihat: <?php echo $views; ?> kali</small>
            <h4>Deskripsi</h4>
            <legend>
              <p>
                <?php echo $deskripsi; ?>
              </p>
            </legend>
              <form action="" method="post">
                <input type="submit" name="hitBeli" value="Beli" class="first-content add-space btn btn-primary btn-lg">
                <input type="submit" name="hitSewa" value="Sewa" class="first-content add-space btn btn-primary btn-lg">
              </form>
          </div>
        </div>
      </div>
    </section>

    <footer>
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
                <a class="block" href="#"><h4>Copyright Gedebuk &copy; 2017</h4></a>
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
            <abbr title="developed by GUAdev"><img src="../GUAdev.jpg" class="pull-right guadev img-circle" alt="GUAdev"></abbr>
          </div>
        </div>
      </section>
    </footer>

    <script src="../js/jquery.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
