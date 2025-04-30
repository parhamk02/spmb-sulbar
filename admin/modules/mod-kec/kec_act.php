<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
	$modul = $_GET['module'];
	
	//create data
	if($act=="create"){
		$nama_kec 	= $_POST['nama_kec'];
		
		$kecamatan 	= $config->input_kecamatan($nama_kec);
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'data-kec'</script>";
	}
	elseif ($act=="update") {
		$id_kec 	= $_POST['id_kec'];
		$nama_kec 	= $_POST['nama_kec'];
		$zona_sekolah = implode(",",$_POST['zona_sekolah']);

		$kecamatan 	= $config->update_kecamatan($id_kec,$nama_kec,$zona_sekolah);
		echo "<script>alert('Data Berhasil Diupdate'); window.location = 'data-kec'</script>";
	}
	elseif ($act=="delete") {
		$id_kec 		= $_GET['id_kec'];
		$kecamatan 	= $config->delete_kecamatan($id_kec);
		echo "<script>alert('Data Berhasil Dihapus'); window.location = 'data-kec'</script>";
	}

}

?>
