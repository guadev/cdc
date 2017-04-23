<?php
include_once 'view/header.php';
include_once 'view/navbar.php';

$allPost = showAllPost();

?>

    <!-- header -->
    <header class="parallax-window" data-parallax="scroll" data-speed="0.2" data-image-src="assets/bg.jpeg">
      <div class="cover">
        <div class="container first-content">
          <div class="fly">
            <ul>
              <li class="pull-left"><a href="forum.php">Forum</a></li>
              <?php
              if($login) {
              ?>
                <li class="pull-right"><a href="logout.php">Log out</a></li>
                <li class="pull-right"><a href="akun.php">Dashboard</a></li>
              <?php
              } else { ?>
                <li class="pull-right"><a href="login.php">Log In</a></li>
                <li class="pull-right"><a href="register.php">Register</a></li>
              <?php } ?>
              <li class="pull-right"><a href="publish.php">Posting Buku</a></li>
            </ul>
          </div>
          <div class="row first-content">
            <div class="col-md-12 col-sm-12 text-center first-content add-space no-padding" id="layer">
              <h1>GEDEBUK</h1>
              <div class="secondary-colorwhite first-content scroll">
                <p class="first-content">Buku tahu semuanya!<br>Temukan buku favoritmu dan bantu teman-teman lain yang membutuhkan buku.</p>
              </div>
              <div class="col-md-offset-3 col-md-6 first-content scroll">
                <div class="secondary-colorwhite first-content">
                  <!-- <div class="col-md-12 col-sm-12 col-xs-12 inline button no-padding">
                    <button type="button" class="btn btn-danger" name="button">Hot</button>
                    <button type="button" class="btn btn-primary" name="button">New</button>
                    <button type="button" class="btn btn-success" name="button">Jas</button>
                    <button type="button" class="btn btn-warning" name="button">asas</button>
                  </div> -->
                  <div class="col-md-10 col-sm-10 col-xs-9 text-box no-padding no-margin">
                    <form class="form-action" action="search" method="get">
                      <input id="inputcari" class="search" type="text" name="search" placeholder="cari keyword" value="">
                  </div>
                  <div class="col-md-2 col-sm-2 col-xs-3 text-box no-padding no-margin">
                    <button class="btn btn-lg btn-primary no-margin" type="submit" name="search"><p><i class="fa fa-search"></i></p></button>
                  </div>
                  </form>
                  <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                    <p class="inline secondary-colorwhite caripopuler">Pencarian populer : </p>
                    <ul class="">
                      <li><a href="#"><p class="inline caripopuler text-primary">uin</p></a></li>
                      <li><a href="#"><p class="inline caripopuler text-warning">maulana</p></a></li>
                      <li><a href="#"><p class="inline caripopuler text-danger">malik</p></a></li>
                      <li><a href="#"><p class="inline caripopuler text-success">ibrahim</p></a></li>
                    </ul>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="headerfooter">
              <a class="sosmed fb" href="https://www.facebook.com/gedebuk"><img src="assets\fb.png" alt="Share to Facebook"></a>
              <a class="sosmed" href="https://instagram.com/gedebuk"><img src="assets\ig.png" alt="Share to Instagram"></a>
              <a class="sosmed" href="https://twitter.com/gedebuk"><img src="assets\tw.png" alt="Share to Twiter"></a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end ofheader -->

    <section class="offer">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-sm-9 col-xs-9">
            <h4>Punya buku tapi tidak terpakai/hanya sebagai hiasan rak?</h4>
            <small>Lorem ipsum dolor sit.</small>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-3">

            <form action="publish.php" method="post">
              <button  type="submit" class="btn btn-lg btn-default" name="pinjemin" >Pinjemin aja!</button>
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
              <h2 class="garisbawah">Promoted Books</h2>
              <div class="scroll-page">
                <a href="#">
                  <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="assets/bg.jpeg" alt="Judul Buku">
                    </div>
                    <div class="media-body garisbawah">
                      <h4 class="media-heading">Ini judul buku</h4>
                      <small>oleh WR. Supratman</small>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, reiciendis?</p>
                    </div>
                  </div>
                </a>
                <a href="#">
                  <div class="media ">
                    <div class="media-left">
                        <img class="media-object" src="assets/bg2.jpg" alt="Judul Buku">
                    </div>
                    <div class="media-body garisbawah">
                      <h4 class="media-heading">Ini judul buku</h4>
                      <small>oleh WR. Supratman</small>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, reiciendis?</p>
                    </div>
                  </div>
                </a>
                <a href="#">
                  <div class="media ">
                    <div class="media-left">
                        <img class="media-object" src="assets/fb.png" alt="Judul Buku">
                    </div>
                    <div class="media-body garisbawah">
                      <h4 class="media-heading">Ini judul buku</h4>
                      <small>oleh WR. Supratman</small>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, reiciendis?</p>
                    </div>
                  </div>
                </a>
                <a href="#">
                  <div class="media ">
                    <div class="media-left">
                        <img class="media-object" src="assets/coverbuku.jpg" alt="Judul Buku">
                    </div>
                    <div class="media-body garisbawah">
                      <h4 class="media-heading">Ini judul buku</h4>
                      <small>oleh WR. Supratman</small>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, reiciendis?</p>
                    </div>
                  </div>
                </a>
                <a href="#">
                  <div class="media ">
                    <div class="media-left">
                      <img class="media-object" src="assets/coverbuku.jpg" alt="Judul Buku">
                    </div>
                    <div class="media-body garisbawah">
                      <h4 class="media-heading">Ini judul buku</h4>
                      <small>oleh WR. Supratman</small>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, reiciendis?</p>
                    </div>
                  </div>
                </a>
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
                while($row = mysqli_fetch_array($allPost)) { ?>
                <li>
                  <div class="media">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object" src="assets/bg2.jpg" alt="Judul Buku">
                      </a>
                    </div>
                    <div class="media-body garisbawah">
                      <a href="post.php?show=<?php echo $row['url_post']; ?>"><h4 class="media-heading"><?php echo $row['judul_buku']; ?></h4></a>
                      <small>Diposting: <?php echo $row['penulis_post']; ?>, Penulis buku: <?php echo $row['penulis_buku']; ?></small> <br>
                      <small>Waktu: <?php echo $row['tanggal_post']; ?></small>
                      <p><?php echo excerpt($row['deskripsi_buku']); ?></p>
                      <div class="navbody">
                        <div class="col-md-6 col-sm-6 no-padding">
                          <small>Kategori: <?php echo $row['tag']; ?></small>
                          <!-- <small class="inline">Share : </small>
                          <a class="sosmed" href="https://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title; ?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=550,height=400"><img src="assets/fb.png" alt="Share to Facebook"></a>
                          <a class="sosmed" href="whatsapp://send?text=Lihat buku di gedebuk.com, bagus!"data-action="share/whatsapp/share"><img src="assets/wa.png" alt="Share to Instagram"></a>
                          <a class="sosmed" href="https://twitter.com/share?source=sharethiscom&text=<?php echo $title;?>&url=<?php echo $url; ?>&via=gedebuk.com"><img src="assets/tw.png" alt="Share to Twiter"></a> -->
                        </div>
                        <div class="col-md-6 col-sm-6 attention">
                          <a href="post.php?show=<?php echo $row['url_post']; ?>"><button type="button" class="btn btn-primary" name="button">Lihat selengkapnya >></button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              <?php } //end of while ?>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </section>

<?php include_once 'view/footer.php'; ?>
