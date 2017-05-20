<?php
require_once 'core/init.php';
require_once 'view/header.php';
require_once 'view/navbar_fix.php';

if(!isset($_SESSION['user'])) {
  header('location:login');
}
$profile = $_SESSION['user'];
$readData = akun($profile);
$akunPost = showAkunPost($profile);

$bookPost = mysqli_num_rows($akunPost);
$noPost = false;
if($bookPost != 0) {
  $noPost = true;
}

while($row = mysqli_fetch_assoc($readData)) {
  $nama     = $row['nama'];
  $jenis_id = $row['jenis_id'];
  $no_id    = $row['no_id'];
  $alamat   = $row['alamat'];
  $hp       = $row['hp'];
  $akademik = $row['akademik'];
  $gender   = $row['gender'];
  $tgl_gabung = $row['tgl_gabung'];
  if($gender == 'L') {
    $gender = 'Laki-laki';
  } else {
    $gender = 'Perempuan';
  }
}

?>

    <section class="sec">
      <div class="container">
        <div class="row">
          <br><br><br>
          <div class="col-md-3">
            <div class="photo-wrapper">
              <img src="../assets/bg.jpeg" class="img-responsive img-thumbnail" alt="">
            </div>
          </div>
          <div class="col-md-8">
            <div class="featured no-margin no-padding">
              <h2><?php echo $nama; ?></h2>
              <!-- <small><i class="fa fa-star"></i> Premium User</small><br> -->
              <small>Kartu Identitas: <?php echo $jenis_id; ?></small><br>
              <small>No <?php echo $jenis_id . ': ' . $no_id; ?></small><br>
              <small>Jenis kelamin: <?php echo $gender; ?></small><br>
              <small>Alamat: <?php echo $alamat; ?></small><br>
              <small>Contact: <?php echo $hp; ?></small><br>
              <?php if(!empty($akademik)) { ?>
                <small>Sekolah/Universitas: <?php echo $akademik; ?></small>
              <?php } ?>
              <p>Bergabung sejak <?php echo $tgl_gabung; ?></p>
              <ul class="nav nav-pills">
                <li role="presentation" class="active"><a href="#" class="garisbawah">Buku Saya</a></li>
                <li role="presentation" ><a href="#" class="garisbawah">Pengaturan akun</a></li>
              </ul>

              <?php
              if($noPost) {
              while($row2 = mysqli_fetch_array($akunPost)) { ?>
              <div class="media ">
                <div class="media-left">
                  <a href="post?show=<?php echo $row2['url']; ?>">
                    <img class="media-object" src="../assets/coverbuku.jpg" alt="Judul Buku">
                  </a>
                </div>
                <div class="media-body garisbawah">
                  <a href="post?show=<?php echo $row2['url']; ?>"><h4 class="media-heading"><?php echo $row2['judul']; ?></h4></a>
                  <small><?php echo $row2['pengarang']; ?></small>
                  <p><?php echo excerpt($row2['deskripsi'], 250); ?></p>
                  <div class="navbody">
                    <div class="col-md-6">
                      <a href="delete?show=<?php echo $row2['url']; ?>"><button type="button" class="btn btn-primary" name="button">Hapus</button></a>
                      <a href="post?show=<?php echo $row2['url']; ?>"><button type="button" class="btn btn-danger" name="button">Lihat</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <?php } } else { ?>
                <br>
                <div class="alert alert-warning" role="alert"><strong>Oh! </strong>Belum ada koleksi buku. <strong><a href="publish" style="color:#8a6d3b;">Pasarkan</a></strong> buku anda di sini untuk mendapatkan income tambahan dan membantu orang yang membutuhkan.</div>
              <?php }  ?>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php require_once 'view/footer.php'; ?>
