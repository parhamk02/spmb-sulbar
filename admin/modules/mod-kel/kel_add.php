<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Kelurahan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
              <form role="form" action="index.php?module=kel&act=create" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                      <label>Kabupaten</label>                        
                      <select class="form-control select2" name="id_kab" id="id_kab">
                        <?php 
                        $datakec = $config->tampil_kabupaten();
                          while($data = mysqli_fetch_assoc($datakec)){
                            
                            ?>
                              <option value="<?php echo $data['id_kab'] ?>"><?php echo $data['nama_kab'] ?></option>
                        <?php 
                        }
                        ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Kecamatan</label>                        
                      <select class="form-control select2" name="id_kec">
                        <?php 
                        $datakec = $config->tampil_kecamatan();
                          while($data = mysqli_fetch_assoc($datakec)){
                        ?>
                          <option value="<?php echo $data['id_kec'] ?>"><?php echo $data['nama_kec'] ?></option>
                        <?php 
                        }
                        ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Kode Zonasi</label>                        
                      <select class="form-control select2" name="id_zonasi">
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
                    <label for="exampleInputkelurahan">Kelurahan/Desa</label>
                    <input type="text" name="nama_kel" class="form-control" id="exampleInputKelurahan" placeholder="Nama Kelurahan/Desa">
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputkelurahan">Kode Kelurahan/Desa</label>
                    <input type="text" name="kode_kel" class="form-control" id="exampleInputKelurahan" placeholder="Kode Kelurahan/Desa">
                  </div>  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>  
</div>