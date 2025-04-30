<?php
	include "../koneksi.php";
	include "upload.php";

	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$tipe_file = $_FILES['fupload']['type'];
	$nama_file = $_FILES['fupload']['name'];
	
	
	switch($_GET['act']){
		case "tambah":

			mysqli_query($koneksi, "INSERT INTO sertifikasi(kec, 
													kel,													
													nama_sekolah,
													surat_tanggung,
													surat_keaktifan,
													surat_daerah,
													analisis_kebutuhan,
													info_gtk,
													daftar_hadir,
													surat_usulan,
													foto)
									VALUES('$_POST[kec]', 
											'$_POST[kel]',
											'$_POST[nama_sekolah]',
											'$_POST[surat_tanggung]',
											'$_POST[surat_keaktifan]',
											'$_POST[surat_daerah]',
											'$_POST[analisis_kebutuhan]',
											'$_POST[info_gtk]',
											'$_POST[daftar_hadir]',
											'$_POST[surat_usulan]',
											'$nama_file')");
			echo "<script>
					alert('Data ditambah');
					document.location.href='../menu_sertifikasi.php';
				</script>";
		break;
		case "edit":
		if(empty($lokasi_file)){
			mysqli_query($koneksi, "UPDATE sertifikasi SET kec = '$_POST[kec]',
													kel = '$_POST[kel]',
													nama_sekolah = '$_POST[nama_sekolah]',
													surat_tanggung = '$_POST[surat_tanggung]',
			                                    	 surat_keaktifan = '$_POST[surat_keaktifan]',
			                                    	 surat_daerah = '$_POST[surat_daerah]',
			                                    	 analisis_kebutuhan = '$_POST[analisis_kebutuhan]',
			                                    	 info_gtk = '$_POST[info_gtk]',
			                                    	 daftar_hadir = '$_POST[daftar_hadir]',
			                                    	 surat_usulan = '$_POST[surat_usulan]'
			                                WHERE id_sertifikasi = '$_POST[id_sertifikasi]'");                           



		}else if(empty($lokasi_file)){
			mysqli_query($koneksi, "UPDATE sertifikasi SET kec = '$_POST[kec]',
													kel = '$_POST[kel]',
													nama_sekolah = '$_POST[nama_sekolah]',
													surat_tanggung = '$_POST[surat_tanggung]',
			                                    	 surat_keaktifan = '$_POST[surat_keaktifan]',
													 surat_daerah = '$_POST[surat_daerah]',
			                                    	 analisis_kebutuhan = '$_POST[analisis_kebutuhan]',
			                                    	 info_gtk = '$_POST[info_gtk]',
			                                    	 daftar_hadir = '$_POST[daftar_hadir]',
			                                    	 surat_usulan = '$_POST[surat_usulan]'
			                                WHERE id_sertifikasi = '$_POST[id_sertifikasi]'");



		}else{
			Upload($kec_file);
			mysqli_query($koneksi, "UPDATE sertifikasi SET kec = '$_POST[kec]',
													kel = '$_POST[kel]',
													nama_sekolah = '$_POST[nama_sekolah]',
													surat_tanggung = '$_POST[surat_tanggung]',
			                                    	 surat_keaktifan = '$_POST[surat_keaktifan]',
													 surat_daerah = '$_POST[surat_daerah]',
			                                    	 analisis_kebutuhan = '$_POST[analisis_kebutuhan]',
			                                    	 info_gtk = '$_POST[info_gtk]',
			                                    	 daftar_hadir = '$_POST[daftar_hadir]',
			                                    	 surat_usulan = '$_POST[surat_usulan]',
			                                     	foto = '$nama_file'
			                                WHERE id_sertifikasi = '$_POST[id_sertifikasi]'");


		}
			echo "<script>
					alert('Data diupdate');
					document.location.href='../menu_sertifikasi.php';
					</script>";
							
	}
?>	