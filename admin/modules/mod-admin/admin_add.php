<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="index.php?module=admin&act=create" method="POST" enctype="multipart/form-data">
                 <input type="hidden" name="id_users">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="users">Nama</label>
                      <input type="text" name="name" class="form-control" id="users" placeholder="Nama users">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input type="text" name="username" class="form-control" id="exampleInputUsername1" placeholder="Username...">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password...">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <input type="textarea" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="Alamat">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">Level</label>
                      <select name="level" id="level" class="form-control">                        
                            <option value="Admin">Admin</option>                   
                            <option value="Pengguna">Pengguna</option> 
                            <option value="Dinas">Dinas</option> 
                      </select>
                    </div>                                                          
                    <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>