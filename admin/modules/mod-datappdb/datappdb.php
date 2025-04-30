  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <!--<h1 class="m-0 text-dark">DATA USERS</h1>-->
              </div><!-- /.col -->
              
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->



   <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
  <?php
    //defined("VALIDASI") or die( "Tidak diperkenankan mengakses file ini secara langsung !" );
    $modul = $_GET['module'];
    
    if(isset($_GET['act'])){
      $act = $_GET['act'];
      if($act=="view"){
        include $modul."_view".".php";
      } elseif ($act=="create" ||
                $act=="update" ||
                $act=="proses" ||
                $act=="kirim" ||
                $act=="proses2" ||
                $act=="proses3" ||
                $act=="delete1" ||
                $act=="delete") {
        include $modul."_act.php";
      } elseif ($act=="add") {
        include $modul."_add.php";
      } elseif ($act=="cetak") {
        include $modul."cetak.php";
      } elseif ($act=="edit") {
        include $modul."_edit.php";
      } elseif ($act=="editsekolah") {
        include $modul."_editsekolah.php";
      } elseif ($act=="detail") {
        include $modul."_detail.php";
      } elseif ($act=="view1") {
        include $modul."_view1.php";
      }	elseif ($act=="view2") {
        include $modul."_view2.php";
      }

    }


  ?>

  </div><!-- /.col -->
            </div><!-- /.row -->
          
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>