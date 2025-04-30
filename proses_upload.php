<?php
if ($e['jalurppdb']=='Perpindahan Tugas Ortu / Wali') {
                        if (isset($_FILES['file_suratpindah']['name'])) {
                            $imageFileType = strtolower(pathinfo($_FILES['file_suratpindah']['name'],PATHINFO_EXTENSION));
                            $file_suratpindah="suratpindah-".$no_pendaftaran.".".$imageFileType;
                            $lokasi_file = $_FILES['file_suratpindah']['tmp_name'];
                            $folder = "file/surat_pindah/$file_suratpindah";
                                // Apabila file berhasil di upload
                            move_uploaded_file($lokasi_file,"$folder");
                        }else{
                            $file_suratpindah="-";
                        }
                        if (isset($_FILES['file_penempatan']['name'])) {
                            $imageFileType = strtolower(pathinfo($_FILES['file_penempatan']['name'],PATHINFO_EXTENSION));
                            $file_penempatan="penempatan-".$no_pendaftaran.".".$imageFileType;
                            $lokasi_file = $_FILES['file_suratpindah']['tmp_name'];
                            $folder = "file/penempatan/$file_penempatan";
                                // Apabila file berhasil di upload
                            move_uploaded_file($lokasi_file,"$folder");
                        }else{
                            $file_penempatan="-";
                        }
                            $file_pkh="-";
                            $file_suratkhusus="-";
                            $file_sertifikat="-";

                    }elseif ($e['jalurppdb']=='Afirmasi') {
                        if (isset($_FILES['file_pkh']['name'])) {
                            $imageFileType = strtolower(pathinfo($_FILES['file_pkh']['name'],PATHINFO_EXTENSION));
                            $file_pkh="pkh-".$no_pendaftaran.".".$imageFileType;
                            $lokasi_file = $_FILES['file_pkh']['tmp_name'];
                            $folder = "file/pkh/$file_pkh";
                                // Apabila file berhasil di upload
                            move_uploaded_file($lokasi_file,"$folder");
                        }else{
                            $file_pkh="-";
                        }
                        if (isset($_FILES['file_suratkhusus']['name'])) {
                            $imageFileType = strtolower(pathinfo($_FILES['file_suratkhusus']['name'],PATHINFO_EXTENSION));
                            $file_suratkhusus="suratkhusus-".$no_pendaftaran.".".$imageFileType;
                            $lokasi_file = $_FILES['file_suratkhusus']['tmp_name'];
                            $folder = "file/surat_khusus/$file_suratkhusus";
                                // Apabila file berhasil di upload
                            move_uploaded_file($lokasi_file,"$folder");
                        }else{
                            $file_suratkhusus="-";
                        }
                            $file_penempatan="-";
                            $file_sertifikat="-";
                            $file_suratpindah="-";

                    }elseif ($e['jalurppdb']=='Prestasi') {
                        if (isset($_FILES['file_sertifikat']['name'])) {
                            $imageFileType = strtolower(pathinfo($_FILES['file_sertifikat']['name'],PATHINFO_EXTENSION));
                            $file_sertifikat="sertifikat-".$no_pendaftaran.".".$imageFileType;
                            $lokasi_file = $_FILES['file_sertifikat']['tmp_name'];
                            $folder = "file/sertifikat/$file_sertifikat";
                                // Apabila file berhasil di upload
                            move_uploaded_file($lokasi_file,"$folder");
                        }else{
                            $file_sertifikat="-";
                        }
                            $file_penempatan="-";
                            $file_pkh="-";
                            $file_suratkhusus="-";
                            $file_suratpindah="-";

                    }elseif ($e['jalurppdb']=='Zonasi') {
                            $file_penempatan="-";
                            $file_sertifikat="-";
                            $file_pkh="-";
                            $file_suratkhusus="-";
                            $file_suratpindah="-";
                    }
                    if (isset($_FILES['file_kkdomisili']['name'])) {
                            $imageFileType = strtolower(pathinfo($_FILES['file_kkdomisili']['name'],PATHINFO_EXTENSION));
                            $file_kkdomisili="kkdomisili-".$no_pendaftaran.".".$imageFileType;
                            $lokasi_file = $_FILES['file_kkdomisili']['tmp_name'];
                            $folder = "file/kkdomisili/$file_kkdomisili";
                                // Apabila file berhasil di upload
                            move_uploaded_file($lokasi_file,"$folder");
                        }else{
                            $file_kkdomisili="-";
                        }
                    if (isset($_FILES['file_aktalahir']['name'])) {
                            $imageFileType = strtolower(pathinfo($_FILES['file_aktalahir']['name'],PATHINFO_EXTENSION));
                            $file_aktalahir="aktalahir-".$no_pendaftaran.".".$imageFileType;
                            $lokasi_file = $_FILES['file_aktalahir']['tmp_name'];
                            $folder = "file/aktalahir/$file_aktalahir";
                                // Apabila file berhasil di upload
                            move_uploaded_file($lokasi_file,"$folder");
                        }else{
                            $file_aktalahir="-";
                        }
                    if (isset($_FILES['file_rapor']['name'])) {
                            $imageFileType = strtolower(pathinfo($_FILES['file_rapor']['name'],PATHINFO_EXTENSION));
                            $file_rapor="rapor-".$no_pendaftaran.".".$imageFileType;
                            $lokasi_file = $_FILES['file_rapor']['tmp_name'];
                            $folder = "file/rapor/$file_rapor";
                                // Apabila file berhasil di upload
                            move_uploaded_file($lokasi_file,"$folder");
                        }else{
                            $file_rapor="-";
                        }
                    if (isset($_FILES['file_foto']['name'])) {
                            $imageFileType = strtolower(pathinfo($_FILES['file_foto']['name'],PATHINFO_EXTENSION));
                            $file_foto="foto-".$no_pendaftaran.".".$imageFileType;
                            $lokasi_file = $_FILES['file_foto']['tmp_name'];
                            $folder = "file/foto/$file_foto";
                                // Apabila file berhasil di upload
                            move_uploaded_file($lokasi_file,"$folder");
                        }else{
                            $file_foto="-";
                        }

                $berkas    = $config->input_berkas($no_pendaftaran,$file_kkdomisili,$file_aktalahir,$file_suratpindah,$file_penempatan,$file_pkh,$file_sertifikat,$file_foto,$file_suratkhusus,$file_rapor);
?>