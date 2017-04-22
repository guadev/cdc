<?php
require_once 'core/init.php';
include_once 'view/header.php';
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
          <form class="navbar-form navbar-left search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Cari judul buku/nama pengarang">
            </div>
            <button type="submit" class="btn btn-default">Cari</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php">Log In</a></li>
            <li><a  href="register.php"><span class="text-warning">Daftar</span></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!--end of nav -->

        <!-- category -->
    <section class="sec first-content page">
      <div class="container">
        <div class="row">
          <div class="col-md-3 panelkiri">
            <h1 class="garisbawah">Filter</h1>
            <div class="kategori add-space">
              <h2>Kategori</h2>
              <div class="input-group">
                <div class="input-group-addon">
                  <input type="checkbox" checked aria-label="...">
                </div>
                <p class="inline deskrip form-control"><i class="fa fa-book fa-fw"></i> Edukasi</p>
              </div>
              <div class="input-group">
                <div class="input-group-addon">
                  <input type="checkbox" checked aria-label="...">
                </div>
                <p class="inline deskrip form-control"><i class="fa fa-money fa-fw"></i> Bisnis</p>
              </div>
              <div class="input-group">
                <div class="input-group-addon">
                  <input type="checkbox" checked aria-label="...">
                </div>
                <p class="inline deskrip form-control"><i class="fa fa-fire fa-fw"></i> Komik</p>
              </div>
              <div class="input-group">
                <div class="input-group-addon">
                  <input type="checkbox" checked aria-label="...">
                </div>
                <p class="inline deskrip form-control"><i class="fa fa-book fa-fw"></i> Bacaan sehari-hari</p>
              </div>
              <!-- <div class="list-group">
                <p class="inline"><i class="fa fa-book fa-fw"></i> Edukasi</p></span>
                <p class="inline"><i class="fa fa-money fa-fw"></i> Bisnis</p></span>
                <p class="inline"><i class="fa fa-fire fa-fw"></i> Komik</p></span>
                <p class="inline"><i class="fa fa-book fa-fw"></i> Bacaan sehari-hari</p></span>
              </div> -->
            </div>
            <div class="range">
              <h2>Range harga</h2>
              <div class="col-md-5 no-padding">
                <select class="form-control" name="">
                  <option value="kurang1jt">Rp0</option>
                  <option value="kurang1jt">Rp100.000</option>
                  <option value="kurang1jt">Rp300.000</option>
                  <option value="kurang1jt">Rp400.000</option>
                </select>
              </div>
              <div class="col-md-2 no-padding no-space"><p class="text-center divider">-</p></div>
              <div class="col-md-5 no-padding">
                <select class="form-control" name="">
                  <option value="kurang1jt">Rp50.000</option>
                  <option value="kurang1jt">Rp350.000</option>
                  <option value="kurang1jt" selected="true">Rp500.000</option>
                </select>
              </div>
            </div>
            <div class="col-md-12 add-space first-content no-padding">
              <button type="submit" class="btn btn-primary" name="tag">Apply</button>
            </div>
            <div class="promoted first-content">
              <h1 class="garisbawah no-margin">Rekomendasi</h1>
              <a href="#">
                <div class="media">
                  <div class="media-body garisbawah">
                    <h4 class="media-heading">Ini judul buku</h4>
                    <small>oleh WR. Supratman</small>
                  </div>
                </div>
              </a>
              <a href="#">
                <div class="media ">
                  <div class="media-body garisbawah">
                    <h4 class="media-heading">Ini judul buku</h4>
                    <small>oleh WR. Supratman</small>
                  </div>
                </div>
              </a>
              <a href="#">
                <div class="media">
                  <div class="media-body garisbawah">
                    <h4 class="media-heading">Ini judul buku</h4>
                    <small>oleh WR. Supratman</small>
                  </div>
                </div>
              </a>
              <a href="#">
                <div class="media ">
                  <div class="media-body garisbawah">
                    <h4 class="media-heading">Ini judul buku</h4>
                    <small>oleh WR. Supratman</small>
                  </div>
                </div>
              </a>
              <a href="#">
                <div class="media ">
                  <div class="media-body garisbawah">
                    <h4 class="media-heading">Ini judul buku</h4>
                    <small>oleh WR. Supratman</small>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-9">
            <div class="featured">
              <ul>
                <li>
                  <div class="media ">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object" src="../assets/bg.jpeg" alt="Judul Buku">
                      </a>
                    </div>
                    <div class="media-body garisbawah">
                      <a href="#"><h4 class="media-heading">Ini judul buku</h4></a>
                      <small>oleh WR. Supratman</small>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam blanditiis neque sit necessitatibus architecto iusto voluptates ex optio, quia, ipsam cupiditate esse maiores vero dolore.</p>
                      <div class="navbody">
                        <div class="col-md-6 no-padding">
                          <small class="inline">Share : </small>
                          <a class="sosmed" href="https://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title; ?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=550,height=400"><img src="../assets\fb.png" alt="Share to Facebook"></a>
                          <a class="sosmed" href="whatsapp://send?text=Lihat buku di gedebuk.com, bagus!"data-action="share/whatsapp/share"><img src="../assets\wa.png" alt="Share to Instagram"></a>
                          <a class="sosmed" href="https://twitter.com/share?source=sharethiscom&text=<?php echo $title;?>&url=<?php echo $url; ?>&via=gedebuk.com"><img src="../assets\tw.png" alt="Share to Twiter"></a>
                        </div>
                        <div class="col-md-6 attention">
                          <a href="#"><button type="button" class="btn btn-primary" name="button">Sewa</button></a>
                          <a href="#"><button type="button" class="btn btn-danger" name="button">Beli</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media ">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object" src="../assets/bg.jpeg" alt="Judul Buku">
                      </a>
                    </div>
                    <div class="media-body garisbawah">
                      <a href="#"><h4 class="media-heading">Ini judul buku</h4></a>
                      <small>oleh WR. Supratman</small>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam blanditiis neque sit necessitatibus architecto iusto voluptates ex optio, quia, ipsam cupiditate esse maiores vero dolore.</p>
                      <div class="navbody">
                        <div class="col-md-6 no-padding">
                          <small class="inline">Share : </small>
                          <a class="sosmed" href="https://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title; ?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=550,height=400"><img src="../assets\fb.png" alt="Share to Facebook"></a>
                          <a class="sosmed" href="whatsapp://send?text=Lihat buku di gedebuk.com, bagus!"data-action="share/whatsapp/share"><img src="../assets\wa.png" alt="Share to Instagram"></a>
                          <a class="sosmed" href="https://twitter.com/share?source=sharethiscom&text=<?php echo $title;?>&url=<?php echo $url; ?>&via=gedebuk.com"><img src="../assets\tw.png" alt="Share to Twiter"></a>
                        </div>
                        <div class="col-md-6 attention">
                          <a href="#"><button type="button" class="btn btn-primary" name="button">Sewa</button></a>
                          <a href="#"><button type="button" class="btn btn-danger" name="button">Beli</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media ">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object" src="../assets/bg.jpeg" alt="Judul Buku">
                      </a>
                    </div>
                    <div class="media-body garisbawah">
                      <a href="#"><h4 class="media-heading">Ini judul buku</h4></a>
                      <small>oleh WR. Supratman</small>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam blanditiis neque sit necessitatibus architecto iusto voluptates ex optio, quia, ipsam cupiditate esse maiores vero dolore.</p>
                      <div class="navbody">
                        <div class="col-md-6 no-padding">
                          <small class="inline">Share : </small>
                          <a class="sosmed" href="https://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title; ?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=550,height=400"><img src="../assets\fb.png" alt="Share to Facebook"></a>
                          <a class="sosmed" href="whatsapp://send?text=Lihat buku di gedebuk.com, bagus!"data-action="share/whatsapp/share"><img src="../assets\wa.png" alt="Share to Instagram"></a>
                          <a class="sosmed" href="https://twitter.com/share?source=sharethiscom&text=<?php echo $title;?>&url=<?php echo $url; ?>&via=gedebuk.com"><img src="../assets\tw.png" alt="Share to Twiter"></a>
                        </div>
                        <div class="col-md-6 attention">
                          <a href="#"><button type="button" class="btn btn-primary" name="button">Sewa</button></a>
                          <a href="#"><button type="button" class="btn btn-danger" name="button">Beli</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media ">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object" src="../assets/bg.jpeg" alt="Judul Buku">
                      </a>
                    </div>
                    <div class="media-body garisbawah">
                      <a href="#"><h4 class="media-heading">Ini judul buku</h4></a>
                      <small>oleh WR. Supratman</small>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam blanditiis neque sit necessitatibus architecto iusto voluptates ex optio, quia, ipsam cupiditate esse maiores vero dolore.</p>
                      <div class="navbody">
                        <div class="col-md-6 no-padding">
                          <small class="inline">Share : </small>
                          <a class="sosmed" href="https://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title; ?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=550,height=400"><img src="../assets\fb.png" alt="Share to Facebook"></a>
                          <a class="sosmed" href="whatsapp://send?text=Lihat buku di gedebuk.com, bagus!"data-action="share/whatsapp/share"><img src="../assets\wa.png" alt="Share to Instagram"></a>
                          <a class="sosmed" href="https://twitter.com/share?source=sharethiscom&text=<?php echo $title;?>&url=<?php echo $url; ?>&via=gedebuk.com"><img src="../assets\tw.png" alt="Share to Twiter"></a>
                        </div>
                        <div class="col-md-6 attention">
                          <a href="#"><button type="button" class="btn btn-primary" name="button">Sewa</button></a>
                          <a href="#"><button type="button" class="btn btn-danger" name="button">Beli</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media ">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object" src="../assets/bg.jpeg" alt="Judul Buku">
                      </a>
                    </div>
                    <div class="media-body garisbawah">
                      <a href="#"><h4 class="media-heading">Ini judul buku</h4></a>
                      <small>oleh WR. Supratman</small>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam blanditiis neque sit necessitatibus architecto iusto voluptates ex optio, quia, ipsam cupiditate esse maiores vero dolore.</p>
                      <div class="navbody">
                        <div class="col-md-6 no-padding">
                          <small class="inline">Share : </small>
                          <a class="sosmed" href="https://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title; ?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=550,height=400"><img src="../assets\fb.png" alt="Share to Facebook"></a>
                          <a class="sosmed" href="whatsapp://send?text=Lihat buku di gedebuk.com, bagus!"data-action="share/whatsapp/share"><img src="../assets\wa.png" alt="Share to Instagram"></a>
                          <a class="sosmed" href="https://twitter.com/share?source=sharethiscom&text=<?php echo $title;?>&url=<?php echo $url; ?>&via=gedebuk.com"><img src="../assets\tw.png" alt="Share to Twiter"></a>
                        </div>
                        <div class="col-md-6 attention">
                          <a href="#"><button type="button" class="btn btn-primary" name="button">Sewa</button></a>
                          <a href="#"><button type="button" class="btn btn-danger" name="button">Beli</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
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
