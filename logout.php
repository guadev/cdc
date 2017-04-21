<?php
require_once 'core/init.php';

if(isset($_SESSION['user'])) {
  offline($_SESSION['user']);
  session_unset();
  session_destroy();
  header('location:login.php');
} else {
  header('location:index.php');
}

 ?>
