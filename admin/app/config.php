<?php 
date_default_timezone_set("Asia/Makassar");
class config {

public $db;
	 
/* Fungsi koneksi */


	function __construct()
	{
		$server		= "localhost";
		$user		= "root";
		$password	= "";
		$dbname		="ppdbbpmp3434";		 
		$this->db = new mysqli($server, $user, $password, $dbname);
	}
 



// method tampil data admin
	function tampil_dataadmin(){
	$query 	= "SELECT * FROM users order by id_users";
	$result = $this->db->query($query);
	return $result; 
	}

// method detail data admin
	function detail_dataadmin($id_users){
	$query 	= "SELECT * FROM users where id_users='$id_users'";
	$result = $this->db->query($query);
	return $result; 
	}	

//Update pass pemilik	
	function update_pass($id_users,$name,$username,$password,$alamat,$level,$foto){
	$query = "UPDATE users SET name='$name', username = '$username',
			password ='$password' , alamat ='$alamat',level ='$level', foto ='$foto' 
			where id_users ='$id_users'";
	$res = $this->db->query($query);
	return $res;
	}

// method edit data admin 
	function input_dataadmin($name,$username,$password,$alamat,$level,$foto){
	$password = md5($password);
	$query 	= "INSERT INTO users VALUES (NULL,'$name','$username','$password','$alamat','$foto','$level',NULL)";
	$res 	= $this->db->query($query);
	return $res;
	}
// method hapus data admin
	function delete_dataadmin($id_users){
	$query 	= "DELETE FROM users where id_users= $id_users";
	$res 	= $this->db->query($query);
	return $res;
	}


//Data kecamatan
// method tampil data kecamatan
function tampil_kecamatan(){
	$query 	= "SELECT * FROM kecamatan inner join kabupaten on kecamatan.id_kab=kabupaten.id_kab order by 'id_kec' desc";
	$result = $this->db->query($query);
	return $result;	
	}

function tampil_kecamatansulbar(){
	$query 	= "SELECT * FROM kecamatan inner join kabupaten on kecamatan.id_kab=kabupaten.id_kab where kabupaten.id_provinsi='76'";
	$result = $this->db->query($query);
	return $result;	
	}


function tampil_kecamatan1(){
	$query 	= "SELECT k.*,b.*, GROUP_CONCAT(s.nama_sekolah SEPARATOR ', ') AS nama_sekolah FROM kecamatan k INNER JOIN kabupaten b ON k.id_kab = b.id_kab LEFT JOIN sekolah s ON FIND_IN_SET(s.id_sekolah, k.zona_sekolah) > 0 GROUP BY k.id_kec ORDER BY `k`.`zona_sekolah` DESC";
	$result = $this->db->query($query);
	return $result;	
	}

// method detail data kecamatan
	function detail_kecamatan($id_kec){
	$query 	= "SELECT * FROM kecamatan where id_kec='$id_kec'";
	$result = $this->db->query($query);
	return $result;	
	}

