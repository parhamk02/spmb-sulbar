<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
	$modul = $_GET['module'];
	
	//create data
	if($act=="create"){
		$nama_kab 	= $_POST['nama_kab'];
		$kode		= $_POST['kode'];
		if ($level=='Pilgub') {
			$kategori	= 'Pilgub';
		}else{
			$kategori	= 'Pilkada';
		}
		$datakab 	= $config->input_datakab($nama_kab,$kode,$kategori);
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'data-kab'</script>";
	}
	elseif ($act=="update") {
		$id_kab		= $_POST['id_kab'];
		$nama_kab 	= $_POST['nama_kab'];
		$kode		= $_POST['kode'];
		$datakab 	= $config->update_datakab($id_kab,$nama_kab,$kode);
		echo "<script>alert('Data Berhasil Diupdate'); window.location = 'data-kab'</script>";
	}
	elseif ($act=="delete") {
		$id_kab 	= $_GET['id_kab'];
		$datakab 	= $config->delete_datakab($id_kab);
		echo "<script>alert('Data Berhasil Dihapus'); window.location = 'data-kab'</script>";
	}

}

?>
