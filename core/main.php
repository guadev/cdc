<?php

function showAllPost() {
  global $link; //mengambil nilai variabel dari $link pada koneksi db
  $query  = "SELECT * FROM post";
  $result = mysqli_query($link, $query) or die('Gagal memuat post!');
  return $result;
}

function informasiUsers() {
  global $link;
  $query = "SELECT * FROM users";
  $result = mysqli_query($link, $query) or die('Gagal memuat informasi users!');
  return $result;
}

function postingBuku($judulBuku, $penulisBuku, $tahunTerbit, $penerbit, $tag, $harga, $deskripsi, $alamat, $penulisPost, $jenisTransaksi) {
  $judulBuku    = escape($judulBuku);
  $penulisBuku   = escape($penulisBuku);
  $tahunTerbit  = escape($tahunTerbit);
  $penerbit     = escape($penerbit);
  $tag          = escape($tag);
  $harga        = escape($harga);
  $deskripsi    = escape($deskripsi);
  $alamat       = escape($alamat);
  $penulisPost  = escape($penulisPost);
  $jenisTransaksi= escape($jenisTransaksi);
  $urlPost      = time(); //random by time function

  $query = "INSERT INTO post(url_post, penulis_post, judul_buku, penulis_buku, tahun_terbit, penerbit, tag, harga, deskripsi_buku, alamat, jenis_transaksi)
            VALUES('$urlPost', '$penulisPost', '$judulBuku', '$penulisBuku', $tahunTerbit, '$penerbit', '$tag', $harga, '$deskripsi', '$alamat', '$jenisTransaksi')";
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
  $query = "SELECT * FROM post WHERE url_post='$url'";
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
  $string = substr($string, 0, 100); //hanya menampilkan 10 karakter awal

  return $string . '...';
}

function escape($data) {
  global $link;
  return mysqli_real_escape_string($link, $data);
}

function viewsCounter() {
  //setelah view per post selesai dikerjakan
}

 ?>
