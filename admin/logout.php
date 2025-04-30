<?php
	session_start();
	session_destroy();
	echo"<script>
			alert('Anda telah keluar dari aplikasi');
			document.location.href='index.php';
		</script>";
?>