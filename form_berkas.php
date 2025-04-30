<?php
$no_pendaftaran = $row1['no_pendaftaran'];
$berkas = $config->tampil_berkas($no_pendaftaran);
$dk = mysqli_fetch_assoc($berkas);
$surat_pindah = 1;
$penempatan = 1;
$pkh = 1;
$surat_khusus = 1;
$sertifikat = 1;
?>
                    <form id="uploadForm" action="" method="post" class="signin-form" enctype="multipart/form-data">

                        <table class="table table-bordered" style="width:100%">
                        <?php
                        if ($row1['jalurppdb']=='Mutasi') {
                        ?>
                        <tr>
                            <td width="55%">File Surat Keputusan Pindah Tugas/Mutasi Orang Tua/Wali * File PDF Max 1MB</td>
                            <td width="30%">
                              <div class="form-input">
                              <input type="file" class="form-control" name="file_suratpindah" accept=".pdf" onchange="validateFile1(this)" id="file_suratpindah" data-folder="surat_pindah" data-id="<?php echo $row1['no_pendaftaran'] ?>">
                            </div>
                            </td>
                            <td width="15%">
                              <?php
                              if (isset($dk['surat_pindah'])) {
                                $surat_pindah = 1;
                              ?>
                              <a class="btn btn-success" target="blank" href="file/surat_pindah/<?php echo $dk['surat_pindah'] ?>">Lihat</a>
                              <?php
                              }else{
                                $surat_pindah = 0;
                              ?>
                              <button type="button" class="btn btn-success" disabled>Lihat</button>
                              <?php
                              }
                              ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="55%">File Surat Keputusan Penempatan orang tua/wali di sekolah bagi anak Guru/Tenaga Kependidikan * File PDF Max 1MB</td>
                            <td width="30%">
                              <div class="form-input">
                              <input type="file" class="form-control" name="file_penempatan" accept=".pdf" onchange="validateFile1(this)" id="file_penempatan" data-folder="penempatan" data-id="<?php echo $row1['no_pendaftaran'] ?>">
                            </div>
                            </td>
                            <td width="15%">
                              <?php
                              if (isset($dk['penempatan'])) {
                                $penempatan = 1;
                              ?>
                              <a class="btn btn-success" target="blank" href="file/penempatan/<?php echo $dk['penempatan'] ?>">Lihat</a>
                              <?php
                              }else{
                                $penempatan = 0;
                              ?>
                              <button type="button" class="btn btn-success" disabled>Lihat</button>
                              <?php
                              }
                              ?>
                            </td>
                        </tr>
                        <?php
                        }elseif ($row1['jalurppdb']=='Afirmasi') {
                        ?>
                        <tr>
                            <td width="55%">File Kartu Program Keluarga Harapan (PKH)/Kartu Indonesia Pintar (KIP) * File PDF Max 1MB</td>
                            <td width="30%">
                              <div class="form-input">
                              <input type="file" class="form-control" name="file_pkh" accept=".pdf" onchange="validateFile1(this)" id="file_pkh" data-folder="pkh" data-id="<?php echo $row1['no_pendaftaran'] ?>">
                            </div>
                            </td>
                            <td width="15%">
                              <?php
                              if (isset($dk['pkh'])) {
                                $pkh = 1;
                              ?>
                              <a class="btn btn-success" target="blank" href="file/pkh/<?php echo $dk['pkh'] ?>">Lihat</a>
                              <?php
                              }else{
                                $pkh = 0;
                              ?>
                              <button type="button" class="btn btn-success" disabled>Lihat</button>
                              <?php
                              }
                              ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="55%">File Surat Keterangan Berkebutuhan Khusus (Optional) * File PDF Max 1MB</td>
                            <td width="30%">
                              <div class="form-input">
                              <input type="file" class="form-control" name="file_suratkhusus" accept=".pdf" onchange="validateFile1(this)" id="file_suratkhusus" data-folder="surat_khusus" data-id="<?php echo $row1['no_pendaftaran'] ?>">
                            </div>
                            </td>
                            <td width="15%">
                              <?php
                              if (isset($dk['surat_khusus'])) {
                                $surat_khusus = 1;
                              ?>
                              <a class="btn btn-success" target="blank" href="file/surat_khusus/<?php echo $dk['surat_khusus'] ?>">Lihat</a>
                              <?php
                              }else{
                                $surat_khusus = 1;
                              ?>
                              <button type="button" class="btn btn-success" disabled>Lihat</button>
                              <?php
                              }
                              ?>
                            </td>
                        </tr>
                        <?php
                        }elseif ($row1['jalurppdb']=='Prestasi') {
                        ?>
                        <tr>
                            <td width="55%">File Sertifikat hasil kejuaraan/lomba asli dan yang dilegalisir * File PDF Max 1MB</td>
                            <td width="30%">
                              <div class="form-input">
                              <input type="file" class="form-control" name="file_sertifikat" accept=".pdf" onchange="validateFile1(this)" id="file_sertifikat" data-folder="sertifikat" data-id="<?php echo $row1['no_pendaftaran'] ?>">
                            </div>
                            </td>
                            <td width="15%">
                              <?php
                              if (isset($dk['sertifikat'])) {
                                $sertifikat = 1;
                              ?>
                              <a class="btn btn-success" target="blank" href="file/sertifikat/<?php echo $dk['sertifikat'] ?>">Lihat</a>
                              <?php
                              }else{
                                $sertifikat = 0;
                              ?>
                              <button type="button" class="btn btn-success" disabled>Lihat</button>
                              <?php
                              }
                              ?>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                          <tr>
                            <td width="55%">File Kartu Keluarga/Surat Keterangan Domisili * File PDF Max 1MB </td>
                            <td width="30%">
                              <div class="form-input">
                              <input type="file" class="form-control" name="file_kkdomisili" accept=".pdf" onchange="validateFile1(this)" id="file_kkdomisili" data-folder="kkdomisili" data-id="<?php echo $row1['no_pendaftaran'] ?>">
                            </div>
                            </td>
                            <td width="15%">
                              <?php
                              if (isset($dk['kkdomisili'])) {
                                $kkdomisili = 1;
                              ?>
                              <a class="btn btn-success" target="blank" href="file/kkdomisili/<?php echo $dk['kkdomisili'] ?>">Lihat</a>
                              <?php
                              }else{
                                $kkdomisili = 0;
                              ?>
                              <button type="button" class="btn btn-success" disabled>Lihat</button>
                              <?php
                              }
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <td width="55%">File Akta Kelahiran/Surat Keterangan Lahir * File PDF Max 1MB</td>
                            <td width="30%">
                              <div class="form-input">
                              <input type="file" class="form-control" name="file_aktalahir" accept=".pdf" onchange="validateFile1(this)" id="file_aktalahir" data-folder="aktalahir" data-id="<?php echo $row1['no_pendaftaran'] ?>">
                            </div>
                            </td>
                            <td width="15%">
                              <?php
                              if (isset($dk['aktalahir'])) {
                                $aktalahir = 1;
                              ?>
                              <a class="btn btn-success" target="blank" href="file/aktalahir/<?php echo $dk['aktalahir'] ?>">Lihat</a>
                              <?php
                              }else{
                                $aktalahir = 0;
                              ?>
                              <button type="button" class="btn btn-success" disabled>Lihat</button>
                              <?php
                              }
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <td width="55%">File Scan Rapor Semester I - V * File PDF Max 1MB</td>
                            <td width="30%">
                              <div class="form-input">
                              <input type="file" class="form-control" name="file_rapor" accept=".pdf" onchange="validateFile1(this)" id="file_rapor" data-folder="rapor" data-id="<?php echo $row1['no_pendaftaran'] ?>">
                            </div>
                            </td>
                            <td width="15%">
                              <?php
                              if (isset($dk['rapor'])) {
                                $rapor = 1;
                              ?>
                              <a class="btn btn-success" target="blank" href="file/rapor/<?php echo $dk['rapor'] ?>">Lihat</a>
                              <?php
                              }else{
                                $rapor = 0;
                              ?>
                              <button type="button" class="btn btn-success" disabled>Lihat</button>
                              <?php
                              }
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <td width="55%">Foto 3 x 4 latar merah * File JPEG/JPG Max 1MB</td>
                            <td width="30%">
                              <div class="form-input">
                              <input type="file" class="form-control" name="file_foto" accept=".jpg" onchange="validateFile(this)" id="file_foto" data-folder="foto" data-id="<?php echo $row1['no_pendaftaran'] ?>">
                            </div>
                            </td>
                            <td width="15%">
                              <?php
                              if (isset($dk['foto'])) {
                                $foto = 1;
                              ?>
                              <a class="btn btn-success" target="blank" href="file/foto/<?php echo $dk['foto'] ?>">Lihat</a>
                              <?php
                              }else{
                                $foto = 0;
                              ?>
                              <button type="button" class="btn btn-success" disabled>Lihat</button>
                              <?php
                              }
                              ?>
                            </td>
                          </tr>
                        </table>
                      <?php
                      if ($surat_pindah==0 or $penempatan==0 or $pkh==0 or $surat_khusus==0 or $sertifikat==0 or $kkdomisili==0 or $aktalahir==0 or $rapor==0 or $foto==0) {
                      ?>
                      <button type="submit" class="btn btn-primary" name="kirim" onclick="return confirm('Pastikan Semua Berkas yang Diupload Sudah Sesuai !!')" disabled>Kirim</button>
                      <?php
                      }else{
                      ?>
                      <button type="submit" class="btn btn-primary" name="kirim" onclick="return confirm('Pastikan Semua Berkas yang Diupload Sudah Sesuai !!')">Kirim</button>
                      <?php
                      }
                      ?>
                      </form>
                      <div id="status"></div>

                      <?php
                        if (isset($_POST['kirim'])) {
                          
                            $id_datappdb = $row1['id_datappdb'];
                            $sekolah    = $config->update_datappdb($id_datappdb);
                            
                            echo "<script>alert('Data dan Berkas Pendaftaran Berhasil Dikirim'); window.location = 'daftar'</script>";
                            
                        }
                        ?>


<script>
function validateFile(input) {
  const allowedTypes = ['image/jpeg', 'image/jpg'];
  const maxSizeMB = 1; // Maximum file size allowed in MB

  if (input.files.length > 0) {
    const file = input.files[0];
    const fileSizeMB = file.size / (1024 * 1024); // Convert to MB

    if (!allowedTypes.includes(file.type)) {
      alert('Hanya file JPG, JPEG yang diperbolehkan.');
      input.value = ''; // Clear the input
      return;
    }

    if (fileSizeMB > maxSizeMB) {
      alert('Ukuran file melebihi batas maksimum.');
      input.value = ''; // Clear the input
      return;
    }

    // File is valid, you can proceed with further actions
    console.log('File valid:', file.name);
  }
}
function validateFile1(input) {
  const allowedTypes = ['application/pdf'];
  const maxSizeMB = 1; // Maximum file size allowed in MB

  if (input.files.length > 0) {
    const file = input.files[0];
    const fileSizeMB = file.size / (1024 * 1024); // Convert to MB

    if (!allowedTypes.includes(file.type)) {
      alert('Hanya file PDF yang diperbolehkan.');
      input.value = ''; // Clear the input
      return;
    }

    if (fileSizeMB > maxSizeMB) {
      alert('Ukuran file melebihi batas maksimum.');
      input.value = ''; // Clear the input
      return;
    }

    // File is valid, you can proceed with further actions
    console.log('File valid:', file.name);
  }
}
</script>
