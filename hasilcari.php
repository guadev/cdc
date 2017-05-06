<?php
require_once 'core/init.php';

$value = $_POST['value'];
?>

  <ul>

<?php
$query = mysqli_query($link, "SELECT judul, pengarang, url FROM buku WHERE judul LIKE '%$value%' LIMIT 5");


while($run = mysqli_fetch_array($query)) {

  $judul = $run['judul'];
  $url	 = $run['url']; ?>
  <li><br><a href="post.php?=show<?php echo $url;?>"><?php echo $judul; ?></a></li><br>

<?php } ?>

</ul>
