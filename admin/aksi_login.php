<?php
session_start();
require_once('app/config2.php');
include "app/function_antiinjection.php";

$username = antiinjeksi($_POST['username']);
$password = antiinjeksi(md5($_POST['password']));

$login = mysqli_query($mysqli, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

if($ketemu > 0){
  $_SESSION['id'] = $r['id_users'];
  $_SESSION['name'] = $r['name'];
  $_SESSION['username'] = $r['username'];
  $_SESSION['password'] = $r['password'];
  $_SESSION['alamat'] = $r['alamat'];
  $_SESSION['foto'] = $r['foto'];
  $_SESSION['level'] = $r['level'];

  $sid_lama = session_id();
  session_regenerate_id();
  $sid_baru = session_id();
  mysqli_query($mysqli, "UPDATE users SET id_session = '$sid_baru' WHERE username = '$username'");
  echo "<script>
      alert('Selamat Datang $r[name]');
      document.location.href='dashboard';
   </script>";
}else{
$login = mysqli_query($mysqli, "SELECT * FROM sekolah WHERE npsn = '$username' AND password = '$password'");
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

if($ketemu > 0){
  $_SESSION['id'] = $r['id_sekolah'];
  $_SESSION['name'] = $r['nama_sekolah'];
  $_SESSION['username'] = $r['npsn'];
  $_SESSION['status'] = $r['status'];
  $_SESSION['alamat'] = $r['alamat'];
  $_SESSION['id_kec'] = $r['id_kec'];
  $_SESSION['id_kel'] = $r['id_kel'];
  $_SESSION['foto'] = $r['foto'];
  $_SESSION['level'] = "Pengguna";
  $_SESSION['jenjang'] = $r['jenjang'];
  

  $sid_lama = session_id();
  session_regenerate_id();
  $sid_baru = session_id();
  mysqli_query($mysqli, "UPDATE sekolah SET id_session = '$sid_baru' WHERE npsn = '$username'");
  echo "<script>
     alert('Selamat Datang $r[nama_sekolah]');
    document.location.href='dashboard';
  </script>";
}else{
  echo "<script>
      alert('Username/Password salah');
      document.location.href='index.php';
    </script>";
}
}
//else{
  //echo "<script>
    //  alert('Username/Password salah');
      //document.location.href='index.php';
    //</script>";
//}
?>