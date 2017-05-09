<?php

function showAllPost() {
  global $link; //mengambil nilai variabel dari $link pada koneksi db
  $query  = "SELECT buku.*, user.nama, user.no_id FROM buku, user WHERE id_penjual = no_id ORDER BY id_buku DESC LIMIT 5";
  $result = mysqli_query($link, $query) or die('Gagal memuat post!');
  return $result;
}

function akun($profile) {
  global $link;
  $query = "SELECT buku.*, user.* FROM buku, user WHERE user_name = '$profile' AND id_penjual = no_id";
  $result = mysqli_query($link, $query) or die('Gagal memuat postingan!');
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
            VALUES('$url', '$judul', '$penulisBuku', '$tahunTerbit', $hargaBeli, '$hargaSewa', '$stock', $tglPost, '$no_id', '$tag', 0, '$deskripsi', '$cod', 0)";
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

function deleteData($id) {
  $query = "DELETE FROM blog WHERE id='$id'";
  return run($query);
}

function excerpt($string) { //membatasi karakter yang ditampilkan
  $string = substr($string, 0, 250);

  return $string . '...';
}

function excerpt50($string) { //membatasi karakter yang ditampilkan
  $string = substr($string, 0, 70);

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

 ?>
