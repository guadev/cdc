<?php
require_once 'core/init.php';
include_once 'view/header.php';

$login = false;
$pesan = '';
if(isset($_SESSION['user'])) {
  $login = true;
} else {
  header('location:login.php');
}

//validate form
$penulisPost = '';
if(isset($_POST['submit'])) {

  $judulBuku      = $_POST['judulBuku'];
  $penulisBuku    = $_POST['penulisBuku'];
  $tahunTerbit    = $_POST['tahunTerbit'];
  $penerbit       = $_POST['penerbit'];
  $tag            = $_POST['tag'];
  $harga          = $_POST['harga'];
  $deskripsi      = $_POST['deskripsibuku'];
  $alamat         = $_POST['alamat'];
  $penulisPost    = $_SESSION['user'];
  $jenisTransaksi = '';
  if(!empty($_POST['jual']) || !empty($_POST['sewa'])) {
    if(isset($_POST['jual'])) {
      $jenisTransaksi = 'jual';
    } else if($_POST['sewa']){
      $jenisTransaksi = 'sewa';
    }
  }



  if(!empty(trim($judulBuku)) && !empty(trim($penulisBuku)) && !empty(trim($tahunTerbit)) && !empty(trim($penerbit)) && !empty(trim($tag))
      && !empty(trim($harga)) && !empty(trim($deskripsi)) && !empty(trim($alamat)) && !empty(trim($jenisTransaksi))){
    if(postingBuku($judulBuku, $penulisBuku, $tahunTerbit, $penerbit, $tag, $harga, $deskripsi, $alamat, $penulisPost, $jenisTransaksi)) {
      $pesan = '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Postingan anda berhasil dipublish.</div>';
      //header('location:index.php');
    } else {
      $pesan = '<div class="alert alert-danger" role="alert"><strong>Oops!</strong> Ada masalah saat memposting..</div>';
    }
  } else {
    $pesan = '<div class="alert alert-warning" role="alert"><strong>Note: </strong>Semua form harus diisi</div>';
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
                <li><a href="akun.php">Hai, <?php echo $_SESSION['user']; ?></a></li>
                <li><a  href="logout.php"><span class="text-warning">Log out</span></a></li>
            <?php } ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!--end of nav -->

        <!-- category -->
    <section class="first-content upload">
      <div class="container">
        <div class="row">
          <div class="col-md-12 add-space">
            <h2>Posting Buku</h2>
            <p class="secondary-color">Cara mudah meluaskan manfaat. Pinjamkan buku anda kepada orang yang lebih membutuhkan.</p>
          </div>
          <div class="col-md-3 panelkiri ">
            <h4>Foto</h4>
            <div class="thumbnail priority">
              <label for="foto1">Klik untuk upload</label>
              <input type="file" id="foto1" name="fotobuku1" value="">
            </div>
            <div class="col-md-12 no-padding fotobox">
              <div class="col-md-4 space space-left">
                <div class="thumbnail">
                  <label for="foto2">Foto 2</label>
                  <input type="file" id="foto2" name="fotobuku2" value="">
                </div>
              </div>
              <div class="col-md-4 space">
                <div class="thumbnail">
                  <label for="foto1">Foto 3</label>
                  <input type="file" id="foto3" name="fotobuku3" value="">
                </div>
              </div>
              <div class="col-md-4 space space-right">
                <div class="thumbnail">
                  <label for="foto1">Foto 4</label>
                  <input type="file" id="foto3" name="fotobuku4" value="">
                </div>
              </div>
            </div>
            <div class="garisbawah"></div>
            <!-- <h4 class="first-content">Model transaksi</h4>
            <div class="input-group">
                <div class="input-group-addon">
                  <input type="checkbox" name="jual" value="jual">
                </div>
                <p class="form-control">Dijual</p>
            </div>
            <div class="input-group">
                <div class="input-group-addon">
                  <input type="checkbox" name="sewa" value="sewa">
                </div>
                <p class="form-control">Disewakan</p>
            </div> -->
          </div>

          <div class="col-md-9 panelkanan">
            <h4>Informasi Buku</h4>
            <?php echo $pesan; ?>
            <form action="" method="post" autocomplete="on">
              <input class="form-control" type="text" name="judulBuku" value="" placeholder="Judul Buku" required>
              <input class="form-control" type="text" name="penulisBuku" value="" placeholder="Nama Penulis" required>
              <div class="col-md-2 space space-left">
                <input class="form-control" type="text" name="tahunTerbit" value="" placeholder="Tahun Terbit" required>
              </div>
              <div class="col-md-5 space">
                <input class="form-control" type="text" name="penerbit" value="" placeholder="Penerbit" required>
              </div>
              <div class="col-md-4 space">
                <select class="form-control" name="tag" required>
                  <option value="edukasi">Edukasi</option>
                  <option value="bisnis">Bisnis</option>
                  <option value="novel">Novel dan komik</option>
                  <option value="lain">Lainnya</option>
                </select>
              </div>
              <!-- <div class="col-md-5 space space-right">
                <input class="form-control" type="text" name="" value="" placeholder="Tempat terbit" required>
              </div> -->
              <div class="input-group">
                <div class="input-group-addon">
                  <input type="checkbox" name="jual" value="jual">
                </div>
                <p class="form-control">Jual</p>
              </div>
              <div class="input-group">
                <div class="input-group-addon">
                  <input type="checkbox" name="sewa" value="sewa">
                </div>
                <p class="form-control">Sewakan</p>
              </div> <br>
              <input class="form-control" type="number" min="4" name="harga" value="" placeholder="Harga. e.g: 10000" required>
              <label for="deskripsibuku" class="first-content block">Deskripsi</label>
              <textarea name="deskripsibuku" id="deskripsibuku" class="block form-control" placeholder="Deskripsikan apa yang dibahas di dalam buku, sinopsis (jika novel), jumlah halaman dan informasi yang menggambarkan buku tersebut. " required></textarea> <br>
              <input class="form-control" type="text" name="alamat" value="" placeholder="Alamat anda e.g: Lowokwaru, Malang Kota dsb untuk memudahkan transaksi.">
              <!-- <label for="sinposis" class="first-content block">Sinopsis</label>
              <textarea name="sinposis" id="sinposis" class="block form-control"></textarea> -->
              <!-- <button type="submit" name="submit" class="first-content add-space btn btn-primary btn-lg"><i class="fa fa-send-o"></i>&nbsp; Posting</button> -->
              <input type="submit" name="submit" value="Posting" class="first-content add-space btn btn-primary btn-lg">
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
