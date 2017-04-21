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
        <li><a href="publish.php">Posting Buku</a></li>
        <?php
          if($login) { ?>
            <li><a href="akun.php">Dashboard</a></li>
            <li><a  href="logout.php"><span class="text-warning">Log out</span></a></li>
          <?php
          } else { ?>
            <li><a href="login.php">Log In</a></li>
            <li><a  href="register.php"><span class="text-warning">Register</span></a></li>
          <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--end of nav -->
