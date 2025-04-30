<?php
	include "../koneksi.php";
	include "upload.php";

	$password = md5($_POST['password']);
	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$tipe_file = $_FILES['fupload']['type'];
	$nama_file = $_FILES['fupload']['name'];



	switch($_GET['act']){
		case "tambah":
		Upload($nama_file);
			mysqli_query($koneksi, "INSERT INTO users(name,
													  username,
												      password,
												      status,
												      alamat,
												      level,												      
												      foto)
			                                    VALUES('$_POST[name]',
			                                    		'$_POST[username]',
			                                    	   '$password',
			                                    	   '$_POST[status]',
			                                    	   '$_POST[alamat]',
			                                    	   '$_POST[level]',
			                                    	   '$nama_file')");
			
			echo "<script>
			       alert('Users ditambah');
			       document.location.href='../menu_users.php';
			      </script>";
		break;

		case "edit":
		if(empty($_POST['password']) AND !isset($lokasi_file)){
			mysqli_query($koneksi, "UPDATE users SET name = '$_POST[name]',
													username = '$_POST[username]',
													status = '$_POST[status]',
			                                    	 alamat = '$_POST[alamat]',
			                                     	level = '$_POST[level]'
			                                WHERE id_users = '$_POST[id_users]'");                                



		}else if(empty($lokasi_file)){
			mysqli_query($koneksi, "UPDATE users SET name = '$_POST[name]',
												 	password = '$password',
			                                     	username = '$_POST[username]',
			                                     	status = '$_POST[status]',
			                                     	alamat = '$_POST[alamat]',
			                                     	level = '$_POST[level]'
			                                WHERE id_users = '$_POST[id_users]'");



		}else{
			Upload($nama_file);
			mysqli_query($koneksi, "UPDATE users SET name = '$_POST[name]',
												 	password = '$password',
			                                     	username = '$_POST[username]',
			                                     	status = '$_POST[status]',
			                                     	alamat = '$_POST[alamat]',
			                                     	level = '$_POST[level]',
			                                     	foto = '$nama_file'
			                                WHERE id_users = '$_POST[id_users]'"); 


		}			

		echo "<script>
				alert('Users diupdate');
				document.location.href='../menu_users.php';
		  		</script>";
		break;

		

	}

?>