<?php
$id_sekolah     = $_GET['id'];
$sekolah    = $config->detail_sekolah($id_sekolah);
$e           = mysqli_fetch_assoc($sekolah);
?>
					<div class="card">
              <div class="card-header">
                <h3 class="card-title">DATA SPMB <?php echo $e['nama_sekolah'] ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
              <div class="row">
						  			<div class="col-sm-5">
	                  	<div class="form-group">
	                    <select name="id_jalurppdb" id="id_jalurppdb" class="form-control select2 select2-warning" data-dropdown-css-class="select2-warning" style="width: 100%;">
	                    		<option value="">Pilih Jalur SPMB</option>
	                       <?php
														$datajalurppdb   = $config->tampil_jalurppdb();
	                          while($data1 = mysqli_fetch_assoc($datajalurppdb)){
															

	                        ?>
	                        <option value="<?php echo $data1['id_jalurppdb'] ?>"><?php echo $data1['jalurppdb'] ?></option>
	                        <?php
	                        }
	                        ?>
	                    </select>
	                  	 </div>
	                  </div>
	                  <div class="col-sm-4">
	                  	<div class="form-group">
	                    <select name="status" id="status" class="form-control select2 select2-warning" data-dropdown-css-class="select2-warning" style="width: 100%;">
	                        <option value="Proses">Proses</option>
	                        <option value="Upload Berkas">Upload Berkas</option>
	                        <option value="Diterima">Diterima</option>
	                        <option value="Tidak Diterima">Tidak Diterima</option>
	                    </select>
	                  	 </div>
	                  </div>
                  	<input type="hidden" name="id_sekolah" id="id_sekolah" value="<?php echo $id_sekolah ?>">
	                  <div class="col-sm-3">
	                  	<div class="form-group">
												<button type="button" id="datappdb1" class="btn btn-primary">LIHAT</button>	                    
	                  	</div>
	                  </div>
                  </div>
              <div id="ppdb">
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
								$id_sekolah=$_GET['id'];
								$datappdb = $config->detail_datappdb1($id_sekolah);
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
						</div>
						</div>
					</div>

<!-- /.modal -->
		      <div class="modal fade" id="modal-detail">
		        <div class="modal-dialog modal-lg">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h4 class="modal-title">Berkas Kelengkapan</h4>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body" id="coba">
		            	

		            </div>
		          </div>
		          <!-- /.modal-content -->
		        </div>
		        <!-- /.modal-dialog -->
		      </div>
		      <!-- /.modal -->