<?php
include_once 'view/header.php';
include_once 'view/navbar.php';

$allPost = showAllPost();

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
            <li class="pull-right"><a href="logout">Log Out</a></li>

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
            <div class="secondary-colorwhite">
              <div class="col-md-12 col-sm-12 col-xs-12 inline button no-padding">
                <button type="button" class="btn btn-danger" name="button">Hot</button>
                <button type="button" class="btn btn-primary" name="button">New</button>
                <button type="button" class="btn btn-success" name="button">Jas</button>
                <button type="button" class="btn btn-warning" name="button">asas</button>
              </div>
              <div class="col-md-10 col-sm-10 col-xs-9 text-box no-padding no-margin">
                <input id="inputcari" class="search" type="text" name="search" placeholder="Cari Buku!" value="">
                <div id="suggest"></div>
              </div>
              <div class="col-md-2 col-sm-2 col-xs-3 text-box no-padding no-margin">
                <button class="btn btn-lg btn-primary no-margin" type="submit" id="search"><p><i class="fa fa-search"></i></p></button>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 populer">
                <p class="inline secondary-colorwhite caripopuler">Pencarian populer : </p>
                <ul class="">
                  <li><a href="#"><p class="inline caripopuler text-primary">uin</p></a></li>
                  <li><a href="#"><p class="inline caripopuler text-warning">maulana</p></a></li>
                  <li><a href="#"><p class="inline caripopuler text-danger">malik</p></a></li>
                  <li><a href="#"><p class="inline caripopuler text-success">ibrahim</p></a></li>
                </ul>
              </div>
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
              <nav aria-label="Page navigation first-content">
                <ul class="pagination pull-right">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
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

<?php include_once 'view/footer.php'; ?>
