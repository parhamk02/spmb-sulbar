<?php
	include "../koneksi.php";
	include "upload.php";

	

	switch($_GET['act']){
		case "tambah":		
			mysqli_query($koneksi, "INSERT INTO kelurahan(kec, nama)
			                                    VALUES('$_POST[kec]',
			                                    	'$_POST[nama]')");
			                                    	   
			
			echo "<script>
			       alert('Kelurahan ditambah');
			       document.location.href='../menu_kelurahan.php';
			      </script>";

		break;
		case "edit":

			mysqli_query($koneksi, "UPDATE kelurahan SET kec = '$_POST[kec]',
															nama = '$_POST[nama]'
			                                     WHERE id_kel = '$_POST[id_kel]'");                                

				
				
		
		echo "<script>
				alert('Kelurahan diupdate');
				document.location.href='../menu_kelurahan.php';
		  		</script>";

	}

?>