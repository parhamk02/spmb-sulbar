<?php include "head.php"; ?>
<?php include "sidebar.php"; ?>
<?php
require_once("app/config.php");
$config = new config();
date_default_timezone_set("Asia/Makassar");
        if ( isset( $_GET['module'] ) ) {
              include( 'modules/mod-' . $_GET['module'] . '/' . $_GET['module'] . '.php' );
          }
      ?>
<?php include "foot.php"; ?>