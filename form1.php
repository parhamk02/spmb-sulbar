<?php
require_once("admin/app/config.php");
$config = new config();
date_default_timezone_set("Asia/Makassar");

$id_siswa       = $_GET['id_siswa'];
$jenjang        = $_GET['jenjang'];
$id_jalurppdb   = $_GET['id_jalurppdb'];

if ($_GET['id_jalurppdb']=="null") {
    echo "<script>alert('Pilih Jalur Pendaftaran !!'); window.location = 'daftar'</script>";
}else{
$jalurppdb    = $config->detail_jalurppdb($id_jalurppdb);
$e = mysqli_fetch_assoc($jalurppdb);
$siswa = $config->detail_siswa($id_siswa);
$ds = mysqli_fetch_assoc($siswa);

if ($jenjang=='SD') {
    $id_kel = $ds['id_kel'];
    if ($e['jalurppdb']=='Domisili') {
        $sekolah = $config->get_sekolah12($id_kel);
        $sekolah2 = $config->get_sekolah($id_kel);
        $sekolah3 = $config->get_sekolah($id_kel);        
    }else{
        $sekolah = $config->get_sekolahsd();
        $sekolah2 = $config->get_sekolahsd();
        $sekolah3 = $config->get_sekolahsd();
    }
}elseif ($jenjang=='SMP') {
    $id_kec = $ds['id_kec'];
    if ($e['jalurppdb']=='Domisili') {
        $sekolah = $config->get_sekolah1($id_kec);
        $sekolah2 = $config->get_sekolah1($id_kec);
        $sekolah3 = $config->get_sekolah1($id_kec);
    }else{
        $sekolah = $config->get_sekolah1smp($id_kec);
        $sekolah2 = $config->get_sekolah1smp($id_kec);
        $sekolah3 = $config->get_sekolah1smp($id_kec);
    }
    
}elseif ($jenjang=='SMA') {
    if ($e['jalurppdb']=='Domisili') {
        $id_kel = $ds['id_kel'];
        $kelurahan = $config->detail_kelurahan1($id_kel);
        $data_kel = mysqli_fetch_assoc($kelurahan);
            if (isset($data_kel['zona_sekolah'])) {
                $zona_sekolah = $data_kel['zona_sekolah'];
            }else{
                $id_kec = $ds['id_kec'];
                $kecamatan = $config->detail_kecamatan($id_kec);
                $data_kec = mysqli_fetch_assoc($kecamatan);
                $zona_sekolah = $data_kec['zona_sekolah'];
            }
            $sekolah = $config->get_sekolah123($zona_sekolah);
            $sekolah2 = $config->get_sekolah123($zona_sekolah);
            $sekolah3 = $config->get_sekolah123($zona_sekolah);
    }else{
        $sekolah = $config->get_sekolahsma();
        $sekolah2 = $config->get_sekolahsma();
        $sekolah3 = $config->get_sekolahsma();
    }
}elseif ($jenjang=='SMK') {
        $sekolah = $config->get_sekolahsmk();
        $sekolah2 = $config->get_sekolahsmk();
        $sekolah3 = $config->get_sekolahsmk();
}

$no=1;

//$res = $config->tampil_datappdb1();
//$row      = mysqli_fetch_assoc($res);
//$no_pendaftaran = $row['no_pendaftaran'];
 
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
//$urutan = (int) substr($no_pendaftaran, 5, 5);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
//$urutan++;
 
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "S0025";
$no_daftar = $huruf . $ds['nisn'];
?>
                        
                        <div id="status"></div>
                            <input type="hidden" name="no_pendaftaran" id="" value="<?php echo $no_daftar ?>" class="contact-input" readonly required="" />
                            <input type="hidden" name="jenjang" id="" value="<?php echo $jenjang ?>" class="contact-input" readonly required="" />
                            <input type="hidden" name="id_siswa" id="" value="<?php echo $ds['id_siswa'] ?>" class="contact-input" readonly required="" />
                            <input type="hidden" name="id_jalurppdb" id="" value="<?php echo $id_jalurppdb ?>" class="contact-input" readonly required="" />
                        <div class="form-input">
                            <h6>Asal Sekolah</h6>
                            <input type="text" name="asal_sekolah" id="" placeholder="Asal Sekolah" class="contact-input" required/>
                        </div>
                        <div class="form-input">
                            <h6>Tahun Lulus</h6>
                            <input type="number" name="tahun_lulus" min="2020" max="2025" id="" placeholder="Tahun Lulus" class="contact-input" required/>
                        </div>
                        <div class="form-input">
                            <select class="form-control" name="id_sekolah1" id="id_sekolah1" required>
                            <option value="">Pilihan Sekolah Ke-1</option>
                        <?php
                            while($data = mysqli_fetch_assoc($sekolah)){
                        ?>
                            <option value="<?php echo $data['id_sekolah'] ?>"><?php echo $data['nama_sekolah']." - Daya Tampung (".$data['kapasitas'].")" ?></option>
                        <?php  
                        }
                        ?>
                            </select><br>
                        </div>
                        <?php  
                        if ($jenjang=='SMK') {
                        ?>
                        <div class="row" id="jurusan1">
                            <div class="col-md-4">

                                <div class="form-input">
                                    <select class="form-control" name="id_jurusan1[]" id="id_jurusan1" required>
                                
                                    </select><br>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input">
                                    <select class="form-control" name="id_jurusan1[]" id="id_jurusan2" required>
                                
                                    </select><br>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input">
                                    <select class="form-control" name="id_jurusan1[]" id="id_jurusan3" required>
                                
                                    </select><br>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php
                        }
                        ?>
                        <div class="form-input">
                        <?php 
                        if ($e['jalurppdb']!='Domisili') {
                        ?>
                            <select class="form-control" name="id_sekolah2" id="id_sekolah2" >
                            <option value="0">Pilihan Sekolah Ke-2</option>
                        <?php
                        }else{
                        ?>
                            <select class="form-control" name="id_sekolah2" id="id_sekolah2" required>
                            <option value="">Pilihan Sekolah Ke-2</option>
                        <?php
                        }
                            while($data = mysqli_fetch_assoc($sekolah2)){
                        }
                        ?>
                            <option value="<?php echo $data['id_sekolah'] ?>"><?php echo $data['nama_sekolah']." - Daya Tampung (".$data['kapasitas'].")" ?></option>
                        <?php  
                        }
                        ?>
                            </select><br>
                        </div>
                        <?php  
                        if ($jenjang=='SMK') {
                        ?>
                        <div class="row" id="jurusan2">
                            <div class="col-md-4">

                                <div class="form-input">
                                    <select class="form-control" name="id_jurusan2[]" id="id_jurusan4" required>
                                
                                    </select><br>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input">
                                    <select class="form-control" name="id_jurusan2[]" id="id_jurusan5" required>
                                
                                    </select><br>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input">
                                    <select class="form-control" name="id_jurusan2[]" id="id_jurusan6" required>
                                
                                    </select><br>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php
                        }
                        ?>
                        <div class="form-input">
                            <?php 
                        if ($e['jalurppdb']!='Domisili') {
                        ?>
                            <select class="form-control" name="id_sekolah3" id="id_sekolah3" >
                            <option value="0">Pilihan Sekolah Ke-3</option>
                        <?php
                        }else{
                        ?>
                            <select class="form-control" name="id_sekolah3" id="id_sekolah3" required>
                            <option value="">Pilihan Sekolah Ke-3</option>
                        <?php
                        }
                            while($data = mysqli_fetch_assoc($sekolah3)){
                        ?>
                            <option value="<?php echo $data['id_sekolah'] ?>"><?php echo $data['nama_sekolah']." - Daya Tampung (".$data['kapasitas'].")" ?></option>
                        <?php  
                        }
                        ?>
                            </select><br>
                        </div>
                        <?php  
                        if ($jenjang=='SMK') {
                        ?>
                        <div class="row" id="jurusan3">
                            <div class="col-md-4">

                                <div class="form-input">
                                    <select class="form-control" name="id_jurusan3[]" id="id_jurusan7" required>
                                    <option value="">Pilihan Jurusan Ke-1</option>
                                
                                    </select><br>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input">
                                    <select class="form-control" name="id_jurusan3[]" id="id_jurusan8" required>
                                    <option value="">Pilihan Jurusan Ke-2</option>
                                
                                    </select><br>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input">
                                    <select class="form-control" name="id_jurusan3[]" id="id_jurusan9" required>
                                    <option value="">Pilihan Jurusan Ke-3</option>
                                
                                    </select><br>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php
                        }
                        ?>
                        <div class="form-input">
                            <table class="table" style="width: 100%;">
                                <th>NILAI RAPOR - SEMESTER I</th>
                                <tr>
                                    <td>PKN</td>
                                    <td><input type="number" step="0.01" name="nilai_rapor1[]" id="" placeholder="Nilai Rapor PKN (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>BHS. INDONESIA</td>
                                    <td><input type="number" step="0.01" name="nilai_rapor1[]" id="" placeholder="Nilai Rapor BHS. Indoensia (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>BHS. INGGRIS</td>
                                    <td><input type="number" step="0.01" name="nilai_rapor1[]" id="" placeholder="Nilai Rapor BHS. Inggris (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>MATEMATIKA</td>
                                    <td><input type="number" step="0.01" name="nilai_rapor1[]" id="" placeholder="Nilai Rapor Matematika (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <th>NILAI RAPOR - SEMESTER II</th>
                                <tr>
                                    <td>PKN</td>
                                    <td><input type="number" step="0.01" name="nilai_rapor2[]" id="" placeholder="Nilai Rapor PKN (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>BHS. INDONESIA</td>
                                    <td><input type="number" name="nilai_rapor2[]" step="0.01" id="" placeholder="Nilai Rapor BHS. Indoensia (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>BHS. INGGRIS</td>
                                    <td><input type="number" name="nilai_rapor2[]" step="0.01" id="" placeholder="Nilai Rapor BHS. Inggris (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>MATEMATIKA</td>
                                    <td><input type="number" name="nilai_rapor2[]" step="0.01" id="" placeholder="Nilai Rapor Matematika (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <th>NILAI RAPOR - SEMESTER III</th>
                                <tr>
                                    <td>PKN</td>
                                    <td><input type="number" name="nilai_rapor3[]" step="0.01" id="" placeholder="Nilai Rapor PKN (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>BHS. INDONESIA</td>
                                    <td><input type="number" name="nilai_rapor3[]" step="0.01" id="" placeholder="Nilai Rapor BHS. Indoensia (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>BHS. INGGRIS</td>
                                    <td><input type="number" name="nilai_rapor3[]" step="0.01" id="" placeholder="Nilai Rapor BHS. Inggris (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>MATEMATIKA</td>
                                    <td><input type="number" name="nilai_rapor3[]" step="0.01" id="" placeholder="Nilai Rapor Matematika (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <th>NILAI RAPOR - SEMESTER IV</th>
                                <tr>
                                    <td>PKN</td>
                                    <td><input type="number" name="nilai_rapor4[]" step="0.01" id="" placeholder="Nilai Rapor PKN (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>BHS. INDONESIA</td>
                                    <td><input type="number" name="nilai_rapor4[]" step="0.01" id="" placeholder="Nilai Rapor BHS. Indoensia (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>BHS. INGGRIS</td>
                                    <td><input type="number" name="nilai_rapor4[]" step="0.01" id="" placeholder="Nilai Rapor BHS. Inggris (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>MATEMATIKA</td>
                                    <td><input type="number" name="nilai_rapor4[]" step="0.01" id="" placeholder="Nilai Rapor Matematika (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <th>NILAI RAPOR - SEMESTER V</th>
                                <tr>
                                    <td>PKN</td>
                                    <td><input type="number" name="nilai_rapor5[]" step="0.01" id="" placeholder="Nilai Rapor PKN (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>BHS. INDONESIA</td>
                                    <td><input type="number" name="nilai_rapor5[]" step="0.01" id="" placeholder="Nilai Rapor BHS. Indoensia (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>BHS. INGGRIS</td>
                                    <td><input type="number" name="nilai_rapor5[]" step="0.01" id="" placeholder="Nilai Rapor BHS. Inggris (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>MATEMATIKA</td>
                                    <td><input type="number" name="nilai_rapor5[]" step="0.01" id="" placeholder="Nilai Rapor Matematika (Contoh Penulisan 70.50)" class="contact-input" required="" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="submit-w3l-button text-lg-right">
                            <button type="submit" name="daftar1" value="daftar1" class="btn btn-style btn-primary" onclick="return confirm('Pastikan data yang diisi sudah sesuai, Anda mendaftar melalui Jalur <?php echo $e['jalurppdb'] ?> ?')">Lanjut Upload Berkas</button>
                        </div>



