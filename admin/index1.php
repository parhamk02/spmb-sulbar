<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script>alert('Anda Harus Login'); window.location = 'login'</script>"; 
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
require_once("app/config.php");
$config = new config();
date_default_timezone_set("Asia/Makassar");
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="dist/img/lpmp.png">
  <title>SOLATA</title>
    
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <link rel="stylesheet" href="plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-bootstrap/main.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <?php
    if ($_SESSION['level']=="pegawai") {
        $levelnotif = "ASN";
        $tampil   = $config->tampil_notif1($levelnotif);
        $tampil8  = $config->tampil_notif1($levelnotif);
       }elseif($_SESSION['level']=="ppnpn") {
        $levelnotif = "PPNPN";
        $tampil   = $config->tampil_notif1($levelnotif);
        $tampil8  = $config->tampil_notif1($levelnotif);
       }else{
        $tampil   = $config->tampil_notifikasi1();
        $tampil8  = $config->tampil_notifikasi1();
       }
    $id_admin = $_SESSION['id_admin'];
    $tampil11  = $config->notif_kegiatanpegawai($id_admin);
    $notif1 = mysqli_num_rows($tampil11);
    $notif = mysqli_num_rows($tampil8)+$notif1;
    if ($_SESSION['jabatan']=='Pengadministrasi Kepegawaian') {
          $tampilcuti1 = $config->tampil_pengajuancuti3();
          $cuti1 = mysqli_num_rows($tampilcuti1);
          $notif = $notif+$cuti1;
    }
    ?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" onClick="document.location.reload(true)">
          <i class="fas fa-redo-alt" style='color:green'></i>
        </a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php echo $notif ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <?php
          $tampil1  = $config->notif_kegiatanpegawai($id_admin);
          while($data = mysqli_fetch_assoc($tampil)){
            $deskripsi = $data['notifikasi'];
        ?>
          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-notif" data-id="<?php echo $data['id_notifikasi'] ?>">
            <i class="fas fa-envelope mr-2"></i><?php echo $deskripsi ?> .....
            
          </a>
          <div class="dropdown-divider"></div>
        <?php
        } 
        while($data1 = mysqli_fetch_assoc($tampil1)){
        ?>
          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-notif1" data-id="<?php echo $data1['id_kegiatanpegawai'] ?>">
            <i class="fas fa-envelope mr-2"></i><?php echo $data1['catatan'] ?> .....
            
          </a>
          <div class="dropdown-divider"></div>
        <?php
        }
        ?>
        </div>
      </li>-->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="far fa-bell"></i>
          </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/lpmp.png" alt="BPMP SULBAR" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">BPMP SULBAR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php
          if ($_SESSION['level']=='Admin') {
        ?>
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        <?php
          }elseif ($_SESSION['level']=='pegawai') {
        ?>
            <img src="foto_pegawai/<?php echo $_SESSION['foto'] ?>" class="img-circle elevation-2" alt="User Image">
        <?php
          }elseif($_SESSION['level']=='ppnpn') {
        ?>
            <img src="foto_ppnpn/<?php echo $_SESSION['foto'] ?>" class="img-circle elevation-2" alt="">
        <?php
        }
        ?>
        </div>
        <div class="info">
        <?php
          if ($_SESSION['level']=='Admin') {
        ?>
          <a href="#" class="d-block"><?php echo $_SESSION['nama_lengkap'] ?></a>
        <?php
        }elseif ($_SESSION['level']=='pegawai') {
        ?>
        <a href="asnedit-<?php echo $_SESSION['id_admin'] ?>" class="d-block"><?php echo $_SESSION['nama_lengkap'] ?></a>
        <?php
        }elseif($_SESSION['level']=='ppnpn') {
        ?>
        <a href="ppnpnedit-<?php echo $_SESSION['id_admin'] ?>" class="d-block"><?php echo $_SESSION['nama_lengkap'] ?></a>
        <?php
        }
        ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="home" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <?php
          if ($_SESSION['level']=='Admin') {
          ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pelayanan Tamu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="layanan" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Layanan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="bukutamu" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Buku Tamu
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="kerjasama" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Layanan Kerjasama
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="layananinfo" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Layanan Informasi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pengaduan" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Pengaduan
                </p>
              </a>
            </li>
          </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kepegawaian
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="asn" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="ppnpn" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data PPNPN
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="jenis-cuti" class="nav-link">
                <i class="nav-icon fas fa-sign"></i>
                <p>
                  Data Jenis Cuti
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="jenis-izin" class="nav-link">
                <i class="nav-icon fas fa-sign"></i>
                <p>
                  Data Jenis Izin
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pengajuan-cuti" class="nav-link">
                <i class="nav-icon fas fa-indent"></i>
                <p>
                  Data Pengajuan Cuti
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pengajuan-izin" class="nav-link">
                <i class="nav-icon fas fa-indent"></i>
                <p>
                  Data Pengajuan Izin
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pengajuanizin-ppnpn" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Data Pengajuan Izin PPNPN
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="asn-log" class="nav-link">
                <i class="nav-icon fas fa-sticky-note"></i>
                <p>
                  Log Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="ppnpn-log" class="nav-link">
                <i class="nav-icon fas fa-sticky-note"></i>
                <p>
                  Log PPNPN
                </p>
              </a>
            </li>
            <!--<li class="nav-item">
              <a href="kegiatan-pegawai" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Kegiatan Pegawai
                </p>
              </a>
            </li>
            
           <li class="nav-item">
              <a href="absen-log" class="nav-link">
                <i class="nav-icon fas fa-sticky-note"></i>
                <p>
                  Log Absen
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="kinerja-harian" class="nav-link">
                <i class="nav-icon fas fa-camera"></i>
                <p>
                  Galery Kinerja Harian Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="kinerjaharian-ppnpn" class="nav-link">
                <i class="nav-icon fas fa-camera"></i>
                <p>
                  Galery Kinerja Harian PPNPN
                </p>
              </a>
            </li>-->
            <li class="nav-item">
              <a href="asnterlambat" class="nav-link">
                <i class="nav-icon fas fa-times"></i>
                <p>
                  Data Pegawai Terlambat
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="ppnpnterlambat" class="nav-link">
                <i class="nav-icon fas fa-times"></i>
                <p>
                  Data PPNPN Terlambat
                </p>
              </a>
            </li>
          </ul>
        </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pengelolaan Sarpras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="sarpras" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Data Sarpras
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="harga" class="nav-link">
                <i class="nav-icon fas fa-money-bill-alt"></i>
                <p>
                  Data Harga/Sewa Sarpras
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="galerigedung" class="nav-link">
                <i class="nav-icon fas fa-image"></i>
                <p>
                  Data Galery Sarpras
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="peminjaman" class="nav-link">
                <i class="nav-icon fas fa-city"></i>
                <p>
                  Data Peminjaman Sarpras
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="peminjaman-IDzoom" class="nav-link">
                <i class="nav-icon fas fa-indent"></i>
                <p>
                  Data Peminjaman ID ZOOM
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="peminjaman-bmn" class="nav-link">
                <i class="nav-icon fas fa-indent"></i>
                <p>
                  Data Peminjaman BMN
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pemesanan" class="nav-link">
                <i class="nav-icon fas fa-indent"></i>
                <p>
                  Data Pemesanan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="inventaris-bmn" class="nav-link">
                <i class="nav-icon fas fa-indent"></i>
                <p>
                  Data Inventaris BMN
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="persediaan-bmn" class="nav-link">
                <i class="nav-icon fas fa-indent"></i>
                <p>
                  Data Persediaan BMN
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="logpersediaan-bmn" class="nav-link">
                <i class="nav-icon fas fa-indent"></i>
                <p>
                  Log Persediaan BMN
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tamu-wisma" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Data Tamu Wisma
                </p>
              </a>
            </li>
            <li class="nav-item">
                  <a href="tamu" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Data Tamu
                    </p>
                  </a>
            </li>
            <li class="nav-item">
              <a href="maintenance" class="nav-link">
                <i class="nav-icon fas fa-wrench"></i>
                <p>
                  Data Maintenance Sarpras
                </p>
              </a>
            </li>
          </ul>
          </li>
          <li class="nav-item">
            <a href="kegiatan-lembaga" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kegiatan Lembaga
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="notifikasi" class="nav-link">
                <i class="nav-icon fas fa-bullhorn"></i>
                <p>
                 Data Notifikasi
                </p>
              </a>
            </li>
          <li class="nav-item">
            <a href="log-security" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Log Security
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data-admin" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Admin
              </p>
            </a>
          </li>
          <?php
          }elseif ($_SESSION['level']=='pegawai') {
          ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pelayanan Tamu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="bukutamu" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Buku Tamu
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="kerjasama" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Layanan Kerjasama
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="layananinfo" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Layanan Informasi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pengaduan" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Pengaduan
                </p>
              </a>
            </li>
          </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kepegawaian
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
            <?php
            if ($_SESSION['jabatan']=='Kepala LPMP (Eselon 3)' or $_SESSION['jabatan']=='Kepala Subbagian' or $_SESSION['jabatan']=='Pengadministrasi Kepegawaian'){
            ?>
            <li class="nav-item">
              <a href="asn" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="ppnpn" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data PPNPN
                </p>
              </a>
            </li>
            <!--<li class="nav-item">
              <a href="asn-log" class="nav-link">
                <i class="nav-icon fas fa-sticky-note"></i>
                <p>
                  Log Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="ppnpn-log" class="nav-link">
                <i class="nav-icon fas fa-sticky-note"></i>
                <p>
                  Log PPNPN
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pengajuanizin-ppnpn" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Data Pengajuan Izin PPNPN
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="kinerjaharian-ppnpn" class="nav-link">
                <i class="nav-icon fas fa-camera"></i>
                <p>
                  Galery Kinerja Harian PPNPN
                </p>
              </a>
            </li>-->
            <?php
            }
            ?>
            <li class="nav-item">
              <a href="pengajuan-cuti" class="nav-link">
                <i class="nav-icon fas fa-indent"></i>
                <p>
                  Data Pengajuan Cuti Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pengajuan-izin" class="nav-link">
                <i class="nav-icon fas fa-indent"></i>
                <p>
                  Data Pengajuan Izin Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="asnterlambat" class="nav-link">
                <i class="nav-icon fas fa-times"></i>
                <p>
                  Data Pegawai Terlambat
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="ppnpnterlambat" class="nav-link">
                <i class="nav-icon fas fa-times"></i>
                <p>
                  Data PPNPN Terlambat
                </p>
              </a>
            </li>
            <!--<li class="nav-item">
              <a href="kegiatan-pegawai" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Kegiatan Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="kinerja-harian" class="nav-link">
                <i class="nav-icon fas fa-camera"></i>
                <p>
                  Galery Kinerja Harian Pegawai
                </p>
              </a>
            </li>-->
          </ul>
         </li>
        <?php
          if ($_SESSION['jabatan']=='Pengelola Wisma' or $_SESSION['jabatan']=='Pengadministrasi Sarana dan Prasarana' or $_SESSION['jabatan']=='Kepala Subbagian' or $_SESSION['jabatan']=='Kepala LPMP (Eselon 3)') {
          ?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Pengelolaan Sarpras
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="sarpras" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                      Data Sarpras
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="peminjaman" class="nav-link">
                    <i class="nav-icon fas fa-city"></i>
                    <p>
                      Data Peminjaman Sarpras
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="peminjaman-IDzoom" class="nav-link">
                    <i class="nav-icon fas fa-indent"></i>
                    <p>
                      Data Peminjaman ID ZOOM
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tamu-wisma" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                      Data Tamu Wisma
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tamu" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Data Tamu
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="maintenance" class="nav-link">
                    <i class="nav-icon fas fa-wrench"></i>
                    <p>
                      Data Maintenance Sarpras
                    </p>
                  </a>
                </li>
                <li class="nav-item">
              <a href="pemesanan" class="nav-link">
                <i class="nav-icon fas fa-indent"></i>
                <p>
                  Data Pemesanan
                </p>
              </a>
            </li>
              </ul>
              </li>
          <?php
          }
          if ($_SESSION['jabatan']=='Pengelola Barang Milik Negara' or $_SESSION['jabatan']=='Kepala Subbagian' or $_SESSION['jabatan']=='Kepala LPMP (Eselon 3)') {
          ?>
              <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Pengelolaan BMN
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
              <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="inventaris-bmn" class="nav-link">
                        <i class="nav-icon fas fa-indent"></i>
                        <p>
                          Data Inventaris BMN
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                          <a href="peminjaman-bmn" class="nav-link">
                            <i class="nav-icon fas fa-indent"></i>
                            <p>
                              Data Peminjaman BMN
                            </p>
                          </a>
                    </li>
                    <li class="nav-item">
                      <a href="persediaan-bmn" class="nav-link">
                        <i class="nav-icon fas fa-indent"></i>
                        <p>
                          Data Persediaan BMN
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="logpersediaan-bmn" class="nav-link">
                        <i class="nav-icon fas fa-indent"></i>
                        <p>
                          Log Persediaan BMN
                        </p>
                      </a>
                    </li>
                  </ul>
                </li>
            <?php
            }
            ?>
          <li class="nav-item">
            <a href="kegiatan-lembaga" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kegiatan Lembaga
              </p>
            </a>
          </li>
          <!--<li class="nav-item">
              <a href="log-security" class="nav-link">
                <i class="nav-icon fas fa-wrench"></i>
                <p>
                  Log Security
                </p>
              </a>
            </li>-->
          <?php
          }elseif ($_SESSION['level']=='ppnpn') {
            if ($_SESSION['jabatan']=='Resepsionis') {
            ?>
            <li class="nav-item">
              <a href="bukutamu" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Buku Tamu
                </p>
              </a>
            </li>
            <li class="nav-item">
                  <a href="tamu" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Data Tamu
                    </p>
                  </a>
                </li>
            <?php
            }
            if ($_SESSION['jabatan']=='Pramu Bakti') {
            ?>
            <li class="nav-item">
              <a href="maintenance" class="nav-link">
                <i class="nav-icon fas fa-wrench"></i>
                <p>
                  Data Maintenance Sarpras
                </p>
              </a>
            </li>
            <?php
            }
            if ($_SESSION['jabatan']=='Pramu Wisma') {
            ?>
            <li class="nav-item">
                  <a href="gedung-wisma-<?php echo $_SESSION['id_komsarpras'] ?>" class="nav-link">
                    <i class="nav-icon fas fa-city"></i>
                    <p>
                      Data Sarpras
                    </p>
                  </a>
            </li>
            <li class="nav-item">
              <a href="maintenance" class="nav-link">
                <i class="nav-icon fas fa-wrench"></i>
                <p>
                  Data Maintenance Sarpras
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tamu-wisma-<?php echo $_SESSION['id_komsarpras'] ?>" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Data Tamu Wisma
                </p>
              </a>
            </li>
            <?php
            }
            if ($_SESSION['jabatan']=='Teknisi Listrik dan Air') {
            ?>
            <li class="nav-item">
              <a href="maintenance" class="nav-link">
                <i class="nav-icon fas fa-wrench"></i>
                <p>
                  Data Maintenance Sarpras
                </p>
              </a>
            </li>
          <?php
            }
            if ($_SESSION['jabatan']=='Tenaga Keamanan') {
            ?>
            <!--<li class="nav-item">
              <a href="asn-log" class="nav-link">
                <i class="nav-icon fas fa-wrench"></i>
                <p>
                  Log Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="ppnpn-log" class="nav-link">
                <i class="nav-icon fas fa-sticky-note"></i>
                <p>
                  Log PPNPN
                </p>
              </a>
            </li>-->
            <li class="nav-item">
              <a href="log-security" class="nav-link">
                <i class="nav-icon fas fa-wrench"></i>
                <p>
                  Log Security
                </p>
              </a>
            </li>
          <?php
            }
          ?>
          <li class="nav-item">
              <a href="pengajuanizin-ppnpn" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Data Pengajuan Izin
                </p>
              </a>
            </li>
            <!--<li class="nav-item">
              <a href="kinerja-harian" class="nav-link">
                <i class="nav-icon fas fa-camera"></i>
                <p>
                  Galery Kinerja Harian
                </p>
              </a>
            </li>-->
          <?php
          }
          ?>
          <li class="nav-item">
            <a href="signout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <!--  <h1 class="m-0 text-dark">Si-Pengawal Ratu</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="btn btn-warning btn-sm"><marquee onmouseover="this.stop()" onmouseout="this.start()">RESPEK ( <b>Res</b>ponsive, <b>P</b>rof<b>e</b>sional, dan <b>K</b>olaboratif )</marquee></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <?php
          if ( isset( $_GET['module'] ) ) {
            if ($_GET['module']=='kelender') {
              include('kelender.php');
            }else{
              include( 'modules/mod-' . $_GET['module'] . '/' . $_GET['module'] . '.php' );
            }
          } else {
            include( 'home1.php' );
          }
          function bulan($bln){
          $bulan = $bln;
          Switch ($bulan){
           case 1 : $bulan="Januari";
           Break;
           case 2 : $bulan="Februari";
           Break;
           case 3 : $bulan="Maret";
           Break;
           case 4 : $bulan="April";
           Break;
           case 5 : $bulan="Mei";
           Break;
           case 6 : $bulan="Juni";
           Break;
           case 7 : $bulan="Juli";
           Break;
           case 8 : $bulan="Agustus";
           Break;
           case 9 : $bulan="September";
           Break;
           case 10 : $bulan="Oktober";
           Break;
           case 11 : $bulan="November";
           Break;
           case 12 : $bulan="Desember";
           Break;
           }
          return $bulan;
          }
        ?>
        <!--  <button onclick="notifyMe('Pesan Baru', 'Ada Daftar Peminjaman Baru')">Notify me!</button> -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="modal-notif">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">NOTIFIKASI</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="coba">
                  <input type="hidden" class="form-control" id="id_notifikasi">
                  

                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

  <div class="modal fade" id="modal-notif1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">NOTIFIKASI</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="coba1">
                  <input type="hidden" class="form-control" id="id_kegiatanpegawai">
                  

                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
    <?php
    if ($_SESSION['jabatan']=='Pengadministrasi Kepegawaian' or $_SESSION['jabatan']=='Kepala Subbagian' or $_SESSION['jabatan']=='Kepala LPMP (Eselon 3)') {
          $tampilcuti = $config->tampil_pengajuancuti3();
          $tampilizin = $config->tampil_pengajuanizin3();
          $cuti = mysqli_num_rows($tampilcuti);
          $izin = mysqli_num_rows($tampilizin);
          if ($cuti>0) {
          ?>
          <h5>Pengajuan Cuti</h5>
          <?php
          while ($dcuti = mysqli_fetch_assoc($tampilcuti)) {
          ?>
          <p><a href="pengajuan-cuti"><?php echo $dcuti['nama_pegawai']." (".$dcuti['status'].")"; ?></a></p>
          <?php
          }
        }

          if ($izin>0) {
          ?>
          <h5>Pengajuan Izin ASN</h5>
          <?php
          while ($dizin = mysqli_fetch_assoc($tampilizin)) {
          ?>
          <p><a href="pengajuan-izin"><?php echo $dizin['nama_pegawai']." (".$dizin['status'].")"; ?></a></p>
          <?php
          }
        }
        
        $tampilizin = $config->tampil_pengajuanizinppnpn1();
          $izin = mysqli_num_rows($tampilizin);
              if ($izin>0) {
                ?>
                <h5>Pengajuan Izin PPNPN</h5>
                <?php
                while ($dizin = mysqli_fetch_assoc($tampilizin)) {
                ?>
                <p><a href="pengajuanizin-ppnpn"><?php echo $dizin['nama_ppnpn']." (".$dizin['status'].")"; ?></a></p>
                <?php
                }
              }
  }else{
        $id=$_SESSION['id_admin'];
        if ($_SESSION['level']=='pegawai') {
        $tampilcuti = $config->detail_pengajuancutinotif($id);
        $cuti = mysqli_num_rows($tampilcuti);
        $tampilizin = $config->detail_pengajuanizinnotif($id);
          if ($cuti>0) {
        ?>
            <h5>Pengajuan Cuti</h5>
        <?php
            while ($dcuti = mysqli_fetch_assoc($tampilcuti)) {
        ?>
              <p><a href="pengajuan-cuti"><?php echo $dcuti['nama_pegawai']." (".$dcuti['status'].")"; ?></a></p>
        <?php
            }
          }

          $izin = mysqli_num_rows($tampilizin);
          if ($izin>0) {
            ?>
            <h5>Pengajuan Izin ASN</h5>
            <?php
            while ($dizin = mysqli_fetch_assoc($tampilizin)) {
            ?>
            <p><a href="pengajuan-izin"><?php echo $dizin['nama_pegawai']." (".$dizin['status'].")"; ?></a></p>
            <?php
            }
          }
        }elseif($_SESSION['level']=='ppnpn'){
        $tampilizin = $config->detail_pengajuanizinppnpn1($id);
        $izin = mysqli_num_rows($tampilizin);
          if ($izin>0) {
            ?>
            <h5>Pengajuan Izin PPNPN</h5>
            <?php
            while ($dizin = mysqli_fetch_assoc($tampilizin)) {
            ?>
            <p><a href="pengajuanizin-ppnpn"><?php echo $dizin['nama_ppnpn']." (".$dizin['status'].")"; ?></a></p>
            <?php
            }
          }
        }
  }
    ?>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery --> 
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.flash.min.js"></script>
<script src="plugins/datatables-buttons/js/jszip.min.js"></script>
<script src="plugins/datatables-buttons/js/pdfmake.min.js"></script>
<script src="plugins/datatables-buttons/js/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<!-- Page Script -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/fullcalendar/main.min.js"></script>
<script src="plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="plugins/fullcalendar-interaction/main.min.js"></script>
<script src="plugins/fullcalendar-bootstrap/main.min.js"></script>
  
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    
    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    

    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },

      'themeSystem': 'bootstrap',


      //Random default events
      events    : [
        <?php 
      $tampil = $config->tampil_peminjaman();
      while($data = mysqli_fetch_assoc($tampil)){
      ?>
        {
          id: '<?php echo $data['id_peminjaman']; ?>',
          title: '<?php echo $data['kegiatan']; ?>',
          start: '<?php echo $data['mulai']; ?>',
          end: '<?php echo date('Y-m-d', strtotime('+1days', strtotime($data['sampai']))); ?>',
          color: '#0071c5',
          allDay: true
        },
      <?php } ?>
      ],
      editable  : false,
      droppable : false,
      eventLimit: false, // allow "more" link when too many events
      selectable: true,
      selectHelper: true, // this allows things to be dropped onto the calendar !!!
      eventClick: function(info) {
        info.jsEvent.preventDefault();
        //element.bind('click', function() {
        $.ajax({
                url: "get_peminjaman.php",
                data: "id_peminjaman="+info.event.id,
                cache: false,
                success: function(msg){
                        //jika data sukses diambil dari server kita tampilkan
                        //di <select id=kota>
                        $("#coba").html(msg);
                    }
                });
          $('#modal-tamu2').modal('show');
        //})
      },
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
     
      
  })
