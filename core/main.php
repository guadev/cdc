<?php

function showAllPost($start, $perPage = null) {
  global $link; //mengambil nilai variabel dari $link pada koneksi db
  $query  = "SELECT buku.*, user.nama, user.no_id FROM buku, user WHERE id_penjual = no_id ORDER BY id_buku DESC LIMIT $start, $perPage";
  $result = mysqli_query($link, $query) or die('Gagal memuat post!');
  return $result;
}

function indexPost() {
  global $link; //mengambil nilai variabel dari $link pada koneksi db
  $query  = "SELECT buku.*, user.nama, user.no_id FROM buku, user WHERE id_penjual = no_id ORDER BY id_buku DESC LIMIT 10";
  $result = mysqli_query($link, $query) or die('Gagal memuat post!');
  return $result;
}

function akun($profile) {
  global $link;
  $query = "SELECT * FROM user WHERE user_name = '$profile'";
  $result = mysqli_query($link, $query) or die('Gagal memuat informasi user!');
  return $result;
}

function showAkunPost($profile) {
  global $link;
  $query  = "SELECT buku.*, user.nama, user.user_name, user.no_id FROM buku, user WHERE id_penjual = no_id AND user_name = '$profile' ORDER BY id_buku DESC";
  $result = mysqli_query($link, $query) or die('Gagal memuat post!');
  return $result;
}

function publishBuku($judul, $penulisBuku, $tahunTerbit, $stock, $tag, $hargaSewa, $hargaBeli, $deskripsi, $cod, $penulisPost, $tglPost, $no_id) {
  $judul          = escape($judul);
  $penulisBuku    = escape($penulisBuku);
  $tahunTerbit    = escape($tahunTerbit);
  $stock          = escape($stock);
  $tag            = escape($tag);
  $hargaSewa      = escape($hargaSewa);
  $hargaBeli      = escape($hargaBeli);
  $deskripsi      = escape($deskripsi);
  $alamat         = escape($alamat);
  $cod            = escape($cod);
  $penulisPost    = escape($penulisPost);
  $tglPost        = escape($tglPost);
  $no_id          = escape($no_id);
  $url            = time(); //generate random int for url

  $query = "INSERT INTO buku(url, judul, pengarang, tahun_terbit, harga_beli, harga_sewa, jumlah_tersedia, tgl_publikasi, id_penjual, tag, status, deskripsi, cod, views)
            VALUES('$url', '$judul', '$penulisBuku', '$tahunTerbit', $hargaBeli, '$hargaSewa', '$stock', '$tglPost', '$no_id', '$tag', 0, '$deskripsi', '$cod', 0)";
  return run($query);
}

function run($query) {
  global $link;
  if(mysqli_query($link, $query)) {
    return true;
  } else {
    return false;
  }
}

function showPostByUrl($url) {
  global $link;
  $query = "SELECT buku.*, user.nama, user.no_id FROM buku, user WHERE id_penjual = no_id AND url = '$url'";
  $result = mysqli_query($link, $query) or die('Gagal memuat postingan!');
  return $result;
}

function editData($judul, $konten, $tag, $id) {
    $query = "UPDATE blog SET judul='$judul', konten='$konten', tag='$tag' WHERE id='$id'";
    return run($query);
}

function deletePost($url) {
  $query = "DELETE buku.* FROM buku, user WHERE url='$url' AND id_penjual = no_id";
  return run($query);
}

function excerpt($string, $max) { //membatasi karakter yang ditampilkan
  $string = substr($string, 0, $max);

  return $string . '...';
}

function escape($data) {
  global $link;
  return mysqli_real_escape_string($link, $data);
}

function viewsCounter($url) {
  global $link;
  $query = "UPDATE buku SET views = views + 1 WHERE url = '$url'";
  $result = mysqli_query($link, $query) or die('null');
  return $result;
}

function popularPost() {
  global $link;
  $query = "SELECT * FROM buku ORDER BY views DESC LIMIT 5";
  $result = mysqli_query($link, $query);
  return $result;
}

function isSubmit() {
  if (isset($_POST['submit'])) {
    return true;
  }
  return false;
}

function upload($context)//context=user/buku
{
  $maxSize=250000;//250kb
  //////////////////////////////
  $file_id =$_FILES['gambar']['name'];
  $file_location = $_FILES['gambar']['tmp_name'];
  $file_error = $_FILES['gambar']['error'];
  $file_format = $_FILES['gambar']['type'];
  $file_size = $_FILES['gambar']['size'];
  $file_ext  = '.'.pathinfo($file_id, PATHINFO_EXTENSION);
  $file_basename  = str_replace($file_ext, "",$file_id);
  $file_dir = 'upload/'.$context.'/';
  /////////////////////////////////////////
  $gambar = $file_dir .time(). $file_ext;

  if($file_error==0){
    if ($file_format=='image/jpeg'||$file_format=='image/png') {
      if ($file_size<=$maxSize) {
        // file_exists($filename) ini untuk mengecek apakah ada yg sama
        move_uploaded_file($file_location, $gambar);
        echo "<script>console.log('gambar terupload!!');</script>";
      }else {
        die( "<script>alert('Ukuran gambar tidak boleh lebih dari 250kB!')</script>");
        //error ukuran
      }
    }else {
      die( "<script>alert('Format gambar yang diperbolehkan hanya jpg/jpeg/png!')</script>");
      //error format
    }
  }
  return $gambar;//kembalikan id_gambar
}

 ?>
