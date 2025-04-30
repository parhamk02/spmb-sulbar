<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
	$modul = $_GET['module'];
	
	//create data
	if($act=="create"){
		$name 		= $_POST['name'];
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$alamat 	= $_POST['alamat'];
		$level 		= $_POST['level'];
		if(isset($_FILES['foto']['name'])){
		$file=$_FILES['foto']['name'];
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$folder = "images/$file";
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		$foto=$file;
		}else{
		$foto="-";
		}
		
		$dataadmin 	= $config->input_dataadmin($name,$username,$password,$alamat,$level,$foto);
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'data-admin'</script>";
	}
	elseif ($act=="update") {
		$id_users	= $_POST['id_users'];
		$name 		= $_POST['name'];
		$username 	= $_POST['username'];
		$alamat 	= $_POST['alamat'];
		$level 		= $_POST['level'];
		if (empty($_POST['password'])) {
			$password = $_POST['pass_lama'];
		}else{
			$password 	= $_POST['password'];
		}
		if(isset($_FILES['foto']['name'])){
		$file=$_FILES['foto']['name'];
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$folder = "images/$file";
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		$foto=$file;
		}
		else{
		$foto=$_POST['foto_lama'];
		}
		$dataadmin 	= $config->update_pass($id_users,$name,$username,$password,$alamat,$level,$foto);
		echo "<script>alert('Data Berhasil Diupdate'); window.location = 'home'</script>";
	}
	elseif ($act=="delete") {
		$id_users 		= $_GET['id_users'];
		$dataadmin 	= $config->delete_dataadmin($id_users);
		echo "<script>alert('Data Berhasil Dihapus'); window.location = 'data-admin'</script>";
	}

}

?>
