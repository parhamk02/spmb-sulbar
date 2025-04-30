<?php
include"admin/app/config.php";
$config = new config();
$jenjang=$_GET['jenjang'];
$tampil   = $config->detail_jalurppdb22($jenjang);
$today = date('Y-m-d');
while($data = mysqli_fetch_assoc($tampil)){	
	if ($today >= $data['awal'] && $today <= $data['akhir']) {
?>
	<option value="<?php echo $data['id_jalurppdb'] ?>"><?php echo $data['jalurppdb'] ?></option>
<?php  
	}else{
?>
	<option value="<?php echo $data['id_jalurppdb'] ?>" disabled><?php echo $data['jalurppdb'] ?></option>
<?php
	}
}
?>