
<?php
session_start();
require_once("app/config.php");;
$config = new config();
date_default_timezone_set("Asia/Makassar");
$id_datappdb = $_GET['id_datappdb'];
$datappdb = $config->detail_datappdb($id_datappdb);
$row1 = mysqli_fetch_assoc($datappdb);
$id_jalurppdb = $row1['id_jalurppdb'];
$no_pendaftaran = $row1['no_pendaftaran'];
$berkas = $config->tampil_berkas($no_pendaftaran);
$dk = mysqli_fetch_assoc($berkas);

$ket = "Verifikasi Sekolah";
$datajadwal = $config->tampil_jadwal12($ket);
$jadwal = mysqli_fetch_assoc($datajadwal);
$today = date('Y-m-d');


if ($row1['jenjang']=='SMK' and $_SESSION['level']=='Pengguna') {
    if ($_SESSION['id']==$row1['id_sekolah1']) {
    $id_jurusan = $row1['id_jurusan1'];
    $posisi = 1;
    }elseif ($_SESSION['id']==$row1['id_sekolah2'] and $_SESSION['id']==$row1['sekolah_id']) {
    $id_jurusan = $row1['id_jurusan2'];
    $posisi = 2;
    }elseif ($_SESSION['id']==$row1['id_sekolah3'] and $row1['jurusan_id']==0) {
    $id_jurusan = $row1['id_jurusan3'];
    $posisi = 3;
    }elseif($_SESSION['id']==$row1['id_sekolah1'] and $row1['status']=='Tidak Diterima'){
    $id_jurusan = $row1['id_jurusan1']; 
    $posisi = 0;
    }

    $jurusanid = explode(",",$id_jurusan);
    $jurusan   = $config->detail_jurusan1($id_jurusan);
    $jr = array();
    while($data = mysqli_fetch_assoc($jurusan)){ 
        $jr[$data['id_jurusan']]=$data;
    }
}

