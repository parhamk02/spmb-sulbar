<?php
include "../koneksi.php";

		
			mysqli_query($koneksi, "DELETE FROM kecamatan WHERE id_kec = '$_GET[id]'");
		echo "<script>
				alert('kecamatan dihapus');
				document.location.href='../menu_kecamatan.php';
		  		</script>";

?>