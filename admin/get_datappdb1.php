<?php
require_once("app/config.php");;
$config = new config();
date_default_timezone_set("Asia/Makassar");

$id_sekolah     = $_GET['id_sekolah'];
$sekolah    = $config->detail_sekolah($id_sekolah);
$e           = mysqli_fetch_assoc($sekolah);
?>
							<table id="export" class="table table-bordered table-striped">

								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
                    <th>NIK</th>
                    <th>Nomor Pendaftaran</th>
                    <th>Jalur SPMB</th>
                    <th>Alamat</th>
                    <th>Umur</th>
                    <th>Detail</th>
                    <th>Sekolah Asal</th>
                    <?php
                    if ($e['jenjang']=="SMK") {
                    ?>
                    <th>Pilihan Jurusan</th>
                    <?php
                    }
                    ?>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Status</th>
                    <?php
                    if ($e['jenjang']=="SMK") {
                    ?>
                    <th>Jurusan</th>
                    <?php
                    }
                    ?>
										<th width="5%" class="text-center">AKSI</th>
									</tr>
								</thead>
								<tbody>

								<?php
								
								$id_jalurppdb = $_GET['id_jalurppdb'];
								$status = $_GET['status'];
								$datappdb = $config->detail_datappdb233($id_jalurppdb,$id_sekolah,$status);
										$no=1;
                    while($data = mysqli_fetch_assoc($datappdb)){
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

									    $id_jurusan1 = explode(",",$data['id_jurusan1']);
		                	$id_jurusan2 = explode(",",$data['id_jurusan2']);
		                	$id_jurusan3 = explode(",",$data['id_jurusan3']);

		                	$datajurusan = $config->tampil_jurusan();
		                	$jr = array();
			                while($data1 = mysqli_fetch_assoc($datajurusan)){ 
			                    $jr[$data1['id_jurusan']]=$data1['jurusan'];
			                }
									?>

									<tr>
										<td scope="row"><?php echo $no ?></td>
										<td><?php echo $data['nama_siswa'] ?></td>
										<td><?php echo $data['nik'] ?></td>
										<td><?php echo $data['no_pendaftaran'] ?></td>
										<td><?php echo $data['jalurppdb'] ?></td>
										<td><?php echo $data['alamat'] ?></td>
										<td><?php echo $thn." tahun ".$bln." bulan ".$tgl." hari" ?></td>
										<td><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-detail" data-id="<?php echo $data['id_datappdb'] ?>">Detail</a></td>
										<td><?php echo $data['asal_sekolah'] ?></td>
										<?php
                    if ($e['jenjang']=="SMK") {
                    ?>
										<td>
											<?php
											if ($data['id_sekolah1']==$id_sekolah) {
											 echo $jr[$id_jurusan1['0']].", ".$jr[$id_jurusan1['1']].", ".$jr[$id_jurusan1['2']];
											}elseif($data['id_sekolah2']==$id_sekolah){
												echo $jr[$id_jurusan2['0']].", ".$jr[$id_jurusan2['1']].", ".$jr[$id_jurusan2['2']];
											}elseif($data['id_sekolah3']==$id_sekolah){
												echo $jr[$id_jurusan3['0']].", ".$jr[$id_jurusan3['1']].", ".$jr[$id_jurusan3['2']]; 
											}
										?>
										</td>
										<?php
										}
										?>
										<td><?php echo $data['no_telp'] ?></td>
										<td><?php echo $data['email'] ?></td>
										<td>
											<?php 
											if ($data['id_sekolah1']==$id_sekolah) {
												echo $data['status1']; 
											}elseif($data['id_sekolah2']==$id_sekolah){
												echo $data['status2']; 
											}elseif($data['id_sekolah3']==$id_sekolah){
												echo $data['status3']; 
											}
											?>
										</td>
										<?php
                    if ($e['jenjang']=="SMK") {
                    ?>
										<td>
										<?php
										 if ($data['sekolah_id']==$id_sekolah) {
										 		echo $data['jurusan'];
										 }
										?></td>
										<?php 
											} 
										?>
										<td>
											<a href="index.php?module=datappdb&act=delete&id_datappdb=<?php echo $data['id_datappdb']; ?>" class="active" onclick="return confirm('Anda ingin menghapus data?')"><i class="fa fa-times text-danger text-active" title="HAPUS"></i></a>
										</td>
									</tr>

								<?php
								$no++;
								}
								?>
								</tbody>
							</table>

<script>
  $(function () {
     
    $('#export').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
  });

</script>