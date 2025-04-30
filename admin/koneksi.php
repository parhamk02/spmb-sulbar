<?php

$server = "localhost"; //server phpmyadmin (localhost)
$username = "root"; //username untuk masuk phpmyadmin (root)
$password = ""; //pasword untuk masuk phpmyadmin (kosong)
$database = "aplikasi_dispenda"; //database

$koneksi = mysqli_connect($server, $username, $password, $database) //untuk koneksi kedatabase
or die ("Database tidak ada"); //kalau database terpanggil muncul pesan

?>