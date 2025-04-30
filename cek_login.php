<?php
session_start();
require_once('admin/app/config2.php');
include "admin/app/function_antiinjection.php";

$username = antiinjeksi($_POST['username']);
$password = antiinjeksi(md5($_POST['password']));

$login = mysqli_query($mysqli, "SELECT * FROM siswa WHERE nisn = '$username' AND password = '$password'");
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

if($ketemu > 0){
  $_SESSION['id'] = $r['id_siswa'];
  $_SESSION['nama_siswa'] = $r['nama_siswa'];
  $_SESSION['nik'] = $r['nik'];
  $_SESSION['nisn'] = $r['nisn'];
  $_SESSION['no_kk'] = $r['no_kk'];
  $_SESSION['password'] = $r['password'];
  $_SESSION['alamat'] = $r['alamat'];
  $_SESSION['email'] = $r['email'];

  $sid_lama = session_id();
  session_regenerate_id();
  $sid_baru = session_id();
  mysqli_query($mysqli, "UPDATE siswa SET id_session = '$sid_baru' WHERE nisn = '$username'");
  echo "<script>
      alert('Selamat Datang $r[nama_siswa]');
      document.location.href='daftar';
   </script>";
}else{
  echo "<script>
      alert('Maaf Username atau Password Yang Anda Masukkan Salah');
      document.location.href='daftar';
   </script>";
}
?>