	// method detail data kecamatan
	function detail_kecamatan1($id_kab){
	$query 	= "SELECT * FROM kecamatan where id_kab='$id_kab'";
	$result = $this->db->query($query);
	return $result;	
	}
	

// method hapus data kecamatan
	function delete_kecamatan($id_kec){
	$query 	= "DELETE FROM kecamatan where id_kec='$id_kec'";
	$res 	= $this->db->query($query);
	return $res;
	}

// method tambah data kecamatan
	function input_kecamatan($nama_kec,$kode_kec){
	$sql 	= "INSERT INTO kecamatan VALUES (NULL,'$nama_kec','$kode_kec')";
	$result = $this->db->query($sql); 
	return $result;
	}


// method update data kecamatan
	function update_kecamatan($id_kec,$nama_kec,$zona_sekolah){
	$query = "UPDATE kecamatan SET 
									nama_kec	='$nama_kec',
									zona_sekolah	='$zona_sekolah'
									where id_kec = '$id_kec'";
			$res = $this->db->query($query);
			return $res;
	}

//Data kabupaten
// method tampil data kabupaten
function tampil_kabupaten(){
	$query 	= "SELECT * FROM kabupaten order by 'id_kab' desc";
	$result = $this->db->query($query);
	return $result;	
	}

// method detail data kabupaten
	function detail_kabupaten($id_kab){
	$query 	= "SELECT * FROM kabupaten where id_kab='$id_kab'";
	$result = $this->db->query($query);
	return $result;	
	}
	

// method hapus data kabupaten
	function delete_kabupaten($id_kab){
	$query 	= "DELETE FROM kabupaten where id_kab='$id_kab'";
	$res 	= $this->db->query($query);
	return $res;
	}

// method tambah data kabupaten
	function input_kabupaten($nama_kab){
	$sql 	= "INSERT INTO kabupaten VALUES (NULL,'$nama_kab')";
	$result = $this->db->query($sql); 
	return $result;
	}


// method update data kabupaten
	function update_kabupaten($id_kab,$nama_kab,$kode_kab){
	$query = "UPDATE kabupaten SET 
									nama_kab	='$nama_kab',
									where id_kab = '$id_kab'";
			$res = $this->db->query($query);
			return $res;
	}

//Data kelurahan
// method tampil data kelurahan
function tampil_kelurahan(){
	$query 	= "SELECT * FROM kelurahan inner join kecamatan on kelurahan.id_kec=kecamatan.id_kec inner join zonasis on kelurahan.id_zonasi=zonasis.id_zonasi order by kelurahan.id_kel desc";
	$result = $this->db->query($query);
	return $result;	
	}

// method detail data kelurahan
	function detail_kelurahan($id_kel){
	$query 	= "SELECT kelurahan.*,kecamatan.nama_kec FROM kelurahan inner join kecamatan on kelurahan.id_kec=kecamatan.id_kec where kelurahan.id_kel='$id_kel'";
	$result = $this->db->query($query);
	return $result;	
	}

// method detail data kelurahan
	function detail_kelurahan1($id_kel){
	$query 	= "SELECT * FROM kelurahan where kelurahan.id_kel='$id_kel'";
	$result = $this->db->query($query);
	return $result;	
	}

// method detail data kelurahan
	function get_kelurahan($kode_kel){
	$query 	= "SELECT * FROM kelurahan inner join kecamatan on kelurahan.id_kec=kecamatan.id_kec where kelurahan.kode_kel='$kode_kel'";
	$result = $this->db->query($query);
	return $result;	
	}

// method detail data kelurahan
	function tampil_kelurahan1($id_kec){
	$query 	= "SELECT * FROM kelurahan inner join kecamatan on kelurahan.id_kec=kecamatan.id_kec where kelurahan.id_kec='$id_kec'";
	$result = $this->db->query($query);
	return $result;	
	}
	

// method hapus data kelurahan
	function delete_kelurahan($id_kel){
	$query 	= "DELETE FROM kelurahan where id_kel='$id_kel'";
	$res 	= $this->db->query($query);
	return $res;
	}

// method tambah data kelurahan
	function input_kelurahan($id_kec,$id_zonasi,$nama_kel,$kode_kel){
	$sql 	= "INSERT INTO kelurahan VALUES (NULL,'$id_kec','$id_zonasi','$nama_kel','$kode_kel')";
	$result = $this->db->query($sql); 
	return $result;
	}


// method update data kelurahan
	function update_kelurahan($id_kel,$id_kec,$id_zonasi,$nama_kel,$zona_sekolah){
	$query = "UPDATE kelurahan SET 
									id_kec		='$id_kec',
									id_zonasi		='$id_zonasi',
									nama_kel	='$nama_kel',
									zona_sekolah	='$zona_sekolah'
									where id_kel = '$id_kel'";
			$res = $this->db->query($query);
			return $res;
	}


//Data sekolah
// method tampil data sekolah
function tampil_sekolah(){
	$query 	= "SELECT * FROM sekolah inner join zonasis on zonasis.id_zonasi=sekolah.id_zonasi order by sekolah.id_sekolah desc";
	$result = $this->db->query($query);
	return $result;	
	}

function tampil_sekolah23($jenjang){
	$query 	= "SELECT * FROM sekolah inner join zonasis on zonasis.id_zonasi=sekolah.id_zonasi where sekolah.jenjang='$jenjang' order by sekolah.id_sekolah desc";
	$result = $this->db->query($query);
	return $result;	
	}

function get_sekolah($id_kel){
	$query 	= "SELECT * FROM sekolah inner join zonasis on zonasis.id_zonasi=sekolah.id_zonasi inner join kelurahan on zonasis.id_zonasi=kelurahan.id_zonasi where kelurahan.id_kel='$id_kel'";
	$result = $this->db->query($query);
	return $result;	
	}

function get_sekolah12($id_kel){
	$query 	= "SELECT * FROM sekolah where id_sekolah in (SELECT zona_sekolah from kelurahan where kelurahan.id_kel='$id_kel')";
	$result = $this->db->query($query);
	return $result;	
	}

function get_sekolah123($zona_sekolah){
	$query 	= "SELECT * FROM sekolah where id_sekolah in ($zona_sekolah)";
	$result = $this->db->query($query);
	return $result;	
	}

function get_sekolahsd(){
	$query 	= "SELECT * FROM sekolah where sekolah.jenjang='SD'";
	$result = $this->db->query($query);
	return $result;	
	}

function get_sekolahsma(){
	$query 	= "SELECT * FROM sekolah where sekolah.jenjang='SMA'";
	$result = $this->db->query($query);
	return $result;	
	}

function get_sekolahsmk(){
	$query 	= "SELECT * FROM sekolah where sekolah.jenjang='SMK'";
	$result = $this->db->query($query);
	return $result;	
	}

function get_sekolah1($id_kec){
	$query 	= "SELECT * FROM sekolah inner join zonasis on zonasis.id_zonasi=sekolah.id_zonasi inner join kecamatan on zonasis.id_zonasi=kecamatan.id_zonasi where kecamatan.id_kec='$id_kec'";
	$result = $this->db->query($query);
	return $result;	
	}

function get_sekolah1smp($kode_kec){
	$query 	= "SELECT * FROM sekolah where sekolah.jenjang='SMP'";
	$result = $this->db->query($query);
	return $result;	
	}

// method detail data sekolah
	function detail_sekolah($id_sekolah){
	$query 	= "SELECT s.*, kec.*, kel.* FROM sekolah s LEFT JOIN kecamatan kec ON s.id_kec = kec.id_kec LEFT JOIN kelurahan kel ON s.id_kel = kel.id_kel WHERE s.id_sekolah = '$id_sekolah'";
	$result = $this->db->query($query);
	return $result;	
	}
	

// method hapus data sekolah
	function delete_sekolah($id_sekolah){
	$query 	= "DELETE FROM sekolah where id_sekolah='$id_sekolah'";
	$res 	= $this->db->query($query);
	return $res;
	}

// method tambah data sekolah
	function input_sekolah($id_kec,$id_kel,$id_zonasi,$npsn,$nama_sekolah,$status,$alamat,$foto,$kapasitas,$jenjang,$password,$ket){
	$sql 	= "INSERT INTO sekolah VALUES (NULL,'$id_kec','$id_kel','$id_zonasi','$npsn','$nama_sekolah','$status','$alamat','$foto','$kapasitas','$jenjang','$password','$ket',NULL,NULL,NULL)";
	$result = $this->db->query($sql); 
	return $result;
	}


// method update data sekolah
	function update_sekolah($id_sekolah,$id_kec,$id_kel,$id_zonasi,$npsn,$nama_sekolah,$status,$alamat,$foto,$password,$ket,$jenjang,$kapasitas,$id_jurusan){
	$query = "UPDATE sekolah SET 
									id_kec			='$id_kec',
									id_kel			='$id_kel',
									id_zonasi		='$id_zonasi',
									npsn			='$npsn',
									nama_sekolah	='$nama_sekolah',
									status			='$status',
									alamat			='$alamat',
									foto			='$foto',
									kapasitas		='$kapasitas',
									jenjang			='$jenjang',
									password		='$password',
									ket				='$ket',
									id_jurusan		='$id_jurusan'
									where id_sekolah = '$id_sekolah'";
			$res = $this->db->query($query);
			return $res;
	}

// method update data sekolah
	function update_jurusansekolah($id_sekolah,$id_jurusan){
	$query = "UPDATE sekolah SET id_jurusan = CASE WHEN id_jurusan IS NULL OR id_jurusan = '' THEN '$id_jurusan' ELSE CONCAT(id_jurusan, ',', '$id_jurusan') END WHERE id_sekolah = '$id_sekolah';";
			$res = $this->db->query($query);
			return $res;
	}

// method update data sekolah
	function update_sekolah1($id_sekolah,$id_kec,$id_kel,$id_zonasi,$npsn,$nama_sekolah,$status,$alamat,$foto,$password){
	$query = "UPDATE sekolah SET 
									id_kec			='$id_kec',
									id_kel			='$id_kel',
									id_zonasi		='$id_zonasi',
									npsn			='$npsn',
									nama_sekolah	='$nama_sekolah',
									status			='$status',
									alamat			='$alamat',
									foto			='$foto',
									password		='$password'
									where id_sekolah = '$id_sekolah'";
			$res = $this->db->query($query);
			return $res;
	}

//Data zonasi
// method tampil data zonasi
function tampil_zonasi(){
	$query 	= "SELECT * FROM zonasis order by zonasis.id_zonasi desc";
	$result = $this->db->query($query);
	return $result;	
	}

// method detail data zonasi
	function detail_zonasi($id_zonasi){
	$query 	= "SELECT * FROM zonasis where zonasis.id_zonasi='$id_zonasi'";
	$result = $this->db->query($query);
	return $result;	
	}


// method hapus data zonasi
	function delete_zonasi($id_zonasi){
	$query 	= "DELETE FROM zonasis where id_zonasi='$id_zonasi'";
	$res 	= $this->db->query($query);
	return $res;
	}

// method tambah data zonasi
	function input_zonasi($kode_zonasi){
	$sql 	= "INSERT INTO zonasis VALUES (NULL,'$kode_zonasi')";
	$result = $this->db->query($sql); 
	return $result;
	}


// method update data zonasi
	function update_zonasi($id_zonasi,$kode_zonasi){
	$query = "UPDATE zonasis SET 
									kode_zonasi	='$kode_zonasi'
									where id_zonasi = '$id_zonasi'";
			$res = $this->db->query($query);
			return $res;
	}


//Data jalurppdb
// method tampil data jalurppdb
function tampil_jalurppdb(){
	$query 	= "SELECT * FROM jalurppdb order by jalurppdb.id_jalurppdb asc";
	$result = $this->db->query($query);
	return $result;	
	}

//Data jalurppdb
// method tampil data jalurppdb
function tampil_jalurppdb1(){
	$query 	= "SELECT *, (SELECT COUNT(id_jalurppdb) from datappdbs WHERE jalurppdb.id_jalurppdb=datappdbs.id_jalurppdb) as jumlah FROM jalurppdb";
	$result = $this->db->query($query);
	return $result;	
	}

function detail_jalurppdb1($id_sekolah){
	$query 	= "SELECT *, (SELECT COUNT(id_jalurppdb) from datappdbs WHERE jalurppdb.id_jalurppdb=datappdbs.id_jalurppdb and datappdbs.id_sekolah1='$id_sekolah') as jumlah FROM jalurppdb";
	$result = $this->db->query($query);
	return $result;	
	
}
function detail_jalurppdb21($id_sekolah,$jenjang){
	$query 	= "SELECT *, (SELECT COUNT(id_jalurppdb) from datappdbs WHERE jalurppdb.id_jalurppdb=datappdbs.id_jalurppdb and datappdbs.id_sekolah1='$id_sekolah') as jumlah FROM jalurppdb where jalurppdb.jenjang='$jenjang'";
	$result = $this->db->query($query);
	return $result;	
	}

// method detail data jalurppdb
	function detail_jalurppdb($id_jalurppdb){
	$query 	= "SELECT * FROM jalurppdb where jalurppdb.id_jalurppdb='$id_jalurppdb'";
	$result = $this->db->query($query);
	return $result;	
	}

// method detail data jalurppdb
	function detail_jalurppdb22($jenjang){
	$query 	= "SELECT * FROM jalurppdb where jalurppdb.jenjang='$jenjang'";
	$result = $this->db->query($query);
	return $result;	
	}


// method hapus data jalurppdb
	function delete_jalurppdb($id_jalurppdb){
	$query 	= "DELETE FROM jalurppdb where id_jalurppdb='$id_jalurppdb'";
	$res 	= $this->db->query($query);
	return $res;
	}

// method tambah data jalurppdb
	function input_jalurppdb($jalurppdb,$awal,$akhir){
	$sql 	= "INSERT INTO jalurppdb VALUES (NULL,'$jalurppdb','$awal','$akhir')";
	$result = $this->db->query($sql); 
	return $result;
	}


// method update data jalurppdb
	function update_jalurppdb($id_jalurppdb,$jalurppdb,$awal,$akhir){
	$query = "UPDATE jalurppdb SET 
									awal	='$awal',
									akhir	='$akhir',
									jalurppdb	='$jalurppdb'
									where id_jalurppdb = '$id_jalurppdb'";
			$res = $this->db->query($query);
			return $res;
	}


// method tampil data jurusan
function tampil_jurusan(){
	$query 	= "SELECT * FROM jurusan order by jurusan.id_jurusan asc";
	$result = $this->db->query($query);
	return $result;	
	}

function tampil_jurusan12($id_sekolah){
	$query 	= "SELECT * FROM jurusan  WHERE id_sekolah='$id_sekolah'";
	$result = $this->db->query($query);
	return $result;	
	}

// method detail data jurusan
	function detail_jurusan($id_jurusan){
	$query 	= "SELECT * FROM jurusan where jurusan.id_jurusan='$id_jurusan'";
	$result = $this->db->query($query);
	return $result;	
	}

// method detail data jurusan
	function detail_jurusan1($id_jurusan){
	$query 	= "SELECT * FROM jurusan where id_jurusan in ($id_jurusan)";
	$result = $this->db->query($query);
	return $result;	
	}


// method hapus data jurusan
	function delete_jurusan($id_jurusan){
	$query 	= "DELETE FROM jurusan where id_jurusan='$id_jurusan'";
	$res 	= $this->db->query($query);
	return $res;
	}

// method tambah data jurusan
	function input_jurusan($id_sekolah,$jurusan){
	$sql 	= "INSERT INTO jurusan VALUES (NULL,'$id_sekolah','$jurusan')";
	$result = $this->db->query($sql); 
	return $result;
	}


// method update data jurusan
	function update_jurusan($id_jurusan,$jurusan){
	$query = "UPDATE jurusan SET 
									jurusan	='$jurusan'
									where id_jurusan = '$id_jurusan'";
			$res = $this->db->query($query);
			return $res;
	}


//Data siswa
// method tampil data siswa
function tampil_siswa(){
	$query 	= "SELECT * FROM siswa inner join kelurahan on siswa.id_kel=kelurahan.id_kel inner join kecamatan on kelurahan.id_kec=kecamatan.id_kec order by siswa.id_siswa desc";
	$result = $this->db->query($query);
	return $result;	
	}

function tampil_siswa12($id_sekolah){
	$query 	= "SELECT * FROM siswa inner join kelurahan on siswa.id_kel=kelurahan.id_kel inner join kecamatan on kelurahan.id_kec=kecamatan.id_kec where siswa.id_siswa in (SELECT datappdbs.id_siswa from datappdbs WHERE datappdbs.id_sekolah1='$id_sekolah' or datappdbs.sekolah_id='$id_sekolah') order by siswa.id_siswa desc";
	$result = $this->db->query($query);
	return $result;	
	}

// method detail data siswa
	function detail_siswa($id_siswa){
	$query 	= "SELECT * FROM siswa inner join kelurahan on siswa.id_kel=kelurahan.id_kel inner join kecamatan on kelurahan.id_kec=kecamatan.id_kec inner join kabupaten on kecamatan.id_kab=kabupaten.id_kab where siswa.id_siswa='$id_siswa'";
	$result = $this->db->query($query);
	return $result;	
	}
	

// method hapus data siswa
	function delete_siswa($id_siswa){
	$query 	= "DELETE FROM siswa where id_siswa='$id_siswa'";
	$res 	= $this->db->query($query);
	return $res;
	}

// method tambah data siswa
	function input_siswa($id_kel,$nik,$nisn,$no_kk,$nama_siswa,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$alamat,$email,$no_telp,$password){
	$tgl				= date("Y-m-d H:i:s");
    $sql 	= "INSERT INTO siswa VALUES (NULL,'$id_kel','$nik','$nisn','$no_kk','$nama_siswa','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$alamat','$email','$no_telp','$password','$tgl',NULL)";
	$result = $this->db->query($sql); 
	return $result;
	}


// method update data siswa
	function update_siswa($id_siswa,$id_kel,$nik,$no_kk,$nama_siswa,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$alamat,$email,$no_telp,$password){
	  $tgl				= date("Y-m-d H:i:s");
      $query = "UPDATE siswa SET 
									id_kel			='$id_kel',
									nik				='$nik',
									no_kk			='$no_kk',
									nama_siswa		='$nama_siswa',
									tempat_lahir	='$tempat_lahir',
									tanggal_lahir	='$tanggal_lahir',
									jenis_kelamin	='$jenis_kelamin',
									alamat			='$alamat',
									email			='$email',
									no_telp			='$no_telp',
									password		='$password',
                                    tgl_akun		='$tgl_akun'
									where id_siswa = '$id_siswa'";
			$res = $this->db->query($query);
			return $res;
	}

//Data datappdb
// method tampil data jalurppdb
function tampil_datappdb(){
	$query 	= "SELECT *, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah1=sekolah.id_sekolah) as sekolah1, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah2=sekolah.id_sekolah) as sekolah2, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah3=sekolah.id_sekolah) as sekolah3 FROM datappdbs inner join jalurppdb on datappdbs.id_jalurppdb=jalurppdb.id_jalurppdb inner join siswa on siswa.id_siswa=datappdbs.id_siswa order by datappdbs.id_datappdb desc";
	$result = $this->db->query($query);
	return $result;	
	}

function pengumuman_datappdb(){
	$query 	= "SELECT *, (SELECT nama_sekolah from sekolah where datappdbs.sekolah_id=sekolah.id_sekolah) as sekolah FROM datappdbs inner join jalurppdb on datappdbs.id_jalurppdb=jalurppdb.id_jalurppdb inner join siswa on siswa.id_siswa=datappdbs.id_siswa where datappdbs.status='Diterima' order by datappdbs.id_datappdb desc";
	$result = $this->db->query($query);
	return $result;	
	}

function detail_datappdb($id_datappdb){
	$query 	= "SELECT *, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah1=sekolah.id_sekolah) as sekolah1, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah2=sekolah.id_sekolah) as sekolah2, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah3=sekolah.id_sekolah) as sekolah3, (SELECT nama_sekolah from sekolah where datappdbs.sekolah_id=sekolah.id_sekolah) as sekolah, (SELECT jurusan from jurusan where datappdbs.jurusan_id=jurusan.id_jurusan) as jurusan FROM datappdbs inner join jalurppdb on datappdbs.id_jalurppdb=jalurppdb.id_jalurppdb inner join siswa on siswa.id_siswa=datappdbs.id_siswa where datappdbs.id_datappdb='$id_datappdb' order by datappdbs.id_datappdb desc";
	$result = $this->db->query($query);
	return $result;	
	}

function detail_datappdbs($id_sekolah){
	$query 	= "SELECT *, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah1=sekolah.id_sekolah) as sekolah1, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah2=sekolah.id_sekolah) as sekolah2, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah3=sekolah.id_sekolah) as sekolah3 FROM datappdbs inner join jalurppdb on datappdbs.id_jalurppdb=jalurppdb.id_jalurppdb inner join siswa on siswa.id_siswa=datappdbs.id_siswa where datappdbs.id_sekolah1='$id_sekolah' order by datappdbs.id_datappdb desc";
	$result = $this->db->query($query);
	return $result;	
	}


function detail_datappdb1($id_sekolah){
	$query 	= "SELECT *, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah1=sekolah.id_sekolah) as sekolah1, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah2=sekolah.id_sekolah) as sekolah2, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah3=sekolah.id_sekolah) as sekolah3, (SELECT jurusan from jurusan where datappdbs.jurusan_id=jurusan.id_jurusan) as jurusan FROM datappdbs inner join nilai_rapor on nilai_rapor.no_pendaftaran=datappdbs.no_pendaftaran inner join jalurppdb on datappdbs.id_jalurppdb=jalurppdb.id_jalurppdb inner join siswa on siswa.id_siswa=datappdbs.id_siswa where datappdbs.id_sekolah1='$id_sekolah' OR datappdbs.sekolah_id='$id_sekolah' OR (datappdbs.id_sekolah2='$id_sekolah' and datappdbs.status2 is not NULL) order by datappdbs.id_datappdb desc";
	$result = $this->db->query($query);
	return $result;	
	}

function detail_datappdb2($id_sekolah,$id_jalurppdb){
	$query 	= "SELECT *, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah1=sekolah.id_sekolah and sekolah.id_sekolah='$id_sekolah') as sekolah1 FROM datappdbs inner join jalurppdb on datappdbs.id_jalurppdb=jalurppdb.id_jalurppdb inner join siswa on siswa.id_siswa=datappdbs.id_siswa where datappdbs.id_sekolah1='$id_sekolah' and datappdbs.id_jalurppdb='$id_jalurppdb' order by datappdbs.id_datappdb desc";
	$result = $this->db->query($query);
	return $result;	
	}

function detail_datappdb22($id_sekolah,$id_jalurppdb,$status,$pilihan){
	$query 	= "SELECT *, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah1=sekolah.id_sekolah and sekolah.id_sekolah='$id_sekolah') as sekolah1 FROM datappdbs inner join jalurppdb on datappdbs.id_jalurppdb=jalurppdb.id_jalurppdb inner join siswa on siswa.id_siswa=datappdbs.id_siswa inner join nilai_rapor on nilai_rapor.no_pendaftaran=datappdbs.no_pendaftaran where datappdbs.id_sekolah$pilihan='$id_sekolah' and datappdbs.id_jalurppdb='$id_jalurppdb' and datappdbs.status$pilihan='$status' order by datappdbs.id_datappdb desc";
	$result = $this->db->query($query);
	return $result;	
	}

function detail_datappdb23($id_jalurppdb,$status){
	$query 	= "SELECT *, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah1=sekolah.id_sekolah) as sekolah1, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah2=sekolah.id_sekolah) as sekolah2, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah3=sekolah.id_sekolah) as sekolah3 FROM datappdbs inner join jalurppdb on datappdbs.id_jalurppdb=jalurppdb.id_jalurppdb inner join siswa on siswa.id_siswa=datappdbs.id_siswa where datappdbs.id_jalurppdb='$id_jalurppdb' and datappdbs.status='$status' order by datappdbs.id_datappdb desc";
	$result = $this->db->query($query);
	return $result;	
	}

function detail_datappdb233($id_jalurppdb,$id_sekolah,$status){
	$query 	= "SELECT *, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah1=sekolah.id_sekolah) as sekolah1, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah2=sekolah.id_sekolah) as sekolah2, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah3=sekolah.id_sekolah) as sekolah3, (SELECT jurusan from jurusan where datappdbs.jurusan_id=jurusan.id_jurusan) as jurusan FROM datappdbs inner join nilai_rapor on nilai_rapor.no_pendaftaran=datappdbs.no_pendaftaran inner join jalurppdb on datappdbs.id_jalurppdb=jalurppdb.id_jalurppdb inner join siswa on siswa.id_siswa=datappdbs.id_siswa where datappdbs.id_sekolah1='$id_sekolah' OR datappdbs.sekolah_id='$id_sekolah' OR (datappdbs.id_sekolah2='$id_sekolah' and datappdbs.status2 is not NULL) and datappdbs.id_jalurppdb='$id_jalurppdb' and datappdbs.status='$status' order by datappdbs.id_datappdb desc";
	$result = $this->db->query($query);
	return $result;	
	}

function cek_datappdb($id_siswa){
	$query 	= "SELECT *, (SELECT nama_sekolah from sekolah where datappdbs.sekolah_id=sekolah.id_sekolah) as sekolah, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah1=sekolah.id_sekolah) as sekolah1, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah2=sekolah.id_sekolah) as sekolah2, (SELECT nama_sekolah from sekolah where datappdbs.id_sekolah3=sekolah.id_sekolah) as sekolah3, (SELECT jurusan from jurusan where datappdbs.id_jurusan1=jurusan.id_jurusan) as jurusan1, (SELECT jurusan from jurusan where datappdbs.id_jurusan2=jurusan.id_jurusan) as jurusan2, (SELECT jurusan from jurusan where datappdbs.id_jurusan3=jurusan.id_jurusan) as jurusan3 FROM datappdbs inner join jalurppdb on datappdbs.id_jalurppdb=jalurppdb.id_jalurppdb inner join siswa on siswa.id_siswa=datappdbs.id_siswa where datappdbs.id_siswa='$id_siswa' order by datappdbs.id_datappdb desc;";
	$result = $this->db->query($query);
	return $result;	
	}


function tampil_datappdb1(){
	$query 	= "SELECT max(no_pendaftaran) as no_pendaftaran FROM datappdbs order by datappdbs.id_datappdb desc";
	$result = $this->db->query($query);
	return $result;	
	}

// method tambah data siswa
	function input_datappdb($no_pendaftaran,$id_siswa,$asal_sekolah,$tahun_lulus,$id_sekolah1,$id_sekolah2,$id_sekolah3,$id_jalurppdb,$jenjang,$id_jurusan1,$id_jurusan2,$id_jurusan3){
		$tgl				= date("Y-m-d H:i:s");
		$status = 'Upload Berkas';
	$sql 	= "INSERT INTO datappdbs VALUES (NULL,'$no_pendaftaran','$id_siswa','$asal_sekolah','$tahun_lulus',NULL,'$id_sekolah1','$id_sekolah2','$id_sekolah3',NULL,'$id_jurusan1','$id_jurusan2','$id_jurusan3','$id_jalurppdb','$jenjang','$tgl','$status','$status',NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
	$result = $this->db->query($sql); 
	return $result;
	}

// method update data jalurppdb
	function update_datappdb($id_datappdb){
	$tgl = date("Y-m-d H:i:s");
	$query = "UPDATE datappdbs SET 
									status	='Proses',
									status1	='Proses',
									waktu_kirim = '$tgl'
									where id_datappdb = '$id_datappdb'";
			$res = $this->db->query($query);
			return $res;
	}


// method tambah data rapor
	function input_datarapor($no_pendaftaran,$nilai_rapor1,$nilai_rapor2,$nilai_rapor3,$nilai_rapor4,$nilai_rapor5){
	$sql 	= "INSERT INTO nilai_rapor VALUES (NULL,'$no_pendaftaran','$nilai_rapor1','$nilai_rapor2','$nilai_rapor3','$nilai_rapor4','$nilai_rapor5')";
	$result = $this->db->query($sql); 
	return $result;
	}



function tampil_nilairapor($no_pendaftaran){
	$query 	= "SELECT * FROM nilai_rapor inner join datappdbs on nilai_rapor.no_pendaftaran=datappdbs.no_pendaftaran where nilai_rapor.no_pendaftaran='$no_pendaftaran'";
	$result = $this->db->query($query);
	return $result;	
	}

// method hapus data Nilai Rapor
	function delete_nilairapor($no_pendaftaran){
	$query 	= "DELETE FROM nilai_rapor where no_pendaftaran='$no_pendaftaran'";
	$res 	= $this->db->query($query);
	return $res;
	}

// method hapus data Nilai Rapor
	function delete_datappdb($id_datappdb){
	$query 	= "DELETE FROM datappdbs where id_datappdb='$id_datappdb'";
	$res 	= $this->db->query($query);
	return $res;
	}


function tampil_berkas($no_pendaftaran){
	$query 	= "SELECT * FROM berkas inner join datappdbs on berkas.no_pendaftaran=datappdbs.no_pendaftaran where berkas.no_pendaftaran='$no_pendaftaran'";
	$result = $this->db->query($query);
	return $result;	
	}


// method tambah data rapor
	function input_berkas($no_pendaftaran){
	$sql 	= "INSERT INTO berkas VALUES (NULL,'$no_pendaftaran',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
	$result = $this->db->query($sql); 
	return $result;
	}

// method hapus data siswa
	function delete_berkas($no_pendaftaran){
	$query 	= "DELETE FROM berkas where no_pendaftaran='$no_pendaftaran'";
	$res 	= $this->db->query($query);
	return $res;
	}

// method hapus data siswa
	function update_berkas($id,$folder,$file){
	$query 	= "UPDATE berkas SET $folder	='$file'
									where no_pendaftaran = '$id'";
			$res = $this->db->query($query);
			return $res;
	}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
// method update data jalurppdb
	function proses_ppdb($id_datappdb,$id_sekolah,$jurusan_id,$status,$status2,$ket){
	$query = "UPDATE datappdbs SET 
									sekolah_id	='$id_sekolah',
									jurusan_id	='$jurusan_id',
									status	='$status',
									status1	='$status',
									status2	='$status2',
									ket	='$ket'
									where id_datappdb = '$id_datappdb'";
			$res = $this->db->query($query);
			return $res;
	}

