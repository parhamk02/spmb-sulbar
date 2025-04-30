<?php
    $id_kec     = $_GET['id_kec'];
    $kecamatan    = $config->detail_kecamatan($id_kec);
    $e           = mysqli_fetch_assoc($kecamatan);
?>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Kecamatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="index.php?module=kec&act=update" method="POST" enctype="multipart/form-data">
                 <input type="hidden" name="id_kec" value="<?php echo $_GET['id_kec']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputkecamatan">Kecamatan</label>
                    <input type="text" name="nama_kec" value="<?php echo $e['nama_kec']; ?>" class="form-control" id="exampleInputkecamatan" >
                  </div>
                <div class="col-sm-12">
                        <div class="form-group">
                          <label>Sekolah</label>
                          <select class="select2" multiple="multiple" id="zona_sekolah" data-placeholder="Pilih Sekolah" style="width: 100%;" name="zona_sekolah[]">
                            <?php
                              $tampil   = $config->tampil_sekolah();
                              while($data1 = mysqli_fetch_assoc($tampil)){
                            ?>
                              <option value="<?php echo $data1['id_sekolah'] ?>"><?php echo $data1['nama_sekolah'] ?></option>
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