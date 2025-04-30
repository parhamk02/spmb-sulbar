<?php
include "../koneksi.php";

		
			mysqli_query($koneksi, "DELETE FROM sekolah WHERE id_sekolah = '$_GET[id]'");
		echo "<script>
				alert('Sekolah dihapus');
				document.location.href='../menu_sekolah.php';
		  		</script>";

?>