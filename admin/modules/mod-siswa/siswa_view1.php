

					<div class="card">
              <div class="card-header">
                <h3 class="card-title">DATA SISWA</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
							<table id="export" class="table table-bordered table-striped">
							<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
                                        <th>NIK</th>
                                        <th>NISN</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>Umur</th>
                                        <th>Alamat</th>
										
									</tr>
								</thead>
								<tbody>

								<?php
								$id_sekolah=$_SESSION['id'];
									$siswa = $config->tampil_siswa();
								$no=1;
                while($data = mysqli_fetch_assoc($siswa)){
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
                                      	<td><?php echo $data['tempat_lahir'] ?></td>
										<td><?php echo $data['tanggal_lahir'] ?></td>
										<td><?php echo $data['nama_kec'] ?></td>
										<td><?php echo $data['nama_kel'] ?></td>
										<td><?php echo $thn." tahun ".$bln." bulan ".$tgl." hari" ?></td>
										<td><?php echo $data['alamat'] ?></td>
										
									</tr>

								<?php
								$no++;
								}
								?>
								</tbody>
							</table>
						</div>
					</div>

<!-- /.modal -->
		      <div class="modal fade" id="modal-detail">
		        <div class="modal-dialog modal-lg">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h4 class="modal-title">Berkas Kelengkapan PPDB</h4>
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