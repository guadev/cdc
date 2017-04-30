<?php
require_once 'core/init.php';
include_once 'view/header.php';

if(isset($_SESSION['user'])) {
  header('location:index.php');
}

$pesan = '';

if(isset($_POST['submit'])) {
  $firstname = $_POST['firstname'];
  $lastname  = $_POST['lastname'];
  $username  = $_POST['username'];
  $email     = $_POST['email'];
  $pass1     = $_POST['pass1'];
  $pass2     = $_POST['pass2'];
  $email     = $_POST['email'];
  $identitas = $_POST['identitas'];
  $noIdentitas= $_POST['noIdentitas'];
  $alamat     = $_POST['alamat'];
  $noHP       = $_POST['no_hp'];
  $asal       = $_POST['asal'];

  $password = '';
  if(strlen($pass1)>=8){
  if($pass1 == $pass2) {
    $password = $pass1;
    if(!empty(trim($firstname)) && !empty(trim($lastname)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password))
        && !empty(trim($identitas)) && !empty(trim($noIdentitas)) && !empty(trim($alamat)) && !empty(trim($noHP))) {
      if(register($firstname, $lastname, $username, $email, $password, $identitas, $noIdentitas, $alamat, $noHP, $asal)) {
        $_POST= array();
        $pesan = '<div class="alert alert-success" role="alert">Berhasil mendaftar! Silahkan <a href="login.php"><b>Masuk</b></a> untuk melanjutkan</div>';
      } else {
        $pesan = '<div class="alert alert-warning" role="alert">Username atau email telah digunakan/tidak valid!.</div>';
      }
    } else {
      $pesan = '<div class="alert alert-danger" role="alert">Semua form harus diisi!</div>';
    }

  } else {
    $pesan = '<div class="alert alert-danger" role="alert">Kata sandi tidak cocok!</div>';
  }
}else{
  $pesan = '<div class="alert alert-danger" role="alert">Kata sandi minimal 8 karakter!</div>';
}
}

?>
    <nav id="top-bar" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="pull-left navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Gedebuk</a>
          <form class="navbar-form navbar-left">
            <div class="form-group center-block">
              <input type="text" class="form-control" placeholder="Cari judul/nama pengarang">
            </div>
            <button type="submit" class="btn btn-default">Cari</button>
          </form>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php">Log In</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <section class="first-content contact">
      <div class="bg"></div>
			<div class="container well well-lg first-content">
				<div class="row contact-form">
          <h2 class="text-center">Daftar</h2>
          <p class="contact-head">Daftar dengan akun baru. Nikmati semua kemudahan
            yang ada, gratis!</p>
            <div class="col-md-5 col-md-offset-7">
              <?php echo $pesan;
                // if(isset($_POST['firstname']))echo $_POST['firtsname']
               ?>
            </div>
            <?php
              function isSubmit()
              {
                if (isset($_POST['submit'])) {
                  return true;
                }
                return false;
              }
             ?>
					<form class="first-content" action="" method="post">
            <div class="col-md-offset-7 col-md-5">
              <div class="col-md-12 text-box">
                <div class="col-md-6 no-padding">
                  <input type="text" name="firstname" min="4" placeholder="Nama Depan" value="<?php if(isSubmit())echo $firstname;?>" required/>
                </div>
                <div class="col-md-6 no-padding">
                  <input type="text" name="lastname" min="4" placeholder="Nama Belakang" value="<?php if(isSubmit())echo $lastname;?>" required/>
                </div>
                <input type="text" name="username" min="5" placeholder="Username" value="<?php if(isSubmit())echo $username;?>" required/>
                <input type="email" name="email" placeholder="Email" value="<?php if(isSubmit())echo $email;?>" required/>
                <input type="password" name="pass1" min="6" placeholder="Password" required/>
                <input type="password" name="pass2" min="6" placeholder="Konfirmasi Password" required/>
                <!-- <label for="">Unggah foto <span class="deskrip">(*Foto ukuran max 350kb)</span></label>
                <input type="file" name="" value="" placeholder="Foto"> -->
                <label class="block"><a href="#">Untuk apa nomor identitas?</a></label>
                <div class="col-md-3 text-box no-padding">
                  <select class="form-control" name="identitas" required>
                    <option value="KTP">KTP</option>
                    <option value="KTM">KTM</option>
                    <option value="Kartu pelajar">Kartu pelajar</option>
                  </select>
                </div>
                <div class="col-md-9 col-xs-9 col-sm-9 text-box no-padding">
                  <input type="text" name="noIdentitas" min="8" placeholder="Nomor Identitas" value="<?php if(isSubmit())echo $noIdentitas;?>" required>
                </div>
              <input type="text" name="alamat" min="5" placeholder="Alamat" value="<?php if(isSubmit())echo $alamat;?>" required/>
              <label class="text-warning">*Wajib menggunakan nomor yang valid</label>
              <input type="text" name="no_hp" min="11" placeholder="No. HP" value="<?php if(isSubmit())echo $noHP;?>" required/>
              <label class="text-warning">*Jika masih mahasiswa/pelajar</label>
              <input type="text" name="asal" placeholder="Universitas/sekolah" value="<?php if(isSubmit())echo $asal;?>" />
              <div class="col-md-12 first-content">
                <div class="col-md-2 no-padding text-left">
                  <input class="inline no-padding" type="checkbox" name="deal" required>
                </div>
                <div class="col-md-10 no-padding add-space">
                  <p>Setuju dengan semua <a class="text-warning" href="#">syarat</a> dan <a class="text-warning" href="#">ketentuan <a href="#">gedebuk.com</a></a></p>
                </div>
              </div>
              <input type="submit" class="btn btn-lg btn-primary center-block" name="submit" value="Daftar" style="color:#ffffff;">
            </div>
					</form>
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
                <a class="block" href="#"><h4>Copyright Gedebuk &copy; <?php echo date('Y'); ?></h4></a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script type="text/javascript">
      new WOW().init();
    </script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
