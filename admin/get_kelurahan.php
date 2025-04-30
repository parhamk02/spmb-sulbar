<?php
include"app/config.php";
$config = new config();
$id_kec=$_GET['id_kec'];
$tampil   = $config->tampil_kelurahan1($id_kec);
while($data = mysqli_fetch_assoc($tampil)){	
?>
	<option value="<?php echo $data['id_kel'] ?>"><?php echo $data['nama_kel'] ?></option>
<?php  
}
?>