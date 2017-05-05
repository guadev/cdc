<?php


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
  //user duplicate
  $query      = "SELECT * FROM users WHERE username = '$username'";
  $result     = mysqli_query($link, $query);
  $row1        = mysqli_fetch_assoc($result);
  //email duplicate
  $query      = "SELECT * FROM users WHERE email = '$email'";
  $result     = mysqli_query($link, $query);
  $row2        = mysqli_fetch_assoc($result);
  //email validation
  $valid=emailValidation($email);

  if($row1 == 0 && $row2==0 && $valid==true) {
    $query    = "INSERT INTO users(firstname, lastname, username, email, password, identitas, no_identitas, alamat, no_hp, asal, online)
                  VALUES('$firstname', '$lastname', '$username', '$email', '$password', '$identitas', '$noIdentitas', '$alamat', '$noHP', '$asal', 0)";
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

function login($username, $password) {
  global $link;

  $password = escape($password);
  $password = md5($password);
  $query    = "SELECT username, password FROM users WHERE username = '$username' AND password = '$password'";
  $result1   = mysqli_query($link, $query);
  $query    = "SELECT username, email, password FROM users WHERE email = '$username' AND password = '$password'";
  $result2   = mysqli_query($link, $query);

  if(mysqli_num_rows($result1) != 0) {
    $_SESSION['user']=$username;
    return true;
  } else if (mysqli_num_rows($result2) != 0) {
    $row=mysqli_fetch_assoc($result2);
    $_SESSION['user']=$row['username'];
    return true;
  }else{
    return false;
  }
}

 ?>
