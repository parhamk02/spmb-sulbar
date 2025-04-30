<?php
	include "../koneksi.php";
	include "upload.php";

	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$tipe_file = $_FILES['fupload']['type'];
	$nama_file = $_FILES['fupload']['name'];
	
	
	switch($_GET['act']){
		case "tambah":

			mysqli_query($koneksi, "INSERT INTO contact(nama, 
													alamat,													
													no_telp,
													website,
													email,
													facebook,
													instagram,
													youtube,
													linkedin,
													foto)
									VALUES('$_POST[nama]', 
											'$_POST[alamat]',
											'$_POST[no_telp]',
											'$_POST[website]',
											'$_POST[email]',
											'$_POST[facebook]',
											'$_POST[instagram]',
											'$_POST[youtube]',
											'$_POST[linkedin]',
											'$nama_file')");
			echo "<script>
					alert('Data ditambah');
					document.location.href='../menu_contact.php';
				</script>";
		break;
		case "edit":
		if(empty($lokasi_file)){
			mysqli_query($koneksi, "UPDATE contact SET nama = '$_POST[nama]',
													alamat = '$_POST[alamat]',
													no_telp = '$_POST[no_telp]',
													website = '$_POST[website]',
			                                    	 email = '$_POST[email]',
			                                    	 facebook = '$_POST[facebook]',
			                                    	 instagram = '$_POST[instagram]',
			                                    	 youtube = '$_POST[youtube]',
			                                    	 linkedin = '$_POST[linkedin]'
			                                WHERE id_contact = '$_POST[id]'");                           



		}else if(empty($lokasi_file)){
			mysqli_query($koneksi, "UPDATE contact SET nama = '$_POST[nama]',
													alamat = '$_POST[alamat]',
													no_telp = '$_POST[no_telp]',
													website = '$_POST[website]',
			                                    	 email = '$_POST[email]',
													 facebook = '$_POST[facebook]',
			                                    	 instagram = '$_POST[instagram]',
			                                    	 youtube = '$_POST[youtube]',
			                                    	 linkedin = '$_POST[linkedin]'
			                                WHERE id_contact = '$_POST[id]'");



		}else{
			Upload($nama_file);
			mysqli_query($koneksi, "UPDATE contact SET nama = '$_POST[nama]',
													alamat = '$_POST[alamat]',
													no_telp = '$_POST[no_telp]',
													website = '$_POST[website]',
			                                    	 email = '$_POST[email]',
													 facebook = '$_POST[facebook]',
			                                    	 instagram = '$_POST[instagram]',
			                                    	 youtube = '$_POST[youtube]',
			                                    	 linkedin = '$_POST[linkedin]',
			                                     	foto = '$nama_file'
			                                WHERE id_contact = '$_POST[id]'");


		}
			echo "<script>
					alert('Data diupdate');
					document.location.href='../menu_contact.php';
					</script>";
							
	}
?>	