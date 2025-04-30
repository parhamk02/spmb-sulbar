<?php
$file = 'kkdomisili/kkdomisili-A00340093287276.pdf';

// Memeriksa apakah file ada
if (file_exists($file)) {
    // Mencoba menghapus file
    if (unlink($file)) {
        echo "File berhasil dihapus.";
    } else {
        echo "Gagal menghapus file.";
    }
} else {
    echo "File tidak ditemukan.";
}
?>