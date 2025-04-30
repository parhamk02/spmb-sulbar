<!doctype html>
<html lang="en">
<?php
require_once("admin/app/config.php");
$config = new config();
date_default_timezone_set("Asia/Makassar");
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PPDB</title>
    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
     <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>

<body>
    <!--/Header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light stroke py-lg-0">
                <h1><a class="navbar-brand pe-xl-5 pe-lg-4" href="home">
                        <span class="w3yellow">PP</span>DB
                    </a></h1>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-lg-auto my-2 my-lg-0 navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#info">Info</a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link" href="#jadwal">Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="daftar">Pendaftaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pengumuman">Pengumuman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#daftarulang">Daftar Ulang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#juknis" >Juknis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kontak">Kontak</a>
                        </li>
                    </ul>
                </div>
                <!-- toggle switch for light and dark theme
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>

    <!--//Header-->
    <!--/Banner-Start-->
    <div class="inner-banner py-5">
        <section class="w3l-breadcrumb text-left py-sm-5 ">
            <div class="container">
                <div class="w3breadcrumb-gids">
                    <div class="w3breadcrumb-left text-left">
                        
                    </div>
                </div>

            </div>
        </section>
    </div>
    <!-- //main-slider -->
    <!--/w3l-midslider-->
    <div class="w3l-3-grids py-5" id="info">
        <!-- /grids -->
        <div class="container py-md-5">
            <div class="row">
                <div class="col-lg-7 stats_info-images pe-lg-5">
                    <div class="stats_info-images-right row">
                        <div class="col-6 mid-slider-content">
                            <img src="assets/images/bg8.png" class="img-fluid radius-image" alt="">
                        </div>
                        <div class="col-6 mid-slider-content">
                            <img src="assets/images/bg-5.jpg" class="img-fluid radius-image" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 title-content text-left ps-lg-5 mt-lg-0 mt-5">
                    <h6 class="title-subw3hny mb-1">PPDB</h6>
                    <h3 class="title-w3l mb-3">
                        Selamat Datang di Aplikasi Penerimaan Peserta Didik Baru Kabupaten Majene </h3>
                    <p class="mb-3" style="font-size: 14px;">Untuk Periode 2024 / 2025 ini, Dinas Pendidikan Kabupaten Majene menyediakan beberapa alternatif jalur seleksi. Silakan pelajari & pilih jalur yang sesuai untuk Anda.</p>
                    <ul class="icon-list-items mt-3">
                        <li class="icon-list-item">
                            <i aria-hidden="true" class="fas fa-check"></i>
                            <a href="#zonasi"> Zonasi </a>
                        </li>
                        <li class="icon-list-item mt-2">
                            <i aria-hidden="true" class="fas fa-check"></i>
                            <a href="#afirmasi">Afirmasi</a>
                        </li>
                        <li class="icon-list-item mt-2">
                            <i aria-hidden="true" class="fas fa-check"></i>
                            <a href="#pindah">Perpindahan Tugas Orang Tua/Wali</a>
                        </li>
                        <li class="icon-list-item mt-2">
                            <i aria-hidden="true" class="fas fa-check"></i>
                            <a href="#prestasi">Prestasi</a>
                        </li>
                    </ul>
                </div>
                <!--/grids -->
            </div>
            <!--/grids -->
        </div>
    </div>

    <!--//w3l-midslider-->
    <section class="w3l-services-6 py-5" id="daftar">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="title-services text-center">
                <h6 class="title-subw3hny mb-1">DAFTAR SEKARANG</h6>
            </div>
            <div class="grids-area-hny main-cont-wthree-fea row pt-3 mt-5">
                <div class="col-lg-3 col-md-6 grids-feature">
                    <div class="area-box" id="zonasi">
                        <div class="area-icon icon-red">
                            <span class="fas fa-map"></span>
                        </div>
                        <h4><a href="#zonasi" class="title-head">ZONASI</a></h4>
                        <p style="font-size: 1.2em">
                            . Ditujukan untuk siswa yang berdomisili di wilayah zonasi dari satuan pendidikan<br>
                            . jalur zonasi SD sebanyak 70% (tujuh puluh persen) dari daya tampung sekolah; dan<br>
                            . jalur zonasi SMP sebanyak 50% (lima puluh persen) dari daya tampung sekolah.<br>
                            . Domisili calon peserta didik berdasarkan alamat pada kartu keluarga (KK)<br>
                            . Apabila tidak memiliki KK, maka dapat digantikan dengan Surat Keterangan Domisili
                        </p>
                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning">ZONASI SD <i class="fas fa-maps ms-lg-4 ms-2"></i></a><br><br>
                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="btn btn-warning">ZONASI SMP <i class="fas fa-maps ms-lg-4 ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 grids-feature mt-md-0 mt-4">
                    <div class="area-box" id="afirmasi">
                        <div class="area-icon icon-green">
                            <span class="fas fa-edit"></span>
                        </div>
                        <h4><a href="#afirmasi" class="title-head">AFIRMASI</a></h4>
                        <p style="font-size: 1.2em">Jalur afirmasi paling sedikit 15% (lima persen) dari daya tampung sekolah</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 grids-feature mt-lg-0 mt-4">
                    <div class="area-box" id="pindah">
                        <div class="area-icon icon-blue">
                            <span class="fas fa-map-marker-alt"></span>
                        </div>
                        <h4><a href="#pindah" class="title-head">PERPINDAHAN TUGAS ORANG TUA/WALI</a></h4>
                        <p style="font-size: 1.2em">Jalur perpindahan tugas orang tua/wali paling banyak 5% (lima persen) dari daya tampung sekolah.</p>

                    </div>
                </div>    
                <div class="col-lg-3 col-md-6 grids-feature mt-lg-0 mt-4">
                    <div class="area-box" id="prestasi">
                        <div class="area-icon icon-blue">
                            <span class="fas fa-trophy"></span>
                        </div>
                        <h4><a href="#prestasi" class="title-head">PRESTASI</a></h4>
                        <p style="font-size: 1.2em">Jalur prestasi tidak berlaku untuk jalur pendaftaran calon peserta didik baru pada TK dan kelas 1 (satu) SD.</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <div class="w3l-3-grids py-5" id="juknis">
        <div class="container py-md-5 py-2">
            <div class="row mb-5 pb-lg-4">
                <div class="col-lg-4 pe-lg-4">
                    <div class="title-content text-left">
                        <h6 class="title-subw3hny mb-1">Juknis PPDB</h6>
                        <h6 class="title-w3l"></h6>
                    </div>
                </div>
                <div class="col-lg-8 mt-lg-0 mt-md-5 mt-4 ps-lg-4">
                    <p class=""></p>
                </div>
            </div>
                <div style="margin: 0 auto;">
                    <object data="file/Juknis.pdf" width="100%" height="400"></object>
                </div>
            <!--/row-1-->
        </div>
    </div>
    <!--//bottom-3-grids-->

    <section class="w3l-midslider py-5" id="jadwal">
        <!-- /grids -->
        <div class="container py-md-5">
            <div class="row">
                <div class="title-content text-center">
                    <h3 class="title-w3l mb-5 text-center">Jadwal Penerimaan Peserta Didik Baru</h3>
                </div>
                <div class="main-cont-wthree-2 align-items-center text-center pt-lg-4">
                    <div class="row align-items-center">
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <th>No</th>
                                <th>Jenis Kegiatan</th>
                                <th>Jadwal</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Pengumuman Pendaftaran</td>
                                    <td>2 s.d. 18 Mei 2024</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Pendaftaran</td>
                                    <td>21 Mei s.d.  28 Juni 2024</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Seleksi dan Validasi Data</td>
                                    <td>3 s.d. 28 Juni 2024</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Pengumuman</td>
                                    <td>29 Juni 2024</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Daftar Ulang</td>
                                    <td>2 s.d. 6 Juli 2024</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/grids -->
        </div>
    </section>

    <div class="w3l-3-grids py-5" id="pengumuman">
        <div class="container py-md-5 py-2">
                <div style="margin: 0 auto;">
                    

                    <div class="card">
              <div class="card-header">
                <h5 class="card-title">PENGUMUMAN</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <div class="form-group">
                    <select name="id_sekolah" id="id_sekolah" class="form-control select2 select2-warning" style="width: 40%;">
                            <option value="">Pilih Sekolah</option>
                       <?php
                            $datasekolah = $config->tampil_sekolah();
                            while($data1 = mysqli_fetch_assoc($datasekolah)){
                        ?>
                        <option value="<?php echo $data1['id_sekolah'] ?>"><?php echo $data1['nama_sekolah'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                     </div><br>
                     <div id="ppdb">
                            <table id="example1" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Umur</th>
                                        <th>Status</th>
                                        <th>Sekolah</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $siswa = $config->pengumuman_datappdb();
                                $no=1;
                                while($data = mysqli_fetch_assoc($siswa)){
                                $tanggal_lahir = new DateTime($data['tanggal_lahir']);
                                        $sekarang = new DateTime();
                                        if ($tanggal_lahir > $sekarang) { 
                                        $thn = "0";
                                        $bln = "0";
                                        $tgl = "0";
                                        }
                                        $thn = $sekarang->diff($tanggal_lahir)->y;
                                        $bln = $sekarang->diff($tanggal_lahir)->m;
                                        $tgl = $sekarang->diff($tanggal_lahir)->d;
                                ?>

                                    <tr>
                                        <td scope="row"><?php echo $no ?></td>
                                        <td><?php echo $data['nama_siswa'] ?></td>
                                        <td><?php echo $data['nik'] ?></td>
                                        <td><?php echo $thn." tahun ".$bln." bulan ".$tgl." hari" ?></td>
                                        <td><?php echo $data['status'] ?></td>
                                        <td><?php echo $data['sekolah'] ?></td>
                                    </tr>

                                <?php
                                $no++;
                                }
                                ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>

    
    <!-- Trigger/Open The Modal -->
<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ZONASI SD</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        <table id="example" class="table table-bordered table-striped" style="width:auto">
                            <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Nama Sekolah</th>
                                        <th>Kode Zonasi</th>
                                        <th>Kelurahan</th>
                                        <th>Daya Tampung</th>
                                        <th>NPSN</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $siswa = $config->tampil_zonasisd();
                                $no=1;
                                while($data = mysqli_fetch_assoc($siswa)){
                                ?>

                                    <tr>
                                        <td scope="row"><?php echo $no ?></td>
                                        <td><?php echo $data['nama_sekolah'] ?></td>
                                        <td><?php echo $data['kode_zonasi'] ?></td>
                                        <td><?php echo $data['kelurahan'] ?></td>
                                        <td><?php echo $data['kapasitas'] ?></td>
                                        <td><?php echo $data['npsn'] ?></td>
                                        <td><?php echo $data['alamat'] ?></td>
                                    </tr>

                                <?php
                                $no++;
                                }
                                ?>
                                </tbody>
                            </table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ZONASI SMP</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        <table id="example3" class="table table-bordered table-striped" style="width:auto">
                            <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Nama Sekolah</th>
                                        <th>Kode Zonasi</th>
                                        <th>Kecamatan</th>
                                        <th>Daya Tampung</th>
                                        <th>NPSN</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $siswa = $config->tampil_zonasismp();
                                $no=1;
                                while($data = mysqli_fetch_assoc($siswa)){
                                ?>

                                    <tr>
                                        <td scope="row"><?php echo $no ?></td>
                                        <td><?php echo $data['nama_sekolah'] ?></td>
                                        <td><?php echo $data['kode_zonasi'] ?></td>
                                        <td><?php echo $data['kecamatan'] ?></td>
                                        <td><?php echo $data['kapasitas'] ?></td>
                                        <td><?php echo $data['npsn'] ?></td>
                                        <td><?php echo $data['alamat'] ?></td>
                                    </tr>

                                <?php
                                $no++;
                                }
                                ?>
                                </tbody>
                            </table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<br>
    <!--/w3l-footer-29-main-->
    <footer class="w3l-footer-29-main" id="kontak">
        <div class="footer-29 py-5">
            <div class="container py-lg-4">
                <h2>Penerimaan Peserta Didik Baru<br>
                    Kabupaten Majene</h2>
                <div class="row footer-top-29 mt-md-5 mt-4">
                    <div class="col-lg-4 col-md-6 footer-list-29 footer-1">
                        <h6 class="footer-title-29">Address</h6>
                        <div class="footer-listw3-grids">
                            <ul class="footer-listw3">
                                <li>Sulawesi Barat</li>
                            </ul>

                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6 footer-list-29 footer-3 mt-lg-0 mt-5 pe-lg-5">
                        <h6 class="footer-title-29">Say hello</h6>
                        <div class="footer-listw3-grids">
                            <ul class="footer-listw3">
                                <li><a href="tel:+(21) 255 999 8888">+(21) 255 999 8888</a></li>

                            </ul>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 footer-list-29 footer-4 mt-lg-0 mt-5 ps-lg-5">
                        <h6 class="footer-title-29">Sosial Media</h6>
                        <p>BPMP Provinsi Sulawesi Barat</p>

                        <div class="main-social-footer-29 mt-4">
                            <a href="#facebook" class="facebook"><span class="fab fa-facebook-f"></span></a>
                            <a href="#twitter" class="twitter"><span class="fab fa-twitter"></span></a>
                            <a href="#instagram" class="instagram"><span class="fab fa-instagram"></span></a>

                            <a href="#linkd" class="linkd"><span class="fab fa-linkedin-in"></span></a>
                        </div>
                    </div>
                </div>
                <div class="bottom-copies text-center">
                    <p class="copy-footer-29">© 2024 BPMP SULBAR. All rights reserved | Designed by <a href="#">W3layouts</a></p>
                </div>
            </div>
        </div>

        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
            <span class="fa fa-angle-up"></span>
        </button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }

        </script>
        <!-- //move top -->
    </footer>
    <!-- Template JavaScript -->
    <<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script src="assets/js/theme-change.js"></script>
    <script src="assets/js/owl.carousel.js"></script>

    <script type="text/javascript"> 

$(document).ready(function() { 

  $("#id_sekolah").change(function(){
    var id_sekolah      = $("#id_sekolah").val();
    $.ajax({
        url: "get_datappdb.php",
        data: "id_sekolah="+id_sekolah,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#ppdb").html(msg);
        }
    });
  });


}); 
</script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>



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
    <!-- script for banner slider-->

<script>
  $(document).ready(function() {
    $('#exampleModal').on('shown.bs.modal', function () {
      $('#example').DataTable({
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
    });
    $('#exampleModal1').on('shown.bs.modal', function () {
      $('#example3').DataTable({
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
    });
  });
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
  });

</script>

<script>
  $(function () {
    //Add text editor

    //Initialize Select2 Elements
    $('.select2').select2({
      
    });

    $('.select3').select2()
  })
</script>
    <script>
        $(document).ready(function() {
            $('.owl-one').owlCarousel({
                loop: true,
                margin: 0,
                nav: false,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1
                    },
                    667: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        })

    </script>
    <!-- //script -->
 
   
    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });

    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });

    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!-- //bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>
