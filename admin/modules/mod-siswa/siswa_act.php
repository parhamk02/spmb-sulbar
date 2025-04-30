<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
	$modul = $_GET['module'];
	
	
	if ($act=="delete") {
		$id_siswa 		= $_GET['id_siswa'];
		$sekolah 	= $config->delete_siswa($id_siswa);
		echo "<script>alert('Data Berhasil Dihapus'); window.location = 'index.php?module=".$modul."&act=view'</script>";
	}

}

?>
