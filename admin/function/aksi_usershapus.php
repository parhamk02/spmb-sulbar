<?php
include "../koneksi.php";
			mysqli_query($koneksi, "DELETE FROM users WHERE id_users = '$_GET[id]'");
		echo "<script>
				alert('Users dihapus');
				document.location.href='../menu_users.php';
		  		</script>";
		
?>

