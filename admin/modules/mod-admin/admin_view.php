

					<div class="card">
              <div class="card-header">
                <h3 class="card-title">DATA ADMIN</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<div class="col-md-3">
                                    <a href="tambah-admin"  id="btn-tambah" class="btn btn-sm btn-primary pull-left"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a>
	                            </div>
	                            <br/>
								<thead>
									<tr>
										<th>No</th>
										<th>Username</th>
										<th>Nama</th>
										<th>Foto</th>
										<th>Level</th>
										<th width="5%" class="text-center">AKSI</th>
									</tr>
								</thead>
								<tbody>

								<?php
								$dataadmin = $config->tampil_dataadmin();
                                $no=1;
                                while($data = mysqli_fetch_assoc($dataadmin)){
								?>

									<tr>
										<td scope="row"><?php echo $no ?></td>
										<td><?php echo $data['username'] ?></td>
										<td><?php echo $data['name'] ?></td>
										<td><?php echo $data['foto'] ?></td>
										<td><?php echo $data['level'] ?></td>
										<td>
											<a href="edit-admin<?php echo $data['id_users']; ?>" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active" title="EDIT"></i></a>&nbsp&nbsp  &nbsp&nbsp
											<a href="hapus-admin<?php echo $data['id_users']; ?>" class="active" onclick="return confirm('Anda ingin menghapus data?')"><i class="fa fa-times text-danger text-active" title="HAPUS"></i></a>
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
