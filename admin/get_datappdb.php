							<table id="export" class="table table-bordered table-striped">

<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
                    <th>NIK</th>
                    <th>NISN</th>
                    <th>Nomor Pendaftaran</th>
                    <th>Jalur PPDB</th>
                    <th>Umur</th>
                    <th>Detail</th>
                    <th>Rerata Rapor</th>
                    <th>Alamat</th>
                    <th>Sekolah Asal</th>
                    <th>Status</th>
										<th width="5%" class="text-center">AKSI</th>
									</tr>
								</thead>
								<tbody>
 
								<?php
								require_once("app/config.php");;
								$config = new config();
								date_default_timezone_set("Asia/Makassar");
								$id_jalurppdb = $_GET['id_jalurppdb'];
								$status = $_GET['status'];
								$id_sekolah=$_GET['id_sekolah'];
								$pilihan=$_GET['pilihan'];
								$datappdb = $config->detail_datappdb22($id_sekolah,$id_jalurppdb,$status,$pilihan);
								$no=1;
				                while($data = mysqli_fetch_assoc($datappdb)){
				                	$nilai_rapor1 = explode("#",$data['nilai_rapor1']);
                    $nilai_rapor2 = explode("#",$data['nilai_rapor2']);
                    $nilai_rapor3 = explode("#",$data['nilai_rapor3']);
                    $nilai_rapor4 = explode("#",$data['nilai_rapor4']);
                    $nilai_rapor5 = explode("#",$data['nilai_rapor5']);
                    $merge = array_merge($nilai_rapor1,$nilai_rapor2,$nilai_rapor3,$nilai_rapor4,$nilai_rapor5);
                    $total = array_sum($merge);
                    $count = count($merge);
                    $hasil = $total/$count;
                	$id_jurusan1 = explode(",",$data['id_jurusan1']);
                	$id_jurusan2 = explode(",",$data['id_jurusan2']);
                	$id_jurusan3 = explode(",",$data['id_jurusan3']);

                	$datajurusan = $config->tampil_jurusan();
                	$jr = array();
	                while($data1 = mysqli_fetch_assoc($datajurusan)){ 
	                    $jr[$data1['id_jurusan']]=$data1['jurusan'];
	                }

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
										<td><?php echo $data['nisn'] ?></td>
										<td><?php echo $data['no_pendaftaran'] ?></td>
										<td><?php echo $data['jalurppdb'] ?></td>
										<td><?php echo $thn." tahun ".$bln." bulan ".$tgl." hari" ?></td>
										<td><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-detail" data-id="<?php echo $data['id_datappdb'] ?>">Detail</a></td>
										<td><?php echo $hasil ?></td>
										<td><?php echo $data['alamat'] ?></td>
										<td><?php echo $data['asal_sekolah'] ?></td>
										<?php
                    if ($data['jenjang']=="SMK") {
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
                    if ($data['jenjang']=="SMK") {
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
											<?php
											if ($data['status']=='Proses' or $data['status']=='Upload Berkas') {
											?>
											<a href="datappdb-hapus-<?php echo $data['id_datappdb']; ?>" class="active" onclick="return confirm('Anda ingin menghapus data?')"><i class="fa fa-times text-danger text-active" title="HAPUS"></i></a> | 
											<?php 
											}
											?>
											<a href="print-kartu-<?php echo $data['id_siswa']; ?>" target="blank" class="active"><i class="fa fa-print text-danger text-active" title="PRINT"></i></a>
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