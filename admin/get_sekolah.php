<?php
include('koneksi.php');
$id_kel = $_GET['id_kel'];
$sql = mysqli_query($koneksi,"SELECT * FROM sekolah WHERE `id_kel` = '$id_kel'");
$data = array();
while($row=mysqli_fetch_array($sql)){
$data[] = array("id_sekolah" => $row['id_sekolah'], "nama_sekolah" => $row['nama_sekolah']);
}
echo json_encode($data);?>