</script>
<script>
  $(function () {
     
    $("#example1").DataTable({
      "responsive": true,
      "ordering": true,
      "autoWidth": true,
      "lengthChange": true,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      scrollY:        '21vh',
      scrollCollapse: true,
      paging:         false
    });
    $('#export').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    $("#log3").DataTable({
      "responsive": true,
      "order": [ 1, "desc" ]
    });
  });
</script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){

<?php
if ($_SESSION['level']=="ppnpn") {
?>
  $('#id_log').focus();  
<?php
}
?>


  $('#identitas').hide();  
  //apabila terjadi event onchange terhadap object <select id=propinsi>

function narasumber()
{
  var Baris = "<div class='col-sm-6'>";
      Baris += "<div class='form-group'>";
      Baris += "<input type='text' class='form-control' placeholder='Jenis Narasumber' name='jenis_narasumber[]'>";
      Baris += "</div>";
      Baris += "</div>";
      Baris += "<div class='col-sm-6'>";
      Baris += "<div class='form-group'>";
      Baris += "<input type='text' class='form-control' placeholder='Asal Instansi Narasumber' name='instansi_narasumber[]'>";
      Baris += "</div>";
      Baris += "</div>";

  $('#unsurjenis').append(Baris);
}

function struktur()
{
  var Baris = "<div class='col-md-4'>";
      Baris += "<div class='form-group'>";
      Baris += "<input type='text' class='form-control' placeholder='Nama Materi' name='nama_materi[]'>";
      Baris += "</div>";
      Baris += "</div>";
      Baris += "<div class='col-md-4'>";
      Baris += "<div class='form-group'>";
      Baris += "<input type='text' class='form-control' placeholder='Nama Pemateri' name='nama_pemateri[]'>";
      Baris += "</div>";
      Baris += "</div>";
      Baris += "<div class='col-md-4'>";
      Baris += "<div class='form-group'>";
      Baris += "<input type='text' class='form-control' placeholder='Durasi' name='durasi[]'>";
      Baris += "</div>";
      Baris += "</div>";

  $('#program').append(Baris);
}


function sarpras()
{
  var Baris = "<div class='col-md-6'>";
      Baris +="<div class='form-group'>";
      Baris +="<select class='form-control select3' name='sarpras[]'>";
      Baris +="<?php $tampil   = $config->tampil_komsarpras1(); ?>";
      Baris +="<?php while($data = mysqli_fetch_assoc($tampil)){ ?>";
      Baris +="<option value='<?php echo $data['id_komsarpras'] ?>'><?php echo $data['nama_komsarpras'] ?></option>";
      Baris +="<?php } ?>";
      Baris +="</select>";
      Baris += "</div>";
      Baris += "</div>";
      Baris += "<div class='col-md-6'>";
      Baris += "<div class='form-group'>";
      Baris += "<input type='date' class='form-control' placeholder='' name='tgl_peminjamandetail[]'>";
      Baris += "</div>";
      Baris += "</div>";

  $('#sarpras1').append(Baris);
}

function surattugas()
{
  var Baris = "<div class='col-md-4'>";
      Baris += "<div class='form-group'>";
      Baris += "<input type='text' class='form-control' placeholder='Nama Instansi' name='instansi_eksternal[]'>";
      Baris += "</div>";
      Baris += "</div>";
      Baris += "<div class='col-md-4'>";
      Baris += "<div class='form-group'>";
      Baris += "<input type='text' class='form-control' placeholder='Nomor Surat' name='instansi_no[]'>";
      Baris += "</div>";
      Baris += "</div>";
      Baris += "<div class='col-md-4'>";
      Baris += "<div class='form-group'>";
      Baris += "<input type='text' class='form-control' placeholder='Tanggal Surat' name='instansi_tgl[]'>";
      Baris += "</div>";
      Baris += "</div>";

  $('#eksternal').append(Baris);
}

function narasumber()
{
  var Baris = "<div class='col-sm-6'>";
      Baris += "<div class='form-group'>";
      Baris += "<input type='text' class='form-control' placeholder='Jenis Narasumber' name='jenis_narasumber[]'>";
      Baris += "</div>";
      Baris += "</div>";
      Baris += "<div class='col-sm-6'>";
      Baris += "<div class='form-group'>";
      Baris += "<input type='text' class='form-control' placeholder='Asal Instansi Narasumber' name='instansi_narasumber[]'>";
      Baris += "</div>";
      Baris += "</div>";

  $('#unsurjenis').append(Baris);
}

function Ganti()
{
  var tabel = document.getElementByid("tes");
  tabel.value = "sadkfja";
}

$('#print').click(function(){
    Ganti();
});

$('#sarpras').click(function(){
    sarpras();
    $('.select3').select2()
});

$('#narasumber').click(function(){
    narasumber();
});

$('#struktur').click(function(){
    struktur();
});

$('#tambahtamu').click(function(){
    $('#identitas').show();  
});

$('#surattugas').click(function(){
    surattugas();
});

$("#id_jenisizin").change(function(){
    var id_jenisizin = $("#id_jenisizin").val();
    if(id_jenisizin == "1"){
      $('#waktu').show();  
      $('#tempat1').hide();  
      $('#lama1').hide();  
    }else if(id_jenisizin == "2"){
      $('#waktu').hide();  
      $('#tempat1').hide();  
      $('#lama1').hide();  
    }else if(id_jenisizin == "3"){
      $('#waktu').show();  
      $('#tempat1').show();  
      $('#lama1').hide();
    }else{
      $('#waktu').hide();  
      $('#tempat1').hide();  
      $('#lama1').show();
    }
  });

$("#jenis_kegiatan").change(function(){
    var jenis_kegiatan = $("#jenis_kegiatan").val();
    if(jenis_kegiatan == "Internal"){
      $('#internal').show();   
    }else{
      $('#internal').hide();  
    }
  });

  $("#id_layanan").change(function(){
    var id_layanan = $("#id_layanan").val();
    $.ajax({
        url: "get_sublayanan.php",
        data: "id_layanan="+id_layanan,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#id_sublayanan").html(msg);
        }
    });
  });

  $("#pegawai").change(function(){
    var pegawai = $("#pegawai").val();
    $.ajax({
        url: "get_pegawai.php",
        data: "pegawai="+pegawai,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#nama_lengkap").html(msg);
        }
    });
  });

