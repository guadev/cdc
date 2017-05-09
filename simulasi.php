<?php
require_once 'core/init.php';

$today = date('j-m-Y');
echo 'Hari ini: ' . $today;
echo '<br>';
$time = new DateTime($today);

echo 'Mulai sewa: ' . $today;
echo '<br>';
$time->modify('+25 day');
$balikin = $time->format('j - m - Y');
echo 'Tanggal balikin buku: ' . $balikin;
echo '<br>';
