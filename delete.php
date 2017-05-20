<?php
require_once 'core/init.php';

if(!isset($_SESSION['user'])) {
  header('location:index');
}

if(isset($_GET['show'])) {
  if(deletePost($_GET['show'])) {
    header('location:akun');
  } else {
    echo 'Gagal menghapus postingan.';
  }
}

?>
