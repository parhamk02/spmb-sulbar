<?php

// database_helper.php

function getDataForDatatables($mysqli, $query, $searchColumns, $orderColumn, $orderDirection, $start, $length) {
    $totalRecordsResult = mysqli_query($mysqli, "SELECT COUNT(*) FROM kelurahan"); // Contoh query sederhana
    $totalRecordsRow = mysqli_fetch_row($totalRecordsResult);
    $totalRecords = $totalRecordsRow[0];
    mysqli_free_result($totalRecordsResult);

    $whereClause = "";
    if (!empty($_POST['search']['value'])) {
        $searchValue = mysqli_real_escape_string($mysqli, $_POST['search']['value']);
        $whereItems = [];
        foreach ($searchColumns as $column) {
            $whereItems[] = "$column LIKE '%$searchValue%'";
        }
        if (!empty($whereItems)) {
            $whereClause = "WHERE " . implode(" OR ", $whereItems);
        }
    }

    $orderByClause = "ORDER BY $orderColumn $orderDirection";
    $limitClause = "LIMIT " . intval($start) . ", " . intval($length);

    $filteredQuery = "SELECT k.id_kel, k.nama_kel, b.nama_kec, GROUP_CONCAT(s.nama_sekolah SEPARATOR ', ') AS nama_sekolah
                      FROM kelurahan k
                      INNER JOIN kecamatan b ON k.id_kec = b.id_kec
                      LEFT JOIN sekolah s ON FIND_IN_SET(s.id_sekolah, k.zona_sekolah) > 0
                      $whereClause
                      GROUP BY k.id_kel
                      $orderByClause
                      $limitClause";

    $result = mysqli_query($mysqli, $filteredQuery);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_free_result($result);

    $totalFiltered = $totalRecords;
    if (!empty($_POST['search']['value'])) {
        $searchValue = mysqli_real_escape_string($mysqli, $_POST['search']['value']);
        $totalFilteredResult = mysqli_query($mysqli, "SELECT COUNT(*)
                                                  FROM kelurahan k
                                                  INNER JOIN kecamatan b ON k.id_kec = b.id_kec
                                                  LEFT JOIN sekolah s ON FIND_IN_SET(s.id_sekolah, k.zona_sekolah) > 0
                                                  $whereClause");
        $totalFilteredRow = mysqli_fetch_row($totalFilteredResult);
        $totalFiltered = $totalFilteredRow[0];
        mysqli_free_result($totalFilteredResult);
    }

    return [
        "draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 0,
        "recordsTotal" => $totalRecords,
        "recordsFiltered" => $totalFiltered,
        "data" => $data,
    ];
}

?>