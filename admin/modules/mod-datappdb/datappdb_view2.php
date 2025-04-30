

					<div class="card">
              <div class="card-header">
                <h3 class="card-title">DATA PPDB</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                  <!-- input states -->
					  			<div class="row">
						  			<div class="col-sm-5">
	                  	<div class="form-group">
	                    <select name="id_jalurppdb" id="id_jalurppdb" class="form-control select2 select2-warning" data-dropdown-css-class="select2-warning" style="width: 100%;">
	                    		<option value="">Pilih Jalur PPDB</option>
	                       <?php
	                       		$id_sekolah = $_SESSION['id'];
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
	                  <div class="col-sm-3">
	                  	<div class="form-group">
												<button type="button" id="datappdb" class="btn btn-primary">LIHAT</button>	                    
	                  	</div>
	                  </div>
                  </div>
                  <input type="hidden" name="id_sekolah" id="id_sekolah" value="<?php echo $_SESSION['id'] ?>">
                  <input type="hidden" name="module" value="datappdb">
				  				<input type="hidden" name="act" value="view1">
              <div id="ppdb">
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
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Sekolah Asal</th>
                    <?php
                    if ($_SESSION['jenjang']=="SMK") {
                    ?>
                    <th>Pilihan Sekolah 1</th>
                    <th>Jurusan 1</th>
                    <th>Pilihan Sekolah 2</th>
                    <th>Jurusan 2</th>
                    <th>Pilihan Sekolah 3</th>
                    <th>Jurusan 3</th>
                    <?php
                    }
                    ?>
                    <th>Status</th>
										<th width="5%" class="text-center">AKSI</th>
									</tr>
								</thead>
								<tbody>

								<?php
								$id_sekolah=$_SESSION['id'];
								$datappdb = $config->detail_datappdb1($id_sekolah);
								
								$no=1;
                while($data = mysqli_fetch_assoc($datappdb)){
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
										<td><?php echo $data['alamat'] ?></td>
										<td><?php echo $data['no_telp'] ?></td>
										<td><?php echo $data['email'] ?></td>
										<td><?php echo $data['asal_sekolah'] ?></td>
										<?php
                    if ($_SESSION['jenjang']=="SMK") {
                    ?>
										<td><?php echo $data['sekolah1'] ?></td>
										<td><?php echo $jr[$id_jurusan1['0']].", ".$jr[$id_jurusan1['1']].", ".$jr[$id_jurusan1['2']] ?></td>
										<td><?php echo $data['sekolah2'] ?></td>
										<td><?php echo $jr[$id_jurusan2['0']].", ".$jr[$id_jurusan2['1']].", ".$jr[$id_jurusan2['2']] ?></td>
										<td><?php echo $data['sekolah3'] ?></td>
										<td><?php echo $jr[$id_jurusan3['0']].", ".$jr[$id_jurusan3['1']].", ".$jr[$id_jurusan3['2']] ?></td>
                    <?php
                    }
                    ?>
										<td><?php echo $data['status'] ?></td>
										<td>
											<?php
											if ($data['status']=='Proses' or $data['status']=='Upload Berkas') {
											?>
											<a href="index.php?module=datappdb&act=delete1&id_datappdb=<?php echo $data['id_datappdb']; ?>" class="active" onclick="return confirm('Anda ingin menghapus data?')"><i class="fa fa-times text-danger text-active" title="HAPUS"></i></a> | 
											<?php 
											}
											?>
											<a href="cetak_kartu.php" class="active"><i class="fa fa-print text-danger text-active" title="PRINT"></i></a>
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
