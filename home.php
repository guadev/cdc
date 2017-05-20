<?php
require_once 'core/init.php';
require_once 'view/header.php';
// require_once 'view/navbar.php';
$login = false;
if(isset($_SESSION['user'])) {
  $login = true;
}
$value = '';
if(isset($_GET['halaman'])) {
  $value = (int)$_GET['halaman'];
} else {
  $value = 1;
}

$perPage = 5;
$page    = $value;
$start   = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$allPost      = showAllPost($start, $perPage);
$popularPost  = popularPost();

//dapetin nomer buat pagination
$query  = "SELECT buku.*, user.nama, user.no_id FROM buku, user";
$result = mysqli_query($link, $query);
$total = mysqli_num_rows($result);

$pages = ceil($total/$perPage);

?>

<!-- header -->
<header class="parallax-window" data-parallax="scroll" data-speed="0.2" data-image-src="assets/bg.jpeg">
  <div class="cover">
    <div class="container first-content">
      <div class="fly hidden-xs">
        <ul>
          <li class="pull-left"><a href="index"><i class="fa fa-gg"></i> Gedebuk</a></li>
          <?php
            if ($login) {
            ?>
            <li class="pull-right"><a href="akun"><?php echo "Selamat datang, ".$_SESSION['user']; ?></a></li>
            <li class="pull-right"><a href="logout">Logout</a></li>
            <?php
          }else{
            ?>
            <li class="pull-right"><a href="login">Log In</a></li>
            <li class="pull-right"><a href="register">Register</a></li>
            <?php
          }
           ?>
           <li class="pull-right"><a href="forum/">Forum</a></li>

        </ul>
      </div>
      <div class="headerfooter">
        <abbr title="Temukan kami di facebook!"><a class="sosmed fb" href="https://www.facebook.com/gedebuk"><img src="assets\fb.png" alt="Share to Facebook"></a></abbr>
        <abbr title="Temukan kami di Instagram"><a class="sosmed" href="https://instagram.com/gedebuk"><img src="assets\ig.png" alt="Share to Instagram"></a></abbr>
        <abbr title="Temukan kami di twitter!"><a class="sosmed" href="https://twitter.com/gedebuk"><img src="assets\tw.png" alt="Share to Twiter"></a></abbr>
      </div>
      <div class="forum hidden-xs hidden-sm">
        <abbr title="Buka forum"><a href="#"><h4 class="garisbawah secondary-colorwhite">Forum</h4></a></abbr>
        <ul class="fa fa-ul">
          <h6 class="first-content">BELUM TERJAWAB</h6>
          <li><a href="#" class="underline"><i class="fa fa-li fa-list"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, maxime.</a></li>
          <li><a href="#" class="underline"><i class="fa fa-li fa-list"></i> Pertanyaan 2</a></li>
          <li><a href="#" class="underline"><i class="fa fa-li fa-list"></i> Pertanyaan 3</a></li>
          <li><a href="#" class="underline"><i class="fa fa-li fa-list"></i> Pertanyaan 4</a></li>
          <li><a href="#" class="underline"><i class="fa fa-li fa-list"></i> Pertanyaan 5</a></li>
          <li role="separator" class="divider first-content"></li>
          <h6>SOLVED</h6>
          <li><a href="#" class="underline"><i class="fa fa-li fa-list"></i> Pertanyaan 1 [SOLVED]</a></li>
          <li><a href="#" class="underline"><i class="fa fa-li fa-list"></i> Pertanyaan 2</a></li>
          <li><a href="#" class="underline"><i class="fa fa-li fa-list"></i> Pertanyaan 3</a></li>
          <li><a href="#" class="underline"><i class="fa fa-li fa-list"></i> Pertanyaan 4</a></li>
          <li><a href="#" class="underline"><i class="fa fa-li fa-list"></i> Pertanyaan 5</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-9 col-md-offset-3 col-xs-12 col-sm-12 text-center add-space no-padding" id="layer">
          <h1>Cara mudah cari buku!</h1>
          <div class="secondary-colorwhite first-content scroll">
            <p class="first-content">Lorem ipsum dolor sit amet, djsdnejnd ejsubd jues bjst dignissimos quisquam in.</p>
            <p>Derah malang dan sekitarnya</p>
          </div>
          <div class="col-md-offset-2 col-md-8 scroll">
            <form action="search" mehod="post">
            <div class="secondary-colorwhite">
                <div id="box" class="col-md-10 col-sm-10 col-xs-9 text-box no-padding no-margin">
                  <input id="inputcari" class="search" type="text" name="search" placeholder="Ketik judul buku yang dicari...">
                </div>
                <div id="suggest"></div>
            </div>
                <div class="col-md-2 col-sm-2 col-xs-3 text-box no-padding no-margin">
                  <button class="btn btn-lg btn-primary no-margin" type="submit" id="search" name="submit"><p><i class="fa fa-search"></i></p></button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- end ofheader -->

