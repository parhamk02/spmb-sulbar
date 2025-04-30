<?php
require_once("app/config.php");
$config = new config();

$limit = $_GET['length'];
$offset = $_GET['start'];
$searchValue = $_GET['search']['value'];

$datappdb = $config->tampil_dataspmb($limit, $offset, $searchValue);

$data = [];
while($data1 = mysqli_fetch_assoc($datappdb)){
    $data[] = $data1;
}

$totalQuery = $config->tampil_totalspmb();
$totalRow = $totalQuery->fetch_assoc();
$total = $totalRow['total'];

$response = [
    "draw" => intval($_GET['draw']),
    "recordsTotal" => $total,
    "recordsFiltered" => $total,
    "data" => $data
];

echo json_encode($response);
?>