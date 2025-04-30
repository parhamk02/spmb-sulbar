

					<div class="card">
              <div class="card-header">
                <h3 class="card-title">DATA SEKOLAH</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
							<table id="export" class="table table-bordered table-striped">
	              <br/>
								<thead>
									<tr>
										<th width="4%">No</th>
                    <th width="16%">Nama Sekolah</th>
                    <th width="10%">Proses</th>
                    <th width="10%">Diterima</th>
                    <th width="10%">Tidak Diterima</th>
                    <th width="10%">Daya Tampung</th>
                    <th width="10%">Total Pendaftar</th>
									</tr>
								</thead>
								<tbody>

								<?php
								$sekolah = $config->tampil_dataspmb44();
								$no=1;
								$total=0;
                while($data = mysqli_fetch_assoc($sekolah)){
								?>

									<tr>
										<td scope="row"><?php echo $no ?></td>
										<td><a href="detail-spmb-<?php echo $data['id_sekolah']; ?>" class="btn btn-primary"><?php echo $data['nama_sekolah'] ?></a></td>
										<td><?php echo $data['proses'] ?></td>
										<td><?php echo $data['diterima'] ?></td>
										<td><?php echo $data['ditolak'] ?></td>
										<td><?php echo $data['kapasitas'] ?></td>
										<td><?php echo $data['proses']+$data['ditolak']+$data['diterima'] ?></td>
									</tr>

								<?php
								$no++;
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
