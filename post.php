<?php
require_once 'core/init.php';
require_once 'view/header.php';
require_once 'view/navbar_fix.php';

$allPost = showAllPost();

$url          = $_GET['show'];
$readData     = showPostByUrl($url);
$trackView    = viewsCounter($url);

if(isset($_GET['show'])) {
  $readData = showPostByUrl($url);
  while($row = mysqli_fetch_assoc($readData)) {
    $judulBuku      = $row['judul'];
    $penulisPost    = $row['nama'];
    $penulisBuku    = $row['pengarang'];
    $tahunTerbit    = $row['tahun_terbit'];
    $hargaBeli      = $row['harga_beli'];
    $hargaSewa      = $row['harga_sewa'];
    $cod            = $row['cod'];
    $stock          = $row['jumlah_tersedia'];
    $tag            = $row['tag'];
    $deskripsi      = $row['deskripsi'];
    $views          = $row['views'];
  }
}

?>
    <section class="produk">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-default">
              <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Kategori</a></li>
                <li><a href="#">Produk</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="photo-wrapper thumbnail">
              <img src="../assets/bg.jpeg" class="img-responsive img-thumbnail" alt="">
            </div>
            <table class="table table-bordered">
              <tr>
                <td>Judul Buku</td>
                <td><?php echo $judulBuku; ?></td>
              </tr>
              <tr>
                <td>Penulis Buku</td>
                <td><?php echo $penulisBuku; ?></td>
              </tr>
              <tr>
                <td>Tahun terbit</td>
                <td><?php echo $tahunTerbit; ?></td>
              </tr>
              <tr>
                <td>Harga Sewa</td>
                <td><?php echo $hargaSewa; ?></td>
              </tr>
              <tr>
                <td>Harga Beli</td>
                <td><?php echo $hargaBeli; ?></td>
              </tr>
              <tr>
                <td>Stok Buku</td>
                <td><?php echo $stock; ?></td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td><?php echo $tag; ?></td>
              </tr>
              <tr>
                <td>COD</td>
                <td><?php echo $cod; ?></td>
              </tr>
            </table>
          </div>
          <div class="col-md-8">
            <div class="featured no-margin no-padding">
              <div class="col-md-6 garisbawah">
                <h2><?php echo $judulBuku; ?></h2>
                <small><i class="fa fa-pencil-square-o"></i> Diposting: <?php echo $penulisPost; ?></small>
                <p class="text-muted">Dilihat: <?php echo $views; ?> kali</p>
                <p class="text-muted">Tersedia</p>
              </div>
              <div class="col-md-6 garisbawah">
                <button type="submit" name="button">Sewa</button>
                <button type="submit" name="button">Beli</button>
              </div>
              <div class="description">
                <legend>
                  <label for="">Deskripsi</label>
                  <p>
                    <?php echo $deskripsi; ?>
                  </p>
                </legend>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php require_once 'view/footer.php'; ?>

    <script src="js/jquery.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
