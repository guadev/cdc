<?php
require_once 'core/init.php';
include_once 'view/header.php';
include_once 'view/navbar_fix.php';

$pesan = '';

if(isset($_SESSION['user'])) {
  header('location:index.php');
}

if(isset($_POST['submit'])) {
  $username  = escape($_POST['username']);
  $password  = escape($_POST['password']);

  if(!empty(trim($username)) && !empty(trim($password))) {
    if(login($username, $password)) {
      online($_SESSION['user']);
      header('location:index');
    } else {
      $pesan = '<div class="alert alert-danger" role="alert">username atau password salah!</div>';
    }
  } else {
    $pesan = '<div class="alert alert-warning" role="alert">username dan password harus diisi!</div>';
  }

}
?>

  <section class="first-content contact" id="login">
    <div class="container">
      <div class="row first-content">
        <div class="col-md-12 col-xs-12 first-content">
          <div class="login center-block well first-content">
            <div class="icon text-center"><i class="fa fa-fw fa-5x fa-user"></i></div>
            <h3 class="text-center">Log In</h3>
              <?php echo $pesan; ?>
            <form action="" method="post" >
              <div class="text-box">
                <input type="text" name="username" placeholder="Username/email" >
                <input type="password" name="password" placeholder="Password" >
              </div>
              <div class="alert alert-warning">
                <p>Belum punya akun? <a href="register.php" class="text-danger underline">Daftar disini.</a></p>
              </div>
              <button type="submit" class="btn btn-lg btn-primary wow animated fadeInUp center-block"  name="submit" >Log In</button>
              <a href="#" class="pull-right first-content"><small class="text-danger underline">Lupa password?</small></a>
            </form>
          </div>
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
    <script src="../js/parallax.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script type="text/javascript">
      new WOW().init();
    </script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
