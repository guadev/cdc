<?php


function register($nama, $username, $email, $password, $identitas, $no_identitas, $gender, $alamat, $hp, $asal) {
  global $link;
  $nama       = escape($nama);
  $username   = escape($username);
  $email      = escape($email);
  $password   = escape($password);
  $identitas  = escape($identitas);
  $no_identitas= escape($no_identitas);
  $gender     = escape($gender);
  $alamat     = escape($alamat);
  $hp         = escape($hp);
  $asal       = escape($asal);
  //enkripsi password
  $password   = md5($password);
  //user duplicate
  $query      = "SELECT * FROM user WHERE user_name = '$username'";
  $result     = mysqli_query($link, $query);
  $row1       = mysqli_fetch_assoc($result);
  //email duplicate
  $query      = "SELECT * FROM user WHERE email = '$email'";
  $result     = mysqli_query($link, $query);
  $row2        = mysqli_fetch_assoc($result);
  //email validation
  $valid = emailValidation($email);

  if($row1 == 0 && $row2 == 0 && $valid == true) {
    $query    = "INSERT INTO user(nama, user_name, email, password, jenis_id, no_id, hp, alamat, jenis_kelamin, akademik, online)
                  VALUES('$nama', '$username', '$email', '$password', '$identitas', '$no_identitas', '$hp', '$alamat', '$gender', '$asal', 0)";
    $register = mysqli_query($link, $query);
    return true;
  } else {
    return false;
  }
}

function emailValidation($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      return true;
    } else {
      return false;
    }
}

function online($username) {
  global $link;
  $query  = "UPDATE user SET online = 1 WHERE user_name='$username'";
  $result = mysqli_query($link, $query);
  return $result;
}

function offline($username) {
  global $link;
  $query  = "UPDATE user SET online = 0 WHERE user_name='$username'";
  $result = mysqli_query($link, $query);
  return $result;
}

function login($username, $password) {
  global $link;

  $username = escape($username);
  $password = escape($password);
  $password = md5($password);
  $query    = "SELECT user_name, password FROM user WHERE user_name = '$username' AND password = '$password'";
  $result1   = mysqli_query($link, $query);
  $query    = "SELECT user_name, email, password FROM user WHERE email = '$username' AND password = '$password'";
  $result2   = mysqli_query($link, $query);

  if(mysqli_num_rows($result1) != 0) {
    $_SESSION['user'] = $username;
    return true;
  } else if (mysqli_num_rows($result2) != 0) {
      $row = mysqli_fetch_assoc($result2);
      $_SESSION['user'] = $row['user_name'];
      return true;
  } else {
      return false;
  }
}

 ?>
