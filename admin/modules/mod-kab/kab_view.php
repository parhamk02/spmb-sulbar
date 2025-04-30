<div class="card">
    <div class="card-header">
        <h3 class="card-title">DATA KABUPATEN</h3>
    </div>
<div class="card-body">
					  <div>
					  	  <a href="tambah-kab"  id="btn-tambah" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a>
					  </div>
	                  <div class="table-responsive">
					    <table id="example1" class="table table-bordered table-striped">
						<thead>
						  <tr>
							<th width="10">No</th>
							<th width="200">Nama Kabupaten</th>
							<th width="200">Kode</th>
							<th width="200">Kategori</th>
							<th class="center">Aksi</th>
						  </tr>
						</thead>
						<tbody>
<?php
$datakab = $config->tampil_datakab();
$i=1;
while($d = mysqli_fetch_assoc($datakab)){
?>
<tr>
	<td><?php echo $d['id_kab']; ?></td>
	<td><?php echo $d['nama_kab']; ?></td>
	<td><?php echo $d['kode']; ?></td>
	<td><?php echo $d['kategori']; ?></td>
	<td><a href="edit-kab<?php echo $d['id_kab']; ?>" class="btn btn-primary"><b>Edit</b></a><a href="hapus-kab<?php echo $d['id_kab']; ?>" class="btn btn-danger"><b>Hapus</b></a></td>
</tr>
<?php
$i++;
}
?>
</tbody>
</table>
</div>
</div>
</div>