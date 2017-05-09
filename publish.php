<?php
require_once 'core/init.php';
require_once 'view/header.php';

$login = false;
$pesan = '';
if(isset($_SESSION['user'])) {
  $login = true;
} else {
  header('location:login');
}

//validate form
$penulisPost = '';
$no_id = '';

//fixed dynamic value
$tglPost            = date('j-m-Y');
$sessionUser        = $_SESSION['user'];

//get nama penulis post
$query              = "SELECT nama FROM user WHERE user_name = '$sessionUser'";
$getNamaPenulisPost = mysqli_query($link, $query);
while($row1 = mysqli_fetch_assoc($getNamaPenulisPost)) {
  $penulisPost = $row1['nama'];
}

//get no_id penulis post (identitas)
$query              = "SELECT no_id FROM user WHERE nama = '$penulisPost'";
$getNoIdPenulisPost = mysqli_query($link, $query);
while($row = mysqli_fetch_assoc($getNoIdPenulisPost)) {
  $no_id = $row['no_id'];
}

//set default value
$hargaBeli = 0;
$hargaSewa = 0;
if(isset($_POST['submit'])) {
  $judul          = $_POST['judul'];
  $penulisBuku    = $_POST['pengarang'];
  $tahunTerbit    = $_POST['tahun_terbit'];
  $stock          = $_POST['stock'];
  $tag            = $_POST['tag'];
  $hargaSewa      = $_POST['harga_sewa'];
  $hargaBeli      = $_POST['harga_beli'];
  $deskripsi      = $_POST['deskripsi'];
  $cod            = $_POST['cod'];

  if(!empty(trim($judul)) && !empty(trim($penulisBuku)) && !empty(trim($tahunTerbit)) && !empty($stock) && !empty(trim($tag))
      && !empty(trim($hargaSewa)) && !empty(trim($hargaBeli)) && !empty(trim($deskripsi)) && !empty(trim($cod)) && !empty(trim($tglPost))){
    if(publishBuku($judul, $penulisBuku, $tahunTerbit, $stock, $tag, $hargaSewa, $hargaBeli, $deskripsi, $cod, $penulisPost, $tglPost, $no_id)) {
      $pesan = '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Postingan anda berhasil dipublish. <a href="akun"><strong>KLIK</strong></a> untuk melihat.</div>';
      //header('location:index.php');
    } else {
      $pesan = '<div class="alert alert-danger" role="alert"><strong>Oops!</strong> Mohon maaf ada masalah dengan sistem kami.</div>';
    }
  } else {
    $pesan = '<div class="alert alert-warning" role="alert"><strong>Catatan: </strong>Semua form harus diisi</div>';
  }
}
function isSubmit() {
  if (isset($_POST['submit'])) {
    return true;
  }
  return false;
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
          </div>

          <div class="col-md-9 panelkanan">
            <h4>Informasi Buku</h4>
            <?php echo $pesan; ?>
            <form action="" method="post" autocomplete="on">
              <input class="form-control" type="text" name="judul" value="<?php if(isSubmit())echo $judul; ?>" placeholder="Judul Buku" required>
              <input class="form-control" type="text" name="pengarang" value="<?php if(isSubmit())echo $penulisBuku; ?>" placeholder="Nama Penulis" required>
              <div class="col-md-2 space space-left">
                <input class="form-control" type="text" name="tahun_terbit" value="<?php if(isSubmit())echo $tahunTerbit; ?>" placeholder="Tahun Terbit" required>
              </div>
              <div class="col-md-3 space">
                <input class="form-control" type="text" name="stock" value="<?php if(isSubmit())echo $stock; ?>" placeholder="Stock buku" required>
              </div>
              <div class="col-md-7 space">
                <select class="form-control" name="tag" required>
                  <option value="Edukasi">Edukasi</option>
                  <option value="Bisnis">Bisnis</option>
                  <option value="Novel">Novel dan komik</option>
                  <option value="Lain">Lainnya</option>
                </select>
              </div>
              <div class="input-group">
                <div class="input-group-addon">
                  <input type="checkbox" name="jual" value="jual">
                </div>
                <p class="form-control">Jual</p>
                <input class="form-control" type="number" name="harga_beli" value="<?php if(isSubmit())echo $hargaBeli; ?>" placeholder="Harga Jual. e.g: 40000">
              </div>
              <br>
              <!-- jika pinjemin maka langsung centang -->
              <div class="input-group">
                <div class="input-group-addon">
                    <input type="checkbox" name="sewa" value="sewa" >
                </div>
                <p class="form-control">Sewakan</p>
                <input class="form-control" type="number" name="harga_sewa" value="<?php if(isSubmit())echo $hargaSewa; ?>" placeholder="Harga Sewa. e.g: 10000">
              </div>
              <label for="deskripsibuku" class="first-content block">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsibuku" class="block form-control" value="<?php if(isSubmit())echo $deskripsi; ?>" placeholder="Deskripsikan apa yang dibahas di dalam buku, sinopsis (jika novel), jumlah halaman dan informasi yang menggambarkan buku tersebut. " required></textarea> <br>
              <input class="form-control" type="text" name="cod" value="<?php if(isSubmit())echo $cod; ?>" placeholder="Alamat untuk bertransaksi (COD) e.g: Balai Kota Malang atau Jl. Gajayana dsb.">
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
