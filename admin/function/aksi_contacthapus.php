<?php
	include "../koneksi.php";
	
			mysqli_query($koneksi, "DELETE FROM contact WHERE id_contact = '$_GET[id]'");
			echo "<script>
					alert('Data dihapus');
					document.location.href='../menu_contact.php';
					</script>";	
		
?>	