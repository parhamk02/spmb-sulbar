            <div class="title-content text-center">
                <h3 class="title-w3l mb-5">FORM PENDAFTARAN AKUN </h3>
            </div>

            <div class="row contact-grids d-grid mt-12 pt-lg-12">
                <div class="col-md-12">
                    <form action="" method="post" class="signin-form">
                         <h6>Identitas Siswa</h6><br>
                        <div class="input-grids">
                            <input type="text" name="nik" id="" placeholder="Nomor Induk Kependudukan (NIK)*" class="contact-input" required="" minlength="16" maxlength="16" />
                            <input type="text" name="no_kk" id="no_kk" placeholder="Nomor Kartu Keluarga*" class="contact-input" required="" minlength="16" maxlength="16" />
                        </div>
                        <div class="form-input">                        
                            <input type="text" class="form-control" name="nisn" minlength="10" maxlength="10" placeholder="Masukkan NISN" required>
                        </div>
                        <div class="input-grids">
                            <input type="text" name="nama_siswa" id="" placeholder="Nama Lengkap Siswa" class="contact-input" required="" />
                            <input type="text" name="tempat_lahir" id="" placeholder="Tempat Lahir" class="contact-input" required="" />
                            <h6>Tanggal Lahir</h6>
                            <input type="date" name="tanggal_lahir" min="2003-06-30" max="2012-06-30" id="" placeholder="Tanggal Lahir" class="contact-input" required="" />
                        </div>
                        <div class="form-input">                        
                            <select class="form-control select2" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select><br>
                        </div>
                        <div class="input-grids">
                            <input type="email" name="email" id="" placeholder="Email*" class="contact-input" required="" />
                        </div>
                        <div class="input-grids">
                            <input type="text" name="no_telp" id="" placeholder="Nomor Telp/WA*" class="contact-input" required="" />
                        </div><hr>
                         <h6>Alamat Siswa</h6><br>
                        <div class="form-group">
                          <select class="form-control select2" name="id_kab" id="id_kab" required>
                            <option value="">Pilih Kabupaten</option>
                            <?php 
                            $datakab = $config->tampil_kabupaten();
                              while($data = mysqli_fetch_assoc($datakab)){
                            ?>
                              <option value="<?php echo $data['id_kab'] ?>"><?php echo $data['nama_kab'] ?></option>
                            <?php 
                            }
                            ?>
                          </select>
                        </div><br>
                        <div class="form-group">
                          <select class="form-control select2" name="id_kec" id="id_kec" required>
                          </select>
                        </div><br>
                        <div class="form-group">
                          <select class="form-control select2" name="id_kel" id="id_kelurahan" required></select>
                        </div><br>
                        <div class="form-input">
                            <textarea name="alamat" id="alamat" placeholder="Alamat*" required=""></textarea>
                        </div>
                        <div class="submit-w3l-button text-lg-right">
                            <button type="submit" name="daftar" value="daftar" class="btn btn-style btn-primary">DAFTAR AKUN</button>
                        </div>
                    </form>
                </div>
                <?php
                if (isset($_POST['daftar'])) {
                    $nik            = $_POST['nik'];
					$nisn           = $_POST['nisn'];
                  
                    $cek    = $config->cek_nik($nik, $nisn);

                    if ($cek==0) {
                    $id_kel         = $_POST['id_kel'];
                    $no_kk          = $_POST['no_kk'];
                    $nama_siswa     = addslashes($_POST['nama_siswa']);
                    $tempat_lahir   = addslashes($_POST['tempat_lahir']);
                    $tanggal_lahir  = $_POST['tanggal_lahir'];
                    $jenis_kelamin  = $_POST['jenis_kelamin'];
                    $alamat         = addslashes($_POST['alamat']);
                    $email          = $_POST['email'];
                    $no_telp        = $_POST['no_telp'];
                    $tanggal = new DateTime($tanggal_lahir);
                    $tanggal_format = $tanggal->format('dmY');
                    $password       = md5($tanggal_format);
                    
                    $sekolah    = $config->input_siswa($id_kel,$nik,$nisn,$no_kk,$nama_siswa,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$alamat,$email,$no_telp,$password);
                    
                    echo "<script>alert('Data Berhasil Disimpan Silahkan Login Menggunakan Username = NISN dan Password = Tanggal Lahir'); window.location = 'home'</script>";
                    
                    }else{
                    echo "<script>alert('NIK atau NISN Sudah Terdaftar'); window.location = 'daftar-akun'</script>";    
                    }

                }
                ?>