	// method update data jalurppdb
	function proses_ppdb2($id_datappdb,$id_sekolah,$jurusan_id,$status,$status3,$ket2){
	$query = "UPDATE datappdbs SET 
									sekolah_id	='$id_sekolah',
									jurusan_id	='$jurusan_id',
									status	='$status',
									status2	='$status',
									status3	='$status3',
									ket2	='$ket2'
									where id_datappdb = '$id_datappdb'";
			$res = $this->db->query($query);
			return $res;
	}

	// method update data jalurppdb
	function proses_ppdb3($id_datappdb,$id_sekolah,$jurusan_id,$status,$ket3){
	$query = "UPDATE datappdbs SET 
									sekolah_id	='$id_sekolah',
									jurusan_id	='$jurusan_id',
									status	='$status',
									status3	='$status',
									ket3	='$ket3'
									where id_datappdb = '$id_datappdb'";
			$res = $this->db->query($query);
			return $res;
	}


function cek_nik($nik, $nisn){
	$query 	= "SELECT * FROM siswa where siswa.nik='$nik' or siswa.nisn='$nisn' order by siswa.id_siswa desc";
	$result = $this->db->query($query);
	$row      = mysqli_num_rows($result);
	return $row;	
	}

function cek_kirim($id_sekolah){
	$query 	= "SELECT * FROM datappdbs where (sekolah_id='$id_sekolah' and status1='Proses') or (sekolah_id='$id_sekolah' and status2='Proses') or (sekolah_id='$id_sekolah' and status3='Proses')";
	$result = $this->db->query($query);
	$row      = mysqli_num_rows($result);
	return $row;	
	}

function cek_kapasitas($id_sekolah,$id_jalurppdb){
	$query 	= "SELECT kapasitas, (select COUNT(datappdbs.sekolah_id) from datappdbs where datappdbs.sekolah_id='$id_sekolah' and datappdbs.id_jalurppdb='$id_jalurppdb') as jumlah_pendaftar FROM sekolah where sekolah.id_sekolah='$id_sekolah'";
	$result = $this->db->query($query);
	return $result;	
	}

function cek_kapasitas1($id_sekolah){
	$query 	= "SELECT *, (SELECT kapasitas from sekolah WHERE id_sekolah='$id_sekolah') as kapasitas, (SELECT COUNT(datappdbs.sekolah_id) from datappdbs where datappdbs.sekolah_id='$id_sekolah' and datappdbs.id_jalurppdb=jalurppdb.id_jalurppdb) as jumlah_pendaftar FROM jalurppdb ";
	$result = $this->db->query($query);
	return $result;	
	}

function tampil_zonasisd(){
	$query 	= "SELECT *, (SELECT GROUP_CONCAT(CONCAT(kelurahan.nama_kel) SEPARATOR ', ') from kelurahan where kelurahan.id_zonasi=zonasis.id_zonasi) as kelurahan FROM sekolah inner join zonasis on sekolah.id_zonasi=zonasis.id_zonasi WHERE sekolah.jenjang='SD';";
	$result = $this->db->query($query);
	return $result;	
	}

function tampil_zonasismp(){
	$query 	= "SELECT *, (SELECT GROUP_CONCAT(CONCAT(kecamatan.nama_kec) SEPARATOR ', ') from kecamatan where kecamatan.id_zonasi=zonasis.id_zonasi) as kecamatan FROM sekolah inner join zonasis on sekolah.id_zonasi=zonasis.id_zonasi WHERE sekolah.jenjang='SMP';";
	$result = $this->db->query($query);
	return $result;	
	}

function tampil_zonasisma(){
	$query 	= "SELECT *,(SELECT GROUP_CONCAT(CONCAT(kelurahan.nama_kel) SEPARATOR ', ') from kelurahan WHERE FIND_IN_SET(sekolah.id_sekolah, kelurahan.zona_sekolah)) as nama_kel, (SELECT GROUP_CONCAT(CONCAT(kecamatan.nama_kec) SEPARATOR ', ') from kecamatan WHERE FIND_IN_SET(sekolah.id_sekolah, kecamatan.zona_sekolah)) as nama_kec FROM sekolah where jenjang='SMA'";
	$result = $this->db->query($query);
	return $result;	
	}

function tampil_sekolah44(){
	$query 	= "SELECT *,(SELECT GROUP_CONCAT(CONCAT(kelurahan.nama_kel) SEPARATOR ', ') from kelurahan WHERE FIND_IN_SET(sekolah.id_sekolah, kelurahan.zona_sekolah)) as nama_kel, (SELECT GROUP_CONCAT(CONCAT(kecamatan.nama_kec) SEPARATOR ', ') from kecamatan WHERE FIND_IN_SET(sekolah.id_sekolah, kecamatan.zona_sekolah)) as nama_kec FROM sekolah";
	$result = $this->db->query($query);
	return $result;	
	}

//Data dataspmb
// method tampil data jalurppdb
function tampil_dataspmb(){
	$query 	= "SELECT *, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status1='Proses' and datappdbs.id_sekolah1=sekolah.id_sekolah) as proses1, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status1='Diterima' and datappdbs.id_sekolah1=sekolah.id_sekolah and datappdbs.sekolah_id=datappdbs.id_sekolah1) as diterima1, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status1='Tidak Diterima' and datappdbs.id_sekolah1=sekolah.id_sekolah) as ditolak1, (SELECT COUNT(*) from datappdbs WHERE datappdbs.id_sekolah1=sekolah.id_sekolah and datappdbs.ket is not NULL) as total1, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status2='Proses' and datappdbs.id_sekolah1=sekolah.id_sekolah) as proses2, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status='Diterima' and datappdbs.id_sekolah2=sekolah.id_sekolah and datappdbs.sekolah_id=datappdbs.id_sekolah2) as diterima2, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status2='Tidak Diterima' and datappdbs.id_sekolah2=sekolah.id_sekolah) as ditolak2, (SELECT COUNT(*) from datappdbs WHERE datappdbs.id_sekolah2=sekolah.id_sekolah and datappdbs.ket2 is not NULL) as total2,(SELECT COUNT(*) from datappdbs WHERE datappdbs.status3='Proses' and datappdbs.id_sekolah3=sekolah.id_sekolah) as proses3, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status='Diterima' and datappdbs.id_sekolah3=sekolah.id_sekolah and datappdbs.sekolah_id=datappdbs.id_sekolah3) as diterima3, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status3='Tidak Diterima' and datappdbs.id_sekolah3=sekolah.id_sekolah) as ditolak3, (SELECT COUNT(*) from datappdbs WHERE datappdbs.id_sekolah3=sekolah.id_sekolah and datappdbs.ket3 is not NULL) as total3 FROM sekolah order by sekolah.id_sekolah desc";
	$result = $this->db->query($query);
	return $result;	
	}

//Data dataspmb
// method tampil data jalurppdb
function tampil_dataspmb44(){
	$query 	= "SELECT *, (SELECT COUNT(*) from datappdbs WHERE (datappdbs.status1='Proses' and datappdbs.id_sekolah1=sekolah.id_sekolah) or (datappdbs.status2='Proses' and datappdbs.id_sekolah2=sekolah.id_sekolah) or (datappdbs.status3='Proses' and datappdbs.id_sekolah3=sekolah.id_sekolah)) as proses, (SELECT COUNT(*) from datappdbs WHERE (datappdbs.status1='Diterima' and datappdbs.id_sekolah1=sekolah.id_sekolah and datappdbs.sekolah_id=datappdbs.id_sekolah1) or (datappdbs.status2='Diterima' and datappdbs.id_sekolah2=sekolah.id_sekolah and datappdbs.sekolah_id=datappdbs.id_sekolah2) or (datappdbs.status3='Diterima' and datappdbs.id_sekolah3=sekolah.id_sekolah and datappdbs.sekolah_id=datappdbs.id_sekolah3)) as diterima, (SELECT COUNT(*) from datappdbs WHERE (datappdbs.status1='Tidak Diterima' and datappdbs.id_sekolah1=sekolah.id_sekolah) or (datappdbs.status2='Tidak Diterima' and datappdbs.id_sekolah2=sekolah.id_sekolah) or (datappdbs.status3='Tidak Diterima' and datappdbs.id_sekolah3=sekolah.id_sekolah)) as ditolak, (SELECT COUNT(*) from datappdbs WHERE datappdbs.id_sekolah1=sekolah.id_sekolah and datappdbs.ket is not NULL) as total FROM sekolah;";
	$result = $this->db->query($query);
	return $result;	
	}


function detail_dataspmb($id_sekolah){
	$query 	= "SELECT *, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status1='Proses' and datappdbs.id_sekolah1=sekolah.id_sekolah) as proses1, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status1='Diterima' and datappdbs.id_sekolah1=sekolah.id_sekolah and datappdbs.sekolah_id=datappdbs.id_sekolah1) as diterima1, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status1='Tidak Diterima' and datappdbs.id_sekolah1=sekolah.id_sekolah) as ditolak1, (SELECT COUNT(*) from datappdbs WHERE datappdbs.id_sekolah1=sekolah.id_sekolah and datappdbs.ket is not NULL) as total1, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status2='Proses' and datappdbs.id_sekolah1=sekolah.id_sekolah) as proses2, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status='Diterima' and datappdbs.id_sekolah2=sekolah.id_sekolah and datappdbs.sekolah_id=datappdbs.id_sekolah2) as diterima2, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status2='Tidak Diterima' and datappdbs.id_sekolah2=sekolah.id_sekolah) as ditolak2, (SELECT COUNT(*) from datappdbs WHERE datappdbs.id_sekolah2=sekolah.id_sekolah and datappdbs.ket2 is not NULL) as total2,(SELECT COUNT(*) from datappdbs WHERE datappdbs.status3='Proses' and datappdbs.id_sekolah3=sekolah.id_sekolah) as proses3, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status='Diterima' and datappdbs.id_sekolah3=sekolah.id_sekolah and datappdbs.sekolah_id=datappdbs.id_sekolah3) as diterima3, (SELECT COUNT(*) from datappdbs WHERE datappdbs.status3='Tidak Diterima' and datappdbs.id_sekolah3=sekolah.id_sekolah) as ditolak3, (SELECT COUNT(*) from datappdbs WHERE datappdbs.id_sekolah3=sekolah.id_sekolah and datappdbs.ket3 is not NULL) as total3 FROM sekolah where sekolah.id_sekolah='$id_sekolah' order by sekolah.id_sekolah desc";
	$result = $this->db->query($query);
	return $result;	
	}

//Data jadwal
// method tampil data jadwal
function tampil_jadwal(){
	$query 	= "SELECT * FROM jadwal order by jadwal.id_jadwal asc";
	$result = $this->db->query($query);
	return $result;	
	}


function tampil_jadwal12($ket){
	$query 	= "SELECT * FROM jadwal where jenis_jadwal='$ket' and CURRENT_DATE BETWEEN awal_jadwal AND akhir_jadwal";
	$result = $this->db->query($query);
	return $result;	
	}


// method detail data jadwal
	function detail_jadwal($id_jadwal){
	$query 	= "SELECT * FROM jadwal where jadwal.id_jadwal='$id_jadwal'";
	$result = $this->db->query($query);
	return $result;	
	}


// method hapus data jadwal
	function delete_jadwal($id_jadwal){
	$query 	= "DELETE FROM jadwal where id_jadwal='$id_jadwal'";
	$res 	= $this->db->query($query);
	return $res;
	}

// method tambah data jadwal
	function input_jadwal($nama_jadwal,$jenis_jadwal,$awal_jadwal,$akhir_jadwal,$status_jadwal){
	$sql 	= "INSERT INTO jadwal VALUES (NULL,'$nama_jadwal','$jenis_jadwal','$awal_jadwal','$akhir_jadwal','$status_jadwal')";
	$result = $this->db->query($sql); 
	return $result;
	}


// method update data jadwal
	function update_jadwal($id_jadwal,$nama_jadwal,$jenis_jadwal,$awal_jadwal,$akhir_jadwal,$status_jadwal){
	$query = "UPDATE jadwal SET 
									nama_jadwal		='$nama_jadwal',
									jenis_jadwal	='$jenis_jadwal',
									awal_jadwal		='$awal_jadwal',
									akhir_jadwal	='$akhir_jadwal',
									status_jadwal	='$status_jadwal'
									where id_jadwal = '$id_jadwal'";
			$res = $this->db->query($query);
			return $res;
	}

// method update status sekolah
	function kirim_spmb($id_sekolah,$status){
	$query = "UPDATE sekolah SET 
									status_kirim	='$status'
									where id_sekolah = '$id_sekolah'";
			$res = $this->db->query($query);
			return $res;
	}


}

?>
