<?php
    $id_sekolah     = $_GET['id_sekolah'];
    $sekolah    = $config->detail_sekolah($id_sekolah);
    $e           = mysqli_fetch_assoc($sekolah);
?>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Sekolah</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="index.php?module=sekolah&act=updatesekolah" method="POST" enctype="multipart/form-data" onsubmit="return Validate(this);">
                 <input type="hidden" name="id_sekolah" value="<?php echo $_GET['id_sekolah']; ?>">
                 <input type="hidden" name="foto_lama" value="<?php echo $e['foto']; ?>">
                 <input type="hidden" name="pass_lama" value="<?php echo $e['password']; ?>">
                <div class="card-body">
                  <div class="form-group">
                      <label>Kabupaten</label>                        
                      <select class="form-control select2" name="id_kab" id="id_kab">
                          <option value="<?php echo $e['id_kab'] ?>" ><?php echo $e['nama_kab'] ?></option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Kecamatan</label>                        
                      <select class="form-control select2" name="id_kec" id="id_kec">
                          <option value="<?php echo $e['id_kec'] ?>"><?php echo $e['nama_kec'] ?></option>
                      </select>
                    </diV>
                    <div class="form-group">
                      <label>Kelurahan</label>                        
                      <select class="form-control select3" name="id_kel" id="id_kelurahan">
                          <option value="<?php echo $e['id_kel']; ?>"><?php echo $e['nama_kel']; ?></option>
                      </select>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputsekolah">NPSN</label>
                    <input type="text" name="npsn" value="<?php echo $e['npsn']; ?>" class="form-control" id="exampleInputsekolah">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Kosongkan Password bila tidak diganti" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputsekolah">Sekolah</label>
                    <input type="text" name="nama_sekolah" value="<?php echo $e['nama_sekolah']; ?>" class="form-control" id="exampleInputsekolah">
                    <input type="hidden" name="id_zonasi" value="<?php echo $e['id_zonasi']; ?>" class="form-control" id="exampleInputsekolah">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputsekolah">Status</label>
                    <input type="text" name="status" value="<?php echo $e['status']; ?>" class="form-control" id="exampleInputsekolah">
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputsekolah">Alamat</label>
                    <input type="textarea" name="alamat" value="<?php echo $e['alamat']; ?>" class="form-control" id="exampleInputsekolah">
                  </div>   
                  <div class="form-group">
                    <label for="exampleInputFile">Logo Sekolah</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" name="foto" accept="image/*" value="" />
                      </div>
                  </div>                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>