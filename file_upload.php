<?php
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
