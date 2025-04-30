<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
	$modul = $_GET['module'];
	
	//create data
	if($act=="create"){
		$kode_zonasi 	= $_POST['kode_zonasi'];
		
		$zonasiurahan 	= $config->input_zonasi($kode_zonasi);
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'data-domisili'</script>";
	}
	elseif ($act=="update") {
		$id_zonasi	= $_POST['id_zonasi'];
		$kode_zonasi 	= $_POST['kode_zonasi'];

		$zonasiurahan 	= $config->update_zonasi($id_zonasi,$kode_zonasi);
		echo "<script>alert('Data Berhasil Diupdate'); window.location = 'data-domisili'</script>";
	}
	elseif ($act=="delete") {
		$id_zonasi 		= $_GET['id_zonasi'];
		$zonasiurahan 	= $config->delete_zonasi($id_zonasi);
		echo "<script>alert('Data Berhasil Dihapus'); window.location = 'data-domisili'</script>";
	}

}

?>
