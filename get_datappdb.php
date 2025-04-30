							<table id="export" class="table table-bordered table-striped" style="width:100%">
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
                                require_once("admin/app/config.php");;
                                $config = new config();
                                date_default_timezone_set("Asia/Makassar");
                                $id_sekolah=$_GET['id_sekolah'];
                                $datappdb = $config->detail_datappdb1($id_sekolah);
                                $no=1;
                                while($data = mysqli_fetch_assoc($datappdb)){
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
                                ?>
                                </tbody>

                            </table>

<script>
  $(function () {
     
    $('#export').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
  });

</script>