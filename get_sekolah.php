<?php
include"admin/app/config.php";
$config = new config();

$jenjang = $_GET['jenjang'];
$sekolah   = $config->tampil_sekolah23($jenjang);

$data = array();

if ($sekolah->num_rows > 0) {
    while ($row = $sekolah->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

?>
                    