<?php
require_once 'core/init.php';
include_once 'view/header.php';

$pesan = '';

if(isset($_SESSION['user'])) {
  header('location:index.php');
}

if(isset($_POST['submit'])) {
  $username  = $_POST['username'];
  $password  = $_POST['password'];

  if(!empty(trim($username)) && !empty(trim($password))) {
    if(loginadmin($password)) {
      $_SESSION['user'] = $username;
      online($_SESSION['user']);
      header('location:admin.php');
    } else if(login($username, $password)) {
      $_SESSION['user'] = $username;
      online($_SESSION['user']);
      header('location:index.php');
    } else {
      $pesan = '<div class="alert alert-danger" role="alert">username atau password salah!</div>';
    }
  } else {
    $pesan = '<div class="alert alert-warning" role="alert">username dan password harus diisi!</div>';
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
          <!-- <form class="navbar-form navbar-left">
            <div class="form-group center-block">
              <input type="text" class="form-control" placeholder="Cari judul/nama pengarang">
            </div>
            <button type="submit" class="btn btn-default">Cari</button>
          </form> -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="register.php"><span class="text-danger">Register</span></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <header>
      <section class="first-content contact">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="login center-block well">
                <div class="icon text-center"><i class="fa fa-fw fa-5x fa-user"></i></div>
                <h3 class="text-center">Log In</h3>
                <?php echo $pesan; ?>
                <form action="" method="post">
                  <div class="text-box">
                    <input class="input1" type="text" name="username" min="5" placeholder="Username" />
                    <input class="input2" type="password" name="password" min="6" placeholder="Password" />
                  </div>
                  <div class="alert alert-info" role="alert">Belum punya akun? <a href="register.php"><strong style="color:#31708f;">Daftar</strong></a> sekarang!</div>
                  <div class="clearfix"> </div>
                  <button class="btn btn-lg btn-primary wow animated fadeInUp center-block" name="submit" type="submit">Log In</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </header>
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
