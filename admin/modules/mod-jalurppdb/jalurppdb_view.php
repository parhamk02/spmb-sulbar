

					<div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive">
							<table id="example2" class="table table-bordered table-striped">
								<div class="col-md-3">
                                    <a href="tambah-jalurspmb"  id="btn-tambah" class="btn btn-sm btn-primary pull-left"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a>
	                            </div>
	                            <br/>
								<thead>
									<tr>
										<th>No</th>
										<th>Jalur SPMB</th>
										<th>Jenjang</th>
										<th>Tanggal Buka</th>
										<th>Tanggal Tutup</th>
										<th width="10%" class="text-center">AKSI</th>
									</tr>
								</thead>
								<tbody>

								<?php
								$datajalurppdb = $config->tampil_jalurppdb();
                                $no=1;
                                while($data = mysqli_fetch_assoc($datajalurppdb)){
								?>

									<tr>
										<td scope="row"><?php echo $no ?></td>
										<td><?php echo $data['jalurppdb'] ?></td>
										<td><?php echo $data['jenjang'] ?></td>
										<td><?php echo $data['awal'] ?></td>
										<td><?php echo $data['akhir'] ?></td>
										<td>
											<a href="edit-jalurspmb<?php echo $data['id_jalurppdb']; ?>" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active" title="EDIT"></i></a>&nbsp&nbsp  &nbsp&nbsp
											<a href="hapus-jalurspmb<?php echo $data['id_jalurppdb']; ?>" class="active" onclick="return confirm('Anda ingin menghapus data?')"><i class="fa fa-times text-danger text-active" title="HAPUS"></i></a>
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
