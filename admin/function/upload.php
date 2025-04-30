<?php

function Upload($fupload_name){
	$vdir_upload = "../images/";
	$vfile_upload = $vdir_upload . $fupload_name;

	move_uploaded_file($_FILES['fupload']['tmp_name'], $vfile_upload);
}

?>