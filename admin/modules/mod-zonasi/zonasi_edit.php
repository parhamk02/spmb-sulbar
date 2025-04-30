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
              <form role="form" action="index.php?module=kel&act=update" method="POST" enctype="multipart/form-data">
                 <input type="hidden" name="id_kel" value="<?php echo $_GET['id_kel']; ?>">
                <div class="card-body">
                  <div class="form-group">
                      <label>Kecamatan</label>                        
                      <select class="form-control" name="id_kec">
                        <?php 
                        $datakec = $config->tampil_kecamatan();
                          while($data = mysqli_fetch_assoc($datakec)){
                            if ($e['id_kec']==$data['id_kec']) {
                            ?>
                              <option value="<?php echo $data['id_kec'] ?>" selected><?php echo $data['nama_kec'] ?></option>
                            <?php
                            }else{
                            ?>
                              <option value="<?php echo $data['id_kec'] ?>"><?php echo $data['nama_kec'] ?></option>
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

                <div class="card-footer">
                  <<button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>