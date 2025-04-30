<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
	$modul = $_GET['module'];
	
	
	if ($act=="delete") {
		$id_datappdb 		= $_GET['id_datappdb'];
		$datappdb = $config->detail_datappdb($id_datappdb);
		$row1 = mysqli_fetch_assoc($datappdb);
		$no_pendaftaran = $row1['no_pendaftaran'];
		//$berkas = $config->tampil_berkas($no_pendaftaran);

		//$filePath = "file/".$dk['/your/file.txt';

			// Mengecek apakah file ada
		//	if (file_exists($filePath)) {
			    // Menghapus file
		//	    if (unlink($filePath)) {
		//	        echo "File berhasil dihapus.";
		//	    } else {
		//	        echo "Terjadi kesalahan saat menghapus file.";
		//	    }
		//	}
		//}
		$sekolah 		= $config->delete_datappdb($id_datappdb);
		$berkas 		= $config->delete_berkas($no_pendaftaran);
		$nilai_rapor 	= $config->delete_nilairapor($no_pendaftaran);
		echo "<script>alert('Data Berhasil Dihapus'); window.location = 'data-ppdb'</script>";
	}elseif ($act=="delete1") {
		$id_datappdb 		= $_GET['id_datappdb'];
		$datappdb = $config->detail_datappdb($id_datappdb);
		$row1 = mysqli_fetch_assoc($datappdb);
		$no_pendaftaran = $row1['no_pendaftaran'];
		//$berkas = $config->tampil_berkas($no_pendaftaran);

		//$filePath = "file/".$dk['/your/file.txt'; 

			// Mengecek apakah file ada
		//	if (file_exists($filePath)) {
			    // Menghapus file
		//	    if (unlink($filePath)) {
		//	        echo "File berhasil dihapus.";
		//	    } else {
		//	        echo "Terjadi kesalahan saat menghapus file.";
		//	    }
		//	}
		//}
		$sekolah 		= $config->delete_datappdb($id_datappdb);
		$berkas 		= $config->delete_berkas($no_pendaftaran);
		$nilai_rapor 	= $config->delete_nilairapor($no_pendaftaran);
		echo "<script>alert('Data Berhasil Dihapus'); window.location = 'dataspmb'</script>";
	}elseif ($act=="proses") {
		$id_datappdb 		= $_POST['id_datappdb'];
		$status 			= $_POST['status'];	
        $jenjang 			= $_POST['jenjang'];
		
		if (isset($_POST['ket'])) {
			$ket 				= $_POST['ket'];
		}else{
			$ket 				= NULL;
		}
		
      	if($jenjang=='SMA'){
        	$jurusan_id 		= NULL;
        }
      
		if ($status=='Tidak Diterima') {
			$id_sekolah 		= $_POST['id_sekolah2'];
			$status2 			= "Proses";
          	$jurusan_id 		= NULL;
		}else{
			$status2 			= NULL;
			$id_sekolah 		= $_POST['id_sekolah'];
            $jurusan_id 		= $_POST['jurusan_id'];
		}
		
		

		$sekolah 	= $config->proses_ppdb($id_datappdb,$id_sekolah,$jurusan_id,$status,$status2,$ket);
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'dataspmb'</script>";
	}elseif ($act=="proses2") {
		$id_datappdb 		= $_POST['id_datappdb'];
        $jenjang 			= $_POST['jenjang'];
		$status 			= $_POST['status'];
		
		$ket2 				= $_POST['ket2'];		
		
		if($jenjang=='SMA'){
        	$jurusan_id 		= NULL;
        }
      
		if ($status=='Tidak Diterima') {
			$status3 			= "Proses";
			$id_sekolah 		= $_POST['id_sekolah3'];
          	$jurusan_id 		= 0;
		}else{
			$status3 			= NULL;
			$id_sekolah 		= $_POST['id_sekolah'];
            $jurusan_id 		= $_POST['jurusan_id'];
		}
		

		$sekolah 	= $config->proses_ppdb2($id_datappdb,$id_sekolah,$jurusan_id,$status,$status3,$ket2);
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'dataspmb'</script>";
	}elseif ($act=="proses3") {
		$id_datappdb 		= $_POST['id_datappdb'];
		$status 			= $_POST['status'];
        $jenjang 			= $_POST['jenjang'];
		
		$ket3 				= $_POST['ket3'];
		
		
		if($jenjang=='SMA'){
        	$jurusan_id 		= NULL;
        }
      
		if ($status=='Tidak Diterima') {
			$id_sekolah 		= $_POST['id_sekolah3'];
          	$jurusan_id 		= 0;
		}else{
			$id_sekolah 		= $_POST['id_sekolah'];
            $jurusan_id 		= $_POST['jurusan_id'];
		}
		

		$sekolah 	= $config->proses_ppdb3($id_datappdb,$id_sekolah,$jurusan_id,$status,$ket3);
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'dataspmb'</script>";
	}
	elseif ($act=="proses1") {
		$id_datappdb 		= $_POST['id_datappdb'];
		$status 			= $_POST['status'];
		if (isset($_POST['ket'])) {
			$ket 				= $_POST['ket'];
		}else{
			$ket 				= "-";
		}
		$id_sekolah 		= $_POST['id_sekolah'];
		if (isset($_POST['jurusan_id'])) {
			$jurusan_id 		= $_POST['jurusan_id'];
		}else{
			$jurusan_id 		= "-";
		}
		$sekolah 	= $config->proses_ppdb($id_datappdb,$id_sekolah,$jurusan_id,$status,$ket);
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'dataspmb'</script>";
	}elseif ($act=="kirim") {
		$id_sekolah 	= $_GET['id'];
		$status 		= "Terkirim";
		
		$sekolah 	= $config->kirim_spmb($id_sekolah,$status);
		echo "<script>alert('Data Berhasil Disimpan'); window.location = 'dataspmb'</script>";
	}




}

?>