$("#id_sarpras").change(function(){
    var id_sarpras      = $("#id_sarpras").val();
    $.ajax({
        url: "get_sarpras1.php",
        data: "id_sarpras="+id_sarpras,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#id_komsarpras").html(msg);
        }
    });
  });

$("#id_jeniscuti").change(function(){
    var id_jeniscuti      = $("#id_jeniscuti").val();
    var kuota_cuti      = $("#kuota_cuti").val();
    if (id_jeniscuti==1) {
    $('#lama_cuti').attr('placeholder','Sisa Kuota Cuti Tahunan '+kuota_cuti);
    $('#lama_cuti').attr('max',kuota_cuti);
    }else{
    $('#lama_cuti').attr('placeholder','Lama Cuti');
    $('#lama_cuti').removeAttr('max', kuota_cuti);
    }
  });
  
 $("#instansi").change(function(){
    var instansi      = $("#instansi").val();
    if (instansi=='Lainnya') {
        $('#instansi1').attr('type','text');
        $('#instansi1').focus();
    }else{
        $('#instansi1').attr('type','hidden');
    }
  });

$("#id_komsarpras").change(function(){
    var id_komsarpras      = $("#id_komsarpras").val();
    $.ajax({
        url: "get_inventaris.php",
        data: "id_komsarpras="+id_komsarpras, 
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#id_inventaris").html(msg);
        }
    });
  });

