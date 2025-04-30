<?php
    $id_kel     = $_GET['id_kel'];
    $kelurahan    = $config->detail_kelurahan($id_kel);
    $e           = mysqli_fetch_assoc($kelurahan);
?>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit kel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
              <form role="form" action="index.php?module=kel&act=update" method="POST" enctype="multipart/form-data">
                 <input type="hidden" name="id_kel" value="<?php echo $_GET['id_kel']; ?>">
                  <div class="form-group">
                      <label>Kabupaten</label>                        
                      <select class="form-control select2" name="id_kab" id="id_kab">
                        <?php 
                        $datakec = $config->tampil_kabupaten();
                          while($data = mysqli_fetch_assoc($datakec)){
                            if ($e['id_kab']==$data['id_kab']) {
                            ?>
                              <option value="<?php echo $data['id_kab'] ?>" selected><?php echo $data['nama_kab'] ?></option>
                            <?php
                            }else{
                            ?>
                              <option value="<?php echo $data['id_kab'] ?>"><?php echo $data['nama_kab'] ?></option>
                            <?php
                            }
                        ?>
                        <?php 
                        }
                        ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Kecamatan</label>                        
                      <select class="form-control select2" name="id_kec" id="id_kec">
                          <option value="<?php echo $e['id_kec'] ?>"><?php echo $e['nama_kec'] ?></option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Kode Zonasi</label>                        
                      <select class="form-control select2" name="id_zonasi">
                        <?php 
                        $datazonasi = $config->tampil_zonasi();
                          while($data = mysqli_fetch_assoc($datazonasi)){
                            if ($e['id_zonasi']==$data['id_zonasi']) {
                            ?>
                              <option value="<?php echo $data['id_zonasi'] ?>" selected><?php echo $data['kode_zonasi'] ?></option>
                            <?php
                            }else{
                            ?>
                              <option value="<?php echo $data['id_zonasi'] ?>"><?php echo $data['kode_zonasi'] ?></option>
                            <?php
                            }
                        ?>
                        <?php 
                        }
                        ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputkelurahan">Kelurahan/Desa</label>
                    <input type="text" name="nama_kel" value="<?php echo $e['nama_kel']; ?>" class="form-control" id="exampleInputkelurahan" >
                  </div>
                  <div class="col-sm-12">
                        <div class="form-group">
                          <label>Sekolah</label>
                          <select class="select2" multiple="multiple" id="zona_sekolah" data-placeholder="Pilih Sekolah" style="width: 100%;" name="zona_sekolah[]">
                            <?php
                              $tampil   = $config->tampil_sekolah();
                              while($data1 = mysqli_fetch_assoc($tampil)){
                              $sekolah = explode(",", $e['zona_sekolah']);
                                $tes1 = array_search("$data1[id_sekolah]", $sekolah);
                              if ($tes1>=-1) {
                                $selec="selected";
                              }else{
                                $selec="";
                              }
                            ?>
                            ?>
                              <option value="<?php echo $data1['id_sekolah'] ?>" <?php echo $selec ?>><?php echo $data1['nama_sekolah'] ?></option>
                            <?php   
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
</div>