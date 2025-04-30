<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
	$modul = $_GET['module'];
	
	//create data
	if($act=="create"){
		$jurusan 	= $_POST['jurusan'];
		
		$jurusan 	= $config->input_jurusan($jurusan);
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'data-jurusan'</script>";
	}elseif($act=="create1"){
		$jurusan 	= $_POST['jurusan'];
		$id_sekolah = $_POST['id_sekolah'];
		
		$jurusan 	= $config->input_jurusan($id_sekolah,$jurusan);
		
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'datajurusan'</script>";
	}
	elseif ($act=="update") {
		$id_jurusan	= $_POST['id_jurusan'];
		$jurusan 	= $_POST['jurusan'];

		$jurusan 	= $config->update_jurusan($id_jurusan,$jurusan);
		echo "<script>alert('Data Berhasil Diupdate'); window.location = 'data-jurusan'</script>";
	}
	elseif ($act=="delete") {
		$id_jurusan 		= $_GET['id_jurusan'];
		$jurusan 	= $config->delete_jurusan($id_jurusan);
		echo "<script>alert('Data Berhasil Dihapus'); window.location = 'data-jurusan'</script>";
	}

}

?>
