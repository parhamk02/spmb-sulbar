<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Jadwal SPMB</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="index.php?module=jadwal&act=create" method="POST" enctype="multipart/form-data">
                <div class="card-body">                  
                  <div class="form-group">
                    <label>Jadwal SPMB</label>
                    <input type="text" name="nama_jadwal" class="form-control" id="" placeholder="Jadwal SPMB">
                  </div>  
                  <div class="form-group">
                    <label>Jenis Jadwal</label>
                    <select class="form-control" name="jenis_jadwal">
                      <option value="Pendaftaran">Pendaftaran</option>
                      <option value="Verifikasi Sekolah">Verifikasi Sekolah</option>
                      <option value="Verifikasi Dinas">Verifikasi Dinas</option>
                      <option value="Pengumuman">Pengumuman</option>
                      <option value="Daftar Ulang">Daftar Ulang</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Awal</label>
                    <input type="date" name="awal_jadwal" class="form-control" id="">
                  </div>  
                  <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <input type="date" name="akhir_jadwal" class="form-control" id="">
                  </div>  
                  <div class="form-group">
                    <label>Status Jadwal</label>
                    <select class="form-control" name="status_jadwal">
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