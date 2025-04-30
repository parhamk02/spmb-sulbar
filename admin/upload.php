<?php
require_once("app/config.php");
$config = new config();
$id_sekolah	= $_POST['id_sekolah'];
		$id_kec 		= $_POST['id_kec'];
		$id_kel 		= $_POST['id_kel'];
		$npsn 			= $_POST['npsn'];
		$nama_sekolah 	= $_POST['nama_sekolah'];
		$status 		= $_POST['status'];
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
		$sekolah 	= $config->update_sekolah($id_sekolah,$id_kec,$id_kel,$npsn,$nama_sekolah,$status,$alamat,$foto,$password);
	?>