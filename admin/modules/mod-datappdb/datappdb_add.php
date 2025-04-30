<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="index.php?module=sekolah&act=create" method="POST" enctype="multipart/form-data">
                 <input type="hidden" name="id_users">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Kecamatan</label>                        
                      <select class="form-control select3" name="id_kec" id="id_kec">
                        <option value="">Pilih Kecamatan</option>
                        <?php 
                        $datakec = $config->tampil_kecamatan();
                          while($data = mysqli_fetch_assoc($datakec)){
                        ?>
                          <option value="<?php echo $data['id_kec'] ?>"><?php echo $data['nama_kec'] ?></option>
                        <?php 
                        }
                        ?>
                      </select>
                    </diV>
                    <div class="form-group">
                      <label>Kelurahan</label>                        
                      <select class="form-control select2" name="id_kel" id="id_kelurahan"></select>
                    </div>
                  <div class="form-group">
                      <label>Kode Zonasi</label>                        
                      <select class="form-control" name="id_zonasi">
                        <?php 
                        $datazonasi = $config->tampil_zonasi();
                          while($data = mysqli_fetch_assoc($datazonasi)){
                        ?>
                          <option value="<?php echo $data['id_zonasi'] ?>"><?php echo $data['kode_zonasi'] ?></option>
                        <?php 
                        }
                        ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputsekolah">NPSN</label>
                    <input type="text" name="npsn" class="form-control" id="exampleInputsekolah" placeholder="Masukkan NPSN Sekolah">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputsekolah">Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control" id="exampleInputsekolah" placeholder="Masukkan Nama Sekolah">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputsekolah">Status</label>
                    <input type="text" name="status" class="form-control" id="exampleInputsekolah" placeholder="Masukkan Status Sekolah">
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputsekolah">Alamat</label>
                    <input type="textarea" name="alamat" class="form-control" id="exampleInputsekolah" placeholder="Masukkan Alamat Sekolah">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Logo Sekolah</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" name="foto" accept="image/*"/>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div> 
                </div>  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>