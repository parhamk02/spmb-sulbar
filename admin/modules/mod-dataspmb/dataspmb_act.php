<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
	$modul = $_GET['module'];
	
	//create data
	if($act=="create"){
		$id_kec 		= $_POST['id_kec'];
		$id_kel 		= $_POST['id_kel'];
		$npsn 			= $_POST['npsn'];
		$nama_sekolah 	= $_POST['nama_sekolah'];
		$id_zonasi 		= $_POST['id_zonasi'];
		$status 		= $_POST['status'];
		$kapasitas 		= $_POST['kapasitas'];
		$jenjang 		= $_POST['jenjang'];
		$ket 			= $_POST['ket'];
		$alamat 		= $_POST['alamat'];
		$password 		= md5($_POST['password']);
		if(isset($_FILES['foto']['name'])){
		$file=$_FILES['foto']['name'];
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$folder = "images/$file";
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		$foto=$file;
		}
		
		$sekolah 	= $config->input_sekolah($id_kec,$id_kel,$id_zonasi,$npsn,$nama_sekolah,$status,$alamat,$foto,$kapasitas,$jenjang,$password,$ket);
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'index.php?module=".$modul."&act=view'</script>";
	}
	elseif ($act=="update") {
		$id_sekolah	= $_POST['id_sekolah'];
		$id_kec 		= $_POST['id_kec'];
		$id_kel 		= $_POST['id_kel'];
		$npsn 			= $_POST['npsn'];
		$nama_sekolah 	= $_POST['nama_sekolah'];
		$id_zonasi 		= $_POST['id_zonasi'];
		$ket 			= $_POST['ket'];
		$kapasitas		= $_POST['kapasitas'];
		$status 		= $_POST['status'];
		$alamat 		= $_POST['alamat'];
		$jenjang 		= $_POST['jenjang'];
		$id_jurusan = implode(",",$_POST['id_jurusan']);

		if (empty($_POST['password'])) {
			$password = $_POST['pass_lama'];
		}else{
			$password 	= md5($_POST['password']);
		}
		if(empty($_FILES['foto']['name'])){
		$foto=$_POST['foto_lama'];
		}
		else{
		$file=$_FILES['foto']['name'];
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$folder = "images/$file";
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		$foto=$file;
		}
		$sekolah 	= $config->update_sekolah($id_sekolah,$id_kec,$id_kel,$id_zonasi,$npsn,$nama_sekolah,$status,$alamat,$foto,$password,$ket,$jenjang,$kapasitas,$id_jurusan);
		echo "<script>alert('Data Berhasil Diupdate'); window.location = 'index.php?module=".$modul."&act=view'</script>";
	}elseif ($act=="updatesekolah") {
		$id_sekolah	= $_POST['id_sekolah'];
		$id_kec 		= $_POST['id_kec'];
		$id_kel 		= $_POST['id_kel'];
		$npsn 			= $_POST['npsn'];
		$nama_sekolah 	= $_POST['nama_sekolah'];
		$status 		= $_POST['status'];
		$id_zonasi 		= $_POST['id_zonasi'];
		$alamat 		= $_POST['alamat'];
		if (empty($_POST['password'])) {
			$password = $_POST['pass_lama'];
		}else{
			$password 	= md5($_POST['password']);
		}
		if(empty($_FILES['foto']['name'])){
		$foto=$_POST['foto_lama'];
		}
		else{
		$file=$_FILES['foto']['name'];
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$folder = "images/$file";
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		$foto=$file;
		}
		$sekolah 	= $config->update_sekolah1($id_sekolah,$id_kec,$id_kel,$id_zonasi,$npsn,$nama_sekolah,$status,$alamat,$foto,$password);
		echo "<script>alert('Data Berhasil Diupdate'); window.location = 'dashboard.php'</script>";
	}
	elseif ($act=="delete") {
		$id_sekolah 		= $_GET['id_sekolah'];
		$sekolah 	= $config->delete_sekolah($id_sekolah);
		echo "<script>alert('Data Berhasil Dihapus'); window.location = 'index.php?module=".$modul."&act=view'</script>";
	}

}

?>
