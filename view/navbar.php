<?php
require_once 'core/init.php';
$login = false;
if(isset($_SESSION['user'])) {
  $login = true;
}
 ?>

<!-- nav -->
<nav id="home-bar" class="navbar navbar-hidden" data-nav-status="toggle">
  <div class="container">
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
      <form class="navbar-form navbar-left search" action="search" method="get">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Ketik judul buku...">
        </div>
        <button type="submit" class="btn btn-default">Cari</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <?php
          if($login) { ?>
            <li><a href="forum/">Forum</a></li>
            <li><a href="publish">Posting Buku</a></li>
            <li><a href="akun">Dashboard</a></li>
            <li><a  href="logout"><span class="text-warning">Log out</span></a></li>
          <?php
          } else { ?>
            <li><a href="login">Log In</a></li>
            <li><a  href="register"><span class="text-warning">Register</span></a></li>
          <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--end of nav -->
