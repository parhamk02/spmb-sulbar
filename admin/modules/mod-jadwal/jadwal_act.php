<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
	$modul = $_GET['module'];
	
	//create data
	if($act=="create"){
		$nama_jadwal 	= $_POST['nama_jadwal'];
		$jenis_jadwal 	= $_POST['jenis_jadwal'];
		$awal_jadwal 		= $_POST['awal_jadwal'];
		$akhir_jadwal 		= $_POST['akhir_jadwal'];
		$status_jadwal 		= $_POST['status_jadwal'];
		
		$jadwal 	= $config->input_jadwal($nama_jadwal,$jenis_jadwal,$awal_jadwal,$akhir_jadwal,$status_jadwal);
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'data-jadwal'</script>";
	}
	elseif ($act=="update") {
		$id_jadwal	= $_POST['id_jadwal'];
		$nama_jadwal 	= $_POST['nama_jadwal'];
		$jenis_jadwal 	= $_POST['jenis_jadwal'];
		$awal_jadwal 		= $_POST['awal_jadwal'];
		$akhir_jadwal 		= $_POST['akhir_jadwal'];
		$status_jadwal 		= $_POST['status_jadwal'];

		$jadwal 	= $config->update_jadwal($id_jadwal,$nama_jadwal,$jenis_jadwal,$awal_jadwal,$akhir_jadwal,$status_jadwal);
		echo "<script>alert('Data Berhasil Diupdate'); window.location = 'data-jadwal'</script>";
	}
	elseif ($act=="delete") {
		$id_jadwal 		= $_GET['id_jadwal'];
		$jadwal 	= $config->delete_jadwal($id_jadwal);
		echo "<script>alert('Data Berhasil Dihapus'); window.location = 'data-jadwal'</script>";
	}

}

?>
