<?php
include"admin/app/config.php";
$config = new config();
$id_sekolah=$_GET['id_sekolah3'];
$jurusan   = $config->tampil_jurusan12($id_sekolah);

$data = array();

if ($jurusan->num_rows > 0) {
    while ($row = $jurusan->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

?>
                    