?>

            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Berkas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Nilai Rapor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-sekolah-tab" data-toggle="pill" href="#custom-content-above-sekolah" role="tab" aria-controls="custom-content-above-sekolah" aria-selected="false">Pilihan Sekolah</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-above-tabContent">
              <div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                 <table class="table table-bordered">
                <tbody>
                    <tr> 
                        <td width="55%">No. Pendaftaran</td>
                        <td align="left" width="45%"><?php echo $row1['no_pendaftaran'] ?></td>
                    </tr>
                    <tr> 
                        <td>File KK/Domisili</td>
                        <td align="left"><a class="btn btn-sm btn-success" target="blank" href="../file/kkdomisili/<?php echo $dk['kkdomisili'] ?>">Lihat</a></td>
                    </tr>
                    <tr> 
                        <td>File Akta Kelahiran</td>
                        <td align="left"><a class="btn btn-sm btn-success" target="blank" href="../file/aktalahir/<?php echo $dk['aktalahir'] ?>">Lihat</a></td>
                    </tr>
                  	<tr> 
                        <td>File Rapor</td>
                        <td align="left"><a class="btn btn-sm btn-success" target="blank" href="../file/rapor/<?php echo $dk['rapor'] ?>">Lihat</a></td>
                    </tr>
                    <tr> 
                        <td>Foto</td>
                        <td align="left"><a class="btn btn-sm btn-success" target="blank" href="../file/foto/<?php echo $dk['foto'] ?>">Lihat</a></td>
                    </tr>
                    <?php
                        if ($row1['jalurppdb']=='Perpindahan Tugas Ortu / Wali') {
                    ?>
                    <tr> 
                        <td>Surat Keputusan Pindah Tugas/Mutasi Orang Tua/Wali</td>
                        <td align="left"><a class="btn btn-sm btn-success" target="blank" href="../file/surat_pindah/<?php echo $dk['surat_pindah'] ?>">Lihat</a></td>
                    </tr>
                    <tr> 
                        <td>Surat Keputusan Penempatan orang tua/wali di sekolah bagi anak Guru/Tenaga Kependidikan</td>
                        <td align="left"><a class="btn btn-sm btn-success" target="blank" href="../file/penempatan/<?php echo $dk['penempatan'] ?>">Lihat</a></td>
                    </tr>
                    <?php
                        }elseif ($row1['jalurppdb']=='Afirmasi') {
                    ?>
                    <tr> 
                        <td>Kartu Program Keluarga Harapan (PKH)/Kartu Indonesia Pintar (KIP)</td>
                        <td align="left"><a class="btn btn-sm btn-success" target="blank" href="../file/pkh/<?php echo $dk['pkh'] ?>">Lihat</a></td>
                    </tr>
                    <tr> 
                        <td>Surat Keterangan Berkebutuhan Khusus (Optional)</td>
                        <td align="left"><a class="btn btn-sm btn-success" target="blank" href="../file/surat_khusus/<?php echo $dk['surat_khusus'] ?>">Lihat</a></td>
                    </tr>
                    <?php
                        }elseif ($row1['jalurppdb']=='Prestasi') {
                    ?>
                    <tr> 
                        <td>Sertifikat hasil kejuaraan/lomba asli dan yang dilegalisir</td>
                        <td align="left"><a class="btn btn-sm btn-success" target="blank" href="../file/sertifikat/<?php echo $dk['sertifikat'] ?>">Lihat</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
              </div>
                 <?php
                $rapor = $config->tampil_nilairapor($no_pendaftaran);
                $dr = mysqli_fetch_assoc($rapor);
                $mapel = array("PKN","BHS. INDONESIA","BHS. INGGRIS","MATEMATIKA");
                $nilai1 = explode("#", $dr['nilai_rapor1']);
                $nilai2 = explode("#", $dr['nilai_rapor2']);
                $nilai3 = explode("#", $dr['nilai_rapor3']);
                $nilai4 = explode("#", $dr['nilai_rapor4']);
                $nilai5 = explode("#", $dr['nilai_rapor5']);

                $n_rapor1 = array_combine($mapel, $nilai1);
                $n_rapor2 = array_combine($mapel, $nilai2);
                $n_rapor3 = array_combine($mapel, $nilai3);
                $n_rapor4 = array_combine($mapel, $nilai4);
                $n_rapor5 = array_combine($mapel, $nilai5);
                ?>
                <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                <div class="table-responsive">
                    <table class="table table-bordered">
                                <th>NILAI RAPOR</th>
                                <?php
                                foreach ($n_rapor1 as $key => $value) {
                                ?>
                                    <th><?php echo $key ?></th>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td>KELAS SEMESTER I</td>
                                <?php
                                foreach ($n_rapor1 as $key => $value) {
                                ?>
                                    <td><?php echo $value ?>
                                    </td>
                                <?php
                                }
                                ?>
                                </tr>
                                <tr>
                                    <td>KELAS SEMESTER II</td>
                                <?php
                                foreach ($n_rapor2 as $key => $value) {
                                ?>
                                    <td><?php echo $value ?>
                                    </td>
                                <?php
                                }
                                ?>
                                </tr>
                                <tr>
                                    <td>KELAS SEMESTER III</td>
                                <?php
                                foreach ($n_rapor3 as $key => $value) {
                                ?>
                                    <td><?php echo $value ?>
                                    </td>
                                <?php
                                }
                                ?>
                                </tr>
                                <tr>
                                    <td>KELAS SEMESTER IV</td>
                                <?php
                                foreach ($n_rapor4 as $key => $value) {
                                ?>
                                    <td><?php echo $value ?>
                                    </td>
                                <?php
                                }
                                ?>
                                </tr>
                                <tr>
                                    <td>KELAS SEMESTER V</td>
                                <?php
                                foreach ($n_rapor5 as $key => $value) {
                                ?>
                                    <td><?php echo $value ?>
                                    </td>
                                <?php
                                }
                                ?>
                                </tr>
                </table>
              </div>
              </div>
            <div class="tab-pane fade" id="custom-content-above-sekolah" role="tabpanel" aria-labelledby="custom-content-above-sekolah-tab">
              <div class="table-responsive">
                <?php
                if ($row1['jenjang']=='SMK') {
                    $id_jurusan1 = explode(",",$row1['id_jurusan1']);
                    $id_jurusan2 = explode(",",$row1['id_jurusan2']);
                    $id_jurusan3 = explode(",",$row1['id_jurusan3']);
                    

                    $jurusan1   = $config->detail_jurusan1($row1['id_jurusan1']);
                    $jr1 = array();
                    while($data1 = mysqli_fetch_assoc($jurusan1)){ 
                        $jr1[$data1['id_jurusan']]=$data1['jurusan'];
                    }

                    $jurusan2   = $config->detail_jurusan1($row1['id_jurusan2']);
                    $jr2 = array();
                    while($data2 = mysqli_fetch_assoc($jurusan2)){ 
                        $jr2[$data2['id_jurusan']]=$data2['jurusan'];
                    }

                    $jurusan3   = $config->detail_jurusan1($row1['id_jurusan3']);
                    $jr3 = array();
                    while($data3 = mysqli_fetch_assoc($jurusan3)){ 
                        $jr3[$data3['id_jurusan']]=$data3['jurusan'];
                    }
                }
                ?>
                <table class="table table-bordered">
                    <thead>
                        <th width="30%">Pilihan Sekolah</th>
                        <?php
                        if ($row1['jenjang']=='SMK') {
                        ?>
                        <th>Pilihan Jurusan</th>
                        <?php 
                        } 
                        ?>
                        <th>Status</th>
                        <th>Keterangan</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row1['sekolah1'] ?></td>
                            <?php
                            if ($row1['jenjang']=='SMK') {
                            ?>
                            <td><?php echo $jr1[$id_jurusan1['0']].", ".$jr1[$id_jurusan1['1']].", ".$jr1[$id_jurusan1['2']] ?></td>
                            <?php 
                            }
                            ?>
                            <td><?php echo $row1['status1'] ?></td>
                            <td><?php echo $row1['ket'] ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $row1['sekolah2'] ?></td>
                            <?php
                            if ($row1['jenjang']=='SMK') {
                            ?>
                            <td><?php echo $jr2[$id_jurusan2['0']].", ".$jr2[$id_jurusan2['1']].", ".$jr2[$id_jurusan2['2']] ?></td>
                            <?php 
                            }
                            ?>
                            <td><?php echo $row1['status2'] ?></td>
                            <td><?php echo $row1['ket2'] ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $row1['sekolah3'] ?></td>
                            <?php
                            if ($row1['jenjang']=='SMK') {
                            ?>
                            <td><?php echo $jr3[$id_jurusan3['0']].", ".$jr3[$id_jurusan3['1']].", ".$jr3[$id_jurusan3['2']] ?></td>
                            <?php 
                            }
                            ?>
                            <td><?php echo $row1['status3'] ?></td>
                            <td><?php echo $row1['ket3'] ?></td>
                        </tr>
                    </tbody>          
                </table>
              </div>
              </div>
            </div>
              
            
        <?php 
        
        if ($row1['status1']=='Proses' and ($_SESSION['level']=="Pengguna") and $row1['id_sekolah1']==$_SESSION['id']) {
            $id_sekolah = $_SESSION['id'];
            $cek  = $config->cek_kapasitas($id_sekolah,$id_jalurppdb);
            $cek1 = mysqli_fetch_assoc($cek);
            $sisa_kapasitas = $cek1['kapasitas'] - $cek1['jumlah_pendaftar'];
            //if ($row1['jalurppdb']=='Zonasi') {
            //$sisa_kapasitas = round((70/100) * $cek1['kapasitas']);
            //}elseif ($row1['jalurppdb']=='Afirmasi') {
            //$sisa_kapasitas = round((15/100) * $cek1['kapasitas']);
            //}elseif ($row1['jalurppdb']=='Perpindahan Tugas Ortu / Wali') {
            //$sisa_kapasitas = round((5/100) * $cek1['kapasitas']);
            //}elseif ($row1['jalurppdb']=='Prestasi') {
            //$sisa_kapasitas = round((10/100) * $cek1['kapasitas']);
            //}elseif ($row1['jalurppdb']=='Reguler') {
            //$sisa_kapasitas = round((85/100) * $cek1['kapasitas']);
            //}
            if ($sisa_kapasitas>0) {
        ?>
        <form role="form" action="index.php?module=datappdb&act=proses" method="POST">
        <table class="table table-bordered">
        <tr> 
                        <td align="left"><?php echo " Sisa Daya Tampung saat ini adalah ".$sisa_kapasitas." dari ".$cek1['kapasitas'] ?></td>
                    </tr>
        </table>
        <div class="form-group">
                    <input type="hidden" name="id_sekolah" value="<?php echo $_SESSION['id'] ?>">
                    <input type="hidden" name="id_sekolah2" value="<?php echo $row1['id_sekolah2'] ?>">
                    <input type="hidden" name="id_sekolah3" value="<?php echo $row1['id_sekolah3'] ?>">
                    <input type="hidden" name="jenjang" value="<?php echo $row1['jenjang'] ?>">
                    <input type="hidden" name="id_datappdb" id="id_datappdb" value="<?php echo $id_datappdb ?>">
                    <div class="row">
                    <div class="col-sm-6">
                        <select name="status" id="status" class="form-control" style="width: 100%;">
                                <option value="Diterima">Diterima</option>
                                <option value="Tidak Diterima">Tidak Diterima</option>
                        </select>
                    </div>
                    <?php
                    if ($row1['jenjang']=='SMK') {
                    ?>
                    <div class="col-sm-6">
                        <select name="jurusan_id" class="form-control" id="jurusan_id">
                            <?php
                                foreach ($jurusanid as $id) {
                                ?>
                                    <option value="<?php echo $jr[$id]['id_jurusan'] ?>"><?php echo $jr[$id]['jurusan'] ?></option>
                                <?php  
                                }
                            ?>
                        </select>
                    </div>
                    <?php
                    }else{
                    ?>
                    <input type="hidden" name="jurusan_id" id="jurusan_id" value="0">

                    <?php
                    }
                    ?>
                </div><br>
                    <input type="text" name="ket" class="form-control" id="alasan" placeholder="Alasan Jika Siswa Tidak Diterima">
        </div>
          <div class="modal-footer">
            <?php
                if (isset($jadwal)) {
            ?>
            <button type="submit" class="btn btn-primary" name="proses1" onclick="return confirm('Lanjutkan Proses ??')">Proses</button>
            <?php 
                }
            ?>
          </div>
        </form>
        <?php
            }
        }elseif ($_SESSION['level']=="Pengguna" and $row1['sekolah_id']==$_SESSION['id'] and $row1['id_sekolah2']==$_SESSION['id'] and $row1['status2']=='Proses') {
        ?>
        <form role="form" action="index.php?module=datappdb&act=proses2" method="POST">
            <input type="hidden" name="sekolah_id" value="<?php echo $row1['sekolah_id'] ?>">
            <input type="hidden" name="id_sekolah" value="<?php echo $_SESSION['id'] ?>">
                    <input type="hidden" name="id_sekolah2" value="<?php echo $row1['id_sekolah2'] ?>">
                    <input type="hidden" name="id_sekolah3" value="<?php echo $row1['id_sekolah3'] ?>">
                    <input type="hidden" name="jenjang" value="<?php echo $row1['jenjang'] ?>">
                    <input type="hidden" name="id_datappdb" id="id_datappdb" value="<?php echo $id_datappdb ?>">
                    <div class="row">
                    <div class="col-sm-6">
                        <select name="status" id="status" class="form-control" style="width: 100%;">
                                <option value="Diterima">Diterima</option>
                                <option value="Tidak Diterima">Tidak Diterima</option>
                        </select>
                    </div>
                    <?php
                    if ($row1['jenjang']=='SMK') {
                    ?>
                    <div class="col-sm-6">
                        <select name="jurusan_id" class="form-control" id="jurusan_id">
                            <?php
                                foreach ($jurusanid as $id) {
                                ?>
                                    <option value="<?php echo $jr[$id]['id_jurusan'] ?>"><?php echo $jr[$id]['jurusan'] ?></option>
                                <?php  
                                }
                            ?>
                        </select>
                    </div>
                    <?php
                    }
                    ?>
                </div><br>
                    <input type="text" name="ket2" class="form-control" id="alasan" placeholder="Alasan Jika Siswa Tidak Diterima">
            <div class="modal-footer">
            <?php
                if (isset($jadwal)) {
            ?>
            <button type="submit" class="btn btn-primary" name="proses" onclick="return confirm('Lanjutkan Proses ??')">Proses</button>
            <?php
            }
            ?>
          </div>
        </form>
        <?php
        }elseif ($_SESSION['level']=="Pengguna" and $row1['sekolah_id']==$_SESSION['id'] and $row1['id_sekolah3']==$_SESSION['id'] and $row1['status3']=='Proses') {
        ?>
        <form role="form" action="index.php?module=datappdb&act=proses3" method="POST">
            <input type="hidden" name="sekolah_id" value="<?php echo $row1['sekolah_id'] ?>">
            <input type="hidden" name="id_sekolah" value="<?php echo $_SESSION['id'] ?>">
                    <input type="hidden" name="id_sekolah2" value="<?php echo $row1['id_sekolah2'] ?>">
                    <input type="hidden" name="id_sekolah3" value="<?php echo $row1['id_sekolah3'] ?>">
                    <input type="hidden" name="jenjang" value="<?php echo $row1['jenjang'] ?>">
                    <input type="hidden" name="id_datappdb" id="id_datappdb" value="<?php echo $id_datappdb ?>">
                    <div class="row">
                    <div class="col-sm-6">
                        <select name="status" id="status" class="form-control" style="width: 100%;">
                                <option value="Diterima">Diterima</option>
                                <option value="Tidak Diterima">Tidak Diterima</option>
                        </select>
                    </div>
                    <?php
                    if ($row1['jenjang']=='SMK') {
                    ?>
                    <div class="col-sm-6">
                        <select name="jurusan_id" class="form-control" id="jurusan_id">
                            <?php
                                foreach ($jurusanid as $id) {
                                ?>
                                    <option value="<?php echo $jr[$id]['id_jurusan'] ?>"><?php echo $jr[$id]['jurusan'] ?></option>
                                <?php  
                                }
                            ?>
                        </select>
                    </div>
                    <?php
                    }
                    ?>
                </div><br>
                    <input type="text" name="ket3" class="form-control" id="alasan" placeholder="Alasan Jika Siswa Tidak Diterima">
            <div class="modal-footer">
            <?php
                if (isset($jadwal)) {
            ?>
            <button type="submit" class="btn btn-primary" name="proses" onclick="return confirm('Lanjutkan Proses ??')">Proses</button>
            <?php 
            }
            ?>
          </div>
        </form>
        <?php
        }elseif (($_SESSION['level']=="Pengguna" or $_SESSION['level']=="Dinas") and $row1['status']=='Diterima' and $row1['jenjang']=='SMK') {
        ?>
        <table class="table table-bordered">
        <tr> 
                        <td align="left"><?php echo " Status = ".$row1['status']." di ".$row1['sekolah']." pada jurusan ".$row1['jurusan'] ?></td>
                    </tr>
        </table>
        <?php
        }elseif (($_SESSION['level']=="Pengguna" or $_SESSION['level']=="Dinas") and $row1['status']=='Diterima' and $row1['jenjang']=='SMA') {
        ?>
        <table class="table table-bordered">
        <tr> 
                        <td align="left"><?php echo " Status = ".$row1['status']." di ".$row1['sekolah'] ?></td>
                    </tr>
        </table>
        <?php
        } ?>

        <script>
  $(function () {

    //Initialize Select2 Elements
    $('.select2').select2()
                        
  })
</script>