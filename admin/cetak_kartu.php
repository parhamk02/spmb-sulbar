<!doctype html>
<html lang="en">
<?php
session_start();
require_once("app/config.php");
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
    <link rel="stylesheet" href="../assets/css/style-starter.css">

    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body>
<?php
$id_siswa = $_GET['id_siswa'];
$datappdb = $config->cek_datappdb($id_siswa);
$row1 = mysqli_fetch_assoc($datappdb);
$no_pendaftaran = $row1['no_pendaftaran'];
$berkas = $config->tampil_berkas($no_pendaftaran);
$dk = mysqli_fetch_assoc($berkas);
$siswa = $config->detail_siswa($id_siswa);
$ds = mysqli_fetch_assoc($siswa);

if($row1['jenjang']=="SMK"){
$id_jurusan1 = explode(",",$row1['id_jurusan1']);
$id_jurusan2 = explode(",",$row1['id_jurusan2']);
$id_jurusan3 = explode(",",$row1['id_jurusan3']);

$datajurusan = $config->tampil_jurusan();
$jr = array();
while($data1 = mysqli_fetch_assoc($datajurusan)){ 
    $jr[$data1['id_jurusan']]=$data1['jurusan'];
}
}

?>
    <div class="row contact-grids d-grid mt-12 pt-lg-12">
        <div class="col-md-12">
            <table class="table table-bordered" style="margin-left: auto; margin-right: auto;">
                <thead>    
                    <th colspan="3" style="background:#D3D3D3">Data Pendaftaran</th>
                </thead>
                <tbody>
                    <tr> 
                        <td width="30%">No. Pendaftaran</td>
                        <td align="left" width="40%"><?php echo $row1['no_pendaftaran'] ?></td>
                        <td rowspan="5" width="30%" align="center" valign="middle"><img style="margin-left:0 auto; margin-right:0 auto;" width="170px" src="../file/foto/<?php echo $dk['foto'] ?>"></td>
                    </tr>
                    <tr> 
                        <td>Jalur</td>
                        <td align="left" colspan="2"><?php echo $row1['jalurppdb'] ?></td>
                    </tr>
                    <tr> 
                        <td>Jenjang</td>
                        <td align="left" colspan="2"><?php echo $row1['jenjang'] ?></td>
                    </tr>
                    <tr> 
                        <td>Waktu Pendaftaran</td>
                        <td align="left" colspan="2"><?php echo $row1['created_at'] ?></td>
                    </tr>
                    <tr> 
                        <td>Status Pendaftaran</td>
                        <td align="left" colspan="2"><?php echo $row1['status'] ;if ($row1['status']=='Diterima') {
                            echo " di ".$row1['sekolah'];
                        } ?></td>
                    </tr>
                </tbody>
                <thead>    
                    <th colspan="3" style="background:#D3D3D3">Pilihan Sekolah</th>
                </thead>
                <tbody>
                    <tr> 
                        <td>Pilihan Sekolah 1</td>
                        <td align="left" colspan="2"><?php echo $row1['sekolah1'] ?></td>
                    </tr>
                  	<?php
  					if($row1['jenjang']=="SMK"){
  					?>
                    <tr> 
                        <td>Pilihan Jurusan 1</td>
                        <td align="left" colspan="2"><?php echo $jr[$id_jurusan1['0']].", ".$jr[$id_jurusan1['1']].", ".$jr[$id_jurusan1['2']] ?></td>
                    </tr>
                  	<?php
                    }
                    ?>
                    <tr> 
                        <td>Pilihan Sekolah 2</td>
                        <td align="left" colspan="2"><?php echo $row1['sekolah2'] ?></td>
                    </tr>
                  	<?php
  					if($row1['jenjang']=="SMK"){
  					?>
                    <tr> 
                        <td>Pilihan Jurusan 2</td>
                        <td align="left" colspan="2"><?php echo $jr[$id_jurusan2['0']].", ".$jr[$id_jurusan2['1']].", ".$jr[$id_jurusan2['2']] ?></td>
                    </tr>
                  	<?php
                    }
                    ?>
                    <tr> 
                        <td>Pilihan Sekolah 3</td>
                        <td align="left" colspan="2"><?php echo $row1['sekolah3'] ?></td>
                    </tr>
                  	<?php
  					if($row1['jenjang']=="SMK"){
  					?>
                    <tr> 
                        <td>Pilihan Jurusan 3</td>
                        <td align="left" colspan="2"><?php echo $jr[$id_jurusan3['0']].", ".$jr[$id_jurusan3['1']].", ".$jr[$id_jurusan3['2']] ?></td>
                    </tr>
                  	<?php
                    }
                    ?>
                </tbody>
                <thead>    
                    <th colspan="3" style="background:#D3D3D3">Biodata Siswa</th>
                </thead>
                <tbody>
                    <tr> 
                        <td width="30%">Nama Siswa</td>
                        <td align="left" width="40%" colspan="2"><?php echo $row1['nama_siswa'] ?></td>
                    </tr>
                    <tr> 
                        <td>NIK</td>
                        <td align="left" colspan="2"><?php echo $row1['nik'] ?></td>
                    </tr>
                    <tr> 
                        <td>NISN</td>
                        <td align="left" colspan="2"><?php echo $row1['nisn'] ?></td>
                    </tr>
                    <tr> 
                        <td>Jenis Kelamin</td>
                        <td align="left" colspan="2"><?php echo $row1['jenis_kelamin'] ?></td>
                    </tr>
                    <tr> 
                        <td>Tempat Lahir</td>
                        <td align="left" colspan="2"><?php echo $row1['tempat_lahir'] ?></td>
                    </tr>
                    <tr> 
                        <td>Tanggal Lahir</td>
                        <td align="left" colspan="2"><?php echo $row1['tanggal_lahir'] ?></td>
                    </tr>
                    <tr> 
                        <td>Alamat</td>
                        <td align="left" colspan="2"><?php echo $row1['alamat'] ?></td>
                    </tr>
                    <tr> 
                        <td>Kabupaten</td>
                        <td align="left" colspan="2"><?php echo $ds['nama_kab'] ?></td>
                    </tr>
                  	<tr> 
                        <td>Kecamatan</td>
                        <td align="left" colspan="2"><?php echo $ds['nama_kec'] ?></td>
                    </tr>
                    <tr> 
                        <td>Kelurahan</td>
                        <td align="left" colspan="2"><?php echo $ds['nama_kel'] ?></td>
                    </tr>
                    <tr> 
                        <td>Asal Sekolah</td>
                        <td align="left" colspan="2"><?php echo $row1['asal_sekolah'] ?></td>
                    </tr>
                    <tr> 
                        <td>Tahun Lulus</td>
                        <td align="left" colspan="2"><?php echo $row1['tahun_lulus'] ?></td>
                    </tr>
                </tbody>

            </table>
           
        </div>
    </div>
 
              
</footer>
    <!-- Template JavaScript -->
    <<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script src="assets/js/theme-change.js"></script>
    <script>
    window.print();
</script>