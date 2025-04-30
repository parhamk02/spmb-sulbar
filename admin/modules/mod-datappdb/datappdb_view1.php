

					<div class="card">
              <div class="card-header">
                <h3 class="card-title">DATA SPMB</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                  <!-- input states -->
					  			<div class="row">
						  			<div class="col-sm-3">
	                  	<div class="form-group">
	                    <select name="id_jalurppdb" id="id_jalurppdb" class="form-control select2 select2-warning" data-dropdown-css-class="select2-warning" style="width: 100%;">
	                    		<option value="">Pilih Jalur SPMB</option>
	                       <?php
	                       		$id_sekolah = $_SESSION['id'];
	                          $kirim  = $config->cek_kirim($id_sekolah);
	                          $sekolah1 = $config->detail_dataspmb($id_sekolah);
	                          $sekolah = mysqli_fetch_assoc($sekolah1); 

	                       		$ket = "Verifikasi Sekolah";
	                          $datajadwal = $config->tampil_jadwal12($ket);
														$jadwal = mysqli_fetch_assoc($datajadwal);

	                          $jenjang=$_SESSION['jenjang'];
														$datajalurppdb   = $config->detail_jalurppdb22($jenjang);
	                          $cek  = $config->cek_kapasitas1($id_sekolah);
	                          while($data1 = mysqli_fetch_assoc($datajalurppdb)){
															

	                        ?>
	                        <option value="<?php echo $data1['id_jalurppdb'] ?>"><?php echo $data1['jalurppdb'] ?></option>
	                        <?php
	                        }
	                        ?>
	                    </select>
	                  	 </div>
	                  </div>
	                  <div class="col-sm-3">
	                  	<div class="form-group">
	                    <select name="status" id="status" class="form-control select2 select2-warning" data-dropdown-css-class="select2-warning" style="width: 100%;">
	                        <option value="Proses">Proses</option>
	                        <option value="Upload Berkas">Upload Berkas</option>
	                        <option value="Diterima">Diterima</option>
	                        <option value="Tidak Diterima">Tidak Diterima</option>
	                    </select>
	                  	 </div>
	                  </div>
	                  <div class="col-sm-3">
	                  	<div class="form-group">
	                    <select name="pilihan" id="pilihan" class="form-control select2 select2-warning" data-dropdown-css-class="select2-warning" style="width: 100%;">
	                        <option value="1 ">Pilihan Sekolah Ke 1</option>
	                        <option value="2">Pilihan Sekolah Ke 2</option>
	                        <option value="3">Pilihan Sekolah Ke 3</option>
	                    </select>
	                  	 </div>
	                  </div>
	                  <div class="col-sm-3">
	                  	<div class="form-group">
												<button type="button" id="datappdb" class="btn btn-primary">LIHAT</button>	                    
	                  	</div>
	                  </div>
                  </div>
                  <input type="hidden" name="id_sekolah" id="id_sekolah" value="<?php echo $_SESSION['id'] ?>">
                  <input type="hidden" name="module" value="datappdb">
				  				<input type="hidden" name="act" value="view1">
				  				<?php
									$today = date('Y-m-d');
				  				if (($sekolah['proses1']==0 or $sekolah['proses2']==0 or $sekolah['proses3']==0) and $sekolah['status_kirim']!='Terkirim' and isset($jadwal)) {
				  				?>
				  				<div class="col-md-3">
                      <a href="index.php?module=datappdb&act=kirim&id=<?php echo $_SESSION['id']; ?>"  id="btn-kirim" class="btn btn-sm btn-primary pull-left"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>KIRIM DATA SPMB</a>
	                </div>
				  				<?php
				  				}
				  				?>
	                            <br/>
              <div id="ppdb">
							<table id="export" class="table table-bordered table-striped">
							<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
                    <th>NIK</th>
                    <th>NISN</th>
                    <th>Nomor Pendaftaran</th>
                    <th>Jalur SPMB</th>
                    <th>Umur</th>
                    <th>Detail</th>
                    <th>Rerata Rapor</th>
                    <th>Alamat</th>
                    <th>Sekolah Asal</th>
                    <?php
                    if ($_SESSION['jenjang']=="SMK") {
                    ?>
                    <th>Pilihan Jurusan</th>
                    <?php
                    }
                    ?>
                    <th>Status</th>
                    <?php
                    if ($_SESSION['jenjang']=="SMK") {
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
								
								$datappdb = $config->detail_datappdb1($id_sekolah);
								
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
                    if ($_SESSION['jenjang']=="SMK") {
                    ?>
										<td>
										<?php
											if ($data['id_sekolah1']==$_SESSION['id']) {
											 echo $jr[$id_jurusan1['0']].", ".$jr[$id_jurusan1['1']].", ".$jr[$id_jurusan1['2']];
											}elseif($data['id_sekolah2']==$_SESSION['id']){
												echo $jr[$id_jurusan2['0']].", ".$jr[$id_jurusan2['1']].", ".$jr[$id_jurusan2['2']];
											}elseif($data['id_sekolah3']==$_SESSION['id']){
												echo $jr[$id_jurusan3['0']].", ".$jr[$id_jurusan3['1']].", ".$jr[$id_jurusan3['2']]; 
											}
										?>
										</td>
                    <?php
                    }
                    ?>
										<td>
											<?php 
											if ($data['id_sekolah1']==$_SESSION['id']) {
												echo $data['status1']; 
											}elseif($data['id_sekolah2']==$_SESSION['id']){
												echo $data['status2']; 
											}elseif($data['id_sekolah3']==$_SESSION['id']){
												echo $data['status3']; 
											}
											?>
										</td>
										<?php
                    if ($_SESSION['jenjang']=="SMK") {
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