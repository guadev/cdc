<?php

function login($username, $password) {
  global $link;
  $username = escape($username);
  $password = escape($password);

  $password = md5($password);

  $query    = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result   = mysqli_query($link, $query);

  if(mysqli_num_rows($result) != 0) {
    return true;
  } else {
    return false;
  }
}

function register($firstname, $lastname, $username, $email, $password, $identitas, $noIdentitas, $alamat, $noHP, $asal) {
  global $link;
  $firstname  = escape($firstname);
  $lastname   = escape($lastname);
  $username   = escape($username);
  $email      = escape($email);
  $password   = escape($password);
  $identitas  = escape($identitas);
  $noIdentitas= escape($noIdentitas);
  $alamat     = escape($alamat);
  $noHP       = escape($noHP);
  $asal       = escape($asal);

  $password   = md5($password);
  $query      = "SELECT * FROM users WHERE username = '$username'";
  $result     = mysqli_query($link, $query);
  $row        = mysqli_fetch_assoc($result);
  if($row == 0) {
    $query    = "INSERT INTO users(firstname, lastname, username, email, password, identitas, no_identitas, alamat, no_hp, asal, online)
                  VALUES('$firstname', '$lastname', '$username', '$email', '$password', '$identitas', '$noIdentitas', '$alamat', '$noHP', '$asal', 0)";
    $register = mysqli_query($link, $query);
    return true;
  } else {
    return false;
  }
}

function online($username) {
  global $link;
  $query  = "UPDATE users SET online = 1 WHERE username='$username'";
  $result = mysqli_query($link, $query);
  return $result;
}

function offline($username) {
  global $link;
  $query  = "UPDATE users SET online = 0 WHERE username='$username'";
  $result = mysqli_query($link, $query);
  return $result;
}

function loginadmin($password) {
  global $link;
  $password = escape($password);
  $password = md5($password);
  $query    = "SELECT username, password, status FROM users WHERE username = 'admin' AND password = '$password' AND status = 1";
  $result   = mysqli_query($link, $query);

  if(mysqli_num_rows($result) != 0) {
    return true;
  } else {
    return false;
  }
}

 ?>
