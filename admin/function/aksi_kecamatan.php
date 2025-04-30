<?php
	include "../koneksi.php";
	include "upload.php";

	
 
	switch($_GET['act']){
		case "tambah":		
			mysqli_query($koneksi, "INSERT INTO kecamatan(nama_kec)
			                                    VALUES('$_POST[nama_kec]')");
			                                    	   
			
			echo "<script>
			       alert('Kecamatan ditambah');
			       document.location.href='../menu_kecamatan.php';
			      </script>";

		break;
		case "edit":

			mysqli_query($koneksi, "UPDATE kecamatan SET nama_kec = '$_POST[nama_kec]'
			                                     WHERE id_kec = '$_POST[id_kec]'");                                

				
				
		
		echo "<script>
				alert('Kecamatan diupdate');
				document.location.href='../menu_kecamatan.php';
		  		</script>";

	}

?>