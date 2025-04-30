<?php
$id_siswa = $row1['id_siswa'];
$siswa = $config->detail_siswa($id_siswa);
$ds = mysqli_fetch_assoc($siswa);
$no_pendaftaran = $row1['no_pendaftaran'];
//$no_pendaftaran = time();
$huruf = "A0034";
$no_daftar = $huruf . time();
$berkas = $config->tampil_berkas($no_pendaftaran);
$dk = mysqli_fetch_assoc($berkas);
?>
<div class="title-content text-center">
    <h3 class="title-w3l mb-5">DATA SISWA PENDAFTAR </h3>
</div>
    <div class="row contact-grids d-grid mt-12 pt-lg-12">
        <div class="col-md-12">
            <table class="table table-bordered" style="margin-left: auto; margin-right: auto;">
                <thead>    
                    <th colspan="3" style="background:#D3D3D3">Data Pendaftaran</th>
                </thead>
                <tbody>
                    <tr> 
                        <td width="30%">No. Pendaftaran</td>
                        <td align="left" width="40%" colspan=""><?php echo $no_pendaftaran ?></td>
                        <td rowspan="8" width="30%" align="center" valign="middle"><img style="margin-left:0 auto; margin-right:0 auto;" width="200px" src="file/foto/<?php echo $dk['foto'] ?>"></td>
                    </tr>
                    <tr> 
                        <td>Jalur</td>
                        <td align="left" colspan="2"><?php echo $row1['jalurppdb'] ?></td>
                    </tr>
                    <tr> 
                        <td>Jenjang</td>
                        <td align="left" colspan="2"><?php echo $row1['jenjang'] ?></td>
                    </tr>
                    <tr> 
                        <td>Pilihan Sekolah 1</td>
                        <td align="left" colspan="2"><?php echo $row1['sekolah1'] ?></td>
                    </tr>
                    <tr> 
                        <td>Pilihan Sekolah 2</td>
                        <td align="left" colspan="2"><?php echo $row1['sekolah2'] ?></td>
                    </tr>
                    <tr> 
                        <td>Pilihan Sekolah 3</td>
                        <td align="left" colspan="2"><?php echo $row1['sekolah3'] ?></td>
                    </tr>
                    <tr> 
                        <td>Waktu Pendaftaran</td>
                        <td align="left" colspan="2"><?php echo $row1['created_at'] ?></td>
                    </tr>
                    <tr> 
                        <td>Status Pendaftaran</td>
                        <td align="left" colspan="2"><?php echo $row1['status'] ;if ($row1['status']=='Diterima') {
                            echo " di ".$row1['sekolah'];
                        } ?></td>
                    </tr>
                </tbody>
                <thead>    
                    <th colspan="3" style="background:#D3D3D3">Biodata Siswa</th>
                </thead>
                <tbody>
                    <tr> 
                        <td width="30%">Nama Siswa</td>
                        <td align="left" width="40%" colspan="2"><?php echo $row1['nama_siswa'] ?></td>
                    </tr>
                    <tr> 
                        <td>NIK</td>
                        <td align="left" colspan="2"><?php echo $row1['nik'] ?></td>
                    </tr>
                    <tr> 
                        <td>NISN</td>
                        <td align="left" colspan="2"><?php echo $row1['nisn'] ?></td>
                    </tr>
                    <tr> 
                        <td>Jenis Kelamin</td>
                        <td align="left" colspan="2"><?php echo $row1['jenis_kelamin'] ?></td>
                    </tr>
                    <tr> 
                        <td>Tempat Lahir</td>
                        <td align="left" colspan="2"><?php echo $row1['tempat_lahir'] ?></td>
                    </tr>
                    <tr> 
                        <td>Tanggal Lahir</td>
                        <td align="left" colspan="2"><?php echo $row1['tanggal_lahir'] ?></td>
                    </tr>
                    <tr> 
                        <td>Alamat</td>
                        <td align="left" colspan="2"><?php echo $row1['alamat'] ?></td>
                    </tr>
                    <tr> 
                        <td>Kecamatan</td>
                        <td align="left" colspan="2"><?php echo $ds['nama_kec'] ?></td>
                    </tr>
                    <tr> 
                        <td>Kelurahan</td>
                        <td align="left" colspan="2"><?php echo $ds['nama_kel'] ?></td>
                    </tr>
                    <tr> 
                        <td>Asal Sekolah</td>
                        <td align="left" colspan="2"><?php echo $row1['asal_sekolah'] ?></td>
                    </tr>
                    <tr> 
                        <td>Tahun Lulus</td>
                        <td align="left" colspan="2"><?php echo $row1['tahun_lulus'] ?></td>
                    </tr>
                </tbody>
                <?php
                $no_pendaftaran = $row1['no_pendaftaran'];
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
                                <th colspan="3" style="background:#D3D3D3">NILAI RAPOR - KELAS SEMESTER I</th>
                                <?php
                                foreach ($n_rapor1 as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $key ?></td>
                                    <td colspan="2"><?php echo $value ?>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                <th colspan="3" style="background:#D3D3D3">NILAI RAPOR - KELAS SEMESTER II</th>
                                <?php
                                foreach ($n_rapor2 as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $key ?></td>
                                    <td colspan="2"><?php echo $value ?>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                <th colspan="3" style="background:#D3D3D3">NILAI RAPOR - SEMESTER III</th>
                                <?php
                                foreach ($n_rapor3 as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $key ?></td>
                                    <td colspan="2"><?php echo $value ?>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                <th colspan="3" style="background:#D3D3D3">NILAI RAPOR - SEMESTER IV</th>
                                <?php
                                foreach ($n_rapor4 as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $key ?></td>
                                    <td colspan="2"><?php echo $value ?>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                <th colspan="3" style="background:#D3D3D3">NILAI RAPOR - SEMESTER V</th>
                                <?php
                                foreach ($n_rapor5 as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $key ?></td>
                                    <td colspan="2"><?php echo $value ?>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                <th colspan="3" style="background:#D3D3D3" class="text-center"><a target="blank" class="btn btn-sm btn-success" href="cetak_kartu.php?id=<?php echo $id_siswa?>"> CETAK KARTU PENDAFTARAN</a></th>
            </table>
        </div>
    </div>