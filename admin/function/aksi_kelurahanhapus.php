<?php
include "../koneksi.php";

		
			mysqli_query($koneksi, "DELETE FROM kelurahan WHERE id_kel = '$_GET[id]'");
		echo "<script>
				alert('kelurahan dihapus');
				document.location.href='../menu_kelurahan.php';
		  		</script>";

?>