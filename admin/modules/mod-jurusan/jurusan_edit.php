<?php
    $id_jurusan     = $_GET['id_jurusan'];
    $jurusan    = $config->detail_jurusan($id_jurusan);
    $e           = mysqli_fetch_assoc($jurusan);
?>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Jurusan SMK</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="index.php?module=jurusan&act=update" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Jalur PPDB</label>
                    <input type="hidden" name="id_jurusan" value="<?php echo $_GET['id_jurusan']; ?>">
                    <input type="text" name="jurusan" value="<?php echo $e['jurusan']; ?>" class="form-control">
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>