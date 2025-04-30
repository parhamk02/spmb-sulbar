

<?php
include"admin/app/config.php";
$config = new config();
$id_kab = $_GET['id_kab'];
$tampil   = $config->detail_kecamatan1($id_kab);
?>
	<option value="">Pilih Kecamatan</option>
<?php
while($data = mysqli_fetch_assoc($tampil)){	
?>
	<option value="<?php echo $data['id_kec'] ?>"><?php echo $data['nama_kec'] ?></option>
<?php  
}
?>