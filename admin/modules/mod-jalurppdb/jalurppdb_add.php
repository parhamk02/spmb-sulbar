<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Jalur PPDB</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="index.php?module=jalurppdb&act=create" method="POST" enctype="multipart/form-data">
                <div class="card-body">                  
                  <div class="form-group">
                    <label>Jalur PPDB</label>
                    <input type="text" name="jalurppdb" class="form-control" id="" placeholder="Jalur PPDB">
                  </div>  
                </div>
                <div class="card-body">                  
                  <div class="form-group">
                    <label>Tanggal Awal</label>
                    <input type="date" name="awal" class="form-control" id="">
                  </div>  
                </div>
                <div class="card-body">                  
                  <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <input type="date" name="akhir" class="form-control" id="">
                  </div>  
                </div>  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>