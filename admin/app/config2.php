<?php
// Membuat variabel, ubah sesuai dengan nama host dan database pada hosting 
		$server		= "localhost";
		$user		= "root";
		$password	= "";
		$dbname		="ppdbbpmp3434";	

//Menggunakan objek mysqli untuk membuat koneksi dan menyimpanya dalam variabel $mysqli	
$mysqli = new mysqli($server, $user, $password, $dbname);
?>
