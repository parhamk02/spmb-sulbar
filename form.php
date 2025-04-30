            <div class="title-content text-center">
                <h3 class="title-w3l mb-5">FORM SPMB </h3>
            </div>

            <div class="row contact-grids d-grid mt-12 pt-lg-12">
                <div class="col-md-12">
                    <form action="" method="post" class="signin-form" enctype="multipart/form-data">
                        <input type="hidden" name="id_siswa" id="id_siswa" class="contact-input" value="<?php echo $_SESSION['id'] ?>" />
                        <div class="form-input">
                            <select class="form-control" name="jenjang" id="jenjang" required>
                                <option value="">Pilih Jenjang</option>
                                <option value="SMA">SMA</option>
                                <option value="SMK">SMK</option>
                            </select><br>
                        </div>
                        <div class="form-input">
                            <select class="form-control" name="id_jalurppdb" id="id_jalurppdb" required>
                            </select><br>
                        </div>
                            <button type="button" id="cek" class="btn btn-primary">PILIH</button>
                            <a href="daftar"  id="btn-tambah" class="btn btn-sm btn-primary pull-left">BATAL</a>

                        <br>
                        <br>
                        <div id="hasil"> </div>
                    </form>
                </div>
                
<?php
                if (isset($_POST['daftar1'])) {
                    $no_pendaftaran = $_POST['no_pendaftaran'];
                    $id_jalurppdb   = $_POST['id_jalurppdb'];
                    $jalurppdb    = $config->detail_jalurppdb($id_jalurppdb);
                    $e = mysqli_fetch_assoc($jalurppdb);
                    
                    $asal_sekolah  = addslashes($_POST['asal_sekolah']);
                    $id_siswa      = $_POST['id_siswa'];
                    $jenjang       = $_POST['jenjang'];
                    $tahun_lulus   = $_POST['tahun_lulus'];
                    $id_sekolah1   = $_POST['id_sekolah1'];
                    $id_sekolah2   = $_POST['id_sekolah2'];
                    $id_sekolah3   = $_POST['id_sekolah3'];

                    if ($jenjang=='SMK') {
                        $id_jurusan1 = implode(",", $_POST['id_jurusan1']);
                        $id_jurusan2 = implode(",", $_POST['id_jurusan2']);
                        $id_jurusan3 = implode(",", $_POST['id_jurusan3']);
                    }else{
                        $id_jurusan1 = "";
                        $id_jurusan2 = "";
                        $id_jurusan3 = "";
                    }
                    
                    $nilai_rapor1 = implode("#", $_POST['nilai_rapor1']);
                    $nilai_rapor2 = implode("#", $_POST['nilai_rapor2']);
                    $nilai_rapor3 = implode("#", $_POST['nilai_rapor3']);
                    $nilai_rapor4 = implode("#", $_POST['nilai_rapor4']);
                    $nilai_rapor5 = implode("#", $_POST['nilai_rapor5']);

                    

                    $ppdb    = $config->input_datappdb($no_pendaftaran,$id_siswa,$asal_sekolah,$tahun_lulus,$id_sekolah1,$id_sekolah2,$id_sekolah3,$id_jalurppdb,$jenjang,$id_jurusan1,$id_jurusan2,$id_jurusan3);
                    if ($ppdb) {
                        $nilai    = $config->input_datarapor($no_pendaftaran,$nilai_rapor1,$nilai_rapor2,$nilai_rapor3,$nilai_rapor4,$nilai_rapor5);
                        $berkas = $config->input_berkas($no_pendaftaran);
                    }
                    echo "<script>alert('Data Berhasil Disimpan, Silahkan lengkapi berkas Pendaftaran'); window.location = 'daftar'</script>";
                }
                ?>