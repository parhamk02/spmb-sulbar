<?php
    $id_jadwal     = $_GET['id_jadwal'];
    $jadwal    = $config->detail_jadwal($id_jadwal);
    $e           = mysqli_fetch_assoc($jadwal);
?>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Jadwal SPMB</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="index.php?module=jadwal&act=update" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Jalur SPMB</label>
                    <input type="hidden" name="id_jadwal" value="<?php echo $_GET['id_jadwal']; ?>">
                    <input type="text" name="nama_jadwal" value="<?php echo $e['nama_jadwal']; ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Jenis Jadwal</label>
                    <select class="form-control" name="jenis_jadwal">
                      <option value="<?php echo $e['jenis_jadwal'] ?>"><?php echo $e['jenis_jadwal'] ?></option>
                      <option value="Pendaftaran">Pendaftaran</option>
                      <option value="Verifikasi Sekolah">Verifikasi Sekolah</option>
                      <option value="Verifikasi Dinas">Verifikasi Dinas</option>
                      <option value="Pengumuman">Pengumuman</option>
                      <option value="Daftar Ulang">Daftar Ulang</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Awal</label>
                    <input type="date" name="awal_jadwal" class="form-control" id="" value="<?php echo $e['awal_jadwal']; ?>">
                  </div>  
                  <div class="form-group">
                      <label>Tanggal Akhir</label>
                      <input type="date" name="akhir_jadwal" class="form-control" id="" value="<?php echo $e['akhir_jadwal']; ?>">
                  </div>
                  <div class="card-body">                  
                  <div class="form-group">
                    <label>Status Jadwal</label>
                    <select class="form-control" name="status_jadwal">
                      <option value="<?php echo $e['status_jadwal'] ?>"><?php echo $e['status_jadwal'] ?></option>
                      <option value="Aktif">Aktif</option>
                      <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                  </div>  
                </div>                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>