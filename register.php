<?php
require_once 'core/init.php';
include_once 'view/header.php';
include_once 'view/navbar_fix.php';

if(isset($_SESSION['user'])) {
  header('location:index');
}

$pesan = '';

if(isset($_POST['submit'])) {
  $firstname = $_POST['firstname'];
  $lastname  = $_POST['lastname'];
  $nama      = $firstname .' '. $lastname;
  $username  = $_POST['username'];
  $email     = $_POST['email'];
  $pass1     = $_POST['pass1'];
  $pass2     = $_POST['pass2'];
  $identitas = $_POST['identitas'];
  $no_identitas= $_POST['no_identitas'];
  $gender     = $_POST['gender'];
  $alamat     = $_POST['alamat'];
  $hp         = $_POST['no_hp'];
  $asal       = $_POST['asal'];

  $password = '';

  if(strlen($pass1)>=8){
  if($pass1 == $pass2) {
    $password = $pass1;
    if(!empty(trim($nama)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password))
        && !empty(trim($identitas)) && !empty(trim($no_identitas)) && !empty(trim($gender)) && !empty(trim($alamat)) && !empty(trim($hp))) {
      if(register($nama, $username, $email, $password, $identitas, $no_identitas, $gender, $alamat, $hp, $asal)) {
        $_POST = array();
        $pesan = '<div class="alert alert-success" role="alert">Berhasil mendaftar! Silahkan <a href="login"><b>Masuk</b></a> untuk melanjutkan</div>';
      } else {
        $pesan = '<div class="alert alert-warning" role="alert">Username atau email telah digunakan/tidak valid!.</div>';
      }
    } else {
      $pesan = '<div class="alert alert-danger" role="alert">Semua form harus diisi!</div>';
    }

  } else {
    $pesan = '<div class="alert alert-danger" role="alert">Kata sandi tidak cocok!</div>';
  }
} else{
  $pesan = '<div class="alert alert-danger" role="alert">Kata sandi minimal 8 karakter!</div>';
}
}

?>
<section class="first-content contact">
  <div class="container first-content">
    <h2 class=" text-primary">Daftar</h2>
    <p class="contact-head ">Daftar dengan akun baru. Nikmati semua kemudahan
      yang ada, gratis!</p>
      <div class="col-md-5 col-md-offset-7">
        <?php echo $pesan;
          // if(isset($_POST['firstname']))echo $_POST['firtsname']
         ?>
      </div>
      <?php
        function isSubmit() {
          if (isset($_POST['submit'])) {
            return true;
          }
          return false;
        }
       ?>
    <div class="row contact-form">
      <form class="first-content" action="" method="post">

        <div class="col-md-5 well signup pull-right">
          <div class="col-md-12 text-box">
            <div class="col-md-6 space space-left">
              <input class="form-control" type="text" name="firstname" min="4" placeholder="Nama Depan" value="<?php if(isSubmit())echo $firstname;?>" required/>
            </div>
            <div class="col-md-6 space space-right">
              <input class="form-control" type="text" name="lastname" min="4" placeholder="Nama Belakang" value="<?php if(isSubmit())echo $lastname;?>" required/>
            </div>
            <input class="form-control" type="text" name="username" min="5" placeholder="Username" value="<?php if(isSubmit())echo $username;?>" required/>
            <input class="form-control" type="email" name="email" placeholder="Email" value="<?php if(isSubmit())echo $email;?>" required/>
            <input class="form-control" type="password" id="pass1"name="pass1" min="6" placeholder="Password" required/>
            <div class="confirmMessage">
              <input class="form-control" type="password" id="pass2" name="pass2" min="6" placeholder="Konfirmasi Password" onkeyup="checkPass(); return false;" required/>
              <div id="confirmMessage"></div>
            </div>
            <small class="block underline first-content"><a href="#" class="text-warning">Untuk apa nomor identitas?</a></small>
            <div class="col-md-3 no-padding">
              <select class="form-control" id="select" name="identitas">
                <option value="ktp">KTP</option>
                <option value="ktm">KTM</option>
                <option value="kartu pelajar">Kartu Pelajar</option>
              </select>
            </div>
            <div class="col-md-9 col-xs-9 col-sm-9 text-box no-padding clearfix">
              <input type="text" class="form-control" name="no_identitas" min="8" placeholder="Nomor identitas" value="<?php if(isSubmit())echo $no_identitas;?>" required>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 no-padding">
              <select class="form-control" id="select" name="gender" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="clearfix"></div>
            <small class="text-muted block">Alamat</small>
            <textarea name="alamat" class="form-control text-box"><?php if(isSubmit())echo $alamat;?></textarea>
            <small class="text-warning">*Wajib menggunakan nomor yang valid</small>
            <input class="form-control" type="text" name="no_hp" min="11" placeholder="No. HP" value="<?php if(isSubmit())echo $hp;?>" required/>
            <small class="text-warning">*Jika masih mahasiswa/pelajar</small>
            <input type="text" name="asal" placeholder="Asal Universitas/sekolah" class="form-control" value="<?php if(isSubmit())echo $asal;?>">
            <div class="col-md-12 first-content">
              <div class="col-md-2 no-padding text-left">
                <input class="inline no-padding" type="checkbox" name="deal" required>
              </div>
              <div class="col-md-10 no-padding add-space">
                <p>Setuju dengan semua <a class="text-warning" href="#">syarat</a> dan <a class="text-warning" href="#">ketentuan <a href="#">gedebuk.com</a></a></p>
              </div>
            </div>
            <button type="submit" class="btn btn-lg btn-primary center-block" name="submit" value="Daftar" style="color:#ffffff;">Daftar</button>
            </div>
      </form>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/wow.min.js"></script>
<script type="text/javascript">
  new WOW().init();

  function checkPass(){
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('confirmMessage');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    if(pass1.value == pass2.value){
      pass2.style.borderColor = goodColor;
      message.style.color = goodColor;
      message.innerHTML = "Cocok";
    }else{
      pass2.style.borderColor = badColor;
      message.style.color = badColor;
      message.innerHTML = "Password tidak cocok!";
    }
  }
</script>
<?php
include_once 'view/footer.php';
 ?>
