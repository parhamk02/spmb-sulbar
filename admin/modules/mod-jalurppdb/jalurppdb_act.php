<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
	$modul = $_GET['module'];
	
	//create data
	if($act=="create"){
		$jalurppdb 	= $_POST['jalurppdb'];
		$awal 		= $_POST['awal'];
		$akhir 		= $_POST['akhir'];
		
		$jalurppdb 	= $config->input_jalurppdb($jalurppdb,$awal,$akhir);
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'data-jalurspmb'</script>";
	}
	elseif ($act=="update") {
		$id_jalurppdb	= $_POST['id_jalurppdb'];
		$jalurppdb 	= $_POST['jalurppdb'];
		$awal 		= $_POST['awal'];
		$akhir 		= $_POST['akhir'];

		$jalurppdb 	= $config->update_jalurppdb($id_jalurppdb,$jalurppdb,$awal,$akhir);
		echo "<script>alert('Data Berhasil Diupdate'); window.location = 'data-jalurspmb'</script>";
	}
	elseif ($act=="delete") {
		$id_jalurppdb 		= $_GET['id_jalurppdb'];
		$jalurppdb 	= $config->delete_jalurppdb($id_jalurppdb);
		echo "<script>alert('Data Berhasil Dihapus'); window.location = 'data-jalurspmb'</script>";
	}

}

?>
