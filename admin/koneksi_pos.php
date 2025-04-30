<?php
// Koneksi ke database
$servername = "localhost";
$username = "u1652400_solatabpmp";
$password = "solata042022";
$dbname = "u1652400_solata";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel
$query = "SELECT * FROM tb_pos";

// Tambahkan filter pencarian jika diperlukan
if (!empty($_POST['search']['value'])) {
    $search = $_POST['search']['value'];
    $query .= " WHERE id_pos LIKE '%$search%' OR uraian LIKE '%$search%' OR tanggal LIKE '%$search%' OR jam LIKE '%$search%' OR tanggal ket '%$search%'";
}

// Hitung jumlah data tanpa filter
$totalData = mysqli_num_rows($conn->query($query));

// Lakukan sorting jika diperlukan
if (!empty($_POST['order'])) {
    $orderBy = $_POST['order'][0]['column'];
    $orderDir = $_POST['order'][0]['dir'];
    $query .= " ORDER BY " . $_POST['columns'][$orderBy]['data'] . " $orderDir";
}

// Tambahkan limit dan offset
$limit = $_POST['length'];
$start = $_POST['start'];
$query .= " LIMIT $limit OFFSET $start";

// Ambil data dari database
$result = $conn->query($query);
$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Format data untuk DataTables
$output = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalData),
    "data" => $data
);

// Encode data ke format JSON dan kirimkan ke DataTables
echo json_encode($output);
?>
