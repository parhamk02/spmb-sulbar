<?php
  //defined("VALIDASI") or die( "Tidak diperkenankan mengakses file ini secara langsung !" );
  $modul = $_GET['module'];
  
  if(isset($_GET['act'])){
    $act = $_GET['act'];
    if($act=="view"){
      include $modul."_view".".php";
    } elseif ($act=="create" ||
              $act=="update" ||
              $act=="delete") {
      include $modul."_act.php";
    } elseif ($act=="add") {
      include $modul."_add.php";
    } elseif ($act=="cetak") {
      include $modul."cetak.php";
    } elseif ($act=="edit") {
      include $modul."_edit.php";
    } elseif ($act=="detail") {
      include $modul."_detail.php";
    }
  }


?>