<script type="text/javascript">
    $(document).ready(function() {
    $('#id_sekolah1').change(function() {
        var selectedId = $(this).val(); // Dapatkan ID yang dipilih dari dropdown1

        if (selectedId) {
        $.ajax({
            url: 'get_jurusan.php', // Ganti dengan URL endpoint API Anda
            method: 'GET',
            data: { id_sekolah1: selectedId },
            dataType: 'json',
            success: function(data) {
                var id_jurusan1 = $('#id_jurusan1');
                id_jurusan1.empty(); // Kosongkan dropdown sebelum mengisi data baru
                id_jurusan1.append('<option value="">Pilih Jurusan 1...</option>'); // Tambahkan opsi default
                
                // Iterasi melalui data yang diterima dan tambahkan ke dropdown
                $.each(data, function(key, value) {
                    id_jurusan1.append('<option value="' + value.id_jurusan + '">' + value.jurusan + '</option>');
                });

                var id_jurusan2 = $('#id_jurusan2');
                id_jurusan2.empty(); // Kosongkan dropdown sebelum mengisi data baru
                id_jurusan2.append('<option value="">Pilih Jurusan 2...</option>'); // Tambahkan opsi default
                
                // Iterasi melalui data yang diterima dan tambahkan ke dropdown
                $.each(data, function(key, value) {
                    id_jurusan2.append('<option value="' + value.id_jurusan + '">' + value.jurusan + '</option>');
                });

                var id_jurusan3 = $('#id_jurusan3');
                id_jurusan3.empty(); // Kosongkan dropdown sebelum mengisi data baru
                id_jurusan3.append('<option value="">Pilih Jurusan 3...</option>'); // Tambahkan opsi default
                
                // Iterasi melalui data yang diterima dan tambahkan ke dropdown
                $.each(data, function(key, value) {
                    id_jurusan3.append('<option value="' + value.id_jurusan + '">' + value.jurusan + '</option>');
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error: ' + textStatus + ' - ' + errorThrown);
            }
        });
    } else {
            $('#id_jurusan1').empty();
            $('#id_jurusan2').empty();
            $('#id_jurusan3').empty();
        }
    });

    $('#id_sekolah2').change(function() {
        var selectedId2 = $(this).val(); // Dapatkan ID yang dipilih dari dropdown1

        if (selectedId2) {
        $.ajax({
            url: 'get_jurusan2.php', // Ganti dengan URL endpoint API Anda
            method: 'GET',
            data: { id_sekolah2: selectedId2 },
            dataType: 'json',
            success: function(data) {
                var id_jurusan4 = $('#id_jurusan4');
                id_jurusan4.empty(); // Kosongkan dropdown sebelum mengisi data baru
                id_jurusan4.append('<option value="">Pilih Jurusan 1...</option>'); // Tambahkan opsi default
                
                // Iterasi melalui data yang diterima dan tambahkan ke dropdown
                $.each(data, function(key, value) {
                    id_jurusan4.append('<option value="' + value.id_jurusan + '">' + value.jurusan + '</option>');
                });

                var id_jurusan5 = $('#id_jurusan5');
                id_jurusan5.empty(); // Kosongkan dropdown sebelum mengisi data baru
                id_jurusan5.append('<option value="">Pilih Jurusan 2...</option>'); // Tambahkan opsi default
                
                // Iterasi melalui data yang diterima dan tambahkan ke dropdown
                $.each(data, function(key, value) {
                    id_jurusan5.append('<option value="' + value.id_jurusan + '">' + value.jurusan + '</option>');
                });

                var id_jurusan6 = $('#id_jurusan6');
                id_jurusan6.empty(); // Kosongkan dropdown sebelum mengisi data baru
                id_jurusan6.append('<option value="">Pilih Jurusan 3...</option>'); // Tambahkan opsi default
                
                // Iterasi melalui data yang diterima dan tambahkan ke dropdown
                $.each(data, function(key, value) {
                    id_jurusan6.append('<option value="' + value.id_jurusan + '">' + value.jurusan + '</option>');
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error: ' + textStatus + ' - ' + errorThrown);
            }
        });
    } else {
            $('#id_jurusan4').empty();
            $('#id_jurusan5').empty();
            $('#id_jurusan6').empty();
        }
    });


    $('#id_sekolah3').change(function() {
        var selectedId3 = $(this).val(); // Dapatkan ID yang dipilih dari dropdown1

        if (selectedId3) {
        $.ajax({
            url: 'get_jurusan3.php', // Ganti dengan URL endpoint API Anda
            method: 'GET',
            data: { id_sekolah3: selectedId3 },
            dataType: 'json',
            success: function(data) {
                var id_jurusan7 = $('#id_jurusan7');
                id_jurusan7.empty(); // Kosongkan dropdown sebelum mengisi data baru
                id_jurusan7.append('<option value="">Pilih Jurusan 1...</option>'); // Tambahkan opsi default
                
                // Iterasi melalui data yang diterima dan tambahkan ke dropdown
                $.each(data, function(key, value) {
                    id_jurusan7.append('<option value="' + value.id_jurusan + '">' + value.jurusan + '</option>');
                });

                var id_jurusan8 = $('#id_jurusan8');
                id_jurusan8.empty(); // Kosongkan dropdown sebelum mengisi data baru
                id_jurusan8.append('<option value="">Pilih Jurusan 2...</option>'); // Tambahkan opsi default
                
                // Iterasi melalui data yang diterima dan tambahkan ke dropdown
                $.each(data, function(key, value) {
                    id_jurusan8.append('<option value="' + value.id_jurusan + '">' + value.jurusan + '</option>');
                });

                var id_jurusan9 = $('#id_jurusan9');
                id_jurusan9.empty(); // Kosongkan dropdown sebelum mengisi data baru
                id_jurusan9.append('<option value="">Pilih Jurusan 3...</option>'); // Tambahkan opsi default
                
                // Iterasi melalui data yang diterima dan tambahkan ke dropdown
                $.each(data, function(key, value) {
                    id_jurusan9.append('<option value="' + value.id_jurusan + '">' + value.jurusan + '</option>');
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error: ' + textStatus + ' - ' + errorThrown);
            }
        });
    } else {
            $('#id_jurusan7').empty();
            $('#id_jurusan8').empty();
            $('#id_jurusan9').empty();
        }
    });

    // Panggil fungsi untuk memuat data saat halaman selesai dimuat
    //loadDropdownData();
});
</script>
<?php 
if ($e['jalurppdb']!='Domisili') {
?>
<script>
const id_sekolah1 = document.getElementById('id_sekolah1');
const id_sekolah2 = document.getElementById('id_sekolah2');
const id_sekolah3 = document.getElementById('id_sekolah3');
const id_jurusan1 = document.getElementById('id_jurusan1');
const id_jurusan2 = document.getElementById('id_jurusan2');
const id_jurusan3 = document.getElementById('id_jurusan3');
const id_jurusan4 = document.getElementById('id_jurusan4');
const id_jurusan5 = document.getElementById('id_jurusan5');
const id_jurusan6 = document.getElementById('id_jurusan6');
const id_jurusan7 = document.getElementById('id_jurusan7')
const id_jurusan8 = document.getElementById('id_jurusan8');
const id_jurusan9 = document.getElementById('id_jurusan9');

function updateid_sekolah(selected, other1, other2) {
    const selectedValue = selected.value;
    const other1Value = other1.value;
    const other2Value = other2.value;

    for (let option of other1.options) {
        option.disabled = (option.value === selectedValue || option.value === other2Value) && option.value !== '';
    }

    for (let option of other2.options) {
        option.disabled = (option.value === selectedValue || option.value === other1Value) && option.value !== '';
    }
}

function updateid_jurusan(selected, other1, other2) {
    const selectedValue = selected.value;
    const other1Value = other1.value;
    const other2Value = other2.value;

    for (let option of other1.options) {
        option.disabled = (option.value === selectedValue || option.value === other2Value) && option.value !== '';
    }

    for (let option of other2.options) {
        option.disabled = (option.value === selectedValue || option.value === other1Value) && option.value !== '';
    }
}


id_sekolah1.addEventListener('change', () => updateid_sekolah(id_sekolah1, id_sekolah2, id_sekolah3));
id_sekolah2.addEventListener('change', () => updateid_sekolah(id_sekolah2, id_sekolah1, id_sekolah3));
id_sekolah3.addEventListener('change', () => updateid_sekolah(id_sekolah3, id_sekolah1, id_sekolah2));
id_jurusan1.addEventListener('change', () => updateid_jurusan(id_jurusan1, id_jurusan2, id_jurusan3));
id_jurusan2.addEventListener('change', () => updateid_jurusan(id_jurusan2, id_jurusan1, id_jurusan3));
id_jurusan3.addEventListener('change', () => updateid_jurusan(id_jurusan3, id_jurusan1, id_jurusan2));
id_jurusan4.addEventListener('change', () => updateid_jurusan(id_jurusan4, id_jurusan5, id_jurusan6));
id_jurusan5.addEventListener('change', () => updateid_jurusan(id_jurusan5, id_jurusan4, id_jurusan6));
id_jurusan6.addEventListener('change', () => updateid_jurusan(id_jurusan6, id_jurusan4, id_jurusan5));
id_jurusan7.addEventListener('change', () => updateid_jurusan(id_jurusan7, id_jurusan8, id_jurusan9));
id_jurusan8.addEventListener('change', () => updateid_jurusan(id_jurusan8, id_jurusan7, id_jurusan9));
id_jurusan9.addEventListener('change', () => updateid_jurusan(id_jurusan9, id_jurusan7, id_jurusan8));
</script>
<?php
}
}
?>