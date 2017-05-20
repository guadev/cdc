<?php
require_once 'core/init.php';

if(isset($_SESSION['user'])) {
  header('location:home.php');
}

$pesan = '';

if(isset($_POST['login'])) {
  $username  = escape($_POST['username']);
  $password  = escape($_POST['password']);

  if(!empty(trim($username)) && !empty(trim($password))) {
    if(login($username, $password)) {
      online($_SESSION['user']);
      header('location:home');
    } else {
      $pesan = '<div class="alert alert-danger" role="alert">username / email atau password salah!</div>';
    }
  } else {
    $pesan = '<div class="alert alert-warning" role="alert">username / email dan password harus diisi!</div>';
  }
}

$allPost = indexPost();


 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cari buku yang anda inginkan dengan mudah!">
    <title>Get The Book | Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="land">
    <!-- nav -->
    <nav id="home-bar" class="navbar navbar-hidden navbar-default navbar-fixed-top" data-nav-status="toggle">
      <div class="navpad container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index">GEDEBUK</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="menu">
          <ul class="nav navbar-nav navbar-right">
            <!-- <li><a  href="pages/forum.html">Servis</a></li> -->
            <li><a  href="home.php">Produk</a></li>
            <li><a id="pad" href="register.php"><button type="button" class="btn btn-primary btn-login" name="button">Gabung</button></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!--end of nav -->

    <header>
      <div id="login-form">
        <div class="wrapper">
          <p>Login</p>
          <small>Belum punya akun? <a href="register">Daftar disini.</a></small>
          <?php echo $pesan; ?>
          <div class="target">
            <form action="" method="post">
              <input type="text" class="inside-wrapper form-control" name="username" placeholder="Username" autofocus="true">
              <input type="password" class="inside-wrapper form-control" name="password" placeholder="Password">
              <input type="submit" class="btn btn-md btn-default" name="login" value="Masuk">
            </form>
            <a href="#close" class="close"><i class="fa fa-arrow-circle-left"></i></a>
          </div>
        </div>
      </div>
      <div class="cover">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p class="welcome">Selamat datang di</p>
              <h1>GEDEBUK</h1>
              <p class="deskripsi">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non nesciunt optio, molestiae officiis. Aliquam, illo! Dicta illo rerum omnis minima!</p>
              <div class="col-md-10 col-sm-10 col-xs-9 text-box no-padding no-margin">
              <form action="search" method="post">
                <input id="inputcari" class="search" type="text" name="search" placeholder="Cari Buku!" value="">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-3 text-box no-padding no-margin">
                <button class="btn btn-lg btn-primary no-margin" type="submit" id="search"><p><i class="fa fa-search"></i></p></button>
              </div>
            </form>
              <div class="col-md-12 no-padding log">
                <a href="#login-form"><button class="btn btn-primary btn-md btn1">Login</button></a>
                <a href="register"><button class="btn btn-danger btn-md btn2">Daftar</button></a>
              </div>
            </div>
            <div class="col-md-6">
              <img src="assets/GUAdev.jpg" alt="" class="img-responsive">
            </div>
          </div>
        </div>
        <div class="headerfooter">
          <abbr title="Temukan kami di facebook!"><a class="sosmed" href="https://www.facebook.com/gedebuk"><img src="assets\fb.png" alt="Share to Facebook"></a></abbr>
          <abbr title="Temukan kami di Instagram"><a class="sosmed" href="https://instagram.com/gedebuk"><img src="assets\ig.png" alt="Share to Instagram"></a></abbr>
          <abbr title="Temukan kami di twitter!"><a class="sosmed" href="https://twitter.com/gedebuk"><img src="assets\tw.png" alt="Share to Twiter"></a></abbr>
        </div>
      </div>
    </header>

    <section class="desc">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2>Apa itu GEDEBUK? <span class="bottom wow animated fadeInLeft"></span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis odit eius distinctio culpa expedita sunt placeat, quae dolorum molestiae perspiciatis deleniti repudiandae natus repellendus voluptate excepturi officiis, provident voluptas sequi vero ab veniam dolorem temporibus. Quae quas rem cupiditate maxime, obcaecati provident adipisci excepturi error corporis, aperiam similique, perferendis itaque!</p>
          </div>
          <div class="col-md-8 col-md-offset-2 garisbawah"></div>
        </div>
      </div>
    </section>
    <section class="service">
      <div class="container text-center">
        <h2>Layanan kami<span class="bottom wow animated fadeInLeft"></span></h2>
        <div class="row text-center">
          <div class="col-md-12 no-padding log">
            <div class="divider"></div>
            <div class="col-md-3">
              <div class="service-inner">
                <img src="assets/bg.jpeg" alt="" class="img-responsive">
                <h4>Meminjam</h4>
                <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, sequi.</small>
              </div>
            </div>
            <div class="col-md-3">
              <div class="service-inner">
                <img src="assets/bg.jpeg" alt="" class="img-responsive">
                <h4>Menyewakan</h4>
                <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, sequi.</small>
              </div>
            </div>
            <div class="col-md-3">
              <div class="service-inner">
                <img src="assets/bg.jpeg" alt="" class="img-responsive">
                <h4>Bisnis</h4>
                <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, sequi.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="produk">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2>Produk-produk di gedebuk <span class="bottom wow animated fadeInLeft"></span></h2>
          </div>
          <div class="col-md-12 no-padding first-content">
            <div class="col-md-1"></div> <!--Pembatas, jangan dihapus-->
            <?php
            while($row = mysqli_fetch_assoc($allPost)) {
            ?>
            <a href="post?show=<?php echo $row['url']; ?>" class="product">
              <div class="col-md-2 text-center">
                <div class="produk-inner">
                  <div>
                    <div class="img-wrapper">
                      <img src="assets\coverbuku.jpg" alt="">
                    </div>
                    <p><?php echo $row['judul']; ?></p>
                    <small>Oleh <?php echo $row['pengarang']; ?></small>
                  </div>
                </div>
              </div>
            </a>
            <?php } ?>

          </div>
        </div>
      </div>
    </section>
    <section class="lend">
      <div class="container">
        <div class="row">
          <div class="col-md-9 left">
            <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod saepe, debitis iure voluptatum error quo magni quaerat. Impedit, consequuntur optio!</h4>
          </div>
          <div class="col-md-3 right">
            <a href="publish.php"><button type="button" class="btn btn-lg btn-primary" name="button">Sewain aja</button></a>
          </div>
        </div>
      </div>
    </section>
    <!-- <section class="first-content contact">
			<div class="container first-content text-center">
        <h2>Daftar <span class="bottom wow animated fadeInLeft"></span></h2>
        <p class="contact-head ">Daftar dengan akun baru. Nikmati semua kemudahan
          yang ada, gratis!</p>
				<div class="row contact-form">
					<form class="first-content">
            <div class="col-md-7">
              <img src="../assets/bg.jpeg" class="center-block add-space" alt="Icon">
              <div class="col-md-12 first-content no-padding">
                <p><b>Halo!</b> Tolong upload foto kamu agar kami dapat mengenali dengan mudah!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id maxime beatae adipisci voluptates quod incidunt aperiam! Maiores esse amet itaque.</p>
              </div>
            </div>
            <div class="col-md-5 well signup">
              <div class="col-md-12 text-box">
                <div class="col-md-6 space space-left">
                  <input type="text" class="form-control" placeholder="First Name" >
                </div>
                <div class="col-md-6 space space-right">
                  <input type="text" class="form-control" placeholder="Last Name" >
                </div>
                <input type="text" placeholder="Username" class="form-control">
                <input type="email" placeholder="e-Mail" class="form-control">
                <input type="password" id="pass1" placeholder="Password" class="form-control">
                <div class="confirmMessage">
                  <input type="password" id="pass2" placeholder="Konfirmasi Password" class="form-control" onkeyup="checkPass(); return false;">
                  <div id="confirmMessage"></div>
                </div>
                <small class="block underline first-content"><a href="#" class="text-warning">Untuk apa nomor identitas?</a></small>
                <div class="col-md-3 no-padding">
                  <select class="form-control" id="select">
                    <option value="KTP">KTP</option>
                    <option value="KTM">KTM</option>
                    <option value="SIM">SIM</option>
                    <option value="Paspor">Paspor</option>
                    <option value="Kartu pelajar">Kartu pelajar</option>
                  </select>
                </div>
                <div class="col-md-9 col-xs-9 col-sm-9 text-box no-padding clearfix">
                  <input type="text" placeholder="Nomor identitas" class="form-control">
                </div>
                <div class="clearfix"></div>
                <small class="text-muted block">Alamat</small>
                <textarea name="alamat" class="form-control text-box"></textarea>
                <small class="text-warning">*Jika masih mahasiswa/pelajar</small>
                <input type="text" placeholder="Asal Universitas/sekolah" class="form-control">
                <div class="col-md-12 first-content">
                  <div class="col-md-2 no-padding text-left">
                    <input class="inline no-padding" type="checkbox" name="deal" required>
                  </div>
                  <div class="col-md-10 no-padding add-space">
                    <p>Setuju dengan semua <a class="text-warning underline" href="#">syarat</a> dan <a class="text-warning underline" href="#">ketentuan </a> gedebuk.</p>
                  </div>
                </div>
                <button type="button" class="btn btn-lg btn-primary center-block" name="button">Daftar</button>
              </div>
            </div>
					</form>
				</div>
      </div>
		</section> -->
    <footer>
      <div class="container">
        <div class="row">

        </div>
      </div>
    </footer>
    <script src="js/jquery.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script type="text/javascript">
      new WOW().init();

      $(document).ready(function(){
        $(window).scroll(function (event) {
              var y = $(this).scrollTop();
              if (y <= 180) {
                $('#home-bar').addClass('navbar-hidden');
                $('#input').addClass('none');
              }else {
                $('#home-bar').addClass('animated').addClass('transition').removeClass('navbar-hidden');
                $('#input').removeClass('none');
              }
              if (y >= 200) {
                $('.scroll').addClass('none');
              }else {
                $('.scroll').removeClass('none');
              }
          });
      });
    </script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
