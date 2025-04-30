<?php
    $id_jalurppdb     = $_GET['id_jalurppdb'];
    $jalurppdb    = $config->detail_jalurppdb($id_jalurppdb);
    $e           = mysqli_fetch_assoc($jalurppdb);
?>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Jalur PPDB</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="index.php?module=jalurppdb&act=update" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Jalur PPDB</label>
                    <input type="hidden" name="id_jalurppdb" value="<?php echo $_GET['id_jalurppdb']; ?>">
                    <input type="text" name="jalurppdb" value="<?php echo $e['jalurppdb']; ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Awal</label>
                    <input type="date" name="awal" class="form-control" id="" value="<?php echo $e['awal']; ?>">
                  </div>  
                  <div class="form-group">
                      <label>Tanggal Akhir</label>
                      <input type="date" name="akhir" class="form-control" id="" value="<?php echo $e['akhir']; ?>">
                  </div>                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>