$("#mulai").change(function(){
    var mulai      = $("#mulai").val();
    var sampai     = $("#sampai").val();
    $.ajax({
        url: "get_sarpras.php",
        data: "mulai="+mulai+"&sampai="+sampai,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#id_komsarpras").html(msg);
        }
    });
  });

  $("#tanggallog").change(function(){
    var tanggallog      = $("#tanggallog").val();
    $.ajax({
        url: "get_log.php",
        data: "tanggal="+tanggallog,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#log").html(msg);
        }
    });
  });

  $("#tanggallogppnpn").change(function(){
    var tanggallog      = $("#tanggallogppnpn").val();
    $.ajax({
        url: "get_logppnpn.php",
        data: "tanggal="+tanggallog,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#log").html(msg);
        }
    });
  });
  
$('#simpan').click(function(){
              $.ajax({
              type:"POST",
              url:"proses.php",
              data:$("#simpantamu").serialize(),
                success:function(data){
                  $("#id_tamu").html(data);
                },
              });
        document.getElementById("simpantamu").reset();
});

$('#simpanact').click(function(){
    var modul = $("#module").val();
    var act = $("#act").val();
    document.getElementById("simpanact").disabled = true;
              $.ajax({
              type:"POST",
              url:"index.php?module="+modul+"&act="+act,
              data:$("#forminput").serialize(),
                success:function(data){
                  document.getElementById("forminput").reset();
                  alert('Data Berhasil Disimpan');
                  window.history.back();
                },
              });
        
});

  $("#sampai").change(function(){
    var mulai      = $("#mulai").val();
    var sampai     = $("#sampai").val();
    $.ajax({
        url: "get_sarpras.php",
        data: "mulai="+mulai+"&sampai="+sampai,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#id_komsarpras").html(msg);
        }
    });
  });

});

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#modal-cuti').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            //$.ajax({
            //    type : 'post',
            ///    url : 'detail.php',
            //    data :  'rowid='+ rowid,
            //    success : function(data){
            //    $('.fetched-data').html(data);//menampilkan data ke dalam modal
            //    }
            //});
            $('#id_pengajuancuti').val(rowid);
         });

        $('#modal-cuti1').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            //$.ajax({
            //    type : 'post',
            ///    url : 'detail.php',
            //    data :  'rowid='+ rowid,
            //    success : function(data){
            //    $('.fetched-data').html(data);//menampilkan data ke dalam modal
            //    }
            //});
            $('#id_pengajuancuti1').val(rowid);
         });

        $('#modal-cuti2').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            //$.ajax({
            //    type : 'post',
            ///    url : 'detail.php',
            //    data :  'rowid='+ rowid,
            //    success : function(data){
            //    $('.fetched-data').html(data);//menampilkan data ke dalam modal
            //    }
            //});
            $('#id_pengajuancuti2').val(rowid);
         });

        $('#keputusan_pejabat').change(function(){
            var keputusan_pejabat = $("#keputusan_pejabat").val();
            var tes = 1;
            if(keputusan_pejabat == "Perubahan"){
            $('#lama_cuti').attr('type','number');
            }else{
            $('#lama_cuti').attr('type','hidden');  
            }
         });

        $('#modal-bmn').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $('#id_peminjamanbmn').val(rowid);
         });

        $('#modal-sarpras').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
            url: "get_peminjamandetail.php",
            data: "id_bukutamu="+rowid,
            cache: false,
            success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#coba").html(msg);
                }
            });
            $('#id_bukutamu').val(rowid);

         });

        $('#modal-notif').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
            url: "get_notif.php",
            data: "id_notifikasi="+rowid,
            cache: false,
            success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#coba").html(msg);
                }
            });
         });

        $('#modal-notif1').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
            url: "get_notif.php",
            data: "id_kegiatanpegawai="+rowid,
            cache: false,
            success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#coba1").html(msg);
                }
            });
         });

        $('#modal-detail1').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
            url: "get_detail.php",
            data: "id_pemesanan="+rowid,
            cache: false,
            success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#detail").html(msg);
                }
            });
         });

        $('#modal-proses').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $('#id_pemesanan').val(rowid);

         });

        $('#modal-detail').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
            url: "get_detailcuti.php",
            data: "id_pengajuancuti="+rowid,
            cache: false,
            success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#coba").html(msg);
                }
            });

         });

        $('#modal-kegiatanpegawai').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
            url: "get_kegiatanpegawai.php",
            data: "id_kegiatanpegawai="+rowid,
            cache: false,
            success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#coba").html(msg);
                }
            });
            $('#id_kegiatanpegawai').val(rowid);

         });        

        $('#modal-catatankegiatan').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            var rowid2 = $(e.relatedTarget).data('id2');
            $('#id_kegiatanpegawai1').val(rowid);
            $('#catatan').val(rowid2);
         });

        $('#modal-tamu').on('show.bs.modal', function (e) {
            var rowid1 = $(e.relatedTarget).data('id1');
            var rowid = $(e.relatedTarget).data('id');
            $('#id_tamuwisma').val(rowid);
            $('#tgl_cekout').attr('min',rowid1);

         });

        $('#modal-tamu1').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
            url: "get_tamu.php",
            data: "id_inventaris="+rowid,
            cache: false,
            success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#coba").html(msg);
                }
            });

         });

        $('#modal-foto').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
            url: "get_foto.php",
            data: "id_kinerja="+rowid,
            cache: false,
            success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#foto").html(msg);
                }
            });

         });

        $('#status_bmn').change(function(){
            var status_bmn = $("#status_bmn").val();
            if(status_bmn == "Disetujui"){
            $('#no_disposisi').attr('type','text');
            }else{
            $('#no_disposisi').attr('type','hidden');  
            }
         });

    });
