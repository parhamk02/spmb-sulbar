<!doctype html>
<html lang="en">
<?php
session_start();

require_once("admin/app/config.php");
$config = new config();
date_default_timezone_set("Asia/Makassar");
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SPMB</title>
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
                        <span class="w3yellow">SP</span>MB
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
                    <?php
                    if (isset($_SESSION['nik'])) {
                    ?>
                    <ul class="header-search me-lg-4">
                        <li class="get-btn">
                            <a href="logout" class="btn btn-style btn-primary" title="search">LOGOUT <i class="fas fa-arrow-right ms-lg-4 ms-2"></i></a>
                        </li>
                    <?php
                     }
                    ?>
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
    
    <?php
    if (empty($_GET['page'])) {
        include "home.php";
    }else{
    ?>
    <section class="w3l-contact-2 py-5" id="contact">
        <div class="container py-lg-4 py-md-3 py-2">
                <?php
                if (isset($_SESSION['id'])) {
                    $id_siswa = $_SESSION['id'];
                    $datappdb = $config->cek_datappdb($id_siswa);
                    $row1 = mysqli_fetch_assoc($datappdb);
                    $row = mysqli_num_rows($datappdb);
                    if ($row>0) {
                        if ($row1['status']=='Proses' or $row1['status']=='Diterima' or $row1['status']=='Tidak Diterima') {
                            include "data_siswa.php"; 
                        }elseif($row1['status']=='Upload Berkas'){
                            include "form_berkas.php"; 
                        }
                    }else{
                        include "form.php"; 
                    }
                 }else{
                    if (isset($_GET['page'])) {
                      	//if(empty($_SESSION['nama_siswa'])){
                       //     session_destroy();
                       // }
                        if ($_GET['page']=='daftar') {
                            include "login.php";
                        }elseif ($_GET['page']=='daftarakun') {
                            include "form2.php"; 
                        }
                    }
                }
                ?>
        </div>
    </section>
    <?php
    }
    ?>
    
    <!-- Trigger/Open The Modal -->
<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
-->
<!-- Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        Pastikan Semua Isian Pendaftaran sudah sesuai sebelum diproses
      </div>
      
    </div>
  </div>
</div>


<br>
    <!--/w3l-footer-29-main-->
    <footer class="w3l-footer-29-main" id="kontak">
        <div class="footer-29 py-5">
            <div class="container py-lg-4">
                <h2>Sistem Penerimaan Murid Baru<br>
                    Provinsi Sulawesi Barat</h2>
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
                        <h6 class="footer-title-29"></h6>
                        <div class="footer-listw3-grids">
                            <ul class="footer-listw3">
                                <li></li>

                            </ul>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 footer-list-29 footer-4 mt-lg-0 mt-5 ps-lg-5">
                        <h6 class="footer-title-29">Sosial Media</h6>

                        <div class="main-social-footer-29 mt-4">
                            <a href="#facebook" class="facebook"><span class="fab fa-facebook-f"></span></a>
                            <a href="#twitter" class="twitter"><span class="fab fa-twitter"></span></a>
                            <a href="#instagram" class="instagram"><span class="fab fa-instagram"></span></a>

                            <a href="#linkd" class="linkd"><span class="fab fa-linkedin-in"></span></a>
                        </div>
                    </div>
                </div>
                <div class="bottom-copies text-center">
                    <p class="copy-footer-29">© 2024. All rights reserved | Designed by <a href="#">W3layouts</a></p>
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

<?php
if (isset($_GET['page'])) {
?>
<script>
// Munculkan modal saat halaman dimuat
window.onload = function() {
  $('#myModal').modal('show');
};
</script>
<?php
}
?>
<script>
        $(document).ready(function() {
            function uploadFile(file, folder, id) {
                var statusDiv = $('#status');
                var formData = new FormData();
                formData.append('file', file);
                formData.append('folder', folder);
                formData.append('id', id);

                $.ajax({
                    url: 'upload.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        statusDiv.append('<p>' + response + '</p>');
                    },
                    error: function() {
                        statusDiv.append('<p>Error uploading file ' + file.name + '.</p>');
                    }
                });
            }

            $('#file_kkdomisili, #file_aktalahir, #file_rapor, #file_foto, #file_suratpindah, #file_penempatan, #file_pkh, #file_suratkhusus, #file_sertifikat').on('change', function() {
                var file = this.files[0];
                var folder = $(this).data('folder');
                var id = $(this).data('id');
                if (file) {
                    uploadFile(file, folder, id);
                }
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
 <script type="text/javascript"> 

$(document).ready(function() { 

  $("#id_kab").change(function(){
    var id_kab      = $("#id_kab").val();
    $.ajax({
        url: "get_kecamatan.php",
        data: "id_kab="+id_kab,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#id_kec").html(msg);
        }
    });
  });

  $("#id_kec").change(function(){
    var id_kec      = $("#id_kec").val();
    $.ajax({
        url: "get_kelurahan.php",
        data: "id_kec="+id_kec,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#id_kelurahan").html(msg);
        }
    });
  });

$("#jenjang").change(function(){
    var jenjang      = $("#jenjang").val();
    $.ajax({
        url: "get_jalur.php",
        data: "jenjang="+jenjang,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#id_jalurppdb").html(msg);
        }
    });
  });

  document.getElementById('btn-tambah').hidden = true

  $("#cek").on('click', function(){
    var id_siswa     = $("#id_siswa").val();
    var jenjang      = $("#jenjang").val();
    var id_jalurppdb = $("#id_jalurppdb").val();
    $.ajax({
        url: "form1.php",
        data: "id_siswa="+id_siswa+"&jenjang="+jenjang+"&id_jalurppdb="+id_jalurppdb,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#hasil").html(msg);
        }
    });
    document.getElementById('cek').hidden = true
    document.getElementById('btn-tambah').hidden = false
  });


  });
</script> 
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <script>
  $(function () {

    //Initialize Select2 Elements
    $('.select2').select2({
      
    });
  })
</script>


<script>
    document.getElementById('hide').hidden = true
function showHide() {
  var inputan = document.getElementById("password");
  if (inputan.type === "password") {
    inputan.type = "text";
    document.getElementById('hide').hidden = false
    document.getElementById('tampil').hidden = true
  } else {
    inputan.type = "password";
    document.getElementById('hide').hidden = true
    document.getElementById('tampil').hidden = false
  }
} 

</script>
   
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
