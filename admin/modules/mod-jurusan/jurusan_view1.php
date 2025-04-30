

					<div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive">
							<table id="example2" class="table table-bordered table-striped">
								<div class="col-md-3">
                                    <a href="tambahjurusan"  id="btn-tambah" class="btn btn-sm btn-primary pull-left"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a>
	                            </div>
	                            <br/>
								<thead>
									<tr>
										<th>No</th>
										<th>NAMA JURUSAN</th>
										<th width="5%" class="text-center">AKSI</th>
									</tr>
								</thead>
								<tbody>

								<?php
								$id_sekolah = $_SESSION['id'];
								$datajurusan = $config->tampil_jurusan12($id_sekolah);
                                $no=1;
                                while($data = mysqli_fetch_assoc($datajurusan)){
								?>

									<tr>
										<td scope="row"><?php echo $no ?></td>
										<td><?php echo $data['jurusan'] ?></td>
										<td>
											<a href="edit-jurusan<?php echo $data['id_jurusan']; ?>" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active" title="EDIT"></i></a>&nbsp&nbsp  &nbsp&nbsp
											<a href="hapus-jurusan<?php echo $data['id_jurusan']; ?>" class="active" onclick="return confirm('Anda ingin menghapus data?')"><i class="fa fa-times text-danger text-active" title="HAPUS"></i></a>
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
