<?php
	include "../koneksi.php";
	include "upload.php";
	if(isset($_POST['password'])){
		$password = md5($_POST['password']);
	}else{
		$password = $_POST['pass_lama'];
	}
	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$tipe_file = $_FILES['fupload']['type'];
	$nama_file = $_FILES['fupload']['name'];	
	switch($_GET['act']){
		case "tambah":		
			mysqli_query($koneksi, "INSERT INTO sekolah(id_kec, 
														id_kel,
														npsn,
														nama_sekolah,
														status,
														alamat,
														foto,
														password)
			                                    VALUES('$_POST[kec]',
			                                    	'$_POST[kel]',
			                                    	'$_POST[npsn]',
			                                    	'$_POST[nama_sekolah]',
			                                    	'$_POST[status]',
			                                    	'$_POST[alamat]',
			                                    	'$nama_file',
			                                    	'$_POST[password]')");
			                                    	   
			
			echo "<script>
			       alert('Sekolah ditambah');
			       document.location.href='../menu_sekolah.php';
			      </script>";

		break;
		case "edit":
			Upload($nama_file);
			mysqli_query($koneksi, "UPDATE sekolah SET id_kec = '$_POST[kec]',
														id_kel = '$_POST[kel]',
														npsn = '$_POST[npsn]',
														nama_sekolah = '$_POST[nama_sekolah]',
														status = '$_POST[status]',
														alamat = '$_POST[alamat]',
														foto = '$nama_file',
														pass = '$password'
			                                     WHERE id_sekolah = '$_POST[id_sekolah]'");                                

				
				
		
		echo "<script>
				alert('Sekolah diupdate');
				document.location.href='../menu_sekolah.php';
		  		</script>";

	}

?>