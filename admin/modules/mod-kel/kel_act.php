<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
	$modul = $_GET['module'];
	
	//create data
	if($act=="create"){
		$id_kec 	= $_POST['id_kec'];
		$id_zonasi 	= $_POST['id_zonasi'];
		$nama_kel 	= addslashes($_POST['nama_kel']);
		$kode_kel 	= $_POST['kode_kel'];
		

		$kelurahan 	= $config->input_kelurahan($id_kec,$id_zonasi,$nama_kel,$kode_kel);
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'data-kel'</script>";
	}
	elseif ($act=="update") {
		$id_kel	= $_POST['id_kel'];
		$id_kec 	= $_POST['id_kec'];
		$id_zonasi 	= $_POST['id_zonasi'];
		$nama_kel 	= addslashes($_POST['nama_kel']);
		$zona_sekolah = implode(",",$_POST['zona_sekolah']);

		$kelurahan 	= $config->update_kelurahan($id_kel,$id_kec,$id_zonasi,$nama_kel,$zona_sekolah);
		echo "<script>alert('Data Berhasil Diupdate'); window.location = 'data-kel'</script>";
	}
	elseif ($act=="delete") {
		$id_kel 		= $_GET['id_kel'];
		$kelurahan 	= $config->delete_kelurahan($id_kel);
		echo "<script>alert('Data Berhasil Dihapus'); window.location = 'data-kel'</script>";
	}

}

?>
