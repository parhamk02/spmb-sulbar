<!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2025 <a href="http://papiastudio.com">SPMB SULBAR </a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<!-- Select2 -->

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

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="https://malsup.github.io/jquery.form.js"></script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
        <?php
        require_once("app/config.php");
        $config = new config();
        date_default_timezone_set("Asia/Makassar");
          if ($_SESSION['level']=="Pengguna") {
            $jenjang = $_SESSION['jenjang'];
            $datajalurppdb   = $config->detail_jalurppdb22($jenjang);
          }else{
            $datajalurppdb   = $config->tampil_jalurppdb1();
          }
            while($data = mysqli_fetch_assoc($datajalurppdb)){
        ?>
          '<?php echo $data['jalurppdb'] ?>',
        <?php } ?>
      ],
      datasets: [
        {
          data: [
            <?php
            if ($_SESSION['level']=="Pengguna") {
            $id_sekolah = $_SESSION['id'];
            $datajalurppdb = $config->detail_jalurppdb21($id_sekolah,$jenjang);
            }else{
            $datajalurppdb = $config->tampil_jalurppdb1();
            }
            while($data = mysqli_fetch_assoc($datajalurppdb)){
        ?>
          '<?php echo $data['jumlah'] ?>',
        <?php } ?>
            ],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef','#800000','#808000'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })


  })
</script>

<script type="text/javascript">
  $(document).ready(function(){
   
  //Callback handler for form submit event
    $("#upload_form").submit(function(e)
    {
  
    var formObj = $(this);
    var formURL = formObj.attr("action");
    var modul = $("#modul").val();
    var formData = new FormData(this);
    $.ajax({
        url: formURL,
        type: 'POST',
        data:  formData,        
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function (){
                   $("#loading").show(1000).html("<img src='load.gif' height='50'>");
                   $(".float-right").css("display", "none");
                   },
        success: function(data, textStatus, jqXHR){
                alert('Data Berhasil Disimpan'); window.location = 'index.php?module='+ modul +'&act=view';
                $("#loading").hide();
                $(".kembali").css("display", "block");                   
        },
            error: function(jqXHR, textStatus, errorThrown){
     }         
    });
        e.preventDefault(); //Prevent Default action.
        e.unbind();
    });    

 });
 </script>
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

<script>
                var tabel = null;
                $(document).ready(function() {
                    tabel = $('#kelurahan1').DataTable({
                        "processing": true,
                        "responsive": true,
                        "serverSide": true,
                        "ordering": true, // Set true agar bisa di sorting
                        "order": [
                            [0, 'asc']
                        ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
                        "ajax": {
                            "url": "get_data.php", // URL file untuk proses select datanya
                            "type": "POST",
                        },
                        "deferRender": true,
                        "aLengthMenu": [
                            [5, 10, 50],
                            [5, 10, 50]
                        ], // Combobox Limit
                        "columns": [
                            {"data": 'id_kel',"sortable": false, 
                                render: function (data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                }  
                            },
                            { "data": "nama_kec" },  // Tampilkan kolom nama_kategori pada table kategori
                            { "data": "nama_kel" },  // Tampilkan kolom subkat pada table sub kategori
                            { "data": "nama_sekolah"}, // Tampilkan kolomid_kategori pada table kategori
                            { "data": "id_kel", // Tampilkan kolomid_kategori pada table kategori
                            "render": 
                                function( data, type, row, meta ) {
                                    return '<a href="edit-kel'+data+'">Edit</a>';
                                }
                            },
                        ],
                    });
                });
            </script>
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

            $('#file_kkdomisili, #file_aktalahir, #file_rapor, #file_foto').on('change', function() {
                var file = this.files[0];
                var folder = $(this).data('folder');
                var id = $(this).data('id');
                if (file) {
                    uploadFile(file, folder, id);
                }
            });
        });
    </script>

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


  $("#datappdb").on('click', function(){
    var id_jalurppdb    = $("#id_jalurppdb").val();
    var pilihan         = $("#pilihan").val();
    var id_sekolah      = $("#id_sekolah").val();
    var status      = $("#status").val();
    $.ajax({
        url: "get_datappdb.php",
        data: "id_jalurppdb="+id_jalurppdb+"&id_sekolah="+id_sekolah+"&status="+status+"&pilihan="+pilihan,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#ppdb").html(msg);
        }
    });
  });

  $("#datappdb1").on('click', function(){
    var id_jalurppdb    = $("#id_jalurppdb").val();
    var id_sekolah      = $("#id_sekolah").val();
    var status      = $("#status").val();
    $.ajax({
        url: "get_datappdb1.php",
        data: "id_jalurppdb="+id_jalurppdb+"&status="+status+"&id_sekolah="+id_sekolah,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#ppdb").html(msg);
        }
    });
  });

  $('#modal-upload').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            var rowid2 = $(e.relatedTarget).data('id2');
            var rowid3 = $(e.relatedTarget).data('id3');
            $('#id_sekolah').val(rowid);
            $('#berkas').val(rowid2);
            $("#label").append('<label for="exampleInputFile">' + rowid3 + '</label>'); 
         });

  $('#modal-berkas').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $('#id_berkas').val(rowid);
         });

  $('#modal-status').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $('#catatan1').val(rowid);
         });

  $('#modal-detail').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
            url: "get_berkas.php",
            data: "id_datappdb="+rowid,
            cache: false,
            success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#coba").html(msg);
                }
            });

         });

}); 
</script> 


</body>
</html>
