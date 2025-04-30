

					<div class="card">
              <div class="card-header">
                <h3 class="card-title">DATA KECAMATAN</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
							<table id="example2" class="table table-bordered table-striped">
								<div class="col-md-3">
                                    <a href="tambah-kec"  id="btn-tambah" class="btn btn-sm btn-primary pull-left"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a>
	                            </div>
	                            <br/>
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Kabupaten</th>
										<th>Nama Kecamatan</th>
										<th>Nama Sekolah</th>
										<th width="5%" class="text-center">AKSI</th>
									</tr>
								</thead>
								<tbody>

								<?php
								$datakecamatan = $config->tampil_kecamatan1();
                      $no=1;
                      while($data = mysqli_fetch_assoc($datakecamatan)){
								?>

									<tr>
										<td scope="row"><?php echo $no ?></td>
										<td><?php echo $data['nama_kab'] ?></td>
										<td><?php echo $data['nama_kec'] ?></td>
										<td><?php echo $data['nama_sekolah'] ?></td>
										<td>
											<a href="edit-kec<?php echo $data['id_kec']; ?>" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active" title="EDIT"></i></a>&nbsp&nbsp  &nbsp&nbsp
											<a href="hapus-kec<?php echo $data['id_kec']; ?>" class="active" onclick="return confirm('Anda ingin menghapus data?')"><i class="fa fa-times text-danger text-active" title="HAPUS"></i></a>
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
