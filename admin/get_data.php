<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "app/config2.php"; // Pastikan ini mengarah ke konfigurasi MySQLi
include "app/helper.php"; // Include file helper database Anda

$searchColumns = ['k.id_kel', 'b.nama_kec', 'k.nama_kel', 'nama_sekolah']; // Kolom yang bisa dicari
$orderColumnIndex = isset($_POST['order'][0]['column']) ? intval($_POST['order'][0]['column']) : 0;
$orderColumn = $searchColumns[$orderColumnIndex] ?? 'k.id_kel'; // Default order
$orderDirection = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'asc';
$start = isset($_POST['start']) ? intval($_POST['start']) : 0;
$length = isset($_POST['length']) ? intval($_POST['length']) : 10;

$result = getDataForDatatables($mysqli, "/* Query Anda */", $searchColumns, $orderColumn, $orderDirection, $start, $length);

header('Content-Type: application/json');
echo json_encode($result);

mysqli_close($mysqli); // Tutup koneksi MySQLi
?>