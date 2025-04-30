<div class="w3l-3-grids py-5" id="info">
        <!-- /grids -->
        <div class="container py-md-5">
            <div class="row">
                <div class="col-lg-5 stats_info-images pe-lg-5">
                    <div class="stats_info-images-right row">
                        <div class="col-12 mid-slider-content">
                            <img src="assets/images/dinas.png" class="img-fluid radius-image" style="height:280px" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 title-content text-left ps-lg-5 mt-lg-0 mt-5">
                    <h3 class="title-w3l mb-3">
                        Selamat Datang di Aplikasi Penerimaan Peserta Didik Baru Provinsi Sulawesi Barat </h3>
                    <p class="mb-3" style="font-size: 14px;">Untuk Periode 2025 / 2026 ini, Dinas Pendidikan Provinsi Sulawesi Barat menyediakan beberapa alternatif jalur seleksi. Silakan pelajari & pilih jalur yang sesuai untuk Anda.</p>
                    <ul class="icon-list-items mt-3">
                        <li class="icon-list-item">
                            <i aria-hidden="true" class="fas fa-check"></i>
                            <a href="#domisili"> Domisili </a>
                        </li>
                        <li class="icon-list-item mt-2">
                            <i aria-hidden="true" class="fas fa-check"></i>
                            <a href="#afirmasi">Afirmasi</a>
                        </li>
                        <li class="icon-list-item mt-2">
                            <i aria-hidden="true" class="fas fa-check"></i>
                            <a href="#prestasi">Prestasi</a>
                        </li>
                        <li class="icon-list-item mt-2">
                            <i aria-hidden="true" class="fas fa-check"></i>
                            <a href="#mutasi">Mutasi</a>
                        </li>
                    </ul>
                </div>
                <!--/grids -->
            </div>
            <!--/grids -->
        </div>
    </div>

    <section class="w3l-services-6 py-5" id="daftar">
        <div class="container py-lg-5 py-md-4 py-2">
                  <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">DATA SEKOLAH YANG MEMBUKA JALUR PENDAFTARAN ONLINE</h5>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                        <tr>
                                            <th width="3%">No</th>
                                            <th width="20%">Nama Sekolah</th>
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th>Daya Tampung</th>
                                            <th>NPSN</th>
                                            <th width="25%">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $siswa = $config->tampil_sekolah44();
                                    $no=1;
                                    while($data = mysqli_fetch_assoc($siswa)){
                                    ?>

                                        <tr>
                                            <td scope="row"><?php echo $no ?></td>
                                            <td><?php echo $data['nama_sekolah'] ?></td>
                                            <td><?php echo $data['nama_kel'] ?></td>
                                            <td><?php echo $data['nama_kec'] ?></td>
                                            <td><?php echo $data['kapasitas'] ?></td>
                                            <td><?php echo $data['npsn'] ?></td>
                                            <td><?php echo $data['alamat'] ?></td>
                                        </tr>

                                    <?php
                                    $no++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
        </div>
    </section>

    <!--//bottom-3-grids-->
    <!--//w3l-midslider-->
    <section class="w3l-services-6 py-5" id="daftar">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="title-content text-center">
                <h3 class="title-w3l mb-5 text-center">Jalur Sistem Penerimaan Murid Baru</h3>
            </div>
            <div class="grids-area-hny main-cont-wthree-fea row pt-3 mt-5">
                <div class="col-lg-3 col-md-6 grids-feature">
                    <div class="area-box" id="zonasi">
                        <div class="area-icon icon-red">
                            <span class="fas fa-map"></span>
                        </div>
                        <h4><a href="#domisili" class="title-head">DOMISILI</a></h4>
                        <p style="font-size: 1.2em">Jalur Domisili diperuntukkan bagi calon murid yang berdomisili di dalam wilayah penerimaan murid baru yang ditetapkan oleh Pemerintah Daerah<br>
                        </p>
                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="zonasi" class="btn btn-warning">DETAIL ZONASI <i class="fas fa-maps ms-lg-4 ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 grids-feature mt-md-0 mt-4">
                    <div class="area-box" id="afirmasi">
                        <div class="area-icon icon-green">
                            <span class="fas fa-edit"></span>
                        </div>
                        <h4><a href="#afirmasi" class="title-head">AFIRMASI</a></h4>
                        <p style="font-size: 1.2em">Jalur Afirmasi diperuntukkan bagi calon murid yang berasal dari keluarga ekonomi tidak mampu dan calon murid penyandang disablitas</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 grids-feature mt-lg-0 mt-4">
                    <div class="area-box" id="pindah">
                        <div class="area-icon icon-blue">
                            <span class="fas fa-map-marker-alt"></span>
                        </div>
                        <h4><a href="#prestasi" class="title-head">PRESTASI</a></h4>
                        <p style="font-size: 1.2em">Jalur Prestasi diperuntukkan bagi calon murid yang memiliki prestasi di bidang akademik dan/atau nonakademik</p>
                    </div>
                </div>    
                <div class="col-lg-3 col-md-6 grids-feature mt-lg-0 mt-4">
                    <div class="area-box" id="prestasi">
                        <div class="area-icon icon-blue">
                            <span class="fas fa-trophy"></span>
                        </div>
                        <h4><a href="#mutasi" class="title-head">MUTASI</a></h4>
                        <p style="font-size: 1.2em">
                        Jalur Mutasi diperuntukkan bagi calon murid yang berpindah domisili karena perpindahan tugas dari orang tua/wali dan bagi anak guru yang mendaftar di satuan pendidikan tempat orang tua mengajar </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <div class="w3l-3-grids py-5" id="juknis">
        <div class="container py-md-5 py-2">
            <div class="row mb-5 pb-lg-4">
                <div class="col-lg-4 pe-lg-4">
                    <div class="title-content text-left">
                        <h6 class="title-subw3hny mb-1">Juknis SPMB</h6>
                        <h6 class="title-w3l"></h6>
                    </div>
                </div>
                <div class="col-lg-8 mt-lg-0 mt-md-5 mt-4 ps-lg-4">
                    <p class=""></p>
                </div>
            </div>
                <div style="margin: 0 auto;">
                    <object data="file/juknis2025.pdf" width="100%" height="400"></object>
                </div>
            <!--/row-1-->
        </div>
    </div>
    <!--//bottom-3-grids-->

    <section class="w3l-midslider py-5" id="jadwal">
        <!-- /grids -->
        <div class="container py-md-5">
            <div class="row">
                <div class="title-content text-center">
                    <h3 class="title-w3l mb-5 text-center">Jadwal Sistem Penerimaan Murid Baru</h3>
                </div>
                <div class="main-cont-wthree-2 align-items-center pt-lg-4">
                    <div class="row">
                        <table id="example2" class="table table-bordered table-striped">
                                <div class="col-md-3">
                                    <a href="tambah-jadwal"  id="btn-tambah" class="btn btn-sm btn-primary pull-left"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a>
                                </div>
                                <br/>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jadwal SPMB</th>
                                        <th>Tanggal Buka</th>
                                        <th>Tanggal Tutup</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $datajadwal = $config->tampil_jadwal();                                
                                $no=1;
                                while($data = mysqli_fetch_assoc($datajadwal)){
                                ?>

                                    <tr>
                                        <td scope="row"><?php echo $no ?></td>
                                        <td><?php echo $data['nama_jadwal'] ?></td>
                                        <td><?php echo $data['awal_jadwal'] ?></td>
                                        <td><?php echo $data['akhir_jadwal'] ?></td>
                                    </tr>

                                <?php
                                $no++;
                                }
                                ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <!--/grids -->
        </div>
    </section>

    <div class="w3l-3-grids py-5" id="pengumuman">
        <div class="container py-md-5 py-2">
                <div style="margin: 0 auto;">
                    

            <div class="card">
              <div class="card-header">
                <h5 class="card-title">PENGUMUMAN</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <div class="form-group">
                     </div><br>
                     <div id="ppdb">
                            <table id="example1" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Umur</th>
                                        <th>Status</th>
                                        <th>Sekolah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ket = "Pengumuman";
                                $datajadwal = $config->tampil_jadwal12($ket);
                                $jadwal = mysqli_fetch_assoc($datajadwal);

                                $today = date('Y-m-d');
                                if (isset($jadwal)) {

                                $pengumuman = $config->pengumuman_datappdb();
                                $no=1;
                                while($data = mysqli_fetch_assoc($pengumuman)){
                                    $tanggal_lahir = new DateTime($data['tanggal_lahir']);
                                        $sekarang = new DateTime();
                                        if ($tanggal_lahir > $sekarang) { 
                                        $thn = "0";
                                        $bln = "0";
                                        $tgl = "0";
                                        }
                                        $thn = $sekarang->diff($tanggal_lahir)->y;
                                        $bln = $sekarang->diff($tanggal_lahir)->m;
                                        $tgl = $sekarang->diff($tanggal_lahir)->d;
                                ?>

                                    <tr>
                                        <td scope="row"><?php echo $no ?></td>
                                        <td><?php echo $data['nama_siswa'] ?></td>
                                        <td><?php echo $data['nik'] ?></td>
                                        <td><?php echo $thn." tahun ".$bln." bulan ".$tgl." hari" ?></td>
                                        <td><?php echo $data['status'] ?></td>
                                        <td><?php echo $data['sekolah'] ?></td>
                                    </tr>

                                <?php
                                $no++;
                                    }
                                }
                                ?>
                                
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
        </div>

    
    <!-- Trigger/Open The Modal -->
<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ZONASI SMA</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        <table id="example" class="table table-bordered table-striped" style="width:auto">
                            <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Nama Sekolah</th>
                                        <th>Kelurahan</th>
                                        <th>Kecamatan</th>
                                        <th>Daya Tampung</th>
                                        <th>NPSN</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $siswa = $config->tampil_zonasisma();
                                $no=1;
                                while($data = mysqli_fetch_assoc($siswa)){
                                ?>

                                    <tr>
                                        <td scope="row"><?php echo $no ?></td>
                                        <td><?php echo $data['nama_sekolah'] ?></td>
                                        <td><?php echo $data['nama_kel'] ?></td>
                                        <td><?php echo $data['nama_kec'] ?></td>
                                        <td><?php echo $data['kapasitas'] ?></td>
                                        <td><?php echo $data['npsn'] ?></td>
                                        <td><?php echo $data['alamat'] ?></td>
                                    </tr>

                                <?php
                                $no++;
                                }
                                ?>
                                </tbody>
                            </table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ZONASI SMP</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        <table id="example3" class="table table-bordered table-striped" style="width:auto">
                            <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Nama Sekolah</th>
                                        <th>Kode Zonasi</th>
                                        <th>Kecamatan</th>
                                        <th>Daya Tampung</th>
                                        <th>NPSN</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $siswa = $config->tampil_zonasismp();
                                $no=1;
                                while($data = mysqli_fetch_assoc($siswa)){
                                ?>

                                    <tr>
                                        <td scope="row"><?php echo $no ?></td>
                                        <td><?php echo $data['nama_sekolah'] ?></td>
                                        <td><?php echo $data['kode_zonasi'] ?></td>
                                        <td><?php echo $data['kecamatan'] ?></td>
                                        <td><?php echo $data['kapasitas'] ?></td>
                                        <td><?php echo $data['npsn'] ?></td>
                                        <td><?php echo $data['alamat'] ?></td>
                                    </tr>

                                <?php
                                $no++;
                                }
                                ?>
                                </tbody>
                            </table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="jalur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ZONASI SMP</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