<section class="offer">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-9">
        <h4>Punya buku tapi tidak terpakai, atau hanya sebagai hiasan rak?</h4>
        <small>Dan dapatkan keuntungannya!</small>
      </div>
      <div class="col-xs-12 col-md-3">

        <form action="publish.php" method="post">
          <button  type="submit" class="btn btn-lg btn-default wow animated tada" name="pinjemin" >Pinjemin aja!</button>
        </form>

      </div>
    </div>
  </div>
</section>
    <!-- category -->
    <section class="sec">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12 col-xs-12 panelkiri">
            <div class="kategori add-space">
              <h2 class="garisbawah">Kategori</h2>
              <div class="list-group">
                <a href="#" class="list-group-item">
                  <i class="fa fa-book fa-fw"></i> Edukasi
                </a>
                <a href="#" class="list-group-item">
                  <i class="fa fa-money fa-fw"></i> Bisnis
                </a>
                <a href="#" class="list-group-item">
                  <i class="fa fa-fire fa-fw"></i> Komik
                </a>
                <a href="#" class="list-group-item">
                  <i class="fa fa-book fa-fw"></i> Bacaan sehari-hari
                </a>
              </div>
            </div>
            <div class="promoted first-content">
              <h2 class="garisbawah">Paling Banyak Dilihat</h2>
              <div class="scroll-page">
                <?php while($trend = mysqli_fetch_array($popularPost)) { ?>
                <a href="post?show=<?php echo $trend['url']; ?>">
                  <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="assets/bg.jpeg" alt="Judul Buku">
                    </div>
                    <div class="media-body garisbawah">
                      <h4 class="media-heading"><?php echo $trend['judul']; ?></h4>
                      <small>Penulis: <?php echo $trend['pengarang']; ?></small>
                      <p><?php echo excerpt($trend['deskripsi'], 40); ?></p>
                    </div>
                  </div>
                </a>
                <?php } ?>
              </div>

              <a href=""><small class="first-content text-primary premium"><i class="fa fa-tasks"></i> Bagaimana agar buku dipromosikan?</small></a>
            </div>
          </div>
          <div class="col-md-8 col-sm-12 col-xs-12 no-page-padding">
            <div class="featured">
              <!-- <ul class="nav nav-pills no-padding">
                <li role="presentation" class="active"><a href="#" class="garisbawah">Buku Populer</a></li>
                <li role="presentation" ><a href="#" class="garisbawah">Buku baru</a></li>
                <li role="presentation" ><a href="#" class="garisbawah">Buku terlaris</a></li>
              </ul> -->
              <ul>
                <?php
                while($row = mysqli_fetch_assoc($allPost)) { ?>
                <li>
                  <div class="media">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object" src="assets/bg2.jpg" alt="Judul Buku">
                      </a>
                    </div>
                    <div class="media-body garisbawah">
                      <a href="post?show=<?php echo $row['url']; ?>"><h4 class="media-heading"><?php echo $row['judul']; ?></h4></a>
                      <small>Diposting: <?php echo $row['nama']; ?>, Penulis buku: <?php echo $row['pengarang']; ?></small> <br>
                      <small>Waktu: <?php echo $row['tgl_publikasi']; ?></small>
                      <p><?php echo excerpt($row['deskripsi'], 250); ?></p>
                      <div class="navbody">
                        <div class="col-md-6 col-sm-6 no-padding">
                          <small>Kategori: <?php echo $row['tag']; ?></small>
                        </div>
                        <div class="col-md-6 col-sm-6 attention">
                          <a href="post?show=<?php echo $row['url']; ?>"><button type="button" class="btn btn-primary" name="button">Lihat selengkapnya >></button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              <?php } //end of while ?>
              </ul>
              <nav aria-label="Page navigation first-content">
                <ul class="pagination pull-right">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <?php for($i = 1; $i <= $pages; $i++) {
                    $current = $i;
                  ?>
                  <li><a href="index?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php } ?>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <section class="darklight">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12"><h4 class="text-center text-muted">Mengapa Gedebuk.com ?</h4></div>
              <div class="col-md-3 col-sm-3 text-center">
                <div class="fade-up">
                <div class="spec center-block wow animated pulse">
                  <h1 class="inline"><i class="fa fa-laptop fa-fw"></i></h1>
                </div>
                <h2>User Interface Ramah</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nulla.</p>
              </div>
            </div>
              <div class="col-md-3 col-sm-3 text-center">
                <div class="fade-up">
                <div class="spec center-block wow animated pulse delay-2s">
                  <h1 class="inline"><i class="fa fa-line-chart fa-fw"></i></h1>
                </div>
                <h2>Tingkat akurasi maksimal</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nulla.</p>
              </div>
            </div>
              <div class="col-md-3 col-sm-3 text-center">
                <div class="fade-up">
                <div class="spec center-block wow animated pulse delay-4s">
                  <h1 class="inline"><i class="fa fa-chain-broken fa-fw"></i></h1>
                </div>
                <h2>Lebih mudah</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nulla.</p>
              </div>
            </div>
              <div class="col-md-3 col-sm-3 text-center">
                <div class="fade-up">
                <div class="spec center-block wow animated pulse delay-6s">
                  <h1 class="inline"><i class="fa fa-handshake-o fa-fw"></i></h1>
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
            <div class="col-md-3 col-sm-4">
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
            <div class="col-md-2 col-md-offset-3 text-center">
              <p>Dukungan</p>
              <ul>
                <li><a href="#">F.A.Q</a></li>
                <li><a href="#">F.A.Q</a></li>
                <li><a href="#">F.A.Q</a></li>
              </ul>
            </div>
            <div class="col-md-2 text-center">
              <p>Bisnis</p>
              <ul>
                <li><a href="#">Career</a></li>
                <li><a href="#">Career</a></li>
                <li><a href="#">Career</a></li>
              </ul>
            </div>
            <div class="col-md-2 text-center">
              <p>Gedebuk</p>
              <ul>
                <li><a href="#">About Gedebuk</a></li>
                <li><a href="#">About Gedebuk</a></li>
                <li><a href="#">About Gedebuk</a></li>
              </ul>
            </div>
        </div>
      </section>
      <section class="powered clearfix">
        <div class="container">
          <div class="row">
            <div class="col-md-6 pull-left">
              <small class="block">Supported by:</small>
              <abbr title="Stasion">
                <a href="#">
                  <img src="assets/stasion.png" alt="">
                </a>
              </abbr>
              <abbr title="CDC ICT">
                <a href="#">
                  <img src="assets/ict.jpg" alt="">
                </a>
              </abbr>
              <abbr title="Inagata technosmith">
                <a href="#">
                  <img src="assets/inagata.png" alt="">
                </a>
              </abbr>
            </div>
            <div class="col-md-6 dev text-right">
              <p class="inline"><span class="primary-colorwhite">Copyright <?php echo date('Y'); ?></span> | developed by &nbsp; </p>
              <abbr title="Guadev">
                <a href="#">
                  <img src="assets/GUAdev.jpg" alt="">
                </a>
              </abbr>
            </div>
          </div>
        </div>
      </section>
    </footer>
    <script src="js/jquery.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script type="text/javascript">
    new WOW().init();

    function parallax(){
      var prlx_lyr_1 = document.getElementById('layer');
      prlx_lyr_1.style.top = (window.pageYOffset / 1.38 )+'px';
    }
      window.addEventListener("scroll", parallax, false);

    $(document).ready(function(){
      $(window).scroll(function (event) {
            var y = $(this).scrollTop();
            if (y <= 500) {
              $('#home-bar').addClass('navbar-hidden');
            }else {
              $('#home-bar').addClass('animated').addClass('fadeInDown');
              $('#home-bar').addClass('navbar-fixed-top').addClass('navbar-default');
              $('#home-bar').removeClass('navbar-hidden');
            }
            if (y >= 200) {
              $('.scroll').addClass('none');
            }else {
              $('.scroll').removeClass('none');
            }
        });
    });

    //searching with suggestion
    $(document).ready(function(){
      var left = $('#box').position().left;
      var top = $('#box').position().top;
      var width = $('#box').width();

      $('#suggest').css('left', left).css('top', top+32).css('width', width);

      $('#inputcari').keyup(function(){
        var value = $(this).val();

        if(value != '') {
          $('#suggest').show();
          $.post('hasilcari.php', {value: value}, function(data){
            $('#suggest').html(data);
          });
        } else {
          $('#suggest').hide();
        }
      });

    });
    </script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php mysqli_close($link); ?>
