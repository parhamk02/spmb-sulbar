

					<div class="card">
              
              <!-- /.card-header -->
              <div class="card-body table-responsive">
							<table id="example2" class="table table-bordered table-striped">
								<div class="col-md-3">
                                    <a href="tambah-jadwal"  id="btn-tambah" class="btn btn-sm btn-primary pull-left"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a>
	                            </div>
	                            <br/>
								<thead>
									<tr>
										<th>No</th>
										<th>Jadwal SPMB</th>
										<th>Tanggal Buka</th>
										<th>Tanggal Tutup</th>
										<th>Status</th>
										<th>AKSI</th>
									</tr>
								</thead>
								<tbody>

								<?php
								$datajadwal = $config->tampil_jadwal();
                                $no=1;
                                while($data = mysqli_fetch_assoc($datajadwal)){
								?>

									<tr>
										<td scope="row"><?php echo $no ?></td>
										<td><?php echo $data['nama_jadwal'] ?></td>
										<td><?php echo $data['awal_jadwal'] ?></td>
										<td><?php echo $data['akhir_jadwal'] ?></td>
										<td><?php echo $data['status_jadwal'] ?></td>
										<td>
											<a href="edit-jadwal<?php echo $data['id_jadwal']; ?>" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active" title="EDIT"></i></a>&nbsp&nbsp  &nbsp&nbsp
											<a href="hapus-jadwal<?php echo $data['id_jadwal']; ?>" class="active" onclick="return confirm('Anda ingin menghapus data?')"><i class="fa fa-times text-danger text-active" title="HAPUS"></i></a>
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
