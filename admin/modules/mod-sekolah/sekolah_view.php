

					<div class="card">
              <div class="card-header">
                <h3 class="card-title">DATA SEKOLAH</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
							<table id="export" class="table table-bordered table-striped">
								<div class="col-md-3">
                                    <a href="tambah-sekolah"  id="btn-tambah" class="btn btn-sm btn-primary pull-left"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a>
	                            </div>
	                            <br/>
								<thead>
									<tr>
										<th>No</th>
										<th>NPSN</th>
                    <th>Nama Sekolah</th>
                    <th>Kode Zonasi</th>
                    <th>Daya Tampung</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Ket</th>
										<th width="5%" class="text-center">AKSI</th>
									</tr>
								</thead>
								<tbody>

								<?php
								$sekolah = $config->tampil_sekolah();
								$no=1;
                while($data = mysqli_fetch_assoc($sekolah)){
								?>

									<tr>
										<td scope="row"><?php echo $no ?></td>
										<td><?php echo $data['npsn'] ?></td>
										<td><?php echo $data['nama_sekolah'] ?></td>
										<td><?php echo $data['kode_zonasi'] ?></td>
										<td><?php echo $data['kapasitas'] ?></td>
										<td><?php echo $data['alamat'] ?></td>
										<td><?php echo $data['status'] ?></td>
										<td><?php echo $data['ket'] ?></td>
										<td>
											<a href="edit-sekolah<?php echo $data['id_sekolah']; ?>" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active" title="EDIT"></i></a>&nbsp&nbsp  &nbsp&nbsp
											<a href="hapus-sekolah<?php echo $data['id_sekolah']; ?>" class="active" onclick="return confirm('Anda ingin menghapus data?')"><i class="fa fa-times text-danger text-active" title="HAPUS"></i></a>
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
