<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Jurusan SMK</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="index.php?module=jurusan&act=create1" method="POST" enctype="multipart/form-data">
                <div class="card-body">                  
                  <div class="form-group">
                    <label>Nama Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" id="" placeholder="Nama Jurusan">
                    <input type="hidden" name="id_sekolah" class="form-control" id="" value="<?php echo $_SESSION['id'] ?>">
                  </div>  
                </div>  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>