</script>
<!--<script type="text/javascript">
  window.history.forward(1);
  </script>-->

  <!--<script type="text/javascript">
  $(document).ready(function(){
    $(".tombol-simpan").click(function(){
      var data = $('.form-input').serialize();
      var modul = $('#module').val();
      $.ajax({
        type: 'POST',
        url: "index.php?module="+modul+"&act=add",
        data: data,
        success: function() {
          $('.tampildata').load("tampil.php");
        }
      });
    });
  });
  </script>-->
  <script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()

    //Initialize Select2 Elements
    $('.select2').select2({
      
    });

    $('.select3').select2()
  })
</script>
<script>

  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    <?php
    $tampil1 = $config->grafik_tamu();
    $tampil2 = $config->grafik_tamu();
    $tampil3 = $config->grafik_tamu();
    ?>
    
    var areaChartData = {
      labels  : [
      <?php
      while($data1 = mysqli_fetch_assoc($tampil1)){
      ?>
      '<?php echo bulan($data1['bulan'])?>',
      <?php } ?>
      ],
      datasets: [
        {
          label               : 'Jumlah Tamu',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
          <?php
          while($data2 = mysqli_fetch_assoc($tampil2)){
          ?>
          <?php echo $data2['jumlah']?>,
          <?php } ?>
          ]
        }
      ]
    }


    var areaChartData1 = {
      labels  : [<?php
      while($data3 = mysqli_fetch_assoc($tampil3)){
      ?>
      '<?php echo bulan($data3['bulan'])?>',
      <?php } ?>],
      datasets: [
      <?php
      $warna = array('rgb(127, 255, 1)','rgb(100, 149, 237)','rgb(165, 42, 42)','rgb(251, 140, 1)','rgb(189, 183, 107)');
      $tampil4   = $config->tampil_layanan();
      $no=0;
      while($data4 = mysqli_fetch_assoc($tampil4)){
      ?>
        {
          label               : '<?php echo $data4['nama_layanan']?>',
          backgroundColor     : '<?php echo $warna[$no]?>',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
          <?php
          $id_layanan = $data4['id_layanan'];
          $tampil5   = $config->detail_bukutamu1($id_layanan);
          while($data5 = mysqli_fetch_assoc($tampil5)){
          ?>  
          <?php echo $data5['jumlah']?>,
        <?php } ?>
          ]
        },
      <?php $no++; } ?>
      ]
    }

   

   

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    barChartData.datasets[0] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas1 = $('#barChart1').get(0).getContext('2d')
    var barChartData1 = jQuery.extend(true, {}, areaChartData1)
    var temp0 = areaChartData1.datasets[0]
    var temp1 = areaChartData1.datasets[1]
    var temp2 = areaChartData1.datasets[2]
    var temp3 = areaChartData1.datasets[3]
    var temp4 = areaChartData1.datasets[4]
    barChartData1.datasets[0] = temp0
    barChartData1.datasets[1] = temp1
    barChartData1.datasets[2] = temp2
    barChartData1.datasets[3] = temp3
    barChartData1.datasets[4] = temp4

    var barChartOptions1 = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart1 = new Chart(barChartCanvas1, {
      type: 'bar', 
      data: barChartData1,
      options: barChartOptions1
    })

   
    
  })
</script>

<script type="text/javascript">
    function notifyMe(msg_title, msg_body, redirect_onclick) {
        var granted = 0;
 
        // Let's check if the browser supports notifications
        if (!("Notification" in window)) {
            alert("This browser does not support desktop notification");
        }
 
        // Let's check if the user is okay to get some notification
        else if (Notification.permission === "granted") {
            granted = 1;
        }
 
        // Otherwise, we need to ask the user for permission
        else if (Notification.permission !== 'denied') {
            Notification.requestPermission(function (permission) {
                // If the user is okay, let's create a notification
                if (permission === "granted") {
                    granted = 1;
                }
            });
        }
 
        if (granted == 1) {
            var notification = new Notification(msg_title, {
                body: msg_body,
                icon: 'notif-icon.png'
            });
 
            if (redirect_onclick) {
                notification.onclick = function() {
                    window.location.href = redirect_onclick;
                }
            }
        }
    }
</script>
</body>
</html>
<?php
}
?>