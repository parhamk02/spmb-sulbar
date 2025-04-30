<?php
    $id_users     = $_GET['id_users'];
    $dataadmin    = $config->detail_dataadmin($id_users);
    $e           = mysqli_fetch_assoc($dataadmin);
?>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="index.php?module=admin&act=update" method="POST" enctype="multipart/form-data">
                 <input type="hidden" name="id_users" value="<?php echo $_GET['id_users']; ?>">
                 <input type="hidden" name="pass_lama" value="<?php echo $e['password']; ?>">
                 <input type="hidden" name="foto_lama" value="<?php echo $e['foto']; ?>">
                <div class="card-body">
                  <div class="form-group">
                      <label for="users">Nama</label>
                      <input type="text" name="name" value="<?php echo $e['name']; ?>" class="form-control" id="users">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">NPSN</label>
                      <input type="text" name="username" value="<?php echo $e['username']; ?>" class="form-control" id="exampleInputUsername1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Kosongkan Password bila tidak diganti">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <input type="textarea" name="alamat" value="<?php echo $e['alamat']; ?>" class="form-control" id="exampleInputPassword1">
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">Level</label>
                      <select name="level" id="level" class="form-control">                        
                            <option value="<?php echo $e['level']; ?>"><?php echo $e['level']; ?></option>                   
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
                    </div>
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>