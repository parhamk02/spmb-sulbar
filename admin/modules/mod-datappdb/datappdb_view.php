

					<div class="card">
              <div class="card-header">
                <h3 class="card-title">DATA PPDB</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
              <div class="row">
						  			<div class="col-sm-5">
	                  	<div class="form-group">
	                    <select name="id_jalurppdb" id="id_jalurppdb" class="form-control select2 select2-warning" data-dropdown-css-class="select2-warning" style="width: 100%;">
	                    		<option value="">Pilih Jalur PPDB</option>
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
                    <th>Jalur PPDB</th>
                    <th>Alamat</th>
                    <th>Umur</th>
                    <th>Detail</th>
                    <th>Sekolah Asal</th>
                    <th>Pilihan 1</th>
                    <th>Pilihan 2</th>
                    <th>Pilihan 3</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Status</th>
										<th width="5%" class="text-center">AKSI</th>
									</tr>
								</thead>
								<tbody>

								<?php
								$datappdb = $config->tampil_datappdb();
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
										<td><?php echo $data['sekolah1'] ?></td>
										<td><?php echo $data['sekolah2'] ?></td>
										<td><?php echo $data['sekolah3'] ?></td>
										<td><?php echo $data['no_telp'] ?></td>
										<td><?php echo $data['email'] ?></td>
										<td><?php echo $data['status'] ?></td>
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