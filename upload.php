<?php
require_once("admin/app/config.php");
$config = new config();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $folder = isset($_POST['folder']) ? basename($_POST['folder']) : 'default';
        $id = isset($_POST['id']) ? basename($_POST['id']) : 'unknown';
        $imageFileType = strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));
        $uploadDir = 'file/' . $folder . '/';
        $file=$folder."-".$id.".".$imageFileType;
        
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $uploadFile = $uploadDir . $file;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
            $berkas    = $config->update_berkas($id,$folder,$file);
            echo "<script>alert('File " .$file." berhasil diupload'); window.location = 'daftar'</script>";
            
                    //echo "File " . basename($_FILES['file']['name']) . " berhasil diupload ke " . $folder . ".";
        } else {
            echo "<script>alert('Error uploading file ".$file."'); window.location = 'daftar'</script>";
        }
    } else {
            echo "<script>alert('Tidak ada file yang diupload atau terjadi kesalahan.'); window.location = 'daftar'</script>";
    }
} else {
    echo "<script>alert('Permintaan tidak valid.'); window.location = 'daftar'</script>";
}
?>